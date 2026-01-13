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
        // 1. Nguyễn Nhật Ánh
        Author::create([
            'name' => 'Nguyễn Nhật Ánh',
            'slug' => 'nguyen-nhat-anh',
            'bio'  => 'Nhà văn nổi tiếng chuyên viết cho thanh thiếu niên. Tác giả của "Mắt Biếc", "Kính Vạn Hoa".',
        ]);

        // 2. J.K. Rowling
        Author::create([
            'name' => 'J.K. Rowling',
            'slug' => 'j-k-rowling',
            'bio'  => 'Nữ văn sĩ người Anh, mẹ đẻ của bộ truyện Harry Potter huyền thoại và thế giới phù thủy.',
        ]);

        // 3. Rosie Nguyễn
        Author::create([
            'name' => 'Rosie Nguyễn',
            'slug' => 'rosie-nguyen',
            'bio'  => 'Tác giả, blogger du lịch nổi tiếng với cuốn sách "Tuổi trẻ đáng giá bao nhiêu".',
        ]);

        // 4. Paulo Coelho
        Author::create([
            'name' => 'Paulo Coelho',
            'slug' => 'paulo-coelho',
            'bio'  => 'Tiểu thuyết gia người Brazil. Tác giả của "Nhà Giả Kim" - sách bán chạy mọi thời đại.',
        ]);

        // 5. Philip Kotler
        Author::create([
            'name' => 'Philip Kotler',
            'slug' => 'philip-kotler',
            'bio'  => 'Giáo sư marketing nổi tiếng thế giới, cha đẻ của Marketing hiện đại.',
        ]);
    }
}
