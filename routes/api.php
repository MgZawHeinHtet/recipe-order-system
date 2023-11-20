<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\BasketController;
use App\Http\Controllers\ProductController;
use App\Models\Basket;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Mockery\Expectation;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });


Route::get('/users',function(){
    try{
        if(request('is_admin')===true){
            return [
                'users' => User::all(),
                'status' => 200
            ] ;
        }else{
            return [
                'msg'=> 'unauthorized access',
                'status'=> 403
            ];
        }
    }catch(ErrorException $e){
        return [
            'err'=>$e->getMessage(),
            'status'=>500
        ];
    }
   
});