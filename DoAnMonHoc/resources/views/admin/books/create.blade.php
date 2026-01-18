@extends('layouts.admin')
@section('title','Thêm sản phẩm')

@section('content')
@include('admin.books.form', [
    'action' => route('admin.books.store'),
    'method' => 'POST'
])
@endsection
