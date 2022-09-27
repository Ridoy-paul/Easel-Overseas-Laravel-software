@extends('cms.app')
@section('body_content')
<!-- Page Content -->
<div class="content">
    <div class="row">
    <div class="col-sm-12 col-xl-12 col-md-12">
            <div class="block block-rounded d-flex flex-column">
                <div class="block-content block-content-full flex-grow-1 d-flex justify-content-between align-items-center">
                    <div class="col-lg-12 col-xl-12">
                    <h3><b>Business Owners</b></h3>
                    <form action="{{url('/admin/edit-capital-person/'.$owner_person->id.'')}}" method="post">
                        @csrf
                        <div class="block-content font-size-sm">
                            <div class="form-group">
                                <label for="example-text-input">Name</label>
                                <input type="text" class="form-control" id="" value="{{$owner_person->name}}" required name="name" >
                            </div>
                            <div class="form-group">
                                <label for="example-text-input">NID Num.</label>
                                <input type="text" class="form-control" id="" value="{{optional($owner_person)->nid_number}}" name="nid_number" >
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="example-text-input">Phone</label>
                                        <input type="text" class="form-control" id="" value="{{$owner_person->phone}}" required name="phone" >
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="example-text-input">Business Portion[%] (if null type 0 )</label>
                                        <input type="number" class="form-control" value="{{optional($owner_person)->business_portion}}" required name="business_portion" step=any>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="example-text-input">Address</label>
                                        <input type="text" class="form-control" id="" value="{{optional($owner_person)->address}}" name="address" >
                                    </div>
                                </div>
                            </div>
                            <div class="form-group text-right">
                                <button type="submit" class="btn btn-success">Update</button>
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
@endsection
