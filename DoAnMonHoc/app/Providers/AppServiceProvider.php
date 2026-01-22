<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Auth;
use App\Models\Cart;
use App\Models\Setting;
use Illuminate\Support\Facades\Schema;


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

            $settings = [];
            if (Schema::hasTable('settings')) {
                // Lấy tất cả và chuyển thành mảng: ['email' => 'abc@gmail.com', 'logo' => 'img.jpg']
                $settings = Setting::all()->pluck('value', 'key')->toArray();
            }

            $view->with([
                'headerCartCount' => $cartCount,
                'headerCartTotal' => $cartTotal,
                'settings' => $settings,
            ]);
        });
    }
}
