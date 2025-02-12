<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Partner extends Model
{
    protected $table = 'partners';
    protected $fillable = [
        'name',
        'email'
    ];

    public function categories()
    {
        return $this->belongsToMany(Category::class, 'partner_has_category');
    }

    // public function categories()
    // {
    //     return $this->belongsToMany(Category::class, 'partner_has_category', 'partner_id', 'category_id');
    // }

    public function products()
    {
        return $this->hasManyThrough(Product::class, Category::class, 'category_id', 'id', 'id', 'id')
            ->join('product_has_category', 'products.id', '=', 'product_has_category.product_id')
            ->select('products.*');
    }
}
