<?php

namespace App\Http\Controllers;

use App\Models\subscriber;
use Illuminate\Http\Request;

class SubscriberController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('Dashboard.subscriber.index',[
            'subscribers' => Subscriber::latest()->paginate(10)
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $cleanData = request()->validate([
            'email' => ['required','email','unique:subscribers,email']
        ]);
        $cleanData['user_id'] = auth()->user()->id;
        
        subscriber::create($cleanData);
        return back();
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
    public function show(subscriber $subscriber)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(subscriber $subscriber)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, subscriber $subscriber)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(subscriber $subscriber)
    {
        $subscriber->delete();
        return back()->with('delete','Remove Subscriber Successfully💥');
    }
}
