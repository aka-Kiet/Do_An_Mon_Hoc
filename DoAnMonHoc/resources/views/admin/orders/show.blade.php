@extends('layouts.admin')

@section('title','Chi tiết đơn hàng')

@section('content')
    <div class="glass p-8 rounded-3xl shadow-xl space-y-10">

        {{-- HEADER --}}
        <div class="flex justify-between items-center">
            <h1 class="text-2xl font-bold">Đơn hàng #{{ $order->id }}</h1>

            <a href="{{ route('admin.orders.index') }}"
            class="px-4 py-2 rounded-lg bg-stone-200 hover:bg-stone-300 text-sm">
                ← Quay lại
            </a>
        </div>


        {{-- THÔNG TIN KHÁCH HÀNG --}}
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6 border-t pt-6">
            <div>
                <h3 class="font-bold mb-2">Khách hàng</h3>
                <p><b>Tên:</b> {{ $order->user?->name ?? 'N/A' }}</p>
                <p><b>Email:</b> {{ $order->user?->email ?? 'N/A' }}</p>
            </div>

            <div>
                <h3 class="font-bold mb-2">Đơn hàng</h3>
                <p><b>Ngày tạo:</b> {{ $order->created_at->format('d/m/Y H:i') }}</p>
                <p>
                    <b>Trạng thái:</b>
                    <span class="px-2 py-1 rounded text-xs font-bold
                        {{ $order->status == 'completed' ? 'bg-green-100 text-green-700' : 
                        ($order->status == 'pending' ? 'bg-yellow-100 text-yellow-700' :
                        ($order->status == 'processing' ? 'bg-blue-100 text-blue-700' :
                        'bg-red-100 text-red-700')) }}">
                        {{ $order->getStatusLabelAttribute() }}
                    </span>
                </p>
            </div>
        </div>

        {{-- DANH SÁCH SẢN PHẨM --}}
        <div class="border-t pt-6">
            <h3 class="font-bold mb-4">Sản phẩm trong đơn</h3>

            <table class="w-full text-sm border-collapse">
                <thead class="border-b text-stone-500">
                    <tr>
                        <th class="text-left py-2">#</th>
                        <th class="text-left">Tên sách</th>
                        <th class="text-right">Giá</th>
                        <th class="text-center">SL</th>
                        <th class="text-right">Thành tiền</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($order->items as $i => $item)
                    <tr class="border-b last:border-0">
                        <td class="py-2">{{ $i+1 }}</td>
                        <td>{{ $item->book->name }}</td>
                        <td class="text-right">{{ number_format($item->price) }}đ</td>
                        <td class="text-center">{{ $item->quantity }}</td>
                        <td class="text-right font-bold">
                            {{ number_format($item->price * $item->quantity) }}đ
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

       
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6 border-t pt-6">
            {{-- CẬP NHẬT TRẠNG THÁI
                <form method="POST"
                    action="{{ route('admin.orders.updateStatus', $order) }}"
                    class="flex items-center gap-3">
                    @csrf
                    @method('PUT')

                    <select name="status" class="border rounded px-3 py-2">
                        @foreach(\App\Models\Order::STATUS_LABELS as $key => $label)
                            <option value="{{ $key }}" {{ $order->status === $key ? 'selected' : '' }}>
                                {{ $label }}
                            </option>
                        @endforeach
                    </select>

                    <button type="submit"
                            class="px-4 py-2 bg-brown-primary text-white rounded font-bold hover:opacity-90">
                        Lưu
                    </button>
                </form> --}}
             {{-- TỔNG TIỀN --}}
            <div class="md:text-right">
                <p>Tạm tính: {{ number_format($order->total_price) }}đ</p>
                <p class="text-lg font-extrabold">
                    Tổng cộng: {{ number_format($order->total_price) }}đ
                </p>
            </div>
            @if(session('success'))
                    <div class="mb-4 px-4 py-2 bg-green-100 text-green-700 rounded">
                        {{ session('success') }}
                    </div>
                @endif

                @if(session('error'))
                    <div class="mb-4 px-4 py-2 bg-red-100 text-red-700 rounded">
                        {{ session('error') }}
                    </div>
                @endif
        </div>
@endsection
