<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\Appointment;

class AppointmentFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Appointment::class;

    /**
     * Define the model's default state.
     */
    public function definition(): array
    {
        return [
            'date' => $this->faker->dateTime(),
            'doctor' => $this->faker->word,
            'patient' => $this->faker->word,
            'description' => $this->faker->text,
            'status' => $this->faker->word,
        ];
    }
}
