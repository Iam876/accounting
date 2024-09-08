<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Apartment;

class ApartmentSeeder extends Seeder
{
    public function run()
    {
        // Create 50 properties with dummy data
        Apartment::factory()->count(50)->create();
    }
}
