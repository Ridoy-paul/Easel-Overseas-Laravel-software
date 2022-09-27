@extends('cms.app')
@section('body_content')
<!-- Page Content -->
<div class="content">
    
    <div class="block block-rounded">
        <div class="block-header">
            <h4 class="">CRM Roles</h4>
            <div class="block-options">
                <button type="button" class="btn btn-rounded btn-info push" data-toggle="modal" data-target="#modal-block-fadein">Add New Role</button>
            </div>
        </div>
        <div class="block-content">
            <div class="table-responsive">
                <table width="100%" class="table table-bordered table-striped table-vcenter">
                    <thead>
                        <tr>
                            <th>SI</th>
                            <th>Role Name</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php( $i = 1 )
                        @foreach($roles as $role)
                        <tr>
                            <td>{{$i}}</em></td>
                            <td>{{str_replace(Auth::user()->shop_id."#","", $role->name)}}</em></td>
                            <td width="25%">
                                <a type="button" href="{{url('/admin/edit-role/'.$role->id)}}" class="btn btn-sm btn-info" data-toggle="tooltip" title="Edit"><i class="fa fa-fw fa-pencil-alt"></i></a>
                                <a type="button" href="{{url('/admin/role-permissions/'.$role->id)}}" class="btn btn-sm btn-alt-primary" data-toggle="tooltip" title="Permissions">Permissions</a>
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
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="block block-rounded block-themed block-transparent mb-0">
                    <form action="{{route('admin.create.roll')}}" method="post">
                        @csrf
                        <div class="block-header bg-primary-dark">
                            <h3 class="block-title text-light">Add New Admin Helper Role</h3>
                            <div class="block-options">
                                <button type="button" class="btn-block-option" data-dismiss="modal" aria-label="Close">
                                    <i class="fa fa-fw fa-times"></i>
                                </button>
                            </div>
                        </div>
                        <div class="block-content font-size-sm">
                            <div class="form-group">
                                <label for="example-text-input">Role Name</label>
                                <input type="text" class="form-control" id="" required name="name" placeholder="Ex: Admin Manager">
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
@endsection
