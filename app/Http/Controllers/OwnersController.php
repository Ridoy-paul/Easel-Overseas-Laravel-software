<?php

namespace App\Http\Controllers;

use App\Models\Owners;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Carbon;

class OwnersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index()
    {
        if(User::checkPermission('owners.view') == true){
            $capital_persons = Owners::all();
            return view('pages.owners.index', compact('capital_persons'));
        }
        else {
            return Redirect()->back()->with('error', 'Sorry you can not access this page');
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
        if(User::checkPermission('owners.create') == true){
            $phone = $request->phone;
            $nid_number = $request->nid_number;

            $capital_person = DB::table('owners')
                    ->where(function ($query) use ($phone, $nid_number) {
                        $query->where('phone', '=', $phone)
                                ->orWhere('nid_number', '=', $nid_number);
                    })->first(['id', 'name']);
            
            if(empty($capital_person->id)) {
                $data = array();
                $data['name']=$request->name;
                $data['phone']=$request->phone;
                $data['nid_number']=$request->nid_number;
                $data['address']=$request->address;
                $data['opening_capital']=0;
                $data['business_portion'] = $request->business_portion;
                $data['created_at']= Carbon::now();
                $insert = DB::table('owners')->insert($data);
                if($insert) {
                    return Redirect()->back()->with('success', 'New Business Owners.');
                }
                else {
                    return Redirect()->back()->with('error', 'Sorry you can not access this page');
                }
            }
            else {
                return Redirect()->back()->with('error', 'Sorry This person is exist. name: '.$capital_person->name.'');
            }
        }
        else {
            return Redirect()->back()->with('error', 'Sorry you can not access this page');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Owners  $owners
     * @return \Illuminate\Http\Response
     */
    public function show(Owners $owners)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Owners  $owners
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if(User::checkPermission('owners.edit') == true){
            $owner_person = Owners::where(['id'=>$id])->first();
            if(!empty($owner_person->id)) {
                return view('pages.owners.edit', compact('owner_person'));
            }
            else {
                return Redirect()->back()->with('error', 'Error occoured! please try agai.');
            }
        }
        else {
            return Redirect()->back()->with('error', 'Sorry you can not access this page');
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Owners  $owners
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        if(User::checkPermission('owners.edit') == true){
            $phone = $request->phone;
            $nid_number = $request->nid_number;

            $capital_person = DB::table('owners')
                    ->where('id', '!=', $id)
                    ->where(function ($query) use ($phone, $nid_number) {
                        $query->where('phone', '=', $phone)
                                ->orWhere('nid_number', '=', $nid_number);
                    })
                    ->first();

            if(!$capital_person) {
                $data = array();
                $data['name'] = $request->name;
                $data['phone'] = $phone;
                $data['nid_number'] = $nid_number;
                $data['business_portion'] = $request->business_portion;
                $data['address'] = $request->address;
                $data['updated_at'] = Carbon::now();
                $update = Owners::where('id', $id)->update($data);
                if($update) {
                    return redirect()->route('owners.view')->with('success', 'Updated Business Owners.');
                }
                else {
                    return Redirect()->back()->with('error', 'Something is wrong, please try again.');
                }
            
            }
            else {
                return Redirect()->back()->with('error', 'Email or Phone is Exist, please try new.');
            }

        }
        else {
            return Redirect()->back()->with('error', 'Sorry you can not access this page');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Owners  $owners
     * @return \Illuminate\Http\Response
     */
    public function destroy(Owners $owners)
    {
        //
    }

}
