@extends('layouts.app')

@section('title'){{'News, all Mobile Phone News in Bangladesh '.date('Y').' | '. env('APP_NAME')}}@endsection
@section('description'){!!'Latest official/unofficial Mobile Phones, Smartphones, Feature phones, Smart band and Watch News in Bangladesh '.date('Y').'. topmobileinfo news BD'!!}@endsection
@section('keywords') TopMobileInfo,news, updated news, technology news, topmobileinfo,phone,cellphone,information,info,list @endsection
@section('content')

<section class="mt-50 mb-50">
    <div class="container">
        <div class="row">
            <div class="col-lg-8">
                <div class="">
                    <div class="totall-product mb-3">
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{route('index')}}">Home</a></li>
                                <li class="breadcrumb-item active" aria-current="page">News</li>
                            </ol>
                        </nav>
                        <h2 class="fs-20"><b>News</b></h2>
                    </div>
                </div>
                <div class="row product-grid-3">
                    @foreach($posts as $post)
                    @include('layouts.partials.post')
                    @endforeach
                    <div class="col-md-12">
                        {{ $posts->links('vendor.pagination') }}
                        <small class="mt-1 fw-bold">Showing {{$posts->firstItem()}} to {{$posts->lastItem()}} of {{$posts->total()}} News</small>
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
                @include('layouts.sidebar.upcoming_phone')
                <!-- upcoming mobile phone End -->

                <!-- Phone Brands Start -->
                @include('layouts.sidebar.brands')
                <!-- Phone Brands End -->

                
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


