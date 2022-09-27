<?php

namespace App\Http\Controllers;

use App\Models\Passport;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
use Image;
use DataTables;


class PassportController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(User::checkPermission('passport.view') == true) {
            return view('pages.passport.all_passport');
        }
        else {
            return Redirect()->back()->with('error', 'Sorry you have not permission!');
        }
    }

    public function index_data(Request $request)
    {
        if ($request->ajax()) {
            $data = Passport::orderBy('id', 'desc')->get();
            return Datatables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function($row){
                    $file = '';
                    if(!is_null($row->passport_scan_copy)) {
                        $file = '<a type="button" target="_blank" href="'.asset($row->file).'" class="badge badge-info">file</a>';
                    }
                    return '<a type="button" href="'.route('passport.edit', $row->id).'" class="btn btn-primary btn-sm">Edit</a> '.$file;
                })
                ->rawColumns(['action'])
                ->make(true);
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if(User::checkPermission('passport.create') == true) {
            return view('pages.passport.create');
        }
        else {
            return Redirect()->back()->with('error', 'Sorry you have not permission!');
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if(User::checkPermission('passport.create') == true) {
            $validated = $request->validate([
                'passport_number' => 'required|unique:passports',
            ]);
    
            $passport = new Passport;
            $passport->name = $request->name;
            $passport->phone = $request->phone;
            $passport->address = $request->address;
            $passport->passport_number = $request->passport_number;
            $passport->note = $request->note;
            $passport->user_id = Auth::user()->id;
            $passport->created_at = Carbon::now();
    
            // if($request->hasFile('passport_scan_copy')) {
            //     $passport_image = $request->file('passport_scan_copy');
            //     $name_gen = hexdec(uniqid()).".".$passport_image->getClientOriginalExtension();
            //     Image::make($passport_image)->save('images/'.$name_gen);
            //     $last_img = 'images/'.$name_gen;
            //     $passport->passport_scan_copy = $last_img;
            // }

            if($request->hasFile('passport_scan_copy')) {
                $file = $request->file('passport_scan_copy');
                $name_gen = hexdec(uniqid()).".".$file->getClientOriginalExtension();
                $file->move(public_path('images/'), $name_gen);
                $last_file = 'images/'.$name_gen;
                $passport->passport_scan_copy = $last_file;
            }

            
            $insert = $passport->save();
    
            if($insert) {
                return Redirect()->route('passport.index')->with('success', 'New Passport Added Successfully');
            }
            else {
                return Redirect()->back()->with('error', 'Error Occoured!');
            }
        }
        else {
            return Redirect()->back()->with('error', 'Sorry you have not permission!');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Passport  $passport
     * @return \Illuminate\Http\Response
     */
    public function show(Passport $passport)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Passport  $passport
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if(User::checkPermission('visa.edit') == true) {
            $passport = Passport::where('id', $id)->first();
            return view('pages.passport.edit', compact('passport'));
        }
        else {
            return Redirect()->back()->with('error', 'Sorry you have not permission!');
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Passport  $passport
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        if(User::checkPermission('visa.edit') == true) {
            $passport = Passport::where('id', $id)->first();
            $validated = $request->validate([
                'passport_number' => 'required|unique:passports,passport_number,'.$passport->id,
            ]);

            
            $passport->name = $request->name;
            $passport->phone = $request->phone;
            $passport->address = $request->address;
            $passport->passport_number = $request->passport_number;
            $passport->note = $request->note;

            if($request->hasFile('passport_scan_copy')) {
                $file = $request->file('passport_scan_copy');
                $name_gen = hexdec(uniqid()).".".$file->getClientOriginalExtension();
                $file->move(public_path('images/'), $name_gen);
                $last_file = 'images/'.$name_gen;
                $passport->passport_scan_copy = $last_file;
            }

            $passport->update();
            
            return Redirect()->route('passport.index')->with('success', 'Passport info Updated Successfully.');
        }
        else {
            return Redirect()->back()->with('error', 'Sorry you have not permission!');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Passport  $passport
     * @return \Illuminate\Http\Response
     */
    public function destroy(Passport $passport)
    {
        //
    }
}
