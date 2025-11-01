<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Product extends Model
{

    use HasFactory;

    protected $fillable = [
        'badge',
        'image_url',
        'overlay_description',
        'category',
        'name',
        'description',
        'price',
        'stock',
    ];

    public function carts()
    {

        return $this->hasMany(Cart::class);

    }

}
