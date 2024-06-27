<?php

namespace Database\Seeders;

use App\Models\Bid;
use App\Models\Cart;
use App\Models\Category;
use App\Models\Item;
use App\Models\ItemAddtionalInformation;
use App\Models\ItemImage;
use App\Models\RecentlyViewed;
use App\Models\SavedItem;
use App\Models\Slider;
use App\Models\SubCategory;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {

        // $this->call([
        //     CitySeeder::class,
        //     MembershipSeeder::class,
        //     UserSeeder::class,
        // ]);

        // User::factory(10)->create();
        // Category::factory(10)->create();
        // SubCategory::factory(40)->create();

        // Item::factory(100)->create();
        // ItemImage::factory(1000)->create();
        // ItemAddtionalInformation::factory(500)->create();

        // Cart::factory(40)->create();
        // RecentlyViewed::factory(40)->create();
        // SavedItem::factory(40)->create();
        // Bid::factory(40)->create();

        Slider::factory(4)->create();

    }
}
