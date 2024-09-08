<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PackageSeeder extends Seeder
{
    public function run()
    {
        DB::table('package_chooses')->insert([
            [
                'package_name' => 'Basic Package',
                'description' => 'Includes basic features.',
                'notes' => 'Suitable for individuals.',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'package_name' => 'Standard Package',
                'description' => 'Includes standard features.',
                'notes' => 'Recommended for small teams.',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'package_name' => 'Premium Package',
                'description' => 'Includes premium features.',
                'notes' => 'Suitable for larger organizations.',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'package_name' => 'Enterprise Package',
                'description' => 'Includes all features and support.',
                'notes' => 'Best for enterprise-level needs.',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
