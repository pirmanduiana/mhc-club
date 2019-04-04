@extends('web.layouts.index')

@section('content')
	@php
		$company = App\Syscompany::first();
	@endphp
	<aside id="colorlib-hero" class="breadcrumbs">
		<div class="flexslider">
			<ul class="slides">
		   	<li style="background-image: url({{ asset('/uploads/').'/images/slide-4.jpg' }});">
		   		<div class="overlay"></div>
		   		<div class="container">
		   			<div class="row">
			   			<div class="col-md-8 col-md-offset-2 col-md-pull-2 slider-text">
			   				<div class="slider-text-inner">
			   					<h1><strong>{{$blog->title}}</strong></h1>

			   				</div>
			   			</div>
			   		</div>
		   		</div>
		   	</li>
		  	</ul>
	  	</div>
	</aside>

	<div id="colorlib-contact">
		<div class="container">
			<div class="row">
				<div class="col-md-12 animate-box">
					<div class="row">
						<div class="col-md-6">
							<h2>{{$blog->title}}</h2>
							<img src="{{ asset('/uploads').'/'.$blog->image }}" class="img-responsive about-img">
						</div>
						<div class="col-md-6">
							<div class="desc">
								<p class="date">
									<span><a href="#">{{$blog->user}}</a></span>
									<span>{{date_format($blog->created_at,'M d Y')}}</span>
								</p>
								<h3><a href="blog.html">{{$blog->title}}</a></h3>
								<p>{{$blog->content}}</p>
							</div>
						</div>
					</div>		
				</div>
			</div>
		</div>
	</div>
@endsection
