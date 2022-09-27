<?php

namespace App\Http\Controllers;

use App\Models\Expenses;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Carbon;
use DataTables;
use App\Models\User;
use App\Models\Work;
use Illuminate\Support\Facades\DB;
use App\Models\BusinessSetting;
use App\Models\ExpensesCategory;
use Image;

class ExpensesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(User::checkPermission('expenses.view') == true) {
            return view('pages.expenses.index');
        }
        else {
            return Redirect()->back()->with('error', 'Sorry you have not permission!');
        }
    }

    public function expense_data(Request $request)
    {
        if ($request->ajax()) {
            $data = Expenses::orderBy('id', 'desc')->get();
            return Datatables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function($row){
                    return '<a type="button" target="_blank" href="'.route('expense.voucher', $row->id).'" class="btn btn-success btn-sm btn-rounded">View</a>  <button type="button" onclick="delete_expense('.$row->id.')" data-toggle="modal" data-target="#exampleModal" class="btn btn-danger btn-sm btn-rounded">Delete</button>';
                })
                ->addColumn('info', function($row){
                    if($row->for_whom == 'c') {
                        return '<small><b>Client Name:</b> '.$row->passport_info->name.'<br><b>Phone:</b> '.$row->passport_info->phone.'<br><b>Work Code:</b> '.$row->work_info->code.'</small>';
                    }
                    elseif($row->for_whom == 'a') {
                        return '<small><b>Agent Name:</b> '.$row->agent_info->name.'<br><b>Phone:</b> '.$row->agent_info->phone.'<br><b>Work Code:</b> '.$row->work_info->code.'</small>';
                    }
                    elseif($row->for_whom == 'o') {
                        return '<span class="badge badge-danger">office Expense</span>';
                    }
                })
                ->addColumn('exp_category', function($row){
                    $file = '';
                    if(!is_null($row->file)) {
                        $file = '<br><a type="button" target="_blank" href="'.asset($row->file).'" class="badge badge-info">file</a>';
                    }
                    
                    $for_w = '';
                    if($row->for_whom == 'c') {$for_w = '<span class="badge badge-success">Client Expense</span>'; }elseif($row->for_whom == 'a') {$for_w = '<span class="badge badge-info">Agent Expense</span>'; }elseif($row->for_whom == 'o') {$for_w = '<span class="badge badge-danger">office Expense</span>'; }
                    return 'Category: '.$row->category_info->title.'<br>'.$for_w.$file;
                })
                ->addColumn('date', function($row){
                    return date('d-m-Y', strtotime($row->date));
                })
                ->rawColumns(['action', 'info', 'exp_category', 'date'])
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
        if(User::checkPermission('expenses.create') == true) {
            $expenses_category = ExpensesCategory::all();
            return view('pages.expenses.create', compact('expenses_category'));
        }
        else {
            return Redirect()->back()->with('error', 'Sorry you have not permission!');
        }
    }

    public function search_client_or_agent_data(Request $request) {
        $info_a_or_c = $request->info;
        $for_whom = $request->for_whom;
        $output = '';

        if(!empty($info_a_or_c)) {
            if($for_whom == 'c') {
                $info = DB::table('works')
                        ->join('passports', 'works.passport_id', '=', 'passports.id')
                        ->where('works.code', $info_a_or_c)
                        ->orWhere(function ($query) use ($info_a_or_c) {
                            $query->where('passports.phone', 'LIKE', '%'. $info_a_or_c. '%')
                            ->orWhere('passports.name', 'LIKE', '%'. $info_a_or_c. '%')
                            ->orWhere('passports.passport_number', 'LIKE', '%'. $info_a_or_c. '%');
                        })
                        ->select('passports.*', 'works.code', 'works.due', 'works.id as work_id')
                        ->get();

                    if(count($info) > 0) {
                        $output .= '<table class="table table-sm">
                                        <thead>
                                            <tr>
                                                <th scope="col">Action</th>
                                                <th scope="col">Client Name & passport</th>
                                                <th scope="col">Phone</th>
                                                <th scope="col">Work Code</th>
                                            </tr>
                                        </thead>
                                        <tbody>';
                                        foreach ($info as $item) {
                                            $output.='<tr>'.
                                            '<td><button type="button" onclick="add_client_or_agent_data(\'c\',\''.$item->name.'\',\''.$item->id.'\',\''.$item->phone.'\',\''.$item->code.'\',\''.$item->work_id.'\')" class="btn btn-success btn-sm btn-rounded">Select</button></td>'.
                                                '<td>'.$item->name.'<br><small class="text-success">'.$item->passport_number.'</small></td>'.
                                                '<td>'.$item->phone.'</td>'.
                                                '<td>'.$item->code.'</td>'.
                                                '</tr>';
                                            }
                                        $output .= '</tbody>
                                    </table>';
        
                    }
                    else {
                        $output.='<h2 class="text-center">No Result Found</h2>';
                    }
            }
            else if($for_whom == 'a') {
                $info = DB::table('works')
                        ->join('agents', 'works.agent_id', '=', 'agents.id')
                        ->where('works.code', $info_a_or_c)
                        ->orWhere(function ($query) use ($info_a_or_c) {
                            $query->where('agents.phone', 'LIKE', '%'. $info_a_or_c. '%')
                            ->orWhere('agents.name', 'LIKE', '%'. $info_a_or_c. '%');
                        })
                        ->select('agents.*', 'works.code', 'works.agent_commission_due', 'works.id as work_id')
                        ->get();

                    if(count($info) > 0) {
                        $output .= '<table class="table table-sm">
                                        <thead>
                                            <tr>
                                                <th scope="col">Action</th>
                                                <th scope="col">Agent Name & Address</th>
                                                <th scope="col">Phone</th>
                                                <th scope="col">Work Code</th>
                                            </tr>
                                        </thead>
                                        <tbody>';
                                        foreach ($info as $item) {
                                            $output.='<tr>'.
                                            '<td><button type="button" onclick="add_client_or_agent_data(\'a\',\''.$item->name.'\',\''.$item->id.'\',\''.$item->phone.'\',\''.$item->code.'\',\''.$item->work_id.'\')" class="btn btn-success btn-sm btn-rounded">Select</button></td>'.
                                                '<td>'.$item->name.'<br><small class="text-success">'.$item->address.'</small></td>'.
                                                '<td>'.$item->phone.'</td>'.
                                                '<td>Code: '.$item->code.'<br><h4 class="text-danger">Due: '.$item->agent_commission_due.'</h4></td>'.
                                                '</tr>';
                                            }
                                        $output .= '</tbody>
                                    </table>';

                    }
                    else {
                        $output.='<h2 class="text-center">No Result Found</h2>';
                    }
            }
            else {

            }
        }
        return Response($output);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
        if(User::checkPermission('expenses.create') == true) {
            
            
            $for_whom = $request->for_whom;

            $expense = new Expenses;

            if($for_whom == 'c') {
                $validated = $request->validate([
                    'work_id' => 'required',
                    'passport_id' => 'required',
                ]);
            }
            else if($for_whom == 'a') {
                $validated = $request->validate([
                    'work_id' => 'required',
                    'agent_id' => 'required',
                ]);
            }

            $expense->for_whom = $request->for_whom;
            $expense->expenses_category_id = $request->expenses_category_id;
            $expense->work_id = $request->work_id;
            $expense->agent_id = $request->agent_id;
            $expense->passport_id = $request->passport_id;
            $expense->amount = $request->amount;
            $expense->user_id = Auth::user()->id;
            $expense->voucher_number = $request->voucher_number;
            $expense->note = $request->note;
            $expense->date = $request->date;

            if($request->hasFile('exp_file')) {
                $file = $request->file('exp_file');
                $name_gen = hexdec(uniqid()).".".$file->getClientOriginalExtension();
                $file->move(public_path('images/'), $name_gen);
                $last_file = 'images/'.$name_gen;
                $expense->file = $last_file;
            }

            $expense->created_at = Carbon::now();
            $save = $expense->save();
                if($save) {
                    $balance_info = BusinessSetting::first();
                    $update_balance = $balance_info->balance - $request->amount;
                    $balance_info->balance = $update_balance;
                    $balance_info->update();

                    // if($for_whom == 'c') {
                    //     $work_info = Work::find($request->work_id);
                    //     $paid = $work_info->paid;
                    //     $due = $work_info->due;
                    //     $work_info->paid = $paid + $request->amount;
                    //     $work_info->due = $due - $request->amount;
                    //     $work_info->save();
                    // }
                    
                    if($for_whom == 'a') {
                        $work_info = Work::find($request->work_id);
                        $agent_commission_paid = Expenses::where(['work_id'=>$work_info->id, 'agent_id'=>$work_info->agent_id])->sum('amount');
                        $agent_commission = $work_info->agent_commission;
                        $agent_commission_due = $agent_commission - $agent_commission_paid;
                        $work_info->agent_commission_paid = $agent_commission_paid;
                        $work_info->agent_commission_due = $agent_commission_due;
                        $work_info->save();
                    }
                    return Redirect()->route('expense.voucher', $expense->id);
                }
                else {
                    return Redirect()->route('income.create', 0)->with('error', 'Network Error! Please Try Again');
                }
        }
        else {
            return Redirect()->back()->with('error', 'Sorry you have not permission!');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Expenses  $expenses
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        if(User::checkPermission('expenses.view') == true) {
            $info = Expenses::find($id);
            if(!is_null($info)) {
                $bussiness_settings = BusinessSetting::find(1);
                return view('pages.expenses.voucher', compact('info', 'bussiness_settings'));
            }
            else {
                return Redirect()->back()->with('error', 'Wrong Way!');
            }
        }
        else {
            return Redirect()->back()->with('error', 'Sorry you have not permission!');
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Expenses  $expenses
     * @return \Illuminate\Http\Response
     */
    public function edit(Expenses $expenses)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Expenses  $expenses
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Expenses $expenses)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Expenses  $expenses
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        if(User::checkPermission('income.delete') == true) {
            $id = $request->expense_id;
            $info = Expenses::find($id);
            if(!is_null($info)) {
                $work_id = $info->work_id;
                $agent_id = $info->agent_id;
                $deleted_amount = $info->amount;
                $status = $info->delete();
                if($status) {
                    if($info->for_whom == 'a') {
                        $total_paid_to_agent = Expenses::where(['work_id'=>$work_id, 'agent_id'=>$agent_id])->sum('amount');
                        $work_info = Work::find($work_id);

                        $agent_commission = $work_info->agent_commission;
                        $due = $agent_commission - $total_paid_to_agent;
                        $work_info->agent_commission_paid = $total_paid_to_agent;
                        $work_info->agent_commission_due = $due;
                        $work_info->update();
                    }

                    $balance_info = BusinessSetting::first();
                    $update_balance = $balance_info->balance + $deleted_amount;
                    $balance_info->balance = $update_balance;
                    $balance_info->update();
                    return Redirect()->back()->with('success', 'Expense Deleted Successfully.');
                }
                else {
                    return Redirect()->back()->with('error', 'Network Error!');
                }
            }
            else {
                return Redirect()->back()->with('error', 'Income Not Found!');
            }
        }
        else {
            return Redirect()->back()->with('error', 'Sorry you have not permission!');
        }
    }
}
