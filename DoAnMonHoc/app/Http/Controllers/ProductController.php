<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Book; // Import Model Book
use App\Models\Category; // Import Model Category
use Illuminate\Support\Str; // Import Str để tạo slug

class ProductController extends Controller
{
    public function index(Request $req) {
        $viewData = [];
        $viewData["title"] = "Sản phẩm";
    
        // 1. Lấy danh mục
        $categories = Category::withCount('books')->get();
    
        // 2. Khởi tạo Query
        $query = Book::where('is_active', true)->with('author');
    
        // --- LỌC TÌM KIẾM (Search) ---
        $keyword = $req->query('search'); 
        if ($keyword) {
            $query->where(function ($q) use ($keyword) {
                $q->where('name', 'like', "%{$keyword}%")          
                ->orWhere('description', 'like', "%{$keyword}%"); 
            });
        }
    
        // --- LỌC DANH MỤC (Mới) ---
        // Nhận mảng id từ checkbox: ?categories[]=1&categories[]=2
        if ($req->has('categories')) {
            $query->whereIn('category_id', $req->categories);
        }
    
        // --- LỌC GIÁ (Mới) ---
        if ($req->filled('min_price')) {
            $query->where('price', '>=', $req->min_price);
        }
        if ($req->filled('max_price')) {
            $query->where('price', '<=', $req->max_price);
        }
    
        // --- LỌC ĐÁNH GIÁ (Mới) ---
        if ($req->filled('rating')) {
            $query->where('avg_rating', '>=', $req->rating);
        }
    
        // --- SẮP XẾP (Sort) ---
        $sortOption = $req->query('sort');
        switch ($sortOption) {
            case 'price_asc': $query->orderBy('price', 'asc'); break;
            case 'price_desc': $query->orderBy('price', 'desc'); break;
            case 'best_seller': $query->orderBy('sold_quantity', 'desc'); break;
            case 'newest': default: $query->orderBy('created_at', 'desc'); break;
        }
    
        // 3. Phân trang & Giữ lại tham số trên URL
        // Quan trọng: Phải thêm tất cả tham số lọc vào appends
        $products = $query->paginate(9)->appends($req->all()); 
        // $req->all() sẽ tự động lấy hết: sort, search, categories, min_price... đưa vào link phân trang
    
        // 4. Lấy sách bán chạy (Sidebar)
        $bestSellers = Book::where('is_active', true)
                            ->orderBy('sold_quantity', 'desc')
                            ->take(4)->get();
    
        $viewData["categories"] = $categories;
        $viewData["products"] = $products;
        $viewData["bestSellers"] = $bestSellers;
    
        // Ajax
        if ($req->ajax()) {
            return view('product.list')->with("viewData", $viewData)->render();
        }
    
        return view('product.index')->with("viewData", $viewData);
    }

    public function show($slug) 
    {
        $viewData = [];

        // 1. Lấy thông tin chi tiết cuốn sách
        $book = Book::with(['category', 'author', 'images', 'reviews.user'])
                    ->where('slug', $slug) // Tìm dòng có slug khớp
                    ->firstOrFail(); // Nếu không thấy thì báo lỗi 404

        // 2. Logic tính phần trăm giảm giá
        $discountPercent = 0;
        // Thêm điều kiện $book->sale_price > 0
        if($book->price > 0 && $book->sale_price > 0 && $book->sale_price < $book->price) {
            $discountPercent = round((($book->price - $book->sale_price) / $book->price) * 100);
        }

        // 3. Lấy sách liên quan
        $relatedBooks = Book::where('category_id', $book->category_id)
                            ->where('id', '!=', $book->id)
                            ->where('is_active', true)
                            ->inRandomOrder()
                            ->take(4)
                            ->get();

        // k cùng danh mục thì lấy ngẫu nhiên
        if ($relatedBooks->isEmpty()) {
            $relatedBooks = Book::where('id', '!=', $book->id)
                            ->where('is_active', true)
                            ->inRandomOrder()
                            ->take(4)
                            ->get();
        }

        $viewData["title"] = $book->name;
        $viewData["book"] = $book;
        $viewData["discountPercent"] = $discountPercent;
        $viewData["relatedBooks"] = $relatedBooks;

        return view("product.show")->with("viewData", $viewData);
    }
}
