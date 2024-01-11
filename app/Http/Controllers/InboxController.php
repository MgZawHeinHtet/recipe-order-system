<?php

namespace App\Http\Controllers;

use App\Models\Notification;
use Illuminate\Http\Request;

class InboxController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $notifications = Notification::with(['user', 'recipent'])->where('user_id',1)->latest()->take(30)->get();
        $unread_notifications = $notifications->filter(function ($noti) {
            return $noti->is_read == false;
        });
        $read_notifications = $notifications->filter(function ($noti) {
            return $noti->is_read == true;
        });

        return view('Dashboard.inbox', [
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
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
