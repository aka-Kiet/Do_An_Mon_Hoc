<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Category;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // 1. Văn Học (Màu đỏ/hồng)
        Category::create([
            'name' => 'Văn Học',
            'slug' => 'van-hoc',
            'icon' => 'fas fa-feather-alt', // Icon lông vũ (bạn cần cài FontAwesome)
            'is_featured' => true,
        ]);

        // 2. Kinh Tế (Màu xanh dương)
        Category::create([
            'name' => 'Kinh Tế',
            'slug' => 'kinh-te',
            'icon' => 'fas fa-chart-line', // Icon biểu đồ
            'is_featured' => true,
        ]);

        // 3. Kỹ Năng (Màu vàng/cam)
        Category::create([
            'name' => 'Kỹ Năng',
            'slug' => 'ky-nang',
            'icon' => 'fas fa-lightbulb', // Icon bóng đèn
            'is_featured' => true,
        ]);

        // 4. Nghệ Thuật (Màu tím)
        Category::create([
            'name' => 'Nghệ Thuật',
            'slug' => 'nghe-thuat',
            'icon' => 'fas fa-palette', // Icon bảng vẽ
            'is_featured' => true,
        ]);
    }
}
