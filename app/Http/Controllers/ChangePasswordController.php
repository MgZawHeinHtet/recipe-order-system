<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfilePasswordRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

use function PHPUnit\Framework\isTrue;

class ChangePasswordController extends Controller
{
    public function update(ProfilePasswordRequest $request,User $user){
        $cleanData = $request->validated();
        
        $isTrue = Hash::check($cleanData['current-password'],$user->password);
        
        if($isTrue){
            $user->password = Hash::make($cleanData['new-password']);
            $user->update();
        }else{
            return back()->withErrors(['current-password'=>'Wrong Password!'])->withInput();
        }

        return back()->with('create','Change Successfully 🎉');
    }
}
