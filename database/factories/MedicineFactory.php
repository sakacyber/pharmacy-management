<?php

namespace Database\Factories;

use App\Models\Medicine;
use Illuminate\Database\Eloquent\Factories\Factory;

class MedicineFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Medicine::class;

    /**
     * Define the model's default state.
     */
    public function definition(): array
    {
        return [
            'name' => $this->faker->name,
            'expired_date' => $this->faker->date(),
            'description' => $this->faker->text,
            'price_buy' => $this->faker->randomFloat(0, 0, 9999999999.),
            'price_sell' => $this->faker->randomFloat(0, 0, 9999999999.),
        ];
    }
}
