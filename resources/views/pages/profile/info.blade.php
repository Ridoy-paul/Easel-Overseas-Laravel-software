@extends('cms.app')
@section('body_content')
<div class="content">
    <div class="row">
        <div class="col-md-6"><h4>Settings</h4></div>
        <div class="col-sm-12 col-xl-12 col-md-12">
            <div class="block block-rounded d-flex flex-column">
                <div class="block-content block-content-full justify-content-between align-items-center">
                <form method="POST" action="{{route('admin.update.author.profile')}}" enctype="multipart/form-data">
                @csrf
                <div class="row">
                    <div class="col-md-8">
                        <div class="form-group">
                            <label for="exampleInputEmail1"><span class="text-danger">*</span>Name</label>
                            <input type="text" class="form-control" name="name" value="{{optional($user_info)->name}}" required>
                            @error('name')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="exampleInputEmail1">Profile Image (300 X 300)</label>
                            <input type="file" class="form-control" name="profile_photo_path" >
                            @error('profile_photo_path')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                            <img class="shadow rounded mt-1" src="{{asset(optional($user_info)->profile_photo_path)}}" alt="" width="200px">
                        </div>
                    </div>
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
