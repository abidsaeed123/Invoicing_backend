<?php

namespace Database\Factories;

use App\Models\Invoice;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class InvoiceFactory extends Factory
{
    protected $model = Invoice::class;
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'number' => $this->faker->unique()->numberBetween(1000, 9999),
            'status' => $this->faker->randomElement(['pending', 'canceled', 'paid']),
            'billing_address' => $this->faker->address,
            'due_date' => $this->faker->date(),
            'shipping_address' => $this->faker->address,
            'user_id' => $this->faker->numberBetween(1, 5), // You can specify a user_id here if needed.
        ];
    }
}
