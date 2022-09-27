@extends('cms.app')
@section('body_content')
<div class="content">
    <div class="row">
        <div class="col-md-6"><h4>Settings</h4></div>
        <div class="col-sm-12 col-xl-12 col-md-12">
            <div class="block block-rounded d-flex flex-column">
                <div class="block-content block-content-full justify-content-between align-items-center">
                <form method="POST" action="{{route('admin.store.update.setting')}}" enctype="multipart/form-data">
                @csrf
                <div class="row">
                    <div class="col-md-8">
                        <div class="form-group">
                            <label for="exampleInputEmail1"><span class="text-danger">*</span>Company Name</label>
                            <input type="text" class="form-control" name="company_name" value="{{optional($info)->company_name}}" required>
                            @error('company_name')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="exampleInputEmail1">Logo(260 X 90)</label>
                            <input type="file" class="form-control" name="logo" >
                            @error('logo')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                            <img class="shadow rounded" src="{{asset(optional($info)->logo)}}" alt="" width="260px">
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="exampleInputEmail1">Phone</label>
                            <input type="text" class="form-control" value="{{optional($info)->phone}}" name="phone" >
                            @error('phone')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="exampleInputEmail1">email</label>
                            <input type="email" class="form-control" name="email" value="{{optional($info)->email}}">
                            @error('email')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="exampleInputEmail1">website</label>
                            <input type="text" class="form-control" name="website" value="{{optional($info)->website}}">
                            @error('website')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                </div>
                <div class="form-group shadow p-2 rounded">
                    <label for="exampleInputEmail1">address</label>
                    <textarea class="form-control" name="address" cols="30" rows="5">{!! optional($info)->address !!}</textarea>
                    @error('address')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>

                <div class="form-group text-right">
                <button type="submit" class="btn btn-success btn-rounded">Save</button>
                </div>
            </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
