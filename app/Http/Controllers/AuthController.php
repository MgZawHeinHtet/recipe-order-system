<?php

namespace App\Http\Controllers;

use App\Http\Requests\AuthRequest;
use App\Http\Requests\RegisterRequest;
use App\Models\User;
use Illuminate\Auth\Events\Validated;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;

class AuthController extends Controller
{
    //login
    public function show(){
        return view('Auth.signin');
    }

    public function login(AuthRequest $request){
        if(Auth::attempt($request->validated())){
            return redirect('/')->with('success','login successfully');
        }else{
            return redirect('/login')->withErrors(['errMsg'=>"Wrong Credentials!"])->withInput();
        }
    }

    //register
    public function register(RegisterRequest $request){
            User::create($request->validated());
            return response()->json(['status'=>'success','msg'=>'created successfully']);
    }

   public function logout(){
        Auth::logout();
        session()->flush();
        return redirect('/');
   }
}
