<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash; // sử dụng hash

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

    // 3. Hiển thị form Đổi mật khẩu
    public function showChangePasswordForm()
    {
        $user = Auth::user();

        $viewData = [];
        $viewData["title"] = "Đổi mật khẩu";

        return view('profile.password', compact('user', 'viewData'));
    }

    // 4. Xử lý đổi mật khẩu
    public function changePassword(Request $req) {
        // Validate cơ bản (Độ dài, xác nhận...)
        $req->validate([
            'current_password' => 'required',
            'password' => 'required|min:6|confirmed|different:current_password',
        ], [
            'current_password.required' => 'Vui lòng nhập mật khẩu hiện tại.',
            'password.confirmed' => 'Mật khẩu nhập lại không khớp.',
            'password.min' => 'Mật khẩu mới phải có ít nhất 6 ký tự.',
            'password.different' => 'Mật khẩu mới không được trùng với mật khẩu cũ.',
        ]);

        // Kiểm tra mk cũ có đúng với db không
        // Hash::check(Mật khẩu nhập vào, Mật khẩu đang lưu trong DB)
        if(!Hash::check($req->current_password, Auth::user()->password)) {
            return back()->withErrors(['current_password' => 'Mật khẩu hiện tại không chính xác.']);
        }

        // Nếu đúng hết -> Cập nhật mật khẩu mới
        Auth::user()->update([
            'password' => Hash::make($req->password)
        ]);

        return back()->with('success', 'Đổi mật khẩu thành công!');
    }
}
