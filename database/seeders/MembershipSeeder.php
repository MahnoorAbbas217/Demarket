<?php

namespace Database\Seeders;

use App\Models\Membership;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class MembershipSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Membership::create([
            'title' => 'Basic',
            'allow_products_per_month' => '5',
            'sale_commission' => '2',
            'tax' => '1',
            'transection_charges' => '0',
            'other_charges' => '0',
            'images_allow' => '5',
            'allow_product_video' => 'no',
            'withdraw_duration' => '15',
            'publication_status' => 'active',
        ]);

        Membership::create([
            'title' => 'Standard',
            'allow_products_per_month' => '15',
            'sale_commission' => '2',
            'tax' => '0',
            'transection_charges' => '10',
            'other_charges' => '0',
            'images_allow' => '10',
            'allow_product_video' => 'yes',
            'withdraw_duration' => '10',
            'publication_status' => 'active',
        ]);

        Membership::create([
            'title' => 'Premium',
            'allow_products_per_month' => '100',
            'sale_commission' => '1.5',
            'tax' => '0',
            'transection_charges' => '5',
            'other_charges' => '0',
            'images_allow' => '20',
            'allow_product_video' => 'yes',
            'withdraw_duration' => '5',
            'publication_status' => 'active',
        ]);
    }
}
