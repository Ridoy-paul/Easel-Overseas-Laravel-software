<?php

namespace App\Http\Controllers;

use App\Models\Agents;
use App\Models\Expenses;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
use Image;
use DataTables;


class AgentsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(User::checkPermission('agents.view') == true) {
            return view('pages.agents.index');
        }
        else {
            return Redirect()->back()->with('error', 'Sorry you have not permission!');
        }
    }

    public function agent_data(Request $request)
    {
        if ($request->ajax()) {
            $data = Agents::orderBy('id', 'desc')->get();
            return Datatables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function($row){
                    return '<a type="button" href="'.route('agent.edit', $row->id).'" class="btn btn-info btn-sm">Edit</a> <a type="button" href="'.route('agent.report', $row->id).'" class="btn btn-success btn-sm">Report</a>';
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
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if(User::checkPermission('agents.create') == true) {
            $validated = $request->validate([
                'phone' => 'required|unique:agents',
            ]);
    
            $agent = new Agents;
            $agent->name = $request->name;
            $agent->phone = $request->phone;
            $agent->address = $request->address;
            $agent->balance = 0;
            $agent->user_id = Auth::user()->id;
            $agent->save();
            return redirect()->back()->with('success', 'New Agent Added Successfully');
        }
        else {
            return Redirect()->back()->with('error', 'Sorry you have not permission!');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Agents  $agents
     * @return \Illuminate\Http\Response
     */
    public function show(Agents $agents)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Agents  $agents
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if(User::checkPermission('agents.edit') == true) {
            $agent = Agents::where('id', $id)->first();
            return view('pages.agents.edit', compact('agent'));

        }
        else {
            return Redirect()->back()->with('error', 'Sorry you have not permission!');
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Agents  $agents
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        if(User::checkPermission('agents.edit') == true) {
            $agent = Agents::where('id', $id)->first();
            $validated = $request->validate([
                'phone' => 'required|unique:agents,phone,'.$agent->id,
            ]);

            $agent->name = $request->name;
            $agent->phone = $request->phone;
            $agent->address = $request->address;
            $agent->update();
            
            return Redirect()->route('agent.index')->with('success', 'Passport info Updated Successfully.');
        }
        else {
            return Redirect()->back()->with('error', 'Sorry you have not permission!');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Agents  $agents
     * @return \Illuminate\Http\Response
     */
    public function destroy(Agents $agents)
    {
        //
    }

    public function report($id) {
        if(User::checkPermission('agents.report') == true) {
            $agent_info = Agents::where('id', $id)->first();
            $expenses_data = Expenses::where('agent_id', $agent_info->id)->orderBy('id', 'DESC')->get();
            return view('pages.agents.report', compact('agent_info', 'expenses_data'));

        }
        else {
            return Redirect()->back()->with('error', 'Sorry you have not permission!');
        }
    }


}
