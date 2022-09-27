@extends('cms.app')
@section('body_content')
<!-- Page Content -->
<div class="content">
    <!-- Overview -->
    <div class="row">
    <div class="col-sm-12 col-xl-12 col-md-12">
            <!-- Pending Orders -->
            <div class="block block-rounded">
                <div class="block-content">
                    <div class="row" id="lender_body">
                        <div class="col-md-8">
                            <!-- loan paid div Start -->
                            <div class="row p-1" id="loan_paid_div">
                            <div class="col-md-12 p-3 shadow rounded">
                                    <h4 class="text-muted"><b>Work Info:</b></h4>
                                    <div class="lender_info rounded shadow">
                                        <div class="block block-rounded">
                                            <div class="block-header block-header-default bg-dark">
                                                <h3 class="block-title text-light">Visa Info & Package Info:</h3>
                                            </div>
                                            <div class="block-content text-muted text-justify">
                                                <h6>
                                                    <b class="text-success">Country:</b> {{$work_info->visa_info->country->name}}<br>
                                                    <b class="text-success">Visa:</b> {{$work_info->visa_info->visa_title}}<br>
                                                    <b class="text-success">Company Name:</b> {{$work_info->visa_info->company_name}}<br>
                                                    <b class="text-success">Package Price:</b> {{$work_info->package_price}}<br>
                                                    <b class="text-success">Agent Commission:</b> {{$work_info->agent_commission}}<br>
                                                </h6>
                                                <div class="mb-3">
                                                    <small class="text-danger">Note: {{$work_info->note}}</small>
                                                </div>
                                                
                                            </div>
                                        </div>
                                    </div>

                                    <div class="lender_info rounded shadow">
                                <div class="block block-rounded">
                                    <div class="block-header block-header-default bg-dark">
                                        <h3 class="block-title text-light">Passport Info</h3>
                                    </div>
                                    <div class="block-content text-muted text-justify">
                                        <p style="font-size: 15px;">
                                            <b class="text-success">Name:</b> {{$work_info->passport_info->name}}<br>
                                            <b class="text-success">Phone:</b> {{$work_info->passport_info->phone}}<br>
                                            <b class="text-success">Address:</b> {{$work_info->passport_info->address}}<br>    
                                            <b class="text-success">Passport_Number:</b> {{$work_info->passport_info->passport_number}}<br>  
                                            <b class="text-success">Note:</b> {{$work_info->passport_info->note}}<br>  
                                        </p>
                                    </div>
                                </div>
                            </div>
                            <div class="lender_info rounded shadow">
                                <div class="block block-rounded">
                                    <div class="block-header block-header-default bg-dark">
                                        <h3 class="block-title text-light">Agent Info</h3>
                                    </div>
                                    <div class="block-content text-muted text-justify">
                                        <p style="font-size: 15px;">
                                            <b class="text-success">Name:</b> {{$work_info->agent_info->name}}<br>
                                            <b class="text-success">Phone:</b> {{$work_info->agent_info->phone}}<br>
                                            <b class="text-success">Address:</b> {{$work_info->agent_info->address}}<br>    
                                        </p>
                                    </div>
                                </div>
                            </div>

                                    
                        </div>
                    </div>
                </div>
                        <div class="col-md-4 p-1">
                            <div class="lender_info rounded shadow">
                                <div class="block block-rounded">
                                    <div class="block-header block-header-default bg-success">
                                        <h3 class="block-title text-light">Status</h3>
                                    </div>
                                    <div class="block-content text-muted">
                                        <form action="{{route('work.update.status', $work_info->id)}}" method="POST">
                                            @csrf
                                        <div class="form-group">
                                                <label for="example-text-input-alt"><span class="text-danger">*</span>Change Active Status</label>
                                                <select name="is_active" id="" class="form-control" required>
                                                    <option value="">-- Select --</option>
                                                    <option @if($work_info->is_active == 1) selected class="text-light bg-success" @endif value="1">Active</option>
                                                    <option @if($work_info->is_active == 0) selected class="text-light bg-success" @endif value="0">Rejected</option>
                                                </select>
                                                <small class="text-danger"><b>Current Active Status:</b>  {!! $work_info->is_rejected == 1? '<span class="badge badge-danger">Rejected</span>' : '<span class="badge badge-success">Active</span>' !!}</small>
                                            </div>

                                            <div class="form-group">
                                                <label for="example-text-input-alt"><span class="text-danger">*</span>Change State Status</label>
                                                <select name="status" id="" class="form-control" required>
                                                    <option value="">-- Select --</option>
                                                    <option @if($work_info->status == 'start') selected class="text-light bg-success" @endif value="start">Start</option>
                                                    <option @if($work_info->status == 'interview/application') selected class="text-light bg-success" @endif value="interview/application">Interview/Application</option>
                                                    <option @if($work_info->status == 'visa') selected class="text-light bg-success" @endif value="visa">Visa</option>
                                                    <option @if($work_info->status == 'visa stamping') selected class="text-light bg-success" @endif value="visa stamping">Visa Stamping</option>
                                                    <option @if($work_info->status == 'police clearance') selected class="text-light bg-success" @endif value="police clearance">Police Clearance</option>
                                                    <option @if($work_info->status == 'medical') selected class="text-light bg-success" @endif value="medical">Medical</option>
                                                    <option @if($work_info->status == 'man power') selected class="text-light bg-success" @endif value="man power">Man Power</option>
                                                    <option @if($work_info->status == 'air ticket') selected class="text-light bg-success" @endif value="air ticket">Air Ticket</option>                                                    
                                                </select>
                                                <small class="text-danger"><b>Current State Status:</b> <span class="badge badge-success">{{$work_info->status}}</span></small>
                                            </div>
                                            
                                            <div class="form-group text-right">
                                                <button type="submit" class="btn btn-success ">Update</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            <div class="lender_info rounded shadow">
                                <div class="block block-rounded">
                                    <div class="block-header block-header-default">
                                        <h3 class="block-title">Cash Summery</h3>
                                    </div>
                                    <div class="block-content text-muted">
                                        <p>
                                            <b>Cash In: </b> {{App\Models\Work::client_paid($work_info->id, $work_info->passport_id)->sum('amount')}}<br>
                                            <b>Agent Paid: </b> {{App\Models\Work::agent_comission_paid($work_info->id, $work_info->agent_id)->sum('amount')}}<br>
                                            <b>Client Expenses: </b> {{App\Models\Work::client_expenses($work_info->id, $work_info->passport_id)->sum('amount')}}<br>
                                        </p>
                                    </div>
                                </div>
                            </div>
                            
                        </div>
                        <div class="col-md-12 mt-3">
                            <div class="lender_info rounded shadow">
                                <div class="block block-rounded">
                                    <div class="block-header block-header-default bg-dark">
                                        <h3 class="block-title text-light">Client Cash In Summery</h3>
                                    </div>
                                    <div class="block-content text-muted text-justify">
                                    <table class="table table-striped table-sm">
                                        <thead>
                                            <tr>
                                                <th scope="col">Date</th>
                                                <th scope="col">Amount</th>
                                                <th scope="col">Note</th>
                                                <th scope="col">Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach(App\Models\Work::client_paid($work_info->id, $work_info->passport_id) as $cash_in)
                                            <tr>
                                                <td>{{date("d M, Y", strtotime($cash_in->date))}}</td>
                                                <td>{{$cash_in->amount}}</td>
                                                <td>{{$cash_in->note}}</td>
                                                <td><a type="button" target="_blank" href="{{route('income.voucher', $cash_in->id)}}" class="btn btn-success btn-sm btn-rounded">View</a></td>
                                            </tr>
                                            @endforeach
                                            
                                        </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12 mt-3">
                            <div class="lender_info rounded shadow">
                                <div class="block block-rounded">
                                    <div class="block-header block-header-default bg-dark">
                                        <h3 class="block-title text-light">Agent Commission Paid Summery</h3>
                                    </div>
                                    <div class="block-content text-muted text-justify">
                                    <table class="table table-striped table-sm">
                                        <thead>
                                            <tr>
                                                <th scope="col">Date</th>
                                                <th scope="col">Amount</th>
                                                <th width="20%">Note</th>
                                                <th scope="col">Voucher</th>
                                                <th scope="col">Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach(App\Models\Work::agent_comission_paid($work_info->id, $work_info->agent_id) as $paid)
                                            <tr>
                                                <td>{{date("d M, Y", strtotime($paid->date))}}</td>
                                                <td>{{$paid->amount}}</td>
                                                <td>{{$paid->note}}</td>
                                                <td>{{$paid->voucher_number}}</td>
                                                <td><a type="button" target="_blank" href="{{route('expense.voucher', $paid->id)}}" class="btn btn-info btn-sm btn-rounded">View</a></td>
                                            </tr>
                                            @endforeach
                                        </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                    </div>
                    
                </div>
            </div>
        </div>
    </div>
    <!-- END Overview -->
</div>
<!-- END Page Content -->
@endsection
