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
                    <form action="{{route('expense.category.update', $category->id)}}" method="post">
                    @csrf
                    <div class="block-content font-size-sm">
                            <div class="form-group">
                                <h4><b>Edit Expenses Category</b></h4>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="example-text-input-alt"><span class="text-danger">*</span>Category Name</label>
                                        <input type="text" class="form-control " name="title" value="{{optional($category)->title}}" required="">
                                    </div>
                                    <div class="form-group">
                                        <label for="example-text-input-alt"><span class="text-danger">*</span>Expenses Type</label>
                                        <select class="form-control" id="" name="expense_type">
                                            <option value="">-- Select One --</option>
                                            <option @if($category->expense_type == 'client') selected class="text-light bg-success" @endif value="client">Client Expenses</option>
                                            <option @if($category->expense_type == 'client') selected class="text-light bg-success" @endif value="client">Client Expenses</option>
                                            <option @if($category->expense_type == 'agent') selected class="text-light bg-success" @endif value="agent">Agent Expenses</option>
                                        </select>
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
