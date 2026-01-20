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
       // Admin
        User::updateOrCreate(
            ['email' => 'admin@gmail.com'],
            [
                'name' => 'Admin Kiệt',
                'password' => Hash::make('123456'),
                'email_verified_at' => now(),
                'role' => 'admin',
            ]
        );

        // 10 user thường
        for ($i = 1; $i <= 10; $i++) {
            User::updateOrCreate(
                ['email' => "user{$i}@gmail.com"],
                [
                    'name' => "User {$i}",
                    'password' => Hash::make('123456'),
                    'email_verified_at' => now(),
                    'role' => 'user',
                ]
            );
        }
        $this->call([
            UserSeeder::class,
            BannerSeeder::class,
            CategorySeeder::class,  
            AuthorSeeder::class, 
            BookSeeder::class,
            BookImageSeeder::class,
            ReviewSeeder::class,
            OrderSeeder::class,
        ]);

        
        
    }
}
