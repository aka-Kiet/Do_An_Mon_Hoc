<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\User;
use App\Models\Book;
use Illuminate\Support\Arr;

class OrderSeeder extends Seeder
{
    public function run(): void
    {
        $users = User::where('role', 'user')->get();
        $books = Book::where('is_active', true)->get();

        if ($users->isEmpty() || $books->isEmpty()) {
            $this->command->warn('❌ Không đủ user hoặc book để tạo order');
            return;
        }

        $statuses = ['pending', 'processing', 'completed', 'cancelled'];
        $payments = ['cod', 'bank_transfer', 'momo'];

        for ($i = 1; $i <= 20; $i++) {

            /** @var User $user */
            $user = $users->random();

            // Tạo đơn hàng
            $order = Order::create([
                'name' => 'ORDER-' . strtoupper(uniqid()),
                'user_id' => $user->id,
                'status' => Arr::random($statuses),
                'total_price' => 0,
                'phone' => $user->phone ?? '0900000000',
                'address' => $user->address ?? 'Chưa cập nhật',
                'payment_method' => Arr::random($payments),
            ]);

            $total = 0;

            // Mỗi đơn 1–3 sách
            foreach ($books->random(rand(1, 3)) as $book) {
                $qty = rand(1, 3);
                $price = $book->sale_price ?? $book->price;

                OrderItem::create([
                    'order_id' => $order->id,
                    'book_id' => $book->id,
                    'quantity' => $qty,
                    'price' => $price,
                ]);

                $total += $qty * $price;
            }

            // Cập nhật tổng tiền
            $order->update([
                'total_price' => $total,
            ]);
        }
    }
}
