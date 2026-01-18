@extends('layouts.admin')

@section('title','Quản lý danh mục')

@section('content')
<div class="glass p-6 rounded-3xl bg-white/50 dark:bg-slate-800/50">
    <div class="flex justify-between items-center mb-6">
        <h1 class="text-2xl font-bold text-brown-dark dark:text-white">
            Quản lý danh mục
        </h1>

        <a href="{{ route('admin.categories.create') }}"
           class="px-5 py-2 rounded-full bg-brown-primary text-white font-bold
                  hover:bg-brown-dark dark:bg-neon-red dark:hover:bg-red-700 transition">
            <i class="fas fa-plus mr-2"></i> Thêm danh mục
        </a>
    </div>

    {{-- Table --}}
    <table class="w-full text-left border-collapse">
        <thead>
            <tr class="text-sm text-stone-500 dark:text-slate-400 border-b border-stone-200 dark:border-slate-700">
                <th class="py-3">#</th>
                <th>Tên danh mục</th>
                <th>Slug</th>
                <th class="text-right">Thao tác</th>
            </tr>
        </thead>
        <tbody>
            @foreach($categories as $cat)
            <tr class="border-b border-stone-200 dark:border-slate-700">
                <td class="py-3">{{ $loop->iteration }}</td>
                <td class="font-bold">{{ $cat->name }}</td>
                <td class="text-stone-500">{{ $cat->slug }}</td>
                <td class="text-right space-x-2">
                    <a href="{{ route('admin.categories.edit', $cat->id) }}"
                       class="px-3 py-1 rounded bg-blue-500 text-white text-sm">Sửa</a>

                    <form class="inline" method="POST"
                          action="{{ route('admin.categories.destroy', $cat->id) }}"
                          onsubmit="return confirm('Bạn có muốn Xóa danh mục này?')">
                        @csrf @method('DELETE')
                        <button class="px-3 py-1 rounded bg-red-500 text-white text-sm">
                            Xóa
                        </button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection