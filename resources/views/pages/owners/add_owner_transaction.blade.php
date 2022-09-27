@extends('cms.app')
@section('body_content')
<style>
    
</style>

<!-- Page Content -->
<form action="{{route('owners.withdraw.balance.confirm')}}" method="post">
@csrf
<div class="p-2">
    <div class="block block-rounded">
        <div class="block-content">
            <div class="row" id="search_capital_person">
                <div class="col-md-3"><h4 class="text-primary"><b>Withdraw Balance</b></h4></div>
                <div class="col-md-6">
                    <div class="form-group shadow rounded p-3">
                    <label for=""> <span class="text-danger">*</span> Select Owners</label>
                        <select class="form-control" id="" onchange="select_owner(this)">
                            <option value="0">Select Owner</option>
                            @foreach($owners as $owner)
                            <option value="{{$owner->name}},{{$owner->id}},{{$owner->phone}}">{{$owner->name}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
            </div>
            <div class="row" id="capital_person_body" style="display: none;">
                <div class="col-md-8">
                    <div class="form-group pl-1 pr-1" id="submit_button">
                    <h4 class="text-muted"><b>Withdraw Balance =></b></h4>
                        <div class="form-group row">
                            <label for="inputName" class="col-sm-4 col-form-label"><span class="text-danger">*</span>Amount</label>
                            <div class="col-sm-8">
                                <input type="number" step=any class="form-control" required id="cash_received" name="amount">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="inputName" class="col-sm-4 col-form-label"><span class="text-danger">*</span>Date</label>
                            <div class="col-sm-8">
                                <input type="date" name="date" class="form-control" value='{{date("Y-m-d")}}' id="">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="inputName" class="col-sm-4 col-form-label"><span class="text-danger">*</span>Note</label>
                            <div class="col-sm-8">
                            <textarea name="note" id="" cols="30" rows="3" class="form-control"></textarea>
                            </div>
                        </div>
                        <div class="form-group text-right">
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 p-3">
                    <div class="lender_info rounded shadow p-3">
                        <div class="block block-rounded">
                            <div class="block-header block-header-default bg-dark">
                                <h3 class="block-title text-light">
                                    <i class="far fa-user-circle text-muted mr-1"></i> Business Owners Info
                                </h3>
                            </div>
                            <div class="block-content">
                            <div class="media d-flex align-items-center push">
                                    <div class="mr-3"><b>Name: </b> <span id="capital_person_name"></span></div>
                                </div>
                                <div class="media d-flex align-items-center push">
                                    <div class="mr-3"><b>Phone: </b> <span id="capital_person_phone"></span></div>
                                </div>
                                    <input type="hidden" name="owner_id" id="capital_person_id" value="">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
        </div>
    </div>
    <!-- END Full Table -->
</div>
</form>
<!-- END Page Content -->

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" crossorigin="anonymous"
    referrerpolicy="no-referrer"></script>

<script>

    function select_owner(code) {
        var info = code.value;
        if (info != 0) {
            var sub_info = info.split(',');
            var name = sub_info[0];
            var id = sub_info[1];
            var phone = sub_info[2];
            
            $("#search_capital_person").hide();
            $("#capital_person_body").show();
            $('#capital_person_name').html(name);
            $('#capital_person_phone').html(phone);
            $('#capital_person_id').val(id);
       
        }
    }

    

    $("form").bind("keypress", function (e) {
        if (e.keyCode == 13) {
            return false;
        }
    });

</script>
<!--This Script for show and hide cash or Cheque in Received End-->

@endsection
