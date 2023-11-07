<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class RatingController extends Controller
{
    public function rating(Product $product)
    {

        //check user is already give rationg
        $user_exit = auth()->user()->isRating($product);
        
        //get old rating from pivot table (very messy need to refactor)
        $old_rating = $user_exit ? $product->oldRating?->all()[0]->pivot->rate : false;
        
        //new rating from input star
        $new_rating = request('rate');
        
        //if alredy give then check old and new rating is the same
        $is_same_rating = ($new_rating == $old_rating);
        
        //current user
        $curr_user = auth()->user()->id;

        if ($user_exit && $is_same_rating) {
            //same user, same rating so unplugged
            $product->ratedUsers()->detach($curr_user);
            $product->rating -= $old_rating;
        } else if ($user_exit) {
            //same user ,different rating ,so need to moderate rating
            $product->ratedUsers()->updateExistingPivot($curr_user, ['rate' => $new_rating]);
            $product->reduceAndAddRating($old_rating,$new_rating);
        } else { 
            //new user, so plug in and add rating
            $product->ratedUsers()->attach($curr_user);
            $product->ratedUsers()->updateExistingPivot($curr_user, ['rate' => $new_rating]);
            $product->addRating($new_rating);
        }
       
        $product->update();
        return back();
    }
}
