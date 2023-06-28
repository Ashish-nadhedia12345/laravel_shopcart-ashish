<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Category;
use App\Models\Page;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        \App\Models\User::factory()->create([
             'name' => 'Admin',
             'email' => 'admin@localhost.com',
             'role' => 'Admin'
        ]);
       // Category::factory(20)->create();

       \App\Models\User::factory(10)->create();
       //Page::factory(50)->create();
    }
}
