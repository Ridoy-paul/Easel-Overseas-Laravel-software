@extends('layouts.app')

@section('title'){{'Mobile Phone Price Range in '.date('Y').' | '. env('APP_NAME')}}@endsection
@section('description'){!!'Best, Latest Mobile Phone Price Range in Bangladesh '.date('Y').' at TopMobileInfo.com'!!}@endsection
@section('keywords'){!!'Latest phone price in Bangladesh, Best, Latest Mobile Phone Price Range in Bangladesh '.date('Y').' at TopMobileInfo.com'!!}@endsection

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
                                <li class="breadcrumb-item active" aria-current="page">Price Range</li>
                            </ol>
                        </nav>
                        <h2 class="fs-20"><b>Mobile Phone Price Range in {{date('Y')}}</b></h2>
                    </div>
                </div>
                <div class="row product-grid-3 pt-20 pb-20">
                    <div class="col-md-12 col-12">
                        <table class="table">
                            <tbody>
                                @foreach($price_range as $price)
                                <tr>
                                    <th width="60%"><h4><a title="{{$price->title}}" class="text-info" href="{{route('price.range', ['start_price'=>$price->start_price, 'end_price'=>$price->end_price])}}">{{$price->title}}</a></h4></th>
                                    <td><p class=""><a title="{{$price->title}}" class="fw-bold h4 color-animation p-1" href="{{route('price.range', ['start_price'=>$price->start_price, 'end_price'=>$price->end_price])}}">{{App\Models\PriceRange::total_products($price->start_price, $price->end_price)}} Products</a></p></td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
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
