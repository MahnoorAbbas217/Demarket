<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $name = 'Z Customer';
        User::create([
            'store_slug' => Str::slug($name),
            'name' => $name,
            'email' => 'customer@gmail.com',
            'mobile_no' => '923081312527',
            'password' => Hash::make('123123123'),
            'profile_image' => 'uploads/user/user-default.png',
            'city_name' => 'Layyah',
            'shipping_address' => 'City Layyah',
            'personal_address' => 'Aslam Mor City Layyah',
        ]);
    }
}
