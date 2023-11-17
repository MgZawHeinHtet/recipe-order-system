<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileFormRequest;
use App\Models\Profile;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class ProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('profile.index',[
            'user' => auth()->user()
        ]
    );
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Profile $profile)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Profile $profile)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ProfileFormRequest $request, User $user)
    {
        $cleanData = $request->validated();

        if(request()->img){
            if($file = public_path($user->img)){
                File::delete($file);
            }
            $user->img = '/storage/'.request('img')->store('/profile');
        }

        if(request()->dob){
            $user->dob = request()->dob;
        }

        $user->name = $cleanData['name'];
        $user->email = $cleanData['email'];
        $user->username = $cleanData['username'];
        $user->gender = $cleanData['gender'];

        $user->update();
        return back();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Profile $profile)
    {
        //
    }
}
