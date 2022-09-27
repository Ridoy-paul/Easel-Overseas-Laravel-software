@extends('layouts.app')

@section('title'){{''.optional($product_info)->title.' Price in Bangladesh '.date('Y').', Full Specs & Review | '. env('APP_NAME')}}@endsection
@section('description'){!!''.optional($product_info)->title.' Price in Bangladesh '.date('Y').'. Full specification of '.optional($product_info)->title.' with ✓Official ✓Unofficial BD Price ✓Rating ✓Review ✓Compare.'!!}@endsection
@section('keywords'){{optional($product_info)->keywords}}@endsection
@section('og_image'){{asset(optional($product_info)->image)}}@endsection

@section('content')
@php

$product_fetures = $product_info->fetures;

$avg_ratings = (optional($product_info)->design_rating + optional($product_info)->camera_rating + optional($product_info)->connectivity_rating + optional($product_info)->features_rating + optional($product_info)->hardware_rating + optional($product_info)->performance_rating + optional($product_info)->battery_rating + optional($product_info)->usability_rating) / 8;

$c_status = 0;

if(Cookie::get('shopping_cart')) {
    $cookie_data = stripslashes(Cookie::get('shopping_cart'));
    if(in_array(optional($product_info)->id, array_column(json_decode($cookie_data, true), 'pid'))){
        $c_status = 1;
    }
}


@endphp
<style>
    .fs-18 {
        font-size: 18px !important;
    }
    .add-compare {
        border-radius: 0px !important;
        text-align: left !important;
    }
    .additonal_info {
        background-color: #046963;
        color: #ffffff;
        padding: 10px;
        font-size: 15px;
    }
    
    .icon-info {
        font-size: 20px !important;
        font-weight: bold !important;
        color: #ffffff;
        margin-top: 2px !important;

    }
    .bg-dark-green {
        background-color: #046963;
    }

    .bg-light-green {
        background: linear-gradient(to left, #ffffff 50%, #046963 50%) right;
        background-size: 200%;
        transition: .5s ease-out;
    }
    .bg-light-green:hover {
        background-position: left;
        color: #ffffff !important;
    }

    .aps-group-title {
        margin-left: 2px !important;
    }

    .entry-meta i {
        font-size: 25px;
        margin-right: 10px;
    }

    .category-title {
        color: #4F5D77 !important;
    }
    
    .progress-bar {
        width: 0;
    }

    .progress .progress-bar {
        transition: unset;
    }

    .c-ass {
        color: #4F5D77 !important;
    }
    .fs-25 {
        font-size: 25px !important;
    }

    .width-55 {
        width: 55px !important;
        border-radius: 15px !important;
    }

    a.social-button {
        background-color: #243851 !important;
        color: #ffffff !important;
        padding: 5px;
        font-size: 20px !important;
    }

    a.social-button:hover {
        background-color: #F93A08 !important;
    }

    
</style>
<section class="mt-50 mb-50">
    <div class="container">
        <div class="row">
            <div class="col-lg-8">
                
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{route('index')}}">Home</a></li>
                        <li class="breadcrumb-item"><a href="{{route('brand.info', ['brand_name' => Str::slug(optional($product_info->brandInfo)->name)])}}" target="_blank" title="{{optional($product_info->brandInfo)->name}}">{{optional($product_info->brandInfo)->name}}</a></li>
                        <li class="breadcrumb-item active" aria-current="page">{{optional($product_info)->title}}</li>
                    </ol>
                </nav>
                <div class="product-detail accordion-detail">
                    <div class="row mb-50">
                        <div class="col-md-6 col-sm-12 col-xs-12">
                            <div class="detail-gallery">
                                <span class="zoom-icon"><i class="fi-rs-search"></i></span>
                                <!-- MAIN SLIDES -->
                                <div class="product-image-slider">
                                    @foreach($product_info->gallreies as $gallery)
                                    <figure class="border-radius-10">
                                        <img src="{{asset($gallery->image)}}" alt="product image">
                                    </figure>
                                    @endforeach
                                </div>
                                <!-- THUMBNAILS -->
                                <div class="slider-nav-thumbnails pl-15 pr-15">
                                    @foreach($product_info->gallreies as $gallery)
                                    <div><img src="{{asset($gallery->image)}}" alt="product image"></div>
                                    @endforeach
                                </div>
                            </div>
                            <!-- End Gallery -->
                        </div>

                        <div class="col-md-6 col-sm-12 col-xs-12">
                            <div class="detail-info">
                                <h2 class="title-detail">{{optional($product_info)->title}}</h2>
                                <div class="product_sort_info font-xs mb-30">
                                    <ul>
                                        <li class="mb-5 fs-18">
                                            @if(optional($product_info)->coming_soon_status == 1)
                                                UPCOMING
                                            @elseif(optional($product_info)->is_rumored == 1)
                                                RUMORED
                                            @else
                                                @foreach($product_info->prices as $price)
                                                <span class="fw-bold text-brand">৳ {{number_format($price->price)}}</span>  @if(!empty($price->discount_price))<del class="text-danger">৳ {{number_format($price->discount_price)}}</del>@endif   {{$price->variant}} <br>
                                                @endforeach
                                            @endif

                                        </li>
                                        <li class="mb-5"><span class="fw-bold">Brand:</span> <a href="{{route('brand.info', ['brand_name' => Str::slug(optional($product_info->brandInfo)->name)])}}" target="_blank" title="{{optional($product_info->brandInfo)->name}}">{{optional($product_info->brandInfo)->name}}</a></li>
                                        <li class="mb-5">
                                            <div class="custome-checkbox add-compare"  style="background-color: #ffffff;">
                                                <input class="form-check-input" onclick="comp({{$product_info->id}})" type="checkbox" {{$c_status == 1? 'checked' : ''}} name="checkbox" id="p{{$product_info->id}}">
                                                <label class="form-check-label" for="p{{$product_info->id}}"><span id="ps{{$product_info->id}}">{{$c_status == 1? 'Added To Compare' : 'Add To Compare'}}</span></label>
                                            </div>
                                        </li>
                                        <li>
                                        <div class="row pl-10 pr-10 mb-5">
                                                <div class="col-md-2 col-2 bg-dark-green text-center pt-5" >
                                                    <i class="fas fa-calendar-check icon-info"></i>
                                                </div>
                                                <div class="col-md-10 col-10 bg-light-green pt-5 text-dark shadow">
                                                    <strong>Released</strong>: <span>{{optional($product_info)->coming_soon_status == 1? 'UPCOMING': date('d M, Y', strtotime(optional($product_info)->release_date))}}</span>
                                                </div>
                                            </div>
                                            <div class="row pl-10 pr-10 mb-5">
                                                <div class="col-md-2 col-2 bg-dark-green text-center pt-5" >
                                                    <i class="fab fa-apple icon-info"></i>
                                                </div>
                                                <div class="col-md-10 col-10 bg-light-green pt-5 text-dark shadow">
                                                    <strong>OS</strong>: <span>{{optional($product_info)->os}}</span>
                                                </div>
                                            </div>
                                            <div class="row pl-10 pr-10 mb-5">
                                                <div class="col-md-2 col-2 bg-dark-green text-center pt-5" >
                                                    <i class="fas fa-mobile-alt icon-info"></i>
                                                </div>
                                                <div class="col-md-10 col-10 bg-light-green pt-5 text-dark shadow">
                                                    <strong>Display</strong>: <span>{{optional($product_info)->display}}</span>
                                                </div>
                                            </div>
                                            <div class="row pl-10 pr-10 mb-5">
                                                <div class="col-md-2 col-2 bg-dark-green text-center pt-5" >
                                                    <i class="fas fa-camera icon-info"></i>
                                                </div>
                                                <div class="col-md-10 col-10 bg-light-green pt-5 text-dark shadow">
                                                    <strong>Camera</strong>: <span>{{optional($product_info)->camera}}</span>
                                                </div>
                                            </div>
                                            <div class="row pl-10 pr-10 mb-5">
                                                <div class="col-md-2 col-2 bg-dark-green text-center pt-5" >
                                                    <i class="fas fa-memory icon-info"></i>
                                                </div>
                                                <div class="col-md-10 col-10 bg-light-green pt-5 text-dark shadow">
                                                    <strong>RAM</strong>: <span>{{optional($product_info)->ram}}</span>
                                                </div>
                                            </div>
                                            <div class="row pl-10 pr-10 mb-5">
                                                <div class="col-md-2 col-2 bg-dark-green text-center pt-5" >
                                                    <i class="fas fa-battery-full icon-info"></i>
                                                </div>
                                                <div class="col-md-10 col-10 bg-light-green pt-5 text-dark shadow">
                                                    <strong>Battery</strong>: <span>{{optional($product_info)->battery}}</span>
                                                </div>
                                            </div>
                                            <div class="row pl-10 pr-10 mb-5">
                                                <div class="col-md-2 col-2 bg-dark-green text-center pt-5" >
                                                    <i class="fas fa-wifi icon-info"></i>
                                                </div>
                                                <div class="col-md-10 col-10 bg-light-green pt-5 text-dark shadow">
                                                    <strong>Network</strong>: <span>{{optional($product_info)->network}}</span>
                                                </div>
                                            </div>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <!-- Detail Info -->
                        </div>

                        <div class="col-md-12">
                            <div class="shadow border p-1">
                                <div class="row p-2">
                                    <div class="col-md-9 col-lg-9 col-9">
                                    <h2 class="post-title">Our Ratings</h2>
                                    <small class="mb-4">The overall rating is based on review by our experts</small>
                                    </div>
                                    <div class="col-md-3 col-lg-3 col-3 text-center">
                                        <div class="rounded-pill shadow p-2 border">
                                            <h3>{{number_format($avg_ratings, 1)}}</h3>
                                        </div>
                                    </div>

                                    <div class="col-md-3 col-lg-3 p-1">
                                        <div class="shadow p-2 hover-up">
                                            <div class="entry-meta meta-1 font-xs color-grey mt-10 pb-10">
                                                <div>
                                                    <strong>Design</strong>
                                                </div>
                                                <strong>{{optional($product_info)->design_rating}}/10</strong>
                                            </div>
                                            <div class="progress border">
                                                <div class="progress-count progress-bar @if(optional($product_info)->design_rating >= 8) bg-success @elseif(optional($product_info)->design_rating >= 4) bg-primary @else bg-danger @endif" role="progressbar" aria-valuenow="{{optional($product_info)->design_rating}}0" aria-valuemin="0" aria-valuemax="100">{{optional($product_info)->design_rating}}</div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-3 col-lg-3 p-1">
                                        <div class="shadow p-2 hover-up">
                                            <div class="entry-meta meta-1 font-xs color-grey mt-10 pb-10">
                                                <div>
                                                    <strong>Display</strong>
                                                    <!-- hardware is used as dispaly ratings -->
                                                </div>
                                                <strong>{{optional($product_info)->hardware_rating}}/10</strong>
                                            </div>
                                            <div class="progress border">
                                                <div class="progress-count progress-bar @if(optional($product_info)->hardware_rating >= 8) bg-success @elseif(optional($product_info)->hardware_rating >= 4) bg-primary @else bg-danger @endif" role="progressbar" aria-valuenow="{{optional($product_info)->hardware_rating}}0" aria-valuemin="0" aria-valuemax="100">{{optional($product_info)->hardware_rating}}</div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-3 col-lg-3 p-1">
                                        <div class="shadow p-2 hover-up">
                                            <div class="entry-meta meta-1 font-xs color-grey mt-10 pb-10">
                                                <div>
                                                    <strong>Camera</strong>
                                                </div>
                                                <strong>{{optional($product_info)->camera_rating}}/10</strong>
                                            </div>
                                            <div class="progress border">
                                                <div class="progress-count progress-bar @if(optional($product_info)->camera_rating >= 8) bg-success @elseif(optional($product_info)->camera_rating >= 4) bg-primary @else bg-danger @endif" role="progressbar" aria-valuenow="{{optional($product_info)->camera_rating}}0" aria-valuemin="0" aria-valuemax="100">{{optional($product_info)->camera_rating}}</div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-3 col-lg-3 p-1">
                                        <div class="shadow p-2 hover-up">
                                            <div class="entry-meta meta-1 font-xs color-grey mt-10 pb-10">
                                                <div>
                                                    <strong>Connectivity</strong>
                                                </div>
                                                <strong>{{optional($product_info)->connectivity_rating}}/10</strong>
                                            </div>
                                            <div class="progress border">
                                                <div class="progress-count progress-bar @if(optional($product_info)->connectivity_rating >= 8) bg-success @elseif(optional($product_info)->connectivity_rating >= 4) bg-primary @else bg-danger @endif" role="progressbar" aria-valuenow="{{optional($product_info)->connectivity_rating}}0" aria-valuemin="0" aria-valuemax="100">{{optional($product_info)->connectivity_rating}}</div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-3 col-lg-3 p-1">
                                        <div class="shadow p-2 hover-up">
                                            <div class="entry-meta meta-1 font-xs color-grey mt-10 pb-10">
                                                <div>
                                                    <strong>Features</strong>
                                                </div>
                                                <strong>{{optional($product_info)->features_rating}}/10</strong>
                                            </div>
                                            <div class="progress border">
                                                <div class="progress-count progress-bar @if(optional($product_info)->features_rating >= 8) bg-success @elseif(optional($product_info)->features_rating >= 4) bg-primary @else bg-danger @endif" role="progressbar" aria-valuenow="{{optional($product_info)->features_rating}}0" aria-valuemin="0" aria-valuemax="100">{{optional($product_info)->features_rating}}</div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-3 col-lg-3 p-1">
                                        <div class="shadow p-2 hover-up">
                                            <div class="entry-meta meta-1 font-xs color-grey mt-10 pb-10">
                                                <div>
                                                    <strong>Performance</strong>
                                                </div>
                                                <strong>{{optional($product_info)->performance_rating}}/10</strong>
                                            </div>
                                            <div class="progress border">
                                                <div class="progress-count progress-bar @if(optional($product_info)->performance_rating >= 8) bg-success @elseif(optional($product_info)->performance_rating >= 4) bg-primary @else bg-danger @endif" role="progressbar" aria-valuenow="{{optional($product_info)->performance_rating}}0" aria-valuemin="0" aria-valuemax="100">{{optional($product_info)->performance_rating}}</div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-3 col-lg-3 p-1">
                                        <div class="shadow p-2 hover-up">
                                            <div class="entry-meta meta-1 font-xs color-grey mt-10 pb-10">
                                                <div>
                                                    <strong>Battery</strong>
                                                </div>
                                                <strong>{{optional($product_info)->battery_rating}}/10</strong>
                                            </div>
                                            <div class="progress border">
                                                <div class="progress-count progress-bar @if(optional($product_info)->battery_rating >= 8) bg-success @elseif(optional($product_info)->battery_rating >= 4) bg-primary @else bg-danger @endif" role="progressbar" aria-valuenow="{{optional($product_info)->battery_rating}}0" aria-valuemin="0" aria-valuemax="100">{{optional($product_info)->battery_rating}}</div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-3 col-lg-3 p-1">
                                        <div class="shadow p-2 hover-up">
                                            <div class="entry-meta meta-1 font-xs color-grey mt-10 pb-10">
                                                <div>
                                                    <strong>Usability</strong>
                                                </div>
                                                <strong>{{optional($product_info)->usability_rating}}/10</strong>
                                            </div>
                                            <div class="progress border">
                                                <div class="progress-count progress-bar @if(optional($product_info)->usability_rating >= 8) bg-success @elseif(optional($product_info)->usability_rating >= 4) bg-primary @else bg-danger @endif" role="progressbar" aria-valuenow="{{optional($product_info)->usability_rating}}0" aria-valuemin="0" aria-valuemax="100">{{optional($product_info)->usability_rating}}</div>
                                            </div>
                                        </div>
                                    </div>
                                    
                                </div>
                            </div>
                        </div>

                        <div class="col-md-12 w-100 mb-10">
                            <hr>
                            <h1 class="fs-25">{{optional($product_info)->title}} Full Specifications and Price in Bangladesh</h1>
                            <hr>
                            @foreach($categories as $category)
                            <div class="w-100 border rounded p-1 shadow mt-3">
                                <div class="entry-meta meta-1 font-xs color-grey mt-2 pb-2">
                                    <div><h3 class="ml-2 category-title">{{$category->title}}</h3></div>
                                    {!!$category->icon!!}
                                </div>
                                <table class="font-md table-hover table rounded">
                                    <tbody>
                                        @foreach($category->feture_lists as $item)
                                        @php( $feture_info = $product_fetures->where('features_category_item_id', $item->id)->first() )
                                        @if(!is_null($feture_info) || $item->is_icon == 1)
                                        <tr style="width: 100% !important;">
                                            <th  style="width: 25% !important;"><span class="fw-bold" title="{{$item->short_description}}">{{$item->name}}</span></th>
                                            <td>
                                                <p>
                                                    @if(is_null(optional($feture_info)->info) && $item->is_icon == 1)
                                                    ❌
                                                    @elseif(!is_null(optional($feture_info)->info) && $item->is_icon == 1)
                                                        ✅ {!!optional($feture_info)->info!!}
                                                    @else
                                                        {!!optional($feture_info)->info!!}
                                                    @endif
                                                
                                                </p>
                                            </td>
                                        </tr>
                                        @endif
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                            @endforeach
                        </div>
                        <!-- product Fetures -->

                        <!-- product description -->
                        <div class="col-md-12 w-100 mb-10">
                            <h1 class="c-ass fs-25 mt-5">{{optional($product_info)->title}} Price In Bangladesh {{date("M Y")}}</h1>
                            {!!optional($product_info)->description!!}
                        </div>
                        <!-- product description -->

                        <!-- product FAQ -->
                        <div class="col-md-12 w-100" id="product_faq_body">
                            
                        </div>
                        <!-- product FAQ -->

                        <div class="col-md-12 w-100 rounded p-1 text-center" style="background-color: #F4F4F4;">
                            <strong>Disclaimer: </strong> We do not guarantee that the information of this page is 100% accurate and up to date.
                        </div>


                        <div class="col-md-12 mt-3 shadow rounded p-3" style="background-color: #F8F9FA !important;">
                            <h1 class="c-ass fs-25 mt-5 mb-5">{{optional($product_info)->title}} Reviews</h1>
                            <div class="row">
                                @foreach($product_info->reviews as $review)
                                @php( $avg_review = ( optional($review)->design_rating + optional($review)->camera_rating + optional($review)->connectivity_rating + optional($review)->features_rating + optional($review)->hardware_rating + optional($review)->performance_rating + optional($review)->battery_rating + optional($review)->usability_rating) / 8)
                                <div class="col-md-12 mb-3 border-bottom">
                                    <div class="p-1">
                                        <div class="row p-2">
                                            <div class="col-md-9 col-lg-9 col-9">
                                            <h4 class="post-title">{{$review->name	}}</h4>
                                            <small class="mb-4">{{$review->review_text}}</small><br>
                                            <small><i class="fas fa-clock"></i> {{ \Carbon\Carbon::parse($review->created_at)->diffForhumans() }}</small>
                                            </div>
                                            <div class="col-md-3 col-lg-3 col-3 text-center">
                                                <div class="rounded-pill shadow p-2 border">
                                                    <h3>{{number_format($avg_review, 1)}}</h3>
                                                </div>
                                            </div>

                                            <div class="col-md-3 col-lg-3 p-1">
                                                <div class="shadow p-2 hover-up">
                                                    <div class="entry-meta meta-1 font-xs color-grey mt-10 pb-10">
                                                        <div>
                                                            <strong>Design</strong>
                                                        </div>
                                                        <strong>{{optional($review)->design_rating}}/10</strong>
                                                    </div>
                                                    <div class="progress border">
                                                        <div class="progress-bar user-progress @if(optional($review)->design_rating >= 8) bg-success @elseif(optional($review)->design_rating >= 4) bg-primary @else bg-danger @endif" role="progressbar" aria-valuenow="{{optional($review)->design_rating}}0" aria-valuemin="0" aria-valuemax="100">{{optional($review)->design_rating}}</div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-3 col-lg-3 p-1">
                                                <div class="shadow p-2 hover-up">
                                                    <div class="entry-meta meta-1 font-xs color-grey mt-10 pb-10">
                                                        <div>
                                                            <strong>Display</strong>
                                                            <!-- hardware is used as dispaly ratings -->
                                                        </div>
                                                        <strong>{{optional($review)->hardware_rating}}/10</strong>
                                                    </div>
                                                    <div class="progress border">
                                                        <div class="progress-bar user-progress @if(optional($review)->hardware_rating >= 8) bg-success @elseif(optional($review)->hardware_rating >= 4) bg-primary @else bg-danger @endif" role="progressbar" aria-valuenow="{{optional($review)->hardware_rating}}0" aria-valuemin="0" aria-valuemax="100">{{optional($review)->hardware_rating}}</div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-3 col-lg-3 p-1">
                                                <div class="shadow p-2 hover-up">
                                                    <div class="entry-meta meta-1 font-xs color-grey mt-10 pb-10">
                                                        <div>
                                                            <strong>Camera</strong>
                                                        </div>
                                                        <strong>{{optional($review)->camera_rating}}/10</strong>
                                                    </div>
                                                    <div class="progress border">
                                                        <div class="progress-bar user-progress @if(optional($review)->camera_rating >= 8) bg-success @elseif(optional($review)->camera_rating >= 4) bg-primary @else bg-danger @endif" role="progressbar" aria-valuenow="{{optional($review)->camera_rating}}0" aria-valuemin="0" aria-valuemax="100">{{optional($review)->camera_rating}}</div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-3 col-lg-3 p-1">
                                                <div class="shadow p-2 hover-up">
                                                    <div class="entry-meta meta-1 font-xs color-grey mt-10 pb-10">
                                                        <div>
                                                            <strong>Connectivity</strong>
                                                        </div>
                                                        <strong>{{optional($review)->connectivity_rating}}/10</strong>
                                                    </div>
                                                    <div class="progress border">
                                                        <div class="progress-bar user-progress @if(optional($review)->connectivity_rating >= 8) bg-success @elseif(optional($review)->connectivity_rating >= 4) bg-primary @else bg-danger @endif" role="progressbar" aria-valuenow="{{optional($review)->connectivity_rating}}0" aria-valuemin="0" aria-valuemax="100">{{optional($review)->connectivity_rating}}</div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-3 col-lg-3 p-1">
                                                <div class="shadow p-2 hover-up">
                                                    <div class="entry-meta meta-1 font-xs color-grey mt-10 pb-10">
                                                        <div>
                                                            <strong>Features</strong>
                                                        </div>
                                                        <strong>{{optional($review)->features_rating}}/10</strong>
                                                    </div>
                                                    <div class="progress border">
                                                        <div class="progress-bar user-progress @if(optional($review)->features_rating >= 8) bg-success @elseif(optional($review)->features_rating >= 4) bg-primary @else bg-danger @endif" role="progressbar" aria-valuenow="{{optional($review)->features_rating}}0" aria-valuemin="0" aria-valuemax="100">{{optional($review)->features_rating}}</div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-3 col-lg-3 p-1">
                                                <div class="shadow p-2 hover-up">
                                                    <div class="entry-meta meta-1 font-xs color-grey mt-10 pb-10">
                                                        <div>
                                                            <strong>Performance</strong>
                                                        </div>
                                                        <strong>{{optional($review)->performance_rating}}/10</strong>
                                                    </div>
                                                    <div class="progress border">
                                                        <div class="progress-bar user-progress @if(optional($review)->performance_rating >= 8) bg-success @elseif(optional($review)->performance_rating >= 4) bg-primary @else bg-danger @endif" role="progressbar" aria-valuenow="{{optional($review)->performance_rating}}0" aria-valuemin="0" aria-valuemax="100">{{optional($review)->performance_rating}}</div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-3 col-lg-3 p-1">
                                                <div class="shadow p-2 hover-up">
                                                    <div class="entry-meta meta-1 font-xs color-grey mt-10 pb-10">
                                                        <div>
                                                            <strong>Battery</strong>
                                                        </div>
                                                        <strong>{{optional($review)->battery_rating}}/10</strong>
                                                    </div>
                                                    <div class="progress border">
                                                        <div class="progress-bar user-progress @if(optional($review)->battery_rating >= 8) bg-success @elseif(optional($review)->battery_rating >= 4) bg-primary @else bg-danger @endif" role="progressbar" aria-valuenow="{{optional($review)->battery_rating}}0" aria-valuemin="0" aria-valuemax="100">{{optional($review)->battery_rating}}</div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-3 col-lg-3 p-1">
                                                <div class="shadow p-2 hover-up">
                                                    <div class="entry-meta meta-1 font-xs color-grey mt-10 pb-10">
                                                        <div>
                                                            <strong>Usability</strong>
                                                        </div>
                                                        <strong>{{optional($review)->usability_rating}}/10</strong>
                                                    </div>
                                                    <div class="progress border">
                                                        <div class="progress-bar user-progress @if(optional($review)->usability_rating >= 8) bg-success @elseif(optional($review)->usability_rating >= 4) bg-primary @else bg-danger @endif" role="progressbar" aria-valuenow="{{optional($review)->usability_rating}}0" aria-valuemin="0" aria-valuemax="100">{{optional($review)->usability_rating}}</div>
                                                    </div>
                                                </div>
                                            </div>
                                            
                                        </div>
                                    </div>
                                </div>
                                @endforeach
                            </div>

                            <div class="mt-5">
                                <div class="p-3 mt-5 rounded row">
                                    <div class="col-md-12 col-lg-12">
                                        <h3 class="post-title fw-bold fs-19">BE THE FIRST TO ADD A REVIEW</h3>
                                        <span>Please post a user review only if you have / had this product.</span>
                                        <hr>
                                    </div>
                                    
                                    <div class="col-md-12">
                                        <form action="javascript:void(0)" id="review_form" method="post">
                                            <div class="form-group row">
                                                <label for="staticEmail" class="col-sm-2 col-form-label fw-bold">Your Name<span class="text-danger">*</span></label>
                                                <div class="col-sm-10">
                                                    <input type="text" required class="form-control-plaintext" id="" name="name">
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="inputPassword" class="col-sm-2 col-form-label fw-bold">Your Email<span class="text-danger">*</span></label>
                                                <div class="col-sm-10">
                                                    <input type="email" required class="form-control" id="" name="email" >
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="inputPassword" class="col-sm-2 col-form-label fw-bold">Review Text<span class="text-danger">*</span></label>
                                                <div class="col-sm-10">
                                                    <textarea class="" id="review_text" name="review_text" rows="3" required></textarea>
                                                    <input type="hidden" name="product_id" value="{{optional($product_info)->id}}">
                                                </div>
                                            </div>
                                            
                                            <div class="form-group row">
                                                <div class="col-sm-2"></div>
                                                <div class="col-sm-10">
                                                    <h4>Rate this Product</h4>
                                                </div>
                                            </div>
                                            <div class="form-group row mt-1">
                                                <label for="inputPassword" class="col-sm-2 col-form-label fw-bold col-3">Design:</label>
                                                <div class="col-sm-8 col-7">
                                                    <input type="range" value="5" min="0" max="10" name="design_rating" id="design_rating">
                                                </div>
                                                <div class="col-sm-2 col-2">
                                                    <div class="infoabc text-center rounded shadow p-2 width-55">
                                                        <span id="design_rating_output" class="h4 fw-bold">5</span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group row mt-1">
                                                <label for="inputPassword" class="col-sm-2 col-form-label fw-bold col-3">Display:</label>
                                                <div class="col-sm-8 col-7">
                                                    <input type="range" value="5" min="0" max="10" name="hardware_rating" id="hardware_rating">
                                                </div>
                                                <div class="col-sm-2 col-2">
                                                    <div class="infoabc text-center rounded shadow p-2 width-55">
                                                        <span id="hardware_rating_output" class="h4 fw-bold">5</span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group row mt-1">
                                                <label for="inputPassword" class="col-sm-2 col-form-label fw-bold col-3">Camera:</label>
                                                <div class="col-sm-8 col-7">
                                                    <input type="range" value="5" min="0" max="10" name="camera_rating" id="camera_rating">
                                                </div>
                                                <div class="col-sm-2 col-2">
                                                    <div class="infoabc text-center rounded shadow p-2 width-55">
                                                        <span id="camera_rating_output" class="h4 fw-bold">5</span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group row mt-1">
                                                <label for="inputPassword" class="col-sm-2 col-form-label fw-bold col-3">Connectivity:</label>
                                                <div class="col-sm-8 col-7">
                                                    <input type="range" value="5" min="0" max="10" name="connectivity_rating" id="connectivity_rating">
                                                </div>
                                                <div class="col-sm-2 col-2">
                                                    <div class="infoabc text-center rounded shadow p-2 width-55">
                                                        <span id="connectivity_rating_output" class="h4 fw-bold">5</span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group row mt-1">
                                                <label for="inputPassword" class="col-sm-2 col-form-label fw-bold col-3">Features:</label>
                                                <div class="col-sm-8 col-7">
                                                    <input type="range" value="5" min="0" max="10" name="features_rating" id="features_rating">
                                                </div>
                                                <div class="col-sm-2 col-2">
                                                    <div class="infoabc text-center rounded shadow p-2 width-55">
                                                        <span id="features_rating_output" class="h4 fw-bold">5</span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group row mt-1">
                                                <label for="inputPassword" class="col-sm-2 col-form-label fw-bold col-3">Performance:</label>
                                                <div class="col-sm-8 col-7">
                                                    <input type="range" value="5" min="0" max="10" name="performance_rating" id="performance_rating">
                                                </div>
                                                <div class="col-sm-2 col-2">
                                                    <div class="infoabc text-center rounded shadow p-2 width-55">
                                                        <span id="performance_rating_output" class="h4 fw-bold">5</span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group row mt-1">
                                                <label for="inputPassword" class="col-sm-2 col-form-label fw-bold col-3">Battery:</label>
                                                <div class="col-sm-8 col-7">
                                                    <input type="range" value="5" min="0" max="10" name="battery_rating" id="battery_rating">
                                                </div>
                                                <div class="col-sm-2 col-2">
                                                    <div class="infoabc text-center rounded shadow p-2 width-55">
                                                        <span id="battery_rating_output" class="h4 fw-bold">5</span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group row mt-1">
                                                <label for="inputPassword" class="col-sm-2 col-form-label fw-bold col-3">Usability:</label>
                                                <div class="col-sm-8 col-7">
                                                    <input type="range" value="5" min="0" max="10" name="usability_rating" id="usability_rating">
                                                </div>
                                                <div class="col-sm-2 col-2">
                                                    <div class="infoabc text-center rounded shadow p-2 width-55">
                                                        <span id="usability_rating_output" class="h4 fw-bold">5</span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group row mt-1">
                                                <label for="inputPassword" class="col-sm-2 col-form-label fw-bold col-5">Average Rating</label>
                                                <div class="col-sm-9 col-7">
                                                    <div class="infoabc">
                                                        <span><span id="average_rating_output" class="h4 fw-bold rounded shadow p-2 width-55 text-center">5</span>/10 based on your selection</span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group" style="text-align: right;">
                                                <button type="submit" id="review_submit" class="btn btn-sm btn-rounded">Add Review</button>
                                                <h5 id="submit_processing" style="display: none;" class="text-success">Processing....</h5>
                                            </div>
                                            
                                        </form>
                                    </div>
                                    
                                </div>
                                </div>

                        </div>
                        <div class="mt-50 mb-30 row">
                            <div class="col-md-8 col-12">
                                <div class="tags">
                                    @foreach($product_info->tags as $tag)
                                    <a href="{{route('product.tag', ['t'=>Str::slug($tag->name)])}}" rel="tag" class="hover-up p-1 mr-10 btn mb-2" title="{{$tag->name}}">#{{$tag->name}}</a>
                                    @endforeach
                                </div>
                            </div>
                            <div class="col-md-4 col-12">
                                <div class="social-icons single-share text-center">
                                    <br class="d-lg-none">
                                    {!! Share::page(Request::url())->facebook()->twitter()->linkedin()->whatsapp()->telegram()->reddit() !!}
                                </div>
                            </div>
                        </div>




                    </div>
                </div>
            </div>
            
            <div class="col-lg-4 primary-sidebar sticky-sidebar">
                <div class="row">
                    <div class="col-lg-12 col-mg-6"></div>
                    <div class="col-lg-12 col-mg-6"></div>
                </div>

                <!-- Similar mobile phone Start -->
                <div class="widget-category mb-20 p-10" id="similar_phone_body"></div>

                <!-- upcoming mobile phone Start -->
                @include('layouts.sidebar.upcoming_phone')

                <!-- Similar news phone Start -->
                <div class="widget-category mb-20 p-10" id="similar_news_body"></div>

                <!-- Phone Brands Start -->
                @include('layouts.sidebar.brands')

                
                
                <input type="hidden" id="progress_status" value="0">
                <input type="hidden" id="product_id" value="{{optional($product_info)->id}}">
                <input type="hidden" id="faq_status" value="0">
                
            </div>
        </div>
    </div>
</section>
@endsection

@section('page_script')
<script>
var product_id = $('#product_id').val();


$(document).ready(function(){
calculate_user_ratings();
  $("input").change(function(){
    calculate_user_ratings();
  });

  $('#review_submit').click(function(e){
    if (document.getElementById("review_form").checkValidity()) { 
        e.preventDefault();
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $.ajax({
            url: "/submit_product_reviews",
            method: 'post',
            data: $('#review_form').serialize(),
            beforeSend: function() {
                $('#review_submit').hide();
                $('#submit_processing').show();
            },
            success: function(response){
                if(response == 1) {
                    $('#submit_processing').text("Review Added Successfully.");
                    location.reload();
                }
                else {
                    error('Network error! Please Try Again.');
                    $('#review_submit').show();
                    $('#submit_processing').hide();
                }
            }
        });
    }
    else {
        error('Something is missing');
    }
  });

  user_progress();


});

function calculate_user_ratings() {
    var design_rating = $('#design_rating').val();
        $('#design_rating_output').text(design_rating);
    var hardware_rating = $('#hardware_rating').val();
        $('#hardware_rating_output').text(hardware_rating);
    var camera_rating = $('#camera_rating').val();
        $('#camera_rating_output').text(camera_rating);
    var connectivity_rating = $('#connectivity_rating').val();
        $('#connectivity_rating_output').text(connectivity_rating);
    var features_rating = $('#features_rating').val();
        $('#features_rating_output').text(features_rating);
    var performance_rating = $('#performance_rating').val();
        $('#performance_rating_output').text(performance_rating);
    var battery_rating = $('#battery_rating').val();
        $('#battery_rating_output').text(battery_rating);
    var usability_rating = $('#usability_rating').val();
        $('#usability_rating_output').text(usability_rating);

    var avg_rating = ( parseInt(design_rating) + parseInt(hardware_rating) + parseInt(camera_rating) + parseInt(connectivity_rating) + parseInt(features_rating) + parseInt(performance_rating) + parseInt(battery_rating) + parseInt(usability_rating)) / 8;
        $('#average_rating_output').text(avg_rating.toFixed(1));
    
}

function user_progress() {
    var delay = 500;
    $(".user-progress").each(function(i) {
        $(this).delay(delay * i).animate({
            width: $(this).attr('aria-valuenow') + '%'
        }, delay);

        $(this).prop('Counter', 0).animate({
            Counter: $(this).text()
        }, {
            duration: delay,
            step: function(now) {
                $(this).text(Math.ceil(now));
            }
        });
    });
}

$(window).load(function() {
    
    similar_phones(product_id);
    similar_news(product_id);
    

    function progress_bar() {
        var delay = 500;
        $(".progress-count").each(function(i) {
            $(this).delay(delay * i).animate({
                width: $(this).attr('aria-valuenow') + '%'
            }, delay);

            $(this).prop('Counter', 0).animate({
                Counter: $(this).text()
            }, {
                duration: delay,
                step: function(now) {
                    $(this).text(Math.ceil(now));
                }
            });
            $('#progress_status').val(1);
        });
    }
    

    $(window).scroll(function () {
        var scrollTop = $(window).scrollTop();
        if (scrollTop > 1500) {
            if($('#faq_status').val() == 0) {
                product_faq(product_id);
            }
        }
        else if(scrollTop > 350) {
            if($('#progress_status').val() == 0) {
                progress_bar();
            }
        }
    });





});




</script>
@endsection


