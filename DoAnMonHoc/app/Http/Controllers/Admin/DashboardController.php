<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Book;
use App\Models\Category;
use App\Models\Order;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
//    public function index()
//     {
//         return view('admin.dashboard', [
//             // Tổng số
//             'totalBooks' => Book::count(),
//             'totalCategories' => Category::count(),
//             'totalOrders' => Order::count(),

//             // Doanh thu
//             'totalRevenue' => Order::where('status', 'completed')->sum('total_price'),

//             // Top sách bán chạy
//             'bestSellingBooks' => Book::orderByDesc('sold_quantity')
//                 ->take(5)->get(),

//             // Danh mục nhiều sách nhất
//             'topCategories' => Category::withCount('books')
//                 ->orderByDesc('books_count')
//                 ->take(5)->get(),

//             // Sách sắp hết
//             'lowStockBooks' => Book::where('quantity', '<=', 5)->get(),
//         ]);
//     }
        public function index()
        {
            $monthlyRevenue = Order::select(
                DB::raw('MONTH(created_at) as month'),
                DB::raw('SUM(total_price) as total')
            )
            ->where('status', 'completed')
            ->whereYear('created_at', now()->year)
            ->groupBy(DB::raw('MONTH(created_at)'))
            ->pluck('total', 'month');

            return view('admin.dashboard', [
                'totalBooks'      => Book::count(),
                'totalCategories' => Category::count(),
                'totalOrders'     => Order::count(),
                'totalRevenue'    => Order::where('status', 'completed')->sum('total_price'),

                'bestSellingBooks'=> Book::orderByDesc('sold_quantity')->take(5)->get(),
                'topCategories'   => Category::withCount('books')->orderByDesc('books_count')->take(5)->get(),
                'lowStockBooks'   => Book::where('quantity', '<=', 5)->get(),

                //  Biểu đồ
                'monthlyRevenue'  => $monthlyRevenue,
            ]);
        }

}