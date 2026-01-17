<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Book extends Model
{
    use HasFactory;

    protected $fillable = [
        'name', 
        'slug', 
        'image', 
        'description',
        'price', 
        'quantity',
        'sold_quantity', 
        'avg_rating', 
        'total_reviews',
        'is_active', 
        'is_featured',
        'category_id', 
        'author_id'
    ];

    // Quan hệ: Sách thuộc về 1 Danh mục
    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    // Quan hệ: Sách thuộc về 1 Tác giả
    public function author()
    {
        return $this->belongsTo(Author::class);
    }

    public function images()
    {
        return $this->hasMany(BookImage::class)->orderBy('sort_order', 'asc');
    }
    public function cartItems()
    {
        return $this->hasMany(CartItem::class);
    }

}
