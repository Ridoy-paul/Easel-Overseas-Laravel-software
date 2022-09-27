@extends('layouts.app')
@section('body_content')
<!-- Page Content -->
<div class="content">
    <div class="block block-rounded">
        <div class="block-header">
            <h4 class="">All CRM</h4>
            <div class="block-options">
                <button type="button" class="btn btn-rounded btn-danger push" data-toggle="modal" data-target="#modal-block-fadein">Add New CRM</button>
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
                            <th>Name</th>
                            <th>Phone</th>
                            <th>Email</th>
                            <th class="text-center">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php( $i = 1 )
                        @foreach($all_crm as $crm)
                        <tr>
                            <td>{{$i}}</em></td>
                            <td>{{$crm->name}}</em></td>
                            <td>{{$crm->phone}}</em></td>
                            <td>{{$crm->email}}</em></td>
                            <td class="text-center" width="15%">
                                <a type="button" href="{{route('admin.edit.crm', ['id'=>$crm->id])}}" class="btn btn-sm btn-info" data-toggle="tooltip" title="Edit"><i class="fa fa-fw fa-pencil-alt"></i></a>
                                @if($crm->is_active == 1)
                                    <a type="button" href="{{url('/deactive-crm/'.$crm->id)}}" class="btn btn-sm btn-success">Active</a>
                                @else
                                    <a type="button" href="{{url('/active-crm/'.$crm->id)}}" class="btn btn-sm btn-warning">Deactive</a>
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
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="block block-rounded block-themed block-transparent mb-0">
                    <form action="{{route('admin.create.new.crm')}}" method="post">
                        @csrf
                        <div class="block-header bg-primary-dark">
                            <h3 class="block-title text-light">Add New crm</h3>
                            <div class="block-options">
                                <button type="button" class="btn-block-option" data-dismiss="modal" aria-label="Close">
                                    <i class="fa fa-fw fa-times"></i>
                                </button>
                            </div>
                        </div>
                        <div class="block-content font-size-sm">
                            <div class="form-group">
                                <label for="example-text-input">Name</label>
                                <input type="text" class="form-control" id="" required name="name" >
                            </div>
                            <div class="form-group">
                                <label for="example-text-input">Phone</label>
                                <input type="text" class="form-control" id="" required name="phone" >
                            </div>
                            <div class="form-group">
                                <label for="example-text-input">email</label>
                                <input type="email" class="form-control" id="" required name="email" >
                            </div>
                            <div class="form-group">
                                <label for="example-text-input">Password (Min Length: 8)</label>
                                <input type="password" class="form-control" id="" required name="password" >
                            </div>
                            <div class="form-group">
                                <label for="example-text-input">Confirm Password</label>
                                <input type="password" class="form-control" id="" required name="password_confirmation" >
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
