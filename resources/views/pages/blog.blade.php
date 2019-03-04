@extends('index')
@section('content')
<div class="blog">
    <div class="container">
        <div class="row">

            <!-- Blog Content -->
            <div class="col-lg-9">                
                <div class="blog_post_container">                
                    @yield('blog_content')
                </div>                  
            </div>
            <!-- Blog Sidebar -->

            <div class="col-lg-3 sidebar_col">
                
                <!-- Sidebar Archives -->
                <div class="sidebar_archives">
                    <div class="sidebar_title">Archives</div>
                    <div class="sidebar_list">
                        <ul>
                            @foreach($archives as $a=>$b)
                            <li><a href="#">{{$b->month_name ." ". $b->year}}</a></li>
                            @endforeach
                        </ul>
                    </div>
                </div>
                
                <!-- Sidebar Archives -->
                <div class="sidebar_categories">
                    <div class="sidebar_title">Categories</div>
                    <div class="sidebar_list">
                        <ul>
                            @foreach($categories as $x=>$y)
                            <li><a href="#">{{$y->name}}</a></li>
                            @endforeach                            
                        </ul>
                    </div>
                </div>

                <!-- Sidebar Latest Posts -->

                <div class="sidebar_latest_posts">
                    <div class="sidebar_title">Latest Posts</div>
                    <div class="latest_posts_container">
                        <ul>
                            <!-- Latest Post -->
                            @foreach($latest_post as $g=>$h)
                            <li class="latest_post clearfix">
                                <div class="latest_post_image">
                                    <a href="{{url('/blog/'.$h->id)}}"><img src="{{ asset('uploads/'.$h->featured_img) }}" alt="{{$company->name}}" style="width: 73px"></a>
                                </div>
                                <div class="latest_post_content">
                                    <div class="latest_post_title trans_200"><a href="{{url('/blog/'.$h->id)}}">{{$h->title}}</a></div>
                                    <div class="latest_post_meta">
                                        <div class="latest_post_author trans_200"><a href="#">{{$h->user_full_name}}</a></div>
                                        <div class="latest_post_date trans_200"><a href="#">{{ date_format($h->created_at,"M d, Y") }}</a></div>
                                    </div>
                                </div>
                            </li>
                            @endforeach
                        </ul>
                    </div>
                </div>

                <!-- Sidebar Gallery -->
                <div class="sidebar_gallery">
                    <div class="sidebar_title">Instagram</div>
                    <div class="gallery_container">
                        <ul class="gallery_items d-flex flex-row align-items-start justify-content-between flex-wrap">
                            <li class="gallery_item">
                                <a class="colorbox" href="https://images.unsplash.com/photo-1473625247510-8ceb1760943f?ixlib=rb-0.3.5&s=c0996cd16eda8c6f54c398de02d03cd3&auto=format&fit=crop&w=720&q=80">
                                    <img src="{{ asset('vendor/theme-travelix/images/gallery_1.jpg') }}" alt="https://unsplash.com/@mantashesthaven">
                                </a>
                            </li>
                            <li class="gallery_item">
                                <a class="colorbox" href="https://images.unsplash.com/photo-1495162048225-6b3b37b8a69e?ixlib=rb-0.3.5&s=861dd3c7b9d3e735d7fd7cbb1eefed64&auto=format&fit=crop&w=720&q=80">
                                    <img src="{{ asset('vendor/theme-travelix/images/gallery_2.jpg') }}" alt="https://unsplash.com/@kensuarez">
                                </a>
                            </li>
                            <li class="gallery_item">
                                <a class="colorbox" href="https://images.unsplash.com/photo-1502646275263-04be86afa386?ixlib=rb-0.3.5&s=682a41d7d9bf6e3feabc73a5fdd61dd2&auto=format&fit=crop&w=720&q=80">
                                    <img src="{{ asset('vendor/theme-travelix/images/gallery_3.jpg') }}" alt="https://unsplash.com/@jakobowens1">
                                </a>
                            </li>
                            <li class="gallery_item">
                                <a class="colorbox" href="https://images.unsplash.com/photo-1484820301304-0b43512779dc?ixlib=rb-0.3.5&s=7a3393e9f507fb4718c36337a8014c52&auto=format&fit=crop&w=720&q=80">
                                    <img src="{{ asset('vendor/theme-travelix/images/gallery_4.jpg') }}" alt="https://unsplash.com/@seefromthesky">
                                </a>
                            </li>
                            <li class="gallery_item">
                                <a class="colorbox" href="https://images.unsplash.com/photo-1490380169520-0a4b88d52565?ixlib=rb-0.3.5&s=7e6b68b1911fb4ffeea4c0750b8a5269&auto=format&fit=crop&w=720&q=80">
                                    <img src="{{ asset('vendor/theme-travelix/images/gallery_5.jpg') }}" alt="https://unsplash.com/@deannaritchie">
                                </a>
                            </li>
                            <li class="gallery_item">
                                <a class="colorbox" href="https://images.unsplash.com/photo-1504434026032-a7e440a30b68?ixlib=rb-0.3.5&s=2cc35bf903b78ba4f7f7ed69bc2abe3f&auto=format&fit=crop&w=720&q=80">
                                    <img src="{{ asset('vendor/theme-travelix/images/gallery_6.jpg') }}" alt="https://unsplash.com/@benobro">
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>
@endsection

@section('javascript')
<script>
    $(document).ready(function(){
        
        console.log("all blog");

        $('html, body').animate({ scrollTop: $('.search').offset().top }, 'fast');

    });
</script>
@parent
@stop