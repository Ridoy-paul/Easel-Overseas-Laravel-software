@php
    $brands = DB::table('brands')->where('is_active', 1)->orderBy('serial_num', 'ASC')->get(['name', 'icon']);
    $price_range = DB::table('price_ranges')->orderBy('serial_num', 'ASC')->get(['id', 'title', 'serial_num', 'start_price', 'end_price']);
    $settings = DB::table('business_settings')->first();
    $categories = DB::table('categories')->get(['category_name']);
@endphp

<!DOCTYPE html>
<html class="no-js" lang="en">

<head>
    <meta charset="utf-8">
    <!-- Favicon -->
    <link href="{{asset(optional($settings)->fav_icon)}}" rel="shortcut icon" type="image/png">
    <meta name='robots' content='index, follow, max-image-preview:large, max-snippet:-1, max-video-preview:-1'/>
    <title>@yield('title')</title>
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    
    <meta name="description" content="@yield('description')">
    <link rel="canonical" href="{{Request::url()}}" />
    <meta name="viewport" content="width=device-width,initial-scale=1">
    
    <meta property="og:locale" content="en_US" />
    <meta property="og:type" content="article" />
    <meta property="og:title" content="@yield('title')" />
    <meta property="og:description" content="@yield('description')" />
    <meta property="og:url" content="{{Request::url()}}" />
    <meta property="og:site_name" content="Topmobileinfo.com" />
    <meta property="article:publisher" content="{{optional($settings)->facebook}}">
    <meta property="article:modified_time" content="{{Carbon\Carbon::now()}}">
    <meta property="og:image" content="@yield('og_image')">
    <meta property="og:image:width" content="500">
    <meta property="og:image:height" content="500">
    <meta property="og:image:type" content="image/jpeg">

    <meta name="keywords" content="@yield('keywords')">
    <meta name="author" content="Topmobileinfo">
    <meta name="Classification" content="Business">
    <meta name="coverage" content="Worldwide">
    <meta name="distribution" content="Global">
    <meta name="fb:page_id" content="{{optional($settings)->facebook}}">
    <meta property="og:site_name" content="Topmobileinfo">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta content="yes" name="apple-touch-fullscreen">
    <meta name="apple-mobile-web-app-status-bar-style" content="#b41f23">


    <!-- Twitter -->
    <meta name="twitter:title" content="@yield('title')">
    <meta name="twitter:description" content="@yield('description')">
    <meta name="twitter:image" content="LINK TO IMAGE">
    <meta name="twitter:site" content="@topmobileinfo.com">
    <meta name="twitter:creator" content="@topmobileinfo">
    <meta name="twitter:label1" content="Est. reading time">
    <meta name="twitter:data1" content="1 minutes"/>

    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- Template CSS -->
    <link rel="stylesheet" href="{{asset('frontend/assets/css/main.css')}}">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/toastify.min.css') }}">
</head>



<body>

	
    <div class="sidecart bg-dark text-center">
        <div class="modal-content" style="height: 100% !important;">
            <div class="modal-header">
                <h3>Smartphones</h3>
                <div class="d-inline" onclick="toggleCart()" ><i class="far text-danger float-right fa-arrow-alt-circle-right mt-1"></i></div>
            </div>
            <div class="modal-body" id="comp_body"></div>
        </div>
    </div>


	
	<!-- search display -->
	<div id="myOverlay" class="overlay">
	  <span class="closebtn" onclick="closeSearch()" title="Close Overlay">×</span>
	  <div class="overlay-content">
		<form action="#">
		  <input class="search-input-box" type="text" placeholder="Type and hit Enter.." name="search">
		  <button class="search-input-button" type="submit"><i class="fi-rs-arrow-right fw-bold"></i></button>
		</form>
	  </div>
	</div>

    <!-- Header -->
    @include('layouts.partials.top-nav')

	
	<main class="main">
        <!-- <div class="page-header breadcrumb-wrap"> -->
            <!-- <div class="container"> -->
                <!-- <div class="breadcrumb"> -->
                    <!-- <a href="index.html" title="" rel="nofollow">Home</a> -->
                    <!-- <span></span> Shop -->
                <!-- </div> -->
            <!-- </div> -->
        <!-- </div> -->

        @yield('content')
        
    </main>

    @include('layouts.partials.footer')









