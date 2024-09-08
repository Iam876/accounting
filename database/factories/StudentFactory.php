<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Student;
use App\Models\Schools;
class StudentFactory extends Factory
{
    protected $model = Student::class;

    public function definition()
    {
        return [
            'student_name' => $this->faker->name,
            'name_katakana' => $this->faker->word, // Example: Random Katakana name
            'nationality' => $this->faker->country,
            'school_id' => Schools::inRandomOrder()->first()->id, // Random school ID
            'contract_date' => $this->faker->date(),
            'termination_date' => $this->faker->date(),
            'remarks' => $this->faker->sentence,
            'student_image' => 'https://picsum.photos/200/300?random=' . rand(1, 1000), // Random image
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }
}
