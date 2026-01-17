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
        Author::create([
            'name' => 'Dale Carnegie',
            'slug' => 'dale-carnegie',
            'bio'  => 'Tác giả và diễn giả nổi tiếng với các sách phát triển bản thân và giao tiếp.',
        ]);

        Author::create([
            'name' => 'James Clear',
            'slug' => 'james-clear',
            'bio'  => 'Tác giả cuốn Atomic Habits, chuyên gia về thói quen và hiệu suất cá nhân.',
        ]);

        Author::create([
            'name' => 'Napoleon Hill',
            'slug' => 'napoleon-hill',
            'bio'  => 'Tác giả kinh điển của dòng sách tư duy thành công như Nghĩ Giàu Làm Giàu.',
        ]);

        Author::create([
            'name' => 'Yuval Noah Harari',
            'slug' => 'yuval-noah-harari',
            'bio'  => 'Nhà sử học người Israel, tác giả Sapiens – Lược Sử Loài Người.',
        ]);

        Author::create([
            'name' => 'Haruki Murakami',
            'slug' => 'haruki-murakami',
            'bio'  => 'Nhà văn Nhật Bản nổi tiếng với phong cách hiện thực huyền ảo.',
        ]);

        Author::create([
            'name' => 'Stephen R. Covey',
            'slug' => 'stephen-r-covey',
            'bio'  => 'Tác giả 7 Thói Quen Của Người Thành Đạt, chuyên gia lãnh đạo cá nhân.',
        ]);

        Author::create([
            'name' => 'Tony Robbins',
            'slug' => 'tony-robbins',
            'bio'  => 'Diễn giả truyền cảm hứng và tác giả sách phát triển bản thân nổi tiếng thế giới.',
        ]);

        Author::create([
            'name' => 'Dan Brown',
            'slug' => 'dan-brown',
            'bio'  => 'Tiểu thuyết gia Mỹ, tác giả Mật Mã Da Vinci và các tiểu thuyết trinh thám.',
        ]);

        Author::create([
            'name' => 'Osho',
            'slug' => 'osho',
            'bio'  => 'Triết gia và diễn giả tâm linh với nhiều tác phẩm về cuộc sống và thiền định.',
        ]);

        Author::create([
            'name' => 'Thích Nhất Hạnh',
            'slug' => 'thich-nhat-hanh',
            'bio'  => 'Thiền sư, học giả Phật giáo, tác giả nhiều sách về chánh niệm và an lạc.',
        ]);
    }
}

