<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\CartItem;
use App\Models\Book;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;


class CartController extends Controller
{
    protected function getCart()
    {
        if (!Auth::check()) {
            abort(401, 'Bạn cần đăng nhập');
        }

        return Cart::firstOrCreate([
            'user_id' => Auth::id(),
        ]);
    }

    public function index()
    {
        $cart = $this->getCart()->load('items.book');
        
        $viewData = [];
        $viewData['cart'] = $cart;
        $viewData['subtotal'] = $cart->subtotal();
        $viewData['shipping'] = 0;
        $viewData['total'] = $viewData['subtotal'];

        return view('cart.index', $viewData);
    }

  
    public function add(Request $request)
    {
        $request->validate([
            'book_id' => 'required|exists:books,id'
        ]);

        $cart = Cart::firstOrCreate([
            'user_id' => auth()->id()
        ]);

        $item = $cart->items()->where('book_id', $request->book_id)->first();

        if ($item) {
            $item->increment('quantity');
        } else {
            $book = Book::findOrFail($request->book_id);

            $cart->items()->create([
                'book_id'  => $book->id,
                'quantity' => 1,
                'price'    => $book->price
            ]);
        }

        return redirect()->back()->with('success', 'Đã thêm sản phẩm vào giỏ hàng');
    }

    public function update(Request $request)
    {
        $request->validate([
            'item_id'  => 'required|exists:cart_items,id',
            'quantity' => 'required|integer|min:1'
        ]);

        $item = CartItem::where('id', $request->item_id)
            ->whereHas('cart', function ($q) {
                $q->where('user_id', auth()->id());
            })
            ->firstOrFail();

        $item->update([
            'quantity' => $request->quantity
        ]);

         return redirect()->route('cart.index')
            ->with('success', 'Đã cập nhật số lượng sản phẩm');
    }


   public function remove(Request $request)
    {
        $request->validate([
            'item_id' => 'required|exists:cart_items,id'
        ]);

        $item = CartItem::where('id', $request->item_id)
            ->whereHas('cart', fn ($q) =>
                $q->where('user_id', auth()->id())
            )
            ->firstOrFail();

        $item->delete();

        return redirect()->route('cart.index')
            ->with('success', 'Đã xóa sản phẩm');
    }

}
