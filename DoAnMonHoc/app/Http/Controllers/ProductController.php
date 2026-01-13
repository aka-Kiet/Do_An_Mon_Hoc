<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Book; // Import Model

class ProductController extends Controller
{
    public function index(Request $req) {
        $viewData = [];
        $viewData["title"] = "Sản phẩm";

        $products = Book::where('is_active', true)
                            ->with('author')
                            ->orderBy('created_at', 'desc')
                            ->paginate(9);

        $bestSellers = Book::where('is_active', true)
                                ->orderBy('sold_quantity', 'desc')
                                ->take(4)
                                ->get();

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
