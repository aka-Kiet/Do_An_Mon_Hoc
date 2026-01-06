<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\HomeController; //Sử dụng HomeController

// Định tuyến của trang chủ
Route::get('/', [HomeController::class, 'index'])->name('home.index');
