<?php

namespace App\Http\Controllers\Admin; // 👈 Chú ý namespace này phải là Admin

use App\Http\Controllers\Controller;
use App\Models\Contact;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    // 1. Danh sách
    public function index()
    {
        $viewData = [];
        $viewData["title"] = "Quản lý Liên hệ";
        $contacts = Contact::latest()->paginate(10);
        return view('admin.contacts.index', compact('contacts', 'viewData'));
    }

    // 2. Hiển thị form Sửa (Bạn đang bị thiếu hàm này)
    public function edit(Contact $contact)
    {
        return view('admin.contacts.edit', compact('contact'));
    }

    // 3. Xử lý Cập nhật (Bạn cũng cần thêm hàm này)
    public function update(Request $request, Contact $contact)
    {
        $data = $request->validate([
            'name'    => 'required|string|max:255',
            'email'   => 'required|email|max:255',
            'subject' => 'nullable|string|max:255',
            'message' => 'required|string',
        ]);

        $contact->update($data);

        return redirect()
            ->route('admin.contacts.index')
            ->with('success', 'Cập nhật liên hệ thành công');
    }

    // 4. Xem chi tiết (Nếu cần)
    public function show(Contact $contact)
    {
        return view('admin.contacts.show', compact('contact'));
    }

    // 5. Xóa
    public function destroy(Contact $contact)
    {
        $contact->delete();

        return redirect()
            ->route('admin.contacts.index')
            ->with('success', 'Đã xóa liên hệ');
    }
}