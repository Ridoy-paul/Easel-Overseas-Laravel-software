<?php

namespace App\Http\Controllers;

use App\Models\Visa;
use Illuminate\Http\Request;
use App\Models\User;
use Carbon\Carbon;
use App\Models\Country;
use App\Models\Work;

class VisaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(User::checkPermission('visa.view') == true) {
            $visas = Visa::orderBy('id', 'DESC')->get();
            $countries = Country::where('is_active', 1)->orderBy('name', 'ASC')->get();
            return view('pages.visa.index', compact('visas', 'countries'));
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
        if(User::checkPermission('visa.create') == true) {
            $validated = $request->validate([
                'visa_title' => 'required|unique:visas',
            ]);

            $individual_cost = $request->total_cost / $request->number_of_visa;

            $visa = new Visa;
            $visa->country_id = $request->country_id;
            $visa->visa_title = $request->visa_title;
            $visa->number_of_visa = $request->number_of_visa;
            $visa->rest_number_of_visa = $request->number_of_visa;
            $visa->total_cost = $request->total_cost;
            $visa->individual_cost = $individual_cost;
            $visa->company_name = $request->company_name;
            $visa->is_active = 1;
            $visa->note = $request->note;
            $visa->created_at = Carbon::now();
            $visa->save();
            return Redirect()->back()->with('success', 'New Visa Added Successfully.');
        }
        else {
            return Redirect()->back()->with('error', 'Sorry you have not permission!');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Visa  $visa
     * @return \Illuminate\Http\Response
     */
    public function show(Visa $visa)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Visa  $visa
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if(User::checkPermission('visa.edit') == true) {
            $visa = Visa::where('id', $id)->first();
            $work = Work::where('visa_id', optional($visa)->id)->get(['id', 'is_rejected', 'is_active']);
            $countries = Country::where('is_active', 1)->orderBy('name', 'ASC')->get();
            return view('pages.visa.edit', compact('visa', 'countries', 'work'));
        }
        else {
            return Redirect()->back()->with('error', 'Sorry you have not permission!');
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Visa  $visa
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        if(User::checkPermission('visa.edit') == true) {
            $visa = Visa::where('id', $id)->first();
            $validated = $request->validate([
                'visa_title' => 'required|unique:visas,visa_title,'.$visa->id,
            ]);

            $individual_cost = $request->total_cost / $request->number_of_visa;
            $visa->country_id = $request->country_id;
            $visa->visa_title = $request->visa_title;
            $visa->number_of_visa = $request->number_of_visa;
            $visa->rest_number_of_visa = $request->rest_number_of_visa;
            $visa->total_cost = $request->total_cost;
            $visa->individual_cost = $individual_cost;
            $visa->company_name = $request->company_name;
            $visa->is_active = $request->is_active;
            $visa->note = $request->note;
            $visa->update();
            return Redirect()->route('visa')->with('success', 'Visa info Updated Successfully.');
        }
        else {
            return Redirect()->back()->with('error', 'Sorry you have not permission!');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Visa  $visa
     * @return \Illuminate\Http\Response
     */
    public function destroy(Visa $visa)
    {
        //
    }
}
