@extends('layouts.app')
@section('body_content')
<!-- Page Content -->
<div class="content">
    <div class="row">
        <div class="col-sm-12 col-xl-12 col-md-12">
            <div class="block block-rounded d-flex flex-column">
                <div class="block-content block-content-full flex-grow-1 d-flex justify-content-between align-items-center">
                        <div class="">
                        <form method="post" id="submit_form" class="" action="javascript:void(0)">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="shadow p-2 rounded">
                                        <div class="col-md-12 bg-dark" style="border: 3px solid #F50057; border-radius: 10px;">
                                            <div class="form-group">
                                                <label for="clientName">Passport Num</label>
                                                <input type="text" class="form-control" name="search_text"
                                                    id="search_text" placeholder="" autofocus="">
                                            </div>
                                        </div>
                                      
                                            <div class="col-md-12">
                                                <div style="padding: 10px;" id="resultR"></div>
                                            </div>
                                       
                                    </div>
                                </div>
                            </div>
                                <br>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div id="PaycashForm" class="card" style="background-color: rgb(244, 244, 244); padding: 20px;">
                                        
                                            <div id="scanned_form_info"></div>

                                            <div id="manual_form"></div>
                                            
                                            <hr style="border-bottom: 1px solid #F50057;">
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <h4 style="text-align: center; padding: 10px; font-weight: bold;"> বাংলাদেশের নাগরিকের জন্য </h4>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group row">
                                                        <label for="inputName" class="col-sm-4 col-form-label">Visa Number</label>
                                                        <div class="col-sm-8">
                                                            <input type="text" class="form-control" id="visa_num" name="visa_num">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group row">
                                                        <label for="inputName" class="col-sm-4 col-form-label">Date of Expiry</label>
                                                        <div class="col-sm-8">
                                                            <input type="date" class="form-control" id="visa_date_Of_expiry" name="visa_date_Of_expiry">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group row">
                                                        <label for="inputName" class="col-sm-4 col-form-label">Type of Visa</label>
                                                        <div class="col-sm-8">
                                                            <select class="form-control" id="type_of_visa" name="type_of_visa">
                                                                <option value="">Select Visa Type</option>
                                                                <option value="Work visa">Work visa</option>
                                                                <option value="Tourist visa">Tourist visa</option>
                                                                <option value="Student visa">Student visa</option>
                                                                <option value="Medical visa">Medical visa</option>
                                                                <option value="Journalist and media">Journalist and media</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group row">
                                                        <label for="inputName" class="col-sm-4 col-form-label">Purpose of Visit</label>
                                                        <div class="col-sm-8">
                                                            <input type="text" class="form-control" id="purpose_of_visit" name="purpose_of_visit">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="card-footer">
                                            <div class="row">
                                                <div class="col-md-12 text-right">
                                                    <div class="form-group text-right">
                                                        <button type="submit" name="nextPassportInfoByManual" id="form_submit_button" class="btn btn-danger btn-lg">Print</button>
                                                    </div>
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
</div>
<!-- END Page Content -->

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

<script>
    $(document).ready(function () {
        get_manual_form();
    });

    function get_manual_form() {
        $.ajax({
            url: "{{ url('/load-manual-form')}}",
            method: 'get',
            data: { },
            beforeSend: function() {
                $('#manual_form').html('<div class="text-center"><div class="spinner-border text-dark mb-5" role="status"><span class="sr-only">Loading...</span></div></div>');
            },
            success: function(response){
                $('#manual_form').html(response);
                $('#scanned_form_info').html('');
            }
        });
    }

    
	$('#search_text').keyup(function(){
		var search = $(this).val();
        var manual_form_status = $('#manual_form_status').val();
		var searchLe = search.length;
		if(searchLe == 88){
		    if(search != ''){
                //console.log(search);
                $.ajax({
                    url: "{{url('/check-passport-info')}}",
                    method:"get",
                    data:{passport_info:search},
                    beforeSend: function() {
                        $('#scanned_form_info').html('<div class="text-center"><div class="spinner-border text-dark mb-5" role="status"><span class="sr-only">Loading...</span></div></div>');
                    },
                    success:function(data){
                        $('#manual_form').html('');
                        $('#scanned_form_info').html(data);
                    },
                    error: function (jqXHR, textStatus, errorThrown) {
                        Toastify({
                            text: "Error Occoured! Please Try Again.",
                            backgroundColor: "linear-gradient(to right, #F50057, #2F2E41)",
                            className: "error",
                        }).showToast();
                        var play = document.getElementById('error').play();
                        $('#search_text').val('');
                        $('#search_text').focus();
                    }
                });
    		}
            else {
                Toastify({
                    text: "Error Occoured! Please Try Again.",
                    backgroundColor: "linear-gradient(to right, #F50057, #2F2E41)",
                    className: "error",
                }).showToast();
                var play = document.getElementById('error').play();
                if(manual_form_status != 1) {
                    get_manual_form();
                }
            }
		}
        else {
            Toastify({
                text: "Error Occoured! Please Try Again.",
                backgroundColor: "linear-gradient(to right, #F50057, #2F2E41)",
                className: "error",
            }).showToast();
            var play = document.getElementById('error').play();
            if(manual_form_status != 1) {
                get_manual_form();
            }
        }	
	});



    $('#form_submit_button').click(function(e){
        form_submit(e);
     });

    function form_submit(e) {
        if (document.getElementById("submit_form").checkValidity()) { 
            e.preventDefault();
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $.ajax({
                url: "{{ url('/submit-scanned-passport-confirm')}}",
                method: 'post',
                data: $('#submit_form').serialize(),
                beforeSend: function() {
                    //$('.se-pre-con').show();
                },
                success: function(response){
                    //console.log(response);
                    if(response['status'] == 'yes') {
                        //console.log(response);
                        let newWindow = open("/print-deprature-card/"+response['unique_id'], 'Print Deprature Card', 'width=600,height=550')
                        newWindow.focus();
                        newWindow.onload = function() {
                            newWindow.document.body.insertAdjacentHTML('afterbegin');
                        };
                        var play = document.getElementById('success').play();
                        reset_form();
                    }
                    else {
                        Toastify({
                            text: "Error!",
                            backgroundColor: "linear-gradient(to right, #F50057, #2F2E41)",
                            className: "error",
                        }).showToast();
                        var play = document.getElementById('error').play();
                        $('#search_text').val('');
                        $('#search_text').focus();
                    }
                }
            });
        }
        else {
            Toastify({
                text: "Error Occoured!",
                backgroundColor: "linear-gradient(to right, #F50057, #2F2E41)",
                className: "error",
            }).showToast();
            var play = document.getElementById('error').play(); 
        }
    }

    function reset_form() {
        get_manual_form();
        $('#search_text').val('');
        $('#search_text').focus();
        $('#visa_num').val('');
        $('#visa_date_Of_expiry').val('');
        $('#type_of_visa').val('');
        $('#purpose_of_visit').val('');
    }

    $("form").bind("keypress", function (e) {
        if (e.keyCode == 13) {
            return false;
        }
    });


</script>

@endsection
