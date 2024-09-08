<?php

namespace Database\Factories;
use App\Models\Apartment;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Apartment>
 */
class ApartmentFactory extends Factory
{
    protected $model = Apartment::class;

    public function definition()
    {
        return [
            'image' => $this->faker->imageUrl(), // Random image URL
            'mansion_name' => $this->faker->word() . ' Mansion',
            'mansion_address' => $this->faker->address(),
            'room_number' => $this->faker->numerify('Room ###'),
            'contact' => $this->faker->phoneNumber(),
            'prefecture' => $this->faker->word(),
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }
}
