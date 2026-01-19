@extends('layouts.admin')

@section('content')
<div class="flex flex-col space-y-6">
    <div class="flex flex-col md:flex-row justify-between items-center gap-4">
        <h1 class="text-2xl font-extrabold text-brown-dark dark:text-white tracking-tight">Quản lý bình luận</h1>
        
        <form action="{{ route('admin.reviews.index') }}" method="GET" class="w-full md:w-auto relative">
            <input type="text" name="keyword" value="{{ request('keyword') }}" placeholder="Tìm kiếm từ khóa..." 
                   class="w-full md:w-80 pl-10 pr-4 py-2 rounded-full bg-white dark:bg-slate-800 border border-stone-200 dark:border-slate-700 focus:outline-none focus:ring-2 focus:ring-brown-primary">
            <i class="fas fa-search absolute left-3 top-3 text-stone-400"></i>
        </form>
    </div>

    <div class="bg-white dark:bg-slate-900 rounded-2xl border border-stone-200 dark:border-slate-800 shadow-xl overflow-hidden">
        <form action="{{ route('admin.reviews.bulkDelete') }}" method="POST">
            @csrf
            
            <div class="p-4 border-b border-stone-200 dark:border-slate-800 bg-stone-50 flex items-center justify-between">
                <div class="text-sm text-stone-500">Danh sách đánh giá sản phẩm</div>
                
                <button type="submit" onclick="return confirm('Xóa các đánh giá đã chọn? Điểm trung bình sách sẽ được tính lại.')" class="hidden group-has-checked:flex items-center px-4 py-2 bg-red-100 text-red-600 rounded-lg text-sm font-bold" id="bulk-delete-btn">
                    <i class="fas fa-trash-alt mr-2"></i> Xóa đã chọn
                </button>
            </div>

            <div class="overflow-x-auto">
                <table class="w-full text-left border-collapse">
                    <thead>
                        <tr class="bg-stone-100 dark:bg-slate-800 text-stone-600 text-xs uppercase">
                            {{-- 1. Cột Người dùng (Giờ là cột đầu tiên) --}}
                            <th class="p-4">Người dùng</th>
                            <th class="p-4">Sản phẩm</th>
                            <th class="p-4">Đánh giá</th> 
                            <th class="p-4 w-1/3">Nội dung</th>
                            <th class="p-4">Thời gian</th>
                            
                            {{-- 2. Cột Checkbox chuyển xuống cuối cùng --}}
                            <th class="p-4 text-right">
                                <label for="select-all" class="flex items-center justify-end cursor-pointer gap-2 hover:text-brown-primary normal-case">
                                    <span class="font-bold text-stone-500">Chọn tất cả</span>
                                    <input type="checkbox" id="select-all" class="w-4 h-4 rounded border-stone-300 focus:ring-brown-primary cursor-pointer">
                                </label>
                            </th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-stone-100">
                        @forelse($reviews as $review)
                        <tr class="hover:bg-stone-50 group">
                            {{-- Nội dung các cột dữ liệu --}}
                            <td class="p-4">
                                <div class="font-bold">{{ $review->user->name ?? 'Ẩn danh' }}</div>
                                <div class="text-xs text-stone-400">{{ $review->user->email ?? '' }}</div>
                            </td>
                            <td class="p-4">
                                <span class="text-brown-primary font-medium">{{ Str::limit($review->book->name ?? 'Sản phẩm đã xóa', 30) }}</span>
                            </td>
                            <td class="p-4">
                                <span class="text-yellow-500 font-bold"><i class="fas fa-star"></i> {{ $review->rating }}</span>
                            </td>
                            <td class="p-4">
                                <p class="text-sm bg-stone-50 p-2 rounded border border-stone-100">
                                    @if(request('keyword'))
                                        {!! str_replace(request('keyword'), '<span class="bg-yellow-200 text-red-600 font-bold">'.request('keyword').'</span>', $review->comment) !!}
                                    @else
                                        {{ $review->comment }}
                                    @endif
                                </p>
                            </td>
                            <td class="p-4 text-sm text-stone-500 whitespace-nowrap">{{ $review->created_at->format('d/m/Y H:i') }}</td>

                            {{-- 3. Checkbox của từng dòng chuyển xuống cuối cùng --}}
                            <td class="p-4 text-right">
                                <div class="flex justify-end pr-1"> {{-- Thêm div để căn chỉnh checkbox thẳng hàng với tiêu đề --}}
                                    <input type="checkbox" name="review_ids[]" value="{{ $review->id }}" class="item-checkbox w-4 h-4 rounded border-stone-300 cursor-pointer">
                                </div>
                            </td>
                        </tr>
                        @empty
                        <tr><td colspan="6" class="p-8 text-center text-stone-400">Không có đánh giá nào.</td></tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
            <div class="p-4 border-t border-stone-200">{{ $reviews->withQueryString()->links() }}</div>
        </form>
    </div>
</div>

{{-- Script giữ nguyên vì logic ID và Class không thay đổi --}}
<script>
    const selectAll = document.getElementById('select-all');
    const checkboxes = document.querySelectorAll('.item-checkbox');
    const bulkBtn = document.getElementById('bulk-delete-btn');

    function toggleBulkBtn() {
        const checkedCount = document.querySelectorAll('.item-checkbox:checked').length;
        if(checkedCount > 0) {
            bulkBtn.classList.remove('hidden');
            bulkBtn.classList.add('flex');
            bulkBtn.innerHTML = `<i class="fas fa-trash-alt mr-2"></i> Xóa (${checkedCount})`;
        } else {
            bulkBtn.classList.add('hidden');
            bulkBtn.classList.remove('flex');
        }
    }

    if(selectAll) {
        selectAll.addEventListener('change', function() {
            checkboxes.forEach(cb => cb.checked = this.checked);
            toggleBulkBtn();
        });
    }

    checkboxes.forEach(cb => {
        cb.addEventListener('change', toggleBulkBtn);
    });
</script>

@endsection