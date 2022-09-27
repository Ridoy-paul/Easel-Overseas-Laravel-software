<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;

class CRMController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(User::checkPermission('crm.view') == true){  
            $wing = 'main';
            $roles = DB::table('roles')->get();
            $crms = DB::table('users')
                    ->join('model_has_roles', 'users.id', 'model_has_roles.model_id')
                    ->select('users.*', 'model_has_roles.role_id')
                    ->where('users.type', 'crm')
                    ->get();
            
            return view('pages.crm.index', compact('crms', 'roles'));
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
        if(User::checkPermission('crm.create') == true){
            $validator = Validator::make($request->all(), [
                'name' => 'required',
                'email' => 'required|unique:users',
                'password' => 'required|confirmed|min:8',
                
            ]);
        
            if ($validator->fails()) {
                return redirect()->back()->withErrors($validator)->withInput();
            }

            $data = array();
            $data['name']=$request->name;
            $data['email']=$request->email;
            $data['type']= 'crm';
            $data['is_active']= 1;
            $data['password']=Hash::make($request->password);

            $insert = DB::table('users')->insert($data);

            if($insert) {
                $findUser = User::where('email', $request->email)->first();
                $role_data = array();
                $role_data['role_id'] = ($request->type == 'branch_user') ? $request->role_id : $request->admin_helper_role;
                $role_data['model_type'] = 'App\Models\User';
                $role_data['model_id'] = $findUser->id;
                $insert_role = DB::table('model_has_roles')->insert($role_data);

                if($insert_role) {
                    return Redirect()->back()->with('error', 'CRM Added Successfully.');
                }
                else {
                    return Redirect()->back()->with('error', 'Error occurred! Please try again.');
                }
                
            }
            else {
                return Redirect()->back()->with('error', 'Error occurred! Please try again.');
            }
        }
        else {
            return Redirect()->back()->with('error', 'Sorry you can not access this page');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if(User::checkPermission('crm.update') == true){
            
            $roles = DB::table('roles')->get();
            
            $user_info = DB::table('users')
                        ->join('model_has_roles', 'users.id', 'model_has_roles.model_id')
                        ->select('users.*', 'model_has_roles.role_id')
                        ->where('users.id', $id)
                        ->first();

            return view('pages.crm.edit', compact('user_info', 'roles'));
        }
        else {
            return Redirect()->back()->with('error', 'Sorry you can not access this page');
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        if(User::checkPermission('crm.update') == true){
            $crm_info = User::find($id);
            $validator = Validator::make($request->all(), [
                'name' => 'required',
                'email' => 'required|max:255|unique:users,email,'.$crm_info->id,
                
            ]);
        
            if ($validator->fails()) {
                return redirect()->back()->withErrors($validator)->withInput();
            }

            $data = array();
            $data['name']=$request->name;
            $data['email']=$request->email;
            
            $update_crm = User::where('id', $id)->update($data);

            if($update_crm) {

                $role_data = array(
                    'role_id' => $request->admin_helper_role,
                );
                $update_role = DB::table('model_has_roles')->where('model_id', $id)->update($role_data);
                return redirect()->route('admin.crm')->with('success', 'CRM Update Successfully.');
            }
            else {
                return redirect()->back()->with('error', 'Error occurred! Please try again.');
            }
        }
        else {
            return Redirect()->back()->with('error', 'Sorry you can not access this page');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    //Begin:: Deactive CRM
    public function DeactiveCRM($id) {
        if(User::checkPermission('crm.update') == true){
            $data = array(
                'is_active' => 0,
            );
            $Q = User::where('id', $id)->update($data);
            if($Q) {
                return Redirect()->back()->with('success', 'CRM Deactive Successfully.');
            }
            else {
                return Redirect()->back()->with('error', 'Error occurred! Please try again.');
            }
        }
        else {
            return Redirect()->back()->with('error', 'Sorry you can not access this page');
        }

    }
    //End:: Deactive CRM

    //Begin:: Active CRM
    public function ActiveCRM($id) {
        if(User::checkPermission('crm.update') == true){
            $data = array(
                'is_active' => 1,
            );

            $Q = User::where('id', $id)->update($data);
            if($Q) {
                return Redirect()->back()->with('success', 'CRM Active Successfully.');
            }
            else {
                return Redirect()->back()->with('error', 'Error occurred! Please try again.');
            }
        }
        else {
            return Redirect()->back()->with('error', 'Sorry you can not access this page');
        }

    }
    //End:: Active CRM

}
