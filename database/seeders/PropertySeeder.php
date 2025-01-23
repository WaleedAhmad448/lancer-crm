<?php

namespace Database\Seeders;

use App\Models\Property;
use Illuminate\Database\Seeder;

class PropertySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Property::insert([
            [
                'title' => 'Primary',
                'description' => 'This is a primary property',
                'price' => 1000000,
                'address' => '123 Main St',
                'city' => 'New York',
                'type' => 'NY',
                'address' => 'sanaa',
                'latitude' => '15302351',
                'longitude' => '4400525',
                'status' => 'in:sale,rent,sold',
                'date' => 12/12/2024,
                'images' => 'json',
                'user_id' => 1,
                'bedrooms' => 3,
                'bathrooms' => 2,
                'area' => 1500,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);

    }
}
