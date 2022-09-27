<footer class="main">
        <section class="footer-mid" style="border-top: 2px solid #046963;">
            <div class="container pt-15 pb-20">
                <div class="row">
                    <div class="col-lg-6 col-md-6">
                        <div class="widget-about font-md mb-md-5 mb-lg-0">
                            <a href="{{route('index')}}" title="Topmobileinfo"><img src="{{asset(optional($settings)->logo)}}" alt="Topmobileinfo"></a>
                            <a href="{{route('index')}}"><h2 class="has-text-align-center" style="font-size: 15px; color: #9090AB;" id="mobile-phone-price-in-bangladesh-2022">Mobile Phone Price in Bangladesh {{date("Y")}}</h2></a>
                            <p class="fst-normal">{{Str::limit(strip_tags(optional($settings)->description) , 900, $end=' ....')}}</p>
                        </div>
                    </div>
                    
                    <div class="col-lg-2  col-md-3">
                        <h5 class="widget-title wow fadeIn animated">Brands</h5>
                        <ul class="footer-list wow fadeIn animated">
                            @foreach($brands->take(4) as $brand)
                            <li><a href="{{route('brand.info', ['brand_name' => Str::slug($brand->name)])}}" title="{{$brand->name}}">{{$brand->name}}</a></li>
                            @endforeach
                            <li><a href="{{route('brands')}}" title="All Brands">All Brands</a></li>
                        </ul>
                    </div>
                    <div class="col-lg-2">
                        <h5 class="widget-title wow fadeIn animated">Quick Links</h5>
                        <ul class="footer-list wow fadeIn animated">
                            <li><a href="{{route('popular.mobiles')}}" title="popular-phone">Popular Phone</a></li>
                            <li><a href="{{route('upcoming')}}" title="Upcoming mobile">Upcoming Phone</a></li>
                            <li><a href="{{route('price.range.all')}}" title="All Price Range">All Price Range</a></li>
                            <li><a href="{{route('brands')}}" title="All Brands">Latest Compare</a></li>
                            <li><a href="{{route('news')}}" title="Latest News">Latest News</a></li>
                        </ul>
                    </div>
                    <div class="col-lg-2">
                        <h5 class="widget-title wow fadeIn animated">Others</h5>
                        <ul class="footer-list wow fadeIn animated">
                            <li><a href="{{route('about.us')}}" title="About Us">About Us</a></li>
                            <li><a href="{{route('privacy.policy')}}" title="Privacy Policy">Privacy Policy</a></li>
                            <li><a href="{{route('disclaimer')}}" title="Disclamier">Disclamier</a></li>
                            <li><a href="{{route('contact.us')}}" title="Contact Us">Contact Us</a></li>
                            <li><a href="{{route('site.map')}}" title="Site Map">Site Map</a></li> 
                        </ul>
                    </div>
                    
                </div>
            </div>
        </section>
        <div class="container pb-20 wow fadeIn animated">
            <div class="row">
                <div class="col-12 mb-20">
                    <div class="footer-bottom"></div>
                </div>
                <div class="col-lg-6">
                    <div class="mobile-social-icon wow fadeIn animated mb-sm-5 mb-md-0">
                        <a href="{{optional($settings)->facebook}}"><img src="{{asset('frontend/assets/imgs/theme/icons/icon-facebook.svg')}}" alt="facebook"></a>
                        <a href="{{optional($settings)->twitter}}"><img src="{{asset('frontend/assets/imgs/theme/icons/icon-twitter.svg')}}" alt="twitter"></a>
                        <a href="{{optional($settings)->instagram}}"><img src="{{asset('frontend/assets/imgs/theme/icons/icon-instagram.svg')}}" alt="instagram"></a>
                        <a href="{{optional($settings)->pinterest}}"><img src="{{asset('frontend/assets/imgs/theme/icons/icon-pinterest.svg')}}" alt="pinterest"></a>
                        <a href="{{optional($settings)->youtube}}"><img src="{{asset('frontend/assets/imgs/theme/icons/icon-youtube.svg')}}" alt="youtube"></a>
                    </div>
                    
                </div>
                <div class="col-lg-6">
                    <p class="text-lg-end text-start font-sm text-muted mb-0">&copy; 2021 - {{date('Y')}}, <a href="{{route('index')}}" title="topmobileinfo.com"><strong class="text-brand">TopMobileInfo.com</strong></a> | All Rights Reserved</p>
                </div>
            </div>
        </div>
        <input type="hidden" name="" id="loading_gif" value="{{asset('images/settings/loading.gif')}}">
    </footer>
    

    <!-- Vendor JS-->
    <script src="{{asset('frontend/assets/js/vendor/modernizr-3.6.0.min.js')}}"></script>
    <script src="{{asset('frontend/assets/js/vendor/jquery-3.6.0.min.js')}}"></script>
    <script src="{{asset('frontend/assets/js/vendor/jquery-migrate-3.3.0.min.js')}}"></script>
    <script src="{{asset('frontend/assets/js/vendor/bootstrap.bundle.min.js')}}"></script>
    <script src="{{asset('frontend/assets/js/plugins/slick.js')}}"></script>
    <script src="{{asset('frontend/assets/js/plugins/jquery.syotimer.min.js')}}"></script>
    <script src="{{asset('frontend/assets/js/plugins/wow.js')}}"></script>
    <script src="{{asset('frontend/assets/js/plugins/jquery-ui.js')}}"></script>
    <script src="{{asset('frontend/assets/js/plugins/perfect-scrollbar.js')}}"></script>
    <script src="{{asset('frontend/assets/js/plugins/magnific-popup.js')}}"></script>
    <script src="{{asset('frontend/assets/js/plugins/select2.min.js')}}"></script>
    <script src="{{asset('frontend/assets/js/plugins/waypoints.js')}}"></script>
    <script src="{{asset('frontend/assets/js/plugins/counterup.js')}}"></script>
    <script src="{{asset('frontend/assets/js/plugins/jquery.countdown.min.js')}}"></script>
    <script src="{{asset('frontend/assets/js/plugins/images-loaded.js')}}"></script>
    <script src="{{asset('frontend/assets/js/plugins/isotope.js')}}"></script>
    <script src="{{asset('frontend/assets/js/plugins/scrollup.js')}}"></script>
    <script src="{{asset('frontend/assets/js/plugins/jquery.vticker-min.js')}}"></script>
    <script src="{{asset('frontend/assets/js/plugins/jquery.theia.sticky.js')}}"></script>
    <script src="{{asset('frontend/assets/js/plugins/jquery.elevatezoom.js')}}"></script>
    <script src="{{asset('js/front_page.js')}}"></script>
    <script src="{{asset('js/fontawesome.js')}}"></script>
    <script src="{{ asset('js/toastify-js.js') }}"></script>
    
    
    
    <!-- Template  JS -->
    <script src="{{asset('frontend/assets/js/main.js')}}"></script>
    <script src="{{asset('frontend/assets/js/shop.js')}}"></script>
	

	<script>
        $( document ).ready(function() {
            compcount();
        });

		function openSearch() {
		  document.getElementById("myOverlay").style.display = "block";
		  $('.search-input-box').focus();
		}

		function closeSearch() {
		  document.getElementById("myOverlay").style.display = "none";
		}

        function pageReload() {
            location.reload();
        }      
        setTimeout("pageReload()", 600000);

        function success(message) {
        Toastify({
                text: message,
                gravity: "bottom",
                position: "left",
                backgroundColor: "linear-gradient(to right, #269E70, #269E70)",
                className: "error",
            }).showToast();
        }

        function error(message) {
        Toastify({
                text: message,
                gravity: "bottom",
                position: "left",
                backgroundColor: "linear-gradient(to right, #F93C0A, #FF3551)",
                className: "error",
            }).showToast();
        }

        function toggleCart(){
            document.querySelector('.sidecart').classList.toggle('open-cart');
            cartload();
        }

        //toggleCart();

        


	</script>

    @yield('page_script')

	
</body>

</html>
