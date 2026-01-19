<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Banner;
// ❌ Không cần use Storage nữa
// ✅ Dùng File để xóa ảnh trong public
use Illuminate\Support\Facades\File; 

class BannerController extends Controller
{
    public function index()
    {
        $banners = Banner::orderBy('sort_order', 'asc')->paginate(10);
        return view('admin.banners.index', compact('banners'));
    }

    public function create()
    {
        return view('admin.banners.create');
    }

    // 3. Xử lý thêm (Lưu thẳng vào public/banners)
    public function store(Request $request)
    {
        $request->validate([
            'image_path' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'sort_order' => 'integer',
        ]);

        $data = $request->all();

        // Xử lý ảnh
        if ($request->hasFile('image_path')) {
            $file = $request->file('image_path');
            
            // 1. Đặt tên file: time_tenfilegoc.jpg (để tránh trùng)
            $filename = time() . '_' . $file->getClientOriginalName();
            
            // 2. Di chuyển ảnh vào thư mục public/banners
            $file->move(public_path('banners'), $filename);
            
            // 3. Lưu đường dẫn vào DB (VD: banners/hinh.jpg)
            $data['image_path'] = 'banners/' . $filename;
        }

        $data['is_active'] = $request->has('is_active') ? 1 : 0;

        Banner::create($data);

        return redirect()->route('admin.banners.index')->with('success', 'Thêm banner thành công!');
    }

    public function edit($id)
    {
        $banner = Banner::findOrFail($id);
        return view('admin.banners.edit', compact('banner'));
    }

    // 5. Xử lý sửa (Xóa ảnh cũ trong public -> Up ảnh mới)
    public function update(Request $request, $id)
    {
        $banner = Banner::findOrFail($id);

        $request->validate([
            'image_path' => 'nullable|image|max:2048',
        ]);

        $data = $request->except(['image_path']); 

        if ($request->hasFile('image_path')) {
            // A. Xóa ảnh cũ (nếu có)
            if ($banner->image_path && File::exists(public_path($banner->image_path))) {
                File::delete(public_path($banner->image_path));
            }

            // B. Upload ảnh mới
            $file = $request->file('image_path');
            $filename = time() . '_' . $file->getClientOriginalName();
            $file->move(public_path('banners'), $filename);
            
            $data['image_path'] = 'banners/' . $filename;
        }

        $data['is_active'] = $request->has('is_active') ? 1 : 0;

        $banner->update($data);

        return redirect()->route('admin.banners.index')->with('success', 'Cập nhật banner thành công!');
    }

    // 6. Xóa (Xóa file trong public)
    public function destroy($id)
    {
        $banner = Banner::findOrFail($id);
        
        // Xóa file ảnh trong thư mục public/banners
        if ($banner->image_path && File::exists(public_path($banner->image_path))) {
            File::delete(public_path($banner->image_path));
        }

        $banner->delete();
        return back()->with('success', 'Đã xóa banner.');
    }
}