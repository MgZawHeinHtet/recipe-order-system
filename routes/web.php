<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\RatingController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\UserController;
use App\Models\Product;
use App\Models\Profile;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

//starter route
Route::get('/', [HomeController::class, 'index']);

//service page


//Auth route
Route::get('/login',[AuthController::class, 'show']);

Route::post('/login',[AuthController::class, 'login']);

Route::post('/logout',[AuthController::class, 'logout']);

Route::post('/signup',[AuthController::class, 'signup']);

Route::get('/signup',[AuthController::class, 'register']);


//admin dashboard product Route
Route::middleware(['auth','admin'])->prefix('dashboard')->group(function(){
    Route::get('',[DashboardController::class,'index']);
    Route::resource('products',ProductController::class);
    Route::resource('categories',CategoryController::class);
    Route::resource('orders',OrderController::class);
    Route::get('users',[UserController::class,'dashboard_index']);
});

//profile dashboard product Route
Route::middleware(['auth'])->prefix('profile')->group(function(){
   Route::resource('user',ProfileController::class);
});

//product signle page for user
Route::get('/products/{product:id}',[ProductController::class, 'show']);

//rating route
Route::middleware(['rating'])->group(function(){
    Route::post('/products/{product:id}/rating',[RatingController::class,'rating']);
});

//add to cart
Route::middleware('addToCart')->group(function(){
    Route::post('/products/{product:id}/addToCart',[CartController::class, 'addToCart']);
    Route::get('/home/cart',[CartController::class,'index']);
    Route::delete('/carts/{cart:id}',[CartController::class, 'destory']);
});

//checkout
Route::middleware('auth')->group(function(){

    Route::get('/checkout',[CheckoutController::class,'index']);

    //order 
    Route::post('/checkout',[CheckoutController::class, 'store']);

    //create customer 
    Route::post('/customer',[CustomerController::class,'create']);

    //update customer
    Route::patch('/customer/{customer:id}',[CustomerController::class, 'update']);

});