<?php

namespace Database\Factories;

use App\Models\Student;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Student>
 */
class StudentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */

    protected $model = Student::class;
    public function definition(): array
    {
        return [
            'full_name_ar'=>fake()->unique()->name(),
            'full_name_en'=>fake()->unique()->name(),
            'address'=>fake()->address(),
            'phone_number'=>fake()->phoneNumber(),
            'gender'=>fake()->randomElement(['male','female']),
            'birth_place'=>fake()->city(),
            'birth_day'=>fake()->date(),
            'parent_name'=>fake()->name(),
            'relative'=>fake()->randomElement(['Father','Brother','Uncle']),
            'parent_phone'=>fake()->phoneNumber(),
        ];
    }
}
