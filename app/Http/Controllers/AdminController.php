<?php

namespace App\Http\Controllers;

use App\Models\Expenses;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Carbon;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use App\Models\User;
use Image;
use App\Models\ExpensesCategory;
use App\Models\Income;
use Rats\Zkteco\Lib\ZKTeco;
use Laradevsbd\Zkteco\Http\Library\ZktecoLib;

class AdminController extends Controller
{
    
    public function test_finger_print() {
 
        //return ini_get('extension=soap');
        // ini_set('extension=soap','true');
        // ini_set('extension=sockets','true');
        $zk = new ZKTeco('192.168.0.122');
        $status = $zk->connect(); 
        // //$zk->testVoice();
        $user = $zk->getAttendance();
        return $user;
        
    }
    
    
    public function dashboard() {
        $settings = '111';
        if(Auth::user()->type == 'admin' || Auth::user()->type == 'crm') {

            return view('pages.dashboard', compact('settings'));
        }
        else {
            return 'coming soon user dashboard';
        }
        
    }


    public function role() {
        if(User::checkPermission('role.view') == true) {
            $roles = DB::table('roles')->get();
            return view('pages.roles.role', compact('roles'));
        }
        else {
            return 'coming soon user dashboard';
        }
    }

    public function create_role(Request $request) {
        if(User::checkPermission('create.role') == true) {
            $role_name = $request->name;
            $check = DB::table('roles')->where('name', $role_name)->first();
            if(!empty($check->id)) {
                return Redirect()->back()->with('error', 'This role is already exist!');
            }
            else {
                $data = array();
                $data['name'] = $role_name;
                $data['guard_name'] = 'web';
                $data['created_at'] = Carbon::now();

                $insert = DB::table('roles')->insert($data);
                if($insert) {
                    return Redirect()->back()->with('success', 'New role has been created.');
                }
                else {
                    return Redirect()->back()->with('error', 'Error Occoured, Please Try again.');
                }
            }
        }
        else {
            return 'coming soon user dashboard';
        }
    }

    //Begin:: Edit Admin helper role
    public function Edit_Admin_helper_role($id) {
        if(User::checkPermission('update.role') == true){
            $role_info = DB::table('roles')->where('id', $id)->first();
            if(!empty($role_info->id)) {
                return view('pages.roles.edit_role', compact('role_info'));
            }
            else {
                return Redirect()->back()->with('error', 'Sorry you can not access this page');
            }
        }
        else {
            return Redirect()->back()->with('error', 'Sorry you can not access this page');
        }
        
    }
    //Begin:: Edit Admin helper role

    //Begin:: Update Admin helper role
    public function update_Admin_helper_role(Request $request, $id) {
        if(User::checkPermission('update.role') == true){
            $role_name = $request->name;
            $check = DB::table('roles')->where('name', $role_name)->first();
            if(!empty($check->id)) {
                return Redirect()->back()->with('error', 'Sorry, This role is already exist!');
            }
            else {
                $data = array();
                $data['name'] = $role_name;
                $data['updated_at'] = Carbon::now();
                $update = DB::table('roles')->where('id', $id)->update($data);
                if($update) {
                    return Redirect()->route('admin.role')->with('success', 'Role has benn Updated.');
                }
                else {
                    return Redirect()->back()->with('error', 'Error Occoured, Please Try again.');
                }
                
            }
        }
        else {
            return Redirect()->back()->with('error', 'Sorry you can not access this page');
        }
        
    }
    //End:: Update Admin helper role


    //Begin:: Update Admin helper role Permission
    public function admin_helper_permission($id) {
        if(User::checkPermission('permissions') == true){
            $role = Role::findById($id);
            $permissions = Permission::all();
            $permissionGroups = User::getPermissionGroupsForAdminHealperRole();
            $wing = 'main';
            return view('pages.roles.permissions', compact('permissions', 'permissionGroups', 'role', 'wing'));
        }
        else {
            return Redirect()->back()->with('error', 'Sorry you can not access this page');
        }
    }
    //End:: Update Admin helper role Permission

    //Begin:: Set Permission to admin helper role
    public function set_permission_to_admin_helper_role() {
        $role_id = $_GET['roleID'];
        $permission_id = $_GET['permission_id'];
        
        $check = DB::table('role_has_permissions')->where('role_id', $role_id)->where('permission_id', $permission_id)->first();
        if(empty($check->role_id)) {
            $data = array();
            $data['role_id'] = $role_id;
            $data['permission_id'] = $permission_id;

            $insert = DB::table('role_has_permissions')->insert($data);

            if($insert) {
                \Artisan::call('permission:cache-reset');
                $sts = [
                    'status' => 'yes',
                    'reason' => 'Permission set successfully'
                ];
                return response()->json($sts);
            }
            else {
                $sts = [
                    'status' => 'no',
                    'reason' => 'Something is wrong, please try again.'
                ];
                return response()->json($sts);
            }
            
        }
        else {
            $sts = [
                'status' => 'no',
                'reason' => 'Permission is already exist, Please try another.'
            ];
            return response()->json($sts);
        }
        
    }
    //End:: Set Permission to admin helper role


    //Begin:: Delete Permission from role
    public function delete_permission_from_role() {
        $role_id = $_GET['roleID'];
        $permission_id = $_GET['permission_id'];
        
        $check = DB::table('role_has_permissions')->where('role_id', $role_id)->where('permission_id', $permission_id)->first();
        if(!empty($check->role_id)) {
            
            $delete = DB::table('role_has_permissions')->where('role_id', $role_id)->where('permission_id', $permission_id)->delete();
            if($delete) {
                \Artisan::call('permission:cache-reset');
                $sts = [
                    'status' => 'yes',
                    'reason' => 'Permission Delete successfully'
                ];
                return response()->json($sts);
            }
            else {
                $sts = [
                    'status' => 'no',
                    'reason' => 'Something is wrong, please try again.'
                ];
                return response()->json($sts);
            }
            
        }
        else {
            $sts = [
                'status' => 'no',
                'reason' => 'Permission is not exist, Please try another.'
            ];
            return response()->json($sts);
        }
        
    }
    //End:: Delete Permission from role

    public function admin_profile() {
        $user_info = Auth::user();
        if(!is_null($user_info)) {
            return view('pages.profile.info', compact('user_info'));
        }
        else {
            return 'Unauthorized User!';
        }
    }

    public function admin_update_profile(Request $request) {
        $user_info = Auth::user();
        
        if(!is_null($user_info)) {

            $validated = $request->validate([
                'image' => 'mimes:jpeg,png,jpg,gif,svg',
            ]);

            $user = User::find($user_info->id);
            $user->name = $request->name;

            if($request->has('profile_photo_path')) {
                if($user->profile_photo_path && is_file(public_path($user->profile_photo_path))){
                    unlink($user->profile_photo_path);
                }
                $user_image = $request->file('profile_photo_path');
                $name_gen = hexdec(rand()).".".$user_image->getClientOriginalExtension();
                Image::make($user_image)->resize(300, 300)->save('images/profile/'.$name_gen);
                $final_user_image = 'images/profile/'.$name_gen;
                $user->profile_photo_path = $final_user_image;
            }
            $user->save();

            return Redirect()->back()->with('success', 'Profile Update Successfully.');

        }
        else {
            return 'Unauthorized User!';
        }
    }


    public function expenses_ledger_report() {
        if(User::checkPermission('owners.report') == true) {
            $categories = ExpensesCategory::all();
            return view('pages.report.expenses_ledger', compact('categories'));
        }
        else {
            return 'coming soon user dashboard';
        }
    }

    public function expenses_ledger_report_data(Request $request) {
        $first_date = $request->first_date;
        $last_date = $request->last_date;
        $category = $request->category;
        
        $output = '';
        if(!empty($first_date) && $last_date == 0) { // this is for today / single day
            $sum_of_exp = 0;
            $status = '';
            $head = '';

            if($category == 'all') {
                $head = date("d M, Y", strtotime($first_date))." All Expenses";
                $expenses = Expenses::WhereDate('date', $first_date)->get();
            }
            else {
                $category_info = ExpensesCategory::find($category);
                $expenses = Expenses::WhereDate('date', $first_date)->where('expenses_category_id', $category_info->id)->get();
                $head = date("d M, Y", strtotime($first_date))." Expenses for ".$category_info->title;
            }
            
            $output .= '<div class="row">
                            <div class="col-md-12">
                                <h5><b>Date: </b>'.$head.'</h5>
                            </div>
                            <div class="col-md-12">
                                <table class="table table-bordered">
                                    <thead>
                                        <tr>
                                            <th scope="col">Date</th>
                                            <th scope="col">INFO</th>
                                            <th scope="col">EXP CATEGORY & SUBJECT</th>
                                            <th scope="col">Amount</th>
                                        </tr>
                                    </thead>
                                    <tbody>';
                                        foreach($expenses as $exp) {
                                            $output .= '<tr>
                                                <td>'.date('d-m-Y', strtotime($exp->date)).'</td>
                                                <td>';
                                                    if($exp->for_whom == 'c') {
                                                        $status = 'Client Expenses';
                                                        $output .= '<small><b>Client Name:</b> '.$exp->passport_info->name.'<br><b>Phone:</b> '.$exp->passport_info->phone.'<br><b>Work Code:</b> '.$exp->work_info->code.'</small>';
                                                    }
                                                    elseif($exp->for_whom == 'a') {
                                                        $status = 'Agent Expenses';
                                                        $output .= '<small><b>Agent Name:</b> '.$exp->agent_info->name.'<br><b>Phone:</b> '.$exp->agent_info->phone.'<br><b>Work Code:</b> '.$exp->work_info->code.'</small>';
                                                    }
                                                    elseif($exp->for_whom == 'o') {
                                                        $status = 'Office Expenses';
                                                        $output .= '<span class="badge badge-danger">office Expense</span>';
                                                    }
                                                $output .= '</td>
                                                <td><b>Exp Category: </b>'.$exp->category_info->title.'<br><small>'.$status.'</small></td>
                                                <td>'.$exp->amount.'</td>
                                            </tr>';
                                            $sum_of_exp = $sum_of_exp + $exp->amount;
                                        }
                                $output .= '</tbody>
                                </table>
                            </div>
                            
                            <div class="col-md-12 text-center" style="padding-bottom: 10px;">
                                <h4 class="bg-dark text-light"
                                    style="padding: 5px 10px; border: 1px solid red; border-radius: 10px; margin-left: 10px;">
                                    <b>Total Expenses: '.$sum_of_exp.'</b>
                                </h4>
                            </div>
                        </div>';
        }
        else if(!empty($first_date) && $last_date != 0) { // this is for date wise
            
            $sum_of_exp = 0;
            $status = '';
            $head = '';

            if($category == 'all') {
                $head = date("d M, Y", strtotime($first_date))." To ".date("d M, Y", strtotime($last_date))." All Expenses";
                $expenses = Expenses::WhereBetween('date', [$first_date, $last_date])->get();
            }
            else {
                $category_info = ExpensesCategory::find($category);
                $expenses = Expenses::WhereBetween('date', [$first_date, $last_date])->where('expenses_category_id', $category_info->id)->get();
                $head = date("d M, Y", strtotime($first_date))." To ".date("d M, Y", strtotime($last_date))." Expenses for ".$category_info->title;
            }
            
            $output .= '<div class="row">
                            <div class="col-md-12">
                                <h5><b>Date: </b>'.$head.'</h5>
                            </div>
                            <div class="col-md-12">
                                <table class="table table-bordered">
                                    <thead>
                                        <tr>
                                            <th scope="col">Date</th>
                                            <th scope="col">INFO</th>
                                            <th scope="col">EXP CATEGORY & SUBJECT</th>
                                            <th scope="col">Amount</th>
                                        </tr>
                                    </thead>
                                    <tbody>';
                                        foreach($expenses->chunk(10) as $data) {
                                            foreach($data as $exp) {
                                            $output .= '<tr>
                                                <td>'.date('d-m-Y', strtotime($exp->date)).'</td>
                                                <td>';
                                                    if($exp->for_whom == 'c') {
                                                        $status = 'Client Expenses';
                                                        $output .= '<small><b>Client Name:</b> '.$exp->passport_info->name.'<br><b>Phone:</b> '.$exp->passport_info->phone.'<br><b>Work Code:</b> '.$exp->work_info->code.'</small>';
                                                    }
                                                    elseif($exp->for_whom == 'a') {
                                                        $status = 'Agent Expenses';
                                                        $output .= '<small><b>Agent Name:</b> '.$exp->agent_info->name.'<br><b>Phone:</b> '.$exp->agent_info->phone.'<br><b>Work Code:</b> '.$exp->work_info->code.'</small>';
                                                    }
                                                    elseif($exp->for_whom == 'o') {
                                                        $status = 'Office Expenses';
                                                        $output .= '<span class="badge badge-danger">office Expense</span>';
                                                    }
                                                $output .= '</td>
                                                <td><b>Exp Category: </b>'.$exp->category_info->title.'<br><small>'.$status.'</small></td>
                                                <td>'.$exp->amount.'</td>
                                            </tr>';
                                            $sum_of_exp = $sum_of_exp + $exp->amount;
                                            }
                                        }
                                $output .= '</tbody>
                                </table>
                            </div>
                            
                            <div class="col-md-12 text-center" style="padding-bottom: 10px;">
                                <h4 class="bg-dark text-light"
                                    style="padding: 5px 10px; border: 1px solid red; border-radius: 10px; margin-left: 10px;">
                                    <b>Total Expenses: '.$sum_of_exp.'</b>
                                </h4>
                            </div>
                        </div>';
            
            
            
        }
        
        return Response($output);
    }
    //End:: Day book


    public function income_ledger_report() {
        if(User::checkPermission('owners.report') == true) {
            return view('pages.report.income_ledger');
        }
        else {
            return 'coming soon user dashboard';
        }
    }

    public function income_ledger_report_data(Request $request) {
        $first_date = $request->first_date;
        $last_date = $request->last_date;
        
        $output = '';
        if(!empty($first_date) && $last_date == 0) { // this is for today / single day
            $sum_of_income = 0;
            $incomes = Income::WhereDate('date', $first_date)->get();
            $output .= '<div class="row">
                            <div class="col-md-12">
                                <h5><b>Date: </b>'.date("d M, Y", strtotime($first_date)).' Income Ledger</h5>
                            </div>
                            <div class="col-md-12">
                                <table class="table table-bordered">
                                    <thead>
                                        <tr>
                                            <th scope="col">Date</th>
                                            <th scope="col">INFO</th>
                                            <th scope="col">Work Code</th>
                                            <th scope="col">Amount</th>
                                        </tr>
                                    </thead>
                                    <tbody>';
                                        foreach($incomes as $income) {
                                            $output .= '<tr>
                                                <td>'.date('d-m-Y', strtotime($income->date)).'</td>
                                                <td><small><b>Name:</b> '.$income->passport_info->name.'<br><b>Phone:</b> '.$income->passport_info->phone.'</small></td>
                                                <td>'.$income->work_info->code.'</td>
                                                <td>'.$income->amount.'</td>
                                            </tr>';
                                            $sum_of_income = $sum_of_income + $income->amount;
                                        }
                                $output .= '</tbody>
                                </table>
                            </div>
                            
                            <div class="col-md-12 text-center" style="padding-bottom: 10px;">
                                <h4 class="bg-dark text-light"
                                    style="padding: 5px 10px; border: 1px solid red; border-radius: 10px; margin-left: 10px;">
                                    <b>Total Income: '.$sum_of_income.'</b>
                                </h4>
                            </div>
                        </div>';
        }
        else if(!empty($first_date) && $last_date != 0) { // this is for date wise
            
            $sum_of_income = 0;
            $incomes = Income::WhereBetween('date', [$first_date, $last_date])->get();
            $output .= '<div class="row">
                            <div class="col-md-12">
                                <h5><b>Date: </b>'.date("d M, Y", strtotime($first_date))." To ".date("d M, Y", strtotime($last_date)).' Income Ledger</h5>
                            </div>
                            <div class="col-md-12">
                                <table class="table table-bordered">
                                    <thead>
                                        <tr>
                                            <th scope="col">Date</th>
                                            <th scope="col">INFO</th>
                                            <th scope="col">Work Code</th>
                                            <th scope="col">Amount</th>
                                        </tr>
                                    </thead>
                                    <tbody>';
                                        foreach($incomes->chunk(10) as $data) {
                                            foreach($data as $income) {
                                            $output .= '<tr>
                                                <td>'.date('d-m-Y', strtotime($income->date)).'</td>
                                                <td><small><b>Name:</b> '.$income->passport_info->name.'<br><b>Phone:</b> '.$income->passport_info->phone.'</small></td>
                                                <td>'.$income->work_info->code.'</td>
                                                <td>'.$income->amount.'</td>
                                            </tr>';
                                            $sum_of_income = $sum_of_income + $income->amount;
                                            }
                                        }
                                $output .= '</tbody>
                                </table>
                            </div>
                            
                            <div class="col-md-12 text-center" style="padding-bottom: 10px;">
                                <h4 class="bg-dark text-light"
                                    style="padding: 5px 10px; border: 1px solid red; border-radius: 10px; margin-left: 10px;">
                                    <b>Total Income: '.$sum_of_income.'</b>
                                </h4>
                            </div>
                        </div>';
            
            
            
        }
        
        return Response($output);
    }
    //End:: Day book
    

    


    

}
