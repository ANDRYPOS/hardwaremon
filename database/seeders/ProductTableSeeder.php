<?php

namespace Database\Seeders;

use App\Models\Products;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProductTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Products::create([
            'category_id' => 1,
            'name' => 'Product 1',
            'description' => 'Test Product 1',
            'qty' => 12,
            'price' => 129000,
            'value' => 129000 * 12,
            'status_id' => 1,
            'image' => 'test',
            'created_by' => 1,
            'verified_at' => now(),
            'verified_by' => 1,
        ]);
    }
}
