<?php

namespace Database\Factories;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Slider>
 */
class SliderFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $sliders = [
            'uploads/slider/slider-image-1.jpg',
            'uploads/slider/slider-image-2.jpg',
            'uploads/slider/slider-image-3.jpg',
            'uploads/slider/slider-image-4.jpg',
        ];

        return [
            'duration' => Carbon::now()->addMonth(),
            'image' => $this->faker->randomElement($sliders),
        ];
    }
}
