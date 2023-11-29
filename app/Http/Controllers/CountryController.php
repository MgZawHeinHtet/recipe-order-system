<?php

namespace App\Http\Controllers;

use App\Http\Requests\countryFormRequest;
use App\Http\Requests\CountryFormRequest as RequestsCountryFormRequest;
use App\Models\Country;
use Illuminate\Http\Request;

class CountryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('Dashboard.country',[
            'countries'=>Country::latest()->paginate(10)
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('Dashboard.country-create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(countryFormRequest $request)
    {
        $cleanData = $request->validated();
        Country::create($cleanData);
        return redirect('/dashboard/countries')->with('create','Country created succesfully!! 🎆');
    }

    /**
     * Display the specified resource.
     */
    public function show(Country $country)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Country $country)
    {
        return view('Dashboard.country-edit',[
            'country'=>$country
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(RequestsCountryFormRequest $request, Country $country)
    {
        $cleanData = $request->validated();
        $country->update($cleanData);
        return back()->with('update','Country updated successfully!! 🎉');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Country $country)
    {
        
        $country->delete();
        return back()->with('delete','Delete Succesfully! 💥');
    }
}
