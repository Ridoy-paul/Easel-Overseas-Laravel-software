@extends('cms.app')
@section('body_content')
@php
    $active_visa = $work->filter(function($item) { return $item->is_rejected == 0; })->count('id');
    $rejected_visa = $work->filter(function($item) { return $item->is_rejected == 1; })->count('id');
@endphp
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
                    <form action="{{url('/update-visa/'.$visa->id)}}" method="post">
                    @csrf
                    <div class="block-content font-size-sm">
                            <div class="form-group">
                                <h4><b>Edit Visa</b></h4>
                            </div>
                            <div class="form-group">
                                <label for="example-text-input-alt"><span class="text-danger">*</span>Country</label>
                                <select name="country_id" id="" class="form-control select2" required data-live-search="true">
                                    <option value="">-- Select Country --</option>
                                    @foreach($countries as $country)
                                    <option @if($visa->country_id == $country->id) selected class="text-light bg-success" @endif value="{{$country->id}}">{{$country->name}}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="example-text-input"><span class="text-danger">*</span>Visa Name</label>
                                <input type="text" class="form-control" id="" value="{{optional($visa)->visa_title}}" required name="visa_title" required>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="example-text-input"><span class="text-danger">*</span>Number Of Visa</label>
                                        <input type="number" class="form-control" id="" value="{{optional($visa)->number_of_visa}}" name="number_of_visa" required>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="example-text-input"><span class="text-danger">*</span>Total Cost</label>
                                        <input type="number" class="form-control" id="" value="{{optional($visa)->total_cost}}" name="total_cost" required>
                                    </div>
                                </div>
                                <div class="col-md-12 p-2">
                                    <div class="row shadow rounded p-3 mb-2">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <h4>=> <b>Active Visa:</b> {{$active_visa}}</h4>
                                                <h4>=> <b>Rejected Visa:</b> {{$rejected_visa}}</h4>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="example-text-input"><span class="text-danger">*</span>Rest Number Of Visa</label>
                                                <input type="number" class="form-control" value="{{optional($visa)->rest_number_of_visa}}" name="rest_number_of_visa" required>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="example-text-input"><span class="text-danger">*</span>Status</label>
                                               <select class="form-control" name="is_active">
                                                   
                                                   <option @if($visa->is_active == 1) selected class="text-light bg-success" @endif  value="1">Active</option>
                                                   <option @if($visa->is_active == 0) selected class="text-light bg-success" @endif value="0">Reject</option>
                                               </select>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="example-text-input">Company Name</label>
                                        <textarea name="company_name" class="form-control" id="" cols="30" rows="2">{{optional($visa)->company_name}}</textarea>
                                    </div>
                                    <div class="form-group">
                                        <label for="example-text-input">Note</label>
                                        <textarea name="note" class="form-control" id="" cols="30" rows="5">{{optional($visa)->note}}</textarea>
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
    <!-- END Overview -->

</div>
<!-- END Page Content -->
@endsection
