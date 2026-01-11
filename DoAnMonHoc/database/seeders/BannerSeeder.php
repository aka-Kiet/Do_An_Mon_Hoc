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
        Banner::create([
            'title' => 'Tương lai <span class="text-cyan-400">Kỹ Thuật Số</span>', // Lưu cả HTML để chỉnh màu
            'badge' => 'CÔNG NGHỆ 2026',
            'description' => 'Cập nhật những xu hướng công nghệ mới nhất: AI, Blockchain và Vũ trụ ảo.',
            'image_path' => 'banners/tech-slider.jpg', // Bạn cần chép 1 ảnh vào thư mục public/banners/
            'sort_order' => 1,
            'is_active' => true,
        ]);

        // Banner 2: Sách Mới (Ví dụ thêm)
        Banner::create([
            'title' => 'Đọc sách là <span class="text-yellow-400">Đầu tư cho bản thân</span>',
            'badge' => 'KHUYẾN MÃI THÁNG 1',
            'description' => 'Giảm giá lên đến 50% cho các đầu sách kinh tế và kỹ năng sống.',
            'image_path' => 'banners/book-sale.jpg',
            'sort_order' => 2,
            'is_active' => true,
        ]);
    }
}
