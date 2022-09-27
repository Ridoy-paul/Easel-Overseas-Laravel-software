@php( $side_popular_phones = App\Models\Products::where(['is_popular' => 1, 'is_active' => 1])->orderBy('release_date', 'DESC')->take(6)->get(['id', 'title', 'image', 'url', 'brand_id', 'coming_soon_status', 'is_rumored', 'is_discount']))
<div class="widget-category mb-20 p-10">
    <h5 class="section-title style-1 mb-30 wow fadeIn animated">Popular Mobile Phone</h5>
    <div class="row">
        @foreach($side_popular_phones as $product)
        @php($route = route('product.details', ['brand'=>$product->brandInfo->name, 'url'=>$product->url]))
        <div class="col-lg-4 col-md-4 col-6 col-sm-6 hover-up pl-3 pr-3" >
            <div class="side-item mb-3 shadow">
                <div class="side-product-img-parent">
                    <div class="side-product-img product-img-zoom">
                        <a href="{{$route}}" title="{{$product->title}}">
                            <img class="default-img" src="{{asset($product->image)}}" alt="{{$product->title}}">
                        </a>
                    </div>
                </div>
                <div class="product-content-wrap">
                    <div class="text-center side-title">
                        <a href="{{$route}}" title="{{$product->title}}">{{$product->title}}</a>
                    </div>
                    <div class="product-category text-center">
                        <a class="text-info" href="{{$route}}" title="{{$product->title}}">@if($product->is_rumored == 1) REMORED @elseif($product->coming_soon_status == 1) UPCOMING @else @foreach($product->prices->take(1) as $price) ৳ {{$product->is_discount == 1? number_format($price->discount_price, 2) : number_format($price->price, 2)}} @endforeach @endif</a>
                    </div>
                </div>
            </div>
        </div>
        @endforeach
        <div class="col-lg-12 col-md-12 col-12 col-sm-12">
            <div class="mb-3">
                <div class="d-grid gap-2">
                <a href="{{route('popular.mobiles')}}" title="" class="btn btn-sm rounded-pill">View All</a>
                </div>
            </div>
        </div>

    </div>
</div>