<?php

namespace Database\Factories;

use App\Models\Student;
use Illuminate\Database\Eloquent\Factories\Factory;

class StudentFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Student::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->name,
            'admission_number' => $this->faker->numberBetween(10000, 20000),
            'stream_id' => $this->faker->randomElement($array = [1, 2, 3, 4]), 
            'kcpe_marks' => $this->faker->numberBetween(350, 400), 
            'kcpe_grade' => $this->faker->randomElement($array = ['B+', 'A-', 'A']),
            'dob' => $this->faker->date($format = 'Y-m-d', $min = '2000-01-01', $max = '2005-01-01'), 
            'join_date' => $this->faker->date($min = '2016-01-01', $max = '2019-01-01'), 
            'join_level_id' => $this->faker->randomElement($array = [1, 2, 3, 4])
        ];
    }
}
