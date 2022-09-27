@extends('layouts.app')
@section('body_content')
<!-- Page Content -->
<div class="content">
    <div class="row">
    <div class="col-sm-12 col-xl-12 col-md-12">
            <div class="block block-rounded d-flex flex-column">
                <div
                    class="block-content block-content-full flex-grow-1 d-flex justify-content-between align-items-center">
                    <div class="col-lg-12 col-xl-12">
                    <form action="{{url('/update-crm/'.$info->id)}}" method="post">
                        @csrf
                        <div class="block-header bg-primary-dark">
                            <h3 class="block-title text-light">Update CRM Info</h3>
                        </div>
                        <div class="block-content font-size-sm">
                            <div class="form-group">
                                <label for="example-text-input">Name</label>
                                <input type="text" class="form-control" value="{{$info->name}}" id="" required name="name" >
                            </div>
                            <div class="form-group">
                                <label for="example-text-input">Phone</label>
                                <input type="text" class="form-control" value="{{$info->phone}}"  id="" required name="phone" >
                            </div>
                            <div class="form-group">
                                <label for="example-text-input">email</label>
                                <input type="email" class="form-control" value="{{$info->email}}"  id="" required name="email" >
                            </div>
                        </div>
                        <div class="block-content block-content-full text-right border-top">
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- END Page Content -->
@endsection
