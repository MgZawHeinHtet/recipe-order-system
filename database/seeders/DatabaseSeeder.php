<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Category;
use App\Models\Payment;
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
      
        $this->call([
            PaymentSeeder::class,
            OrderStatusSeeder::class
        ]);

        User::create([
            'name' => 'Zaw Hein Htet',
            'email' => 'zaw88@gmail.com',
            'password' => 'admin123',
            'is_admin' => 1,
            
        ]);

       User::factory(5)->create();
       
        Category::factory(10)->has(
            Product::factory()->count(3)
        )->create();
    }
}
