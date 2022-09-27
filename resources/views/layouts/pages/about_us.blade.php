@extends('layouts.app')

@section('title')About Us | {{env('APP_NAME')}}@endsection
@section('description') latest updated ✓Official ✓Unofficial Price List in Bangladesh ✓Full Specifications ✓Rating ✓Review.@endsection
@section('keywords') TopMobileInfo,About us,topmobileinfo,phone,cellphone,information,info,list @endsection
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
                                <li class="breadcrumb-item active" aria-current="page">About Us</li>
                            </ol>
                        </nav>
                        <h2 class="fs-20"><b>About Us</b></h2>
                    </div>
                </div>
                <div class="row product-grid-3 ">
                    <div class="col-md-12">
                        {!!optional($settings)->about_us!!}
                    </div>
                </div>
            </div>
            
            <div class="col-lg-4 primary-sidebar sticky-sidebar">
                <div class="row">
                    <div class="col-lg-12 col-mg-6"></div>
                    <div class="col-lg-12 col-mg-6"></div>
                </div>

                 <!-- upcoming mobile phone Start -->
                 @include('layouts.sidebar.new_phones')
                <!-- upcoming mobile phone End -->

                <!-- popular mobile phone Start -->
                @include('layouts.sidebar.popular_phones')
                <!-- popular mobile phone End -->

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

