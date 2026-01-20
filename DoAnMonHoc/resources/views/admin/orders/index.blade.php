
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
            <tr class="border-b">
                <td>{{ $order->id }}</td>
                 <td>
                    {{ $order->user?->name ?? 'Khách vãng lai' }}
                </td>

                <td>{{ number_format($order->total_price) }}đ</td>
                <td>{{ $order->created_at->format('d/m/Y') }}</td>
                <td>
                    <span class="px-2 py-1 rounded text-xs font-bold
                        {{ $order->status == 'completed' ? 'bg-green-100 text-green-700' : 
                        ($order->status == 'pending' ? 'bg-yellow-100 text-yellow-700' :
                        ($order->status == 'processing' ? 'bg-blue-100 text-blue-700' :
                        'bg-red-100 text-red-700')) }}">
                        {{ $order->getStatusLabelAttribute() }}
                    </span>
                </td>
                <td >
                    <a href="{{ route('admin.orders.show', $order) }}"
                       class="px-3 py-1 bg-brown-primary text-white rounded text-sm">
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
