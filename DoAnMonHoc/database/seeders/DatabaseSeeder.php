<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Đây là tài khoản để bạn đăng nhập test
        \App\Models\User::factory()->create([
            'name' => 'Admin Kiệt',
            'email' => 'admin@gmail.com',
            'password' => Hash::make('123456'), // Mật khẩu là 123456
            'email_verified_at' => now(),
            'role' => 'admin',
        ]);

        User::factory(10)->create();
        $this->call([
            BannerSeeder::class,
            CategorySeeder::class,  
            AuthorSeeder::class, 
            BookSeeder::class,
            BookImageSeeder::class,
            ReviewSeeder::class,
        ]);

        User::factory()->create([
            'name' => 'Test User',
            'email' => 'test@example.com',
        ]);
    }
}
