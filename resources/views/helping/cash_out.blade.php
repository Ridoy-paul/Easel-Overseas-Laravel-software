@extends('layouts.app')
@section('body_content')
<div class="content">
    <div class="row row-deck">
        <div class="col-md-12"><h4>Cash Out</h4></div>
        <div class="col-sm-12 col-xl-12">
            <div class="block block-rounded d-flex flex-column">
                <div class="block-content block-content-full justify-content-between align-items-center">
                <form action="{{route('cash.out.confirm')}}" method="post">
                    @csrf
                    <div class="row">
                        <div class="col-md-8">
                            <div class="form-group">
                                <label for="example-text-input-alt"><span class="text-danger">*</span>Amount</label>
                                <input type="number" step=any class="form-control" value='' name="amount" required>
                                @error('amount')
                                    <span class="text-danger">{{ $amount }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="example-text-input-alt"><span class="text-danger">*</span>Date</label>
                                <input type="date" value="{{date('Y-m-d')}}" class="form-control"  name="date" required>
                                @error('amount')
                                    <span class="text-danger">{{ $amount }}</span>
                                @enderror
                            </div>
                        </div>
                    </div>
                        <div class="form-group">
                            <label for="example-text-input-alt"><span class="text-danger"></span>Note</label>
                            <textarea name="note"  class="form-control" id="" cols="30" rows="3"></textarea>
                        </div>
                        <div class="form-group text-right">
                            <button type="submit" class="btn btn-danger">Confirm Cash Out</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
