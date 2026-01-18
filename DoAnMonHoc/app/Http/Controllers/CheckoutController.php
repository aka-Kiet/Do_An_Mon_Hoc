<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Models\Cart;        
use App\Models\Order;     // <--- Cần cho bước lưu đơn hàng
use App\Models\OrderItem; // <--- Cần cho bước lưu chi tiết
use App\Models\Category;  // <--- Cần cho Header

class CheckoutController extends Controller
{
    public function index() {
        $viewData = [];
        $viewData["title"] = "Thanh toán";

        $user = Auth::user();

        // Lấy giỏ hàng của user
        $cart = Cart::where('user_id', $user->id)->with('items.book')->first();

        // Nếu giỏ hàng trống hoặc không tồn tại -> Đá về trang giỏ hàng
        if(!$cart || $cart->items->count() == 0) {
            return redirect()->route('cart.index')->with('error', 'Giỏ hàng của bạn đang trống.');
        }

        // Tính toán tổng tiền
        $subtotal = $cart->items->sum(function($item) {
            return $item->book->price * $item->quantity;
        });

        $viewData = [
            'cart' => $cart,
            'subtotal' => $subtotal,
            'total' => $subtotal, // Cộng thêm phí ship
        ];

        return view('checkout.index', compact('user', 'viewData'));
    }

    public function process(Request $request) {
        // Validate dữ liệu
        $request->validate([
            'name' => 'required|string|max:255',
            'phone' => 'required|string|max:20',
            'address' => 'required|string|max:255',
            'note' => 'nullable|string'
        ], [
            'name.required' => 'Vui lòng nhập họ tên người nhận',
            'phone.required' => 'Vui lòng nhập số điện thoại',
            'address.required' => 'Vui lòng nhập địa chỉ giao hàng',
        ]);

        $user = Auth::user();
        $cart = Cart::where('user_id', $user->id)->with('items.book')->first();

        if(!$cart || $cart->items->count() == 0) {
            return redirect()->route('cart.index');
        }

        try {
            DB::beginTransaction(); // Bắt đầu giao dịch

            // 1. Tạo đơn hàng
            $totalPrice = $cart->items->sum(function($item) {
                return $item->book->price * $item->quantity;
            });

            $order = Order::create([
                'user_id' => $user->id,
                'name' => $request->name,
                'phone' => $request->phone,
                'address' => $request->address,
                'total_price' => $totalPrice,
                'status' => 'pending', // Chờ xác nhận
                'payment_method' => $request->payment_method,
            ]);

            // 2. Chuyển CartItem sang OrderItem
            foreach ($cart->items as $item) {
                OrderItem::create([
                    'order_id' => $order->id,
                    'book_id' => $item->book_id,
                    'quantity' => $item->quantity,
                    'price' => $item->book->price
                ]);
            }

            // 3. Xóa sạch giỏ hàng
            $cart->items()->delete();


            DB::commit(); // Xác nhận giao dịch thành công

            // Thay vì redirect về profile.orders, ta redirect về trang success và truyền ID đơn hàng
            return redirect()->route('checkout.success', ['id' => $order->id]);

        } catch (\Exception $e) {
            DB::rollBack(); // Hoàn tác nếu có lỗi
            return back()->with('error', 'Có lỗi xảy ra khi xử lý đơn hàng: ' . $e->getMessage());
        }

    }

    public function success($id)
    {
        // Tìm đơn hàng
        $order = Order::where('id', $id)->where('user_id', Auth::id())->firstOrFail();

        // Cấu hình QR Code (Thay thông tin của bạn vào đây)
        $bankId = 'VCB'; // Ví dụ: MB, VCB, TPB, TCB...
        $accountNo = '1039098656'; // Số tài khoản của bạn
        $template = 'compact'; // Kiểu hiển thị (compact, print...)
        $amount = $order->total_price;
        $description = 'THANHTOAN DH' . $order->id; // Nội dung ck: THANHTOAN DH15

        // Link ảnh QR
        $qrUrl = "https://img.vietqr.io/image/{$bankId}-{$accountNo}-{$template}.png?amount={$amount}&addInfo={$description}";

        return view('checkout.success', compact('order', 'qrUrl'));
    }
}
