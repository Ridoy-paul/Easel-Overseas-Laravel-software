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
                                <h4 class="text-muted"><b>Agent Report:</b></h4>
                                <div class="lender_info rounded shadow">
                                    <div class="block block-rounded">
                                        <div class="block-header block-header-default bg-dark">
                                            <h3 class="block-title text-light">Agent Profile Info:</h3>
                                        </div>
                                        <div class="block-content text-muted text-justify">
                                            <h6>
                                                <b class="text-success">Name:</b> {{$agent_info->name}}<br>
                                                <b class="text-success">Phone:</b> {{$agent_info->phone}}<br>
                                                <b class="text-success">Address</b> {{optional($agent_info)->address}}
                                            </h6>
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
                                        <h3 class="block-title text-light">Total Paid</h3>
                                    </div>
                                    <div class="block-content text-muted text-center">
                                        <div><h3 class="bg-primary p-1 text-light rounded"><b>{{$expenses_data->sum('amount')}}</b></h3></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12 mt-3">
                            <div class="lender_info rounded shadow">
                                <div class="block block-rounded">
                                    <div class="block-header block-header-default bg-dark">
                                        <h3 class="block-title text-light">Agent Work Info</h3>
                                    </div>
                                    <div class="block-content text-muted text-justify">
                                    <table class="table table-bordered table-sm">
                                        <thead>
                                            <tr>
                                                <th scope="col">Date</th>
                                                <th scope="col">Commission Info</th>
                                                <th scope="col">Passport Info</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach(App\Models\Work::where('agent_id', $agent_info->id)->get() as $data)
                                            <tr>
                                                <td>{{date("d-m-Y", strtotime($data->date))}}</td>
                                                <td>
                                                    <b>Commission:</b> {{$data->agent_commission}}<br>
                                                    <b>Commission Paid:</b> {{$data->agent_commission_paid}}<br>
                                                    <b>Commission Due:</b> {{$data->agent_commission_due}}<br>
                                                </td>
                                                <td width="40%">
                                                    <b>Name:</b> {{$data->passport_info->name}}<br>
                                                    <b>Phone:</b> {{$data->passport_info->phone}}<br>
                                                    <b>Work Code:</b> {{$data->code}}<br>
                                                    <small class="text-success">Passport Num. {{$data->passport_info->passport_number}}</small>
                                                </td>
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
                                        <h3 class="block-title text-light">Agent Expenses Data</h3>
                                    </div>
                                    <div class="block-content text-muted text-justify">
                                    <table class="table table-bordered table-sm">
                                        <thead>
                                            <tr>
                                                <th scope="col">Date</th>
                                                <th scope="col">Amount</th>
                                                <th scope="col">Voucher Number</th>
                                                <th scope="col">Work Info</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($expenses_data as $expense)
                                            <tr>
                                                <td>{{date("d-m-Y", strtotime($expense->date))}}</td>
                                                <td>{{$expense->amount}}</td>
                                                <td>{{$expense->voucher_number}}</td>
                                                <td width="50%">
                                                    <b>Name:</b> {{$expense->work_info->passport_info->name}}<br>
                                                    <b>Phone:</b> {{$expense->work_info->passport_info->phone}}<br>
                                                    <b>Work Code:</b> {{$expense->work_info->code}}<br>
                                                    <small class="text-success">Passport Num. {{$expense->work_info->passport_info->passport_number}}</small>
                                                </td>
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
