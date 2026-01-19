@extends('layouts.admin') 

@section('content')
{{-- CONTAINER: Thêm pt-28 để tránh Header che --}}
<div class="container mx-auto px-4 pt-28 pb-10 min-h-screen">
    
    {{-- HEADER TRANG --}}
    <div class="flex flex-col md:flex-row justify-between items-center mb-8 gap-4">
        
        {{-- TABS: Tất cả | Thùng rác --}}
        <div class="flex gap-4 p-1 bg-white/40 dark:bg-slate-800/40 backdrop-blur rounded-xl border border-stone-200/50 dark:border-slate-700/50">
            <a href="{{ route('admin.users.index') }}" 
               class="px-4 py-2 rounded-lg text-sm font-bold transition-all {{ !request('status') ? 'bg-white dark:bg-slate-700 shadow-sm text-brown-primary dark:text-white' : 'text-stone-500 dark:text-slate-400 hover:text-stone-700' }}">
               <i class="fas fa-users mr-1"></i> Tất cả
            </a>
            <a href="{{ route('admin.users.index', ['status' => 'trash']) }}" 
               class="px-4 py-2 rounded-lg text-sm font-bold transition-all {{ request('status') == 'trash' ? 'bg-white dark:bg-slate-700 shadow-sm text-red-500' : 'text-stone-500 dark:text-slate-400 hover:text-red-400' }}">
               <i class="fas fa-trash-alt mr-1"></i> Thùng rác 
               <span class="ml-1 text-xs bg-stone-200 dark:bg-slate-600 px-1.5 rounded-full text-stone-600 dark:text-slate-300">
                   {{ \App\Models\User::onlyTrashed()->count() }}
               </span>
            </a>
        </div>

        {{-- SEARCH & ADD --}}
        <div class="flex items-center gap-3">
            <form action="{{ route('admin.users.index') }}" method="GET" class="relative w-full md:w-64">
                {{-- Giữ lại tham số status khi search --}}
                @if(request('status')) <input type="hidden" name="status" value="{{ request('status') }}"> @endif
                
                <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                    <i class="fas fa-search text-gray-400"></i>
                </div>
                <input type="text" name="search" value="{{ request('search') }}" 
                       class="block w-full p-2 pl-10 text-sm text-gray-900 border border-gray-300 rounded-lg bg-gray-50 focus:ring-brown-primary focus:border-brown-primary dark:bg-slate-700 dark:border-slate-600 dark:text-white dark:focus:ring-red-500" 
                       placeholder="Tìm kiếm...">
            </form>
            
            @if(request('status') != 'trash')
                <a href="{{ route('admin.users.create') }}" class="px-4 py-2 bg-brown-primary dark:bg-red-600 text-white rounded-lg hover:bg-brown-dark dark:hover:bg-red-700 transition shadow-md font-bold text-sm flex items-center whitespace-nowrap">
                    <i class="fas fa-user-plus mr-2"></i> Thêm mới
                </a>
            @endif
        </div>
    </div>

    {{-- BẢNG DANH SÁCH --}}
    <div class="rounded-3xl overflow-hidden 
        bg-white/60 dark:bg-slate-800/40 backdrop-blur-xl 
        border border-stone-200/50 dark:border-slate-700/50 
        shadow-lg transition-all duration-300">
        
        <div class="overflow-x-auto custom-scrollbar">
            <table class="w-full text-sm text-left">
                <thead class="text-xs uppercase font-bold text-stone-700 dark:text-slate-300 bg-brown-primary/10 dark:bg-red-900/20">
                    <tr>
                        <th scope="col" class="px-6 py-4">ID</th>
                        <th scope="col" class="px-6 py-4">Thành viên</th>
                        <th scope="col" class="px-6 py-4">Liên hệ</th>
                        <th scope="col" class="px-6 py-4">Vai trò</th>
                        <th scope="col" class="px-6 py-4">Ngày tham gia</th>
                        <th scope="col" class="px-6 py-4 text-right">Hành động</th>
                    </tr>
                </thead>

                <tbody class="divide-y divide-stone-200/50 dark:divide-slate-700/50">
                    @foreach($users as $user)
                        <tr class="hover:bg-white/50 dark:hover:bg-slate-700/30 transition duration-200 group">
                            
                            <td class="px-6 py-4 font-medium text-stone-500 dark:text-slate-400">#{{ $user->id }}</td>
                            
                            <td class="px-6 py-4">
                                <div class="flex items-center gap-3">
                                    <div class="w-10 h-10 rounded-full border border-stone-200 dark:border-slate-600 overflow-hidden shadow-sm">
                                        <img class="w-full h-full object-cover" 
                                             src="https://ui-avatars.com/api/?name={{ urlencode($user->name) }}&background=random&color=fff" 
                                             alt="{{ $user->name }}">
                                    </div>
                                    <div class="flex flex-col">
                                        <span class="font-bold text-stone-800 dark:text-white {{ request('status') == 'trash' ? 'line-through text-stone-400' : '' }}">
                                            {{ $user->name }}
                                        </span>
                                        @if(request('status') == 'trash')
                                            <span class="text-[10px] text-red-400 italic">Đã xóa: {{ $user->deleted_at->format('d/m/Y') }}</span>
                                        @else
                                            <span class="text-[10px] text-green-500 flex items-center gap-1"><span class="w-1.5 h-1.5 rounded-full bg-green-500"></span> Online</span>
                                        @endif
                                    </div>
                                </div>
                            </td>

                            <td class="px-6 py-4">
                                <div class="flex flex-col text-stone-600 dark:text-slate-300">
                                    <span><i class="fas fa-envelope text-stone-400 mr-1"></i> {{ $user->email }}</span>
                                    <span class="text-xs mt-1"><i class="fas fa-phone text-stone-400 mr-1"></i> {{ $user->phone ?? '---' }}</span>
                                </div>
                            </td>

                            <td class="px-6 py-4">
                                @if($user->role === 'admin') 
                                    <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-bold bg-red-100 text-red-700 border border-red-200 dark:bg-red-900/30 dark:text-red-400 dark:border-red-800">
                                        <i class="fas fa-crown mr-1"></i> Admin
                                    </span>
                                @else
                                    <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-bold bg-stone-100 text-stone-600 border border-stone-200 dark:bg-slate-700 dark:text-slate-300 dark:border-slate-600">
                                        <i class="fas fa-user mr-1"></i> User
                                    </span>
                                @endif
                            </td>

                            <td class="px-6 py-4 text-stone-500 dark:text-slate-400">
                                {{ $user->created_at->format('d/m/Y') }}
                            </td>

                            <td class="px-6 py-4 text-right space-x-2">
                                @if(request('status') == 'trash')
                                    {{-- ĐANG Ở THÙNG RÁC: Hiện nút Khôi phục + Xóa vĩnh viễn --}}
                                    
                                    {{-- 1. Khôi phục --}}
                                    <form action="{{ route('admin.users.restore', $user->id) }}" method="POST" class="inline-block">
                                        @csrf
                                        <button type="submit" class="text-white bg-green-500 hover:bg-green-600 font-medium rounded-lg text-xs px-3 py-1.5 transition" title="Khôi phục">
                                            <i class="fas fa-undo"></i>
                                        </button>
                                    </form>
                            
                                    {{-- 2. Xóa vĩnh viễn --}}
                                    <form action="{{ route('admin.users.forceDelete', $user->id) }}" method="POST" 
                                          onsubmit="return confirm('CẢNH BÁO: Hành động này sẽ xóa BAY MÀU tài khoản này vĩnh viễn. Không thể khôi phục được nữa. Bạn chắc chứ?')" 
                                          class="inline-block">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="text-white bg-red-600 hover:bg-red-700 font-medium rounded-lg text-xs px-3 py-1.5 transition" title="Xóa vĩnh viễn">
                                            <i class="fas fa-times"></i>
                                        </button>
                                    </form>
                            
                                @else
                                    {{-- ĐANG Ở DANH SÁCH THƯỜNG: Hiện Sửa + Xóa mềm (Giữ code cũ) --}}
                                    
                                    @if($user->id != Auth::id())
                                        <a href="{{ route('admin.users.edit', $user->id) }}" class="inline-block text-white bg-blue-500 hover:bg-blue-600 font-medium rounded-lg text-xs px-3 py-1.5 transition">
                                            <i class="fas fa-edit"></i>
                                        </a>
                            
                                        <form action="{{ route('admin.users.destroy', $user->id) }}" method="POST" onsubmit="return confirm('Chuyển user này vào thùng rác?')" class="inline-block">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="text-white bg-red-500 hover:bg-red-600 font-medium rounded-lg text-xs px-3 py-1.5 transition">
                                                <i class="fas fa-trash"></i>
                                            </button>
                                        </form>
                                    @endif
                                @endif
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        @if($users->hasPages())
            <div class="p-4 border-t border-stone-200/50 dark:border-slate-700/50 bg-white/30 dark:bg-slate-900/30">
                {{ $users->appends(request()->all())->links() }} 
            </div>
        @endif
        
        @if($users->isEmpty())
             <div class="text-center py-10">
                <div class="w-16 h-16 bg-stone-100 dark:bg-slate-700 rounded-full flex items-center justify-center mx-auto mb-3">
                    <i class="fas fa-inbox text-2xl text-stone-400"></i>
                </div>
                <p class="text-stone-500 dark:text-slate-400">Không có dữ liệu.</p>
             </div>
        @endif
    </div>
</div>
@endsection