<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Book;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class BookController extends Controller
{
    public function index(Request $request)
    {

         $query = Book::with('category');
        // --- TÌM KIẾM ---
        if ($request->filled('search')) {
            $search = trim($request->search);

            $query->where(function ($q) use ($search) {

                // ✅ TÌM THEO ID (ÉP KIỂU INT)
                if (ctype_digit($search)) {
                    $q->orWhere('id', (int) $search);
                }

                // ✅ TÌM THEO TÊN
                $q->orWhere('name', 'like', "%{$search}%");

                // ✅ TÌM THEO SLUG
                $q->orWhere('slug', 'like', "%{$search}%");
            });
        }


        // 📄 Phân trang
        $books = $query->latest()
                    ->paginate(15)
                    ->appends($request->all()); // giữ search khi chuyển trang

        return view('admin.books.index', compact('books'));
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
        return view('admin.books.edit', compact('Book', 'categories'));
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
}
