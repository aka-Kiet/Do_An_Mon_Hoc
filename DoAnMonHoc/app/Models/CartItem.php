<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Book;
use App\Models\Cart;

class CartItem extends Model
{
    protected $fillable = [
        'cart_id',
        'book_id',
        'quantity',
        'price'
    ];
    public function cart()
    {
        return $this->belongsTo(Cart::class);
    }
    public function book()
    {
        return $this->belongsTo(Book::class);
    }

  
}
