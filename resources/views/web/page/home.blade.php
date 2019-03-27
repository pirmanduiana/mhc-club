@extends('web.layouts.index')

@section('content')

	<style>
	.about-logo {
		float: left;
		width: 19%;
	}
	.text-justify {
		text-align: justify;
	}
	.quotes {
		position: absolute;
		bottom: 44px;
		left: 151px;
		color: white;
	}
	.quotes > .title {
		font-size: 24px;
		font-style: italic;
	}
	.quotes > .author {
		font-size: 12px;
	}
	</style>

	<aside id="colorlib-hero">
		<div class="flexslider">
			@php
				$slider = App\WebSlider::where('status','Online')->get();
				
			@endphp
			<ul class="slides">
			@foreach($slider as $list)
		   	<li style="background-image: url({{ asset('/uploads/').'/'.$list->image_name }});">
		   		<div class="overlay"></div>
		   		<div class="container">
		   			<div class="row">
			   			<div class="col-md-8 col-md-offset-2 col-md-pull-2 slider-text">
			   				<div class="slider-text-inner">
			   					<h1><strong>{{$list->title}}</strong></h1>
									<h2>{{$list->content}}</h2>
									<p><a class="btn btn-primary btn-lg btn-learn" href="#">Make an Appointment</a></p>
			   				</div>
			   			</div>
			   		</div>
		   		</div>
		   	</li>
		   	@endforeach
		   	{{--
		   	<li style="background-image: url({{ asset('vendor/healthcare/images/slide-1.jpg') }});">
		   		<div class="overlay"></div>
		   		<div class="container">
		   			<div class="row">
			   			<div class="col-md-8 col-md-offset-2 col-md-pull-2 slider-text">
			   				<div class="slider-text-inner">
			   					<h1>Your Health <strong>is our <br>Priority</strong></h1>
									<h2>We provide the best services for you and your family.</h2>
									<p><a class="btn btn-primary btn-lg btn-learn" href="#">Make an Appointment</a></p>
			   				</div>
			   			</div>
			   		</div>
		   		</div>
		   	</li>
		   	<li style="background-image: url({{ asset('vendor/healthcare/images/img_bg_5.jpg') }});">
		   		<div class="overlay"></div>
		   		<div class="container">
		   			<div class="row">
			   			<div class="col-md-8 col-md-offset-2 col-md-pull-2 slider-text">
			   				<div class="slider-text-inner">
			   					<h1>We help you <strong>to find the best hospital around you</strong></h1>
									<h2>We consider that availability as the most important of the best health services around you.</h2>
									<p><a class="btn btn-primary btn-lg btn-learn" href="#">Make an Appointment</a></p>
			   				</div>
			   			</div>
			   		</div>
		   		</div>
		   	</li>
		   	<li style="background-image: url({{ asset('vendor/healthcare/images/img_bg_1.jpg') }});">
		   		<div class="overlay"></div>
		   		<div class="container">
		   			<div class="row">
			   			<div class="col-md-8 col-md-offset-2 col-md-pull-2 slider-text">
			   				<div class="slider-text-inner">
			   					<h1>We have <strong>"In House Hotel Clinic"</strong> that provide you 24 hours health services</h1>
									<h2>We provide an easy and quick Health Services as well as supported by medical person that available in 24 hours.</h2>
									<p><a class="btn btn-primary btn-lg btn-learn" href="#">Make an Appointment</a></p>
			   				</div>
			   			</div>
			   		</div>
		   		</div>
		   	</li>
		   	<li style="background-image: url({{ asset('vendor/healthcare/images/slide-4.jpg') }});">
		   		<div class="overlay"></div>
		   		<div class="container">
		   			<div class="row">
			   			<div class="col-md-8 col-md-offset-2 col-md-pull-2 slider-text">
			   				<div class="slider-text-inner">
			   					<h1>We have <strong>24 Hour Call Center</strong></h1>
									<h2>We have 24 hours call center every day to accelerate coordination and make promise to consult with specialist doctors or inpatient in the hospital.</h2>
									<p><a class="btn btn-primary btn-lg btn-learn" href="#">Make an Appointment</a></p>
			   				</div>
			   			</div>
			   		</div>
		   		</div>
		   	</li>--}}		   	
		  	</ul>
	  	</div>
	</aside>

	<div id="colorlib-counter" class="colorlib-counters">
		<div class="overlay"></div>
		<div class="container">
			<div class="row">
				<div class="col-md-8 col-md-offset-2 col-md-push-2 counter-wrap">
					<div class="row">
						<!-- <div class="col-md-3 col-sm-6 animate-box">
							<div class="desc">
								<p class="wrap">
									<span class="icon"><i class="flaticon-healthy"></i></span>
									<span class="colorlib-counter js-counter" data-from="0" data-to="3297" data-speed="5000" data-refresh-interval="50"></span>
								</p>
								<span class="colorlib-counter-label">Satisfied Customer</span>
							</div>
						</div> -->
						<div class="col-md-3 col-sm-6 animate-box">
							<div class="desc">
								<p class="wrap">
									<span class="icon"><i class="flaticon-hospital"></i></span>
									<span class="colorlib-counter js-counter" data-from="0" data-to="{{$client}}" data-speed="5000" data-refresh-interval="50"></span>
								</p>
								<span class="colorlib-counter-label">Clients</span>
							</div>
						</div>
						<!-- <div class="col-md-3 col-sm-6 animate-box">
							<div class="desc">
								<p class="wrap">
									<span class="icon"><i class="flaticon-healthy-1"></i></span>
									<span class="colorlib-counter js-counter" data-from="0" data-to="400" data-speed="5000" data-refresh-interval="50"></span>
								</p>
								<span class="colorlib-counter-label">Qualified Doctor</span>
							</div>
						</div> -->
						<div class="col-md-3 col-sm-6 animate-box">
							<div class="desc">
								<p class="wrap">
									<span class="icon"><i class="flaticon-ambulance"></i></span>
									<span class="colorlib-counter js-counter" data-from="0" data-to="{{$provider}}" data-speed="5000" data-refresh-interval="50"></span>
								</p>
								<span class="colorlib-counter-label">Hospitals</span>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

	
	@php
		$about = App\WebAbout::where('status','Online')->first();			
	@endphp
	<div id="colorlib-about">
		<div class="container">
			<div class="row">
				<div class="col-md-6 col-md-push-6 animate-box">
					<img class="img-responsive about-img" src="{{ asset('/uploads').'/'.$about->image_about }}" alt="">
					<span class="quotes">
						<span class="title">"{{$about->image_title}}"</span><br>
						<span class="author">~ {{$about->outhor_name}}</span>
					</span>
				</div>
				<div class="col-md-6 col-md-pull-6 animate-box">
					<h2>About Mandiri Health Care</h2>
					<p class="text-justify">
						<img src="{{ asset('/uploads').'/'.$about->image_logo }}" class="about-logo">
						{{$about->content}}
					</p>
				<div class="fancy-collapse-panel">
                    <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
                     @php
                 		$visimisi = App\WebVisiMisi::where('status','Online')->get();
                 	@endphp
                 	@foreach($visimisi as $vmlist)
	                 	<div class="panel panel-default">
	                     	<div class="panel-heading" role="tab" id="heading{{$vmlist->id}}">
	                             <h4 class="panel-title">
	                                 <a data-toggle="collapse" data-parent="#accordion" href="#collapse{{$vmlist->id}}" aria-expanded="true" aria-controls="collapseOne">{{$vmlist->title}}
	                                 </a>
	                             </h4>
	                        </div>
	                        <div id="collapse{{$vmlist->id}}" class="panel-collapse collapse" role="tabpanel" aria-labelledby="heading{{$vmlist->id}}">
	                             <div class="panel-body">
	                                 <div class="row">
							      		<p class="text-justify">
							      			{{$vmlist->content}}
							      		</p>
							      	</div>
	                             </div>
	                         </div>
	                    </div>
                 	@endforeach
                     
                  </div>
               </div>
				</div>
			</div>
		</div>
	</div>

	<div id="colorlib-choose">
		<div class="container-fluid">
			<div class="row">
				<div class="choose">
					<div class="half img-bg" style="background-image: url({{ asset('vendor/healthcare/images/cover_bg_1.jpg') }});"></div>
					<div class="half features-wrap">
						<div class="features-services animate-box">
							<div class="colorlib-heading animate-box">
								<h2>What makes us best?</h2>
							</div>
							<div class="row">
								@php
									$ourbest = App\WebOurBest::where('status','Online')->get();
									$obcount = 0;
								@endphp
								@foreach($ourbest as $mybest)
									@php $obcount = $obcount + 1; @endphp

									@if($obcount == 1)
									<div class="col-md-6">
									@endif
										<div class="features animate-box">
											<span class="icon text-center"><i class="{{$mybest->icon}}"></i></span>
											<div class="desc">
												<h3>{{$mybest->title}}</h3>
												<p>{{$mybest->content}}</p>
											</div>
										</div>
									@if($obcount == 2)
									</div>
									@php $obcount = 0; @endphp
									@endif
								@endforeach
								<!-- <div class="col-md-6">
									<div class="features animate-box">
										<span class="icon text-center"><i class="flaticon-healthy-1"></i></span>
										<div class="desc">
											<h3>Qualified Doctors and Nurses</h3>
											<p>The doctors and nurses are standby in 24 hours for on call service. </p>
										</div>
									</div>
									<div class="features animate-box">
										<span class="icon text-center"><i class="flaticon-stethoscope"></i></span>
										<div class="desc">
											<h3>Free Consultation for 24 Hours</h3>
											<p>Our call center is 24 hours available for free consultation. </p>
										</div>
									</div>
									
								</div>
								<div class="col-md-6">
									<div class="features animate-box">
										<span class="icon text-center"><i class="flaticon-medical-1"></i></span>
										<div class="desc">
											<h3>We provide modern facilities</h3>
											<p>Modern health facilities are available in our providers. </p>
										</div>
									</div>
									<div class="features animate-box">
										<span class="icon text-center"><i class="flaticon-radiation"></i></span>
										<div class="desc">
											<h3>Flexibility</h3>
											<p>A flexible health services for patient and refferal. </p>
										</div>
									</div>
								</div> -->
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>


	

	<div id="colorlib-testimonial" class="colorlib-bg-section">
		<div class="container">
			<div class="row animate-box">
				<div class="col-md-12 colorlib-heading">
					<h2>Our patients and their opinions</h2>
				</div>
			</div>
			<div class="row">
				<div class="col-md-12 animate-box">
					<div class="owl-carousel">
						@php
							$testimony = App\WebTestimony::where('status','Online')->get();
						@endphp
						@foreach($testimony as $testi)
						<div class="item">
							<div class="testimony">
								<span class="img-user" style="background-image: url({{ asset('/uploads').'/'.$testi->user_image }});"></span>
								<span class="user">{{$testi->user}}</span>
								<blockquote>
									<p>"{{$testi->testimony}}"</p>
									<p class="color"><span><i class="icon-star3"></i></span><span><i class="icon-star3"></i></span><span><i class="icon-star3"></i></span><span><i class="icon-star3"></i></span><span><i class="icon-star3"></i></span></p>
								</blockquote>
							</div>
						</div>

						@endforeach
						{{--<div class="item">
							<div class="testimony">
								<span class="img-user" style="background-image: url({{ asset('vendor/healthcare/images/person1.jpg') }});"></span>
								<span class="user">Edward Tom</span>
								<blockquote>
									<p>"Even the all-powerful Pointing has no control about the blind texts it is an almost unorthographic life One day however a small line of blind text by the name of Lorem Ipsum decided to leave for the far World of Grammar."</p>
									<p class="color"><span><i class="icon-star3"></i></span><span><i class="icon-star3"></i></span><span><i class="icon-star3"></i></span><span><i class="icon-star3"></i></span><span><i class="icon-star3"></i></span></p>
								</blockquote>
							</div>
						</div>
						<div class="item">
							<div class="testimony">
								<span class="img-user" style="background-image: url({{ asset('vendor/healthcare/images/person2.jpg') }});"></span>
								<span class="user">Carl Bean</span>
								<blockquote>
									<p>"Even the all-powerful Pointing has no control about the blind texts it is an almost unorthographic life One day however a small line of blind text by the name of Lorem Ipsum decided to leave for the far World of Grammar."</p>
									<p class="color"><span><i class="icon-star3"></i></span><span><i class="icon-star3"></i></span><span><i class="icon-star3"></i></span><span><i class="icon-star3"></i></span><span><i class="icon-star3"></i></span></p>
								</blockquote>
							</div>
						</div>
						<div class="item">
							<div class="testimony">
								<span class="img-user" style="background-image: url({{ asset('vendor/healthcare/images/person3.jpg') }});"></span>
								<span class="user">John Bay</span>
								<blockquote>
									<p>"The Big Oxmox advised her not to do so, because there were thousands of bad Commas, wild Question Marks and devious Semikoli."</p>
									<p class="color"><span><i class="icon-star3"></i></span><span><i class="icon-star3"></i></span><span><i class="icon-star3"></i></span><span><i class="icon-star3"></i></span><span><i class="icon-star3"></i></span></p>
								</blockquote>
							</div>
						</div>
						<div class="item">
							<div class="testimony">
								<span class="img-user" style="background-image: url({{ asset('vendor/healthcare/images/person1.jpg') }});"></span>
								<span class="user">Ronald Duck</span>
								<blockquote>
									<p>"Even the all-powerful Pointing has no control about the blind texts it is an almost unorthographic life One day however a small line of blind text by the name of Lorem Ipsum decided to leave for the far World of Grammar."</p>
									<p class="color"><span><i class="icon-star3"></i></span><span><i class="icon-star3"></i></span><span><i class="icon-star3"></i></span><span><i class="icon-star3"></i></span><span><i class="icon-star3"></i></span></p>
								</blockquote>
							</div>
						</div>
						<div class="item">
							<div class="testimony">
								<span class="img-user" style="background-image: url({{ asset('vendor/healthcare/images/person2.jpg') }});"></span>
								<span class="user">Justine Mill</span>
								<blockquote>
									<p>"Even the all-powerful Pointing has no control about the blind texts it is an almost unorthographic life One day however a small line of blind text by the name of Lorem Ipsum decided to leave for the far World of Grammar."</p>
									<p class="color"><span><i class="icon-star3"></i></span><span><i class="icon-star3"></i></span><span><i class="icon-star3"></i></span><span><i class="icon-star3"></i></span><span><i class="icon-star3"></i></span></p>
								</blockquote>
							</div>
						</div>--}}
					</div>
				</div>
			</div>
		</div>
	</div>
@endsection