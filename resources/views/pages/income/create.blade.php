@extends('cms.app')
@section('body_content')
<style>
    #result {
        height: 450px;
        overflow: auto;
        overflow-x: hidden;
    }

    #product_text {
        font-size: 12px;
        cursor: cell;
        text-align: left;
        border: 1px solid #CCCCCC;
        border-radius: 7px;
        background-color: #fff;
    }

    img {
        width: 50px;
    }

    #courser {
        cursor: cell;
    }

    .card-subtitle {
        font-size: 12px;
    }

</style>


<!-- Page Content -->
<div class="p-2">
    <div class="block block-rounded">
        <div class="block-content">
            <div class="p3">
                <h4 class="text-primary"><b>Add Income</b></h4>
            </div>
            @if(empty(optional($work_info)->id))
            <div class="row">
                <div class="col-md-2"></div>
                <div class="col-md-8">
                    <div class="form-group shadow rounded p-3">
                        <input type="text" class="form-control" id="work_info" placeholder="Search by Passport User info (Name, Phone, Passport Number) or Work Code" name="work_info">
                    </div>
                </div>
                <div class="col-md-2 text-center">

                </div>
                <div class="col-md-12">
                    <div class="pl-4 pr-4 pb-2">
                        <div class="card-body shadow rounded" id="search_output"></div>
                    </div>

                </div>
            </div>
            @else
            @php
                $passport_info = $work_info->passport_info;

            @endphp
            <div class="row">
                <div class="col-md-8">
                    <div class="row shadow">
                        <div class="col-md-12">
                            <form class="form-horizontal" style="padding: 30px;" action="{{route('income.store')}}" method="POST">
                                @csrf
                                <div class="form-group row">
                                    <label for="inputName" class="col-sm-4 col-form-label">Due Balance</label>
                                    <div class="col-sm-8">
                                        <input type="text" class="form-control" id="" name="" value="{{$work_info->due}}" readonly>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="inputName" class="col-sm-4 col-form-label">Paid</label>
                                    <div class="col-sm-8">
                                        <input type="number" step=any class="form-control" id="amount" name="amount" required max="{{$work_info->balance}}">
                                    </div>
                                </div>
                                
                                <input type="hidden" class="form-control" name="work_id" value="{{$work_info->id}}">
                                <input type="hidden" class="form-control" name="passport_id" value="{{$passport_info->id}}">
                                
                                <div class="form-group row">
                                    <label for="inputName" class="col-sm-4 col-form-label">Date</label>
                                    <div class="col-sm-8">
                                        <input type="date" class="form-control" name="date" value="{{date('Y-m-d')}}">
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="inputName" class="col-sm-4 col-form-label">Note</label>
                                    <div class="col-sm-8">
                                        <textarea id="" class="form-control" name="note" rows="4" cols="50"></textarea>
                                    </div>
                                </div>
                                <div class="text-right">
                                    <input type="submit" name="receivedCorC"  value="Confirm" class="btn btn-info">
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 pr-4 pl-4 pb-4">
                <div class="lender_info rounded shadow p-3">
                    <div class="block block-rounded">
                            <div class="block-header block-header-default">
                                <h3 class="block-title">
                                    <i class="far fa-user-circle text-muted mr-1"></i> Passport User Info
                                </h3>
                            </div>
                            <div class="block-content">
                            <div class="media d-flex align-items-center mb-2">
                                    <div class="mr-3"><b>Name: </b> <span id="lender_name">{{$passport_info->name}}</span></div>
                                </div>
                                <div class="media d-flex align-items-center mb-2">
                                    <div class="mr-3"><b>Phone: </b> <span id="lender_phone">{{$passport_info->phone}}</span></div>
                                </div>
                                <div class="media d-flex align-items-center mb-2">
                                    <div class="mr-3"><b>Address: </b> <span id="lender_phone">{{$passport_info->address}}</span></div>
                                </div>

                                <div class="media d-flex align-items-center mb-2">
                                    <div class="mr-3"><b>Passport: </b> <span id="lender_phone">{{$passport_info->passport_number}}</span></div>
                                </div>
                                <div class="media d-flex align-items-center mb-2">
                                    <div class="mr-3"><b>Package Price: </b> <span id="lender_phone">{{number_format($work_info->package_price, 2)}}</span></div>
                                </div>
                                <div class="media d-flex align-items-center mb-2">
                                    <div class="mr-3"><b>Due: </b> <span id="lender_balance">{{number_format($work_info->due, 2)}}</span></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                </div>
                
            </div>
            @endif
        </div>
    </div>
    <!-- END Full Table -->
</div>
<!-- END Page Content -->

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" crossorigin="anonymous"
    referrerpolicy="no-referrer"></script>


<script>
    // Begin:: Customer Search for stock in
    $('#work_info').keyup(function () {
        var work_info = $(this).val();
        $.ajax({
            type: 'get',
            url: '/income/search_work_data',
            data: {
                'work_info': work_info
            },
            success: function (data) {
                $('#search_output').html(data);
            }
        });
    });
    // End:: Customer Search for stock in

</script>


<!--This Script for show and hide cash or Cheque in Received Start-->
<script>
    $(document).ready(function () {
        $("input[type='radio']").change(function () {
            if ($(this).val() == "cash") {
                $("#cashForm").show();
                $("#checkForm").hide();
                $("#amountTkforCash").prop('required',true);
                $("#selectBank").prop('required',false);
                $("#amountTkForCheck").prop('required',false);
                
            }
            else if ($(this).val() == "cheque") {
                $("#cashForm").hide();
                $("#checkForm").show();
                $("#amountTkforCash").prop('required',false);
                $("#selectBank").prop('required',true);
                $("#amountTkForCheck").prop('required',true);
            }
        });
    });

</script>
<script>

    $("form").bind("keypress", function (e) {
        if (e.keyCode == 13) {
            return false;
        }
    });

</script>
<!--This Script for show and hide cash or Cheque in Received End-->

@endsection
