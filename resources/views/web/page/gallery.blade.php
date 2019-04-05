@extends('web.layouts.index')

@section('content')

<div class="colorlib-doctor">
	<div class="container">
		
		<div class="row">
			<div class="col-md-12 animate-box">
				<div class="row row-pb-lg">
					<div class="owl-carousel2">
						@php
							$gallery = App\WebGallery::all();
						@endphp
						@foreach($gallery as $gallerylist)
						<div class="item">
							<div class="gallery-title" style="margin-left: 15px; margin-bottom: 10px;">{{$gallerylist->title}}</div>
							<div class="col-md-12">
								<div class="doctor-img" style="background-image: url({{ asset('/uploads/').'/'.$gallerylist->image }});">
								</div>
							</div>
						</div>
						@endforeach
					</div>
				</div>
				<!-- <div class="row">
					<div class="col-md-3 col-sm-6 col-xs-12 animate-box text-center">
						<div class="doctor">
							<div class="staff-img" style="background-image: url(images/staff-4.jpg);"></div>
							<div class="desc">
								<span>Dental Hygienist</span>
								<h3><a href="#">Dr. Beatrice Prior</a></h3>
								<ul class="colorlib-social">
									<li><a href="#"><i class="icon-facebook2"></i></a></li>
									<li><a href="#"><i class="icon-twitter2"></i></a></li>
									<li><a href="#"><i class="icon-linkedin2"></i></a></li>
									<li><a href="#"><i class="icon-instagram"></i></a></li>
								</ul>
							</div>
						</div>
					</div>
					<div class="col-md-3 col-sm-6 col-xs-12 animate-box text-center">
						<div class="doctor">
							<div class="staff-img" style="background-image: url(images/staff-2.jpg);"></div>
							<div class="desc">
								<span>Orthopedic Surgeon</span>
								<h3><a href="#">Dr. Edward Dughlas</a></h3>
								<ul class="colorlib-social">
									<li><a href="#"><i class="icon-facebook2"></i></a></li>
									<li><a href="#"><i class="icon-twitter2"></i></a></li>
									<li><a href="#"><i class="icon-linkedin2"></i></a></li>
									<li><a href="#"><i class="icon-instagram"></i></a></li>
								</ul>
							</div>
						</div>
					</div>
					<div class="col-md-3 col-sm-6 col-xs-12 animate-box text-center">
						<div class="doctor">
							<div class="staff-img" style="background-image: url(images/staff-3.jpg);"></div>
							<div class="desc">
								<span>Health Care</span>
								<h3><a href="#">Dr. Peter Parker</a></h3>
								<ul class="colorlib-social">
									<li><a href="#"><i class="icon-facebook2"></i></a></li>
									<li><a href="#"><i class="icon-twitter2"></i></a></li>
									<li><a href="#"><i class="icon-linkedin2"></i></a></li>
									<li><a href="#"><i class="icon-instagram"></i></a></li>
								</ul>
							</div>
						</div>
					</div>
					<div class="col-md-3 col-sm-6 col-xs-12 animate-box text-center">
						<div class="doctor">
							<div class="staff-img" style="background-image: url(images/staff-1.jpg);"></div>
							<div class="desc">
								<span>Patient Services Manager</span>
								<h3><a href="#">Dr. Liza Thomas</a></h3>
								<ul class="colorlib-social">
									<li><a href="#"><i class="icon-facebook2"></i></a></li>
									<li><a href="#"><i class="icon-twitter2"></i></a></li>
									<li><a href="#"><i class="icon-linkedin2"></i></a></li>
									<li><a href="#"><i class="icon-instagram"></i></a></li>
								</ul>
							</div>
						</div>
					</div>
				</div> -->
			</div>
		</div>
	</div>
</div>

@endsection