@extends('layouts.admin')

@section('content')
<div class="container mx-auto px-4 py-8">
    <div class="flex justify-between items-center mb-6">
        <h1 class="text-2xl font-bold text-gray-800 dark:text-white"><i class="fas fa-ad mr-2"></i> Quản Lý Banner</h1>
        <a href="{{ route('admin.banners.create') }}" class="px-4 py-2 bg-green-600 text-white rounded-lg hover:bg-green-700 font-bold shadow-md">
            <i class="fas fa-plus mr-1"></i> Thêm Banner
        </a>
    </div>

    <div class="bg-white dark:bg-slate-800 shadow-md rounded-lg overflow-hidden">
        <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-slate-700 dark:text-gray-400">
                <tr>
                    <th class="px-6 py-3">Ảnh</th>
                    <th class="px-6 py-3">Thông tin</th>
                    <th class="px-6 py-3">Badge</th>
                    <th class="px-6 py-3">Thứ tự</th>
                    <th class="px-6 py-3 text-right">Hành động</th>
                </tr>
            </thead>
            <tbody>
                @foreach($banners as $banner)
                <tr class="bg-white border-b dark:bg-slate-800 dark:border-slate-700">
                    <td class="px-6 py-4">
                        <img src="{{ asset($banner->image_path) }}" class="h-16 w-auto rounded object-cover">
                    </td>
                    <td class="px-6 py-4">
                        <p class="font-bold text-gray-900 dark:text-white">{{ $banner->title ?? 'Không tiêu đề' }}</p>
                        <p class="text-xs truncate max-w-xs">{{ $banner->description }}</p>
                    </td>
                    <td class="px-6 py-4">
                        @if($banner->badge)
                            <span class="bg-red-100 text-red-800 text-xs font-bold px-2 py-1 rounded">{{ $banner->badge }}</span>
                        @endif
                    </td>
                    <td class="px-6 py-4">{{ $banner->sort_order }}</td>
                    <td class="px-6 py-4 text-right space-x-2">
                        <a href="{{ route('admin.banners.edit', $banner->id) }}" class="text-blue-600 font-bold hover:underline">Sửa</a>
                        <form action="{{ route('admin.banners.destroy', $banner->id) }}" method="POST" class="inline-block" onsubmit="return confirm('Xóa banner này?')">
                            @csrf @method('DELETE')
                            <button class="text-red-600 font-bold hover:underline">Xóa</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection