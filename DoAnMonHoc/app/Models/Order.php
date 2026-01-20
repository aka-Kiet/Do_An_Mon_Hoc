<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;

class Order extends Model
{
    use HasFactory, SoftDeletes;
    
    protected $fillable = ['user_id', 'status', 'total_price', 'name', 'phone', 'address','payment_method'];

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
        'shipping'   => 'Đang giao hàng',
        'completed'  => 'Hoàn thành',
        'cancelled'  => 'Đã hủy',
    ];

    public function getStatusLabelAttribute()
    {
        return self::STATUS_LABELS[$this->status] ?? 'Không xác định';
    }
}
