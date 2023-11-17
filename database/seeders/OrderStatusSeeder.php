<?php

namespace Database\Seeders;

use App\Models\OrderStatus;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class OrderStatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $status = [
            ['status'=>'in progress'],
            ['status'=>'placement'],
            ['status'=>'shipping'],
            ['status'=>'pending'],
            ['status'=>'complete'],
        ];
       foreach($status as $s){
            OrderStatus::create($s);
       }
       
    }
}
