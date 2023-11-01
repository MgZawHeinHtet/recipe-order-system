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
    public function login(AuthRequest $authRequest){
      
        if(Auth::attempt($authRequest->validated())){
            return response()->json(['status'=>"true",'msg'=>'success']);
        }else{
            return response()->json($authRequest->all());
        }
      
    }

    //register
    public function register(RegisterRequest $request){
            if(!$request->validated()){
                return response()->json(['status'=>false,'err'=>$request->messages()]);
            }
       
            User::create($request->validated());
            return response()->json(['status'=>'success','msg'=>'created successfully']);
    }
}
