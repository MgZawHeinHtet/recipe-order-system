<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\BasketController;
use App\Http\Controllers\ProductController;
use App\Models\Basket;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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


Route::post('/login',[AuthController::class,'login']);

Route::post('/signup',[AuthController::class, 'register']);

Route::apiResource('products',ProductController::class);

Route::post('/cart',[BasketController::class,'store']);

Route::get('/user',[AuthController::class, 'getUser']);