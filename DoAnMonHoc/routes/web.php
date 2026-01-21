<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\HomeController; 
use App\Http\Controllers\ProductController; 
use App\Http\Controllers\CheckoutController; 
use App\Http\Controllers\CartController; 
use App\Http\Controllers\ReviewController; 
use App\Http\Controllers\AuthController; 
use App\Http\Controllers\UserProfileController; 
use App\Http\Controllers\FavoriteController; 
use App\Http\Controllers\Admin\CategoryController; 
use App\Http\Controllers\Admin\DashboardController; 
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\AuthorController;
use App\Http\Controllers\Admin\BannerController;
use App\Http\Controllers\Admin\BookController; 
use App\Http\Controllers\ContactController; // 1. Của Khách (Trang chủ)
use App\Http\Controllers\Admin\ContactController as AdminContactController; // 2. Của Admin (Đặt tên khác để không trùng)

use App\Http\Controllers\Admin\OrderController as AdminOrderController;


// --- CÁC ROUTE TRANG CHỦ (GIỮ NGUYÊN) ---

Route::get('/', [HomeController::class, 'index'])->name('home.index');
Route::get('/gioi-thieu', [HomeController::class, 'about'])->name('home.about');
Route::get('/lien-he', [HomeController::class, 'contact'])->name('home.contact');
Route::post('/lien-he', [ContactController::class, 'store'])->name('contact.store'); // Dùng Contact của Khách
Route::get('/chinh-sach', [HomeController::class, 'policy'])->name('home.policy');

// ProductController
Route::get('/san-pham', [ProductController::class, 'index'])->name('product.index');
Route::get('/san-pham/{slug}', [ProductController::class, 'show'])->name('product.show');
Route::get('/san-pham/trang-thai/{slug}', [ProductController::class, 'checkRealtimeStatus'])->name('product.checkRealtimeStatus');

// CheckoutController
Route::middleware('auth')->group(function () {
    Route::get('/thanh-toan', [CheckoutController::class, 'index'])->name('checkout.index');
    Route::post('/thanh-toan', [CheckoutController::class, 'process'])->name('checkout.process');
    Route::get('/dat-hang-thanh-cong/{id}', [CheckoutController::class, 'success'])->name('checkout.success');
});

// CartController
Route::middleware('auth')->prefix('cart')->group(function () {
    Route::get('/', [CartController::class, 'index'])->name('cart.index');
    Route::post('/add', [CartController::class, 'add'])->name('cart.add');
    Route::post('/update', [CartController::class, 'update'])->name('cart.update');
    Route::post('/remove', [CartController::class, 'remove'])->name('cart.remove');
});

// Auth
Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::get('/register', [AuthController::class, 'showRegisterForm'])->name('register');
Route::post('/register', [AuthController::class, 'register']);
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');


// --- NHÓM ROUTE ADMIN ---
Route::prefix('admin')->middleware(['auth', 'admin'])->name('admin.')->group(function () {
    
    Route::get('/', [DashboardController::class, 'index'])->name('dashboard');
    Route::resource('categories', CategoryController::class);

    // Quản lý Sách
    Route::delete('/books/soft-delete', [BookController::class, 'softDelete'])->name('books.softDelete');
    Route::patch('/books/restore-all', [BookController::class, 'restoreAll'])->name('books.restoreAll');
    Route::get('/books/trash', [BookController::class, 'trash'])->name('books.trash');
    Route::patch('/books/{id}/restore', [BookController::class, 'restore'])->name('books.restore');
    Route::delete('/books/{id}/force-delete', [BookController::class, 'forceDelete'])->name('books.forceDelete');
    Route::delete('/books/force-delete-all', [BookController::class, 'forceDeleteAll'])->name('books.forceDeleteAll');
    Route::resource('books', BookController::class);
    
    // Quản lý Users
    Route::get('/users', [UserController::class, 'index'])->name('users.index');
    Route::get('/users/create', [UserController::class, 'create'])->name('users.create'); 
    Route::post('/users', [UserController::class, 'store'])->name('users.store'); 
    Route::get('/users/{id}/edit', [UserController::class, 'edit'])->name('users.edit');
    Route::put('/users/{id}', [UserController::class, 'update'])->name('users.update');
    Route::delete('/users/{id}', [UserController::class, 'destroy'])->name('users.destroy');
    Route::post('/users/{id}/restore', [UserController::class, 'restore'])->name('users.restore');
    Route::delete('/users/{id}/force', [UserController::class, 'forceDelete'])->name('users.forceDelete');

    // Quản lý Reviews
    Route::get('/reviews', [App\Http\Controllers\Admin\ReviewController::class, 'index'])->name('reviews.index');
    Route::delete('/reviews/{id}', [App\Http\Controllers\Admin\ReviewController::class, 'destroy'])->name('reviews.destroy');
    Route::post('/reviews/bulk-delete', [App\Http\Controllers\Admin\ReviewController::class, 'bulkDelete'])->name('reviews.bulkDelete');

    // Quản lý Tác giả & Banner
    Route::resource('authors', AuthorController::class);
    Route::resource('banners', BannerController::class);

    // Quản lý Đơn hàng
    Route::get('/orders/trash', [AdminOrderController::class, 'trash'])->name('orders.trash');
    Route::post('/orders/{id}/restore', [AdminOrderController::class, 'restore'])->name('orders.restore');
    Route::delete('/orders/{id}/force-delete', [AdminOrderController::class, 'forceDelete'])->name('orders.force-delete');
    Route::resource('orders', AdminOrderController::class);

    
    // 👇👇👇 ĐÃ SỬA CHỖ NÀY 👇👇👇
    // Sử dụng AdminContactController thay vì ContactController thường
    Route::resource('contacts', AdminContactController::class); 

});


// --- NHÓM ROUTE USER (Đăng nhập mới xem được) ---
Route::middleware('auth')->group(function () {
    Route::get('/ho-so', [UserProfileController::class, 'index'])->name('profile.index');
    Route::post('/ho-so', [UserProfileController::class, 'update'])->name('profile.update');
    Route::get('/doi-mat-khau', [UserProfileController::class, 'showChangePasswordForm'])->name('profile.password');
    Route::post('/doi-mat-khau', [UserProfileController::class, 'changePassword'])->name('profile.password.update');

    // Đơn mua & Yêu thích & Đánh giá
    Route::get('/don-mua', [App\Http\Controllers\OrderController::class, 'index'])->name('profile.orders');
    Route::get('/don-mua/{id}', [App\Http\Controllers\OrderController::class, 'show'])->name('profile.orders.show');
    Route::post('/don-mua/huy/{id}', [App\Http\Controllers\OrderController::class, 'cancel'])->name('profile.orders.cancel');

    Route::get('/yeu-thich', [FavoriteController::class, 'index'])->name('profile.favorites');
    Route::post('/yeu-thich/{id}', [FavoriteController::class, 'toggle'])->name('profile.favorites.toggle');

    Route::post('/san-pham/danh-gia', [ReviewController::class, 'store'])->name('product.review.store');
    Route::post('/gio-hang/them', [CartController::class, 'addToCart'])->name('cart.add');
});

// Route tìm kiếm
Route::get('/products', [ProductController::class, 'index'])->name('products.index');