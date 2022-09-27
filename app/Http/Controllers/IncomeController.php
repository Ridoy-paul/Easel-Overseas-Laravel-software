<?php

namespace App\Http\Controllers;

use App\Models\Income;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Carbon;
use DataTables;
use App\Models\User;
use App\Models\Work;
use Illuminate\Support\Facades\DB;
use App\Models\BusinessSetting;

class IncomeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(User::checkPermission('income.view') == true) {
            return view('pages.income.index');
        }
        else {
            return Redirect()->back()->with('error', 'Sorry you have not permission!');
        }
    }

    public function income_data(Request $request)
    {
        if ($request->ajax()) {
            $data = Income::orderBy('id', 'desc')->get();
            return Datatables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function($row){
                    return '<a type="button" target="_blank" href="'.route('income.voucher', $row->id).'" class="btn btn-success btn-sm btn-rounded">View</a> <button type="button" onclick="delete_income('.$row->id.')" data-toggle="modal" data-target="#exampleModal" class="btn btn-danger btn-sm btn-rounded">Delete</button>';
                })
                ->addColumn('passport_info', function($row){
                    return '<small><b>Name:</b> '.$row->passport_info->name.'<br><b>Phone:</b> '.$row->passport_info->phone.'</small>';
                })
                ->addColumn('code', function($row){
                    return $row->work_info->code;
                })
                
                ->rawColumns(['action', 'passport_info', 'code'])
                ->make(true);
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {
        if(User::checkPermission('income.create') == true) {
            $work_info = Work::find($id);
            return view('pages.income.create', compact('work_info'));
        }
        else {
            return Redirect()->back()->with('error', 'Sorry you have not permission!');
        }
    }

    public function search_work_data(Request $request) {
        $output = '';
        $work_info = $request->work_info;
        
        $info = DB::table('works')
                ->join('passports', 'works.passport_id', '=', 'passports.id')
                ->where('works.code', $work_info)
                ->orWhere(function ($query) use ($work_info) {
                    $query->where('passports.phone', 'LIKE', '%'. $work_info. '%')
                    ->orWhere('passports.name', 'LIKE', '%'. $work_info. '%')
                    ->orWhere('passports.passport_number', 'LIKE', '%'. $work_info. '%');
                })
                ->select('passports.*', 'works.code', 'works.due','works.id')
                ->get();
          
          if(!empty($work_info)) {
              if(count($info) > 0) {
                  $output .= '<table class="table table-sm">
                                <thead>
                                    <tr>
                                        <th scope="col">Action</th>
                                        <th scope="col">Name & passport</th>
                                        <th scope="col">Phone</th>
                                        <th scope="col">Work Code & Due</th>
                                    </tr>
                                </thead>
                                <tbody>';
                                foreach ($info as $item) {
                                    $output.='<tr>'.
                                    '<td><a type="button" href="'.route('income.create', $item->id).'" class="btn btn-success btn-sm btn-rounded">Select</a></td>'.
                                        '<td width="45%">'.$item->name.'<br><small class="text-success">'.$item->passport_number.'</small></td>'.
                                        '<td>'.$item->phone.'</td>'.
                                        '<td>Code: '.$item->code.'<br><h3>Due: '.$item->due.'</h3></td>'.
                                        '</tr>';
                                    }
                                $output .= '</tbody>
                            </table>';

              }
              else {
                $output.='<h2 class="text-center">No Result Found</h2>';
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
        if(User::checkPermission('visa.create') == true) {
            $work_id = $request->work_id;
            $work_info = Work::find($work_id);

            if(!is_null($work_info)) {
                $validated = $request->validate([
                    'amount' => 'required',
                    'passport_id' => 'required',
                    'work_id' => 'required',
                ]);
    
                $income = new Income;
                $income->work_id = $work_info->id;
                $income->passport_id = $request->passport_id;
                $income->amount = $request->amount;
                $income->note = $request->note;
                $income->date = $request->date;
                $income->created_at = Carbon::now();
                $save = $income->save();
                if($save) {
                    $balance_info = BusinessSetting::first();
                    $update_balance = $balance_info->balance + $request->amount;
                    $balance_info->balance = $update_balance;
                    $balance_info->update();

                    $total_paid = Income::where(['work_id'=>$work_id, 'passport_id'=>$work_info->passport_id])->sum('amount');
                    $package_price = $work_info->package_price;
                    $due = $package_price - $total_paid;
                    $work_info->paid = $total_paid;
                    $work_info->due = $due;
                    $work_info->update();

                    return Redirect()->route('income.voucher', $income->id);
                }
                else {
                    return Redirect()->route('income.create', 0)->with('error', 'Network Error! Please Try Again');
                }
            }
            else {
                return Redirect()->route('income.create', 0)->with('error', 'Work Info Not Found! Please Try Again');
            }  
        }
        else {
            return Redirect()->back()->with('error', 'Sorry you have not permission!');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Income  $income
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        if(User::checkPermission('income.view') == true) {
            $info = Income::find($id);
            if(!is_null($info)) {
                $bussiness_settings = BusinessSetting::find(1);
                return view('pages.income.voucher', compact('info', 'bussiness_settings'));
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
     * @param  \App\Models\Income  $income
     * @return \Illuminate\Http\Response
     */
    public function edit(Income $income)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Income  $income
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Income $income)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Income  $income
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        if(User::checkPermission('income.delete') == true) {
            $id = $request->income_id;
            $info = Income::find($id);
            if(!is_null($info)) {
                $work_id = $info->work_id;
                $passport_id = $info->passport_id;
                $status = $info->delete();
                if($status) {
                    $total_paid = Income::where(['work_id'=>$work_id, 'passport_id'=>$passport_id])->sum('amount');
                    $work_info = Work::find($work_id);
                    $package_price = $work_info->package_price;
                    $due = $package_price - $total_paid;
                    $work_info->paid = $total_paid;
                    $work_info->due = $due;
                    $work_info->update();
                    return Redirect()->back()->with('success', 'Income Deleted Successfully.');
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
