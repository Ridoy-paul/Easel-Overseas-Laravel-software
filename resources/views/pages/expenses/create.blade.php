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
                <h4 class="text-primary"><b>Add Expenses</b></h4>
            </div>
            <form class="form-horizontal" action="{{route('expense.store')}}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="row">
                <div class="col-md-8">
                <div class="row shadow p-3 mb-4">
                        <div class="col-md-12">
                            <div class="form-group row">
                                <label for="inputName" class="col-sm-4 col-form-label"><span class="text-danger">*</span> Expense Reason</label>
                                <div class="col-sm-8">
                                    <select class="form-control" id="for_whom" name="for_whom" required="">
                                        <option value="">-- Select Expense Reason --</option>
                                        <option value="c">Client Expenses</option>
                                        <option value="o">Office Expenses</option>
                                        <option value="a">Agent Expenses</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="inputName" class="col-sm-4 col-form-label"><span class="text-danger">*</span> Expense Category</label>
                                <div class="col-sm-8">
                                    <select class="form-control" id="expenses_category_id" name="expenses_category_id" required="">
                                        <option value="">-- Select Expense Category --</option>
                                        @foreach($expenses_category as $ex_category)
                                        <option value="{{$ex_category->id}}">{{$ex_category->title}} [{{$ex_category->expense_type}}]</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row shadow p-3 mb-4" id="second_step" style="display: none;">
                        <div class="col-md-12">
                            <div class="form-group row">
                                <div class="col-sm-12">
                                    <div class="form-group shadow rounded p-3">
                                        <label for="inputName" class="col-form-label text-success" id="search_level"></label>
                                        <input type="text" class="form-control" id="search_info" placeholder="Search....">
                                    </div>
                                </div>
                            </div>
                            <div class="form-group" id="search_output">
                                
                            </div>
                            <input type="hidden" name="work_id" id="work_id" value="">
                            <input type="hidden" name="agent_id" id="agent_id" value="">
                            <input type="hidden" name="passport_id" id="passport_id" value="">
                        </div>
                    </div>
                    
                    <div class="row shadow p-3" style="display: none;" id="third_step">
                        <div class="col-md-12">
                                <div class="form-group row">
                                    <label for="inputName" class="col-sm-4 col-form-label"><span class="text-danger">*</span> Expenses Amount</label>
                                    <div class="col-sm-8">
                                        <input type="number" step=any class="form-control" id="amount" name="amount" required max="">
                                    </div>
                                </div>
                                
                                <div class="form-group row">
                                    <label for="inputName" class="col-sm-4 col-form-label">Date</label>
                                    <div class="col-sm-8">
                                        <input type="date" class="form-control" name="date" value="{{date('Y-m-d')}}">
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="inputName" class="col-sm-4 col-form-label">Voucher Number</label>
                                    <div class="col-sm-8">
                                        <input type="text" class="form-control" name="voucher_number" value="">
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="inputName" class="col-sm-4 col-form-label">Upload Voucher</label>
                                    <div class="col-sm-8">
                                        <input type="file" class="form-control" name="exp_file" value="">
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
                        </div>
                    </div>
                </div>
                <div class="col-md-4 pr-4 pl-4 pb-4">
                <div class="lender_info rounded shadow p-3">
                    <div class="block block-rounded">
                            <div class="block-header block-header-default">
                                <h3 class="block-title">
                                    <i class="far fa-user-circle text-muted mr-1"></i> Expenses Reason Info
                                </h3>
                            </div>
                            <div class="block-content" id="expenses_reason_info_body">
                                <h4 class="text-dark text-center mt-3 mb-3 p-1 bg-light rounded shadow"><b>Select Expenses Reason</b></h4>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            </form>

        </div>
    </div>
    <!-- END Full Table -->
</div>
<!-- END Page Content -->

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" crossorigin="anonymous"
    referrerpolicy="no-referrer"></script>


<script>
    // Begin:: Customer Search for stock in
    $('#search_info').keyup(function () {
        var info = $(this).val();
        var for_whom = $('#for_whom').val();
        $.ajax({
            type: 'get',
            url: '/expense/search_client_or_agent_data',
            data: {
                'info': info,
                'for_whom': for_whom,
            },
            success: function (data) {
                $('#search_output').html(data);
            }
        });
    });
    // End:: Customer Search for stock in

    $('#for_whom').on('change', function() {
        var for_whom = this.value;
        
        if(for_whom == 'c') {
            $('#second_step').show();
            $('#third_step').hide();
            $('#search_level').text("Search Client By name, phone, Passport Number, Work Code");
            $('#expenses_reason_info_body').html('<h3 class="text-success text-center mt-3 mb-3 p-1 bg-dark rounded shadow"><b>Search Client Info or Work Code</b></h3>');
        }
        else if(for_whom == 'o') {
            $('#third_step').show();
            $('#second_step').hide();
            $('#expenses_reason_info_body').html('<h3 class="text-dark text-center mt-3 mb-3 p-1 bg-light rounded shadow"><b>Follow Next Step and Submit</b></h3>');
        }
        else if(for_whom == 'a') {
            $('#second_step').show();
            $('#third_step').hide();
            $('#search_level').text("Search Agent By name, phone, Work Code");
            $('#expenses_reason_info_body').html('<h3 class="text-light text-center mt-3 mb-3 p-1 bg-dark rounded shadow"><b>Search Agent Info With Work</b></h3>');
        }
        else {
            $('#second_step').hide();
            $('#third_step').hide();
            $('#expenses_reason_info_body').html('<h3 class="text-dark text-center mt-3 mb-3 p-1 bg-light rounded shadow"><b>Select Expenses Reason</b></h3>');
        }
        set_other_info('all', 1, 1);
    });

    function add_client_or_agent_data(which, name, id, phone, code, work_id) {
        if(which == 'c') {
            set_other_info('c', id, work_id);
            $('#expenses_reason_info_body').html('<h4 class="bg-success p-1 rounded text-light">Client Info</h4><div class="media d-flex align-items-center mb-2"><div class="mr-3"><b>Name: </b> <span>'+name+'</span></div></div><div class="media d-flex align-items-center mb-2"><div class="mr-3"><b>Phone: </b> <span>'+phone+'</span></div></div><div class="media d-flex align-items-center mb-2"><div class="mr-3"><b>Work Code: </b> <span>'+code+'</span></div></div>');
            clear_search();
            $('#third_step').show();
        }
        else if(which == 'a') {
            set_other_info('a', id, work_id);
            $('#expenses_reason_info_body').html('<h4 class="bg-primary p-1 rounded text-light">Agent Info</h4><div class="media d-flex align-items-center mb-2"><div class="mr-3"><b>Name: </b> <span>'+name+'</span></div></div><div class="media d-flex align-items-center mb-2"><div class="mr-3"><b>Phone: </b> <span>'+phone+'</span></div></div><div class="media d-flex align-items-center mb-2"><div class="mr-3"><b>Work Code: </b> <span>'+code+'</span></div></div>');
            clear_search();
            $('#third_step').show();
        }
    }

    function set_other_info(which, id, work_id) {
        if(which == 'c') {
            $('#work_id').val(work_id);
            $('#passport_id').val(id);
            $('#agent_id').val('');
        }
        else if(which == 'a') {
            $('#work_id').val(work_id);
            $('#passport_id').val();
            $('#agent_id').val(id);
        }
        else {
            $('#work_id').val('');
            $('#passport_id').val('');
            $('#agent_id').val('');
        }
    }

    function clear_search() {
        $('#search_info').val('');
        $('#search_output').html('');
    }

</script>


<!--This Script for show and hide cash or Cheque in Received Start-->
<script>
    

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
