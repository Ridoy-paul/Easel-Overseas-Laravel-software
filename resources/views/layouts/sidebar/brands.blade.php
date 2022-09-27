@php($brands = DB::table('brands')->where('is_active', 1)->orderBy('serial_num', 'ASC')->take(12)->get(['name']))
<div class="widget-category mb-20 p-10">
    <h5 class="section-title style-1 mb-20 wow fadeIn animated">Phone Brands</h5>
    <div class="row">
        @foreach($brands as $brand)
        <div class="col-lg-4 col-md-4 col-4 col-sm-4 p-1">
            <a href="{{route('brand.info', ['brand_name' => Str::slug($brand->name)])}}" title="{{$brand->name}}" width="100%">
                <div class="pl-1 pr-1 pt-2 pb-2 text-center border mobile-brand">{{$brand->name}}</div>
            </a>
        </div>
        @endforeach
        <div class="col-lg-12 col-md-12 col-12 col-sm-12 mt-3">
            <div class="mb-3">
                <div class="d-grid gap-2">
                <a href="{{route('brands')}}" title="All brands at topmobileinfo.com" class="btn btn-sm rounded-pill">View All</a>
                </div>
            </div>
        </div>
        
    </div>
</div>