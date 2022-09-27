@php( //$latest_compare = App\Models\CompareProduct::orderBy('id', 'DESC')->take(5)->get(['id', 'first_product_id', 'second_product_id', 'third_product_id', 'created_at']))
<div class="widget-category mb-20 p-10">
    <h4 class="section-title style-1 mb-30 wow fadeIn animated animated animated" style="visibility: visible;" title="Latest Compare  at Top mobile info">Latest Compare</h4>
    <div class="product-list-small wow fadeIn animated animated animated row" style="visibility: visible;">
        @foreach($latest_compare as $compare)
        <?php
            $title = $compare->firstProductInfo->title." VS ".$compare->secondProductInfo->title;
            if(!empty($compare->third_product_id)){
                $title = $title." VS ".optional($compare->thirdProductInfo)->title;
            }
        ?>

        <div class="col-6 col-lg-12 col-md-12 p3-small border hover-up">
            <article class="row">
                <figure class="col-md-4 mb-0">
                    <a href="{{route('compare.details', ['id'=>$compare->id, 'slug'=>Str::slug($title)])}}" title="{{$title}}"><img src="{{asset($compare->firstProductInfo->image)}}" alt="{{$title}}"></a>
                </figure>
                <div class="col-md-8 mb-0">
                    <h4 class="mt-2 sm-screen-center" title="{{$title}}">
                        <a class="fw-bold" href="{{route('compare.details', ['id'=>$compare->id, 'slug'=>Str::slug($title)])}}" title="{{$title}}">{{$title}}</a>
                    </h4>
                    <div class="product-price">
                        <span>{{\Carbon\Carbon::parse($compare->created_at)->diffForHumans();}}</span>
                    </div>
                </div>
            </article>
        </div>
        @endforeach
        <div class="col-lg-12 col-md-12 col-12 mt-3 col-sm-12">
            <div class="d-grid gap-2">
                <a href="{{route('compare')}}" title="" class="btn btn-sm rounded-pill">View All</a>
            </div>
        </div>
    </div>
</div>
