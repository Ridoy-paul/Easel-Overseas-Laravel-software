<?php

namespace App\Http\Controllers;

use App\Models\BusinessSetting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Image;
use App\Models\User;

class BusinessSettingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(User::checkPermission('settings') == true) {
            $info = BusinessSetting::find(1);
            return view('pages.business_settings', compact('info'));
        }
        else {
            return Redirect()->back()->with('error', 'You can\'t access this page.');
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
        if(User::checkPermission('settings') == true) {
            $validated = $request->validate([
                'company_name' => 'required',
            ]);

            $info = BusinessSetting::find(1);

            if(!is_null($info)) {
                $setting = $info;
            }
            else {
                $setting = new BusinessSetting;
            }
            
            
            // logo
            if($request->logo) {
                $logo = $request->file('logo');
                $name_gen = hexdec(uniqid()).".".$logo->getClientOriginalExtension();
                Image::make($logo)->resize(260, 90)->save('images/settings/'.$name_gen);
                $final_logo = 'images/settings/'.$name_gen;
                if(is_file(public_path(optional($info)->logo))){
                    unlink($info->logo);
                }
                $setting->logo = $final_logo;
            }
           
            $setting->company_name = $request->company_name;
            $setting->phone = $request->phone;
            $setting->email = $request->email;
            $setting->website = $request->website;
            $setting->address = $request->address;
            $status = $setting->save();

            if($status) {
                return Redirect()->back()->with('success', 'Settings successfully');
            }
            else {
                return Redirect()->back()->with('error', 'Error occoured!');
            }
        }
        else {
            return Redirect()->back()->with('error', 'You can\'t access this page.');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\BusinessSetting  $businessSetting
     * @return \Illuminate\Http\Response
     */
    public function show(BusinessSetting $businessSetting)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\BusinessSetting  $businessSetting
     * @return \Illuminate\Http\Response
     */
    public function edit(BusinessSetting $businessSetting)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\BusinessSetting  $businessSetting
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, BusinessSetting $businessSetting)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\BusinessSetting  $businessSetting
     * @return \Illuminate\Http\Response
     */
    public function destroy(BusinessSetting $businessSetting)
    {
        //
    }
}
