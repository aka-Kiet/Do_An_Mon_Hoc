@extends('layouts.app')

@section('content')
<div class="container mx-auto px-4 py-8">
    <div class="max-w-2xl mx-auto bg-white dark:bg-slate-800 shadow-lg rounded-lg p-8">
        <h2 class="text-2xl font-bold text-gray-800 dark:text-white mb-6">
            <i class="fas fa-edit mr-2"></i> Sửa Banner
        </h2>
        
        <form action="{{ route('admin.banners.update', $banner->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT') {{-- 👇 Bắt buộc để cập nhật --}}

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-4">
                {{-- Ảnh (Hiển thị ảnh cũ + Cho chọn ảnh mới) --}}
                <div class="col-span-2">
                    <label class="block text-sm font-bold text-gray-700 dark:text-gray-300 mb-2">Hình ảnh</label>
                    
                    {{-- Preview ảnh cũ --}}
                    <div class="mb-3">
                        <img src="{{ asset($banner->image_path) }}" class="h-32 w-auto rounded-lg border border-gray-300 shadow-sm object-cover">
                        <p class="text-xs text-gray-500 italic mt-1">Ảnh hiện tại</p>
                    </div>

                    <input type="file" name="image_path" accept="image/*" class="w-full p-2 border rounded-lg dark:bg-slate-700 dark:text-white">
                    <p class="text-xs text-blue-500 mt-1">* Chỉ chọn ảnh mới nếu bạn muốn thay đổi.</p>
                </div>

                {{-- Tiêu đề --}}
                <div>
                    <label class="block text-sm font-bold text-gray-700 dark:text-gray-300 mb-2">Tiêu đề (Title)</label>
                    <input type="text" name="title" value="{{ old('title', $banner->title) }}" placeholder="VD: Sách Mới Về" class="w-full px-3 py-2 border rounded-lg dark:bg-slate-700 dark:text-white">
                </div>

                {{-- Badge --}}
                <div>
                    <label class="block text-sm font-bold text-gray-700 dark:text-gray-300 mb-2">Nhãn (Badge)</label>
                    <input type="text" name="badge" value="{{ old('badge', $banner->badge) }}" placeholder="VD: -30%, HOT" class="w-full px-3 py-2 border rounded-lg dark:bg-slate-700 dark:text-white">
                </div>
            </div>

            {{-- Mô tả --}}
            <div class="mb-4">
                <label class="block text-sm font-bold text-gray-700 dark:text-gray-300 mb-2">Mô tả ngắn (Description)</label>
                <textarea name="description" rows="3" class="w-full px-3 py-2 border rounded-lg dark:bg-slate-700 dark:text-white">{{ old('description', $banner->description) }}</textarea>
            </div>

            {{-- Link & Sort --}}
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-6">
                <div>
                    <label class="block text-sm font-bold text-gray-700 dark:text-gray-300 mb-2">Link liên kết</label>
                    <input type="text" name="link" value="{{ old('link', $banner->link) }}" class="w-full px-3 py-2 border rounded-lg dark:bg-slate-700 dark:text-white">
                </div>
                
                <div class="flex gap-4">
                    <div class="flex-1">
                        <label class="block text-sm font-bold text-gray-700 dark:text-gray-300 mb-2">Thứ tự</label>
                        <input type="number" name="sort_order" value="{{ old('sort_order', $banner->sort_order) }}" class="w-full px-3 py-2 border rounded-lg dark:bg-slate-700 dark:text-white">
                    </div>
                    <div class="flex items-center pt-6">
                        {{-- Checkbox kích hoạt --}}
                        <input type="checkbox" name="is_active" id="is_active" {{ $banner->is_active ? 'checked' : '' }} class="w-5 h-5 text-blue-600 rounded">
                        <label for="is_active" class="ml-2 font-bold text-gray-700 dark:text-gray-300">Hiện</label>
                    </div>
                </div>
            </div>

            <div class="flex justify-end gap-4">
                <a href="{{ route('admin.banners.index') }}" class="px-4 py-2 bg-gray-500 text-white rounded-lg">Hủy</a>
                <button type="submit" class="px-4 py-2 bg-blue-600 text-white rounded-lg font-bold hover:bg-blue-700 transition">
                    <i class="fas fa-save mr-1"></i> Cập nhật
                </button>
            </div>
        </form>
    </div>
</div>
@endsection