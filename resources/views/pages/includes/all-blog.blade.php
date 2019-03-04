@extends('pages.blog')
@section('blog_content')
    <!-- Blog Post -->
    @foreach($all_post as $k=>$v)
    <div class="blog_post">                        
        <div class="blog_post_title"><a href="#">{{$v->title}}</a></div>
        <div class="blog_post_meta">
            <ul>
                <li class="blog_post_meta_item"><a href="">by {{$v->user_full_name}}</a></li>
                <li class="blog_post_meta_item"><a href="">{{$v->category_name}}</a></li>
            </ul>
        </div>
        <div class="blog_post_text">
            <div class="blog_post_image">
                <img src="{{ asset('uploads/'.$v->featured_img) }}" alt="{{$company->name}}"  style="float:left; margin: 0 29px 29px 0;">
                <div class="blog_post_date d-flex flex-column align-items-center justify-content-center">
                    <div class="blog_post_day">{{ date_format($v->created_at,"d") }}</div>
                    <div class="blog_post_month">{{ date_format($v->created_at,"M, Y") }}</div>
                </div>
                <div style="text-align:justify;">
                    {!! strip_tags(substr($v->content, 0, 300)) . "..." !!}
                </div>
            </div>
        </div>
        <div class="blog_post_link"><a href="{{ url('/blog/'.$v->id) }}">read more</a></div>
    </div><br>
    @endforeach
@endsection