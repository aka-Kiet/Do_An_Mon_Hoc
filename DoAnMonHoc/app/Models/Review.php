<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'user_id',
        'book_id',
        'rating',
        'comment',
        'is_active'
    ];

    // Liên kết ngược về User (Để hiện tên người bình luận)
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // Liên kết ngược về Book
    public function book()
    {
        return $this->belongsTo(Book::class);
    }
}
