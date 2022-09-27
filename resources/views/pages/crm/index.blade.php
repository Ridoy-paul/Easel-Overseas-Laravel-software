@extends('cms.app')
@section('body_content')
<!-- Page Content -->
<div class="content">
    <div class="block block-rounded">
        <div class="block-header">
            <h4 class="">All CRM</h4>
            <div class="block-options">
                <button type="button" class="btn btn-rounded btn-info push" data-toggle="modal" data-target="#modal-block-fadein">Add New CRM</button>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12 text-danger">
                @if($errors->any())
                    {!! implode('', $errors->all('<div class="text-danger">:message</div>')) !!}
                @endif
            </div>
        </div>

        <div class="block-content">
            <div class="table-responsive">
                <table width="100%" class="table table-bordered table-striped table-vcenter">
                    <thead>
                        <tr>
                            <th>SI</th>
                            <th>CRM Name</th>
                            <th>Email</th>
                            <th>Role</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php( $i = 1 )
                        @foreach($crms as $crm)
                        @php( $role_name = DB::table('roles')->where('id', $crm->role_id)->first() )
                        <tr>
                            <td>{{$i}}</em></td>
                            <td>{{$crm->name}}</td>
                            <td>{{$crm->email}}</td>
                            <td>{{$role_name->name}}</td>
                            <td width="25%">
                                <a type="button" href="{{url('/admin/edit-crm/'.$crm->id)}}" class="btn btn-sm btn-info"><i class="fa fa-fw fa-pencil-alt"></i></a>
                                @if($crm->is_active == 1)
                                    <a type="button" href="{{url('/admin/deactive-crm/'.$crm->id)}}" class="btn btn-sm btn-success">Active</a>
                                @else
                                    <a type="button" href="{{url('/admin/active-crm/'.$crm->id)}}" class="btn btn-sm btn-warning">Deactive</a>
                                @endif
                                
                            </td>
                        </tr>
                        @php( $i += 1 )
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <!-- END Full Table -->

</div>
<!-- END Page Content -->

<!-- Fade In Block Modal -->
<div class="modal fade" id="modal-block-fadein" tabindex="-1" role="dialog" aria-labelledby="modal-block-fadein" aria-hidden="true">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <div class="block block-rounded block-themed block-transparent mb-0">
                    <form action="{{route('admin.create.crm')}}" method="post">
                        @csrf
                        <div class="block-header bg-primary-dark">
                            <h3 class="block-title text-light">Add New CRM</h3>
                            <div class="block-options">
                                <button type="button" class="btn-block-option" data-dismiss="modal" aria-label="Close">
                                    <i class="fa fa-fw fa-times"></i>
                                </button>
                            </div>
                        </div>
                        <div class="block-content font-size-sm row">
                        <div class="col-md-12">
                                <div class="form-group">
                                    <label for="example-text-input">CRM Name</label>
                                    <input type="text" class="form-control" id="" required name="name">
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="example-text-input">CRM Email</label>
                                    <input type="text" class="form-control" id="" required name="email">
                                </div>
                            </div>
                            
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="example-text-input">Password (min: 8)</label>
                                    <input type="password" class="form-control" id="password" required name="password">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="example-text-input">Confirm Password</label>
                                    <input type="password" class="form-control" id="confirm_password" required name="password_confirmation">
                                    <span class="text-danger d-none" id="password_not_matched">Password Not Matched</span>
                                    <span class="text-success d-none" id="password_matched">Password Matched</span>
                                </div>
                            </div>
                            
                            <div class="col-md-12 pb-3">
                                <div class="form-group" id="admin_helper_role_div">
                                    <label for="admin_helper_role">Select a Role</label>
                                    <select class="form-control" id="admin_helper_role" name="admin_helper_role">
                                        <option value="">-- Select One --</option>
                                        @foreach($roles as $admin_role)
                                            
                                                <option value="{{$admin_role->id}}">{{str_replace(Auth::user()->shop_id."#","", $admin_role->name)}}</option>
                                            
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="block-content block-content-full text-right border-top">
                            <button type="button" class="btn btn-alt-primary mr-1" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!-- END Fade In Block Modal -->

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
