@extends('cms.app')
@section('body_content')
<div class="content">
    <!-- Overview -->
    <div class="row">
    <div class="col-sm-12 col-xl-12 col-md-12">
            <div class="block-rounded d-flex flex-column">
                <div class="block-content block-content-full flex-grow-1 d-flex justify-content-between">
                <form action="javascript:void(0)" id="order_confirm" method="post" enctype="multipart/form-data" class="">
                    @csrf
                    <div class="row shadow rounded bg-light p-2">
                        <div class="col-md-12"><h4><b>Step 1=></b></h4></div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="example-text-input-alt"><span class="text-danger">*</span>Visa</label>
                                <select name="visa_id" class="form-control"  onchange="selectCountry(this)" required>
                                    <option value="0">-- Select Visa --</option>
                                    @foreach($visas as $visa)
                                    <option  value="{{$visa->id}}">{{$visa->visa_title}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="example-text-input-alt"><span class="text-danger">*</span>Country</label>
                                <div class="ml-2" id="country_info_output"></div>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="row shadow rounded bg-light p-2">
                                <div class="col-md-12"><small><b>Agent Info: </b></small><button type="button" class="btn btn-outline-primary btn-sm btn-rounded" data-toggle="modal" data-target="#agentModal">Add / Edit Agent</button></div>
                                <div class="col-md-6">
                                    <div class="p-3 " id="agent_info_output">
                                        
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="example-text-input-alt"><span class="text-danger">*</span>Agent Commission</label>
                                        <input type="number" required class="form-control " value="" name="agent_commission">
                                        <input type="hidden" name="agent_id" id="agent_id">
                                    </div>
                                </div>
                            </div>
                            
                        </div>
                    </div>

                    <div class="row shadow rounded bg-light p-2 mt-5">
                        <div class="col-md-12"><h4><b>Step 2=></b></h4></div>
                        <div class="col-md-12">
                            <div class="row shadow rounded bg-light p-2">
                                <div class="col-md-12"><small><b>Passport Info: </b></small><button type="button" class="btn btn-outline-success btn-sm btn-rounded" data-toggle="modal" data-target="#passportModal">Add / Edit Passport</button></div>
                                <div class="col-md-6">
                                    <div class="p-3 " id="passport_info_output">
                                        
                                    </div>
                                    <input type="hidden" name="passport_id" value="" id="passport_id">
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="example-text-input-alt"><span class="text-danger">*</span>Package Price</label>
                                        <input type="number" required class="form-control " value="" name="package_price">
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="example-text-input-alt">Post Name</label>
                                        <input type="text" class="form-control" value="" name="post">
                                    </div>
                                </div>
                                <div class="col-md-8">
                                    <div class="form-group">
                                        <label for="example-text-input-alt">Code</label>
                                        <input type="text" class="form-control" value="" name="code">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="example-text-input-alt"><span class="text-danger">*</span>Date</label>
                                        <input type="date" required class="form-control" value="{{date('Y-m-d')}}" name="date">
                                    </div>
                                </div>
                                
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="example-text-input-alt">Note</label>
                                        <textarea name="note" id="" cols="30" rows="3" class="form-control"></textarea>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group text-right">
                                        <button type="submit" id="submit_work" class="btn btn-success btn-rounded">Submit</button>
                                        <button type="button" id="submit_processing" class="btn btn-primary btn-rounded" style="display: none;">Peocessing...</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- END Overview -->
</div>

<!--Agent Modal -->
<div class="modal fade" id="agentModal" tabindex="-1" role="dialog" aria-labelledby="agentModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="agentModalLabel">Add Or Edit Agent</h5>
        <button type="button" class="close" data-dismiss="modal" id="agent_modal_close" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="form-group shadow rounded p-3">
            <input type="text" class="form-control" id="search_supplier" placeholder="Search by Agent info(Name, Phone)" name="company_name">
        </div>
        <div class="card-body shadow rounded" id="agent_show_info">
            
        </div>
      </div>
    </div>
  </div>
</div>

<!--Passport Modal -->
<div class="modal fade" id="passportModal" tabindex="-1" role="dialog" aria-labelledby="passportModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="passportModalLabel">Add Or Edit Passport</h5>
        <button type="button" class="close" data-dismiss="modal" id="passport_modal_close" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="form-group shadow rounded p-3">
            <input type="text" class="form-control" id="search_passport" placeholder="Search by passport info(Name, Phone, passport number)">
        </div>
        <div class="card-body shadow rounded" id="passport_show_info">
            
        </div>
      </div>
    </div>
  </div>
</div>



<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

<script type="text/javascript">
    function selectCountry(id) {
        var visa_id = id.value;
        if (visa_id != 0) {
            $.ajax({
                url: "/work/get_visa_to_country_info",
                method: 'get',
                data: {
                    id:visa_id,
                },
                beforeSend: function() {
                    //$('.se-pre-con').show();
                },
                success: function(response){
                    $('#country_info_output').html(response);
                }
            });
        }
        else {
            $('#country_info_output').html('');
        }
    }

    $('#search_supplier').keyup(function () {
        var supplier_info = $(this).val();
        $.ajax({
            type: 'get',
            url: '/work/search/agent',
            data: {
                'supplier_info': supplier_info
            },
            success: function (data) {
                $('#agent_show_info').html(data);
            }
        });
    });

    function setAgent(name, id, phone) {
        $('#agent_info_output').html('<h5 class="text-light bg-success rounded p-2"><b>Name: </b>'+name+'<br><b>Phone: </b>'+phone+'</h5>');
        $('#agent_id').val(id);
        $('#search_supplier').val('');
        $('#agent_show_info').html('');
        document.getElementById("agent_modal_close").click();
    }

    $('#search_passport').keyup(function () {
        var passport_info = $(this).val();
        $.ajax({
            type: 'get',
            url: '/work/search/passport',
            data: {
                'passport_info': passport_info
            },
            success: function (data) {
                $('#passport_show_info').html(data);
            }
        });
    });

    function setPassport(name, id, phone) {
        $('#passport_info_output').html('<h5 class="text-light bg-success rounded p-2"><b>Name: </b>'+name+'<br><b>Phone: </b>'+phone+'</h5>');
        $('#passport_id').val(id);
        $('#search_passport').val('');
        $('#passport_show_info').html('');
        document.getElementById("passport_modal_close").click();
    }


    $(document).ready(function(){
        $('#submit_work').click(function(e){
            if (document.getElementById("order_confirm").checkValidity()) { 
                e.preventDefault();
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });

                $.ajax({
                    url: "{{ url('/work/store')}}",
                    method: 'post',
                    data: $('#order_confirm').serialize(),
                    beforeSend: function() {
                        $('#submit_processing').show();
                        $('#submit_work').hide();
                    },
                    success: function(response){
                        if(response['status'] == 'yes') {
                            success("New Work Added.");
                            location.replace("{{ route('work.index') }}");
                        }
                        else {
                            error(response['reason']);
                            $('#submit_processing').hide();
                            $('#submit_work').show();
                        }
                    }
                });
            }
            else {
                error("some Info is missing!!!");
            }
        });
    });

</script>

@endsection
