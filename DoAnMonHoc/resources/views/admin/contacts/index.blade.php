@extends('layouts.admin')

@section('content')
<h1>Danh sách liên hệ</h1>

@if(session('success'))
    <div class="alert alert-success">{{ session('success') }}</div>
@endif

<table border="1" cellpadding="10" cellspacing="0">
    <thead>
        <tr>
            <th>Tên</th>
            <th>Email</th>
            <th>Tiêu đề</th>
            <th>Ngày gửi</th>
            <th>Hành động</th>
        </tr>
    </thead>
    <tbody>
        @foreach($contacts as $contact)
        <tr>
            <td>{{ $contact->name }}</td>
            <td>{{ $contact->email }}</td>
            <td>{{ $contact->subject }}</td>
            <td>{{ $contact->created_at->format('d/m/Y') }}</td>
            <td>
                <form action="{{ route('admin.contacts.destroy', $contact->id) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button onclick="return confirm('Xóa liên hệ này?')">Xóa</button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>

{{ $contacts->links() }}
@endsection
