<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class UserController extends Controller
{
    public function index(Request $request)
    {
        $viewData = [];
        $viewData["title"] = "Quản lý người dùng";

        $query = User::query();

        // Xử lý tìm kiếm
        if ($request->has('search') && $request->search != '') {
            $keyword = $request->search;
            $query->where(function ($q) use ($keyword) {
                $q->where('email', 'like', "%{$keyword}%") // Tìm theo Email
                  ->orWhere('name', 'like', "%{$keyword}%") // Tìm theo Tên
                  ->orWhere('phone', 'like', "%{$keyword}%"); // Tìm theo SĐT
            });
        }

        // Sắp xếp và phân trang
        // appends($request->all()): Để khi bấm sang trang 2, 3 thì vẫn giữ lại từ khóa tìm kiếm
        $users = $query->orderBy('created_at', 'desc')
                       ->paginate(10)
                       ->appends($request->all());

        return view('admin.users.index', compact('users', 'viewData'));
    }

    // 2. Xóa
    public function destroy($id)
    {
        $user = User::findOrFail($id);

        // Chặn: Không cho phép tự xóa mình
        if ($user->id == Auth::id()) {
            return back()->with('error', 'Bạn không thể xóa chính tài khoản mình đang đăng nhập!');
        }

        $user->delete();

        return back()->with('success', 'Đã xóa người dùng thành công');
    }

    // 3. Hiển thị form sửa
    public function edit($id)
    {
        $user = User::findOrFail($id);
        return view('admin.users.edit', compact('user'));
    }

    // 4. Xử lý cập nhật
    public function update(Request $request, $id)
    {
        $user = User::findOrFail($id);

        // Validate dữ liệu
        $request->validate([
            'name' => 'required|string|max:255',
            // Email là duy nhất, nhưng trừ ID của user hiện tại ra
            'email' => 'required|email|unique:users,email,' . $id, 
            'role' => 'required|in:admin,user', // Hoặc is_admin tùy database
            'password' => 'nullable|min:6|confirmed', // Mật khẩu không bắt buộc
        ]);

        // Cập nhật thông tin cơ bản
        $user->name = $request->name;
        $user->email = $request->email;
        $user->phone = $request->phone;
        $user->role = $request->role; // Hoặc $user->is_admin = $request->role;

        // Xử lý mật khẩu (Chỉ đổi nếu người dùng có nhập)
        if ($request->filled('password')) {
            $user->password = bcrypt($request->password);
        }

        $user->save();

        return redirect()->route('admin.users.index')->with('success', 'Cập nhật thông tin người dùng thành công!');
    }

    // 5. Hiển thị form thêm mới
    public function create()
    {
        return view('admin.users.create');
    }

    // 6. Xử lý lưu user mới
    public function store(Request $request)
    {
        // Validate dữ liệu
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email', // Email không được trùng
            'password' => 'required|min:6|confirmed', // Bắt buộc phải có mật khẩu
            'role' => 'required|in:admin,user',
        ], [
            'email.unique' => 'Email này đã được sử dụng.',
            'password.confirmed' => 'Mật khẩu nhập lại không khớp.',
        ]);

        // Tạo user mới
        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password), // Mã hóa mật khẩu
            'role' => $request->role,
            // 'is_admin' => $request->role == 'admin' ? 1 : 0, // Dùng dòng này nếu DB bạn dùng cột is_admin thay vì role
        ]);

        return redirect()->route('admin.users.index')->with('success', 'Đã thêm người dùng mới thành công!');
    }
}
