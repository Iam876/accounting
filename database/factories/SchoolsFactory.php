<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Schools;
class SchoolsFactory extends Factory
{
    protected $model = Schools::class;

    public function definition()
    {
        return [
            'school_name' => $this->faker->unique()->company . ' School',  // Random school name
            'image' => 'https://picsum.photos/200/300?random=' . rand(1, 1000), // Random image
            'contact' => $this->faker->phoneNumber,  // Random contact number
            'address' => $this->faker->address,  // Random address
            'prefecture' => $this->faker->state,  // Random state as prefecture
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }
}
