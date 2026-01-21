<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class BookImage extends Model
{
    use HasFactory;

    
    protected $appends = ['url'];

    public function getUrlAttribute()
    {
        return Storage::url($this->image_path);
    }

    protected $fillable = ['book_id', 'image_path', 'sort_order'];

    // Quan hệ ngược: 1 tấm ảnh thuộc về 1 cuốn sách
    public function book()
    {
        return $this->belongsTo(Book::class);
    }
}
