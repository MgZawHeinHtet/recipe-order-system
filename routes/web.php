<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\RatingController;
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
    return view('index');
});


//Auth route
Route::get('/login',[AuthController::class, 'show']);

Route::post('/login',[AuthController::class, 'login']);

Route::get('/logout',[AuthController::class, 'logout']);


//admin dashboard Route
Route::middleware(['auth','admin'])->prefix('dashboard')->group(function(){
    Route::get('',[DashboardController::class,'index'])->middleware(['auth','admin']);
    Route::resource('products',ProductController::class);
});

//rating route
Route::middleware(['rating'])->group(function(){
    Route::post('/products/{product:id}/rating',[RatingController::class,'rating']);
});