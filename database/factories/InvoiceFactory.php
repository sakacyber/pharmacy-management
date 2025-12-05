<?php

namespace Database\Factories;

use App\Models\Invoice;
use Illuminate\Database\Eloquent\Factories\Factory;

class InvoiceFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Invoice::class;

    /**
     * Define the model's default state.
     */
    public function definition(): array
    {
        return [
            'invoice_no' => $this->faker->word,
            'date' => $this->faker->dateTime(),
            'tax' => $this->faker->numberBetween(-10000, 10000),
            'discount' => $this->faker->numberBetween(-10000, 10000),
            'total' => $this->faker->numberBetween(-10000, 10000),
            'description' => $this->faker->text,
            'note' => $this->faker->word,
            'header' => $this->faker->word,
            'footer' => $this->faker->word,
            'content' => $this->faker->paragraphs(1, true),
        ];
    }
}
