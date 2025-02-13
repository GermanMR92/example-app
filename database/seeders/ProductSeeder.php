<?php

namespace Database\Seeders;

use App\Models\Product;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $products = [
            ['name' => 'iPhone 15', 'description' => 'Último modelo de Apple', 'price' => 1200.00, 'stock' => 50, 'image_url' => null, 'cta_url' => 'https://www.apple.com/es/'],
            ['name' => 'Samsung Galaxy S24', 'description' => 'Móvil de gama alta', 'price' => 1100.00, 'stock' => 40, 'image_url' => null, 'cta_url' => 'https://www.samsung.com/es'],
            ['name' => 'MacBook Pro M2', 'description' => 'Portátil de alto rendimiento', 'price' => 2200.00, 'stock' => 30, 'image_url' => null, 'cta_url' => 'https://www.apple.com/es/'],
            ['name' => 'iPad Air', 'description' => 'Tableta de Apple', 'price' => 800.00, 'stock' => 20, 'image_url' => null, 'cta_url' => 'https://www.apple.com/es/'],
            ['name' => 'Sony WH-1000XM5', 'description' => 'Auriculares con cancelación de ruido', 'price' => 400.00, 'stock' => 60, 'image_url' => null, 'cta_url' => 'https://www.sony.es/'],
            ['name' => 'Nike Air Max', 'description' => 'Zapatillas deportivas', 'price' => 150.00, 'stock' => 100, 'image_url' => null, 'cta_url' => 'https://www.nike.com/es'],
            ['name' => 'Xiaomi Mi Band 6', 'description' => 'Pulsera de actividad', 'price' => 50.00, 'stock' => 200, 'image_url' => null, 'cta_url' => 'https://www.mi.com/es'],
            ['name' => 'Canon EOS R5', 'description' => 'Cámara de fotos profesional', 'price' => 4000.00, 'stock' => 10, 'image_url' => null, 'cta_url' => 'https://www.canon.es/'],
            ['name' => 'PlayStation 5', 'description' => 'Consola de videojuegos', 'price' => 500.00, 'stock' => 30, 'image_url' => null, 'cta_url' => 'https://www.playstation.com/es-es/'],
            ['name' => 'Xbox Series X', 'description' => 'Consola de videojuegos', 'price' => 500.00, 'stock' => 30, 'image_url' => null, 'cta_url' => 'https://www.xbox.com/es-es' ],
            ['name' => 'Nintendo Switch', 'description' => 'Consola de videojuegos', 'price' => 300.00, 'stock' => 50, 'image_url' => null, 'cta_url' => 'https://www.nintendo.es/' ],
            ['name' => 'GoPro Hero 10', 'description' => 'Cámara de acción', 'price' => 500.00, 'stock' => 20, 'image_url' => null, 'cta_url' => 'https://gopro.com/es/es/' ],
            ['name' => 'DJI Mavic Air 2', 'description' => 'Dron de DJI', 'price' => 800.00, 'stock' => 10, 'image_url' => null, 'cta_url' => 'https://www.dji.com/es' ],
            ['name' => 'Bose QuietComfort 45', 'description' => 'Auriculares con cancelación de ruido', 'price' => 350.00, 'stock' => 40, 'image_url' => null, 'cta_url' => 'https://www.bose.es/' ],
            ['name' => 'Garmin Fenix 7', 'description' => 'Reloj deportivo', 'price' => 700.00, 'stock' => 30, 'image_url' => null, 'cta_url' => 'https://buy.garmin.com/es-ES/ES/p/733252' ],
            ['name' => 'LG OLED C1', 'description' => 'Televisor OLED', 'price' => 2000.00, 'stock' => 10, 'image_url' => null, 'cta_url' => 'https://www.lg.com/es' ],
            ['name' => 'Bose SoundLink Revolve', 'description' => 'Altavoz Bluetooth', 'price' => 200.00, 'stock' => 50, 'image_url' => null, 'cta_url' => 'https://www.bose.es/' ],
            ['name' => 'Apple Watch Series 7', 'description' => 'Reloj inteligente de Apple', 'price' => 400.00, 'stock' => 30, 'image_url' => null, 'cta_url' => 'https://www.apple.com/es/' ]
        ];

        Product::insert($products);
    }
}
