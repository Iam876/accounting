<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Billings;
use App\Models\BillingMethod;
use App\Models\Payment;
use App\Models\paymentType;

class PaymentFactory extends Factory
{
    protected $model = Payment::class;

    public function definition()
    {
        $amount = $this->faker->boolean(10) ? 0 : $this->faker->numberBetween(10000, 50000);

        return [
            'billing_id' => Billings::inRandomOrder()->first()->id,
            'amount' => $this->faker->numberBetween(10000, 50000),
            'payment_method_id' => BillingMethod::inRandomOrder()->first()->id,
            'payment_type_id' => paymentType::inRandomOrder()->first()->id, // Random payment type
            'payment_id' => $this->faker->optional()->uuid,
            'payment_date' => $this->faker->dateTimeBetween('-1 year', 'now'),
            'billing_month' => $this->faker->date(),
        ];
    }
}
