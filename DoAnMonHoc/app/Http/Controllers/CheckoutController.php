<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Models\Cart;        
use App\Models\Order;     // Model quản lý đơn hàng tổng
use App\Models\OrderItem; // Model quản lý chi tiết từng món trong đơn
use App\Models\Category;  

class CheckoutController extends Controller
{
    /**
     * Bước 1: Hiển thị trang thanh toán
     * Người dùng xem lại danh sách, tổng tiền và điền form địa chỉ.
     */
    public function index() {
        $viewData = [];
        $viewData["title"] = "Thanh toán";

        $user = Auth::user();

        // Lấy giỏ hàng hiện tại của user
        // dùng with('items.book') để load sẵn thông tin sách (giá, tên, ảnh) nhằm tối ưu query
        $cart = Cart::where('user_id', $user->id)->with('items.book')->first();

        // Validation logic: Không cho vào trang thanh toán nếu giỏ hàng trống
        if(!$cart || $cart->items->count() == 0) {
            return redirect()->route('cart.index')->with('error', 'Giỏ hàng của bạn đang trống.');
        }

        // Tính tổng tiền hàng (Server-side calculation để bảo mật, không tin tưởng dữ liệu từ client gửi lên)
        $subtotal = $cart->items->sum(function($item) {
            return $item->book->price * $item->quantity;
        });

        $viewData = [
            'title'    => 'Thanh toán',
            'cart'     => $cart,
            'subtotal' => $subtotal,
            'total'    => $subtotal, // Ở đây bạn đang để ship = 0. Nếu có phí ship, cộng vào đây.
        ];

        return view('checkout.index', compact('user', 'viewData'));
    }

    /**
     * Bước 2: Xử lý đặt hàng (CRITICAL SECTION)
     * Đây là hàm quan trọng nhất, xử lý giao dịch, trừ kho và lưu đơn hàng.
     */
    public function process(Request $request) {
        // 1. Validate dữ liệu người nhận
        $request->validate([
            'name' => 'required|string|max:255',
            'phone' => 'required|string|max:20',
            'address' => 'required|string|max:255',
            'note' => 'nullable|string'
        ], [
            // Custom thông báo lỗi tiếng Việt
            'name.required' => 'Vui lòng nhập họ tên người nhận',
            'phone.required' => 'Vui lòng nhập số điện thoại',
            'address.required' => 'Vui lòng nhập địa chỉ giao hàng',
        ]);

        $user = Auth::user();
        $cart = Cart::where('user_id', $user->id)->with('items.book')->first();

        // 2. 👇 KIỂM TRA TỒN KHO (Stock Check)
        // Trước khi chốt đơn, phải kiểm tra xem sách còn đủ số lượng không.
        // Tránh trường hợp khách A bỏ giỏ hàng tuần trước, nay vào thanh toán nhưng sách đã hết.
        foreach ($cart->items as $item) {
            if ($item->book->quantity < $item->quantity) {
                return back()->with('error', 'Sản phẩm "' . $item->book->name . '" chỉ còn lại ' . $item->book->quantity . ' cuốn. Vui lòng cập nhật lại giỏ hàng.');
            }
        }

        // Kiểm tra lại lần nữa xem giỏ có rỗng không (phòng trường hợp xoá item ở tab khác)
        if(!$cart || $cart->items->count() == 0) {
            return redirect()->route('cart.index');
        }

        try {
            // 3. DATABASE TRANSACTION (Giao dịch)
            // Bắt đầu một chuỗi hành động "Nguyên tử" (Atomic).
            // Nếu 1 trong các bước bên dưới lỗi, toàn bộ dữ liệu sẽ quay về trạng thái ban đầu (Rollback).
            // Đảm bảo không bao giờ có chuyện: Đã tạo đơn hàng nhưng chưa trừ tồn kho.
            DB::beginTransaction(); 

            // Tính lại tổng tiền lần cuối (Security)
            $totalPrice = $cart->items->sum(function($item) {
                return $item->book->price * $item->quantity;
            });

            // 3.1. Tạo bản ghi Order (Thông tin chung)
            $order = Order::create([
                'user_id' => $user->id,
                'name' => $request->name,
                'phone' => $request->phone,
                'address' => $request->address,
                'total_price' => $totalPrice,
                'status' => 'pending', // Mặc định là chờ xử lý
                'payment_method' => $request->payment_method, // COD hoặc VNPAY/MOMO
            ]);

            // 3.2. Chuyển dữ liệu từ CartItem sang OrderItem
            // CartItem là tạm thời (sẽ xoá), OrderItem là lịch sử (lưu mãi mãi)
            foreach ($cart->items as $item) {
                OrderItem::create([
                    'order_id' => $order->id,
                    'book_id' => $item->book_id,
                    'quantity' => $item->quantity,
                    'price' => $item->book->price // Lưu cứng giá tại thời điểm mua (đề phòng sau này tăng giá)
                ]);

                $book = $item->book;

                // 3.3. Cập nhật kho và thống kê
                // Trừ số lượng tồn kho
                $book->decrement('quantity', $item->quantity);

                // Tăng số lượng đã bán (Dùng để hiển thị top bán chạy)
                $book->increment('sold_quantity', $item->quantity);
            }

            // 3.4. Xóa sạch giỏ hàng sau khi mua thành công
            $cart->items()->delete();

            // Chốt giao dịch: Lưu tất cả thay đổi vào Database
            DB::commit(); 

            // Chuyển hướng sang trang Thành công
            return redirect()->route('checkout.success', ['id' => $order->id]);

        } catch (\Exception $e) {
            // Nếu có bất kỳ lỗi gì trong khối try (kể cả lỗi SQL), code sẽ nhảy vào đây
            DB::rollBack(); // Hoàn tác, coi như chưa có gì xảy ra
            
            // Log lỗi ra file laravel.log để dev kiểm tra
            // \Log::error($e->getMessage());
            
            return back()->with('error', 'Có lỗi xảy ra khi xử lý đơn hàng: ' . $e->getMessage());
        }
    }

    /**
     * Bước 3: Trang thông báo thành công & Hiển thị mã QR
     */
    public function success($id)
    {
        // Tìm đơn hàng vừa tạo. 
        // QUAN TRỌNG: Thêm `where('user_id', Auth::id())` để đảm bảo User A không xem được đơn của User B
        $order = Order::where('id', $id)->where('user_id', Auth::id())->firstOrFail();

        // Cấu hình tạo mã VietQR động
        $bankId = 'VCB'; // Mã ngân hàng (Vietcombank)
        $accountNo = '1039098656'; // Số tài khoản nhận tiền
        $template = 'compact'; 
        $amount = $order->total_price;
        $description = 'THANHTOAN DH' . $order->id; // Nội dung chuyển khoản tự động kèm Mã đơn

        // Tạo link ảnh QR code từ API VietQR
        // Khi khách quét mã này, App ngân hàng sẽ tự điền Số tiền và Nội dung
        $qrUrl = "https://img.vietqr.io/image/{$bankId}-{$accountNo}-{$template}.png?amount={$amount}&addInfo={$description}";

        return view('checkout.success', compact('order', 'qrUrl'));
    }
}