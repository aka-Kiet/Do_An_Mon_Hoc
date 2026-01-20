<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Contact;

class ContactController extends Controller
{
    /**
     * Lưu form liên hệ
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name'    => 'required|string|max:255',
            'email'   => 'required|email|max:255',
            'subject' => 'required|string|max:255',
            'message' => 'required|string',
        ]);

        // TODO:
        // 1. Lưu vào bảng contacts
        // 2. Gửi email cho admin
        Contact::create($validated);

        return redirect()
            ->back()
            ->with('success', 'Gửi liên hệ thành công!');
    }
}
