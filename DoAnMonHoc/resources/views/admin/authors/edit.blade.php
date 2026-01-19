@extends('layouts.admin')

@section('content')
<div class="container mx-auto px-4 py-8">
    <div class="max-w-xl mx-auto bg-white dark:bg-slate-800 shadow-lg rounded-lg p-8">
        <h2 class="text-2xl font-bold text-gray-800 dark:text-white mb-6">Sửa Tác Giả</h2>
        
        <form action="{{ route('admin.authors.update', $author->id) }}" method="POST">
            @csrf @method('PUT')
            
            <div class="mb-4">
                <label class="block text-sm font-bold text-gray-700 dark:text-gray-300 mb-2">Tên tác giả</label>
                <input type="text" name="name" value="{{ $author->name }}" required class="w-full px-3 py-2 border rounded-lg dark:bg-slate-700 dark:text-white">
            </div>

            <div class="mb-4">
                <label class="block text-sm font-bold text-gray-700 dark:text-gray-300 mb-2">Slug</label>
                <input type="text" name="name" value="{{ $author->slug }}" required class="w-full px-3 py-2 border rounded-lg dark:bg-slate-700 dark:text-white">
            </div>
            
            <div class="mb-6">
                <label class="block text-sm font-bold text-gray-700 dark:text-gray-300 mb-2">Tiểu sử</label>
                <textarea name="bio" rows="4" class="w-full px-3 py-2 border rounded-lg dark:bg-slate-700 dark:text-white">{{ $author->bio }}</textarea>
            </div>

            <div class="flex justify-end gap-4">
                <a href="{{ route('admin.authors.index') }}" class="px-4 py-2 bg-gray-500 text-white rounded-lg">Hủy</a>
                <button type="submit" class="px-4 py-2 bg-blue-600 text-white rounded-lg font-bold">Cập nhật</button>
            </div>
        </form>
    </div>
</div>
@endsection