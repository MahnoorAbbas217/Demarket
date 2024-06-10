<?php

namespace Database\Factories;

use App\Models\Item;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\RecentlyViewed>
 */
class RecentlyViewedFactory extends Factory
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
        ];
    }
}
