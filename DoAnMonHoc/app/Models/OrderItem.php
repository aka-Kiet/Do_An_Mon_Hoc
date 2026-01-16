<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class OrderItem extends Model
{
    use HasFactory;

    protected $fillable = ['order_id', 'book_id', 'quantity', 'price'];

    // Quan hệ: Item này thuộc về Sản phẩm nào?
    public function book() {
        // Item này thuộc về một cuốn Sách (Book)
        return $this->belongsTo(Book::class);
    }
}
