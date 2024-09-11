<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
   public function run()
    {
        $this->call([
            RolesTableSeeder::class,
            UsersTableSeeder::class,
            SchoolSeeder::class,
            ApartmentSeeder::class,
            BillingMethodSeeder::class,
            PackageSeeder::class,
            StudentsSeeder::class,
            BillingSeeder::class,
            paymentTypeSeeder::class,
            PaymentSeeder::class,
        ]);
    }
}
