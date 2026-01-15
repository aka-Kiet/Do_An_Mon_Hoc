<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserProfileController extends Controller
{
    // 1. Hiển thị trang hồ sơ
    public function index()
    {
        $viewData = [];
        $viewData["title"] = "Hồ sơ";
        $user = Auth::user();
        return view('profile.index', compact('user', 'viewData'));
    }

    // 2. Cập nhật thông tin
    public function update(Request $request)
    {
        $user = Auth::user();

        $request->validate([
            'name' => 'required|string|max:255',
            'phone' => 'nullable|string|max:15',
            'address' => 'nullable|string|max:255',
            'birthday' => 'nullable|date',
            'gender' => 'nullable|in:nam,nu,khac',
        ]);

        // Cập nhật dữ liệu
        $user->update($request->only(['name', 'phone', 'address', 'birthday', 'gender']));

        return back()->with('success', 'Cập nhật hồ sơ thành công!');
    }
}
