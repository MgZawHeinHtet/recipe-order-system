<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CartMiddleware
{   
    private $err = 'error';
    public function __construct()
    {
        $this->err = str_contains(url()->current(),'cart') ? 'You need to login to see your cart.' : 'Login first for add to cart';
    }
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if(!auth()->check()){
            // if(auth()->user()->is_admin){
            //     return redirect('/login')->withErrors(['errMsg'=>"Admin can't use this feature,create a new account"]);
            // }
            return redirect('/login')->withErrors(['errMsg'=>$this->err]);
        }
        return $next($request);
    }
}
