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

    @if($trashedBooks->count())
        <div class="mb-4 p-4 rounded bg-yellow-100 text-yellow-900">
            
            <div class="flex items-center justify-between mb-3">
            <p class="font-semibold">
                <i class="fas fa-trash-restore mr-1"></i>
                Sản phẩm đã xóa ({{ $trashedBooks->count() }})
            </p>
            <div class="flex items-center gap-3">
                {{-- KHÔI PHỤC TẤT CẢ --}}
                <form method="POST" action="{{ route('admin.books.restoreAll') }}">
                    @csrf
                    @method('PATCH')
                    <button
                        class="px-4 py-2 bg-green-700 text-white rounded text-sm hover:bg-green-800">
                        <i class="fas fa-rotate-left mr-1"></i>
                        Khôi phục tất cả
                    </button>
                </form>

                {{-- XÓA VĨNH VIỄN --}}
                <form method="POST"
                    action="{{ route('admin.books.forceDeleteAll') }}"
                    onsubmit="return confirm('XÓA VĨNH VIỄN TOÀN BỘ SẢN PHẨM? KHÔNG THỂ HOÀN TÁC!')">
                    @csrf
                    @method('DELETE')
                    <button
                        class="px-4 py-2 bg-red-800 text-white rounded text-sm hover:bg-red-900">
                        <i class="fas fa-fire mr-1"></i>
                        Xóa vĩnh viễn tất cả
                    </button>
                </form>
            </div>
        </div>
            <div class="flex flex-wrap gap-2">
                @foreach($trashedBooks as $trash)
                    <form method="POST"
                        action="{{ route('admin.books.restore', $trash->id) }}">
                        @csrf
                        @method('PATCH')

                        <button class="px-3 py-1 bg-green-600 text-white rounded text-sm">
                            <i class="fas fa-undo"></i>
                            {{ $trash->name }}
                        </button>
                    </form>
                    <form method="POST"
                        action="{{ route('admin.books.forceDelete', $trash->id) }}"
                        onsubmit="return confirm('XÓA VĨNH VIỄN? Hành động này không thể khôi phục!')">
                        @csrf
                        @method('DELETE')

                        <button class="px-3 py-1 bg-red-700 text-white rounded text-sm">
                            <i class="fas fa-skull-crossbones"></i>
                            Xóa vĩnh viễn
                        </button>
                    </form>
                @endforeach
            </div>
        </div>
    @endif
    <!-- Bảng danh sách sản phẩm -->
    <form method="POST"
        action="{{ route('admin.books.softDelete') }}"
        onsubmit="return confirm('Bạn chắc chắn muốn xóa các sản phẩm đã chọn?')">
        @csrf
        @method('DELETE')
        <table class="w-full border-collapse text-left">
            <thead>
                <tr class="border-b text-stone-500 text-sm">
                    <th class="w-8">
                        <input type="checkbox" id="checkAll">
                    </th>
                    <th>ID</th>
                    <th>Tên</th>
                    <th>Slug</th>
                    <th>Hình ảnh</th>
                    <th>Danh mục</th>
                    <th>Giá</th>
                    <th>Tồn kho</th>
                    <th class="text-right">Chức năng</th>
                </tr>
            </thead>
            <tbody>
                @foreach($books as $book)
                    <tr class="border-b {{ $book->trashed() ? 'bg-red-50 opacity-70' : '' }}">
                        <td>
                            @if(!$book->trashed())
                                <input type="checkbox" name="ids[]" value="{{ $book->id }}" class="checkItem">
                            @endif
                        </td>
                        <td>{{ $books->firstItem() + $loop->index }}</td>
                        <td class="font-semibold max-w-56 line-clamp-2">{{ $book->name }}</td>
                        <td class="font-semibold max-w-56 line-clamp">{{ $book->slug }}</td>
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
                            class="px-3 py-1 bg-blue-500 text-white rounded text-sm">
                                Sửa
                            </a>
                            <form method="POST"
                                action="{{ route('admin.books.softDelete') }}"
                                class="inline">
                                @csrf
                                @method('DELETE')
                                <input type="hidden" name="ids[]" value="{{ $book->id }}">
                                <button class="px-3 py-1 bg-red-500 text-white rounded text-sm">
                                    <i class="fas fa-trash-alt"></i>
                                </button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        <button type="submit"
            class="mt-4 bg-red-600 text-white px-4 py-2 rounded">
            <i class="fas fa-trash-alt"></i> Xóa đã chọn
        </button>
    </form>
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