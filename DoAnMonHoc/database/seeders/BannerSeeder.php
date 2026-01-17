<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\Banner; // Sử dụng Model Banner


class BannerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Xóa dữ liệu cũ để tránh trùng lặp khi seed lại
        DB::table('banners')->truncate();

        $banners = [
            [
                'title' => 'Thế Giới Sách Đa Dạng',
                'badge' => 'Mới Nhất',
                'description' => 'Khám phá hơn 10.000 đầu sách văn học, kinh tế và kỹ năng sống mới cập nhật.',
                'image_path' => 'banners/banner_01.jpg', 
                'sort_order' => 1,
                'is_active' => true,
                // Thêm link trỏ về trang tất cả sản phẩm
                'link' => route('product.index'),
            ],
            [
                'title' => 'Siêu Sale Mùa Hè',
                'badge' => 'Giảm 50%',
                'description' => 'Cơ hội săn sách giá rẻ chưa từng có. Áp dụng cho toàn bộ sách Văn Học.',
                'image_path' => 'banners/banner_02.jpg',
                'sort_order' => 2,
                // Link trỏ về trang sản phẩm + sắp xếp giá thấp đến cao
                'link' => route('product.index', ['sort' => 'price_asc']),
            ],
            [
                'title' => 'Tủ Sách Doanh Nhân',
                'badge' => 'Best Seller',
                'description' => 'Những cuốn sách gối đầu giường giúp bạn khởi nghiệp thành công.',
                'image_path' => 'banners/banner_03.jpg',
                'sort_order' => 3,
                'is_active' => true,
                // Giả sử lọc theo danh mục ID 1 (Bạn có thể sửa ID khác)
                'link' => route('product.index', ['categories' => [1]]),
            ],
            [
                'title' => 'Góc Nhỏ Thiếu Nhi',
                'badge' => 'Yêu Thích',
                'description' => 'Truyện tranh, sách tô màu và những câu chuyện cổ tích kỳ thú cho bé.',
                'image_path' => 'banners/banner_04.jpg',
                'sort_order' => 4,
                'is_active' => true,
                'link' => route('product.index'),
            ],
            [
                'title' => 'Hội Viên BookStore',
                'badge' => 'V.I.P',
                'description' => 'Đăng ký thành viên ngay hôm nay để nhận ưu đãi Freeship trọn đời.',
                'image_path' => 'banners/banner_05.jpg',
                'sort_order' => 5,
                'is_active' => true,
                // Banner này có thể trỏ về trang đăng ký
                'link' => route('register'),
            ],
        ];

        // Vòng lặp tạo dữ liệu
        foreach ($banners as $item) {
            Banner::create($item);
        }
    }
}
