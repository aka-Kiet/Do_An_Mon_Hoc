<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Auth;
use App\Models\Cart;

class AppServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        //
    }

    public function boot(): void
    {
        View::composer('*', function ($view) {
            $cartCount = 0;
            $cartTotal = 0;

            if (Auth::check()) {
                $cart = Cart::with('items')->where('user_id', Auth::id())->first();

                if ($cart) {
                    $cartCount = $cart->items->sum('quantity');
                    $cartTotal = $cart->items->sum(function ($item) {
                        return $item->price * $item->quantity;
                    });
                }
            }

            $view->with([
                'headerCartCount' => $cartCount,
                'headerCartTotal' => $cartTotal,
            ]);
        });
    }
}
