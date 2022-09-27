@extends('layouts.app')

@section('title'){{$tag}} in Bangladesh {{date("Y").' | '. env('APP_NAME')}}@endsection
@section('description'){{date("Y")}} latest updated {{$tag}} ✓Official ✓Unofficial Price List in Bangladesh ✓Full Specifications ✓Rating ✓Review.@endsection
@section('keywords') TopMobileInfo,{{$tag}},topmobileinfo,phone,cellphone,information,info,list @endsection
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
                                <li class="breadcrumb-item active" aria-current="page">{{$tag}}</li>
                            </ol>
                        </nav>
                        <h2 class="fs-20"><b>{{$tag}}</b></h2>
                    </div>
                </div>
                    @if(count($news) > 0)
                    <div class="loop-grid loop-list pr-30">
                        @foreach($news as $item)
                        @php($post = $item->blog_info )
                        @php($route = route('post.details', ['slug'=>Str::slug($post->title), 's'=>$post->id]))
                            <article class="wow fadeIn animated hover-up mb-30 animated" style="visibility: visible;">
                                <div class="post-thumb" style="background-image: url({{asset($post->thumbnail)}});">
                                    <div class="entry-meta">
                                        <a class="entry-meta meta-2" href="{{$route}}">{{$post->brand_info->name}}</a>
                                    </div>
                                </div>
                                <div class="entry-content-2">
                                    <h3 class="post-title mb-15">
                                        <a href="{{$route}}">{{$post->title}}</a></h3>
                                    <p class="post-exerpt mb-30">{{Str::limit(strip_tags($post->description) , 90, $end=' ....')}}</p>
                                    <div class="entry-meta meta-1 font-xs color-grey mt-10 pb-10">
                                        <div>
                                            <span class="post-on"> <i class="fi-rs-clock"></i> {{ date("d F Y", strtotime($post->date))}}</span>
                                        </div>
                                        <a href="{{$route}}" class="text-brand">Read more <i class="fi-rs-arrow-right"></i></a>
                                    </div>
                                </div>
                            </article>
                        @endforeach
                    </div>
                        <div class="col-md-12">
                            {{ $news->links('vendor.pagination') }}
                            <small class="mt-1 fw-bold">Showing {{$news->firstItem()}} to {{$news->lastItem()}} of {{$news->total()}} News</small>
                        </div>
                    @else
                    <div class="row">
                        <div class="col-md-12">
                            <h3><b>Sorry No Info Found!</b></h3>
                        </div>
                    </div>
                    @endif

            </div>
            <div class="col-lg-4 primary-sidebar sticky-sidebar">
                <div class="row">
                    <div class="col-lg-12 col-mg-6"></div>
                    <div class="col-lg-12 col-mg-6"></div>
                </div>

                <!-- popular mobile phone Start -->
                @include('layouts.sidebar.popular_phones')
                
                <!-- Phone Brands Start -->
                @include('layouts.sidebar.brands')
                
                <!-- upcoming mobile phone Start -->
                @include('layouts.sidebar.upcoming_phone')
                
                <!-- Latest Product Compare Start -->
                <div class="widget-category mb-20 p-10">
                    <h4 class="section-title style-1 mb-30 wow fadeIn animated animated animated" style="visibility: visible;" title="Latest Compare  at Top mobile info">Latest Compare</h4>
                    <div class="product-list-small wow fadeIn animated animated animated row" style="visibility: visible;" id="latest_compare_output">
                        
                    </div>
                </div>
                
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


