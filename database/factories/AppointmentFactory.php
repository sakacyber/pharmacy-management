<?php

namespace Database\Factories;

use App\Models\Appointment;
use Illuminate\Database\Eloquent\Factories\Factory;

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
            'is_active' => $this->faker->boolean,
        ];
    }
}
