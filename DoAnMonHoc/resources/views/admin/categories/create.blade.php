@extends('layouts.admin')
@section('title', 'Thêm danh mục')

@section('content')
<div class="max-w-xl glass p-6 rounded-3xl bg-white/50 dark:bg-slate-800/50">
    <h1 class="text-xl font-bold mb-4">Thêm danh mục</h1>

    <form method="POST" action="{{ route('admin.categories.store') }}">
        @csrf

        <label class="block mb-2 font-medium">Tên danh mục</label>
        <input type="text" name="name" value="{{ old('name') }}"
               class="w-full px-4 py-2 rounded border focus:outline-none">

        @error('name')
            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
        @enderror

        <div class="mt-6 flex gap-3">
            <button class="px-5 py-2 rounded bg-brown-primary text-white font-bold">
                Lưu
            </button>
            <a href="{{ route('admin.categories.index') }}"
               class="px-5 py-2 rounded border">Hủy</a>
        </div>
    </form>
</div>
@endsection
