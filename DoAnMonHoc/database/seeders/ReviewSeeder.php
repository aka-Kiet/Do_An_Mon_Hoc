<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Review;

class ReviewSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // 1. Review khen Nhà Giả Kim (User 1)
        Review::create([
            'user_id' => 1,
            'book_id' => 1, // Nhà giả kim
            'rating' => 5,
            'comment' => 'Sách quá hay, bìa đẹp, giao hàng nhanh. Mọi người nên đọc thử!',
            'is_active' => true,
        ]);

        // 2. Review chê nhẹ Nhà Giả Kim (User 2)
        Review::create([
            'user_id' => 2, // Phải đảm bảo DB có user id 2
            'book_id' => 1, 
            'rating' => 4,
            'comment' => 'Nội dung hơi triết lý, khó hiểu với người mới đọc.',
            'is_active' => true,
        ]);

        // 3. Review khen Harry Potter (User 1)
        Review::create([
            'user_id' => 1,
            'book_id' => 3, // Harry Potter
            'rating' => 5,
            'comment' => 'Huyền thoại tuổi thơ. Đọc đi đọc lại vẫn thấy cuốn.',
            'is_active' => true,
        ]);
    }
}
