<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Schools;

class SchoolSeeder extends Seeder
{
    public function run()
    {
        // Generate 50 random school records
        Schools::factory()->count(50)->create();
    }
}
