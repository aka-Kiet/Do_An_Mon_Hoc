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

    //Reset dữ liệu cũ
    public function reset()
    {
        // 1. Định nghĩa dữ liệu gốc (Code của Leader)
        $defaults = [
            'website_name'     => 'BookStore',
            'site_description' => 'BookStore là thiên đường cho những người yêu sách. Chúng tôi cam kết mang đến những cuốn sách chất lượng nhất cùng trải nghiệm mua sắm tuyệt vời.',
            'address'          => '123 Đường Nguyễn Huệ, Phường Bến Nghé, Quận 1, TP. Hồ Chí Minh',
            'hotline'          => '0909 123 456',
            'email'            => 'support@bookstore.vn',
            // Mạng xã hội để rỗng hoặc link mẫu
            'facebook'         => '', 
            'instagram'        => '',
            'youtube'          => '',
            'tiktok'           => '',
            // Logo reset về null để hiện tên chữ
            'logo'             => null, 
        ];

        // 2. Cập nhật vào Database
        foreach ($defaults as $key => $value) {
            \App\Models\Setting::updateOrCreate(
                ['key' => $key],
                ['value' => $value]
            );
        }

        // 3. Quay lại trang trước và thông báo
        return redirect()->back()->with('success', 'Đã khôi phục thông tin về mặc định ban đầu!');
    }
}