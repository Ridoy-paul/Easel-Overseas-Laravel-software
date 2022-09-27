<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Brands;
use App\Models\PriceRange;
use App\Models\Products;
use App\Models\ProductFetures;
use App\Models\Blogs;
use App\Models\CompareProduct;
use Facade\FlareClient\Http\Response;
use App\Models\ProductPrice;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;
use App\Models\ContactUs;
use Carbon\Carbon;
use App\Models\PostComment;
use App\Models\FeaturesCategories;
use App\Models\Review;
use App\Models\ProductTags;
use App\Models\BlogTags;

class PageController extends Controller
{
    

    public function latest_news_ajax_output() {
        $output = '';
        $posts = Blogs::where('is_active', 1)->orderBy('date', 'DESC')->take(6)->get(['date', 'brand_id', 'title', 'thumbnail', 'description', 'views', 'id']);

        $output .= '<h2 class="section-title style-1 mb-30 wow fadeIn animated fw-bold pt-5" title="Latest News  at Top mobile info" style="font-size: 25px;">Latest News</h2>
                    <div class="row">';
                        foreach($posts as $post) {
                            $route = route('post.details', ['slug'=>Str::slug($post->title), 's'=>$post->id]);
                            $output .= '<div class="col-lg-4 col-md-4 col-12">
                                        <article class="wow fadeIn animated hover-up mb-30 animated shadow rounded p-2" style="visibility: visible;">
                                            <div class="post-thumb img-hover-scale">
                                                <a href="'.$route.'">
                                                    <img src="'.asset($post->thumbnail).'" alt="'.$post->title.'">
                                                </a>
                                                <div class="entry-meta">
                                                    <a class="entry-meta meta-2" href="'.$route.'" title="'.$post->title.'">'.$post->brand_info->name.'</a>
                                                </div>
                                            </div>
                                            <div class="entry-content-2">
                                                <h4 class="post-title mb-15 text-justify" title="'.$post->title.'">
                                                    <a href="'.$route.'">'.$post->title.'</a>
                                                </h4>
                                                <p class="post-exerpt mb-30">'.Str::limit(strip_tags($post->description) , 90, $end=' ....').'</p>
                                                <div class="entry-meta meta-1 font-xs color-grey mt-10 pb-10">
                                                    <div>
                                                        <span class="post-on"><i class="fi-rs-clock"></i>'. date("d F Y", strtotime($post->date)).'</span>
                                                    </div>
                                                    <a href="'.$route.'" title="" class="text-brand">Read more <i class="fi-rs-arrow-right"></i></a>
                                                </div>
                                            </div>
                                        </article>
                                    </div>';
                        }
                    $output .= '</div>';

            return Response($output);

    }

    public function latest_compare_ajax_output() {
        $output = '';
        $latest_compare = CompareProduct::orderBy('id', 'DESC')->take(5)->get(['id', 'first_product_id', 'second_product_id', 'third_product_id', 'created_at']);

            foreach($latest_compare as $compare){
                $title = $compare->firstProductInfo->title." VS ".$compare->secondProductInfo->title;
                if(!empty($compare->third_product_id)){
                    $title = $title." VS ".optional($compare->thirdProductInfo)->title;
                }
                $output .= '<div class="col-6 col-lg-12 col-md-12 p3-small border hover-up">
                    <article class="row">
                        <figure class="col-md-4 mb-0">
                            <a href="'.route('compare.details', ['id'=>$compare->id, 'slug'=>Str::slug($title)]).'" title="'.$title.'"><img src="'.asset($compare->firstProductInfo->image).'" alt="'.$title.'"></a>
                        </figure>
                        <div class="col-md-8 mb-0">
                            <h4 class="mt-2 sm-screen-center" title="'.$title.'">
                                <a class="fw-bold" href="'.route('compare.details', ['id'=>$compare->id, 'slug'=>Str::slug($title)]).'" title="'.$title.'">'.$title.'</a>
                            </h4>
                            <div class="product-price">
                                <span>'.Carbon::parse($compare->created_at)->diffForHumans().'</span>
                            </div>
                        </div>
                    </article>
                </div>';
                }
                $output .= '<div class="col-lg-12 col-md-12 col-12 mt-3 col-sm-12">
                    <div class="d-grid gap-2">
                        <a href="'.route('compare').'" title="" class="btn btn-sm rounded-pill">View All</a>
                    </div>
                </div>';

            return Response($output);
    }

    

    public function posts() {
        $posts = Blogs::where('is_active', 1)->orderBy('date', 'DESC')->take(6)->get(['date', 'brand_id', 'title', 'thumbnail', 'description', 'views', 'id']);
        return $posts;
    }

    public function settings() {
        $settings = DB::table('business_settings')->where('id', 1)->first();
        return $settings;
    }

    

    public function home() {
        $products = Products::where('is_active', 1)->orderBy('release_date', 'DESC')->select(['id', 'title', 'url', 'image', 'brand_id', 'coming_soon_status', 'is_rumored', 'is_discount', 'discount_percent'])->paginate(16);
        return view('layouts.pages.home', compact('products'));
        
    }

    public function brands() {
        $brands = Brands::where('is_active', 1)->orderBy('serial_num', 'ASC')->select(['name', 'image', 'id'])->paginate(20);
        return view('layouts.pages.brands', compact('brands'));
    }

    public function price_range($start_price, $end_price) {
        
        $products = ProductPrice::query()
        ->join('products', 'products.id', '=', 'product_prices.product_id')
        ->select('product_prices.product_id')
        ->where('product_prices.price', '>=', $start_price)
        ->where('product_prices.price', '<=', $end_price)
        ->where('products.coming_soon_status', '!=', 1)
        ->orderByDesc('products.release_date')
        ->paginate(20);

        //$products = ProductPrice::where('price', '>=', $start_price)->where('price', '<=', $end_price)->groupBy('product_id')->select('product_id')->paginate(20);
        $priceRangeInfo = PriceRange::where(['start_price'=>$start_price, 'end_price'=>$end_price])->first();
        return view('layouts.pages.price_range_details', compact('products', 'priceRangeInfo'));
    }

    public function all_price_range()  {
        $price_range = PriceRange::orderBy('serial_num', 'ASC')->get(['start_price', 'end_price', 'title']);
        return view('layouts.pages.price_ranges', compact('price_range'));

    }

    public function upcoming_mobiles() {
        $products = Products::where(['is_active' => 1, 'coming_soon_status' => 1])->orderBy('release_date', 'DESC')->select(['id', 'title', 'url', 'image', 'brand_id', 'coming_soon_status', 'is_rumored', 'is_discount', 'discount_percent'])->paginate(28);
        return view('layouts.pages.upcoming_phones', compact('products'));
        
    }

    
    public function product_details($brand, $url) {
        $product_info = Products::where('url', $url)->first();
        if(!is_null($product_info)) {
            $product_info->increment('views');
            DB::table('visitors')->insert(['from' => "P", 'reference_id' => $product_info->id, 'created_at'=>Carbon::now()]);
            $categories = FeaturesCategories::orderBy('serial_num', 'asc')->get();
            return view('layouts.pages.product_details', compact('product_info', 'categories'));
        }
        else {
            return Redirect()->back();
        }
        
    }

    public function similar_phone(Request $request) {
        $pid = $request->pid;
        $price_info = DB::table('product_prices')->where('product_id', $pid)->get();
        $price =  $price_info->pluck('price');

        $products = DB::table('product_prices')
                ->join('products', 'product_prices.product_id', '=', 'products.id')
                ->select('products.*', 'product_prices.price', 'product_prices.discount_price')
                ->whereIn('product_prices.price', $price)
                ->where('products.coming_soon_status', '!=', 1)
                ->where('product_prices.product_id', '!=', $pid)
                ->orderByDesc('products.release_date')
                ->take(6)
                ->get();

        $output = '';
        
        $output .= '<h5 class="section-title style-1 mb-30 wow fadeIn animated">Similar Phones</h5>
                    <div class="row">';
                        foreach($products as $product){
                        $brand_info = DB::table('brands')->where('id', $product->brand_id)->first('name');
                        $route = route('product.details', ['brand'=>$brand_info->name, 'url'=>$product->url]);
                        $output .= '<div class="col-lg-4 col-md-4 col-6 col-sm-6 hover-up pl-3 pr-3" >
                            <div class="side-item mb-3 shadow">
                                <div class="side-product-img-parent">
                                    <div class="side-product-img product-img-zoom">
                                        <a href="'.$route.'" title="'.$product->title.'">
                                            <img class="default-img" src="'.asset($product->image).'" alt="'.$product->title.'">
                                        </a>
                                    </div>
                                </div>
                                <div class="product-content-wrap">
                                    <div class="text-center side-title">
                                        <a href="'.$route.'" title="'.$product->title.'">'.$product->title.'</a>
                                    </div>
                                    <div class="product-category text-center">';
                                    if($product->is_rumored == 1){
                                        $output .= '<a class="text-info" href="'.$route.'" title="'.$product->title.'">REMORED</a>';
                                     }else{ 
                                        if($product->is_discount == 1){
                                            $output .= '<a class="text-info" href="'.$route.'" title="'.$product->title.'">৳ '.number_format($product->discount_price, 2).'</a>';
                                        } else {
                                            $output .= '<a class="text-info" href="'.$route.'" title="'.$product->title.'">৳ '.number_format($product->price, 2).'</a>';
                                        }
                                    }
                                    $output .= '</div>
                                </div>
                            </div>
                        </div>';
                        }
                        $output .= '</div>';

            return Response($output);
    }

    public function similar_news(Request $request) {
        $pid = $request->pid;
        
        $posts = DB::table('product_related_posts')
                ->join('blogs', 'product_related_posts.blogs_id', '=', 'blogs.id')
                ->select('blogs.*')
                ->where('product_related_posts.product_id', $pid)
                ->orderByDesc('product_related_posts.id')
                ->take(5)
                ->get();

        $output = '';
        if(count($posts) > 0) {
        $output .= '<h5 class="section-title style-1 mb-30 wow fadeIn animated">Similar News</h5>
                    <div class="row">';
                        foreach($posts as $post){
                            $route = route('post.details', ['slug'=>Str::slug($post->title), 's'=>$post->id]);
                            $output .= '<div class="col-12 col-lg-12 col-md-12 p3-small border hover-up">
                            <article class="row">
                                <figure class="col-md-4 mb-0">
                                    <a href="'.$route.'" title="'.$post->title.'"><img src="'.asset($post->thumbnail).'" alt="'.$post->title.'"></a>
                                </figure>
                                <div class="col-md-8 mb-0">
                                    <h5 class="mt-2 sm-screen-center" title="'.$post->title.'">
                                        <a class="fw-bold" href="'.$route.'" title="'.$post->title.'">'.$post->title.'</a>
                                    </h5>
                                    <div class="product-price text-left">'.Carbon::parse($post->created_at)->diffForHumans().'</div>
                                </div>
                            </article>
                        </div>';
                        }

            $output .= '</div>';
        }
            return Response($output);
    }

    





    public function brand_info($brand_name) {
        $brand_name = Str::title(str_replace('-', ' ', $brand_name));
        $brand_info = DB::table('brands')->where('name', $brand_name)->first();
        $products = Products::where(['is_active' => 1, 'brand_id' => $brand_info->id])->orderBy('release_date', 'DESC')->select(['id', 'title', 'url', 'image', 'brand_id', 'coming_soon_status', 'is_rumored', 'is_discount', 'discount_percent'])->paginate(20);
        return view('layouts.pages.brand_info', compact('products', 'brand_info'));
    }

    public function popular_mobiles() {
        $products = Products::where(['is_active' => 1, 'is_popular' => 1])->orderBy('release_date', 'DESC')->select(['id', 'title', 'url', 'image', 'brand_id', 'coming_soon_status', 'is_rumored', 'is_discount', 'discount_percent'])->paginate(16);
        return view('layouts.pages.popular_phones', compact('products'));
    }

    public function rumored_mobiles() {
        $products = Products::where(['is_active' => 1, 'is_popular' => 1])->orderBy('release_date', 'DESC')->select(['id', 'title', 'url', 'image', 'brand_id', 'coming_soon_status', 'is_rumored', 'is_discount', 'discount_percent'])->paginate(16);
        return view('layouts.pages.rumored_phones', compact('products'));
    }

    public function type_details($type_name) {
        $type_name = Str::title(str_replace('-', ' ', $type_name));
        $type_info = DB::table('categories')->where('category_name', $type_name)->first();
        $products = Products::where(['is_active' => 1, 'category_id' => $type_info->id])->orderBy('release_date', 'DESC')->select(['id', 'title', 'url', 'image', 'brand_id', 'coming_soon_status', 'is_rumored', 'is_discount', 'discount_percent'])->paginate(16);
        return view('layouts.pages.type_details', compact('products', 'type_info'));
    }

    public function about_us() {
        $settings = $this->settings();
        return view('layouts.pages.about_us', compact('settings'));
    }

    public function privacy_policy() {
        $settings = $this->settings();
        return view('layouts.pages.privacy_policy', compact('settings'));
    }

    public function site_map () {
        $brands = DB::table('brands')->where('is_active', 1)->orderBy('serial_num', 'ASC')->get(['name', 'icon']);
        $price_range = DB::table('price_ranges')->orderBy('serial_num', 'ASC')->get(['id', 'title', 'serial_num', 'start_price', 'end_price']);
        $settings = DB::table('business_settings')->first();
        $categories = DB::table('categories')->get(['category_name']);
        return view('layouts.pages.site_map', compact('brands', 'price_range', 'categories'));
    }
    

    public function disclaimer() {
        $settings = $this->settings();
        return view('layouts.pages.disclaimer', compact('settings'));
    }

    public function contact_us() {
        $settings = $this->settings();
        return view('layouts.pages.contact_us', compact('settings'));
    }

    public function contact_us_submit(Request $request) {
        $validated = $request->validate([
            'name' => 'required',
            'email' => 'required',
            'message' => 'required',
        ]);

        $contactUs = new ContactUs;
        $contactUs->name = $request->name;
        $contactUs->email = $request->email;
        $contactUs->phone = $request->phone;
        $contactUs->message = $request->message;
        $contactUs->created_at = Carbon::now();
        $contactUs->save();
        return Redirect()->back()->with('form_submitted', '1');
    }

    public function news() {
        $posts = Blogs::where('is_active', 1)->orderBy('date', 'DESC')->select(['date', 'brand_id', 'title', 'thumbnail', 'description', 'views', 'id'])->paginate(9);
        return view('layouts.pages.news', compact('posts'));
    }

    public function post_details($slug, Request $request) {
        $news_id = $request->s;
        $news_info = Blogs::find($news_id);
        $news_info->increment('views');
        //return $news_info;
        $releted_news = Blogs::where('brand_id', $news_info->brand_id)->orderBy('date', 'DESC')->take(5)->get();
        return view('layouts.pages.news_details', compact('news_info', 'releted_news'));
    }

    public function submit_post_comments(Request $request) {
        $output = 0;
        $validated = $request->validate([
            'name' => 'required',
            'email' => 'required',
            'comment' => 'required',
            'post_id' => 'required',
        ]);

        $comment = new PostComment;
        $comment->name = $request->name;
        $comment->email = $request->email;
        $comment->comment = $request->comment;
        $comment->post_id = $request->post_id;
        $comment->is_active = 0;
        $comment->created_at = Carbon::now();
        $save = $comment->save();

        if($save) {
            $output = 1;
        }
        return Response($output);

    }

    public function submit_product_reviews(Request $request)  {
        $output = 0;
        $validated = $request->validate([
            'name' => 'required',
            'email' => 'required',
            'product_id' => 'required',
        ]);

        $review = new Review;
        $review->product_id = $request->product_id;
        $review->name = $request->name;
        $review->email = $request->email;
        $review->review_text = $request->review_text;
        $review->design_rating = $request->design_rating;
        $review->camera_rating = $request->camera_rating;
        $review->connectivity_rating = $request->connectivity_rating;
        $review->features_rating = $request->features_rating;
        $review->hardware_rating = $request->hardware_rating;
        $review->performance_rating = $request->performance_rating;
        $review->battery_rating = $request->battery_rating;
        $review->usability_rating = $request->usability_rating;
        $review->created_at = Carbon::now();
        $save = $review->save();
        if($save) {
            $output = 1;
        }
        return Response($output);
    }

    public function product_tag($t) {
        $tag = Str::title(str_replace('-', ' ', $t));
        $products = ProductTags::where('name', $tag)->orderBy('id', 'DESC')->paginate(16);
        return view('layouts.pages.product_tags_details', compact('tag', 'products'));
    }

    public function news_tag($c) {
        $tag = Str::title(str_replace('-', ' ', $c));
        $news = BlogTags::where('name', $tag)->orderBy('id', 'DESC')->paginate(10);
        return view('layouts.pages.news_tag_details', compact('tag', 'news'));
    }

    public function blog_related_phones(Request $request) {
        $blog_id = $request->blog_id;

        $products = DB::table('product_related_posts')
                ->join('products', 'product_related_posts.product_id', '=', 'products.id')
                ->select('products.*')
                ->where('product_related_posts.blogs_id', $blog_id)
                ->where('products.coming_soon_status', '!=', 1)
                ->orderByDesc('products.release_date')
                ->take(6)
                ->get();

        $output = '';
        if(count($products) > 0) {
        $output .= '<h5 class="section-title style-1 mb-30 wow fadeIn animated">Related Phones</h5>
                    <div class="row">';
                        foreach($products as $product){
                        $brand_info = DB::table('brands')->where('id', $product->brand_id)->first('name');
                        $route = route('product.details', ['brand'=>$brand_info->name, 'url'=>$product->url]);
                        $output .= '<div class="col-lg-4 col-md-4 col-6 col-sm-6 hover-up pl-3 pr-3" >
                            <div class="side-item mb-3 shadow">
                                <div class="side-product-img-parent">
                                    <div class="side-product-img product-img-zoom">
                                        <a href="'.$route.'" title="'.$product->title.'">
                                            <img class="default-img" src="'.asset($product->image).'" alt="'.$product->title.'">
                                        </a>
                                    </div>
                                </div>
                                <div class="product-content-wrap">
                                    <div class="text-center side-title">
                                        <a href="'.$route.'" title="'.$product->title.'">'.$product->title.'</a>
                                    </div>
                                    <div class="product-category text-center">';
                                    
                                    $output .= '</div>
                                </div>
                            </div>
                        </div>';
                        }
                        $output .= '</div>';
                    }
            return Response($output);
    }

    


    

    

    

    

    

    

    
    


    



    
}
