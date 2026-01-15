<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\HomeController; //Sử dụng HomeController
use App\Http\Controllers\ProductController; //Sử dụng ProductController
use App\Http\Controllers\CheckoutController; //Sử dụng CheckoutController
use App\Http\Controllers\CartController; //Sử dụng CheckoutController
use App\Http\Controllers\AuthController; //Sử dụng AuthController
use App\Http\Controllers\UserProfileController; //Sử dụng UserProfileController

// HomeController
// Định tuyến của trang chủ
Route::get('/', [HomeController::class, 'index'])->name('home.index');
// Định tuyến của trang giới thiệu
Route::get('/gioi-thieu', [HomeController::class, 'about'])->name('home.about');
// Định tuyến của trang liên hệ
Route::get('/lien-he', [HomeController::class, 'contact'])->name('home.contact');
// Định tuyến của trang chính sách
Route::get('/chinh-sach', [HomeController::class, 'policy'])->name('home.policy');


// ProductController
// Định tuyến trang sản phẩm
Route::get('/san-pham', [ProductController::class, 'index'])->name('product.index');
//Định tuyến trang chi tiết sản phẩm
// Sửa 'show' thành 'detail' cho khớp với code giao diện
Route::get('/san-pham/{id}', [ProductController::class, 'show'])->name('product.detail');


// CheckoutController
// Định tuyến trang thanh toán
Route::get('/thanh-toan', [CheckoutController::class, 'index'])->name('checkout.index');


// CartController
// Định tuyến trang thanh toán
Route::get('/gio-hang', [CartController::class, 'index'])->name('cart.index');


// 1. Đăng nhập
Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login'); // Hiện trang login
Route::post('/login', [AuthController::class, 'login']); // Xử lý đăng nhập

// 2. Đăng ký
Route::get('/register', [AuthController::class, 'showRegisterForm'])->name('register'); // Hiện trang đăng ký
Route::post('/register', [AuthController::class, 'register']); // Xử lý đăng ký

// 3. Đăng xuất
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');



Route::prefix('admin')->middleware(['auth', 'admin'])->group(function () {
    
    // Trang chủ Admin (Thống kê)
    Route::get('/', [App\Http\Controllers\Admin\DashboardController::class, 'index'])->name('admin.dashboard');

    // Quản lý Sách (Tự động tạo 7 route CRUD)

});

// Nhóm route yêu cầu đăng nhập
Route::middleware('auth')->group(function () {
    Route::get('/ho-so', [UserProfileController::class, 'index'])->name('profile.index');
    Route::post('/ho-so', [UserProfileController::class, 'update'])->name('profile.update');

    // Route Đổi mật khẩu
    Route::get('/doi-mat-khau', [UserProfileController::class, 'showChangePasswordForm'])->name('profile.password');
    Route::post('/doi-mat-khau', [UserProfileController::class, 'changePassword'])->name('profile.password.update');
});



