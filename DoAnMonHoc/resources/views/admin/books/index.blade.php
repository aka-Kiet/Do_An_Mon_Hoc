@extends('layouts.admin')
@section('title','Quản lý sản phẩm')

@section('content')
{{-- HEADER --}}
<div class="flex items-center justify-between mb-4">
    <h1 class="text-2xl font-bold flex items-center gap-2 text-stone-800">
        <i class="fas fa-box"></i>
        Quản lý sản phẩm
    </h1>

    {{-- NÚT THÊM --}}
    <a href="{{ route('admin.books.create') }}"
       class="inline-flex items-center gap-2 px-4 py-2 rounded-lg
              bg-green-600 text-white font-semibold
              hover:bg-green-700 transition shadow">
        <i class="fas fa-plus"></i>
        Thêm sản phẩm
    </a>
</div>

<div class="flex items-center justify-between mb-4 bg-white rounded-xl p-3 border">

    <div class="flex gap-3">
        {{-- TAB TẤT CẢ --}}
        <a href="{{ route('admin.books.index') }}"
           class="px-4 py-2 rounded-lg flex items-center gap-2 font-semibold
           {{ $tab === 'all' ? 'bg-blue-600 text-white' : 'bg-gray-100 text-gray-600' }}">
            <i class="fas fa-book"></i>
            Tất cả
        </a>

        {{-- TAB THÙNG RÁC --}}
        <a href="{{ route('admin.books.index',['tab'=>'trash']) }}"
           class="px-4 py-2 rounded-lg flex items-center gap-2 font-semibold
           {{ $tab === 'trash' ? 'bg-red-600 text-white' : 'bg-gray-100 text-gray-600' }}">
            <i class="fas fa-trash"></i>
            Thùng rác
            @if($trashCount)
                <span class="ml-1 bg-white text-red-600 px-2 py-0.5 text-xs rounded-full">
                    {{ $trashCount }}
                </span>
            @endif
        </a>
    </div>

    {{-- SEARCH --}}
   <form method="GET" class="flex gap-2">
        <input type="hidden" name="tab" value="{{ $tab }}">
        <div class="relative">
            <span class="absolute inset-y-0 left-3 flex items-center text-stone-400">
                <i class="fas fa-search"></i>
            </span>
            <input type="text"
                name="search"
                value="{{ request('search') }}"
                placeholder="Tìm sản phẩm..."
                class="pl-10 pr-4 py-2 rounded-lg border border-stone-300
                        focus:ring-2 focus:ring-brown-primary
                        focus:border-brown-primary outline-none text-sm">
        </div>
    </form>
</div>

{{-- 👇👇👇 CHÈN ĐOẠN THÔNG BÁO VÀO ĐÂY 👇👇👇 --}}
@if(session('success'))
    <div id="alert-message" class="mb-4 p-4 rounded-lg bg-green-100 border-l-4 border-green-500 text-green-700 flex items-center justify-between shadow-sm transition-all duration-500">
        <div class="flex items-center">
            <i class="fas fa-check-circle text-xl mr-3"></i>
            <div>
                <span class="font-bold">Thành công!</span> {{ session('success') }}
            </div>
        </div>
        <button onclick="document.getElementById('alert-message').remove()" class="text-green-700 hover:text-green-900">
            <i class="fas fa-times"></i>
        </button>
    </div>
@endif

@if(session('error'))
    <div id="alert-error" class="mb-4 p-4 rounded-lg bg-red-100 border-l-4 border-red-500 text-red-700 flex items-center justify-between shadow-sm transition-all duration-500">
        <div class="flex items-center">
            <i class="fas fa-exclamation-triangle text-xl mr-3"></i>
            <div>
                <span class="font-bold">Lỗi!</span> {{ session('error') }}
            </div>
        </div>
        <button onclick="document.getElementById('alert-error').remove()" class="text-red-700 hover:text-red-900">
            <i class="fas fa-times"></i>
        </button>
    </div>
@endif
{{-- 👆👆👆 KẾT THÚC ĐOẠN THÔNG BÁO 👆👆👆 --}}


<div class="bg-white dark:bg-slate-900 rounded-2xl shadow-sm overflow-hidden border border-stone-200 dark:border-slate-700">
    <table class="w-full text-left">
        <thead class="bg-stone-50 dark:bg-slate-800 text-xs uppercase text-stone-500 dark:text-slate-400">
            <tr>
                <th class="px-6 py-4">ID</th>
                <th class="px-6 py-4">Tên sản phẩm</th>
                <th class="px-6 py-4">Slug</th>
                <th>hình ảnh</th>
                <th class="px-6 py-4">Danh mục</th>
                <th class="px-6 py-4">Giá</th>
                <th class="px-6 py-4">Tồn kho</th>
                <th class="px-6 py-4 text-right">Hành động</th>
            </tr>
        </thead>

        <tbody class="divide-y divide-stone-200 dark:divide-slate-700">
            @forelse($books as $book)
                <tr class="hover:bg-stone-50 dark:hover:bg-slate-800 transition">
                    <td class="px-6 py-4 text-sm text-stone-500">
                        #{{ $books->firstItem() + $loop->index }}
                    </td>

                    {{-- TÊN --}}
                    <td class="px-6 py-4">
                        <p class="font-semibold text-stone-800 dark:text-white">
                            {{ $book->name }}
                        </p>
                    </td>

                    {{-- SLUG --}}
                    <td class="px-6 py-4 text-sm text-stone-500">
                        {{ $book->slug }}
                    </td>
                    {{-- HÌNH ẢNH --}}
                    <td class="px-6 py-4">
                    {{-- Kiểm tra nếu có ảnh thì hiện, không có thì hiện ảnh mặc định --}}
                    @if($book->image)
                        <img src="{{ asset($book->image) }}" alt="{{ $book->name }}" class="w-16 h-auto">
                    @else
                        <img src="https://via.placeholder.com/150" alt="No Image">
                    @endif
                    </td>
                    {{-- DANH MỤC --}}
                    <td class="px-6 py-4">
                        <span class="inline-block px-2 py-1 text-xs rounded bg-stone-100 dark:bg-slate-700 text-stone-700 dark:text-slate-200">
                            {{ $book->category->name ?? '-' }}
                        </span>
                    </td>

                    {{-- GIÁ --}}
                    <td class="px-6 py-4 font-medium text-stone-700 dark:text-slate-300">
                        {{ number_format($book->price) }}đ
                    </td>

                    {{-- TỒN --}}
                    <td class="px-6 py-4">
                        <span class="text-sm {{ $book->quantity > 0 ? 'text-green-600' : 'text-red-600' }}">
                            {{ $book->quantity }}
                        </span>
                    </td>

                    {{-- HÀNH ĐỘNG --}}
                    <td class="px-6 py-4 text-right space-x-3 text-sm">
                        @if($tab === 'all')
                            <a href="{{ route('admin.books.edit',$book) }}"
                               class="text-blue-600 hover:underline font-medium">
                                Sửa
                            </a>

                            <form method="POST"
                                  action="{{ route('admin.books.softDelete') }}"
                                  class="inline">
                                @csrf @method('DELETE')
                                <input type="hidden" name="ids[]" value="{{ $book->id }}">
                                <button class="text-red-600 hover:underline font-medium">
                                    Xóa
                                </button>
                            </form>
                        @else
                            <form method="POST"
                                  action="{{ route('admin.books.restore',$book->id) }}"
                                  class="inline">
                                @csrf @method('PATCH')
                                <button class="text-green-600 hover:underline font-medium">
                                    Khôi phục
                                </button>
                            </form>

                            <form method="POST"
                                  action="{{ route('admin.books.forceDelete',$book->id) }}"
                                  class="inline"
                                  onsubmit="return confirm('Xóa vĩnh viễn?')">
                                @csrf @method('DELETE')
                                <button class="text-red-700 hover:underline font-medium">
                                    Xóa vĩnh viễn
                                </button>
                            </form>
                        @endif
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="7" class="text-center py-10 text-stone-400">
                        Không có dữ liệu
                    </td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>
<div class="mt-4 flex justify-end">
    {{ $books->links() }}
</div>

    <script>
    document.addEventListener('DOMContentLoaded', function () {
        document.querySelectorAll('#pagination a').forEach(link => {
            link.href = link.href + '#pagination';
        });
    });
    </script>
@endsection