<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Product;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Product::create([
            'product_name' => 'Brokoli',
            'product_description' => 'Poduct Description',
            'product_image' => 'images/products/brokoli.png'
        ]);

        Product::create([
            'product_name' => 'Kentang',
            'product_description' => 'Poduct Description',
            'product_image' => 'images/products/kentang.png'
        ]);

        Product::create([
            'product_name' => 'Jamur',
            'product_description' => 'Poduct Description',
            'product_image' => 'images/products/jamur.png'
        ]);

        Product::create([
            'product_name' => 'Kol',
            'product_description' => 'Poduct Description',
            'product_image' => 'images/products/kol.png'
        ]);

        Product::create([
            'product_name' => 'Paprika',
            'product_description' => 'Poduct Description',
            'product_image' => 'images/products/paprika.png'
        ]);

        Product::create([
            'product_name' => 'Wortel',
            'product_description' => 'Poduct Description',
            'product_image' => 'images/products/wortel.png'
        ]);
    }
}
