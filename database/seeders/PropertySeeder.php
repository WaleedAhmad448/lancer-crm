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
                'name' => 'Piramal Vaikunth',
                'details' => 'Balkum | 32 acres | 12 towers',
            ],
        ]);

    }
}
