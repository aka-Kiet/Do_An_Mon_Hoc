<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index() {
        $viewData = [];
        $viewData["title"] = "Trang chủ";

        // Gọi hàm logic riêng của từng bạn
        $banners        = $this->getBanners();          // Thiện Nhân làm hàm này
        $categories     = $this->getCategories();       // Công Vương làm hàm này
        $latestBooks    = $this->getLatestBooks();      // Như Huỳnh làm hàm này
        $highlightBooks = $this->getHighlightBooks();   // Leader Kiệt làm hàm này

        // Truyền biến sang View (dùng compact cho gọn, tương đương mảng viewData)
        return view('home.index', compact('viewData', 'banners', 'categories', 'latestBooks', 'highlightBooks'));
    }

    // --- KHU VỰC CỦA THIỆN NHÂN ---
    private function getBanners() {
        // Nhân viết logic lấy banner ở đây
        // Ví dụ: return \App\Models\Banner::where('is_active', true)->get();
    }

    // --- KHU VỰC CỦA CÔNG VƯƠNG ---
    private function getCategories() {
        // Vương viết logic ở đây
        // Ví dụ: return \App\Models\Category::where('is_active', true)->take(4)->get();
    }

    // --- KHU VỰC CỦA NHƯ HUỲNH ---
    private function getLatestBooks() {
        // Huỳnh viết logic ở đây
        // Ví dụ: return \App\Models\Book::orderBy('created_at', 'desc')->take(8)->get();
    }

    // --- KHU VỰC CỦA LEADER KIỆT ---
    private function getHighlightBooks() {
        // Kiệt viết logic ở đây 
        return \App\Models\Book::with('author')
                           ->where('is_active', true) 
                           ->orderBy('created_at', 'desc')
                           ->take(3) // Chỉ lấy 3 cuốn theo yêu cầu
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
