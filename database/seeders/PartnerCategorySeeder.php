<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Partner;
use App\Models\PartnerCategory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PartnerCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $partnerCategories = [
            ['partner_id' => Partner::where('name', 'Apple')->first()->id, 'category_id' => Category::where('name', 'Móviles')->first()->id],
            ['partner_id' => Partner::where('name', 'Apple')->first()->id, 'category_id' => Category::where('name', 'Laptops')->first()->id],
            ['partner_id' => Partner::where('name', 'Samsung')->first()->id, 'category_id' => Category::where('name', 'Móviles')->first()->id],
            ['partner_id' => Partner::where('name', 'Nike')->first()->id, 'category_id' => Category::where('name', 'Calzado')->first()->id],
        ];

        PartnerCategory::insert($partnerCategories);
    }
}
