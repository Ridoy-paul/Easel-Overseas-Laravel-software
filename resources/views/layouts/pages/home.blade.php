@extends('layouts.app')

@section('title'){{'Mobile phone price in Bangladesh '.date('Y').' | '. env('APP_NAME')}}@endsection
@section('description'){!!'Latest official/unofficial Mobile updated prices in Bangladesh '.date('Y').'. Android, smartphone, feature phone, updated price, full specs, news, reviews, compare at TopMobileInfo.com'!!}@endsection
@section('content')
<section class="mt-50 mb-50">
    <div class="container">
        <div class="row">
            <div class="col-lg-8">
                <div class="shop-product-fillter">
                    <div class="totall-product">
                        <h2 class="fs-20" title="Latest phone at Top mobile info"><b>Latest phones</b></h2>
                    </div>
                    {{--
                    <div class="sort-by-product-area">
                        <div class="sort-by-cover mr-10">
                            <div class="sort-by-product-wrap">
                                <div class="sort-by">
                                    <span><i class="fi-rs-apps"></i></span>
                                </div>
                                <div class="sort-by-dropdown-wrap">
                                    <span> Price Range <i class="fi-rs-angle-small-down"></i></span>
                                </div>
                            </div>
                            <div class="sort-by-dropdown">
                                <ul>
                                    <li><a class="active" href="#">50</a></li>
                                    <li><a href="#">100</a></li>
                                    <li><a href="#">150</a></li>
                                    <li><a href="#">200</a></li>
                                    <li><a href="#">All</a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="sort-by-cover">
                            <div class="sort-by-product-wrap">
                                <div class="sort-by">
                                    <span><i class="fi-rs-apps"></i></span>
                                </div>
                                <div class="sort-by-dropdown-wrap">
                                    <span> Select Brands <i class="fi-rs-angle-small-down"></i></span>
                                </div>
                            </div>
                            <div class="sort-by-dropdown">
                                <ul>
                                    <li><a class="" href="#">Featured</a></li>
                                    <li><a href="#">Price: Low to High</a></li>
                                    <li><a href="#">Price: High to Low</a></li>
                                    <li><a href="#">Release Date</a></li>
                                    <li><a href="#">Avg. Rating</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    --}}
                </div>
                <div class="row product-grid-3">
                    @foreach($products as $product)
                    @include('layouts.partials.product')
                    @endforeach
                    <div class="col-md-12">
                        {{ $products->links('vendor.pagination') }}
                        <small class="mt-1 fw-bold">Showing {{$products->firstItem()}} to {{$products->lastItem()}} of {{$products->total()}} Mobiles</small>
                    </div>
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
    latest_news_ajax_output();
    latest_compare_ajax_output();
});
</script>
@endsection


