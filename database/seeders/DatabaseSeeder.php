<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Category;
use App\Models\Coupon;
use App\Models\Page;
use App\Models\Product;
use App\Models\ShippingRate;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        /*\App\Models\User::factory()->create([
             'name' => 'Admin',
             'email' => 'admin@localhost.com',
             'role' => 'Admin'
        ]);*/
       // Category::factory(20)->create();

       //\App\Models\User::factory(10)->create();
       //Category::factory(10)->create();
       //Product::factory(50)->create();
       /*Coupon::create([
        'title' => 'Sale 50% OFF',
        'code' => '50OFF',
        'amount' => '50',
        'type' => 'percent',
        'valid_upto' => '2023-12-31'
       ]);

       Coupon::create([
        'title' => 'Sale FLAT 100',
        'code' => '100OFF',
        'amount' => '100',
        'type' => 'fixed',
        'valid_upto' => '2023-12-31'
       ]);*/
       ShippingRate::create([
        '100g' => 10.50,
        '300g' => 20.50,
        '600g' => 30.50,
        '900g' => 40.50,
        'above_1000g' => 100
       ]);
    }
}
