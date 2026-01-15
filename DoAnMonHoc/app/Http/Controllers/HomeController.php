<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Banner;
use App\Models\Category;
use App\Models\Book;

class HomeController extends Controller
{
    public function index() {
        $viewData = [];
        $viewData["title"] = "Trang chủ";

        // Gọi hàm logic riêng 
        $banners        = $this->getBanners();          
        $categories     = $this->getCategories();       
        $latestBooks    = $this->getLatestBooks();      
        $highlightBooks = $this->getHighlightBooks();   
        $bestSellerBooks = $this->getBestSellerBooks();
        $topRatedBooks = $this->getTopRatedBooks();

        // Truyền biến sang View (dùng compact cho gọn, tương đương mảng viewData)
        return view('home.index', compact('viewData', 'banners', 'categories', 'latestBooks', 'highlightBooks', 'bestSellerBooks', 'topRatedBooks'));
    }

    // --- KHU VỰC CỦA THIỆN NHÂN ---
    private function getBanners() {
        // Lấy banner đang BẬT (active), sắp xếp theo thứ tự ưu tiên
        return Banner::where('is_active', 1)
                     ->orderBy('sort_order', 'asc')
                     ->get();
    }

    private function getCategories() {
        // Lấy 4 danh mục đang BẬT, sắp xếp, và ĐẾM SỐ SÁCH (quan trọng)
        return Category::where('is_active', 1)
                       ->orderBy('sort_order', 'asc')
                       ->take(4)
                       ->withCount('books') // Hàm này giúp hiện số lượng sách ngoài View
                       ->get();
    }




    // --- KHU VỰC CỦA CÔNG VƯƠNG ---
    private function getLatestBooks() {
        // Vương viết logic ở đây
        return Book::with('author')
            ->where('is_active', true)
            ->latest()
            ->take(3) // lấy 4 cuốn mới nhất
            ->get();
    }
    private function getHighlightBooks() {
         // Vương viết logic ở đây
         return Book::with('author')
            ->where('is_active', true)
            ->orderByDesc('sold_quantity')
            ->orderByDesc('created_at')
            ->take(4) // Lấy 4 cuốn nổi bật mới nhất và được đánh giá cao
            ->get();   
}
    private function getBestSellerBooks() {
        // Vương viết logic ở đây
        return Book::with('author')
            ->where('is_active', true)
            ->orderByDesc('sold_quantity')
            ->take(3) // Lấy 3 cuốn bán chạy nhất
            ->get();
    }
    private function getTopRatedBooks() {
        // Vương viết logic ở đây
        return Book::with('author')
            ->where('is_active', true)
            ->orderByDesc('avg_rating')
            ->take(3) // Lấy 3 cuốn đánh giá cao nhất
            ->get();
    }
    public function about() {
        $viewData = [];
        $viewData["title"] = "Giới thiệu";

        return view('home.about')->with("viewData", $viewData);
    }

    public function contact() {
        $viewData = [];
        $viewData["title"] = "Liên hệ";

        return view('home.contact')->with("viewData", $viewData);
    }

    public function policy() {
        $viewData = [];
        $viewData["title"] = "Chính sách";

        return view('home.policy')->with("viewData", $viewData);
    }
}
