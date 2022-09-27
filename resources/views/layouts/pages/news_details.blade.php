@extends('layouts.app')

@section('title'){{optional($news_info)->title.' | '. env('APP_NAME')}}@endsection
@section('description'){!!'Latest official/unofficial Mobile Phones, Smartphones, Feature phones, Smart band and Watch News in Bangladesh '.date('Y').'. topmobileinfo news BD'!!}@endsection
@section('keywords') @foreach($news_info->postTags as $tag){{$tag->name}},@endforeach @endsection
@section('content')

<style>
    a.social-button {
        background-color: #243851 !important;
        color: #ffffff !important;
        padding: 5px;
        font-size: 20px !important;
    }

    a.social-button:hover {
        background-color: #F93A08 !important;
    }

    .profile-page .profile-header {
        position: relative
    }

    .profile-page .profile-header .profile-image img {
        border-radius: 50%;
        width: 140px;
        border: 3px solid #fff;
        box-shadow: 0 3px 6px rgba(0, 0, 0, 0.16), 0 3px 6px rgba(0, 0, 0, 0.23)
    }

    .profile-page .profile-header .social-icon a {
        margin: 0 5px
    }

    .profile-page .profile-sub-header {
        min-height: 60px;
        width: 100%
    }

    .profile-page .profile-sub-header ul.box-list {
        display: inline-table;
        table-layout: fixed;
        width: 100%;
        background: #eee
    }

    .profile-page .profile-sub-header ul.box-list li {
        border-right: 1px solid #e0e0e0;
        display: table-cell;
        list-style: none
    }


</style>
<section class="mt-50 mb-50">
    <div class="container">
        <div class="row">
            <div class="col-lg-8">
                <div class="single-page pr-30">
                    <div class="single-header style-2">
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{route('index')}}">Home</a></li>
                                <li class="breadcrumb-item"><a href="{{route('news')}}">News</a></li>
                                <li class="breadcrumb-item active" aria-current="page">{{optional($news_info)->title}}</li>
                            </ol>
                        </nav>
                        <h1 class="mb-30">{{optional($news_info)->title}}</h1>
                        <!-- <div class="single-header-meta">
                            <div class="entry-meta meta-1 font-xs mt-15 mb-15">
                                <span class="post-by">By <a href="#">Jonh</a></span>
                                <span class="post-on has-dot">9 April 2020</span>
                                <span class="time-reading has-dot">8 mins read</span>
                                <span class="hit-count  has-dot">29k Views</span>
                            </div>
                        </div> -->
                    </div>
                    <figure class="single-thumbnail">
                        <img src="{{asset(optional($news_info)->image)}}" alt="{{optional($news_info)->title}}">
                    </figure>
                    <div class="single-content">
                        {!!optional($news_info)->description!!}
                    </div>
                    
                    <div class="mt-50 mb-30 row">
                        <div class="col-md-8 col-12">
                            <div class="tags">
                                @foreach($news_info->postTags as $tag)
                                <a href="{{route('news.tags', ['c'=>Str::slug($tag->name)])}}" rel="tag" class="hover-up btn p-1 text-light mr-10">#{{$tag->name}}</a>
                                @endforeach
                            </div>
                        </div>
                        <div class="col-md-4 col-12">
                            <div class="social-icons single-share text-center">
                                <br class="d-lg-none">
                                {!! Share::page(Request::url())->facebook()->twitter()->linkedin()->whatsapp()->telegram()->reddit() !!}
                            </div>
                        </div>
                    </div>
                </div>

                    <div class="profile-page">
                        <div class="row">
                            <div class="col-xl-12 col-lg-12 col-md-12">
                                <div class="rounded profile-header">
                                    <div class="body">
                                        <div class="row">
                                            <div class="col-lg-4 col-md-4 col-12">
                                                <div class="profile-image float-md-right text-center align-item-center"><img src="{{asset(optional($news_info->upload_by)->profile_photo_path)}}" alt="{{optional($news_info->upload_by)->name}}"> </div>
                                            </div>
                                            <div class="col-lg-8 col-md-8 col-12">
                                                <h4 class="m-t-0 m-b-0 mt-2">{{optional($news_info->upload_by)->name}}</h4>
                                                <span class="job_post">Author</span>
                                                <small>{!!optional($news_info->upload_by)->description!!}</small>
                                            </div>                
                                        </div>
                                    </div>                    
                                </div>
                            </div>
                    </div>
                    
                    
                    <div class="mt-40 p-4 shadow rounded">
                        <div class="row">
                            <div class="col-lg-12">
                                <h4 class="mb-20">Comments</h4>
                                <div class="comment-list">
                                    @foreach($news_info->blog_comments as $comment)
                                    <div class="single-comment justify-content-between d-flex shadow hover-up p-2 rounded">
                                        <div class="user justify-content-between d-flex">
                                            <div class="desc">
                                                <h5><b class="text-primary">{{$comment->name}}</b></h5>
                                                <p>{{$comment->comment}}<br><small class="font-xs mr-30">{{ $comment->created_at->diffForHumans() }}</small></p>
                                                @if(!is_null($comment->comment_reply))
                                                <div class="ml-20 border rounded p-1">
                                                    <h6><b>Reply from TopMobileInfo❤️</b></h6>
                                                    <small>{{$comment->comment_reply}}</small> 
                                                    <small class="font-xs mr-30">{{ $comment->updated_at->diffForHumans() }}</small>
                                                </div>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                        <div class="mt-30">
                            <div class="row">
                                <div class="col-lg-12 col-md-12">
                                    <form class="form-contact p-2" action="javascript:voic(0)" id="comment_form">
                                        @csrf
                                        <h4>Leave a Reply</h4>
                                        <small>Your email address will not be published. Required fields are marked <span class="text-danger">*</span></small>
                                        <div class="row mt-20">
                                            <div class="col-12">
                                                <div class="form-group">
                                                    <textarea class="w-100" required name="comment" id="comment" cols="30" rows="9" placeholder="Write Comment">{{old('comment')}}</textarea>
                                                </div>
                                            </div>
                                            <div class="col-sm-6">
                                                <div class="form-group">
                                                    <input class="form-control" required name="name" id="name" value="{{old('name')}}" type="text" placeholder="Name">
                                                </div>
                                            </div>
                                            <div class="col-sm-6">
                                                <div class="form-group">
                                                    <input class="form-control" required name="email" id="email" value="{{old('email')}}" type="email" placeholder="Email">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-12 text-right" style="text-align: right;"> 
                                            <input type="hidden" name="post_id" value="{{optional($news_info)->id}}">
                                            <button type="submit" id="comment_submit" class="btn btn-sm btn-rounded">Post Comment</button>
                                            <h5 id="submit_processing" style="display: none;" class="text-success">Processing....</h5>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                </div>
            </div>
            
            <div class="col-lg-4 primary-sidebar sticky-sidebar">
                <div class="row">
                    <div class="col-lg-12 col-mg-6"></div>
                    <div class="col-lg-12 col-mg-6"></div>
                </div>

                <!-- Similar mobile phone Start -->
                <div class="widget-category mb-20 p-10" id="blog_related_phone"></div>

                <!-- popular mobile phone Start -->
                @include('layouts.sidebar.popular_phones')
                
                <!-- upcoming mobile phone Start -->
                @include('layouts.sidebar.upcoming_phone')
                
                <!-- Phone Brands Start -->
                @include('layouts.sidebar.brands')
                <input type="hidden" name="" id="blog_id" value="{{optional($news_info)->id}}">
                
                <!-- Latest Product Compare Start -->
                <div class="widget-category mb-20 p-10">
                    <h4 class="section-title style-1 mb-30 wow fadeIn animated animated animated" style="visibility: visible;" title="Latest Compare  at Top mobile info">Latest Compare</h4>
                    <div class="product-list-small wow fadeIn animated animated animated row" style="visibility: visible;" id="latest_compare_output">
                        
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection

@section('page_script')
<script>

var blog_id = $('#blog_id').val();

$(document).ready(function(){
  $('#comment_submit').click(function(e){
    if (document.getElementById("comment_form").checkValidity()) { 
        e.preventDefault();
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $.ajax({
            url: "/submit_post_comment",
            method: 'post',
            data: $('#comment_form').serialize(),
            beforeSend: function() {
                $('#comment_submit').hide();
                $('#submit_processing').show();
            },
            success: function(response){
                if(response == 1) {
                    $('#submit_processing').text("Comment Added Successfully.");
                    location.reload();
                }
                else {
                    error('Network error! Please Try Again.');
                    $('#comment_submit').show();
                    $('#submit_processing').hide();
                }
            }
        });
    }
    else {
        error('Something is missing');
    }
  });
});

$(window).load(function() {
    latest_compare_ajax_output();
    blog_related_phones(blog_id);
});
</script>
@endsection


