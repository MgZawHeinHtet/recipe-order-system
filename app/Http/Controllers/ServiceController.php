<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ServiceController extends Controller
{
    public function index()
    {
        return view('Service.index',[
            'services'=> $this->getService()
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
                'content' => "payment.png"
            ],
            [
                'title' => "Qusestion & Answer",
                'img' => "../assets/home_page/service_icon/q&a.png",
                'content' => "You can ask everything about recipe"
            ]
        ];
        return $services;
    }
}
