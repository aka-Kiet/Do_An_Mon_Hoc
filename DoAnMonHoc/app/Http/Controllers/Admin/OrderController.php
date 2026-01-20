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
    public function update(Request $request, Order $order)
    {
        // 1. Xóa 'processing' khỏi danh sách validate
        $request->validate([
            'status' => 'required|in:pending,shipping,completed,cancelled',
        ]);

        // Giữ nguyên logic chặn sửa nếu đã hoàn thành/hủy
        if ($order->status === 'completed') {
            return back()->with('error', 'Đơn hàng đã hoàn thành, không thể thay đổi trạng thái.');
        }

        if ($order->status === 'cancelled') {
             return back()->with('error', 'Đơn hàng đã bị hủy, không thể khôi phục trạng thái.');
        }

        $order->update([
            'status' => $request->status,
        ]);

        return back()->with('success', 'Cập nhật trạng thái đơn hàng thành công.');
    }

    // Xóa mềm đơn hàng
    public function destroy(Order $order)
    {
        if ($order->status === 'shipping') {
            return back()->with('error', 'Không thể xóa đơn hàng đang được giao.');
        }

        try {
            $order->delete();
            return redirect()->route('admin.orders.index')->with('success', 'Đã xóa đơn hàng thành công.');
        } catch (\Exception $e) {
            return back()->with('error', 'Có lỗi xảy ra, vui lòng thử lại.');
        }
    }
    //danh sách đơn hàng xóa mềm
    public function trash()
    {
        // Sử dụng onlyTrashed() để chỉ lấy các đơn đã xóa
        $orders = Order::onlyTrashed()
            ->with('user')
            ->latest()
            ->paginate(10);

        return view('admin.orders.trash', compact('orders'));
    }
    // 2. Khôi phục đơn hàng
    public function restore($id)
    {
        // Tìm trong danh sách đã xóa
        $order = Order::onlyTrashed()->findOrFail($id);
        
        $order->restore();

        return redirect()->route('admin.orders.trash')
            ->with('success', 'Đã khôi phục đơn hàng #' . $id . ' thành công.');
    }

    // 3. Xóa vĩnh viễn
    public function forceDelete($id)
    {
        // Tìm trong danh sách đã xóa
        $order = Order::onlyTrashed()->findOrFail($id);

        // Xóa các order_items liên quan trước (để sạch data)
        $order->items()->delete(); 
        
        // Xóa cứng đơn hàng
        $order->forceDelete();

        return redirect()->route('admin.orders.trash')
            ->with('success', 'Đã xóa vĩnh viễn đơn hàng #' . $id . '.');
    }
}