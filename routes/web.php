<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\RatingController;
use App\Http\Controllers\ServiceController;
use App\Models\Product;
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
Route::get('/', function () {
    return view('index',[
        'products' => Product::latest()->paginate(8)
    ]);
});

//service page
Route::get('/service',[ServiceController::class, 'index']);

//Auth route
Route::get('/login',[AuthController::class, 'show']);

Route::post('/login',[AuthController::class, 'login']);

Route::post('/logout',[AuthController::class, 'logout']);


//admin dashboard product Route
Route::middleware(['auth','admin'])->prefix('dashboard')->group(function(){
    Route::get('',[DashboardController::class,'index'])->middleware(['auth','admin']);
    Route::resource('products',ProductController::class);
});

//product signle page for user
Route::get('/products/{product:id}',[ProductController::class, 'show']);

//rating route
Route::middleware(['rating'])->group(function(){
    Route::post('/products/{product:id}/rating',[RatingController::class,'rating']);
});

// Route::resource('carts',CartController::class);

//add to cart
Route::middleware('addToCart')->group(function(){
    Route::post('/products/{product:id}/addToCart',[CartController::class, 'addToCart']);
});