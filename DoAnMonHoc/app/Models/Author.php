<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Support\Str;

class Author extends Model
{
    use HasFactory;

     protected static function booted()
    {
        static::creating(function ($author) {
            if (empty($author->slug)) {
                $baseSlug = Str::slug($author->name);
                $slug = $baseSlug;
                $count = 1;

                while (self::where('slug', $slug)->exists()) {
                    $slug = $baseSlug . '-' . $count++;
                }

                $author->slug = $slug;
            }
        });
    }

    public function books()
    {
        return $this->hasMany(Book::class);
    }
}
