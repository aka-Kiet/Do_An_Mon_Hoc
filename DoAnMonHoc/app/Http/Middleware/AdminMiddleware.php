<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth; // sử dụng 

class AdminMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        // Kiểm tra: Đã đăng nhập CHƯA? và Role có phải ADMIN không?
        if (Auth::check() && Auth::user()->role === 'admin') {
            return $next($request); // Cho qua
        }
        
        // Không phải Admin -> Đuổi về nhà
        return redirect()->route('home.index')->with('error', 'Bạn không có quyền truy cập!');
    }
}
