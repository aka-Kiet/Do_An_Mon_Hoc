<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
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

        // Truyền biến sang View (dùng compact cho gọn, tương đương mảng viewData)
        return view('home.index', compact('viewData', 'banners', 'categories', 'latestBooks', 'highlightBooks'));
    }

    // --- KHU VỰC CỦA THIỆN NHÂN ---
    private function getBanners() {
        // Nhân viết logic lấy banner ở đây
        // Ví dụ: return \App\Models\Banner::where('is_active', true)->get();
    }
    private function getCategories() {
        // Nhân viết logic lấy banner ở đây
        // Ví dụ: return \App\Models\Category::where('is_active', true)->take(4)->get();
    }




    // --- KHU VỰC CỦA CÔNG VƯƠNG ---
    private function getLatestBooks() {
        // Vương viết logic ở đây
        return Book::with('author')
            ->where('is_active', true)
            ->latest()
            ->take(3) // lấy 3 cuốn mới nhất
            ->get();
    }
    private function getHighlightBooks() {
         // Vương viết logic ở đây
       
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
