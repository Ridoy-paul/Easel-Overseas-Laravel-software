@extends('cms.app')
@section('body_content')
<!-- Page Content -->
<div class="content">
    <!-- Overview -->
    <div class="row">
    <div class="col-sm-12 col-xl-12 col-md-12">
            <!-- Pending Orders -->
            <div class="block block-rounded d-flex flex-column">
                <div
                    class="block-content block-content-full flex-grow-1 d-flex justify-content-between align-items-center">
                    <div class="col-lg-12 col-xl-12">
                    <form action="{{url('/admin/update-crm/'.$user_info->id)}}" method="post">
                    @csrf
                    <div class="block-content font-size-sm row">

                        <div class="col-md-12">
                                <div class="form-group">
                                    <label for="example-text-input">CRM Name</label>
                                    <input type="text" class="form-control" id="" value="{{$user_info->name}}" required name="name">
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="example-text-input">CRM Email</label>
                                    <input type="text" class="form-control" id="" value="{{$user_info->email}}" required name="email">
                                </div>
                            </div>
                            
                            <div class="col-md-12 pb-3">
                                <div class="form-group" id="admin_helper_role_div">
                                    <label for="admin_helper_role">Select a Role</label>
                                    <select class="form-control" id="admin_helper_role" name="admin_helper_role">
                                        <option value="">-- Select One --</option>
                                        @foreach($roles as $admin_role)
                                                <option @if($admin_role->id == $user_info->role_id) selected class="bg-success" @endif  value="{{$admin_role->id}}">{{str_replace(Auth::user()->shop_id."#","", $admin_role->name)}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="form-group text-right col-md-12">
                                <button type="submit" class="btn btn-success">Save</button>
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
<!-- END Page Content -->

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

        <script>
           

            $("#confirm_password").on("change paste keyup cut select", function() {
                var password_matched = document.getElementById("password_matched");
                var password_not_matched = document.getElementById("password_not_matched");

                var password = $('#password').val();
                var confirm_password = $('#confirm_password').val();
                if(password == confirm_password && password != '') {
                    password_matched.classList.remove("d-none");
                    password_not_matched.classList.add("d-none");
                }
                else if(password == '' || confirm_password == ''){
                    password_matched.classList.add("d-none");
                    password_not_matched.classList.add("d-none");
                }
                else {
                    password_matched.classList.add("d-none");
                    password_not_matched.classList.remove("d-none");
                }
            });


        </script>


@endsection
