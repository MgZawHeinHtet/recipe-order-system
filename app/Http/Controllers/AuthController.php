<?php

namespace App\Http\Controllers;

use App\Http\Requests\AuthRequest;
use App\Http\Requests\RegisterRequest;
use App\Models\User;
use Illuminate\Auth\Events\Validated;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;
use PharIo\Manifest\Email;

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
    public function register(){
        return view('Auth.signup');
    }

    public function signup(RegisterRequest $request){
        $cleanData = $request->validated();
        $isSame = $cleanData['password'] === $cleanData['confirm-password'];
        
        if(!$isSame){
            return back()->withErrors(['confirm-password'=>'Must be same with password'])->withInput();
        }

        $cleanData['confirm-password'] = '';

        User::create($cleanData);

        
        return redirect('/login');
    }

   public function logout(){
        Auth::logout();
        session()->flush();
        return redirect('/');
   }
}
