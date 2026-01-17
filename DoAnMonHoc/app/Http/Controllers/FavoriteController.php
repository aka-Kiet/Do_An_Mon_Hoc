<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class FavoriteController extends Controller
{
    // 1. Xem danh sách yêu thích
    public function index()
    {
        $user = Auth::user();
        // Lấy danh sách sản phẩm user đã thích
        $favorites = $user->favorites()->paginate(10);

        $viewData = [
            'title' => 'Sản phẩm yêu thích',
        ];

        return view('profile.favorites', compact('favorites', 'user', 'viewData'));
    }

    // 2. Thả tim / Bỏ tim (Toggle)
    public function toggle($productId)
    {
        $user = Auth::user();

        // Hàm toggle này cực xịn: Chưa có thì thêm, có rồi thì xóa
        $user->favorites()->toggle($productId);

        return back()->with('success', 'Đã cập nhật danh sách yêu thích!');
    }
}
