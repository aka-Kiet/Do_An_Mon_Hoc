<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use App\Models\Order;
use App\Models\Category;

use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function index(Request $request) {

        $viewData = [];

        // Lấy user đang đăng nhập
        $user = Auth::user();

        // Query cơ bản: Lấy đơn hàng của user này
        $ordersQuery = Order::where('user_id', $user->id)->with('items.book');

        // Lọc theo trạng thái (Nếu có bấm vào Tab)
        // Ví dụ: ?status=pending
        if($request->has('status') && $request->status != 'all') {
            $ordersQuery->where('status', $request->status);
        }

        // Lấy dữ liệu, sắp xếp mới nhất lên đầu
        $orders = $ordersQuery->orderBy('created_at', 'desc')->get();

        // Data cho Header
        $viewData = [
            'title' => 'Đơn mua',
            'current_status' => $request->status ?? 'all' // Để active Tab
        ];

        return view('profile.orders', compact('orders', 'user', 'viewData'));
    }

    // Xem chi tiết đơn hàng
    public function show($id)
    {
        $user = Auth::user();

        // 1. Tìm đơn hàng theo ID và phải thuộc về User này
        // Eager load 'items.book' để lấy luôn thông tin sách
        $order = Order::where('id', $id)
                      ->where('user_id', $user->id)
                      ->with('items.book')
                      ->first();

        // 2. Nếu không tìm thấy (hoặc cố tình xem đơn người khác)
        if (!$order) {
            return redirect()->route('profile.orders')->with('error', 'Đơn hàng không tồn tại hoặc bạn không có quyền xem.');
        }

        // 3. Chuẩn bị dữ liệu Header
        $viewData = [
            'title' => 'Chi tiết đơn hàng #' . $id,
            'categories' => \App\Models\Category::all(),
        ];

        return view('profile.order_detail', compact('order', 'user', 'viewData'));
    }

    // Hàm Hủy đơn hàng
    public function cancel($id)
    {
        // 1. Tìm đơn hàng của user đang đăng nhập
        $order = Order::where('id', $id)->where('user_id', Auth::id())->first();

        // 2. Nếu không tìm thấy hoặc đơn hàng không phải của user
        if (!$order) {
            return back()->with('error', 'Đơn hàng không tồn tại!');
        }

        // 3. Kiểm tra trạng thái: Chỉ được hủy khi đang Chờ xác nhận
        if ($order->status == 'pending') {
            $order->status = 'cancelled';
            $order->save();
            return back()->with('success', 'Đã hủy đơn hàng thành công.');
        }

        // 4. Nếu đơn đã giao hoặc đang giao
        return back()->with('error', 'Không thể hủy đơn hàng này vì đã được xử lý.');
    }
}
