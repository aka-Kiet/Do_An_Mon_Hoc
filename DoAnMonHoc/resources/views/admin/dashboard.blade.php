@extends('layouts.admin')



@section('content')
    <div class="grid grid-cols-1 md:grid-cols-4 gap-6 mb-8">
        <div class="bg-white rounded-xl p-6 shadow-sm border-l-4 border-blue-500">
            <div class="flex justify-between items-start">
                <div>
                    <p class="text-xs font-semibold text-gray-400 uppercase">Tổng doanh thu</p>
                    <h3 class="text-2xl font-bold text-gray-800 mt-1">15.200.000đ</h3>
                </div>
                <div class="p-2 bg-blue-50 rounded-lg text-blue-600">
                    <i class="fas fa-dollar-sign text-xl"></i>
                </div>
            </div>
        </div>

        <div class="bg-white rounded-xl p-6 shadow-sm border-l-4 border-green-500">
            <div class="flex justify-between items-start">
                <div>
                    <p class="text-xs font-semibold text-gray-400 uppercase">Đơn hàng mới</p>
                    <h3 class="text-2xl font-bold text-gray-800 mt-1">12</h3>
                </div>
                <div class="p-2 bg-green-50 rounded-lg text-green-600">
                    <i class="fas fa-shopping-bag text-xl"></i>
                </div>
            </div>
        </div>

        </div>
@endsection