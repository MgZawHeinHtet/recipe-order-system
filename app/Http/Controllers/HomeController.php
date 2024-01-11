<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Review;
use App\Models\SpecialProduct;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(){
        return view('index',[
            'products' => Product::orderBy('rating','asc')->take(10)->get(),
            'services' => $this->getService(),
            'reviews' => Review::with('user')->latest()->get(),
            'special_products' => SpecialProduct::all()
        ]);
    }
      //get data for service section hard data
      public function getService()  
      {
          $services = [
              [
                  'title' => "Cooking methods",
                  'img' => "../assets/home_page/service_icon/cook-books.png",
                  'content' => "You can learn many cooking idea"
              ],
              [
                  'title' => "Saving time",
                  'img' => "../assets/home_page/service_icon/clock.png",
                  'content' => "Buy via our webiste.It will save your time"
              ],
              [
                  'title' => "Ingredient",
                  'img' => "../assets/home_page/service_icon/ingredient.png",
                  'content' => "Ingredient is needed in your recipe"
              ],
              [
                  'title' => "Delivery system",
                  'img' => "../assets/home_page/service_icon/delivery.png",
                  'content' => "Just order from your home"
              ],
              [
                  'title' => "Online payment",
                  'img' => "../assets/home_page/service_icon/cook-books.png",
                  'content' => "payment is really nice"
              ],
              [
                  'title' => "Qusestion & Answer",
                  'img' => "../assets/home_page/service_icon/q&a.png",
                  'content' => "You can ask everything about recipe"
              ]
          ];
          return $services;
      }

      public function contactIndex(){
        return view('contact');
      }
}
