<?php

namespace Database\Factories;

use App\Models\Item;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Bid>
 */
class BidFactory extends Factory
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

        $item_id = $this->faker->randomElement($items);
        $item_detail = Item::where('id', $item_id)->first();

        return [
            'created_by' => $this->faker->randomElement($users),
            'item_id' => $item_id,
            'item_detail' => $item_detail,
            'orignal_price' => $item_detail->buy_it_now_price,
            'bid_price' => $this->faker->numberBetween(10,20),
            'bid_status' => $this->faker->randomElement(['pending', 'accepted', 'rejected', 'appected_and_paid']),
        ];
    }
}
