<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Product;
use App\Models\ProductCategory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProductCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $productCategories = [
            ['product_id' => Product::where('name', 'iPhone 15')->first()->id, 'category_id' => Category::where('name', 'Móviles')->first()->id],
            ['product_id' => Product::where('name', 'Samsung Galaxy S24')->first()->id, 'category_id' => Category::where('name', 'Móviles')->first()->id],
            ['product_id' => Product::where('name', 'MacBook Pro M2')->first()->id, 'category_id' => Category::where('name', 'Laptops')->first()->id],
            ['product_id' => Product::where('name', 'iPad Air')->first()->id, 'category_id' => Category::where('name', 'Tablets')->first()->id],
            ['product_id' => Product::where('name', 'Sony WH-1000XM5')->first()->id, 'category_id' => Category::where('name', 'Auriculares')->first()->id],
            ['product_id' => Product::where('name', 'Nike Air Max')->first()->id, 'category_id' => Category::where('name', 'Calzado')->first()->id],
            ['product_id' => Product::where('name', 'Xiaomi Mi Band 6')->first()->id, 'category_id' => Category::where('name', 'Wearables')->first()->id],
            ['product_id' => Product::where('name', 'Canon EOS R5')->first()->id, 'category_id' => Category::where('name', 'Cámaras')->first()->id],
            ['product_id' => Product::where('name', 'PlayStation 5')->first()->id, 'category_id' => Category::where('name', 'Consolas')->first()->id],
            ['product_id' => Product::where('name', 'Xbox Series X')->first()->id, 'category_id' => Category::where('name', 'Consolas')->first()->id],
            ['product_id' => Product::where('name', 'Nintendo Switch')->first()->id, 'category_id' => Category::where('name', 'Consolas')->first()->id],
            ['product_id' => Product::where('name', 'GoPro Hero 10')->first()->id, 'category_id' => Category::where('name', 'Cámaras')->first()->id],
            ['product_id' => Product::where('name', 'DJI Mavic Air 2')->first()->id, 'category_id' => Category::where('name', 'Drones')->first()->id],
            ['product_id' => Product::where('name', 'Bose QuietComfort 45')->first()->id, 'category_id' => Category::where('name', 'Auriculares')->first()->id],
            ['product_id' => Product::where('name', 'Garmin Fenix 7')->first()->id, 'category_id' => Category::where('name', 'Wearables')->first()->id],
            ['product_id' => Product::where('name', 'LG OLED C1')->first()->id, 'category_id' => Category::where('name', 'Televisores')->first()->id],
            ['product_id' => Product::where('name', 'Bose SoundLink Revolve')->first()->id, 'category_id' => Category::where('name', 'Altavoces')->first()->id],
            ['product_id' => Product::where('name', 'Apple Watch Series 7')->first()->id, 'category_id' => Category::where('name', 'Wearables')->first()->id],
        ];

        ProductCategory::insert($productCategories);
    }
}
