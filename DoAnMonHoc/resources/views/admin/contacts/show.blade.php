@extends('layouts.admin')

@section('content')
<h1>Chi tiết liên hệ</h1>

<p><strong>Họ tên:</strong> {{ $contact->name }}</p>
<p><strong>Email:</strong> {{ $contact->email }}</p>
<p><strong>Chủ đề:</strong> {{ $contact->subject }}</p>
<p><strong>Nội dung:</strong></p>

<p>{{ $contact->message }}</p>

<a href="{{ route('admin.contacts.index') }}">⬅ Quay lại</a>
@endsection
