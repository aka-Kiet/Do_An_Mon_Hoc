@extends('layouts.admin')

@section('content')
<div class="container mx-auto px-4 pt-28 pb-10">
    <div class="max-w-2xl mx-auto rounded-3xl p-8
        bg-white/60 dark:bg-slate-800/40 backdrop-blur-xl 
        border border-stone-200/50 dark:border-slate-700/50 
        shadow-lg">
        
        <h2 class="text-2xl font-bold text-brown-dark dark:text-white mb-6 flex items-center border-b border-stone-200/50 dark:border-slate-700/50 pb-4">
            <i class="fas fa-edit mr-3 text-blue-500"></i> 
            Cập nhật liên hệ
        </h2>

        <form action="{{ route('admin.contacts.update', $contact->id) }}" method="POST" class="space-y-6">
            @csrf
            @method('PUT') {{-- Bắt buộc để Update --}}

            {{-- Tên người gửi --}}
            <div class="space-y-2">
                <label class="text-sm font-bold text-stone-600 dark:text-slate-300">Tên người gửi</label>
                <input type="text" name="name" value="{{ old('name', $contact->name) }}" required
                    class="w-full px-4 py-3 rounded-xl border border-stone-200 dark:border-slate-600 
                    bg-white/50 dark:bg-slate-900/50 dark:text-white 
                    focus:ring-2 focus:ring-blue-500 focus:outline-none transition">
            </div>

            {{-- Email --}}
            <div class="space-y-2">
                <label class="text-sm font-bold text-stone-600 dark:text-slate-300">Email</label>
                <input type="email" name="email" value="{{ old('email', $contact->email) }}" required
                    class="w-full px-4 py-3 rounded-xl border border-stone-200 dark:border-slate-600 
                    bg-white/50 dark:bg-slate-900/50 dark:text-white 
                    focus:ring-2 focus:ring-blue-500 focus:outline-none transition">
            </div>

            {{-- Tiêu đề --}}
            <div class="space-y-2">
                <label class="text-sm font-bold text-stone-600 dark:text-slate-300">Tiêu đề</label>
                <input type="text" name="subject" value="{{ old('subject', $contact->subject) }}"
                    class="w-full px-4 py-3 rounded-xl border border-stone-200 dark:border-slate-600 
                    bg-white/50 dark:bg-slate-900/50 dark:text-white 
                    focus:ring-2 focus:ring-blue-500 focus:outline-none transition">
            </div>

            {{-- Nội dung tin nhắn --}}
            <div class="space-y-2">
                <label class="text-sm font-bold text-stone-600 dark:text-slate-300">Nội dung tin nhắn</label>
                <textarea name="message" rows="5" required
                    class="w-full px-4 py-3 rounded-xl border border-stone-200 dark:border-slate-600 
                    bg-white/50 dark:bg-slate-900/50 dark:text-white 
                    focus:ring-2 focus:ring-blue-500 focus:outline-none transition">{{ old('message', $contact->message ?? $contact->content) }}</textarea>
                    {{-- Lưu ý: Kiểm tra xem DB bạn đặt tên cột là 'message' hay 'content' nhé --}}
            </div>

            {{-- Buttons --}}
            <div class="flex justify-end gap-4 pt-4 border-t border-stone-200/50 dark:border-slate-700/50 mt-6">
                <a href="{{ route('admin.contacts.index') }}" 
                   class="px-6 py-3 rounded-xl font-bold text-stone-500 hover:text-stone-700 dark:text-slate-400 dark:hover:text-white hover:bg-stone-100 dark:hover:bg-slate-700 transition">
                    Hủy bỏ
                </a>
                <button type="submit" class="px-8 py-3 rounded-xl bg-blue-600 text-white font-bold hover:bg-blue-700 shadow-lg transition transform hover:-translate-y-1">
                    <i class="fas fa-save mr-2"></i> Lưu thay đổi
                </button>
            </div>
        </form>
    </div>
</div>
@endsection