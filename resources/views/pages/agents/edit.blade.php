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
                    <form action="{{route('agent.update', $agent->id)}}" method="post">
                    @csrf
                    <div class="block-content font-size-sm">
                            <div class="form-group">
                                <h4><b>Edit Agent Info.</b></h4>
                            </div>
                            <div class="">
                                <div class="form-group">
                                    <label for="example-text-input-alt"><span class="text-danger">*</span>Name</label>
                                    <input type="text" class="form-control" name="name" value="{{optional($agent)->name}}" required="">
                                </div>
                                <div class="form-group">
                                    <label for="example-text-input-alt"><span class="text-danger">*</span>Phone</label>
                                    <input type="number" class="form-control" name="phone" value="{{optional($agent)->phone}}" required="">
                                </div>
                                <div class="form-group">
                                    <label for="example-text-input-alt">Address</label>
                                    <textarea name="address" id="" cols="30" rows="2" class="form-control">{{optional($agent)->address}}</textarea>
                                </div>
                                <div class="form-group text-right">
                                    <button type="submit" class="btn btn-success">Update</button>
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
<!-- END Page Content -->
@endsection
