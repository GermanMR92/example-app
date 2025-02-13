<?php

namespace Database\Seeders;

use App\Models\Partner;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PartnerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $partners = [
            ['name' => 'Apple', 'email' => 'apple@hola.es'],
            ['name' => 'Samsung', 'email' => 'samsung@hola.es'],
            ['name' => 'Nike', 'email' => 'nike@hola.es'],
        ];

        Partner::insert($partners);
    }
}
