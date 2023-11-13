<?php

namespace App\Http\Controllers;

use App\Http\Requests\CheckoutFormRequest;
use App\Models\Customer;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    public function create(CheckoutFormRequest $request){
        $cleanData = $request->validated();

        $curr_user = auth()->user();

        $cleanData['user_id'] = $curr_user->id;

        //create customer
         Customer::create( $cleanData);

         return back()->with('success','Register Customer');
    }

    public function update(Customer $customer,CheckoutFormRequest $request){
        $cleanData = $request->validated();

        $customer->update($cleanData);
        
        return back();
    }
}
