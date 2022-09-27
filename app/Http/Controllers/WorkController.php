<?php

namespace App\Http\Controllers;

use App\Models\Work;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Country;
use App\Models\Visa;
use Facade\FlareClient\Http\Response;
use Illuminate\Support\Facades\DB;
use App\Models\Agents;
use App\Models\Passport;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Carbon;
use DataTables;

class WorkController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(User::checkPermission('work.all.view') == true) {
            return view('pages.work.index');
        }
        else {
            return Redirect()->back()->with('error', 'Sorry you have not permission!');
        }
    }

    public function work_data(Request $request) {
        if ($request->ajax()) {
            $data = Work::orderBy('id', 'desc')->get();
            return Datatables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function($row){
                    return '<a type="button" href="'.route('work.edit', $row->id).'" class="btn btn-info btn-sm">Edit</a> <a type="button" href="'.route('work.view', $row->id).'" class="btn btn-success btn-sm">View</a>';
                })
                ->addColumn('passport_info', function($row){
                    return '<small>Name: '.$row->passport_info->name.'<br>Phone: '.$row->passport_info->phone.'<br>'.$row->passport_info->passport_number.'</small>';
                })
                ->addColumn('visa_info', function($row){
                    return '<small>'.$row->visa_info->visa_title.'<br>Company: '.$row->visa_info->company_name.'<br>Country: '.$row->country_info->name.'</small>';
                })
                ->addColumn('agent_info', function($row){
                    return '<small>'.$row->agent_info->name.'<br>Phone: '.$row->agent_info->phone.'</small>';
                })
                ->addColumn('package_info', function($row){
                    return '<small>P Price:'.$row->package_price.'<br>Agent Commission: '.$row->agent_commission.'<br>Code: '.$row->code.'</small>';
                })
                 ->addColumn('status', function($row){
                    return $row->is_active == 0? '<span class="badge badge-danger">Rejected</span>' : '<span class="badge badge-success">Active</span>'.'<small><br>status: '.$row->status.'</small>';
                })
                ->rawColumns(['action', 'passport_info', 'visa_info', 'agent_info', 'package_info', 'status'])
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
        if(User::checkPermission('work.create') == true) {
            $visas = Visa::where('rest_number_of_visa', '>', 0)->get();
            return view('pages.work.create', compact('visas'));
        }
        else {
            return Redirect()->back()->with('error', 'Sorry you have not permission!');
        }
    }

    public function get_visa_to_country_info(Request $request) {
        $visa_id = $request->id;
        $visa_info = Visa::where('id', $visa_id)->first();
        $country_info = $visa_info->country;
        $data = '';
        if(!is_null($country_info)) {
            $data .= '<h5 class="text-light bg-success rounded p-2">'.$country_info->name.'</h5><input type="hidden" name="country_id" value="'.$country_info->id.'">';
        }
        else {
            $data .= '<h5 class="text-light bg-danger rounded p-2">No Country Data Found</h5><input type="hidden" name="country_id" value="">';
        }
        return Response($data);
    }

    public function search_agent(Request $request) {
        $output = '';
        $agent_info = $request->supplier_info;
        
          $agents = DB::table('agents')
                ->where('is_active', 1)
                ->where(function ($query) use ($agent_info) {
                    $query->where('phone', 'LIKE', '%'. $agent_info. '%')
                        ->orWhere('name', 'LIKE', '%'. $agent_info. '%');
                })
                ->get(['name', 'address', 'phone', 'id']);
          
          if(!empty($agent_info)) {
              if(count($agents) > 0) {
                  $output .= '<table class="table">
                                <thead>
                                    <tr>
                                        <th scope="col">Name</th>
                                        <th scope="col">Phone</th>
                                        <th scope="col">Address</th>
                                        <th scope="col">Action</th>
                                    </tr>
                                </thead>
                                <tbody>';
                                foreach ($agents as $agent) {
                                    $output.='<tr>'.
                                        '<td>'.$agent->name.'</td>'.
                                        '<td>'.$agent->phone.'</td>'.
                                        '<td>'.$agent->address.'</td>'.
                                        '<td><button type="button" onclick="setAgent(\''.$agent->name.'\', \''.$agent->id.'\', \''.$agent->phone.'\')" class="btn btn-success btn-sm btn-rounded">Select</button></td>'.
                                        '</tr>';
                                    }

                                $output .= '</tbody>
                            </table>';

              }
              else {
                $output.='<tr><td colspan="6" class="text-center"><h2>No Result Found</h2></td></tr>';
            }
        }
        return Response($output);
    }

    public function search_passport(Request $request) {
        $output = '';
        $passport_info = $request->passport_info;
        
          $passports = DB::table('passports')
                ->where(function ($query) use ($passport_info) {
                    $query->where('phone', 'LIKE', '%'. $passport_info. '%')
                        ->orWhere('name', 'LIKE', '%'. $passport_info. '%')
                        ->orWhere('passport_number', 'LIKE', '%'. $passport_info. '%');
                })
                ->get(['name', 'passport_number', 'phone', 'id']);
          
          if(!empty($passport_info)) {
              if(count($passports) > 0) {
                  $output .= '<table class="table table-sm">
                                <thead>
                                    <tr>
                                        <th scope="col">Action</th>
                                        <th scope="col">Name</th>
                                        <th scope="col">Phone</th>
                                        <th scope="col">Passport Number</th>
                                    </tr>
                                </thead>
                                <tbody>';
                                foreach ($passports as $passport) {
                                    $output.='<tr>'.
                                        '<td><button type="button" onclick="setPassport(\''.$passport->name.'\', \''.$passport->id.'\', \''.$passport->phone.'\')" class="btn btn-success btn-sm btn-rounded">Select</button></td>'.
                                        '<td>'.$passport->name.'</td>'.
                                        '<td>'.$passport->phone.'</td>'.
                                        '<td><small>'.$passport->passport_number.'</small></td>'.
                                        '</tr>';
                                    }
                                $output .= '</tbody>
                            </table>';

              }
              else {
                $output.='<tr><td colspan="6" class="text-center"><h2>No Result Found</h2></td></tr>';
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
        $output = '';
        if(User::checkPermission('work.create') == true) {
            $visa_id = $request->visa_id;
            $agent_id = $request->agent_id;
            $country_id = $request->country_id;
            $passport_id = $request->passport_id;

            $visa_info = Visa::find($visa_id);
            $agent_info = Agents::find($agent_id);
            $country_info = Country::find($country_id);
            $passport_info = Passport::find($passport_id);

            if(!is_null($visa_info) && !is_null($agent_info) && !is_null($country_info) && !is_null($passport_info)) {
                $work = new Work;
                $work->passport_id = $passport_info->id;
                $work->post = $request->post;
                $work->country_id = $country_info->id;
                $work->visa_id = $visa_info->id;
                $work->code = $request->code;
                $work->agent_id = $agent_info->id;
                $work->package_price = $request->package_price;
                $work->paid = 0;
                $work->due = $request->package_price;
                $work->agent_commission = $request->agent_commission;
                $work->agent_commission_due = $request->agent_commission;
                $work->note = $request->note;
                $work->date = $request->date;
                $work->status = 'start';
                $work->user_id = Auth::user()->id;
                $work->created_at = Carbon::now();
                $work_status = $work->save();
                $work_id = $work->id;
                if($work_status) {
                    $current_number_of_visa = $visa_info->rest_number_of_visa;
                    $now = $current_number_of_visa - 1;
                    $visa_info->rest_number_of_visa = $now;
                    $visa_info->save();
                    $output = [
                        'status' => 'yes',
                        'work_id' => $work_id,
                    ];
                    return Response($output);
                }
                else {
                    $output = [
                        'status' => 'no',
                        'reason' => 'Network Error!!!, Please Try Again.',
                    ];
                    return Response($output);
                }
            }
            else {
                $output = [
                    'status' => 'no',
                    'reason' => 'Some Info is missing, Please Check Again!!!',
                ];
                return Response($output);
            }
        }
        else {
            $output = [
                'status' => 'no',
                'reason' => 'Sorry you have no Permission to do this work!',
            ];
            return Response($output);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Work  $work
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        if(User::checkPermission('work.single.view') == true) {
            $work_info = Work::find($id);
            return view('pages.work.show', compact('work_info'));
        }
        else {
            return Redirect()->back()->with('error', 'Sorry you have not permission!');
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Work  $work
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if(User::checkPermission('work.edit') == true) {
            $visas = Visa::all();
            $work_info = Work::find($id);
            return view('pages.work.edit', compact('visas', 'work_info'));
        }
        else {
            return Redirect()->back()->with('error', 'Sorry you have not permission!');
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Work  $work
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $output = '';
        if(User::checkPermission('work.edit') == true) {
            $visa_id = $request->visa_id;
            $agent_id = $request->agent_id;
            $country_id = $request->country_id;
            $passport_id = $request->passport_id;
            $work_id = $request->work_id;

            if(!is_null($work_id)) {

                $visa_info = Visa::find($visa_id);
                $agent_info = Agents::find($agent_id);
                $country_info = Country::find($country_id);
                $passport_info = Passport::find($passport_id);
    
                if(!is_null($visa_info) && !is_null($agent_info) && !is_null($country_info) && !is_null($passport_info)) {
                    $work = Work::find($work_id);
                    $work->passport_id = $passport_info->id;
                    $work->post = $request->post;
                    $work->country_id = $country_info->id;

                    if($visa_info->visa_id != $visa_id) {
                        $previsous_visa_info = Visa::find($work->visa_id);
                        $previsous_rest_number_of_visa = $previsous_visa_info->rest_number_of_visa;
                        $previsous_visa_info->rest_number_of_visa = $previsous_rest_number_of_visa + 1;
                        $previsous_visa_info->update();

                        $current_number_of_visa = $visa_info->rest_number_of_visa;
                        $now = $current_number_of_visa - 1;
                        $visa_info->rest_number_of_visa = $now;
                        $visa_info->update();
                    }
                    
                    $work->visa_id = $visa_info->id;
                    $work->code = $request->code;
                    $work->agent_id = $agent_info->id;
                    $work->package_price = $request->package_price;
                    $work->paid = $request->paid;
                    $work->due = $request->due;
                    $work->agent_commission = $request->agent_commission;
                    $work->agent_commission_paid = $request->agent_commission_paid;
                    $work->agent_commission_due = $request->agent_commission_due;
                    $work->note = $request->note;
                    $work->date = $request->date;
                    $work->user_id = Auth::user()->id;
                    $work->created_at = Carbon::now();
                    $work_status = $work->update();
                    $work_id = $work->id;
                    if($work_status) {
                        $output = [
                            'status' => 'yes',
                            'work_id' => $work_id,
                        ];
                        return Response($output);
                    }
                    else {
                        $output = [
                            'status' => 'no',
                            'reason' => 'Network Error!!!, Please Try Again.',
                        ];
                        return Response($output);
                    }
                }
                else {
                    $output = [
                        'status' => 'no',
                        'reason' => 'Some Info is missing, Please Check Again!!!',
                    ];
                    return Response($output);
                }
    
            }
            else {
                $output = [
                    'status' => 'no',
                    'reason' => 'Sorry Some Information is missing, please reload!',
                ];
                return Response($output);
            }

            

        }
        else {
            $output = [
                'status' => 'no',
                'reason' => 'Sorry you have no Permission to do this work!',
            ];
            return Response($output);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Work  $work
     * @return \Illuminate\Http\Response
     */
    public function destroy(Work $work)
    {
        //
    }

    public function update_status(Request $request, $id)
    {
        if(User::checkPermission('work.edit.status') == true) {
            $work_info = Work::find($id);
            if(!is_null($work_info)) {
                $work_info->is_active = $request->is_active;
                $work_info->status = $request->status;
                $work_info->update();
                return Redirect()->route('work.view', $work_info->id)->with('success', 'Update Work Status.');
            }
            else {
                return Redirect()->back()->with('error', 'Network Error!');
            }
        }
        else {
            return Redirect()->back()->with('error', 'Sorry you have not permission!');
        }
    }


}
