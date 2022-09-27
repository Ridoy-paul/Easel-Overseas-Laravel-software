@extends('layouts.app')

@section('title')Contact Us | {{env('APP_NAME')}}@endsection
@section('description') latest updated ✓Official ✓Unofficial Price List in Bangladesh ✓Full Specifications ✓Rating ✓Review.@endsection
@section('keywords') TopMobileInfo,Contact Us,topmobileinfo,phone,cellphone,information,info,list @endsection
@section('content')

<section class="mt-30 mb-50">
    <div class="container">
        <div class="row">
            <div class="col-lg-8">
                <div class="">
                    <div class="totall-product mb-3">
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{route('index')}}">Home</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Contact Us</li>
                            </ol>
                        </nav>
                        <h2 class="fs-20"><b>Contact Us</b></h2>
                    </div>
                </div>
                <div class="row product-grid-3 ">
                    <div class="col-md-12">
                        <p>Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classical literature, discovered the undoubtable source. Lorem Ipsum comes from sections 1.10.32 and 1.10.33 of "de Finibus Bonorum et Malorum" (The Extremes of Good and Evil) by Cicero, written in 45 BC. This book is a treatise on the theory of ethics, very popular during the Renaissance. The first line of Lorem Ipsum, "Lorem ipsum dolor sit amet..", comes from a line in section 1.10.32.</p>

                        @if(session('form_submitted'))
                            <div class="text-center text-success mt-4 bg-dark p-2 rounded">
                                <h3><b class="text-success">Message Sent Successfully.</b></h3>
                            </div>
                        @else
                        <form class="p-4 shadow rounded mt-2" action="{{route('contact.us.submit')}}" method="POST">
                            @csrf
                            <div class="form-group">
                                <label for="" class="form-label"><span class="text-success">*</span>Full Name</label>
                                <input type="text" class="form-control" name="name" id="" required>
                                @error('name')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="row">
                                <div class="form-group col-md-6">
                                    <label for="" class="form-label"><span class="text-success">*</span>Email</label>
                                    <input type="email" class="form-control" name="email" id="" required>
                                    @error('email')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="" class="form-label">Phone (optional)</label>
                                    <input type="text" class="form-control" name="phone" id="" >
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="" class="form-label"><span class="text-success">*</span>Message</label>
                                <textarea style="min-height: 100px;" name="message" class="form-control" id="" cols="30" rows="10" required></textarea>
                                @error('message')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </form>
                        @endif
                    </div>
                </div>
            </div>
            
            <div class="col-lg-4 primary-sidebar sticky-sidebar">
                <div class="row">
                    <div class="col-lg-12 col-mg-6"></div>
                    <div class="col-lg-12 col-mg-6"></div>
                </div>

                <!-- popular mobile phone Start -->
                @include('layouts.sidebar.popular_phones')
                <!-- popular mobile phone End -->

                <!-- upcoming mobile phone Start -->
                @include('layouts.sidebar.new_phones')
                <!-- upcoming mobile phone End -->

                <!-- Latest Product Compare Start -->
                <div class="widget-category mb-20 p-10">
                    <h4 class="section-title style-1 mb-30 wow fadeIn animated animated animated" style="visibility: visible;" title="Latest Compare  at Top mobile info">Latest Compare</h4>
                    <div class="product-list-small wow fadeIn animated animated animated row" style="visibility: visible;" id="latest_compare_output">
                        
                    </div>
                </div>
                <!-- Latest Product Compare End -->

            </div>
        </div>
    </div>
</section>
@endsection

@section('page_script')
<script>
$(window).load(function() {
    latest_compare_ajax_output();
});
</script>
@endsection


