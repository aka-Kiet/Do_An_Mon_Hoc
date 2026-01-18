@extends('layouts.app')

@section('content')
{{-- CONTAINER: Thêm pt-28 để tránh Header che --}}
<div class="container mx-auto px-4 pt-28 pb-10 min-h-screen">
    
    {{-- CARD: Glassmorphism --}}
    <div class="max-w-2xl mx-auto rounded-3xl p-8
        bg-white/60 dark:bg-slate-800/40 backdrop-blur-xl 
        border border-stone-200/50 dark:border-slate-700/50 
        shadow-lg transition-all duration-300">
        
        <h2 class="text-2xl font-bold text-brown-dark dark:text-white mb-8 flex items-center border-b border-stone-200/50 dark:border-slate-700/50 pb-4">
            <i class="fas fa-user-edit mr-3 text-brown-primary dark:text-red-500"></i> 
            Chỉnh sửa người dùng
        </h2>

        <form action="{{ route('admin.users.update', $user->id) }}" method="POST" class="space-y-6">
            @csrf
            @method('PUT') 

            {{-- GRID: Thông tin chung --}}
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                
                {{-- 1. Họ tên --}}
                <div class="space-y-2">
                    <label class="text-sm font-bold text-stone-600 dark:text-slate-300">Họ và tên <span class="text-red-500">*</span></label>
                    <div class="relative">
                        <input type="text" name="name" value="{{ old('name', $user->name) }}" required
                            class="w-full pl-10 pr-4 py-3 rounded-xl border border-stone-200 dark:border-slate-600 
                            bg-white/50 dark:bg-slate-900/50 dark:text-white 
                            focus:ring-2 focus:ring-brown-primary focus:bg-white dark:focus:bg-slate-900 focus:outline-none transition">
                        <i class="fas fa-user absolute left-3.5 top-1/2 -translate-y-1/2 text-stone-400"></i>
                    </div>
                </div>

                {{-- 2. Vai trò --}}
                <div class="space-y-2">
                    <label class="text-sm font-bold text-stone-600 dark:text-slate-300">Vai trò</label>
                    <div class="relative">
                        <select name="role" class="w-full pl-10 pr-4 py-3 rounded-xl border border-stone-200 dark:border-slate-600 
                            bg-white/50 dark:bg-slate-900/50 dark:text-white appearance-none
                            focus:ring-2 focus:ring-brown-primary focus:bg-white dark:focus:bg-slate-900 focus:outline-none transition cursor-pointer">
                            <option value="user" {{ $user->role == 'user' ? 'selected' : '' }}>Thành viên (User)</option>
                            <option value="admin" {{ $user->role == 'admin' ? 'selected' : '' }}>Quản trị viên (Admin)</option>
                        </select>
                        <i class="fas fa-user-tag absolute left-3.5 top-1/2 -translate-y-1/2 text-stone-400"></i>
                        <i class="fas fa-chevron-down absolute right-4 top-1/2 -translate-y-1/2 text-stone-400 text-xs pointer-events-none"></i>
                    </div>
                </div>

                {{-- 3. Email --}}
                <div class="space-y-2">
                    <label class="text-sm font-bold text-stone-600 dark:text-slate-300">Email <span class="text-red-500">*</span></label>
                    <div class="relative">
                        <input type="email" name="email" value="{{ old('email', $user->email) }}" required
                            class="w-full pl-10 pr-4 py-3 rounded-xl border border-stone-200 dark:border-slate-600 
                            bg-white/50 dark:bg-slate-900/50 dark:text-white 
                            focus:ring-2 focus:ring-brown-primary focus:bg-white dark:focus:bg-slate-900 focus:outline-none transition">
                        <i class="fas fa-envelope absolute left-3.5 top-1/2 -translate-y-1/2 text-stone-400"></i>
                    </div>
                </div>

                {{-- 4. Số điện thoại (MỚI THÊM) --}}
                <div class="space-y-2">
                    <label class="text-sm font-bold text-stone-600 dark:text-slate-300">Số điện thoại</label>
                    <div class="relative">
                        <input type="text" name="phone" value="{{ old('phone', $user->phone) }}" placeholder="Nhập số điện thoại..."
                            class="w-full pl-10 pr-4 py-3 rounded-xl border border-stone-200 dark:border-slate-600 
                            bg-white/50 dark:bg-slate-900/50 dark:text-white 
                            focus:ring-2 focus:ring-brown-primary focus:bg-white dark:focus:bg-slate-900 focus:outline-none transition">
                        <i class="fas fa-phone absolute left-3.5 top-1/2 -translate-y-1/2 text-stone-400"></i>
                    </div>
                </div>

            </div>

            {{-- Phân cách khu vực đổi mật khẩu --}}
            <div class="relative py-4">
                <div class="absolute inset-0 flex items-center">
                    <div class="w-full border-t border-stone-200 dark:border-slate-700"></div>
                </div>
                <div class="relative flex justify-center">
                    <span class="px-4 text-sm text-stone-500 dark:text-slate-400 bg-transparent backdrop-blur-sm rounded-full border border-stone-200 dark:border-slate-700 italic">
                        <i class="fas fa-key mr-1"></i> Đổi mật khẩu (Tùy chọn)
                    </span>
                </div>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                {{-- Mật khẩu mới --}}
                <div class="space-y-2">
                    <label class="text-sm font-bold text-stone-600 dark:text-slate-300">Mật khẩu mới</label>
                    <div class="relative">
                        <input type="password" name="password" placeholder="Nhập mật khẩu mới..."
                            class="w-full pl-10 pr-4 py-3 rounded-xl border border-stone-200 dark:border-slate-600 
                            bg-white/50 dark:bg-slate-900/50 dark:text-white 
                            focus:ring-2 focus:ring-brown-primary focus:bg-white dark:focus:bg-slate-900 focus:outline-none transition placeholder-stone-400">
                        <i class="fas fa-lock absolute left-3.5 top-1/2 -translate-y-1/2 text-stone-400"></i>
                    </div>
                </div>

                {{-- Xác nhận mật khẩu --}}
                <div class="space-y-2">
                    <label class="text-sm font-bold text-stone-600 dark:text-slate-300">Nhập lại mật khẩu</label>
                    <div class="relative">
                        <input type="password" name="password_confirmation" placeholder="Xác nhận mật khẩu..."
                            class="w-full pl-10 pr-4 py-3 rounded-xl border border-stone-200 dark:border-slate-600 
                            bg-white/50 dark:bg-slate-900/50 dark:text-white 
                            focus:ring-2 focus:ring-brown-primary focus:bg-white dark:focus:bg-slate-900 focus:outline-none transition placeholder-stone-400">
                        <i class="fas fa-check-circle absolute left-3.5 top-1/2 -translate-y-1/2 text-stone-400"></i>
                    </div>
                </div>
            </div>

            {{-- Buttons --}}
            <div class="flex justify-end gap-4 pt-4 border-t border-stone-200/50 dark:border-slate-700/50 mt-6">
                <a href="{{ route('admin.users.index') }}" 
                   class="px-6 py-3 rounded-xl font-bold text-stone-500 hover:text-stone-700 dark:text-slate-400 dark:hover:text-white hover:bg-stone-100 dark:hover:bg-slate-700 transition">
                    Hủy bỏ
                </a>
                <button type="submit" class="px-8 py-3 rounded-xl bg-brown-primary dark:bg-red-600 text-white font-bold hover:bg-brown-dark dark:hover:bg-red-700 shadow-lg hover:shadow-xl transition transform hover:-translate-y-1">
                    <i class="fas fa-save mr-2"></i> Lưu thay đổi
                </button>
            </div>

        </form>
    </div>
</div>
@endsection