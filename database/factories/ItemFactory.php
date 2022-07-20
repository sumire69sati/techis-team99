<?php

namespace Database\Factories;

use App\Models\Item;

use Illuminate\Database\Eloquent\Factories\Factory;

class ItemFactory extends Factory
{


    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'user_id' => 1,
            'name' => $this->faker->word(),
            'type' => $this->faker->randomElement(['1','2','3']),
            'detail' => $this->faker->realTextBetween(5, 20),
        ];

        
    }
}
