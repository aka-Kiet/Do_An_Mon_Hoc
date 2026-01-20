@extends('layouts.admin')

@section('content')
<div class="p-6 bg-white dark:bg-slate-900 rounded-lg shadow-sm border border-stone-200 dark:border-slate-700">
    <div class="flex justify-between items-center mb-6">
        <h2 class="text-xl font-bold text-stone-800 dark:text-white">Danh sách đơn hàng</h2>
        {{-- Thêm nút Thùng rác --}}
        <a href="{{ route('admin.orders.trash') }}" class="inline-flex items-center px-4 py-2 bg-stone-200 border border-transparent rounded-md font-semibold text-xs text-stone-700 uppercase tracking-widest hover:bg-stone-300 active:bg-stone-400 focus:outline-none focus:border-stone-500 focus:ring ring-stone-300 disabled:opacity-25 transition ease-in-out duration-150">
            <i class="fas fa-trash-alt mr-2"></i> Thùng rác 
            {{-- Hiển thị số lượng đơn đã xóa  --}}
            <span class="ml-1 bg-red-500 text-white text-[10px] px-1.5 py-0.5 rounded-full">
                {{ \App\Models\Order::onlyTrashed()->count() }}
            </span>
        </a>
    </div>

    <div class="overflow-x-auto">
        <table class="w-full text-left border-collapse">
            <thead>
                <tr class="bg-stone-100 dark:bg-slate-800 text-stone-600 dark:text-slate-300 text-sm uppercase">
                    <th class="px-4 py-3 font-semibold rounded-tl-lg">Mã ĐH</th>
                    <th class="px-4 py-3 font-semibold">Khách hàng</th>
                    <th class="px-4 py-3 font-semibold">Tổng tiền</th>
                    <th class="px-4 py-3 font-semibold">Ngày đặt</th>
                    <th class="px-4 py-3 font-semibold">Trạng thái</th>
                    <th class="px-4 py-3 font-semibold rounded-tr-lg">Hành động</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-stone-200 dark:divide-slate-700">
                @foreach($orders as $order)
                <tr class="hover:bg-stone-50 dark:hover:bg-slate-800/50 transition-colors">
                    {{-- 1. Mã Đơn Hàng --}}
                    <td class="px-4 py-3 text-stone-800 dark:text-slate-200 font-medium">
                        #{{ $order->id }}
                    </td>

                    {{-- 2. Khách Hàng --}}
                    <td class="px-4 py-3 text-stone-600 dark:text-slate-400">
                        <div class="flex flex-col">
                            <span class="font-medium text-stone-800 dark:text-white">{{ $order->name }}</span>
                        </div>
                    </td>

                    {{-- 3. Tổng Tiền --}}
                    <td class="px-4 py-3 font-bold text-brown-primary dark:text-red-500">
                        {{ number_format($order->total_price) }}đ
                    </td>

                    {{-- 4. Ngày Đặt (Đã chuyển lên đây) --}}
                    <td class="px-4 py-3 text-stone-500 dark:text-slate-400 text-sm">
                        {{ $order->created_at->format('d/m/Y H:i') }}
                    </td>

                    {{-- 5. Trạng Thái (Đã chuyển xuống đây) --}}
                    <td class="px-4 py-3">
                        @php
                            $statusColors = [
                                'pending'    => 'bg-yellow-100 text-yellow-700 border-yellow-200',
                                'shipping'   => 'bg-purple-100 text-purple-700 border-purple-200',
                                'completed'  => 'bg-green-100 text-green-700 border-green-200',
                                'cancelled'  => 'bg-red-100 text-red-700 border-red-200',
                            ];
                            $colorClass = $statusColors[$order->status] ?? 'bg-gray-100 text-gray-700 border-gray-200';
                        @endphp
                        <span class="px-3 py-1 rounded-full text-xs font-semibold border {{ $colorClass }}">
                            {{ $order->status_label }}
                        </span>
                    </td>

                    {{-- 6. Hành Động --}}
                    <td class="px-4 py-3">
                        <div class="flex items-center gap-2">
                            <!--Xem chi tiết-->
                            <a href="{{ route('admin.orders.show', $order->id) }}" 
                               class="inline-flex items-center px-3 py-1.5 bg-white border border-stone-300 rounded-md text-sm font-medium text-stone-700 hover:bg-stone-50 hover:text-brown-primary transition-colors shadow-sm"
                               title="Xem chi tiết">
                                <i class="fas fa-eye"></i>
                            </a>
                            <!--Xóa mềm-->
                            <form action="{{ route('admin.orders.destroy', $order->id) }}" method="POST" onsubmit="return confirm('Bạn có chắc chắn muốn xóa đơn hàng #{{ $order->id }} này không?');">
                                @csrf
                                @method('DELETE')
                                <button type="submit" 
                                        class="inline-flex items-center px-3 py-1.5 bg-white border border-red-200 rounded-md text-sm font-medium text-red-600 hover:bg-red-50 hover:text-red-700 transition-colors shadow-sm"
                                        title="Xóa đơn hàng">
                                    <i class="fas fa-trash"></i>
                                </button>
                            </form>
                        </div>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <div class="mt-4">
        {{ $orders->links() }}
    </div>
</div>
@endsection