<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Setting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class SettingController extends Controller
{
    // Hiển thị Form
    public function edit()
    {
        // Lấy dữ liệu dạng ['key' => 'value'] để view dễ dùng
        $settings = Setting::all()->pluck('value', 'key')->toArray();
        return view('admin.settings.edit', compact('settings'));
    }

    // Xử lý Lưu
    public function update(Request $request)
    {
        // 1. Lấy tất cả dữ liệu trừ _token và logo (vì logo xử lý riêng)
        $data = $request->except(['_token', 'logo']);

        // 2. Xử lý Upload Logo (Nếu có chọn ảnh mới)
        if ($request->hasFile('logo')) {
            // Upload ảnh vào thư mục storage/app/public/settings
            $path = $request->file('logo')->store('settings', 'public');
            
            // Lưu đường dẫn ảnh vào DB với key là 'logo'
            Setting::updateOrCreate(['key' => 'logo'], ['value' => $path]);
        }

        // 3. Lưu các thông tin chữ (hotline, email, facebook...)
        foreach ($data as $key => $value) {
            // Nếu value null thì lưu chuỗi rỗng để tránh lỗi
            Setting::updateOrCreate(['key' => $key], ['value' => $value]);
        }

        return redirect()->back()->with('success', 'Cập nhật cấu hình thành công!');
    }
}