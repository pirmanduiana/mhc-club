@extends('pages.blog')
@section('blog_content')
    <!-- Blog Post -->
    <div class="blog_post">                        
        <div class="blog_post_title"><a href="#">{{$blog_post_by_id->title}}</a></div>
        <div class="blog_post_meta">
            <ul>
                <li class="blog_post_meta_item"><a href="">by {{$blog_post_by_id->user_full_name}}</a></li>
                <li class="blog_post_meta_item"><a href="">{{$blog_post_by_id->category_name}}</a></li>
            </ul>
        </div>
        <div class="blog_post_text">
            <div class="blog_post_image">
                <img src="{{ asset('uploads/'.$blog_post_by_id->featured_img) }}" alt="{{$company->name}}"  style="width:100%; height:100%">
                <div class="blog_post_date d-flex flex-column align-items-center justify-content-center">
                    <div class="blog_post_day">{{ date_format($blog_post_by_id->created_at,"d") }}</div>
                    <div class="blog_post_month">{{ date_format($blog_post_by_id->created_at,"M, Y") }}</div>
                </div>
                <div style="text-align:justify; padding-top: 11px;">
                    {!! $blog_post_by_id->content !!}
                </div>
            </div>
        </div>
        <div class="blog_post_link"><a href="{{ url('/blog') }}">back</a></div>
    </div>
@endsection