<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\HomeController; //Sử dụng HomeController
use App\Http\Controllers\ProductController; //Sử dụng ProductController
use App\Http\Controllers\CheckoutController; //Sử dụng CheckoutController
use App\Http\Controllers\CartController; //Sử dụng CheckoutController

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
Route::get('/san-pham/{id}', [ProductController::class, 'show'])->name('product.show');


// CheckoutController
// Định tuyến trang thanh toán
Route::get('/thanh-toan', [CheckoutController::class, 'index'])->name('checkout.index');


// CartController
// Định tuyến trang thanh toán
Route::get('/gio-hang', [CartController::class, 'index'])->name('cart.index');



