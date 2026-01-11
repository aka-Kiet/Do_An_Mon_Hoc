<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index() {
        $viewData = [];
        $viewData["title"] = "Sản phẩm";

        return view('product.index')->with("viewData", $viewData);
    }

    public function show($id) {
        $viewData = [];
        $viewData ["title"]= "Chi tiết sản phẩm";

        return view("product.show")->with("viewData", $viewData);
    }
}
