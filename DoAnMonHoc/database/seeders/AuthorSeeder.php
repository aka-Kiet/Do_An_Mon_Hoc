<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Author;

class AuthorSeeder extends Seeder
{
    public function run(): void
    {
        $authors = [
            [
                'name' => 'Nguyễn Nhật Ánh',
                'slug' => 'nguyen-nhat-anh',
                'bio'  => 'Nhà văn nổi tiếng chuyên viết cho thanh thiếu niên. Tác giả của "Mắt Biếc", "Kính Vạn Hoa".',
            ],
            [
                'name' => 'J.K. Rowling',
                'slug' => 'j-k-rowling',
                'bio'  => 'Nữ văn sĩ người Anh, mẹ đẻ của bộ truyện Harry Potter huyền thoại.',
            ],
            [
                'name' => 'Rosie Nguyễn',
                'slug' => 'rosie-nguyen',
                'bio'  => 'Tác giả, blogger du lịch với cuốn "Tuổi trẻ đáng giá bao nhiêu".',
            ],
            [
                'name' => 'Paulo Coelho',
                'slug' => 'paulo-coelho',
                'bio'  => 'Tiểu thuyết gia Brazil, tác giả "Nhà Giả Kim".',
            ],
            [
                'name' => 'Philip Kotler',
                'slug' => 'philip-kotler',
                'bio'  => 'Cha đẻ của Marketing hiện đại.',
            ],
            [
                'name' => 'Dale Carnegie',
                'slug' => 'dale-carnegie',
                'bio'  => 'Tác giả "Đắc Nhân Tâm", diễn giả nổi tiếng.',
            ],
            [
                'name' => 'Nguyễn Ngọc Tư',
                'slug' => 'nguyen-ngoc-tu',
                'bio'  => 'Nhà văn nữ nổi tiếng với "Cánh Đồng Bất Tận".',
            ],
            [
                'name' => 'Haruki Murakami',
                'slug' => 'haruki-murakami',
                'bio'  => 'Nhà văn Nhật Bản với phong cách siêu thực.',
            ],
            [
                'name' => 'Vũ Trọng Phụng',
                'slug' => 'vu-trong-phung',
                'bio'  => 'Ông vua phóng sự đất Bắc, tác giả "Số Đỏ".',
            ],
            [
                'name' => 'Robert Kiyosaki',
                'slug' => 'robert-kiyosaki',
                'bio'  => 'Tác giả bộ sách "Dạy Con Làm Giàu".',
            ],
            [
                'name' => 'Napoleon Hill',
                'slug' => 'napoleon-hill',
                'bio'  => 'Tác giả "Nghĩ Giàu Làm Giàu".',
            ],
            [
                'name' => 'Tô Hoài',
                'slug' => 'to-hoai',
                'bio'  => 'Tác giả "Dế Mèn Phiêu Lưu Ký".',
            ],
            [
                'name' => 'Arthur Conan Doyle',
                'slug' => 'arthur-conan-doyle',
                'bio'  => 'Cha đẻ Sherlock Holmes.',
            ],
            [
                'name' => 'Nam Cao',
                'slug' => 'nam-cao',
                'bio'  => 'Nhà văn hiện thực xuất sắc với "Chí Phèo".',
            ],
            [
                'name' => 'Stephen King',
                'slug' => 'stephen-king',
                'bio'  => 'Ông vua tiểu thuyết kinh dị.',
            ],
            [
                'name' => 'James Clear',
                'slug' => 'james-clear',
                'bio'  => 'Tác giả Atomic Habits.',
            ],
            [
                'name' => 'Yuval Noah Harari',
                'slug' => 'yuval-noah-harari',
                'bio'  => 'Tác giả Sapiens – Lược Sử Loài Người.',
            ],
            [
                'name' => 'Stephen R. Covey',
                'slug' => 'stephen-r-covey',
                'bio'  => 'Tác giả 7 Thói Quen Của Người Thành Đạt.',
            ],
            [
                'name' => 'Tony Robbins',
                'slug' => 'tony-robbins',
                'bio'  => 'Diễn giả và tác giả phát triển bản thân.',
            ],
            [
                'name' => 'Dan Brown',
                'slug' => 'dan-brown',
                'bio'  => 'Tác giả Mật Mã Da Vinci.',
            ],
            [
                'name' => 'Osho',
                'slug' => 'osho',
                'bio'  => 'Triết gia và diễn giả tâm linh.',
            ],
            [
                'name' => 'Thích Nhất Hạnh',
                'slug' => 'thich-nhat-hanh',
                'bio'  => 'Thiền sư, học giả Phật giáo.',
            ],
        ];

        foreach ($authors as $author) {
            Author::updateOrCreate(
                ['slug' => $author['slug']],
                [
                    'name' => $author['name'],
                    'bio'  => $author['bio'],
                ]
            );
        }

        
    }
}
