<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Banner; // Sử dụng Model Banner

class BannerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // 1. Banner Công Nghệ (Vị trí số 1)
        Banner::create([
            'title' => 'Tương lai <span class="text-cyan-400">Kỹ Thuật Số</span>',
            'badge' => 'CÔNG NGHỆ 2026',
            'description' => 'Khám phá những cuốn sách về AI, Blockchain và xu hướng công nghệ mới nhất.',
            'image_path' => 'banners/tech-slider.jpg',
            'sort_order' => 1,
            'is_active' => true,
        ]);

        // 2. Banner Kỹ Năng / Sale (Vị trí số 2)
        Banner::create([
            'title' => 'Đọc sách là <span class="text-warning">Đầu tư cho bản thân</span>',
            'badge' => 'KHUYẾN MÃI THÁNG 1',
            'description' => 'Giảm giá lên đến 50% cho các đầu sách kinh tế, kỹ năng sống và khởi nghiệp.',
            'image_path' => 'banners/book-sale.jpg',
            'sort_order' => 2,
            'is_active' => true,
        ]);

        // 3. Banner Thiếu Nhi (Vị trí số 3)
        Banner::create([
            'title' => 'Mùa hè <span class="text-success">Sôi Động</span> cùng bé',
            'badge' => 'SÁCH THIẾU NHI',
            'description' => 'Tuyển tập truyện tranh, sách khoa học vui giúp bé vừa học vừa chơi.',
            'image_path' => 'banners/summer-reading.jpg',
            'sort_order' => 3,
            'is_active' => true,
        ]);

        // 4. Banner Văn Học (Vị trí số 4)
        Banner::create([
            'title' => 'Tuyệt tác <span class="text-danger">Văn Học</span> kinh điển',
            'badge' => 'BÁN CHẠY NHẤT',
            'description' => 'Những tác phẩm văn học nước ngoài và trong nước không thể bỏ lỡ.',
            'image_path' => 'banners/classic-novels.jpg',
            'sort_order' => 4,
            'is_active' => true,
        ]);

        // 5. Banner Dụng Cụ Học Tập (Vị trí số 5)
        Banner::create([
            'title' => 'Hành trang <span class="text-info">Đến Trường</span>',
            'badge' => 'BACK TO SCHOOL',
            'description' => 'Sắm sửa bút, vở, balo và dụng cụ học tập với giá ưu đãi cực sốc.',
            'image_path' => 'banners/back-to-school.jpg',
            'sort_order' => 5,
            'is_active' => true,
        ]);
    }
}
