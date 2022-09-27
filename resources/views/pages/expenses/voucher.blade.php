@extends('cms.app')
@section('body_content')
<!-- Page Content -->
<style>
    @media  print {
        .hidden-print,
        .hidden-print * {
            display: none !important;
        }
    }

</style>

@php 
$currency = ENV('DEFAULT_CURRENCY');

$main_info = '';

if($info->for_whom == 'c') {
    $main_info = '<p style="font-size: 18px; font-family: Helvetica;"><b>Client Name:</b> '.$info->passport_info->name.'<b> Phone:</b> '.$info->passport_info->phone.'<b> Work Code:</b> '.$info->work_info->code.'</p>';
}
elseif($info->for_whom == 'a') {
    $main_info = '<p  style="font-size: 18px; font-family: Helvetica;"><b>Agent Name:</b> '.$info->agent_info->name.'<b> Phone:</b> '.$info->agent_info->phone.'<b> Work Code:</b> '.$info->work_info->code.'</p>';
}
elseif($info->for_whom == 'o') {
    $main_info = '<p  style="font-size: 18px; font-family: Helvetica;">Office Expense [<b>Category:</b> '.$info->category_info->title.']</p>';
}

@endphp
<div class="p-2">
    <div class="block block-rounded">
        <div class="block-content">
        <div class="container-fluid">
        <div class="row">
          <div class="col-12" style="padding: 0px 30px;">
            <!-- /.card -->
                <div class="card" style="border: 2px solid black">
                  <div class="card-header text-center">
                    <div class="row">
                        <div class="col-md-3 text-right">
                            <img style="width: 200px;" class="card-img-top" src="{{asset(optional($bussiness_settings)->logo)}}" >
                        </div>
                        <div class="col-md-6">
                            <h2 class="text-center "><b>{{optional($bussiness_settings)->company_name}}</b></h2>
                            <p class="text-center">{{optional($bussiness_settings)->address}}<br>Cell : {{optional($bussiness_settings)->phone}}</p>
                        </div>
                        <div class="col-md-3">
                            <h4><b>Expenses Voucher</b></h4>
                               <div class="btn-group btn-group-toggle" data-toggle="buttons">
                                  <label class="btn btn-secondary active">
                                    <input type="radio" name="options" id="option1" autocomplete="off" checked> Debit
                                  </label>
                                  <label class="btn btn-secondary">
                                    <input type="radio" name="options" id="option2" autocomplete="off"> Voucher
                                  </label>
                                  <label class="btn btn-secondary">
                                    <input type="radio" name="options" id="option3" autocomplete="off"> 
                                  </label>
                                </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4 text-left">
                            <p class="" style="margin-top: 20px; font-size: 20px; font-weight: bold;">Voucher #EXP/{{optional($info)->id}}</p>
                        </div>
                        <div class="col-md-4">
                            <button type="button" style="margin-top: 10px;" class="btn btn-outline-dark"><h5><b>Expenses Voucher</b></h5></button>
                        </div>
                        <div class="col-md-4">
                            <p class="" style="margin-top: 20px; font-size: 20px;">Date. <?php echo date("d M, Y", strtotime($info->date)); ?></p>
                        </div>
                    </div>
                  </div>
                  <div class="card-body">
                    <div class="row" id="homeBack">
                        <div class="col-md-12">
                            {!!$main_info!!}
                            <p  style="font-size: 18px; font-family: Helvetica;"><b>Received With Thanks From Mr. / Mrs. </b>{{optional($info->passport_info)->name}}<br>
                               <span style="font-size: 15px;"><b>Address: </b>{{optional($info->passport_info)->address}}<b>, Phone:</b> {{optional($info->passport_info)->phone}}<br><b>Passport Number:</b> {{optional($info->passport_info)->passport_number}}
                               </span></p>
                                <div style="padding: 0px 90px;">
                                    <table class="table table-bordered">
                                      <tbody>
                                        <tr>
                                          <td><b>Amount</b></td>
                                          <td>{{$currency}} {{number_format(optional($info)->amount, 2)}}</td>
                                        </tr>
                                      </tbody>
                                    </table>
                                </div>
                        </div>
                    </div>
                  </div>
                  <div class="card-footer">
                    <div class="row text-center">
                        <div class="col-md-6">
                            <p style="padding-top: 15px;">
                                <b>...........................................</b><br>
                                Authorized Signature</p>
                        </div>
                        <div class="col-md-6" >
                           <p style="padding-top: 15px;"><b>...........................................</b><br>
                                Clients Signature</p>
                        </div>
                    </div>
                  </div>
                </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
        </div>
        <br />
        <div class="row">
        <div class="col-12" style="padding: 0px 30px;">
            <!-- /.card -->
                <div class="card" style="border: 2px solid black">
                  <div class="card-header text-center">
                    <div class="row">
                        <div class="col-md-3 text-right">
                            <img style="width: 200px;" class="card-img-top" src="{{asset(optional($bussiness_settings)->logo)}}" >
                        </div>
                        <div class="col-md-6">
                            <h2 class="text-center "><b>{{optional($bussiness_settings)->company_name}}</b></h2>
                            <p class="text-center">{{optional($bussiness_settings)->address}}<br>Cell : {{optional($bussiness_settings)->phone}}</p>
                        </div>
                        <div class="col-md-3">
                            <h4><b>Expenses Voucher</b></h4>
                               <div class="btn-group btn-group-toggle" data-toggle="buttons">
                                  <label class="btn btn-secondary active">
                                    <input type="radio" name="options" id="option1" autocomplete="off" checked> Debit
                                  </label>
                                  <label class="btn btn-secondary">
                                    <input type="radio" name="options" id="option2" autocomplete="off"> Voucher
                                  </label>
                                  <label class="btn btn-secondary">
                                    <input type="radio" name="options" id="option3" autocomplete="off"> 
                                  </label>
                                </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4 text-left">
                            <p class="" style="margin-top: 20px; font-size: 20px; font-weight: bold;">Voucher #OV/{{$info->id}}/{{$info->amount_from_id}}</p>
                        </div>
                        <div class="col-md-4">
                            <button type="button" style="margin-top: 10px;" class="btn btn-outline-dark"><h5><b>Expenses Voucher</b></h5></button>
                        </div>
                        <div class="col-md-4">
                            <p class="" style="margin-top: 20px; font-size: 20px;">Date. <?php echo date("d M, Y", strtotime($info->date)); ?></p>
                        </div>
                    </div>
                  </div>
                  <div class="card-body">
                    <div class="row" id="homeBack">
                        <div class="col-md-12">
                            <p class=""  style="font-size: 18px; font-family: Helvetica;"><b>Received With Thanks From Mr. / Mrs. </b>{{optional($info->passport_info)->name}}<br>
                               <span style="font-size: 15px;"><b>Address: </b>{{optional($info->passport_info)->address}}<b>, Phone:</b> {{optional($info->passport_info)->phone}}<br><b>Passport Number:</b> {{optional($info->passport_info)->passport_number}}
                               </span></p>
                                <div style="padding: 0px 90px;">
                                    <table class="table table-bordered">
                                      <tbody>
                                        <tr>
                                          <td><b>Work Code</b></td>
                                          <td>{{optional($info->work_info)->code}}</td>
                                        </tr>
                                        <tr>
                                          <td><b>Paid Amount</b></td>
                                          <td>{{$currency}} {{number_format(optional($info)->amount, 2)}}</td>
                                        </tr>
                                      </tbody>
                                    </table>
                                </div>
                        </div>
                    </div>
                  </div>
                  
                  <div class="card-footer">
                    <div class="row text-center">
                        <div class="col-md-6">
                            <p style="padding-top: 15px;">
                                <b>...........................................</b><br>
                                Authorized Signature</p>
                        </div>
                        <div class="col-md-6" >
                           <p style="padding-top: 15px;"><b>...........................................</b><br>
                                Clients Signature</p>
                        </div>
                        <div class="col-md-12 text-left">
                            <p><b>Received by: </b> {{optional($info->user_info)->name}}</p>
                            <p><b>Note: </b>{{optional($info)->note}}</p>
                        </div>
                        
                    </div>
                  </div>
                </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
        </div>
        <br />
            
        <div class="row hidden-print">
            <div class="col-md-4 text-left">
                <button class="btn btn-primary btn-sm btn-rounded" onclick="window.print()">Print</button>
            </div>
        </div>
        
        <!-- /.row -->
      </div>
        </div>
    </div>
    <!-- END Full Table -->
</div>
<!-- END Page Content -->

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" crossorigin="anonymous"
    referrerpolicy="no-referrer"></script>

@endsection
