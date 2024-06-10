<?php

namespace Database\Factories;

use App\Models\Category;
use App\Models\SubCategory;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Item>
 */
class ItemFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $users = User::pluck('id')->toArray();
        $categories = Category::pluck('id')->toArray();
        $sub_categories = SubCategory::pluck('id')->toArray();

        $condition = $this->faker->randomElement(['new', 'used']);

        $condication_description = '';
        if($condition == 'used'){
            $condication_description = $this->faker->paragraph();
        }

        $sale_type = $this->faker->randomElement(['auction', 'buy_it_now']);

        $auction_duration = '1day';
        $quantity = rand(2,20);
        $start_bidding_price = '';
        $buy_it_now_price = rand(22,30);
        if($sale_type == 'auction'){
            $auction_duration = $this->faker->randomElement(['1day', '3days', '7days', '10days', '15days', '20days']);

            $quantity = 1;
            $start_bidding_price = rand(10,20);
        }

        return [
            'created_by' => $this->faker->randomElement($users),
            'category_id' => $this->faker->randomElement($categories),
            'sub_category_id' => $this->faker->randomElement($sub_categories),
            'item_title' => $this->faker->word(),
            'condition' => $condition,
            'condition_description' => $condication_description,
            'sale_type' => $sale_type,
            'auction_duration' => $auction_duration,
            'quantity' => $quantity,
            'start_bidding_price' => $start_bidding_price,
            'buy_it_now_price' => $buy_it_now_price,
            'shipping_price' => $this->faker->numberBetween(5,10),
            'shipping_duration' => $this->faker->numberBetween(2,7).'days',
            'short_description' => $this->faker->paragraph(),
        ];
    }
}
