@extends('layouts.admin')

@section('content')
<div class="p-6 bg-white dark:bg-slate-900 rounded-lg shadow-sm border border-stone-200 dark:border-slate-700">
    <div class="flex justify-between items-center mb-6">
        <h2 class="text-xl font-bold text-stone-800 dark:text-white">Danh sách đơn hàng</h2>
        
        <a href="{{ route('admin.orders.index') }}" class="text-stone-600 hover:text-brown-primary flex items-center transition-colors font-medium">
            <i class="fas fa-arrow-left mr-2"></i> Quay lại
        </a>
    </div>

    @if(session('success'))
        <div class="mb-4 p-3 bg-green-100 text-green-700 rounded-lg flex items-center">
            <i class="fas fa-check-circle mr-2"></i> {{ session('success') }}
        </div>
    @endif

    <div class="overflow-x-auto">
        <table class="w-full text-left border-collapse">
            <thead>
                <tr class="bg-stone-100 dark:bg-slate-800 text-stone-600 dark:text-slate-300 text-sm uppercase">
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
                    
                    <td class="px-4 py-3">
                        <div class="flex items-center gap-2">
                            {{-- Nút Khôi phục --}}
                            <form action="{{ route('admin.orders.restore', $order->id) }}" method="POST">
                                @csrf
                                <button type="submit" 
                                        class="inline-flex items-center px-3 py-1.5 bg-white border border-green-200 rounded-md text-sm font-medium text-green-600 hover:bg-green-50 transition-colors shadow-sm"
                                        title="Khôi phục">
                                    <i class="fas fa-trash-restore"></i>
                                </button>
                            </form>

                            {{-- Nút Xóa vĩnh viễn --}}
                            <form action="{{ route('admin.orders.force-delete', $order->id) }}" method="POST" onsubmit="return confirm('CẢNH BÁO: Hành động này không thể hoàn tác. Bạn có chắc chắn muốn xóa vĩnh viễn đơn hàng #{{ $order->id }}?');">
                                @csrf
                                @method('DELETE')
                                <button type="submit" 
                                        class="inline-flex items-center px-3 py-1.5 bg-white border border-red-200 rounded-md text-sm font-medium text-red-600 hover:bg-red-50 transition-colors shadow-sm"
                                        title="Xóa vĩnh viễn"> 
                                    <i class="fas fa-times"></i>
                                </button>
                            </form>
                        </div>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="5" class="px-4 py-10 text-center text-stone-500 dark:text-slate-400">
                        <div class="flex flex-col items-center justify-center">
                            <i class="far fa-trash-alt text-4xl mb-3 text-stone-300"></i>
                            <p>Danh sách trống.</p>
                        </div>
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