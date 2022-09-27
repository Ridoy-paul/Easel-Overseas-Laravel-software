<?php

namespace App\Http\Controllers;

use App\Models\Country;
use Illuminate\Http\Request;
use App\Models\User;
use Carbon\Carbon;

class CountryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(User::checkPermission('country.view') == true) {
            $countries = Country::orderBy('name', 'ASC')->get();
            return view('pages.country.index', compact('countries'));
        }
        else {
            return Redirect()->back()->with('error', 'Sorry you have not permission!');
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if(User::checkPermission('country.create') == true) {
            $validated = $request->validate([
                'name' => 'required|unique:countries',
            ]);

            $country = new Country;
            $country->name = $request->name;
            $country->created_at = Carbon::now();
            $country->save();
            return Redirect()->back()->with('success', $request->name.' Added Successfully.');
        }
        else {
            return Redirect()->back()->with('error', 'Sorry you have not permission!');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Country  $country
     * @return \Illuminate\Http\Response
     */
    public function show(Country $country)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Country  $country
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if(User::checkPermission('country.edit') == true) {
            $country = Country::where('id', $id)->first();
            return view('pages.country.edit', compact('country'));
        }
        else {
            return Redirect()->back()->with('error', 'Sorry you have not permission!');
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Country  $country
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        if(User::checkPermission('country.edit') == true) {
            $country = Country::where('id', $id)->first();
            $validated = $request->validate([
                'name' => 'required|unique:countries,name,'.$country->id,
            ]);

            $country->name = $request->name;
            $country->is_active =$request->is_active;
            $country->update();
            return Redirect()->route('countries')->with('success', 'Country info Updated Successfully.');
        }
        else {
            return Redirect()->back()->with('error', 'Sorry you have not permission!');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Country  $country
     * @return \Illuminate\Http\Response
     */
    public function destroy(Country $country)
    {
        //
    }
}
