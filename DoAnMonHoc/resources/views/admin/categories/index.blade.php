@extends('layouts.admin')

@section('title','Quản lý danh mục')

@section('content')
<div class="glass p-6 rounded-3xl bg-white/50 dark:bg-slate-800/50">
    {{-- 👇 SỬA ĐOẠN HEADER NÀY ĐỂ CHỨA THANH TÌM KIẾM --}}
    <div class="flex flex-col md:flex-row justify-between items-center mb-6 gap-4">
        <h1 class="text-2xl font-bold text-brown-dark dark:text-white">
            Quản lý danh mục
        </h1>

        <div class="flex items-center gap-3">
            {{-- FORM TÌM KIẾM --}}
            <form action="{{ route('admin.categories.index') }}" method="GET" class="relative">
                <input type="text" 
                       name="search" 
                       value="{{ request('search') }}" 
                       placeholder="Tìm kiếm..." 
                       class="pl-10 pr-4 py-2 rounded-full border border-stone-200 dark:border-slate-600 
                              bg-white dark:bg-slate-700 text-sm focus:outline-none focus:ring-2 focus:ring-brown-primary 
                              dark:text-white shadow-sm w-full md:w-64 transition-all">
                <i class="fas fa-search absolute left-3 top-1/2 -translate-y-1/2 text-gray-400"></i>
                
                {{-- Nếu đang tìm kiếm thì hiện nút X để xóa --}}
                @if(request('search'))
                    <a href="{{ route('admin.categories.index') }}" class="absolute right-3 top-1/2 -translate-y-1/2 text-gray-400 hover:text-red-500">
                        <i class="fas fa-times"></i>
                    </a>
                @endif
            </form>

            <a href="{{ route('admin.categories.create') }}"
            class="px-5 py-2 rounded-full bg-brown-primary text-white font-bold
                    hover:bg-brown-dark dark:bg-neon-red dark:hover:bg-red-700 transition whitespace-nowrap">
                <i class="fas fa-plus mr-2"></i> Thêm
            </a>
        </div>
    </div>
    {{-- 👆 KẾT THÚC ĐOẠN HEADER --}}

    {{-- Table (Giữ nguyên) --}}
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
            @forelse($categories as $cat) {{-- Dùng forelse để xử lý khi không tìm thấy --}}
            <tr class="border-b border-stone-200 dark:border-slate-700 hover:bg-stone-50 dark:hover:bg-slate-700/50 transition">
                <td class="py-3">
                    {{ $categories->firstItem() + $loop->index }}
                </td>
                <td class="font-bold text-brown-dark dark:text-white">
                    {{-- Highlight từ khóa tìm kiếm (Option vui vẻ) --}}
                    {!! str_replace(request('search'), '<span class="bg-yellow-200 dark:text-black">'.request('search').'</span>', $cat->name) !!}
                </td>
                <td class="text-stone-500 text-sm">{{ $cat->slug }}</td>
                <td class="text-right space-x-2">
                    <a href="{{ route('admin.categories.edit', $cat->id) }}"
                       class="px-3 py-1 rounded bg-blue-500 hover:bg-blue-600 text-white text-sm transition">
                       <i class="fas fa-edit"></i>
                    </a>

                    <form class="inline" method="POST"
                          action="{{ route('admin.categories.destroy', $cat->id) }}"
                          onsubmit="return confirm('Bạn có muốn Xóa danh mục này?')">
                        @csrf @method('DELETE')
                        <button class="px-3 py-1 rounded bg-red-500 hover:bg-red-600 text-white text-sm transition">
                            <i class="fas fa-trash"></i>
                        </button>
                    </form>
                </td>
            </tr>
            @empty
            <tr>
                <td colspan="4" class="text-center py-8 text-stone-500">
                    <img src="https://cdn-icons-png.flaticon.com/512/7486/7486754.png" class="w-16 h-16 mx-auto mb-2 opacity-50" alt="">
                    Không tìm thấy danh mục nào phù hợp với "{{ request('search') }}"
                </td>
            </tr>
            @endforelse
        </tbody>
    </table>

    <div id="pagination" class="mt-4 flex justify-end">
        {{ $categories->links() }}
    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        // Giữ nguyên script pagination của bạn
        document.querySelectorAll('#pagination a').forEach(link => {
            if(link.href) {
                link.href = link.href + '#pagination';
            }
        });
    });
</script>
@endsection