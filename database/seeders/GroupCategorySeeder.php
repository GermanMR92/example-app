<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Group;
use App\Models\GroupCategory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class GroupCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $groupCategories = [
            ['group_id' => Group::where('name', 'Tecnología')->first()->id, 'category_id' => Category::where('name', 'Móviles')->first()->id],
            ['group_id' => Group::where('name', 'Tecnología')->first()->id, 'category_id' => Category::where('name', 'Laptops')->first()->id],
            ['group_id' => Group::where('name', 'Tecnología')->first()->id, 'category_id' => Category::where('name', 'Tablets')->first()->id],
            ['group_id' => Group::where('name', 'Tecnología')->first()->id, 'category_id' => Category::where('name', 'Auriculares')->first()->id],
            ['group_id' => Group::where('name', 'Tecnología')->first()->id, 'category_id' => Category::where('name', 'Electrodomésticos')->first()->id],
            ['group_id' => Group::where('name', 'Tecnología')->first()->id, 'category_id' => Category::where('name', 'Wearables')->first()->id],
            ['group_id' => Group::where('name', 'Tecnología')->first()->id, 'category_id' => Category::where('name', 'Altavoces')->first()->id],
            ['group_id' => Group::where('name', 'Tecnología')->first()->id, 'category_id' => Category::where('name', 'Televisores')->first()->id],
            ['group_id' => Group::where('name', 'Tecnología')->first()->id, 'category_id' => Category::where('name', 'Drones')->first()->id],
            ['group_id' => Group::where('name', 'Tecnología')->first()->id, 'category_id' => Category::where('name', 'Cámaras')->first()->id],
            ['group_id' => Group::where('name', 'Tecnología')->first()->id, 'category_id' => Category::where('name', 'Consolas')->first()->id],
            ['group_id' => Group::where('name', 'Moda')->first()->id, 'category_id' => Category::where('name', 'Ropa')->first()->id],
            ['group_id' => Group::where('name', 'Moda')->first()->id, 'category_id' => Category::where('name', 'Calzado')->first()->id],
            ['group_id' => Group::where('name', 'Moda')->first()->id, 'category_id' => Category::where('name', 'Accesorios')->first()->id],
        ];

        GroupCategory::insert($groupCategories);
    }
}
