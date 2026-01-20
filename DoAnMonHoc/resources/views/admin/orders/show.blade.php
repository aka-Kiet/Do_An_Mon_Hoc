@extends('layouts.admin')

@section('content')
<div class="container mx-auto">
    <div class="flex flex-col md:flex-row justify-between items-start md:items-center mb-6 gap-4">
        <div>
            <h2 class="text-2xl font-bold text-stone-800 dark:text-white">Chi tiết đơn hàng #{{ $order->id }}</h2>
            <p class="text-stone-500 text-sm mt-1">Ngày đặt: {{ $order->created_at->format('d/m/Y H:i:s') }}</p>
        </div>
        <a href="{{ route('admin.orders.index') }}" class="text-stone-600 hover:text-brown-primary flex items-center">
            <i class="fas fa-arrow-left mr-2"></i> Quay lại
        </a>
    </div>

    @if(session('success'))
        <div class="mb-6 p-4 bg-green-100 border border-green-200 text-green-700 rounded-lg flex items-center shadow-sm">
            <i class="fas fa-check-circle mr-2 text-xl"></i>
            <span class="font-medium">{{ session('success') }}</span>
        </div>
    @endif

    @if(session('error'))
        <div class="mb-6 p-4 bg-red-100 border border-red-200 text-red-700 rounded-lg flex items-center shadow-sm">
            <i class="fas fa-exclamation-triangle mr-2 text-xl"></i>
            <span class="font-medium">{{ session('error') }}</span>
        </div>
    @endif

    <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
        
        <div class="lg:col-span-2 space-y-6">
            <div class="bg-white dark:bg-slate-900 rounded-lg shadow-sm border border-stone-200 dark:border-slate-700 p-6">
                <h3 class="text-lg font-semibold mb-4 text-stone-800 dark:text-white border-b pb-2">Danh sách sản phẩm</h3>
                <div class="space-y-4">
                    @foreach($order->items as $item)
                    <div class="flex items-center justify-between py-2">
                        <div class="flex items-center gap-4">
                            <div class="w-16 h-20 bg-stone-200 rounded overflow-hidden flex-shrink-0">
                                @if($item->book && $item->book->thumbnail)
                                    <img src="{{ asset($item->book->thumbnail) }}" class="w-full h-full object-cover">
                                @else
                                    <div class="flex items-center justify-center h-full text-stone-400"><i class="fas fa-book"></i></div>
                                @endif
                            </div>
                            <div>
                                <h4 class="font-medium text-stone-800 dark:text-white">{{ $item->book->title ?? 'Sách đã bị xóa' }}</h4>
                                <p class="text-sm text-stone-500">Đơn giá: {{ number_format($item->price) }}đ</p>
                                <p class="text-sm text-stone-500">Số lượng: x{{ $item->quantity }}</p>
                            </div>
                        </div>
                        <div class="font-bold text-stone-800 dark:text-white">
                            {{ number_format($item->price * $item->quantity) }}đ
                        </div>
                    </div>
                    @endforeach
                </div>
                
                <div class="border-t border-stone-200 dark:border-slate-700 mt-4 pt-4 flex justify-end">
                    <div class="text-right">
                        <p class="text-stone-600 dark:text-slate-400">Tổng tiền hàng:</p>
                        <p class="text-2xl font-bold text-brown-primary dark:text-red-500">{{ number_format($order->total_price) }}đ</p>
                    </div>
                </div>
            </div>
        </div>

        <div class="space-y-6">
            
            <div class="bg-white dark:bg-slate-900 rounded-lg shadow-sm border border-stone-200 dark:border-slate-700 p-6">
                <h3 class="text-lg font-semibold mb-4 text-stone-800 dark:text-white">Cập nhật trạng thái</h3>
                <form action="{{ route('admin.orders.update', $order->id) }}" method="POST">
                    @csrf
                    @method('PUT')
                    
                    <div class="mb-4">
                        <label class="block text-sm font-medium text-stone-700 dark:text-slate-300 mb-2">Trạng thái hiện tại</label>
                        <select name="status" class="w-full rounded-md border-stone-300 dark:border-slate-600 bg-stone-50 dark:bg-slate-800 focus:ring-brown-primary focus:border-brown-primary">
                            @foreach($statusLabels as $key => $label)
                                <option value="{{ $key }}" {{ $order->status == $key ? 'selected' : '' }}>
                                    {{ $label }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                    
                    <button type="submit" class="w-full bg-brown-primary hover:bg-brown-600 text-white font-medium py-2 px-4 rounded transition-colors">
                        Cập nhật
                    </button>
                </form>
            </div>

            <div class="bg-white dark:bg-slate-900 rounded-lg shadow-sm border border-stone-200 dark:border-slate-700 p-6">
                <h3 class="text-lg font-semibold mb-4 text-stone-800 dark:text-white">Thông tin người nhận</h3>
                <div class="space-y-3 text-sm">
                    <div>
                        <span class="text-stone-500 block">Người nhận:</span>
                        <span class="font-medium text-stone-800 dark:text-white">{{ $order->name }}</span>
                    </div>
                    <div>
                        <span class="text-stone-500 block">Số điện thoại:</span>
                        <span class="font-medium text-stone-800 dark:text-white">{{ $order->phone }}</span>
                    </div>
                    <div>
                        <span class="text-stone-500 block">Email (Tài khoản):</span>
                        <span class="font-medium text-stone-800 dark:text-white">{{ $order->user->email ?? 'N/A' }}</span>
                    </div>
                    <div>
                        <span class="text-stone-500 block">Địa chỉ:</span>
                        <span class="font-medium text-stone-800 dark:text-white">{{ $order->address }}</span>
                    </div>
                    <div>
                        <span class="text-stone-500 block">Phương thức thanh toán:</span>
                        <span class="font-medium text-stone-800 dark:text-white uppercase">{{ $order->payment_method }}</span>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>
@endsection