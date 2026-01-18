@extends('layouts.admin') 

@section('content')
{{-- CONTAINER: Thêm pt-28 để tránh Header che --}}
<div class="container mx-auto px-4 pt-28 pb-10 min-h-screen">
    
    {{-- HEADER TRANG --}}
    <div class="flex flex-col md:flex-row justify-between items-center mb-8 gap-4">
        <h1 class="text-3xl font-extrabold text-brown-dark dark:text-white flex items-center">
            <i class="fas fa-users-cog mr-3 text-brown-primary dark:text-red-500"></i> 
            Quản Lý Người Dùng
        </h1>
        
        <div class="flex items-center gap-3">
            <span class="px-4 py-2 rounded-xl bg-white/60 dark:bg-slate-800/60 backdrop-blur border border-stone-200 dark:border-slate-700 text-stone-600 dark:text-slate-300 text-sm font-bold shadow-sm">
                Tổng: <span class="text-brown-primary dark:text-red-500 text-base ml-1">{{ $users->total() }}</span> thành viên
            </span>

            {{-- FORM TÌM KIẾM --}}
            <form action="{{ route('admin.users.index') }}" method="GET" class="relative w-full md:w-64">
                <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                    <i class="fas fa-search text-gray-400"></i>
                </div>
                <input type="text" name="search" value="{{ request('search') }}" 
                       class="block w-full p-2 pl-10 text-sm text-gray-900 border border-gray-300 rounded-lg bg-gray-50 focus:ring-brown-primary focus:border-brown-primary dark:bg-slate-700 dark:border-slate-600 dark:text-white dark:focus:ring-red-500" 
                       placeholder="Tìm email, tên hoặc sđt...">
                
                @if(request('search'))
                    <a href="{{ route('admin.users.index') }}" class="absolute inset-y-0 right-0 flex items-center pr-3 text-gray-400 hover:text-red-500">
                        <i class="fas fa-times-circle"></i>
                    </a>
                @endif
            </form>
            
            {{-- Nút Thêm mới --}}
            <a href="{{ route('admin.users.create') }}" class="px-4 py-2 bg-brown-primary dark:bg-red-600 text-white rounded-lg hover:bg-brown-dark dark:hover:bg-red-700 transition shadow-md font-bold text-sm flex items-center">
                <i class="fas fa-user-plus mr-2"></i> Thêm mới
            </a>
        </div>
    </div>

    {{-- BẢNG DANH SÁCH (GLASSMORPHISM) --}}
    <div class="rounded-3xl overflow-hidden 
        bg-white/60 dark:bg-slate-800/40 backdrop-blur-xl 
        border border-stone-200/50 dark:border-slate-700/50 
        shadow-lg transition-all duration-300">
        
        <div class="overflow-x-auto custom-scrollbar">
            <table class="w-full text-sm text-left">
                {{-- THEAD --}}
                <thead class="text-xs uppercase font-bold
                    text-stone-700 dark:text-slate-300
                    bg-brown-primary/10 dark:bg-red-900/20">
                    <tr>
                        <th scope="col" class="px-6 py-4">ID</th>
                        <th scope="col" class="px-6 py-4">Thành viên</th>
                        <th scope="col" class="px-6 py-4">Email</th>
                        <th scope="col" class="px-6 py-4">Số điện thoại</th> {{-- 👈 CỘT MỚI --}}
                        <th scope="col" class="px-6 py-4">Vai trò</th>
                        <th scope="col" class="px-6 py-4">Ngày tham gia</th>
                        <th scope="col" class="px-6 py-4 text-right">Hành động</th>
                    </tr>
                </thead>

                {{-- TBODY --}}
                <tbody class="divide-y divide-stone-200/50 dark:divide-slate-700/50">
                    @foreach($users as $user)
                        <tr class="hover:bg-white/50 dark:hover:bg-slate-700/30 transition duration-200 group">
                            
                            {{-- ID --}}
                            <td class="px-6 py-4 font-medium text-stone-500 dark:text-slate-400">
                                #{{ $user->id }}
                            </td>
                            
                            {{-- Thành viên --}}
                            <td class="px-6 py-4">
                                <div class="flex items-center gap-3">
                                    <div class="w-10 h-10 rounded-full border border-stone-200 dark:border-slate-600 overflow-hidden shadow-sm">
                                        <img class="w-full h-full object-cover" 
                                             src="https://ui-avatars.com/api/?name={{ urlencode($user->name) }}&background=random&color=fff" 
                                             alt="{{ $user->name }}">
                                    </div>
                                    <div class="flex flex-col">
                                        <span class="font-bold text-stone-800 dark:text-white text-base group-hover:text-brown-primary dark:group-hover:text-red-500 transition-colors">
                                            {{ $user->name }}
                                        </span>
                                        <span class="text-[10px] text-green-500 flex items-center gap-1">
                                            <span class="w-1.5 h-1.5 rounded-full bg-green-500"></span> Online
                                        </span>
                                    </div>
                                </div>
                            </td>

                            {{-- Email --}}
                            <td class="px-6 py-4 text-stone-600 dark:text-slate-300">
                                {{ $user->email }}
                            </td>

                            {{-- Số điện thoại (CỘT MỚI) --}}
                            <td class="px-6 py-4 text-stone-600 dark:text-slate-300">
                                @if($user->phone)
                                    {{ $user->phone }}
                                @else
                                    <span class="text-stone-400 italic text-xs">Chưa cập nhật</span>
                                @endif
                            </td>

                            {{-- Vai trò --}}
                            <td class="px-6 py-4">
                                @if($user->is_admin || $user->role === 'admin') 
                                    <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-bold border
                                        bg-red-100 text-red-700 border-red-200 
                                        dark:bg-red-900/30 dark:text-red-400 dark:border-red-800">
                                        <i class="fas fa-crown mr-1 text-[10px]"></i> Admin
                                    </span>
                                @else
                                    <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-bold border
                                        bg-stone-100 text-stone-600 border-stone-200 
                                        dark:bg-slate-700 dark:text-slate-300 dark:border-slate-600">
                                        <i class="fas fa-user mr-1 text-[10px]"></i> User
                                    </span>
                                @endif
                            </td>

                            {{-- Ngày tham gia --}}
                            <td class="px-6 py-4 text-stone-500 dark:text-slate-400">
                                <div class="flex items-center gap-2">
                                    <i class="far fa-calendar-alt"></i>
                                    {{ $user->created_at->format('d/m/Y') }}
                                </div>
                            </td>

                            {{-- Hành động --}}
                            <td class="px-6 py-4 text-right">
                                @if($user->id != Auth::id())
                                    <div class="flex items-center justify-end gap-2">
                                        
                                        {{-- Nút Sửa --}}
                                        <a href="{{ route('admin.users.edit', $user->id) }}" 
                                           class="w-8 h-8 rounded-lg flex items-center justify-center transition-all
                                           text-stone-400 hover:text-blue-600 hover:bg-blue-50 
                                           dark:text-slate-500 dark:hover:text-blue-400 dark:hover:bg-blue-900/20"
                                           title="Sửa thông tin">
                                            <i class="fas fa-edit"></i>
                                        </a>

                                        {{-- Nút Xóa --}}
                                        <form action="{{ route('admin.users.destroy', $user->id) }}" method="POST" 
                                              onsubmit="return confirm('CẢNH BÁO: Bạn có chắc chắn muốn xóa thành viên {{ $user->name }}?');">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="w-8 h-8 rounded-lg flex items-center justify-center transition-all
                                                text-stone-400 hover:text-red-500 hover:bg-red-50 
                                                dark:text-slate-500 dark:hover:text-red-400 dark:hover:bg-red-900/20"
                                                title="Xóa người dùng">
                                                <i class="fas fa-trash-alt"></i>
                                            </button>
                                        </form>

                                    </div>
                                @else
                                    <span class="text-xs text-stone-400 dark:text-slate-600 italic select-none pr-2">
                                        (Bạn)
                                    </span>
                                @endif
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        {{-- Phân trang --}}
        @if($users->hasPages())
            <div class="p-4 border-t border-stone-200/50 dark:border-slate-700/50 bg-white/30 dark:bg-slate-900/30">
                {{ $users->links() }} 
            </div>
        @endif
        
        @if($users->isEmpty())
             <div class="text-center py-10">
                <p class="text-stone-500 dark:text-slate-400">Không tìm thấy thành viên nào.</p>
             </div>
        @endif
    </div>
</div>
@endsection