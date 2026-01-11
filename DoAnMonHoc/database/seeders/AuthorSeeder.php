<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Author;

class AuthorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // 1. Tác giả Việt Nam
        Author::create([
            'name' => 'Nguyễn Nhật Ánh',
            'slug' => 'nguyen-nhat-anh',
            'bio' => 'Nhà văn chuyên viết cho thanh thiếu niên với các tác phẩm như Mắt Biếc, Kính Vạn Hoa...',
        ]);

        // 2. Tác giả Quốc Tế - Kinh Tế/Kỹ Năng
        Author::create([
            'name' => 'Dale Carnegie',
            'slug' => 'dale-carnegie',
            'bio' => 'Tác giả của cuốn sách Đắc Nhân Tâm nổi tiếng toàn cầu.',
        ]);

        // 3. Tác giả Quốc Tế - Văn Học
        Author::create([
            'name' => 'J.K. Rowling',
            'slug' => 'j-k-rowling',
            'bio' => 'Tác giả của bộ truyện Harry Potter huyền thoại.',
        ]);
        
        // 4. Tác giả khác
        Author::create([
            'name' => 'Paulo Coelho',
            'slug' => 'paulo-coelho',
            'bio' => 'Tiểu thuyết gia nổi tiếng với tác phẩm Nhà Giả Kim.',
        ]);
    }
}
