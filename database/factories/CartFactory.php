<?php

namespace Database\Factories;

use App\Models\Item;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Cart>
 */
class CartFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $users = User::pluck('id')->toArray();
        $items = Item::pluck('id')->toArray();

        return [
            'created_by' => $this->faker->randomElement($users),
            'item_id' => $this->faker->randomElement($items),
            'quantity' => $this->faker->numberBetween(1,5),
        ];
    }
}
