<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CartMiddleware
{
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
            return redirect('/login')->withErrors(['errMsg'=>'pls,Login first for add to cart!']);
        }
        return $next($request);
    }
}
