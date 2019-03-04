@extends('index')
@section('content')
<div class="offers">
    <div class="container">
        <div class="row">
            <div class="col text-center">
                <h2 class="section_title">Our best offers</h2>
            </div>
        </div>
        <div class="row offers_items">

            <!-- Offers Item -->
            @foreach($products as $k=>$v)
                <div class="col-lg-6 offers_col">
                    <div class="offers_item">
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="offers_image_container">
                                    <div class="offers_image_background" style="background-image:url({{ asset('uploads/'.$v->featured_img) }})"></div>
                                    <div class="offer_name"><a href="#">
                                        @if($v->show_price==1)
                                            {{ $v->currency_code ." ". number_format($v->price, 2) }}
                                        @else
                                            Negotiable price
                                        @endif
                                    </a></div>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="offers_content">                                    
                                    <div class="offers_price">{{ $v->name }}<span></span></div>                                    
                                    <div class="rating_r rating_r_{{ $v->rating }} offers_rating" data-rating="{{ $v->rating }}">
                                        <i></i>
                                        <i></i>
                                        <i></i>
                                        <i></i>
                                        <i></i>
                                    </div>
                                    <p class="offers_text">{{ strip_tags(substr($v->desc, 0, 150)) . "..." }}</p>
                                    <div class="offers_icons">
                                        <ul class="offers_icons_list">
                                            <li class="offers_icons_item"><img src="{{ asset('vendor/theme-travelix/images/post.png') }}" alt=""></li>
                                            <li class="offers_icons_item"><img src="{{ asset('vendor/theme-travelix/images/compass.png') }}" alt=""></li>
                                            <li class="offers_icons_item"><img src="{{ asset('vendor/theme-travelix/images/bicycle.png') }}" alt=""></li>
                                            <li class="offers_icons_item"><img src="{{ asset('vendor/theme-travelix/images/sailboat.png') }}" alt=""></li>
                                        </ul>
                                    </div>
                                    <div class="offers_link"><a href="{{ url('/product/'.$v->id) }}">more</a></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach

        </div>
    </div>
</div>

<!-- Google Map -->
<div class="offers">
    <div class="container">
        <div class="row">
            <div class="col text-center">
                <h2 class="section_title">Our location</h2>
            </div>
        </div>
        <div class="travelix_map" style="margin-top: 54px;">
            <div id="google_map" class="google_map">
                <div class="map_container">
                    <iframe width="100%" height="393" id="gmap_canvas" src="https://maps.google.com/maps?q=beji%20batur%20sambian%20undagi&t=&z=17&ie=UTF8&iwloc=&output=embed" frameborder="0" scrolling="no" marginheight="0" marginwidth="0"></iframe>
                </div>
            </div>
        </div>
    </div>
</div>


<!-- Reviews -->
<div class="offers">
    <div class="container">
        <div class="row">
            <div class="col text-center">
                <h2 class="section_title">What our clients say about us</h2>
            </div>
        </div>
        <div class="reviews">
            <div class="reviews_title"></div>
            <div class="reviews_container">                
                <!-- Review -->
                @foreach($testimonies as $x=>$y)
                <div class="review">
                    <div class="row">
                        <div class="col-lg-1">
                            <div class="review_image">
                                <img src="{{ asset('vendor/theme-travelix/images/review_1.jpg') }}" alt="{{$company->name}}">
                            </div>
                        </div>
                        <div class="col-lg-11">
                            <div class="review_content">
                                <div class="review_title_container">
                                    <div class="review_title">"{{ $y->subject }}"</div>
                                </div>
                                <div class="review_text">
                                    <p>{!! $y->message !!}</p>
                                </div>
                                <div class="review_name">{{ $y->guest_name }}</div>
                                <div class="review_date">{{ date_format($y->created_at,"M d, Y") }}</div>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
</div>
@endsection