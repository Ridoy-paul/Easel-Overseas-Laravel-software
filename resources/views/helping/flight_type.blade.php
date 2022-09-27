@extends('layouts.app')
@section('body_content')
<!-- Page Content -->
<div class="content">
    <div class="block block-rounded">
        <div class="block-header">
            <h4 class="">Flight Types</h4>
            <div class="block-options">
                <button type="button" class="btn btn-rounded btn-primary push" data-toggle="modal" data-target="#modal-block-fadein">Add New Flight Type</button>
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
                            <th>Type Name</th>
                            <th>Code</th>
                            <th class="text-center">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php( $i = 1 )
                        @foreach($flight_types as $type)
                        <tr>
                            <td>{{$i}}</em></td>
                            <td>{{$type->title}}</em></td>
                            <td>{{$type->code}}</em></td>
                            <td class="text-center" width="15%">
                                <a type="button" href="{{route('edit.flight.type', ['id'=>$type->id])}}" class="btn btn-sm btn-info" data-toggle="tooltip" title="Edit"><i class="fa fa-fw fa-pencil-alt"></i></a>
                                @if($type->is_active == 1)
                                    <a type="button" href="{{url('/deactive-flight-type/'.$type->id)}}" class="btn btn-sm btn-success" data-toggle="tooltip" title="Flight Type is active now, click to deactive">Active</a>
                                @else
                                    <a type="button" href="{{url('/active-flight-type/'.$type->id)}}" class="btn btn-sm btn-warning" data-toggle="tooltip" title="Flight Type is deactive now, click to active">Deactive</a>
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
                    <form action="{{route('create.flight.type')}}" method="post">
                        @csrf
                        <div class="block-header bg-primary-dark">
                            <h3 class="block-title text-light">Add New Flight Type</h3>
                            <div class="block-options">
                                <button type="button" class="btn-block-option" data-dismiss="modal" aria-label="Close">
                                    <i class="fa fa-fw fa-times"></i>
                                </button>
                            </div>
                        </div>
                        <div class="block-content font-size-sm">
                            <div class="form-group">
                                <label for="example-text-input">Type Name</label>
                                <input type="text" class="form-control" id="" required name="title" >
                            </div>
                            <div class="form-group">
                                <label for="example-text-input">Code</label>
                                <input type="text" class="form-control" id="" required name="code" >
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
