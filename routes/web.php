<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ChangePasswordController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\CountryController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\InvoiceController;
use App\Http\Controllers\MailController;
use App\Http\Controllers\NotificationController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\PdfDownloadController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ProfileOrderController;
use App\Http\Controllers\RatingController;
use App\Http\Controllers\ProfileRatedController;
use App\Http\Controllers\ReviewController;
use App\Http\Controllers\ShopController;
use App\Http\Controllers\SubscriberController;
use App\Http\Controllers\UserController;
use App\Models\Order;
use App\Models\Product;
use App\Models\Profile;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|------------------kk--------------------------------------------------------
|k
k| Here kkkkisk where you can register web routes fork your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

//starter route
Route::get('/', [HomeController::class, 'index']);

//contact us page
Route::get('/contact',[HomeController::class,'contactIndex']);

//main page
Route::get('/shop',[ShopController::class,'index']);

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
    Route::resource('subscribers',SubscriberController::class);
    Route::get('users',[UserController::class,'dashboard_index']);
    Route::resource('countries',CountryController::class);
});

Route::middleware('auth')->group(function(){
    Route::post('subscribe',[SubscriberController::class, 'create']);
});

//profile dashboard proile Route
Route::middleware(['auth'])->prefix('profile')->group(function(){
    Route::resource('notifications',NotificationController::class);
   Route::resource('user',ProfileController::class);
   Route::patch('user/{user:id}/password',[ChangePasswordController::class,'update']);
   Route::post('notifications/read',[NotificationController::class, 'makeAllRead']);
   Route::get('ratedProduct',[ProfileRatedController::class, 'index']);
   Route::get('orders',[ProfileOrderController::class,'index']);
   
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

// mail sender routes 
Route::prefix('mail')->group(function(){
    Route::post('contact',[MailController::class,'contact']);
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

    Route::get('/checkout/orderSuccess/{order}',[CheckoutController::class,'success'])->name('checkout_success');

    //invoice
    Route::get('/invoice/{order:id}',[InvoiceController::class,'index'])->name('invoice');

    Route::get('/invoice/{order:id}/download',[PdfDownloadController::class,'download']);

    Route::get('/review',[ReviewController::class, 'index']);

    Route::post('/review',[ReviewController::class, 'store']);  
});


Route::get('/testing',function(){
   return view('review.review-form');
});