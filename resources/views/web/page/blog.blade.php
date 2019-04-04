@extends('web.layouts.index')

@section('content')
	<div id="colorlib-blog">
		<div class="container">
			<div class="row animate-box">
				<div class="col-md-6 col-md-offset-3 text-center colorlib-heading">
					<h2>Recent blog</h2>
					<!-- <p>A small river named Duden flows by their place and supplies it with the necessary regelialia.</p> -->
				</div>
			</div>
			<div class="row">
				@php
					$blog = App\WebBlog::where('status','Online')->get();
				@endphp

				@foreach($blog as $bloglist)
				<div class="col-md-4 animate-box">
					<div class="blog-entry">
						<a href="blog.html" class="blog-img" style="background-image: url({{ asset('/uploads').'/'.$bloglist->image }});"></a>
						<div class="desc">
							<p class="date">
								<span><a href="#">{{$bloglist->user}}</a></span>
								<span>{{date_format($bloglist->created_at,'M d Y')}}</span>
							</p>
							<h3><a href="blog.html">{{$bloglist->title}}</a></h3>
							<p>{{$bloglist->content}}</p>
							<p><a href="{{url('/single-blog/').'/'.$bloglist->id}}">Read more <i class="icon-arrow-right3"></i></a></p>
						</div>
					</div>
				</div>
				@endforeach
				{{--<div class="col-md-4 animate-box">
					<div class="blog-entry">
						<a href="blog.html" class="blog-img" style="background-image: url({{ asset('vendor/healthcare/images/img-blog-1.jpg') }});"></a>
						<div class="desc">
							<p class="date">
								<span><a href="#">Admin</a></span>
								<span>May 20 2019</span>
								<span><a href="">4 <i class="icon-speech-bubble"></i></a></span>
							</p>
							<h3><a href="blog.html">Training for first aid</a></h3>
							<p>We provide training for our health workers about basic life support. This training covers the procedure for resusciting pulse and heart, the way to handling unconscious patient, handling of patients that have an increased animal bits, handling of patient who have an injury that cause by the fuel or fire.</p>
							<p><a href="#">Read more <i class="icon-arrow-right3"></i></a></p>
						</div>
					</div>
				</div>
				<div class="col-md-4 animate-box">
					<div class="blog-entry">
						<a href="blog.html" class="blog-img" style="background-image: url({{ asset('vendor/healthcare/images/img-blog-2.jpg') }});"></a>
						<div class="desc">
							<p class="date">
								<span><a href="#">Admin</a></span>
								<span>May 20 2019</span>
								<span><a href="#">4 <i class="icon-speech-bubble"></i></a></span>
							</p>
							<h3><a href="blog.html">Free Medical Check-Up</a></h3>
							<p>We provide free medical check-up services in covering vital signs check, blood sugar check, cholesterol check, uric acid check and eyes check.</p>
							<p><a href="#">Read more <i class="icon-arrow-right3"></i></a></p>
						</div>
					</div>
				</div>
				<div class="col-md-4 animate-box">
					<div class="blog-entry">
						<a href="blog.html" class="blog-img" style="background-image: url({{ asset('vendor/healthcare/images/img-blog-3.jpg') }});"></a>
						<div class="desc">
							<p class="date">
								<span><a href="#">Admin</a></span>
								<span>May 20 2019</span>
								<span><a href="#">4 <i class="icon-speech-bubble"></i></a></span>
							</p>
							<h3><a href="blog.html">Health Seminar</a></h3>
							<p>We give a global labor learning seminar. The activities of health seminar conducted by mhc where there is a special meeting that represents technical and academic to increase the knowledge about health.</p>
							<p><a href="#">Read more <i class="icon-arrow-right3"></i></a></p>
						</div>
					</div>
				</div>--}}
			</div>
		</div>
	</div>
@endsection