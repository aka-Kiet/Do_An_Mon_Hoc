<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        // Admin
        User::updateOrCreate(
            ['email' => 'admin@gmail.com'],
            [
                'name' => 'Admin Kiệt',
                'password' => Hash::make('123456'),
                'role' => 'admin',
                'email_verified_at' => now(),
            ]
        );

        // User thường
        $users = [
            ['email'=>'user1@gmail.com','name'=>'Nguyễn Văn A','gender'=>'male'],
            ['email'=>'user2@gmail.com','name'=>'Trần Thị B','gender'=>'female'],
            ['email'=>'user3@gmail.com','name'=>'Lê Văn C','gender'=>'male'],
            ['email'=>'user4@gmail.com','name'=>'Phạm Thị D','gender'=>'female'],
            ['email'=>'user5@gmail.com','name'=>'Hoàng Văn E','gender'=>'male'],
            ['email'=>'user6@gmail.com','name'=>'Vũ Thị F','gender'=>'female'],
            ['email'=>'user7@gmail.com','name'=>'Đặng Văn G','gender'=>'male'],
            ['email'=>'user8@gmail.com','name'=>'Bùi Thị H','gender'=>'female'],
            ['email'=>'user9@gmail.com','name'=>'Nguyễn Văn I','gender'=>'male'],
        ];

        foreach ($users as $user) {
            User::updateOrCreate(
                ['email' => $user['email']],
                [
                    'name' => $user['name'],
                    'password' => Hash::make('123456'),
                    'role' => 'user',
                    'phone' => fake()->phoneNumber(),
                    'address' => fake()->city(),
                    'birthday' => fake()->date(),
                    'gender' => $user['gender'],
                ]
            );
        }
    }
}

