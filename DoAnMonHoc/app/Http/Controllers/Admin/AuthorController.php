<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Author;

class AuthorController extends Controller
{
    // 1. Danh sách
    public function index()
    {
        $viewData = [];
        $viewData["title"] = "Quản lý Tác giả";
        // Lấy danh sách + Đếm số sách của mỗi tác giả (withCount)
        $authors = Author::withCount('books')->orderBy('id', 'asc')->paginate(10);
        return view('admin.authors.index', compact('authors','viewData'));
    }

    // 2. Form thêm
    public function create()
    {
        return view('admin.authors.create');
    }

    // 3. Lưu mới
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255|unique:authors,name',
            'bio' => 'nullable|string',
        ], [
            'name.unique' => 'Tên tác giả này đã tồn tại.'
        ]);

        Author::create($request->all());

        return redirect()->route('admin.authors.index')->with('success', 'Thêm tác giả thành công!');
    }

    // 4. Form sửa
    public function edit($id)
    {
        $author = Author::findOrFail($id);
        return view('admin.authors.edit', compact('author'));
    }

    // 5. Cập nhật
    public function update(Request $request, $id)
    {
        $author = Author::findOrFail($id);

        $request->validate([
            'name' => 'required|string|max:255|unique:authors,name,' . $id,
            'bio' => 'nullable|string',
        ]);

        $author->update($request->all());

        return redirect()->route('admin.authors.index')->with('success', 'Cập nhật thành công!');
    }

    // 6. Xóa (Có kiểm tra ràng buộc)
    public function destroy($id)
    {
        $author = Author::withCount('books')->findOrFail($id);

        // CHẶN: Không cho xóa nếu tác giả đã có sách
        if ($author->books_count > 0) {
            return back()->with('error', 'Không thể xóa! Tác giả này đang có ' . $author->books_count . ' cuốn sách trong hệ thống.');
        }

        $author->delete();

        return back()->with('success', 'Đã xóa tác giả.');
    }
}
