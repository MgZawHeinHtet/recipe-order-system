<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Product;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::create([
            'name'=>'Zaw Hein Htet',
            'username'=>'zaw-hein-htet',
            'email'=>'zaw88@gmail.com',
            'password'=>'admin123',
            'is_admin'=>1
        ]);
        User::factory(2)->create();
        Product::factory(10)->create();

    }
}
