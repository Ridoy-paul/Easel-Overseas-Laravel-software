@php($route = route('post.details', ['slug'=>Str::slug($post->title), 's'=>$post->id]))
<div class="col-lg-4 col-md-4 col-12">
    <article class="wow fadeIn animated hover-up mb-30 animated shadow rounded p-2" style="visibility: visible;">
        <div class="post-thumb img-hover-scale">
            <a href="{{$route}}">
                <img src="{{asset($post->thumbnail)}}" alt="{{$post->title}}">
            </a>
            <div class="entry-meta">
                <a class="entry-meta meta-2" href="{{$route}}" title="{{$post->title}}">{{$post->brand_info->name}}</a>
            </div>
        </div>
        <div class="entry-content-2">
            <h4 class="post-title mb-15 text-justify" title="{{$post->title}}">
                <a href="{{$route}}">{{$post->title}}</a>
            </h4>
            <p class="post-exerpt mb-30">{{Str::limit(strip_tags($post->description) , 90, $end=' ....')}}</p>
            <div class="entry-meta meta-1 font-xs color-grey mt-10 pb-10">
                <div>
                    <span class="post-on"><i class="fi-rs-clock fw-bold"></i> {{ date("d F Y", strtotime($post->date))}}</span>
                </div>
                <a href="{{$route}}" title="" class="text-brand">Read more <i class="fi-rs-arrow-right"></i></a>
            </div>
        </div>
    </article>
</div>