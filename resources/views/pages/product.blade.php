@extends('index')
@section('content')

<style>
    .blog_post_image img {
        width: 38%;
        float: left;
        margin-right: 27px;
    }
    .blog_post_text ol, .blog_post_text ul {
        margin-left: 30px;
    }
    .booking-button .search_button {
        background: #9152f8;
    }
    .img-related-services {
        width: 69px;
    }
    .booking-form {
        margin-top: 35px;
    }
</style>

<div class="blog">
    <div class="container">
        <div class="row">

            <!-- Blog Content -->

            <div class="col-lg-9">
                
                <div class="blog_post_container">
                                        
                    <!-- Blog Post -->         
                    <div class="blog_post">                        
                        <!-- <div class="blog_post_image">                            
                            <img src="{{ asset('uploads/'.$product->featured_img) }}" alt="{{ $product->featured_img }}">
                            <div class="blog_post_date d-flex flex-column align-items-center justify-content-center">
                                <div class="blog_post_day">01</div>
                                <div class="blog_post_month">Dec, 2017</div>                                
                            </div>
                        </div> -->
                        <input type="hidden" value="{{ $product->id }}" id="this_id">
                        <div class="blog_post_title"><a href="#">{{ $product->name }}</a></div>
                        <div class="blog_post_meta" style="margin-top: 0px;">
                            <ul>
                                <li class="blog_post_meta_item"><a href="">{{ $product->category_name }}</a></li>
                                <li class="blog_post_meta_item"><a href="">{{ date_format($product->created_at,"M d, Y") }}</a></li>
                            </ul>
                        </div>
                        <div class="blog_post_text">                            
                            <p>{!! $product->desc !!}</p>
                        </div>
                        <div class="alert alert-success" style="display:none">
                            <!-- ajax -->
                        </div>
                        <div class="booking-button">
                            <button class="button search_button" id="search_button1">Book now!<span></span><span></span><span></span></button>
                            <img src="{{ asset('svg/spinner.svg') }}" style="width:10%; display:none;" id="spinner1">
                        </div>
                        <div class="booking-form" id="booking-form1">
                            <!-- ajax -->
                        </div>
                    </div>

                </div>                  
            </div>

            <!-- Blog Sidebar -->

            <div class="col-lg-3 sidebar_col">
                
                <!-- Sidebar Archives -->
                <!-- <div class="sidebar_categories" style="margin-top: 7px;">
                    <div class="sidebar_title">Related services</div>
                    <div class="sidebar_list">
                        <ul>
                            @foreach($related_product_of_same_category as $j=>$k)
                            <li><a href="{{ url('/product/'.$k->id) }}">{{$k->name}}</a></li>                            
                            @endforeach
                        </ul>
                    </div>
                </div> -->

                <div class="sidebar_latest_posts">
                    <div class="sidebar_title">Related services</div>
                    <div class="latest_posts_container">
                        <ul>
                            <!-- Latest Post -->
                            @foreach($related_product_of_same_category as $j=>$k)
                            <li class="latest_post clearfix">
                                <div class="latest_post_image">
                                    <a href="{{ url('/product/'.$k->id) }}"><img class="img-related-services" src="{{ asset('uploads/'.$k->featured_img) }}" alt=""></a>
                                </div>
                                <div class="latest_post_content">
                                    <div class="latest_post_title trans_200"><a href="{{ url('/product/'.$k->id) }}">{{$k->name}}</a></div>
                                    <div class="latest_post_meta">
                                        <div class="latest_post_author trans_200"><a href="#">by Admin</a></div>
                                        <div class="latest_post_date trans_200"><a href="#">{{ date_format($k->created_at,"M d, Y") }}</a></div>
                                    </div>
                                </div>
                            </li>
                            @endforeach
                        </ul>
                    </div>
                </div>

                <!-- Sidebar Latest Posts -->

                <div class="sidebar_latest_posts" style="margin-top: 40px;">
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
                <!-- <div class="sidebar_gallery" style="margin-top: 40px;">
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
                </div> -->

            </div>
        </div>
    </div>
</div>

@endsection

@section('javascript')
<script>
    var Booking = {
        "get_form" : function(){
            $.ajax({
                url: "/booking/get_form/{{ $product->id }}",
                type: 'get',
                dataType: 'html',
                beforeSend : function(){
                    $("#spinner1").show();
                }
            }).done(function(html){
                $("#booking-form1").html(html);
                $("input[name='product_id']").val($("#this_id").val());
                $("#spinner1").hide();
            }).fail(function(xhr){
                $("#spinner1").hide();
                $("#booking-form1").html("something wrong, while loading the booking form!");
            });
        }
    };

    $(document).ready(function()
    {
        $('html, body').animate({ scrollTop: $('.search').offset().top }, 'fast');
        
        var current_product_id = "{{ $product->id }}";
        var you_have_booked = Cookies.get('booked');
        var product_booked = Cookies.get('product_id');
        if (you_have_booked) {
            if (current_product_id==product_booked) {                
                $(".alert-success").show().html("Your booking has been sent, our reservation will contact you shortly. Thank you.");
                $(".booking-button, #booking-form1").remove();
            }
        }
        
        $("#search_button1").on("click", function(){
            Booking.get_form();
            $(this).remove();
        });
    });
</script>
@parent
@stop