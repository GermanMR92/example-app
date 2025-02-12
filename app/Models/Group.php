<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Group extends Model
{
    protected $table = 'categories_groups';
    protected $fillable = [
        'name',
    ];

    public function categories()
    {
        return $this->belongsToMany(Category::class, 'group_has_category');
    }

    public function products()
    {
        return $this->hasManyThrough(Product::class, Category::class, 'category_id', 'id', 'id', 'id')
            ->join('product_has_category', 'products.id', '=', 'product_has_category.product_id')
            ->select('products.*');
    }
}
