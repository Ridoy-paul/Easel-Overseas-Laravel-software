@extends('cms.app')
@section('body_content')
<!-- Page Content -->
<div class="content">
    
    <div class="block block-rounded">
        <div class="block-header">
            <h4 class="">Visa</h4>
            @error('visa_title')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
            <div class="block-options">
                <button type="button" class="btn btn-rounded btn-success push" data-toggle="modal" data-target="#modal-block-fadein">Add New Visa</button>
            </div>
        </div>
        
        <div class="block-content">
            <div class="table-responsive">
                <table width="100%" class="table table-bordered table-striped table-vcenter">
                    <thead>
                        <tr>
                            <th>SI</th>
                            <th>Visa Info</th>
                            <th>Country</th>
                            <th>Company Info</th>
                            <th>Satus</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php( $i = 1 )
                        @foreach($visas as $visa)
                        <tr>
                            <td>{{$i}}</em></td>
                            <td>
                                {{$visa->visa_title}}<br>
                                <small>
                                    <b class="text-success">Number of Visa: </b> {{$visa->number_of_visa}}<br>
                                    <b class="text-success">Rest Number of Visa: </b> {{$visa->rest_number_of_visa}}<br>
                                    <b class="text-success">Visa Cost: </b> {{$visa->total_cost}}<br>
                                    <b class="text-success">Individual Cost: </b> {{$visa->individual_cost}}<br>
                                    <b class="text-info">Note: </b> {{$visa->note}}
                                </small>
                            </td>
                            <td>{{$visa->country->name}}</em></td>
                            <td>{{$visa->company_name}}</em></td>
                            <td>
                                @if($visa->is_active == 1)
                                <span class="text-success">Active</span>
                                @else
                                <span class="text-danger">Rejected</span>
                                @endif
                            </td>
                            <td>
                                <a type="button" href="{{url('/edit-visa/'.$visa->id)}}" class="btn btn-sm btn-info" data-toggle="tooltip" title="Edit">Edit</a>
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
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="block block-rounded block-themed block-transparent mb-0">
            <form action="{{route('visa.store')}}" method="post">
                @csrf
                <div class="block-header bg-primary-dark">
                    <h3 class="block-title text-light">Add New Visa</h3>
                    <div class="block-options">
                        <button type="button" class="btn-block-option" data-dismiss="modal" aria-label="Close">
                            <i class="fa fa-fw fa-times"></i>
                        </button>
                    </div>
                </div>
                <div class="block-content font-size-sm">
                    <div class="form-group">
                        <label for="example-text-input-alt"><span class="text-danger">*</span>Country</label>
                        <select name="country_id" id="" class="form-control select2" required data-live-search="true">
                            <option value="">-- Select Country --</option>
                            @foreach($countries as $country)
                            <option  value="{{$country->id}}">{{$country->name}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="example-text-input"><span class="text-danger">*</span>Visa Name</label>
                        <input type="text" class="form-control" id="" required name="visa_title" required>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="example-text-input"><span class="text-danger">*</span>Number Of Visa</label>
                                <input type="number" class="form-control" id="" required name="number_of_visa" required>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="example-text-input"><span class="text-danger">*</span>Total Cost</label>
                                <input type="number" class="form-control" id="" required name="total_cost" required>
                            </div>
                        </div>
                        <div class="col-md-12">
                        <div class="form-group">
                                <label for="example-text-input">Company Name</label>
                                <textarea name="company_name" class="form-control" id="" cols="30" rows="2"></textarea>
                            </div>
                            <div class="form-group">
                                <label for="example-text-input">Note</label>
                                <textarea name="note" class="form-control" id="" cols="30" rows="5"></textarea>
                            </div>
                            
                        </div>
                        
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
