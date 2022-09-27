@extends('layouts.app')

@section('title'){{'All Mobile Brands in Bangladesh | '. env('APP_NAME')}}@endsection
@section('description'){!!'All Mobile Brands in Bangladesh at TopMobileInfo.com'!!}@endsection
@section('keywords'){!!'top mobile brands in '.date('Y').', top phone brands, All Mobile Brands in Bangladesh at TopMobileInfo.com'!!}@endsection
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
                                <li class="breadcrumb-item active" aria-current="page">Brands</li>
                            </ol>
                        </nav>
                        <h2 class="fs-20"><b>All Mobile Brands in Bangladesh</b></h2>
                    </div>
                </div>
                <div class="row product-grid-3 ">
                    @foreach($brands as $brand)
                    <div class="col-md-3 col-6 p-1 align-item-center">
                        <div class="card-1 shadow pb-2 hover-up">
                        <a class="img-hover-scale overflow-hidden" width="100%" href="{{route('brand.info', ['brand_name'=>Str::slug($brand->name)])}}">
                            <figure class="mx-auto d-block">
                                <img src="{{asset($brand->image)}}" alt="{{$brand->name}}">
                            </figure>
                            <h4>{{$brand->name}}</h4>
                            <p class="fw-bold badge border anim-color p-1">{{DB::table('products')->where('brand_id', $brand->id)->count('id')}} Products</p>
                        </a>
                        </div>
                    </div>
                    @endforeach
                </div>

                <div class="widget-category mb-20 mt-20" id="latest_news_div">
                    <!-- This is ajax latest news body -->
                </div>
        </div>
            
            
            <div class="col-lg-4 primary-sidebar sticky-sidebar">
                <div class="row">
                    <div class="col-lg-12 col-mg-6"></div>
                    <div class="col-lg-12 col-mg-6"></div>
                </div>

                <!-- upcoming mobile phone Start -->
                @include('layouts.sidebar.upcoming_phone')
                <!-- upcoming mobile phone End -->

                
                <!-- Latest Product Compare Start -->
                <div class="widget-category mb-20 p-10">
                    <h4 class="section-title style-1 mb-30 wow fadeIn animated animated animated" style="visibility: visible;" title="Latest Compare  at Top mobile info">Latest Compare</h4>
                    <div class="product-list-small wow fadeIn animated animated animated row" style="visibility: visible;" id="latest_compare_output">
                        
                    </div>
                </div>
                <!-- Latest Product Compare End -->

                <!-- popular mobile phone Start -->
                @include('layouts.sidebar.popular_phones')
                <!-- popular mobile phone End -->

            </div>
        </div>
    </div>
</section>
@endsection

@section('page_script')
<script>
$(window).load(function() {
    latest_news_ajax_output();
    latest_compare_ajax_output();
});
</script>
@endsection


