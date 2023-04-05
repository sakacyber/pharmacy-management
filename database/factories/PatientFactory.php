<?php

namespace Database\Factories;

use App\Models\Patient;
use Illuminate\Database\Eloquent\Factories\Factory;

class PatientFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Patient::class;

    /**
     * Define the model's default state.
     */
    public function definition(): array
    {
        return [
            'name' => $this->faker->name,
            'gender' => $this->faker->word,
            'age' => $this->faker->word,
            'phone' => $this->faker->phoneNumber,
            'address' => $this->faker->word,
            'description' => $this->faker->text,
            'enter_date' => $this->faker->dateTime(),
            'exit_date' => $this->faker->dateTime(),
        ];
    }
}
