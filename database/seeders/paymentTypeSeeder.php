<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\paymentType;
class paymentTypeSeeder extends Seeder
{
    public function run()
    {
        $paymentTypes = [
            ['type_name' => 'rent'],
            ['type_name' => 'utilities'],
            ['type_name' => 'advance'],
            ['type_name' => 'other'],
        ];

        foreach ($paymentTypes as $type) {
            PaymentType::create($type);
        }
    }
}
