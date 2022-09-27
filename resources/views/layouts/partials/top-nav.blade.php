<header class="header-area header-style-2 header-height-2">
        <div class="header-top header-top-ptb-1 d-none d-lg-block">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-xl-2 col-lg-2">
                        <div class="header-info">
                            <ul>
                                <li class="text-light"><i class="fi-rs-clock"></i> {{date("D, F d, Y")}}</li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-xl-10 col-lg-10">
                        <div class="row">
                            <div  class="col-md-2 text-center">
								<div class="topmobileinfo-latest-news">
									<p>Latest News:</p>
								</div>
                            </div>
							<div class="col-md-10">
                                <div class="mt-1">
									<marquee onmouseover="this.stop();" onmouseout="this.start();" direction="left"> <a href=""><p class="text-light marquee_text">dfgdf gdf gjdf gkdsfg jdfg dsfgj dkfg jdsfk gjdkfgkdf gjsd gjkdskgjdskgj</p></a> </marquee>
								</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        <div class="header-bottom header-bottom-bg-color sticky-bar">
            <div class="container">
                <div class="header-wrap header-space-between position-relative">
                    <div class="logo logo-width-1 d-block d-lg-none">
                        <a href="{{route('index')}}" title="Topmobileinfo"><img src="{{asset(optional($settings)->logo)}}" alt="Topmobileinfo"></a>
                    </div>
                    <div class="header-nav d-none d-lg-flex">
                        <div class="main-categori-wrap d-none d-lg-block mr-0">
							<div class="logo logo-width-1">
								<a href="{{route('index')}}" title="Topmobileinfo"><img src="{{asset(optional($settings)->logo)}}" alt="Topmobileinfo"></a>
							</div>
                        </div>
                        <div class="main-menu main-menu-padding-1 main-menu-lh-2 d-none d-lg-block">

                            <nav>
                                <ul>
                                    <li><a class="active" href="{{route('index')}}" title="Topmobileinfo">Home</a></li>
                                    <li><a class="" href="{{route('brands')}}">Brands <i class="fi-rs-angle-down"></i></a>
                                        <ul class="sub-menu">
                                            @foreach($brands as $brand)
                                            <li><a href="{{route('brand.info', ['brand_name' => Str::slug($brand->name)])}}" title="{{$brand->name}}">{{$brand->name}}</a></li>
                                            @endforeach
                                            <li><a href="{{route('brands')}}" title="All Brands">All Brands</a></li>
                                        </ul>
                                    </li>
                                    <li><a class="" href="{{route('price.range.all')}}">Price Range <i class="fi-rs-angle-down"></i></a>
                                        <ul class="sub-menu">
                                            @foreach($price_range as $pricer)
                                                <li><a href="{{route('price.range', ['start_price'=>$pricer->start_price, 'end_price'=>$pricer->end_price])}}" title="{{$pricer->title}}">{{$pricer->title}}</a></li>
                                            @endforeach
                                            <li><a href="{{route('price.range.all')}}" title="All Price Range">All Price Range</a></li>
                                        </ul>
                                    </li>
                                    <li><a class="" href="javascript:void(0)">Types <i class="fi-rs-angle-down"></i></a>
                                        <ul class="sub-menu">
                                            @foreach($categories as $category)
                                            <li><a href="{{route('type.details', Str::slug($category->category_name))}}" title="{{$category->category_name}}">{{$category->category_name}}</a></li>
                                            @endforeach
                                            <li><a href="{{route('rumored.mobiles')}}" title="Rumored Phone">Rumored Phone</a></li>
                                            <li><a href="{{route('popular.mobiles')}}" title="Popular Phone">Popular Phone</a></li>
                                        </ul>
                                    </li>
                                    
                                    <li><a class="" href="{{route('upcoming')}}" title="Upcoming Phones">Upcoming</a></li>
                                    <li><a class="" href="page-about.html" title="Latest Compare Phones">Compare</a></li>
                                    <li><a class="" href="{{route('news')}}" title="Blog">News</a></li>
                                    <li><a class="" href="javascript:void(0)">Others <i class="fi-rs-angle-down"></i></a>
                                        <ul class="sub-menu">
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
					
					<div class="header-action-right d-block">
                        <div class="header-action-2">
                            <div class="header-action-icon-2">
                                <a href="javascript:void(0)"  onclick="openSearch()">
									<i class="text-dark fi-rs-search h4"></i>
								</a>
                            </div>
							
                            <div class="header-action-icon-2">
                                <a class="mini-cart-icon" style="margin-right: 22px !important;" href="javascript:void(0)" onclick="toggleCart()">
                                    <img src="{{asset('images/scale.png')}}" style="width: 40px !important; max-width: 40px !important;" alt="compare-phone">
                                    <span class="pro-count white" id="compare_count">0</span>
                                </a>
                            </div>
                            <div class="header-action-icon-2 d-block d-lg-none">
                                <div class="burger-icon burger-icon-white">
                                    <span class="burger-icon-top"></span>
                                    <span class="burger-icon-mid"></span>
                                    <span class="burger-icon-bottom"></span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header>
	
	<!-- mobile header start -->
    <div class="mobile-header-active mobile-header-wrapper-style">
        <div class="mobile-header-wrapper-inner">
            <div class="mobile-header-top">
                <div class="mobile-header-logo">
                    <a href="{{route('index')}}" title="Topmobileinfo"><img src="{{asset(optional($settings)->logo)}}" alt="Topmobileinfo"></a>
                </div>
                <div class="mobile-menu-close close-style-wrap close-style-position-inherit">
                    <button class="close-style search-close">
                        <i class="icon-top"></i>
                        <i class="icon-bottom"></i>
                    </button>
                </div>
            </div>
            <div class="mobile-header-content-area">
                <!-- <div class="mobile-search search-style-3 mobile-header-border">
                    
                
                </div> -->
                <div class="mobile-menu-wrap mobile-header-border">
                    <nav>
                        <ul class="mobile-menu">
                            <li class="menu-item-has-children"><span class="menu-expand"></span><a href="{{route('index')}}" title="home">Home</a></li>
                            <li class="menu-item-has-children"><span class="menu-expand"></span><a href="{{route('brands')}}" title="Brands">Brands</a>
                                <ul class="dropdown">
                                    @foreach($brands as $brand)
                                    <li><a href="{{route('brand.info', ['brand_name' => Str::slug($brand->name)])}}" title="{{$brand->name}}">{{$brand->name}}</a></li>
                                    @endforeach
                                    <li><a href="{{route('brands')}}" title="All Brands">All Brands</a></li>
                                </ul>
                            </li>
                            <li class="menu-item-has-children"><span class="menu-expand"></span><a href="{{route('price.range.all')}}" title="Price Range">Price Range</a>
                                <ul class="dropdown">
                                    @foreach($price_range as $pricer)
                                        <li><a href="{{route('price.range', ['start_price'=>$pricer->start_price, 'end_price'=>$pricer->end_price])}}" title="{{$pricer->title}}">{{$pricer->title}}</a></li>
                                    @endforeach
                                    <li><a href="{{route('price.range.all')}}" title="All Price Range">All Price Range</a></li>
                                </ul>
                            </li>
                            <li class="menu-item-has-children"><span class="menu-expand"></span><a href="javascript:void(0)" title="types">Types</a>
                                <ul class="dropdown">
                                    @foreach($categories as $category)
                                    <li><a href="{{route('type.details', Str::slug($category->category_name))}}" title="{{$category->category_name}}">{{$category->category_name}}</a></li>
                                    @endforeach
                                    <li><a href="{{route('rumored.mobiles')}}" title="Rumored Phone">Rumored Phone</a></li>
                                    <li><a href="{{route('popular.mobiles')}}" title="Popular Phone">Popular Phone</a></li>
                                </ul>
                            </li>

                            <li class="menu-item-has-children"><span class="menu-expand"></span><a href="{{route('upcoming')}}" title="Upcoming Phones">Upcoming Phones</a></li>
                            <li class="menu-item-has-children"><span class="menu-expand"></span><a href="#" title="Latest Compare Phones">Compared Phones</a></li>
                            <li class="menu-item-has-children"><span class="menu-expand"></span><a href="{{route('news')}}">News</a></li>
                            
                            <li class="menu-item-has-children"><span class="menu-expand"></span><a href="javascript:void(0)" title="Others">Others</a>
                                <ul class="dropdown">
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
                <div class="mobile-social-icon mt-4">
                    <h5 class="mb-15 text-grey-4">Follow Us</h5>
                    <a href="{{optional($settings)->facebook}}"><img src="{{asset('frontend/assets/imgs/theme/icons/icon-facebook.svg')}}" alt="Facebook"></a>
                    <a href="{{optional($settings)->twitter}}"><img src="{{asset('frontend/assets/imgs/theme/icons/icon-twitter.svg')}}" alt="twitter"></a>
                    <a href="{{optional($settings)->instagram}}"><img src="{{asset('frontend/assets/imgs/theme/icons/icon-instagram.svg')}}" alt="instagram"></a>
                    <a href="{{optional($settings)->pinterest}}"><img src="{{asset('frontend/assets/imgs/theme/icons/icon-pinterest.svg')}}" alt="pinterest"></a>
                    <a href="{{optional($settings)->youtube}}"><img src="{{asset('frontend/assets/imgs/theme/icons/icon-youtube.svg')}}" alt="youtube"></a>
                </div>
            </div>
        </div>
    </div>
	<!-- mobile header end -->

