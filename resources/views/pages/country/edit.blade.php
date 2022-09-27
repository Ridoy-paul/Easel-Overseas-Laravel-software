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
                    <form action="{{url('/update-country/'.$country->id)}}" method="post">
                    @csrf
                    <div class="form-group">
                            <label for="example-text-input-alt"><span class="text-danger">*</span> Country Name</label>
                            <input type="text" class="form-control form-control-alt" value='{{$country->name}}' name="name" required>
                            @error('name')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="example-text-input-alt"><span class="text-danger">*</span> is Active</label>
                            <select name="is_active" id="" class="form-control">
                                <option @if($country->is_active == 1) selected class="text-light bg-success" @endif value="1">Active</option>
                                <option @if($country->is_active == 0) selected class="text-light bg-success" @endif value="0">Deactive</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-success">Save</button>
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
