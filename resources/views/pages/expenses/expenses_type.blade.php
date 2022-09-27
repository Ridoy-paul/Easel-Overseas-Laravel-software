
@extends('cms.app')
@section('body_content')

<link href="https://cdn.datatables.net/1.10.16/css/jquery.dataTables.min.css" rel="stylesheet">
<link href="https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap4.min.css" rel="stylesheet">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>  
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.js"></script>
<script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
<script src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap4.min.js"></script>

<div class="content">
    <div class="block block-rounded">
        <div class="row p-3">
            <div class="col-md-6">
            <h4 class="">All Expenses Category</h4>
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
            </div>
            <div class="col-md-6 text-right">
                <button type="button" class="btn btn-primary btn-rounded" data-toggle="modal" data-target="#exampleModal">Add New Expenses Category</button>
            </div>
        </div>
        <div class="block-content">
            <div class="table-responsive">
            <table class="table table-bordered data-table display nowrap">
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Type</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($categories as $category)
                        <tr>
                            <td>{{$category->title}}</td>
                            <td>@if($category->expense_type == 'client') Client Expenses @else Company Expenses @endif</td>
                            <td><a href="{{route('expense.category.edit', $category->id)}}" class="btn btn-success btn-rounded btn-sm">Edit</a></td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            </div>
        </div>
    </div>
</div>
<!-- END Page Content -->

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header bg-dark">
        <h5 class="modal-title text-light" id="exampleModalLabel">Add New Expenses Category</h5>
        <button type="button" class="close text-light" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="{{route('expense.category.store')}}" method="post" enctype="multipart/form-data" class="">
            @csrf
            <div class="row">
                <div class="col-md-12">
                    <div class="form-group">
                        <label for="example-text-input-alt"><span class="text-danger">*</span>Category Name</label>
                        <input type="text" class="form-control " name="title" value="{{old('name')}}" required="">
                    </div>
                    <div class="form-group">
                        <label for="example-text-input-alt"><span class="text-danger">*</span>Expenses Type</label>
                        <select class="form-control" id="" name="expense_type">
                            <option value="">-- Select One --</option>
                            <option value="client">Client Expenses</option>
                            <option value="company">Company Expenses</option>
                            <option value="agent">Agent Expenses</option>
                        </select>
                    </div>
                    <div class="form-group text-right">
                        <button type="submit" class="btn btn-success">Submit</button>
                    </div>
                </div>
            </div>
        </form>
      </div>
    </div>
  </div>
</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>  
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.js"></script>
<script src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
<script src="https://cdn.datatables.net/1.10.21/js/dataTables.bootstrap4.min.js"></script>


@endsection
