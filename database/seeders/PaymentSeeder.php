<?php

namespace Database\Seeders;

use App\Models\Payment;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PaymentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    { 
        $payment_methods = [
        ['payment_type'=>'cash on delivery'],
        ['payment_type'=>'other payment & visa']
       ];

       foreach($payment_methods as $payment){
           Payment::create($payment);
       }

    }
}
