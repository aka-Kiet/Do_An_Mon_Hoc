@extends('layouts.admin')
@section('title','Quản lý sản phẩm')

@section('content')
<div class="glass p-6 rounded-3xl bg-white/50 dark:bg-slate-800/50">
    <div class="flex justify-between mb-6">
        <h1 class="text-2xl font-bold">Quản lý sản phẩm</h1>
        <a href="{{ route('admin.books.create') }}"
           class="px-5 py-2 rounded-full bg-brown-primary text-white font-bold">
            <i class="fas fa-plus mr-2"></i>Thêm sản phẩm
        </a>
    </div>
    <form method="GET" class="flex justify-end gap-2 mb-6">
        <input 
            type="text" 
            name="search"
            value="{{ request('search') }}"
            placeholder="Tìm theo tên sản phẩm..."
            class="w-64 px-4 py-2 rounded border focus:outline-none"
        >

        <button class="px-4 py-2 bg-brown-primary text-white rounded font-bold">
            Tìm
        </button>
    </form>

    @if(session('success'))
        <div class="mb-4 p-3 bg-green-100 text-green-700 rounded">
            {{ session('success') }}
        </div>
    @endif

    <table class="w-full border-collapse text-left">
        <thead>
            <tr class="border-b text-stone-500 text-sm">
                <th>ID</th>
                <th>Tên</th>
                <th>Hình ảnh</th>
                <th>Danh mục</th>
                <th>Giá</th>
                <th>Tồn kho</th>
                <th class="text-right">Chức năng</th>
            </tr>
        </thead>
        <tbody>
            @foreach($books as $book)
                <tr class="border-b">
                    <td>{{ $books->firstItem() + $loop->index }}</td>
                    <td class="font-semibold max-w-56 line-clamp">{{ $book->name }}</td>
                    <td>
                        @if($book->image)
                            <img src="{{ asset($book->image) }}"
                                alt="{{ $book->name }}"
                                class="w-12 h-16 object-contain bg-white rounded border">
                        @else
                            <span class="text-stone-400 text-sm">Chưa có ảnh</span>
                        @endif
                    </td>
                    <td>{{ $book->category->name ?? '-' }}</td>
                    <td>{{ number_format($book->price) }}đ</td>
                    <td>{{ $book->quantity }}</td>
                    <td class="text-right space-x-2">
                        <a href="{{ route('admin.books.edit', $book) }}"
                        class="px-3 py-1 bg-blue-500 text-white rounded text-sm">Sửa</a>

                        <form method="POST"
                            action="{{ route('admin.books.destroy', $book) }}"
                            class="inline"
                            onsubmit="return confirm('Xóa sản phẩm này?')">
                            @csrf @method('DELETE')
                            <button class="px-3 py-1 bg-red-500 text-white rounded text-sm">
                                Xóa
                            </button>
                        </form>
                    </td>
                </tr>
            @endforeach
            
        </tbody>
    </table>
    <div id="pagination" class="mt-4 flex justify-end">
                {{ $books->links() }}
    </div>
</div>
    <script>
    document.addEventListener('DOMContentLoaded', function () {
        document.querySelectorAll('#pagination a').forEach(link => {
            link.href = link.href + '#pagination';
        });
    });
    </script>
@endsection
