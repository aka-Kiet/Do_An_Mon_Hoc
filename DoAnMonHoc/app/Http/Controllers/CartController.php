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

    // public function index()
    // {
    //     $cart = $this->getCart();
        
    //     $viewData = [];
    //     $viewData['cart'] = $cart;
    //     $viewData['subtotal'] = $cart->subtotal();
    //     $viewData['shipping'] = 0;
    //     $viewData['total'] = $viewData['subtotal'];

    //     return view('cart.index', $viewData);
    // }
    public function index()
    {
        $cart = $this->getCart();

        // phân trang cart items (5 sản phẩm / trang)
        $items = $cart->items()
            ->with('book')
            ->orderByDesc('id')
            ->paginate(5);

        return view('cart.index', [
            'cart'     => $cart,
            'items'    => $items,      // ← QUAN TRỌNG
            'subtotal' => $cart->subtotal(),
            'shipping' => 0,
            'total'    => $cart->subtotal(),
        ]);
    }

  
    public function add(Request $request)
    {
        // 1. Validate
        $request->validate([
            'book_id' => 'required|exists:books,id',
            'quantity' => 'nullable|integer|min:1'
        ]);

        // 2. Logic thêm vào database (Giữ nguyên code cũ của bạn)
        $cart = Cart::firstOrCreate(['user_id' => auth()->id()]);
        $qty = $request->input('quantity', 1);
        
        $item = $cart->items()->where('book_id', $request->book_id)->first();
        $book = Book::findOrFail($request->book_id);

        if ($item) {
            $item->quantity += $qty;
            $item->save();
        } else {
            $cart->items()->create([
                'book_id'  => $book->id,
                'quantity' => $qty,
                'price'    => $book->price
            ]);
        }

        // Nếu bấm nút "Mua ngay" -> Chuyển đến trang thanh toán
        if ($request->input('action') === 'buy') {
            return redirect()->route('checkout.index')->with('success', 'Đã thêm vào giỏ hàng!');
        }

        // Nếu bấm "Thêm giỏ hàng" -> Load lại trang hiện tại (Redirect Back)
        return redirect()->back()->with('success', 'Đã thêm "' . $book->name . '" vào giỏ hàng thành công!');
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
