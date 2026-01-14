<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    // --- ĐĂNG NHẬP ---
    public function showLoginForm()
    {
        return view('auth.login'); // Trả về file giao diện login
    }

    public function login(Request $request)
    {
        // 1. Validate
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        // 2. Thử đăng nhập
        $credentials = $request->only('email', 'password');
        $remember = $request->has('remember');

        if (Auth::attempt($credentials, $remember)) {
            $request->session()->regenerate();
            return redirect()->route('home.index'); // Thành công -> Về trang chủ
        }

        // 3. Thất bại -> Quay lại trang login kèm thông báo lỗi
        return back()->withErrors([
            'email' => 'Thông tin đăng nhập không chính xác.',
        ])->onlyInput('email');
    }

    // --- ĐĂNG KÝ ---
    public function showRegisterForm()
    {
        return view('auth.register');
    }

    public function register(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6|confirmed', // Cần input name="password_confirmation"
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        Auth::login($user); // Đăng ký xong tự login luôn

        return redirect()->route('home.index');
    }

    // --- ĐĂNG XUẤT ---
    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->route('home.index');
    }
}
