@extends('cms.app')
@section('body_content')
<style>
    tr td {
        font-size: 14px;
    }
</style>
<!-- Page Content -->
<div class="content">
    <div class="block block-rounded">
        <div class="block-header">
            <h4 class="">Business Owners</h4>
            <div class="block-options">
                <button type="button" class="btn btn-rounded btn-success push" data-toggle="modal" data-target="#modal-block-fadein">Add</button>
            </div>
        </div>
        
        <div class="block-content">
            <div class="table-responsive">
                <table width="100%" class="table table-bordered table-striped table-vcenter">
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>Phone</th>
                            <th>NID Num.</th>
                            <th>Address</th>
                            <th>B Portion</th>
                            <th class="text-center">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($capital_persons as $person)
                        <tr>
                            <td>{{$person->name}}</em></td>
                            <td>{{$person->phone}}</em></td>
                            <td>{{optional($person)->nid_number}}</em></td>
                            <td>{{optional($person)->address}}</em></td>
                            <td>{{optional($person)->business_portion}} %</em></td>
                            <td class="text-center" width="15%">
                                <a type="button" href="{{route('admin.edit.capital.person', ['id'=>$person->id])}}" class="btn btn-rounded btn-sm btn-primary" data-toggle="tooltip" title="Edit"><i class="fa fa-fw fa-pencil-alt"></i></a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<!-- END Page Content -->

<!-- Fade In Block Modal -->
<div class="modal fade" id="modal-block-fadein" tabindex="-1" role="dialog" aria-labelledby="modal-block-fadein" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="block block-rounded block-themed block-transparent mb-0">
            <form action="{{route('admin.create.new.capital.person')}}" method="post">
                @csrf
                <div class="block-header bg-primary-dark">
                    <h3 class="block-title text-light">Business Owners / Capital Persons</h3>
                    <div class="block-options">
                        <button type="button" class="btn-block-option" data-dismiss="modal" aria-label="Close">
                            <i class="fa fa-fw fa-times"></i>
                        </button>
                    </div>
                </div>
                <div class="block-content font-size-sm">
                    <div class="form-group">
                        <label for="example-text-input">Name</label>
                        <input type="text" class="form-control" id="" required name="name" >
                    </div>
                    <div class="form-group">
                        <label for="example-text-input">Phone</label>
                        <input type="text" class="form-control" id="" required name="phone" >
                    </div>
                    <div class="form-group">
                        <label for="example-text-input">NID Num.</label>
                        <input type="text" class="form-control" id="" name="nid_number" >
                    </div>
                    <div class="form-group">
                        <label for="example-text-input">Address</label>
                        <input type="text" class="form-control" id="" name="address" >
                    </div>
                    <div class="form-group">
                        <label for="example-text-input">Business Portion[%] (if null type 0 )</label>
                        <input type="number" class="form-control" required name="business_portion" step=any>
                    </div>
                </div>
                <div class="block-content block-content-full text-right border-top">
                <input type="hidden" class="form-control" value="0" required name="opening_capital" step=any>
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
