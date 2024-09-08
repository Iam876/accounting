<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
class BillingMethodSeeder extends Seeder
{
    public function run()
    {
        DB::table('billing_methods')->insert([
            ['method_name' => 'Bank'],
            ['method_name' => 'Cash'],
            ['method_name' => 'Convenience Store'],
            ['method_name' => 'Card'],
        ]);
    }
}
