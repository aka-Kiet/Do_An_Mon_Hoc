<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory; // Sử dụng HasFactory
use Illuminate\Database\Eloquent\Model;

class Banner extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'badge',
        'description',
        'image_path',
        'sort_order',
        'is_active',
        'link',
    ];
}
