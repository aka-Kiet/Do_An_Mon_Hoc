<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CheckoutController extends Controller
{
    public function index() {
        $viewData = [];
        $viewData["title"] = "Thanh toán";

        return view('checkout.index')->with("viewData", $viewData);
    }
}
