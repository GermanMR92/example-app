<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categories = [
            ['name' => 'Móviles', 'description' => 'Lorem Ipsum es simplemente el texto de relleno de las imprentas y archivos de texto.'],
            ['name' => 'Laptops', 'description' => 'Lorem Ipsum es simplemente el texto de relleno de las imprentas y archivos de texto.'],
            ['name' => 'Tablets', 'description' => 'Lorem Ipsum es simplemente el texto de relleno de las imprentas y archivos de texto.'],
            ['name' => 'Auriculares', 'description' => 'Lorem Ipsum es simplemente el texto de relleno de las imprentas y archivos de texto.'],
            ['name' => 'Accesorios', 'description' => 'Lorem Ipsum es simplemente el texto de relleno de las imprentas y archivos de texto.'],
            ['name' => 'Ropa', 'description' => 'Lorem Ipsum es simplemente el texto de relleno de las imprentas y archivos de texto.'],
            ['name' => 'Calzado', 'description' => 'Lorem Ipsum es simplemente el texto de relleno de las imprentas y archivos de texto.'],
            ['name' => 'Electrodomésticos', 'description' => 'Lorem Ipsum es simplemente el texto de relleno de las imprentas y archivos de texto.'],
            ['name' => 'Wearables', 'description' => 'Lorem Ipsum es simplemente el texto de relleno de las imprentas y archivos de texto.'],
            ['name' => 'Altavoces', 'description' => 'Lorem Ipsum es simplemente el texto de relleno de las imprentas y archivos de texto.'],
            ['name' => 'Televisores', 'description' => 'Lorem Ipsum es simplemente el texto de relleno de las imprentas y archivos de texto.'],
            ['name' => 'Drones', 'description' => 'Lorem Ipsum es simplemente el texto de relleno de las imprentas y archivos de texto.'],
            ['name' => 'Cámaras', 'description' => 'Lorem Ipsum es simplemente el texto de relleno de las imprentas y archivos de texto.'],
            ['name' => 'Consolas', 'description' => 'Lorem Ipsum es simplemente el texto de relleno de las imprentas y archivos de texto.'],

        ];

        Category::insert($categories);
    }
}
