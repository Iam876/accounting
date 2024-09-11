<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\Payment;
class PaymentSeeder extends Seeder
{
    public function run()
    {
        // Generate 10 random payment records
        Payment::factory()->count(10)->create();
    }
}
