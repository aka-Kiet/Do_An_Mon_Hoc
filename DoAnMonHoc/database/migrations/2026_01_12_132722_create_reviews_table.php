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
        Schema::create('reviews', function (Blueprint $table) {
            $table->id();
            
            // 1. Khóa ngoại
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->foreignId('book_id')->constrained()->onDelete('cascade');
            
            // 2. Nội dung đánh giá
            $table->unsignedTinyInteger('rating'); // Số sao: 1, 2, 3, 4, 5
            $table->text('comment')->nullable();   // Nội dung chữ (Cho phép null nếu chỉ chấm sao)
            
            // 3. Trạng thái (Admin có thể ẩn review láo)
            $table->boolean('is_active')->default(true);
            
            $table->timestamps(); // Thời gian review

            // 4. Ràng buộc: Một User chỉ được review 1 cuốn sách 1 lần
            $table->unique(['user_id', 'book_id']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('reviews');
    }
};
