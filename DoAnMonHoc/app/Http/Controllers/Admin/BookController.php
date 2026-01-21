<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Book;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Models\BookImage;
use App\Models\Author;
use Illuminate\Support\Facades\File; // 👈 Quan trọng: Để xóa file trong public

class BookController extends Controller
{
    public function index(Request $request)
    {
        $viewData = [];
        $viewData["title"] = "Quản lý Sản phẩm";

        $tab = $request->get('tab', 'all'); 
        $query = Book::with('category');

        if ($tab === 'trash') {
            $query->onlyTrashed();
        }

        if ($request->filled('search')) {
            $search = trim($request->search);
            $query->where(function ($q) use ($search) {
                if (ctype_digit($search)) {
                    $q->orWhere('id', (int)$search);
                }
                $q->orWhere('name', 'like', "%{$search}%")
                ->orWhere('slug', 'like', "%{$search}%");
            });
        }

        $books = $query->latest()->paginate(15)->appends($request->all());
        $trashCount = Book::onlyTrashed()->count();

        return view('admin.books.index', compact('books', 'tab', 'trashCount', 'viewData'));
    }

    public function create()
    {
        $categories = Category::all();
        $authors = Author::all();
        return view('admin.books.create', compact('categories', 'authors'));
    }

    // 🟢 HÀM STORE ĐÃ SỬA
    public function store(Request $request)
    {
        $data = $request->validate([
            'name'        => 'required|string|max:255',
            'author_id'   => 'required|exists:authors,id',
            'category_id' => 'required|exists:categories,id',
            'price'       => 'required|numeric|min:0',
            'quantity'    => 'required|integer|min:0',
            'image'       => 'nullable|image|max:10240', // 10MB
            'images.*'    => 'nullable|image|max:10240',
        ]);

        // 1. Xử lý Ảnh đại diện (Lưu vào public/images/books)
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $filename = time() . '_' . $file->getClientOriginalName();
            
            // Di chuyển file vào public/images/books
            $file->move(public_path('images/books'), $filename);
            
            // Lưu đường dẫn vào DB
            $data['image'] = 'images/books/' . $filename;
        }

        // 2. Tạo sách
        $book = Book::create($data);

        // 3. Xử lý Gallery (Lưu vào public/images/books/gallery)
        if ($request->hasFile('images')) {
            foreach ($request->file('images') as $index => $img) {
                $filename = time() . '_' . $index . '_' . $img->getClientOriginalName();
                
                $img->move(public_path('images/books/gallery'), $filename);
                $path = 'images/books/gallery/' . $filename;

                BookImage::create([
                    'book_id'    => $book->id,
                    'image_path' => $path,
                    'sort_order' => $index,
                ]);
            }
        }

        return redirect()->route('admin.books.index')->with('success', 'Thêm sản phẩm thành công');
    }

    public function edit(Book $book)
    {
        $book->load('images');
        $categories = Category::all();
        $authors = Author::all();
        return view('admin.books.edit', compact('book', 'categories', 'authors'));
    }

    // 🟢 HÀM UPDATE ĐÃ SỬA
    public function update(Request $request, Book $book)
    {
        $data = $request->validate([
            'name'        => 'required|string|max:255',
            'author_id'   => 'required|exists:authors,id',
            'category_id' => 'required|exists:categories,id',
            'price'       => 'required|numeric|min:0',
            'quantity'    => 'required|integer|min:0',
            'image'       => 'nullable|image|max:10240',
            'images.*'    => 'nullable|image|max:10240',
        ]);

        // 1. Đổi ảnh đại diện
        if ($request->hasFile('image')) {
            // Xóa ảnh cũ nếu có
            if ($book->image && File::exists(public_path($book->image))) {
                File::delete(public_path($book->image));
            }

            // Lưu ảnh mới
            $file = $request->file('image');
            $filename = time() . '_' . $file->getClientOriginalName();
            $file->move(public_path('images/books'), $filename);
            $data['image'] = 'images/books/' . $filename;
        }

        $book->update($data);

        // 2. Thêm ảnh gallery mới
        if ($request->hasFile('images')) {
            $currentOrder = $book->images()->max('sort_order') ?? 0;

            foreach ($request->file('images') as $index => $img) {
                $filename = time() . '_' . $index . '_' . $img->getClientOriginalName();
                $img->move(public_path('images/books/gallery'), $filename);
                $path = 'images/books/gallery/' . $filename;

                BookImage::create([
                    'book_id'    => $book->id,
                    'image_path' => $path,
                    'sort_order' => $currentOrder + $index + 1,
                ]);
            }
        }

        return redirect()->route('admin.books.index')->with('success', 'Cập nhật sản phẩm thành công');
    }

    public function destroy(Book $book)
    {
        // Xóa mềm: Không xóa ảnh vật lý, chỉ ẩn trong DB
        $book->delete();
        return redirect()->route('admin.books.index')->with('success', 'Đã xóa sản phẩm vào thùng rác');
    }

    public function softDelete(Request $request)
    {
        $ids = $request->ids;
        if (!$ids || count($ids) === 0) return back()->with('error', 'Bạn chưa chọn sản phẩm nào');
        Book::whereIn('id', $ids)->delete();
        return back()->with('success', 'Đã xóa mềm sản phẩm');
    }

    public function restore($id)
    {
        Book::withTrashed()->where('id', $id)->restore();
        return back()->with('success', 'Đã khôi phục sản phẩm');
    }

    public function restoreAll()
    {
        Book::onlyTrashed()->restore();
        return back()->with('success', "Đã khôi phục toàn bộ sản phẩm");
    }

    // 🟢 HÀM FORCE DELETE ĐÃ SỬA (Xóa vĩnh viễn + Xóa file)
    public function forceDelete($id)
    {
        $book = Book::onlyTrashed()->findOrFail($id);

        // Xóa ảnh đại diện trong thư mục public
        if ($book->image && File::exists(public_path($book->image))) {
            File::delete(public_path($book->image));
        }

        // Xóa gallery
        foreach ($book->images as $img) {
            if ($img->image_path && File::exists(public_path($img->image_path))) {
                File::delete(public_path($img->image_path));
            }
        }

        $book->forceDelete();
        return back()->with('success', 'Đã xóa vĩnh viễn sản phẩm');
    }

    public function forceDeleteAll()
    {
        $books = Book::onlyTrashed()->with('images')->get();

        foreach ($books as $book) {
            // Xóa ảnh đại diện
            if ($book->image && File::exists(public_path($book->image))) {
                File::delete(public_path($book->image));
            }
            // Xóa gallery
            foreach ($book->images as $img) {
                if ($img->image_path && File::exists(public_path($img->image_path))) {
                    File::delete(public_path($img->image_path));
                }
            }
            $book->forceDelete();
        }

        return back()->with('success', 'Đã xóa vĩnh viễn toàn bộ thùng rác');
    }
}