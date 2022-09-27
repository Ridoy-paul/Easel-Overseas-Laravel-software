<?php
$c_status = 0;
$route = route('product.details', ['url'=>$product->url, 'brand'=>$product->brandInfo->name]);
if(Cookie::get('shopping_cart')) {
    $cookie_data = stripslashes(Cookie::get('shopping_cart'));
    if(in_array(optional($product)->id, array_column(json_decode($cookie_data, true), 'pid'))){
        $c_status = 1;
    }
}
?>

<div class="col-lg-3 col-md-3 col-6 col-sm-6">
    <div class="product-cart-wrap mb-30">
        <div class="product-img-action-wrap">
            <div class="product-img product-img-zoom">
                <a href="{{$route}}" title="{{$product->title}}">
                    <img class="default-img" src="{{asset($product->image)}}" alt="{{$product->title}}">
                </a>
            </div>
        </div>
        @if($product->is_discount == 1)
        <div class="product-badges product-badges-position product-badges-mrg">
            <span class="hot anim-color">-{{$product->discount_percent}}%</span>
        </div>
        @endif
        <div class="product-content-wrap">
            <h5 class="text-dark text-center mt-1"><a href="{{$route}}" title="{{$product->title}}">{{$product->title}}</a></h5>
            <div class="product-category text-center">
                <a href="{{$route}}" title="{{$product->title}}">@if($product->is_rumored == 1) REMORED @elseif($product->coming_soon_status == 1) UPCOMING @else @foreach($product->prices->take(1) as $price) ৳ @if($product->is_discount == 1) {{number_format($price->discount_price)}} <span id="old_price"> {{number_format($price->price)}}</span> @else {{number_format($price->price)}} @endif @endforeach @endif</a>
            </div>
            <div class="custome-checkbox add-compare">
                <input class="form-check-input" onclick="comp({{$product->id}})" type="checkbox" {{$c_status == 1? 'checked' : ''}} name="checkbox" id="p{{$product->id}}">
                <label class="form-check-label" for="p{{$product->id}}"><span id="ps{{$product->id}}">{{$c_status == 1? 'Added To Compare' : 'Add To Compare'}}</span></label>
            </div>
        </div>
    </div>
</div>