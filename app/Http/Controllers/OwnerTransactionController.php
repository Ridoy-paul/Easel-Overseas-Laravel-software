<?php

namespace App\Http\Controllers;

use App\Models\OwnerTransaction;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Carbon;
use App\Models\Owners;
use DataTables;

class OwnerTransactionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(User::checkPermission('passport.view') == true) {
            return view('pages.owners.owner_transactions');
        }
        else {
            return Redirect()->back()->with('error', 'Sorry you have not permission!');
        }
    }

    public function index_data(Request $request)
    {
        if ($request->ajax()) {
            $data = OwnerTransaction::orderBy('id', 'desc')->get();
            return Datatables::of($data)
                ->addIndexColumn()
                ->addColumn('owners_info', function($row){
                    return $row->owners_info->name."[".$row->owners_info->phone."]";
                })
                ->addColumn('date', function($row){
                    return date('d-m-Y', strtotime($row->date)).'<br><span type="button" onclick="delete_ot('.$row->id.')" data-toggle="modal" data-target="#exampleModal" class="badge badge-danger">delete</span>';
                })
                ->rawColumns(['owners_info', 'date'])
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
        if(User::checkPermission('owners.transaction.create') == true){
            $owners  = Owners::all();
            return view('pages.owners.add_owner_transaction', compact('owners'));
        }
        else {
            return Redirect()->back()->with('error', 'Sorry you can not access this page');
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
        if(User::checkPermission('owners.transaction.create') == true){
            $owners_info = Owners::find($request->owner_id);
            if(!is_null($owners_info)) {
                $ownerTransaction = new OwnerTransaction;
                $ownerTransaction->owner_id = $owners_info->id;
                $ownerTransaction->add_or_withdraw = 'withdraw';
                $ownerTransaction->amount = $request->amount;
                $ownerTransaction->date = $request->date;
                $ownerTransaction->note = $request->note;
                $ownerTransaction->created_at = Carbon::now();
                $ownerTransaction->save();
                return Redirect()->route('owners.transactions.index')->with('success', 'Successfully Withdraw Balance.');
                
            }
            else {
                return Redirect()->back()->with('error', 'Owners info not found!!!');
            }
        }
        else {
            return Redirect()->back()->with('error', 'Sorry you can not access this page');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\OwnerTransaction  $ownerTransaction
     * @return \Illuminate\Http\Response
     */
    public function show(OwnerTransaction $ownerTransaction)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\OwnerTransaction  $ownerTransaction
     * @return \Illuminate\Http\Response
     */
    public function edit(OwnerTransaction $ownerTransaction)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\OwnerTransaction  $ownerTransaction
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, OwnerTransaction $ownerTransaction)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\OwnerTransaction  $ownerTransaction
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        if(User::checkPermission('owners.transaction.delete') == true) {
            $id = $request->ot_id;
            $info = OwnerTransaction::find($id);
            if(!is_null($info)) {
                $status = $info->delete();
                if($status) {
                    return Redirect()->back()->with('success', 'Owner Transaction Deleted Successfully.');
                }
                else {
                    return Redirect()->back()->with('error', 'Network Error!');
                }
            }
            else {
                return Redirect()->back()->with('error', 'Owner Transaction Not Found!');
            }
        }
        else {
            return Redirect()->back()->with('error', 'Sorry you have not permission!');
        }
    }
}
