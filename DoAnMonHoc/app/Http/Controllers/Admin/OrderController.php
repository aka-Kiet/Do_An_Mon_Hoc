<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Order;

class OrderController extends Controller
{
    // Danh sách đơn hàng
    public function index(Request $request)
    {
        $orders = Order::with('user')
            ->latest()
            ->paginate(10);

        return view('admin.orders.index', compact('orders'));
    }
    
    // Chi tiết đơn hàng
    public function show(Order $order)
    {
        $order->load(['user', 'items.book']);

        return view('admin.orders.show', compact('order'));
    }

    // Cập nhật trạng thái
    public function updateStatus(Request $request, Order $order)
    {
        // $request->validate([
        //     'status' => 'required|in:pending,processing,completed,cancelled'
        // ]);

        // $order->update([
        //     'status' => $request->status
        // ]);

        // return back()->with('success', 'Cập nhật trạng thái thành công');
   
        $request->validate([
            'status' => 'required|in:pending,processing,completed,cancelled',
        ]);

        // Không cho đổi nếu đã hoàn thành
        if ($order->status === 'completed') {
            return back()->with('error', 'Đơn hàng đã hoàn thành, không thể thay đổi.');
        }

        $order->update([
            'status' => $request->status,
        ]);

        return back()->with('success', 'Cập nhật trạng thái đơn hàng thành công.');
    }
}
