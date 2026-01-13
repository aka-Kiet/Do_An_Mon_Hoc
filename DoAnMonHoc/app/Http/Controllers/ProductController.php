<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Book; // Import Model Book
use App\Models\Category; // Import Model Category

class ProductController extends Controller
{
    public function index(Request $req) {
        $viewData = [];
        $viewData["title"] = "Sản phẩm";

        $categories = Category::withCount('books')->get();

        $products = Book::where('is_active', true)
                            ->with('author')
                            ->orderBy('created_at', 'desc')
                            ->paginate(4);

        $bestSellers = Book::where('is_active', true)
                                ->orderBy('sold_quantity', 'desc')
                                ->take(4)
                                ->get();

        

        $viewData["categories"] = $categories;
        $viewData["products"] = $products;
        $viewData["bestSellers"] = $bestSellers;

        return view('product.index')->with("viewData", $viewData);
    }

    public function show($id) {
        $viewData = [];
        $viewData ["title"]= "Chi tiết sản phẩm";

        return view("product.show")->with("viewData", $viewData);
    }
}
