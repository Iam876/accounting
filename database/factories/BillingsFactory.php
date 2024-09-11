<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Billings;
use App\Models\Student;
use App\Models\Apartment;
use App\Models\PackageChoose;
use App\Models\BillingMethod;
use Carbon\Carbon;
class BillingsFactory extends Factory
{
    protected $model = Billings::class;

    public function definition()
    {
        return [
            'student_id' => Student::inRandomOrder()->first()->id, // Random student
            'apartment_id' => Apartment::inRandomOrder()->first()->id, // Random apartment
            'billing_start_month' => $this->faker->dateTimeBetween('2024-01-01', '2024-12-31'),
            'package_id' => PackageChoose::inRandomOrder()->first()->id, // Random package
            'rent' => $this->faker->numberBetween(25000, 50000), // Rent between 25000 and 50000
            'utility_fees' => $this->faker->numberBetween(5000, 15000), // Utility fees between 5000 and 15000
            'initial_costs' => $this->faker->optional()->numberBetween(0, 45000),
            'initial_costs_collection_date' => $this->faker->optional()->dateTimeBetween('2024-01-01', '2024-12-31'),
            'rent_collection_date' => $this->faker->dateTimeBetween('2024-01-01', '2024-12-31'),
            'utilities_collection_date' => $this->faker->dateTimeBetween('2024-01-01', '2024-12-31'),
            'payment_method_id' => BillingMethod::inRandomOrder()->first()->id,
            'payment_id' => $this->faker->uuid,
            'completed_billing' => $this->faker->boolean,
            
            // Adding house enroll date and termination date
            'house_enroll_date' => $this->faker->dateTimeBetween('2024-01-01', '2024-06-01'), // Random enroll date in 2024
            'termination_date' => $this->faker->dateTimeBetween('2025-05-01', '2025-05-31'), // Termination date in May 2025
        ];
    }
}
