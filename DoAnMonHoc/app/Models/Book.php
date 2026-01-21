<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\SoftDeletes; // Xóa mềm
use Illuminate\Support\Facades\Storage;

class Book extends Model
{
    use HasFactory,SoftDeletes;

    protected $appends = ['image_url'];
    
    public function getImageUrlAttribute()
    {
        return $this->image
            ? Storage::url($this->image)
            : asset('images/no-image.png');
    }

    protected $fillable = [
        'name',
        'slug',
        'image',
        'description',
        'short_description',
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

    protected static function booted()
    {
        static::creating(function ($book) {

            if (empty($book->slug)) {

                $baseSlug = Str::slug($book->name);
                $slug = $baseSlug;
                $count = 1;

                while (self::withTrashed()->where('slug', $slug)->exists()) {
                    $slug = $baseSlug . '-' . $count++;
                }

                $book->slug = $slug;
            }
        });
    }


    // Quan hệ: Sách thuộc về 1 Danh mục
    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    // Quan hệ: Sách thuộc về 1 Tác giả
   public function author()
    {
        return $this->belongsTo(Author::class)->withDefault([
            'name' => 'Đang cập nhật',
        ]);
    }

    public function images()
    {
        return $this->hasMany(BookImage::class)->orderBy('sort_order', 'asc');
    }
    // đánh giá, mới nhất ở đầu
    public function reviews()
    {
        return $this->hasMany(Review::class)->where('is_active', true)->orderBy('created_at', 'desc');
    }
    
}
