@extends('layouts.app')

@section('title'){{'Upcoming Phones in Bangladesh '.date('Y').'| '. env('APP_NAME')}}@endsection
@section('description'){!!'Upcoming Phones in Bangladesh '.date('Y').', Upcoming Phones in '.date('Y').', Upcoming Mobiles in '.date('Y').', Coming soon mobiles'!!}@endsection
@section('keywords'){!!'Upcoming Phones in Bangladesh '.date('Y').', Upcoming Phones in '.date('Y').', Upcoming Mobiles in '.date('Y').', Coming soon mobiles'!!}@endsection

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
                                <li class="breadcrumb-item active" aria-current="page">Upcoming Phones</li>
                            </ol>
                        </nav>
                        <h2 class="fs-20"><b>Upcoming Phones</b></h2>
                    </div>
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
        </div>
            
            <div class="col-lg-4 primary-sidebar sticky-sidebar">
                <div class="row">
                    <div class="col-lg-12 col-mg-6"></div>
                    <div class="col-lg-12 col-mg-6"></div>
                </div>
                
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

                <!-- Phone Brands Start -->
                @include('layouts.sidebar.brands')
                <!-- Phone Brands End -->

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


