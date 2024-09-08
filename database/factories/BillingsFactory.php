<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Billings;
use App\Models\Student;
use App\Models\Apartment;
use App\Models\PackageChoose;
use App\Models\BillingMethod;
class BillingsFactory extends Factory
{
    protected $model = Billings::class;

    public function definition()
    {
        return [
            'student_id' => Student::inRandomOrder()->first()->id, // Random student
            'apartment_id' => Apartment::inRandomOrder()->first()->id, // Random apartment
            'billing_start_month' => $this->faker->date(),
            'package_id' => PackageChoose::inRandomOrder()->first()->id, // Random package
            'rent' => $this->faker->numberBetween(100, 1000),
            'utility_fees' => $this->faker->optional()->numberBetween(0, 100),
            'initial_costs' => $this->faker->optional()->numberBetween(0, 200),
            'initial_costs_collection_date' => $this->faker->optional()->date(),
            'rent_collection_date' => $this->faker->date(),
            'utilities_collection_date' => $this->faker->date(),
            'payment_method_id' => BillingMethod::inRandomOrder()->first()->id, // Random billing method
            'payment_id' => $this->faker->uuid,
            'completed_billing' => $this->faker->boolean,
        ];
    }
}
