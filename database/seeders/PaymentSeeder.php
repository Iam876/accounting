<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
class PaymentSeeder extends Seeder
{
    public function run()
    {
        DB::table('payments')->insert([
            [
                'billing_id' => 1,
                'amount' => 250.00,
                'payment_method_id' => 1, // Bank
                'payment_id' => 'BANK123',
                'payment_date' => now(),
            ],
            [
                'billing_id' => 1,
                'amount' => 300.00,
                'payment_method_id' => 2, // Cash
                'payment_id' => null,
                'payment_date' => now(),
            ]
        ]);
    }
}
