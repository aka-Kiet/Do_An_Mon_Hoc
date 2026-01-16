<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Order extends Model
{
    use HasFactory;
    
    protected $fillable = ['user_id', 'status', 'total_price', 'name', 'phone', 'address'];

    // Quan hệ: 1 Đơn hàng có nhiều món (Items)
    public function items() {
        return $this->hasMany(OrderItem::class);
    }
}
