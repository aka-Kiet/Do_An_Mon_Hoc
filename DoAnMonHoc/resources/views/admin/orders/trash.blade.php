@extends('layouts.admin')

@section('content')
<div class="p-6 bg-white dark:bg-slate-900 rounded-lg shadow-sm border border-stone-200 dark:border-slate-700">
    <div class="flex justify-between items-center mb-6">
        <h2 class="text-xl font-bold text-stone-800 dark:text-white">Danh sách đơn hàng</h2>
        
        {{-- Nút quay lại danh sách chính --}}
        <a href="{{ route('admin.orders.index') }}" class="inline-flex items-center px-4 py-2 bg-brown-primary text-white border border-transparent rounded-md font-semibold text-xs uppercase tracking-widest hover:bg-brown-dark transition ease-in-out duration-150">
            <i class="fas fa-arrow-left mr-2"></i> Quay lại
        </a>
    </div>

    @if(session('success'))
        <div class="mb-4 p-3 bg-green-100 text-green-700 rounded-lg">
            {{ session('success') }}
        </div>
    @endif

    <div class="overflow-x-auto">
        <table class="w-full text-left border-collapse">
            <thead>
                <tr class="bg-red-50 dark:bg-red-900/20 text-stone-600 dark:text-slate-300 text-sm uppercase">
                    <th class="px-4 py-3 font-semibold rounded-tl-lg">Mã ĐH</th>
                    <th class="px-4 py-3 font-semibold">Khách hàng</th>
                    <th class="px-4 py-3 font-semibold">Tổng tiền</th>
                    <th class="px-4 py-3 font-semibold">Ngày xóa</th>
                    <th class="px-4 py-3 font-semibold rounded-tr-lg">Hành động</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-stone-200 dark:divide-slate-700">
                @forelse($orders as $order)
                <tr class="hover:bg-stone-50 dark:hover:bg-slate-800/50 transition-colors">
                    <td class="px-4 py-3 text-stone-800 dark:text-slate-200 font-medium">
                        #{{ $order->id }}
                    </td>
                    <td class="px-4 py-3 text-stone-600 dark:text-slate-400">
                        {{ $order->name }}
                    </td>
                    <td class="px-4 py-3 font-bold text-brown-primary dark:text-red-500">
                        {{ number_format($order->total_price) }}đ
                    </td>
                    <td class="px-4 py-3 text-stone-500 dark:text-slate-400 text-sm">
                        {{ $order->deleted_at->format('d/m/Y H:i') }}
                    </td>
<!---->
                </tr>
                @empty
                <tr>
                    <td colspan="5" class="px-4 py-8 text-center text-stone-500 dark:text-slate-400">
                        Danh sách trống.
                    </td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    <div class="mt-4">
        {{ $orders->links() }}
    </div>
</div>
@endsection