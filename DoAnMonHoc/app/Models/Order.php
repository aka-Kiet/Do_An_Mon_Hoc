<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Order extends Model
{
    use HasFactory;
    
    protected $fillable = ['user_id', 'status', 'total_price', 'name', 'phone', 'address','payment_method'];

    // Quan hệ: 1 Đơn hàng có nhiều món (Items)
    public function items() {
        return $this->hasMany(OrderItem::class);
    }
    // Quan hệ: Đơn hàng thuộc về 1 Người dùng (User)
     public function user()
    {
         return $this->belongsTo(User::class)->withDefault([
            'name'  => 'Khách vãng lai',
            'email' => 'Không có email',
        ]);
    }
     public const STATUS_LABELS = [
        'pending'    => 'Chờ xử lý',
        'processing' => 'Đang xử lý',
        'completed'  => 'Hoàn thành',
        'cancelled'  => 'Đã hủy',
    ];

    public function getStatusLabelAttribute()
    {
        return self::STATUS_LABELS[$this->status] ?? 'Không xác định';
    }
}
