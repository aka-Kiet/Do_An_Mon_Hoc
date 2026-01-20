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

  
    public function add(Request $request)// Huỳnh sửa lại hàm add
    {
        // 1. Validate cả book_id và quantity
        $request->validate([
            'book_id' => 'required|exists:books,id',
            'quantity' => 'nullable|integer|min:1' // Lấy số lượng mà khách hàng chọn
        ]);

        // 2. Lấy giỏ hàng
        $cart = Cart::firstOrCreate([
            'user_id' => auth()->id()
        ]);

        // 3. Lấy số lượng khách chọn (mặc định là 1 nếu không có)
        $qty = $request->input('quantity', 1);

        // 4. Kiểm tra sách đã có trong giỏ chưa
        $item = $cart->items()->where('book_id', $request->book_id)->first();
        $book = Book::findOrFail($request->book_id);

        if ($item) {
            // Nếu có rồi thì cộng thêm số lượng khách chọn
            $item->quantity += $qty;
            $item->save();
        } else {
            // Nếu chưa có thì tạo mới
            $cart->items()->create([
                'book_id'  => $book->id,
                'quantity' => $qty, // Dùng số lượng khách chọn
                'price'    => $book->price
            ]);
        }

        // --- QUAN TRỌNG: TRẢ VỀ JSON THAY VÌ REDIRECT ---
        return response()->json([
            'success' => true,
            'message' => 'Đã thêm ' . $book->name . ' vào giỏ hàng thành công!'
        ]);


        // return redirect()->back()->with('success', 'Đã thêm "' . $book->name . '" vào giỏ hàng thành công!');
        
        // $message = 'Đã thêm "' . $book->name . '" vào giỏ hàng thành công!';

        // // 👇 ĐOẠN CODE THÔNG MINH (Xử lý cả 2 trường hợp)
        // if ($request->wantsJson()) {
        //     // Nếu là AJAX (JS) thì trả về JSON
        //     return response()->json([
        //         'success' => true,
        //         'message' => $message
        //     ]);
        // }

        // // Nếu là Form bình thường (Mặc định) thì Redirect
        // return redirect()->back()->with('success', $message);
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
