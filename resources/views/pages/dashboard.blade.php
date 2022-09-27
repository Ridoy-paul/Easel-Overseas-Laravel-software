@extends('cms.app')
@section('body_content')
@php
        $currency = ENV('DEFAULT_CURRENCY');
        $today = date("Y-m-d");
       
        $total_visa = DB::table('visas')->count('id');
        $active_visa = DB::table('visas')->where('rest_number_of_visa', '>', 0)->count('id');
        $total_agent = DB::table('agents')->count('id');

        $todays_income = DB::table('incomes')->whereDate('date', $today)->sum('amount');
        $current_month_income = DB::table('incomes')->whereYear('date', \Carbon\Carbon::now()->year)->whereMonth('date', \Carbon\Carbon::now()->month)->sum('amount');
        $current_year_income = DB::table('incomes')->whereYear('date', \Carbon\Carbon::now()->year)->sum('amount');

        $todays_expenses = DB::table('expenses')->whereDate('date', $today)->sum('amount');
        $current_month_expenses = DB::table('expenses')->whereYear('date', \Carbon\Carbon::now()->year)->whereMonth('date', \Carbon\Carbon::now()->month)->sum('amount');
        $current_year_expenses = DB::table('expenses')->whereYear('date', \Carbon\Carbon::now()->year)->sum('amount');

        
        $j = 0;
        $i = 0;

@endphp
<div class="content">
    <div class="row">
        <div class="col-md-8">
            <div class="row shadow rounded p-2 border">
                <div class="col-md-12">
                    <h4><b>Dashboard</b></h4>
                </div>
                <div class="col-12 col-md-4">
                    <div class="block block-rounded d-flex flex-column border border-primary">
                        <div
                            class="block-content block-content-full flex-grow-1 d-flex justify-content-between align-items-center">
                            <dl class="mb-0">
                                <dt class="font-size-h5 font-w700">{{$total_visa}}</dt>
                                <dd class="text-muted mb-0"><a href="javascript:void(0)">Total Visa</a></dd>
                            </dl>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-md-4">
                    <div class="block block-rounded d-flex flex-column border border-primary">
                        <div class="block-content block-content-full flex-grow-1 d-flex justify-content-between align-items-center">
                            <dl class="mb-0">
                                <dt class="font-size-h5 font-w700">{{$active_visa}}</dt>
                                <dd class="text-muted mb-0"><a href="javascript:void(0)">Active Visa</a></dd>
                            </dl>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-md-4">
                    <div class="block block-rounded d-flex flex-column border border-primary">
                        <div class="block-content block-content-full flex-grow-1 d-flex justify-content-between align-items-center">
                            <dl class="mb-0">
                                <dt class="font-size-h5 font-w700">{{$total_agent}}</dt>
                                <dd class="text-muted mb-0"><a href="javascript:void(0)">Total Agent</a></dd>
                            </dl>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-md-4">
                    <div class="block block-rounded d-flex flex-column border border-primary">
                        <div class="block-content block-content-full flex-grow-1 d-flex justify-content-between align-items-center">
                            <dl class="mb-0">
                                <dt class="font-size-h5 font-w700">{{number_format($todays_income, 2)}}</dt>
                                <dd class="text-muted mb-0"><a href="javascript:void(0)">Today's Income</a></dd>
                            </dl>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-md-4">
                    <div class="block block-rounded d-flex flex-column border border-primary">
                        <div class="block-content block-content-full flex-grow-1 d-flex justify-content-between align-items-center">
                            <dl class="mb-0">
                                <dt class="font-size-h5 font-w700">{{number_format($current_month_income, 2)}}</dt>
                                <dd class="text-muted mb-0"><a href="javascript:void(0)">This Month Income</a></dd>
                            </dl>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-md-4">
                    <div class="block block-rounded d-flex flex-column border border-primary">
                        <div class="block-content block-content-full flex-grow-1 d-flex justify-content-between align-items-center">
                            <dl class="mb-0">
                                <dt class="font-size-h5 font-w700">{{number_format($current_year_income, 2)}}</dt>
                                <dd class="text-muted mb-0"><a href="javascript:void(0)">This Year Income</a></dd>
                            </dl>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-md-4">
                    <div class="block block-rounded d-flex flex-column border border-primary">
                        <div class="block-content block-content-full flex-grow-1 d-flex justify-content-between align-items-center">
                            <dl class="mb-0">
                                <dt class="font-size-h5 font-w700">{{number_format($todays_expenses, 2)}}</dt>
                                <dd class="text-muted mb-0"><a href="javascript:void(0)">Today's Expenses</a></dd>
                            </dl>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-md-4">
                    <div class="block block-rounded d-flex flex-column border border-primary">
                        <div class="block-content block-content-full flex-grow-1 d-flex justify-content-between align-items-center">
                            <dl class="mb-0">
                                <dt class="font-size-h5 font-w700">{{number_format($current_month_expenses, 2)}}</dt>
                                <dd class="text-muted mb-0"><a href="javascript:void(0)">This Month Expenses</a></dd>
                            </dl>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-md-4">
                    <div class="block block-rounded d-flex flex-column border border-primary">
                        <div class="block-content block-content-full flex-grow-1 d-flex justify-content-between align-items-center">
                            <dl class="mb-0">
                                <dt class="font-size-h5 font-w700">{{number_format($current_year_expenses, 2)}}</dt>
                                <dd class="text-muted mb-0"><a href="javascript:void(0)">This Year Expenses</a></dd>
                            </dl>
                        </div>
                    </div>
                </div>
                
                
            </div>
            
        </div>
        <div class="col-md-4 mb-3">
            <div class="card">
                <div class="card-header text-light bg-dark text-center">
                    <h2 style="font-weight: bold; color: #fff;">Cash In</h2>
                    <p class="border p-2 rounded">Last 7 Days</p>
                </div>
                <div class="card-body">
                    @while($i < 7) 
                        @php( $date = date('Y-m-d', strtotime('-'.$i.' days')))
                        @php( $income = DB::table('incomes')->where('date', $date)->sum('amount'))
                        <div class="row border-bottom mb-2">
                            <div class="col-md-6 col-6 text-center"><h6>{{date('d M, Y', strtotime($date))}}</h6></div>
                            <div class="col-md-6 col-6 text-center"><h6>{{$income." ".$currency}}</h6></div>
                        </div>
                        @php($i++)
                    @endwhile
                </div>
            </div>
        </div>
    </div>
    <br>
    <div class="row">
        <!--<div class="col-xl-12 d-flex flex-column">-->
        <!--    <div class="block block-rounded flex-grow-1 d-flex flex-column">-->
        <!--        <div class="block-header block-header-default">-->
        <!--            <h3 class="block-title">Monthley Income & Expense Of 2022</h3>-->
        <!--        </div>-->
        <!--        <div class="block-content block-content-full flex-grow-1 d-flex align-items-center">-->
        <!--            <canvas class="js-chartjs-earnings"></canvas>-->

        <!--             <canvas id="canvas" height="280" width="600"></canvas>-->
        <!--        </div>-->

        <!--    </div>-->
        <!--</div>-->
    </div>
</div>

@endsection
