@extends('layouts.admin')

@section('content')
<div class="container mx-auto px-4 py-8">
    <div class="flex justify-between items-center mb-6">
        <h1 class="text-2xl font-bold text-gray-800 dark:text-white"><i class="fas fa-pen-nib mr-2"></i> Quản Lý Tác Giả</h1>
        <a href="{{ route('admin.authors.create') }}" class="px-4 py-2 bg-green-600 text-white rounded-lg hover:bg-green-700 font-bold shadow-md">
            <i class="fas fa-plus mr-1"></i> Thêm tác giả
        </a>
    </div>

    <div class="bg-white dark:bg-slate-800 shadow-md rounded-lg overflow-hidden">
        <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-slate-700 dark:text-gray-400">
                <tr>
                    <th class="px-6 py-3">ID</th>
                    <th class="px-6 py-3">Slug</th>
                    <th class="px-6 py-3">Tên tác giả</th>
                    <th class="px-6 py-3">Số lượng sách</th>
                    <th class="px-6 py-3 text-right">Hành động</th>
                </tr>
            </thead>
            <tbody>
                @foreach($authors as $author)
                <tr class="bg-white border-b dark:bg-slate-800 dark:border-slate-700 hover:bg-gray-50 dark:hover:bg-slate-700/50">
                    <td class="px-6 py-4">{{ $author->id }}</td>
                    <td class="px-6 py-4">{{ $author->slug }}</td>
                    <td class="px-6 py-4 font-bold text-gray-900 dark:text-white">{{ $author->name }}</td>
                    <td class="px-6 py-4">
                        <span class="bg-blue-100 text-blue-800 text-xs font-bold px-2.5 py-0.5 rounded">
                            {{ $author->books_count }} cuốn
                        </span>
                    </td>
                    <td class="px-6 py-4 text-right space-x-2">
                        <a href="{{ route('admin.authors.edit', $author->id) }}" class="text-blue-600 hover:underline font-medium">Sửa</a>
                        
                        <form action="{{ route('admin.authors.destroy', $author->id) }}" method="POST" class="inline-block" onsubmit="return confirm('Bạn có chắc muốn xóa tác giả này?')">
                            @csrf @method('DELETE')
                            <button class="text-red-600 hover:underline font-medium">Xóa</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        <div class="p-4">{{ $authors->links() }}</div>
    </div>
</div>
@endsection