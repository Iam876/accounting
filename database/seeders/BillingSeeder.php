<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Billings;
class BillingSeeder extends Seeder
{
    public function run()
    {
        Billings::factory()->count(10)->create(); // Generates 10 billing records
    }
}
