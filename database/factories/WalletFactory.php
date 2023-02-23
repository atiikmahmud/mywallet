<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class WalletFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'title' => $this->faker->sentence(),
            'amount' => mt_rand(1000,5000),
            'status' => 0,
            // 'category_id' => mt_rand(1,4),
            'category_id' => mt_rand(5,13),
            'user_id' => 4,
            'created_at' => $this->faker->dateTimeBetween('-3 years', 'now', 'Asia/Dhaka'),
        ];
    }
}
