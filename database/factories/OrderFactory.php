<?php

namespace Database\Factories;

use App\Models\Order;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Order>
 */
class OrderFactory extends Factory
{
    protected $model = Order::class;

    public function definition()
    {
        return [
            'user_id' => \App\Models\User::factory(),
            'discount_id' => null,
            'shipping_id' => null,
            'payment_method_id' => null,
            'total' => $this->faker->randomFloat(2, 10, 500),
        ];
    }
}
