<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Book;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

class BookController extends Controller
{
   public function index(Request $request)
    {
        $viewData = [];
        $viewData["title"] = "Quản lý Sản phẩm";

        $tab = $request->get('tab', 'all'); // all | trash

        $query = Book::with('category');

        // 👉 TAB THÙNG RÁC
        if ($tab === 'trash') {
            $query->onlyTrashed();
        }

        // 🔍 SEARCH
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

        $books = $query
            ->latest()
            ->paginate(15)
            ->appends($request->all());

        $trashCount = Book::onlyTrashed()->count();

        return view('admin.books.index', compact(
            'books',
            'tab',
            'trashCount',
            'viewData'
        ));
    }

    public function create()
    {
        $categories = Category::all();
        return view('admin.books.create', compact('categories'));
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'name'        => 'required|string|max:255',
            'category_id' => 'required|exists:categories,id',
            'price'       => 'required|numeric|min:0',
            'quantity'    => 'required|integer|min:0',
            'image'       => 'nullable|image|max:2048',
            'image.*'      => 'nullable|image|max:2048',
        ]);
         if ($request->hasFile('image')) {
            $data['image'] = $request->file('image')->store('books', 'public');
        }

        // 1. Ảnh đại diện
        if ($request->hasFile('image')) {
            $data['image'] = $request->file('image')->store('books', 'public');
        }

        // 2. Tạo sách (slug sinh trong Model)
        $book = Book::create($data);

        // 3. Gallery
        if ($request->hasFile('images')) {
            foreach ($request->file('images') as $index => $img) {
                $path = $img->store('books/gallery', 'public');

                BookImage::create([
                    'book_id'    => $book->id,
                    'image_path' => $path,
                    'sort_order' => $index,
                ]);
            }
        }

        return redirect()
            ->route('admin.books.index')
            ->with('success', 'Thêm sản phẩm thành công');
    }

    public function edit(Book $book)
    {
        $categories = Category::all();
        return view('admin.books.edit', compact('book', 'categories'));
    }

    public function update(Request $request, Book $book)
    {
        $data = $request->validate([
            'name'        => 'required|string|max:255',
            'category_id' => 'required|exists:categories,id',
            'price'       => 'required|numeric|min:0',
            'quantity'    => 'required|integer|min:0',
            'image'       => 'nullable|image|max:2048',
            'images.*'    => 'nullable|image|max:2048',
        ]);

        // 1. Đổi ảnh đại diện
        if ($request->hasFile('image')) {
            if ($book->image) {
                Storage::disk('public')->delete($book->image);
            }
            $data['image'] = $request->file('image')->store('books', 'public');
        }

        $book->update($data);

        // 2. Thêm ảnh gallery mới
        if ($request->hasFile('images')) {
            $currentOrder = $book->images()->max('sort_order') ?? 0;

            foreach ($request->file('images') as $index => $img) {
                $path = $img->store('books/gallery', 'public');

                BookImage::create([
                    'book_id'    => $book->id,
                    'image_path' => $path,
                    'sort_order' => $currentOrder + $index + 1,
                ]);
            }
        }

        return redirect()
            ->route('admin.books.index')
            ->with('success', 'Cập nhật sản phẩm thành công');
    }

    public function destroy(Book $book)
    {
        // Xóa ảnh đại diện
        if ($book->image) {
            Storage::disk('public')->delete($book->image);
        }

        // Gallery xóa theo cascade
        $book->delete();

        return redirect()
            ->route('admin.books.index')
            ->with('success', 'Đã xóa sản phẩm');
    }

    public function softDelete(Request $request)
    {
        $ids = $request->ids;

        if (!$ids || count($ids) === 0) {
            return back()->with('error', 'Bạn chưa chọn sản phẩm nào');
        }

        Book::whereIn('id', $ids)->delete(); // soft delete

        return back()->with('success', 'Đã xóa mềm sản phẩm');
    }

    public function restore($id)
    {
        Book::withTrashed()->where('id', $id)->restore();

        return back()->with('success', 'Đã khôi phục sản phẩm');
    }

    public function restoreAll()
    {
        $count = Book::onlyTrashed()->count();

        if ($count === 0) {
            return back()->with('error', 'Không có sản phẩm nào để khôi phục');
        }

        Book::onlyTrashed()->restore();

        return back()->with('success', "Đã khôi phục {$count} sản phẩm");
    }

    public function forceDelete($id)
    {
        $book = Book::onlyTrashed()->findOrFail($id);

        // Xóa ảnh đại diện nếu có
        if ($book->image) {
            \Storage::disk('public')->delete($book->image);
        }

        // Xóa gallery (nếu có)
        foreach ($book->images as $img) {
            \Storage::disk('public')->delete($img->image_path);
        }

        $book->forceDelete();

        return back()->with('success', 'Đã xóa vĩnh viễn sản phẩm');
    }

    public function forceDeleteAll()
    {
        $books = Book::onlyTrashed()->with('images')->get();

        if ($books->isEmpty()) {
            return back()->with('error', 'Không có sản phẩm nào để xóa');
        }

        foreach ($books as $book) {
            if ($book->image) {
                \Storage::disk('public')->delete($book->image);
            }

            foreach ($book->images as $img) {
                \Storage::disk('public')->delete($img->image_path);
            }

            $book->forceDelete();
        }

        return back()->with('success', 'Đã xóa vĩnh viễn toàn bộ sản phẩm trong thùng rác');
    }

}
