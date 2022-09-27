@extends('layouts.app')

@section('title')Site Map | {{env('APP_NAME')}}@endsection
@section('description') latest updated ✓Official ✓Unofficial Price List in Bangladesh ✓Full Specifications ✓Rating ✓Review.@endsection
@section('keywords') TopMobileInfo,Site Map,topmobileinfo,phone,cellphone,information,info,list @endsection
@section('content')

<style>
    * {
        box-sizing: border-box;
    }
    /* body {
        font-family: "Proxima Nova", Helvetica, Arial, sans-serif;
        background: white;
        color: black;
        font-size: 16px;
        line-height: 1;
        padding: 2em;
    } */
    .sitemap {
        margin: 0 0 2em 0;
    }

    /* ------------------------------------------------------------
        Page Styles
    ------------------------------------------------------------ */

    /* -------- Top Level --------- */

    .p_nav {
        clear: both;
        width: 100%;
        margin-top: 3em;
    }
    .p_nav #home {
        position: absolute;
        margin-top: -3em;
        margin-bottom: 0;
        min-width: 11.5em;
        width: 100%;
    }
    .p_nav #home:before {
        display: none;
    }
    .p_nav ul {
        display: flex;
        flex-wrap: wrap;
        list-style: none;
        position: relative;
    }
    .p_nav li {
        flex: 1;
        flex-basis: 11.5em;
        padding-right: 1.25em;
        position: relative;
    }
    .p_nav > ul > li {
        margin-top: 3em;
    }
    .p_nav li a {
        margin: 0;
        padding: .875em .9375em .9375em .9375em;
        display: block;
        font-size: .9375em;
        font-weight: bold;
        color: white;
        background: #0090ff;
        text-shadow: 0 0 10px rgba(0,0,0,.1);
        border: 1px solid  rgba(0,0,0,.025);
        box-shadow: 0px 2px 1px rgba(0,0,0,0.15);
        text-decoration: none;
        border-radius: 10px;
    }
    .p_nav li a:hover {
        background-color: #0070f9;
    }
    /* .p_nav a:link:after,
    .p_nav a:visited:after,
    .utilityNav a:link:after,
    .utilityNav a:visited:after {
        content: " "attr(href)" ";
        display: block;
        font-weight: 600;
        font-size: .75em;
        margin-top: .25em;
        word-wrap: break-word;
        color: rgba(255,255,255,.75);
    } */

    /* -------- Second Level --------- */

    .p_nav ul ul {
        display: block;
    }
    .p_nav ul ul li {
        padding-top: .6875em;
        padding-right: 0;
    }
    .p_nav ul ul li a {
        background-color: #28bf5e;
    }
    .p_nav ul ul li a:hover {
        background-color: #09a63e;
    }
    .p_nav ul ul li:first-child {
        padding-top: 2em;
    }

    /* -------- Third Level --------- */

    .p_nav ul ul ul {
        margin-top: .6em;
        padding-top: .6em;
        padding-bottom: .625em;
    }
    .p_nav ul ul ul li {
        padding-top: .3125em;
        padding-bottom: .3125em;
    }
    .p_nav ul ul ul li a {
        background-color: #ff9d00;
        font-size: .75em;
        padding: .75em;
        width: 90%;
        margin-right: 0;
        margin-left: auto;
    }
    .p_nav ul ul ul li a:hover {
        background-color: #ff831b;
    }
    .p_nav ul ul ul li:first-child {
        padding-top: 1em;
    }
    .p_nav ul ul ul li a:link:after,
    .p_nav ul ul ul li a:visited:after {
        font-size: .75em;
    }

    /* --------	Fourth Level --------- */

    .p_nav ul ul ul ul {
        margin-top: 0;
        padding-top: .3125em;
        padding-bottom: .3125em;
    }
    .p_nav ul ul ul ul li a {
        background-color: #de003a;
        padding: .75em ;
        width: 80%;
    }
    .p_nav ul ul ul ul li a:hover {
        background-color: #c20035;
    }
    .p_nav ul ul ul ul li a:link:after,
    .p_nav ul ul ul ul li a:visited:after {
        display: none;
    }

    /* ------------------------------------------------------------
        Connecting Lines:
        Uncomment 'border-color: red' for debugging
    ------------------------------------------------------------ */

    .p_nav ul:before,
    .p_nav ul:after,
    .p_nav ul li:before,
    .p_nav ul li:after {
        display: block;
        content: '';
        position: absolute;
        border-width: 0;
        border-color: #e3e3e3;
        border-style: solid;
        z-index: -1;
        /* border-color: red; */
    }
    .p_nav > ul > li:before {
        height: 1.375em;
        top: -1.375em;;
        right: calc(50% + .625em);
        width: calc(100% - 2px);
        border-top-width: 2px;
        border-right-width: 2px;
        /* border-color: red; */
    }
    .p_nav > ul > li:first-child + li:before {
        border-top-width: 0;
        height: 5em;
        top: -5em;
        /* border-color: red; */
    }
    .p_nav ul ul li:after {
        width: 50%;
        height: .6875em;
        top: 0;
        right: 1px;
        border-left-width: 2px;
        /* border-color: red */;
    }
    .p_nav ul ul li:first-child:before {
        width: 50%;
        height: 1.3125em;
        top: .6875em;
        right: 1px;
        border-left-width: 2px;
        /* border-color: red; */
    }
    .p_nav > ul > li:last-child:after {
        border-bottom-width: 0;
    }
    .p_nav ul ul ul li:before {
        width: calc(50% - 5px) !important;
        height: calc(100% - 2px);
        top: -50%;
        left: 0;
        border-left-width: 2px;
        border-bottom-width: 2px;
        /* border-color: red; */
    }
    .p_nav ul ul ul li:first-child:before {
        height: 2.125em;
        top: -1px;
        border-top-width: 2px;
        /* border-color: red; */
    }
    .p_nav ul ul ul:before {
        width: 50%;
        height: 1.25em;
        top: -10px;
        right: 1px;
        border-left-width: 2px;
        /* border-color: red; */
    }
    .p_nav ul ul ul li:after {
        border-width: 0;
    }
    .p_nav ul ul ul ul li:before,
    .p_nav ul ul ul ul li:first-child:before {
        display: none;
    }

    .p_nav ul ul ul ul:before {
        width: 1px;
        height: calc(100% + 2.5em);
        top: -2.5em;
        left: 0;
        border-left-width: 2px;
        /* border-color: red; */
    }

    /* ------------------------------------------------------------
        Utility Navigation
    ------------------------------------------------------------ */

    .utilityNav {
        float: right;
        margin-top: 0;
        margin-bottom: -.25em;
        margin-right: 1.25em;
        max-width: 48%;
        list-style-type: none;
    }
    .utilityNav li {
        padding: 0 0 .625em .625em;
        display: inline-block;
    }
    .utilityNav li:first-child {
    }
    .utilityNav li a {
        display: block;
        font-size: .75em;
        font-weight: 700;
        padding: .75em 1em;
        font-weight: bold;
        text-align: left;
        color: white;
        background-color: #ff9d00;
        border: 1px solid  rgba(0,0,0,.025);
        box-shadow: 0px 2px 0 rgba(0,0,0,0.15);
        text-shadow: 0 0 10px rgba(0,0,0,.15);
        text-decoration: none;
    }
    .utilityNav li a:hover {
        background-color: #ff831b;
    }
    .utilityNav li a:link:after,
    .utilityNav li a:visited:after {
        color: rgba(255,255,255,.75);
        font-size: .75em;
        font-weight: 600;
        margin-top: .25em;
    }

    /* ------------------------------------------------------------
        Responsive Styles
    ------------------------------------------------------------ */

    @media screen and (max-width: 30em) {
        .p_nav ul {
            display: block;
        }
        .p_nav li {
            width: 100%;
            padding-right: 0;
        }
        .p_nav #home {
            width: 100%;
            position: relative;
            margin-bottom: -1em;
            margin-top: 0;
        }
        .utilityNav {
            float: none;
            display: block;
            width: 100%;
            text-align: right;
            margin-bottom: 2.5em;
            max-width: 100%;
        }
    }

   
    /* two column */
    @media screen and (min-width: 30em) {
        .p_nav > ul > li {	max-width: 50%;	}
    }
    /* three column */
    @media screen and (min-width: 38.5em) {
        .p_nav > ul > li {	max-width: 33%;	}
    }
    /* four column */
    @media screen and (min-width: 50em) {
        .p_nav > ul > li {	max-width: 25%;	}
    }
    /* five column */
    @media screen and (min-width: 61em) {
        .p_nav > ul > li {	max-width: 20%;	}
    }
    /* six column */
    @media screen and (min-width: 73em) {
        .p_nav > ul > li {	max-width: 16.66%;	}
    }
    /* seven column */
    @media screen and (min-width: 84.5em) {
        .p_nav > ul > li {	max-width: 14.285%;	}
    }
    /* eight column */
    @media screen and (min-width: 96em) {
        .p_nav > ul > li {	max-width: 12.5%; }
    }
    /* nine column */
    @media screen and (min-width: 107.5em) {
        .p_nav > ul > li {	max-width: 11.11%; }
    }
    /* ten column */
    @media screen and (min-width: 119em) {
        .p_nav > ul > li {	max-width: 10%; }
    }

    a:hover {
        color: #e3e3e3 !important;
    }
    li > a {
        text-align: center !important;
    }
    #home > a{
        background-color: #F36E5A !important;
    }

</style>

<section class="mt-30 mb-50">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="">
                    <div class="totall-product mb-3">
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{route('index')}}">Home</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Site Map</li>
                            </ol>
                        </nav>
                        <!-- <h2 class="fs-20"><b>Site Map</b></h2> -->
                    </div>
                </div>
                <div class="row product-grid-3 ">
                    <div class="col-md-12">
                        <div class="sitemap">
                        <nav class="p_nav">
                            <ul>
                                <li id="home"><a href="{{route('index')}}">Home</a></li>
                                <li><a href="{{route('brands')}}">Brands</a>
                                    <ul>
                                        @foreach($brands as $brand)
                                        <li><a href="{{route('brand.info', ['brand_name' => Str::slug($brand->name)])}}" title="{{$brand->name}}">{{$brand->name}}</a></li>
                                        @endforeach
                                        <li><a href="{{route('brands')}}" title="All Brands">All Brands</a></li>
                                    </ul>
                                </li>
                                <li><a href="{{route('price.range.all')}}">Price Range</a>
                                    <ul>
                                        @foreach($price_range as $pricer)
                                        <li><a href="{{route('price.range', ['start_price'=>$pricer->start_price, 'end_price'=>$pricer->end_price])}}" title="{{$pricer->title}}">{{$pricer->title}}</a></li>
                                        @endforeach
                                        <li><a href="{{route('price.range.all')}}" title="All Price Range">All Price Range</a></li>
                                    </ul>
                                </li>
                                <li><a href="javascript:void(0)">Types</a>
                                    <ul>
                                        @foreach($categories as $category)
                                        <li><a href="{{route('type.details', Str::slug($category->category_name))}}" title="{{$category->category_name}}">{{$category->category_name}}</a></li>
                                        @endforeach
                                        <li><a href="{{route('rumored.mobiles')}}" title="Rumored Phone">Rumored Phone</a></li>
                                        <li><a href="{{route('popular.mobiles')}}" title="Popular Phone">Popular Phone</a></li>
                                    </ul>
                                </li>
                                <li><a href="{{route('upcoming')}}">Upcoming</a></li>
                                <li><a href="{{route('upcoming')}}">Compare</a></li>
                                <li><a href="{{route('news')}}">News</a></li>
                                <li><a href="javascript:void(0)">Others</a>
                                    <ul>
                                        <li><a href="{{route('about.us')}}" title="About Us">About Us</a></li>
                                        <li><a href="{{route('privacy.policy')}}" title="Privacy Policy">Privacy Policy</a></li>
                                        <li><a href="{{route('disclaimer')}}" title="Disclamier">Disclamier</a></li>
                                        <li><a href="{{route('contact.us')}}" title="Contact Us">Contact Us</a></li>
                                        <li><a href="{{route('site.map')}}" title="Site Map">Site Map</a></li>
                                    </ul>
                                </li>
                                
                            </ul>

                        </nav>

                    </div>
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

