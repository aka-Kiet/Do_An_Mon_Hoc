<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        // Bảng Đơn Hàng
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade'); // Khách hàng nào?
            $table->string('status')->default('pending'); // pending, shipping, completed, cancelled
            $table->decimal('total_price', 15, 0); // Tổng tiền
            $table->string('name'); // Tên người nhận
            $table->string('phone'); // SĐT người nhận
            $table->string('address'); // Địa chỉ nhận
            $table->timestamps();
        });

        // Bảng Chi Tiết Đơn Hàng (Mua sách gì, số lượng bao nhiêu)
        Schema::create('order_items', function (Blueprint $table) {
            $table->id();
            $table->foreignId('order_id')->constrained()->onDelete('cascade');
            $table->foreignId('book_id')->constrained('books')->onDelete('cascade');
            $table->integer('quantity'); // Số lượng
            $table->decimal('price', 15, 0); // Giá tại thời điểm mua
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('orders');
    }
};
