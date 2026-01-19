<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\HomeController; //Sử dụng HomeController
use App\Http\Controllers\ProductController; //Sử dụng ProductController
use App\Http\Controllers\CheckoutController; //Sử dụng CheckoutController
use App\Http\Controllers\CartController; //Sử dụng CheckoutController
use App\Http\Controllers\ReviewController; // Sử dụng ReviewController
use App\Http\Controllers\AuthController; //Sử dụng AuthController
use App\Http\Controllers\UserProfileController; //Sử dụng UserProfileController
use App\Http\Controllers\FavoriteController; //Sử dụng FavoriteController
use App\Http\Controllers\Admin\CategoryController; //Sử dụng CategoryController
use App\Http\Controllers\Admin\DashboardController; //Sử dụng DashboardController
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\AuthorController;
use App\Http\Controllers\Admin\BannerController;


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
Route::get('/san-pham/{slug}', [ProductController::class, 'show'])->name('product.show');
//realtime số lượng, đánh giá, lượt view, trung bình
Route::get('/san-pham/trang-thai/{slug}', [ProductController::class, 'checkRealtimeStatus'])->name('product.checkRealtimeStatus');


// CheckoutController
// Định tuyến trang thanh toán
Route::middleware('auth')->group(function () {
    Route::get('/thanh-toan', [CheckoutController::class, 'index'])->name('checkout.index');
    Route::post('/thanh-toan', [CheckoutController::class, 'process'])->name('checkout.process');
    Route::get('/dat-hang-thanh-cong/{id}', [CheckoutController::class, 'success'])->name('checkout.success');
});


// CartController
// Định tuyến trang thanh toán
// Route::get('/gio-hang', [CartController::class, 'index'])->name('cart.index');
Route::middleware('auth')->prefix('cart')->group(function () {
    Route::get('/', [CartController::class, 'index'])->name('cart.index');
    Route::post('/add', [CartController::class, 'add'])->name('cart.add');
    Route::post('/update', [CartController::class, 'update'])->name('cart.update');
    Route::post('/remove', [CartController::class, 'remove'])->name('cart.remove');
});


// 1. Đăng nhập
Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login'); // Hiện trang login
Route::post('/login', [AuthController::class, 'login']); // Xử lý đăng nhập

// 2. Đăng ký
Route::get('/register', [AuthController::class, 'showRegisterForm'])->name('register'); // Hiện trang đăng ký
Route::post('/register', [AuthController::class, 'register']); // Xử lý đăng ký

// 3. Đăng xuất
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

// Nhóm route dành cho Admin
Route::prefix('admin')->middleware(['auth', 'admin'])->name('admin.')->group(function () {
    // Trang chủ Admin (Thống kê)
        Route::get('/', [DashboardController::class, 'index'])->name('dashboard');
      // Quản lý Sách (Tự động tạo 7 route CRUD)
        Route::resource('categories', CategoryController::class);
        Route::resource('books', App\Http\Controllers\Admin\BookController::class);

        // 1. Route Hiển thị danh sách
        Route::get('/users', [App\Http\Controllers\Admin\UserController::class, 'index'])->name('users.index');

        // 2. Route THÊM MỚI (Phải đặt lên trên các route có {id})
        Route::get('/users/create', [App\Http\Controllers\Admin\UserController::class, 'create'])->name('users.create'); 
        Route::post('/users', [App\Http\Controllers\Admin\UserController::class, 'store'])->name('users.store'); 

        // 3. Route Sửa (có {id})
        Route::get('/users/{id}/edit', [App\Http\Controllers\Admin\UserController::class, 'edit'])->name('users.edit');
        Route::put('/users/{id}', [App\Http\Controllers\Admin\UserController::class, 'update'])->name('users.update');

        // 4. Route Xóa (có {id})
        Route::delete('/users/{id}', [App\Http\Controllers\Admin\UserController::class, 'destroy'])->name('users.destroy');


        // Route Khôi phục (Restore)
        Route::post('/users/{id}/restore', [App\Http\Controllers\Admin\UserController::class, 'restore'])->name('users.restore');

        // Route Xóa vĩnh viễn (Force Delete)
        Route::delete('/users/{id}/force', [App\Http\Controllers\Admin\UserController::class, 'forceDelete'])->name('users.forceDelete');

        // Quản lý Tác giả
        Route::resource('authors', AuthorController::class);

        // Quản Lý SlideShow
        Route::resource('banners', BannerController::class);
});

// Nhóm route yêu cầu đăng nhập
Route::middleware('auth')->group(function () {
    Route::get('/ho-so', [UserProfileController::class, 'index'])->name('profile.index');
    Route::post('/ho-so', [UserProfileController::class, 'update'])->name('profile.update');

    // Route Đổi mật khẩu
    Route::get('/doi-mat-khau', [UserProfileController::class, 'showChangePasswordForm'])->name('profile.password');
    Route::post('/doi-mat-khau', [UserProfileController::class, 'changePassword'])->name('profile.password.update');

    Route::get('/don-mua', [App\Http\Controllers\OrderController::class, 'index'])->name('profile.orders');
    Route::get('/don-mua/{id}', [App\Http\Controllers\OrderController::class, 'show'])->name('profile.orders.show');
    Route::post('/don-mua/huy/{id}', [App\Http\Controllers\OrderController::class, 'cancel'])->name('profile.orders.cancel');

    Route::get('/yeu-thich', [FavoriteController::class, 'index'])->name('profile.favorites');
    Route::post('/yeu-thich/{id}', [FavoriteController::class, 'toggle'])->name('profile.favorites.toggle');

    Route::post('/san-pham/danh-gia', [ReviewController::class, 'store'])->name('product.review.store');
});

// ProductController - Route danh sách sản phẩm (dùng cho thanh tìm kiếm ở header)
Route::get('/products', [ProductController::class, 'index'])->name('products.index');


