@extends('layouts.admin')

@section('content')
{{-- Đổi py-8 thành pt-28 để đẩy nội dung xuống dưới Header --}}
<div class="container mx-auto px-4 pt-28 pb-8">
    <div class="max-w-2xl mx-auto bg-white dark:bg-slate-800 shadow-lg rounded-lg p-8">
        <h2 class="text-2xl font-bold text-gray-800 dark:text-white mb-6">Thêm Banner Quảng Cáo</h2>
        
        <form action="{{ route('admin.banners.store') }}" method="POST" enctype="multipart/form-data">
            @csrf

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-4">
                {{-- Ảnh (Quan trọng nhất) --}}
                <div class="col-span-2">
                    <label class="block text-sm font-bold text-gray-700 dark:text-gray-300 mb-2">Hình ảnh <span class="text-red-500">*</span></label>
                    <input type="file" name="image_path" required accept="image/*" class="w-full p-2 border rounded-lg dark:bg-slate-700 dark:text-white">
                </div>

                {{-- Tiêu đề --}}
                <div>
                    <label class="block text-sm font-bold text-gray-700 dark:text-gray-300 mb-2">Tiêu đề (Title)</label>
                    <input type="text" name="title" placeholder="VD: Sách Mới Về" class="w-full px-3 py-2 border rounded-lg dark:bg-slate-700 dark:text-white">
                </div>

                {{-- Badge --}}
                <div>
                    <label class="block text-sm font-bold text-gray-700 dark:text-gray-300 mb-2">Nhãn (Badge)</label>
                    <input type="text" name="badge" placeholder="VD: -30%, HOT" class="w-full px-3 py-2 border rounded-lg dark:bg-slate-700 dark:text-white">
                </div>
            </div>

            {{-- Mô tả --}}
            <div class="mb-4">
                <label class="block text-sm font-bold text-gray-700 dark:text-gray-300 mb-2">Mô tả ngắn (Description)</label>
                <textarea name="description" rows="3" placeholder="Mô tả ngắn gọn về chương trình..." class="w-full px-3 py-2 border rounded-lg dark:bg-slate-700 dark:text-white"></textarea>
            </div>

            {{-- Link & Sort --}}
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-6">
                <div>
                    <label class="block text-sm font-bold text-gray-700 dark:text-gray-300 mb-2">Link liên kết</label>
                    <input type="text" name="link" placeholder="/san-pham/khuyen-mai" class="w-full px-3 py-2 border rounded-lg dark:bg-slate-700 dark:text-white">
                </div>
                
                <div class="flex gap-4">
                    <div class="flex-1">
                        <label class="block text-sm font-bold text-gray-700 dark:text-gray-300 mb-2">Thứ tự</label>
                        <input type="number" name="sort_order" value="0" class="w-full px-3 py-2 border rounded-lg dark:bg-slate-700 dark:text-white">
                    </div>
                    <div class="flex items-center pt-6">
                        <input type="checkbox" name="is_active" id="is_active" checked class="w-5 h-5 text-blue-600 rounded">
                        <label for="is_active" class="ml-2 font-bold text-gray-700 dark:text-gray-300">Hiện</label>
                    </div>
                </div>
            </div>

            <div class="flex justify-end gap-4">
                <a href="{{ route('admin.banners.index') }}" class="px-4 py-2 bg-gray-500 text-white rounded-lg">Hủy</a>
                <button type="submit" class="px-4 py-2 bg-green-600 text-white rounded-lg font-bold">Lưu Banner</button>
            </div>
        </form>
    </div>
</div>
@endsection