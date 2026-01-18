@extends('layouts.admin')
@section('title','Sửa sản phẩm')

@section('content')
@include('admin.books.form', [
    'action' => route('admin.books.update', $book),
    'method' => 'PUT'
])
@endsection
