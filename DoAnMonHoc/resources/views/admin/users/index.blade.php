@extends('layouts.admin')

@section('content')
<div class="container mx-auto px-4 py-8">


    {{-- PHẦN THÔNG BÁO GLOBAL (Success/Error) --}}
    <div class="container mx-auto px-4 pt-4 relative z-50">
        
        {{-- ✅ THÔNG BÁO THÀNH CÔNG (Màu Xanh Biển) --}}
        @if (session('success'))
            <div id="alert-success" class="flex items-center bg-blue-100 border-l-4 border-blue-500 text-blue-700 dark:bg-blue-900/30 dark:text-blue-300 p-4 rounded shadow-lg mb-4 transition-all duration-500">
                <div class="text-2xl mr-3">
                    <i class="fas fa-check-circle"></i>
                </div>
                <div>
                    <p class="font-bold">Thành công!</p>
                    <p class="text-sm">{{ session('success') }}</p>
                </div>
                {{-- Nút tắt nhanh --}}
                <button onclick="document.getElementById('alert-success').style.display='none'" class="ml-auto text-blue-700 dark:text-blue-300 hover:text-blue-900">
                    <i class="fas fa-times"></i>
                </button>
            </div>
        @endif

        {{-- ❌ THÔNG BÁO LỖI (Giữ màu Đỏ để cảnh báo) --}}
        @if (session('error'))
            <div id="alert-error" class="flex items-center bg-red-100 border-l-4 border-red-500 text-red-700 dark:bg-red-900/30 dark:text-red-300 p-4 rounded shadow-lg mb-4 transition-all duration-500">
                <div class="text-2xl mr-3">
                    <i class="fas fa-exclamation-triangle"></i>
                </div>
                <div>
                    <p class="font-bold">Có lỗi xảy ra!</p>
                    <p class="text-sm">{{ session('error') }}</p>
                </div>
                <button onclick="document.getElementById('alert-error').style.display='none'" class="ml-auto text-red-700 dark:text-red-300 hover:text-red-900">
                    <i class="fas fa-times"></i>
                </button>
            </div>
        @endif

    </div>
    
    {{-- HEADER: TIÊU ĐỀ & NÚT THÊM --}}
    <div class="flex flex-col md:flex-row justify-between items-center mb-6 gap-4">
        <h1 class="text-2xl font-bold text-gray-800 dark:text-white flex items-center">
            <i class="fas fa-users mr-2"></i> Quản Lý Người Dùng
        </h1>
        
        <div class="flex items-center gap-2">
            @if(request('status') != 'trash')
                <a href="{{ route('admin.users.create') }}" class="px-4 py-2 bg-green-600 text-white rounded-lg hover:bg-green-700 font-bold shadow-md transition flex items-center">
                    <i class="fas fa-plus mr-1"></i> Thêm User
                </a>
            @endif
        </div>
    </div>

    {{-- THANH CÔNG CỤ: TABS & TÌM KIẾM --}}
    <div class="flex flex-col md:flex-row justify-between items-center mb-4 gap-4 bg-gray-50 dark:bg-slate-700/50 p-4 rounded-lg border border-gray-200 dark:border-slate-700">
        
        {{-- Tabs --}}
        <div class="flex gap-2">
            <a href="{{ route('admin.users.index') }}" 
               class="px-4 py-2 text-sm font-medium rounded-md transition {{ !request('status') ? 'bg-blue-600 text-white shadow' : 'bg-white dark:bg-slate-800 text-gray-600 dark:text-gray-300 hover:bg-gray-100' }}">
               <i class="fas fa-users mr-1"></i> Tất cả
            </a>
            <a href="{{ route('admin.users.index', ['status' => 'trash']) }}" 
               class="px-4 py-2 text-sm font-medium rounded-md transition {{ request('status') == 'trash' ? 'bg-red-600 text-white shadow' : 'bg-white dark:bg-slate-800 text-gray-600 dark:text-gray-300 hover:bg-gray-100' }}">
               <i class="fas fa-trash-alt mr-1"></i> Thùng rác 
               <span class="ml-1 text-xs bg-gray-200 text-gray-800 px-1.5 rounded-full opacity-80">
                   {{ \App\Models\User::onlyTrashed()->count() }}
               </span>
            </a>
        </div>

        {{-- Search --}}
        <form action="{{ route('admin.users.index') }}" method="GET" class="relative w-full md:w-64">
            @if(request('status')) <input type="hidden" name="status" value="{{ request('status') }}"> @endif
            <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                <i class="fas fa-search text-gray-400"></i>
            </div>
            <input type="text" name="search" value="{{ request('search') }}" 
                   class="block w-full p-2 pl-10 text-sm text-gray-900 border border-gray-300 rounded-lg bg-white focus:ring-blue-500 focus:border-blue-500 dark:bg-slate-800 dark:border-slate-600 dark:text-white" 
                   placeholder="Tìm tên, email, sđt...">
        </form>
    </div>

    {{-- BẢNG DANH SÁCH (STYLE GIỐNG BANNER) --}}
    <div class="bg-white dark:bg-slate-800 shadow-md rounded-lg overflow-hidden">
        <div class="overflow-x-auto">
            <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                {{-- THEAD --}}
                <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-slate-700 dark:text-gray-400">
                    <tr>
                        <th class="px-6 py-3">Thông tin thành viên</th>
                        <th class="px-6 py-3">Liên hệ</th>
                        <th class="px-6 py-3">Vai trò</th>
                        <th class="px-6 py-3">Ngày tham gia</th>
                        <th class="px-6 py-3 text-right">Hành động</th>
                    </tr>
                </thead>

                {{-- TBODY --}}
                <tbody>
                    @foreach($users as $user)
                        <tr class="bg-white border-b dark:bg-slate-800 dark:border-slate-700 hover:bg-gray-50 dark:hover:bg-slate-700/50 transition">
                            
                            {{-- Cột 1: Avatar + Tên + Status --}}
                            <td class="px-6 py-4">
                                <div class="flex items-center space-x-3">
                                    {{--Avatar--}}
                                    <div class="flex-shrink-0 w-10 h-10">
                                        <x-user-avatar :name="$user->name" class="w-9 h-9" />
                                    </div>
                                    <div>
                                        <div class="text-base font-bold text-gray-900 dark:text-white {{ request('status') == 'trash' ? 'line-through text-gray-400' : '' }}">
                                            {{ $user->name }}
                                        </div>
                                        @if(request('status') == 'trash')
                                            <div class="text-xs text-red-500">Đã xóa: {{ $user->deleted_at->format('d/m/Y') }}</div>
                                        @else
                                            <div class="text-xs text-green-500 font-semibold flex items-center">
                                                <span class="w-1.5 h-1.5 bg-green-500 rounded-full mr-1"></span> Online
                                            </div>
                                        @endif
                                    </div>
                                </div>
                            </td>

                            {{-- Cột 2: Email + SĐT --}}
                            <td class="px-6 py-4">
                                <div class="flex flex-col">
                                    <span class="text-gray-700 dark:text-gray-300 font-medium">{{ $user->email }}</span>
                                    <span class="text-xs text-gray-500 dark:text-gray-500">
                                        @if($user->phone)
                                            <i class="fas fa-phone-alt mr-1 text-[10px]"></i> {{ $user->phone }}
                                        @else
                                            <span class="italic text-gray-400">Chưa có SĐT</span>
                                        @endif
                                    </span>
                                </div>
                            </td>

                            {{-- Cột 3: Vai trò (Badge style giống Banner) --}}
                            <td class="px-6 py-4">
                                @if($user->role === 'admin') 
                                    <span class="bg-red-100 text-red-800 text-xs font-bold px-2 py-1 rounded border border-red-200">
                                        Admin
                                    </span>
                                @else
                                    <span class="bg-gray-100 text-gray-800 text-xs font-bold px-2 py-1 rounded border border-gray-200">
                                        User
                                    </span>
                                @endif
                            </td>

                            {{-- Cột 4: Ngày --}}
                            <td class="px-6 py-4">
                                {{ $user->created_at->format('d/m/Y') }}
                            </td>

                            {{-- Cột 5: Hành động (Text Links giống Banner) --}}
                            <td class="px-6 py-4 text-right space-x-2">
                                @if($user->id != Auth::id())
                                    @if(request('status') == 'trash')
                                        {{-- Thùng rác: Khôi phục & Xóa vĩnh viễn --}}
                                        <form action="{{ route('admin.users.restore', $user->id) }}" method="POST" class="inline-block">
                                            @csrf
                                            <button class="text-green-600 font-bold hover:underline text-sm">Khôi phục</button>
                                        </form>

                                        <form action="{{ route('admin.users.forceDelete', $user->id) }}" method="POST" class="inline-block"
                                              onsubmit="return confirm('Xóa vĩnh viễn user này? Không thể hoàn tác!')">
                                            @csrf @method('DELETE')
                                            <button class="text-red-600 font-bold hover:underline text-sm">Xóa vĩnh viễn</button>
                                        </form>
                                    @else
                                        {{-- Bình thường: Sửa & Xóa tạm --}}
                                        <a href="{{ route('admin.users.edit', $user->id) }}" class="text-blue-600 font-bold hover:underline text-sm">Sửa</a>
                                        
                                        <form action="{{ route('admin.users.destroy', $user->id) }}" method="POST" class="inline-block"
                                              onsubmit="return confirm('Chuyển user này vào thùng rác?')">
                                            @csrf @method('DELETE')
                                            <button class="text-red-600 font-bold hover:underline text-sm">Xóa</button>
                                        </form>
                                    @endif
                                @else
                                    <span class="text-gray-400 text-xs italic">(Bạn)</span>
                                @endif
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        {{-- Phân trang --}}
        @if($users->hasPages())
            <div class="p-4 bg-white dark:bg-slate-800 border-t border-gray-200 dark:border-slate-700">
                {{ $users->appends(request()->all())->links() }} 
            </div>
        @endif

        @if($users->isEmpty())
            <div class="text-center py-10 text-gray-500 dark:text-gray-400">
                Không tìm thấy dữ liệu phù hợp.
            </div>
        @endif
    </div>
</div>
@endsection