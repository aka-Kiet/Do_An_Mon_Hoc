
@extends('layouts.admin')

@section('title','Quản lý đơn hàng')

@section('content')
<div class="glass p-6 rounded-3xl bg-white/50 dark:bg-slate-800/50">
    <h1 class="text-2xl font-bold mb-6">Quản lý đơn hàng</h1>

    <table class="w-full text-left border-collapse">
        <thead>
            <tr class="border-b text-sm text-stone-500">
                <th>#</th>
                <th>Khách hàng</th>
                <th>Tổng tiền</th>
                <th>Ngày tạo</th>
                <th>Trạng thái</th>
                <th>Thao tác</th>
            </tr>
        </thead>
        <tbody>
            @foreach($orders as $order)
            <tr class="border-b hover:bg-stone-50 transition">
                <td>{{ $order->id }}</td>
                <td>
                    <div class="font-medium">{{ $order->user?->name ?? 'Khách vãng lai' }}</div>
                    <div class="text-xs text-stone-500">{{ $order->phone ?? '' }}</div>
                </td>
        
                <td class="font-bold text-stone-700">{{ number_format($order->total_price) }}đ</td>
                <td class="text-sm text-stone-500">{{ $order->created_at->format('d/m/Y H:i') }}</td>
                
                <td>
                    <form action="{{ route('admin.orders.updateStatus', $order->id) }}" method="POST">
                        @csrf
                        @method('PUT')
                        
                        <select name="status" onchange="this.form.submit()" 
                            class="px-2 py-1 text-xs font-bold rounded border-0 cursor-pointer focus:ring-2 focus:ring-brown-primary
                            {{ $order->status == 'completed' ? 'bg-green-100 text-green-700' : 
                             ($order->status == 'pending' ? 'bg-yellow-100 text-yellow-700' :
                             ($order->status == 'processing' ? 'bg-blue-100 text-blue-700' :
                             'bg-red-100 text-red-700')) }}">
                            
                            {{-- Lấy danh sách trạng thái từ Model --}}
                            @foreach(\App\Models\Order::STATUS_LABELS as $key => $label)
                                <option value="{{ $key }}" {{ $order->status == $key ? 'selected' : '' }}>
                                    {{ $label }}
                                </option>
                            @endforeach
        
                        </select>
                    </form>
                </td>
                <td>
                    <a href="{{ route('admin.orders.show', $order) }}"
                       class="px-3 py-1 bg-stone-700 hover:bg-stone-800 text-white rounded text-xs transition">
                        Chi tiết
                    </a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>

    <div class="mt-6">
        {{ $orders->links() }}
    </div>
</div>
@endsection
