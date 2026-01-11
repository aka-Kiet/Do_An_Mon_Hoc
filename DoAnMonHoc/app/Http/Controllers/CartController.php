<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CartController extends Controller
{
    public function index() {
        $viewData = [];
        $viewData["title"] = "Giỏ hàng";

        return view('cart.index')->with("viewData", $viewData);
    }
}
