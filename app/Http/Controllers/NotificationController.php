<?php

namespace App\Http\Controllers;

use App\Models\Notification;
use App\Models\User;
use Illuminate\Http\Request;

class NotificationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $notifications = auth()->user()->notifications()->with(['user','recipent'])->latest()->take(20)->get();
        $unread_notifications = $notifications->filter(function($noti){
            return $noti->is_read == false;
        });
        $read_notifications = $notifications->filter(function($noti){
            return $noti->is_read == true;
        });
       
        return view('profile.noti',[
            'unread_notifications' => $unread_notifications,
            'read_notifications' => $read_notifications,
        ]);
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
    public function show(Notification $notification)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Notification $notification)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update( Notification $notification)
    {
        $notification->is_read = true;
        $notification->update();
        return back();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Notification $notification)
    {   
        $notification->delete();
        
        return back();
    }

    public function makeAllRead(){
        //unread noti by user
        auth()->user()->notifications()->where('is_read',false)->update(['is_read'=>true]);
        return back();
    }
}
