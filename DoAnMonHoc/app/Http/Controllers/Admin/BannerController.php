<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Banner;
use Illuminate\Support\Facades\File; 

class BannerController extends Controller
{
    public function index()
    {
        $viewData = [];
        $viewData["title"] = "Quản lý Quảng cáo"; 
        $banners = Banner::orderBy('sort_order', 'asc')->paginate(10);
        return view('admin.banners.index', compact('banners', 'viewData'));
    }

    public function create()
    {
        return view('admin.banners.create');
    }

    // 3. Xử lý thêm (CÓ TỰ TẠO THƯ MỤC)
    public function store(Request $request)
    {
        $request->validate([
            'image_path' => 'required|image|mimes:jpeg,png,jpg,gif|max:20240',
            'sort_order' => 'integer',
        ]);

        $data = $request->all();

        if ($request->hasFile('image_path')) {
            $file = $request->file('image_path');
            $filename = time() . '_' . $file->getClientOriginalName();
            
            // 👇 BƯỚC QUAN TRỌNG: Kiểm tra thư mục có chưa, chưa có thì tạo
            $path = public_path('banners');
            if (!File::exists($path)) {
                File::makeDirectory($path, 0755, true);
            }
            
            // Di chuyển ảnh
            $file->move($path, $filename);
            
            // Lưu đường dẫn
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

    // 5. Xử lý sửa
    public function update(Request $request, $id)
    {
        $banner = Banner::findOrFail($id);

        $request->validate([
            'image_path' => 'nullable|image|max:2048',
        ]);

        $data = $request->except(['image_path']); 

        if ($request->hasFile('image_path')) {
            // A. Xóa ảnh cũ (Kiểm tra kỹ để tránh lỗi)
            $oldPath = public_path($banner->image_path);
            if ($banner->image_path && File::exists($oldPath)) {
                File::delete($oldPath);
            }

            // B. Upload ảnh mới (Tự tạo thư mục nếu chưa có)
            $file = $request->file('image_path');
            $filename = time() . '_' . $file->getClientOriginalName();
            
            $path = public_path('banners');
            if (!File::exists($path)) {
                File::makeDirectory($path, 0755, true);
            }

            $file->move($path, $filename);
            
            $data['image_path'] = 'banners/' . $filename;
        }

        $data['is_active'] = $request->has('is_active') ? 1 : 0;

        $banner->update($data);

        return redirect()->route('admin.banners.index')->with('success', 'Cập nhật banner thành công!');
    }

    // 6. Xóa (Đảm bảo luôn xóa được Banner dù lỗi file)
    public function destroy($id)
    {
        $banner = Banner::findOrFail($id);
        
        // Cố gắng xóa ảnh, nếu lỗi thì bỏ qua để còn xóa Database
        try {
            $imagePath = public_path($banner->image_path);
            if ($banner->image_path && File::exists($imagePath)) {
                File::delete($imagePath);
            }
        } catch (\Exception $e) {
            // Ghi log lỗi nếu cần, nhưng không chặn việc xóa record
            // Log::error("Không xóa được ảnh: " . $e->getMessage());
        }

        $banner->delete();
        
        return back()->with('success', 'Đã xóa banner.');
    }
}