<div class="sidebar">
    <div class="sidebar_inner" id="sidebar_inner" data-simplebar="">
        <h3 class="side-title"> Brands </h3>
        <div class="contact-list my-2 ml-1">
            @foreach($brands as $key => $brand)
            <a @if($key > 5) id="more-veiw" hidden="" @endif href="chats-friend.html">
                <div class="contact-avatar">
                    <img src="{{asset($brand->icon)}}" alt="{{ $brand->name }}">
                </div>
                <div class="contact-username"> {{ $brand->name }}</div>
            </a>
            @endforeach
            <a href="#" class="see-mover h-10 flex my-1 pl-2 rounded-xl text-gray-600" uk-toggle="target: #more-veiw; animation: uk-animation-fade"> 
                <span class="w-full flex items-center" id="more-veiw"><svg class="bg-gray-100 mr-2 p-0.5 rounded-full text-lg w-7" fill="currentColor" viewbox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
                    See More  
                </span>
                <span class="w-full flex items-center" id="more-veiw" hidden=""><svg class="bg-gray-100 mr-2 p-0.5 rounded-full text-lg w-7" fill="currentColor" viewbox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M14.707 12.707a1 1 0 01-1.414 0L10 9.414l-3.293 3.293a1 1 0 01-1.414-1.414l4-4a1 1 0 011.414 0l4 4a1 1 0 010 1.414z" clip-rule="evenodd"></path></svg> 
                    See Less 
                </span>
            </a>  
        </div>

        
        <!-- price range  -->
        
        <ul class="side_links" data-sub-title="Price Range">
            <div class="mr-2 flex items-center space-x-4 rounded-md -mx-2 p-2 hover:bg-gray-50">
                <div class="flex-1"><a href="timeline-page.html" class="text-base font-semibold capitalize ml-4"> Under 5,000 TK </a></div>
                <a href="timeline-page.html" class="flex items-center justify-center h-8 px-3 rounded-md text-sm border font-semibold bg-dark-500 text-dark hover:bg-green-500">{{DB::table('product_prices')->whereBetween('price', [0, 5000])->count('id')}}</a>
            </div>
            @foreach($price_range as $pricer)
            @php($price_products = DB::table('product_prices')->whereBetween('price', [$pricer->start_price, $pricer->end_price])->count('id'))
            <div class="mr-2 flex items-center space-x-4 rounded-md -mx-2 p-2 hover:bg-gray-50">
                <div class="flex-1"><a href="timeline-page.html" class="text-base font-semibold capitalize ml-4"> {{number_format($pricer->start_price)}} - {{number_format($pricer->end_price)}} TK </a></div>
                <a href="timeline-page.html" class="flex items-center justify-center h-8 px-3 rounded-md text-sm border font-semibold bg-dark-500 text-dark hover:bg-green-500">{{$price_products}}</a>
            </div>
            @endforeach
            <div class="mr-2 flex items-center space-x-4 rounded-md -mx-2 p-2 hover:bg-gray-50">
                <div class="flex-1"><a href="timeline-page.html" class="text-base font-semibold capitalize ml-4"> Above 1,00,000 TK </a></div>
                <a href="timeline-page.html" class="flex items-center justify-center h-8 px-3 rounded-md text-sm border font-semibold bg-dark-500 text-dark hover:bg-green-500">{{DB::table('product_prices')->whereBetween('price', [100000, 1000000])->count('id')}}</a>
            </div>
        </ul>



        <ul class="large-screen-hidden" data-sub-title="Others">
        <div class="mr-2 flex items-center space-x-4 rounded-md -mx-2 p-2 bg-gray-100">
                <div class="flex-1"><a href="timeline-page.html" class="text-base font-semibold capitalize ml-4"> Upcoming Mobiles  </a></div>
                <a href="timeline-page.html" class="flex items-center justify-center h-8 px-3 rounded-md text-sm border font-semibold bg-green-500 text-white">Click</a>
            </div>
            <div class="mr-2 flex items-center space-x-4 rounded-md -mx-2 p-2 bg-gray-100 mt-1">
                <div class="flex-1"><a href="timeline-page.html" class="text-base font-semibold capitalize ml-4"> Compared Mobiles  </a></div>
                <a href="timeline-page.html" class="flex items-center justify-center h-8 px-3 rounded-md text-sm border font-semibold bg-green-500 text-white">Click</a>
            </div>
            <div class="mr-2 flex items-center space-x-4 rounded-md -mx-2 p-2 bg-gray-100 mt-1">
                <div class="flex-1"><a href="timeline-page.html" class="text-base font-semibold capitalize ml-4"> Latest News  </a></div>
                <a href="timeline-page.html" class="flex items-center justify-center h-8 px-3 rounded-md text-sm border font-semibold bg-green-500 text-white">Click</a>
            </div>
            <div class="mr-2 flex items-center space-x-4 rounded-md -mx-2 p-2 bg-gray-100 mt-1">
                <div class="flex-1"><a href="timeline-page.html" class="text-base font-semibold capitalize ml-4"> Latest Reviews  </a></div>
                <a href="timeline-page.html" class="flex items-center justify-center h-8 px-3 rounded-md text-sm border font-semibold bg-green-500 text-white">Click</a>
            </div>
        </ul>
        

        <div class="footer-links">
            <a href="{{route('about.us')}}">About us</a>
            <a href="#">Blog </a>
            <a href="{{route('privacy.policy')}}">Privacy Policy</a>
            <a href="{{route('disclaimer')}}">Disclaimer</a>
            <a href="{{route('site.map')}}">Site Map </a>
            <a href="{{route('contact.us')}}">Contact Us</a>
        </div>
    </div>

    <!-- sidebar overly for mobile -->
    <div class="side_overly" uk-toggle="target: #wrapper ; cls: is-collapse is-active"></div>

</div>