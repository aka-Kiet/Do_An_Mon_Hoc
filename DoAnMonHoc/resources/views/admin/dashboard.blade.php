@extends('layouts.admin')



@section('content')
        <div class="grid grid-cols-1 md:grid-cols-4 gap-6 mb-10">

            <div class="glass p-6 rounded-3xl bg-white/50 dark:bg-slate-800/50">
                <p class="text-sm text-stone-500">Sản phẩm</p>
                <p class="text-2xl font-bold">{{ $totalBooks }}</p>
            </div>

            <div class="glass p-6 rounded-3xl bg-white/50 dark:bg-slate-800/50">
                <p class="text-sm text-stone-500">Danh mục</p>
                <p class="text-2xl font-bold">{{ $totalCategories }}</p>
            </div>

            <div class="glass p-6 rounded-3xl bg-white/50 dark:bg-slate-800/50">
                <p class="text-sm text-stone-500">Đơn hàng</p>
                <p class="text-2xl font-bold">{{ $totalOrders }}</p>
            </div>

            <div class="glass p-6 rounded-3xl bg-white/50 dark:bg-slate-800/50">
                <p class="text-sm text-stone-500">Doanh thu</p>
                <p class="text-2xl font-bold">
                    {{ number_format($totalRevenue) }}đ
                </p>
            </div>

            <div class="glass p-8 rounded-3xl bg-white/50 dark:bg-slate-800/50 w-2/3 md:col-span-4 mt-6">
                <h2 class="text-lg font-bold mb-4">📈 Doanh thu theo tháng</h2>
                <canvas id="revenueChart"></canvas>
            </div>

            <div class="glass p-8 rounded-3xl bg-white/50 dark:bg-slate-800/50 w-2/3 md:col-span-4 mt-6">
                <h2 class="text-lg font-bold mb-4">🔥 Top 5 sách bán chạy</h2>

                <table class="w-full text-sm">
                    <thead>
                        <tr class=" text-left border-b text-stone-500">
                            <th>#</th>
                            <th>Tên sách</th>
                            <th>Đã bán</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($bestSellingBooks as $index => $book)
                        <tr class="border-b">
                            <td>{{ $index + 1 }}</td>
                            <td class="font-semibold">{{ $book->name }}</td>
                            <td class="text-red-600 font-bold">
                                {{ $book->sold_quantity }}
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

            @if($lowStockBooks->count())
            <div class="glass p-6 rounded-3xl bg-red-50 dark:bg-red-900/30 mt-6">
                <h2 class="text-lg font-bold text-red-600 mb-3">
                    ⚠️ Sách sắp hết hàng
                </h2>

                <ul class="list-disc ml-6 text-sm">
                    @foreach($lowStockBooks as $book)
                        <li>
                            <span class="font-semibold">{{ $book->name }}</span>
                            - còn {{ $book->quantity }} quyển
                        </li>
                    @endforeach
                </ul>
            </div>
            @endif
        </div>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

    <script>
        const data = @json($monthlyRevenue);

        const labels = Array.from({length: 12}, (_, i) => 'Tháng ' + (i + 1));
        const revenue = labels.map((_, i) => data[i + 1] ?? 0);

        new Chart(document.getElementById('revenueChart'), {
            type: 'line',
            data: {
                labels: labels,
                datasets: [{
                    label: 'Doanh thu (VNĐ)',
                    data: revenue,
                    tension: 0.4,
                    fill: true
                }]
            }
        });
    </script>
@endsection