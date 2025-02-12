<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $table = 'products';
    protected $fillable = [
        'name',
        'description',
        'price',
        'stock',
        'image_url',
        'cta_url'
    ];

    public function categories()
    {
        return $this->belongsToMany(Category::class, 'product_has_category');
    }

    // public function categories()
    // {
    //     return $this->belongsToMany(Category::class, 'product_has_category', 'product_id', 'category_id');
    // }
}
