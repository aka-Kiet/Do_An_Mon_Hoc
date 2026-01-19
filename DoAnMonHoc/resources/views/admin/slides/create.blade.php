@extends('layouts.app')

@section('content')
<div class="container mx-auto px-4 py-8">
    <div class="max-w-3xl mx-auto bg-white dark:bg-slate-800 shadow-lg rounded-lg p-8">
        <h2 class="text-2xl font-bold text-gray-800 dark:text-white mb-6">Thêm Banner Quảng Cáo</h2>
        
        <form action="{{ route('admin.slides.store') }}" method="POST" enctype="multipart/form-data">
            @csrf

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                {{-- Cột Trái --}}
                <div class="space-y-4">
                    {{-- Ảnh --}}
                    <div>
                        <label class="block text-sm font-bold text-gray-700 dark:text-gray-300 mb-2">Hình ảnh (Banner) <span class="text-red-500">*</span></label>
                        <input type="file" name="image_path" required accept="image/*" class="w-full p-2 border rounded-lg dark:bg-slate-700 dark:text-white">
                    </div>

                    {{-- Title --}}
                    <div>
                        <label class="block text-sm font-bold text-gray-700 dark:text-gray-300 mb-2">Tiêu đề lớn</label>
                        <input type="text" name="title" placeholder="VD: Siêu Sale Mùa Hè" class="w-full px-3 py-2 border rounded-lg dark:bg-slate-700 dark:text-white">
                    </div>

                    {{-- Badge --}}
                    <div>
                        <label class="block text-sm font-bold text-gray-700 dark:text-gray-300 mb-2">Badge (Nhãn dán)</label>
                        <input type="text" name="badge" placeholder="VD: Giảm 50%, Hot, New..." class="w-full px-3 py-2 border rounded-lg dark:bg-slate-700 dark:text-white">
                    </div>
                </div>

                {{-- Cột Phải --}}
                <div class="space-y-4">
                     {{-- Link --}}
                     <div>
                        <label class="block text-sm font-bold text-gray-700 dark:text-gray-300 mb-2">Đường dẫn khi click</label>
                        <input type="text" name="link" placeholder="/san-pham/sach-moi" class="w-full px-3 py-2 border rounded-lg dark:bg-slate-700 dark:text-white">
                    </div>

                    {{-- Thứ tự --}}
                    <div>
                        <label class="block text-sm font-bold text-gray-700 dark:text-gray-300 mb-2">Thứ tự hiển thị</label>
                        <input type="number" name="sort_order" value="0" class="w-full px-3 py-2 border rounded-lg dark:bg-slate-700 dark:text-white">
                    </div>

                    {{-- Trạng thái --}}
                    <div class="flex items-center pt-8">
                        <input type="checkbox" name="is_active" id="is_active" checked class="w-5 h-5 text-blue-600 rounded">
                        <label for="is_active" class="ml-2 font-bold text-gray-700 dark:text-gray-300">Hiển thị ngay</label>
                    </div>
                </div>
            </div>

            {{-- Mô tả (Full width) --}}
            <div class="mt-4">
                <label class="block text-sm font-bold text-gray-700 dark:text-gray-300 mb-2">Mô tả ngắn</label>
                <textarea name="description" rows="3" placeholder="Mô tả chi tiết hơn về chương trình..." class="w-full px-3 py-2 border rounded-lg dark:bg-slate-700 dark:text-white"></textarea>
            </div>

            <div class="flex justify-end gap-4 mt-6">
                <a href="{{ route('admin.slides.index') }}" class="px-4 py-2 bg-gray-500 text-white rounded-lg">Hủy</a>
                <button type="submit" class="px-4 py-2 bg-green-600 text-white rounded-lg font-bold">Thêm Banner</button>
            </div>
        </form>
    </div>
</div>
@endsection