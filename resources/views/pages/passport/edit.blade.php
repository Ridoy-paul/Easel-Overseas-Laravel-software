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
                    <form action="{{route('passport.update', optional($passport)->id)}}" method="post">
                    @csrf
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="example-text-input-alt">Name</label>
                                    <input type="text" class="form-control" value="{{optional($passport)->name}}" name="name">
                                </div>
                                <div class="form-group">
                                    <label for="example-text-input-alt">Phone</label>
                                    <input type="number" class="form-control" value="{{optional($passport)->phone}}" name="phone">
                                </div>
                                <div class="form-group">
                                    <label for="example-text-input-alt">Address</label>
                                    <textarea name="address" id="" cols="30" rows="2" class="form-control" spellcheck="false">{{optional($passport)->address}}</textarea>
                                </div>
                                <div class="form-group">
                                    <label for="example-text-input-alt"><span class="text-danger">*</span>Passport Number</label>
                                    <textarea name="passport_number" id="" cols="30" rows="2" class="form-control" required="" spellcheck="false">{{optional($passport)->passport_number}}</textarea>
                                    @error('passport_number')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="example-text-input-alt">Upload Passport New Scan Copy(Optioal)</label>
                                    <input type="file" class="form-control"  value="{{old('passport_scan_copy')}}" name="passport_scan_copy">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="example-text-input-alt">Old Image</label><br>
                                    <img width="100%" src="{{asset(optional($passport)->passport_scan_copy)}}" class="rounded bg-light shadow p-2">
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="example-text-input-alt">Note</label>
                                    <textarea name="note" id="" cols="30" rows="3" class="form-control">{{optional($passport)->note}}</textarea>
                                </div>
                                <div class="form-group text-right">
                                    <button type="submit" class="btn btn-success">Update Passport Info</button>
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
