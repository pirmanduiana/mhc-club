@extends('web.layouts.index')

@section('content')
	<aside id="colorlib-hero">
		<div class="flexslider">
			<ul class="slides">
		   	<li style="background-image: url({{ asset('vendor/healthcare/images/img_bg_6.jpg') }});">
		   		<div class="overlay"></div>
		   		<div class="container">
		   			<div class="row">
			   			<div class="col-md-8 col-md-offset-2 col-md-pull-2 slider-text">
			   				<div class="slider-text-inner">
			   					<h1>Your Health <strong>is always <br>in the first place</strong></h1>
									<h2>Separated they live in Bookmarksgrove right at the coast of the Semantics, a large language ocean.</h2>
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
			   					<h1>We help you <strong>to find the best doctor around you</strong></h1>
									<h2>Separated they live in Bookmarksgrove right at the coast of the Semantics, a large language ocean.</h2>
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
			   					<h1>Guaranted <strong>safe &amp; potent</strong> Medicine</h1>
									<h2>Separated they live in Bookmarksgrove right at the coast of the Semantics, a large language ocean.</h2>
									<p><a class="btn btn-primary btn-lg btn-learn" href="#">Make an Appointment</a></p>
			   				</div>
			   			</div>
			   		</div>
		   		</div>
		   	</li>
		   	<li style="background-image: url({{ asset('vendor/healthcare/images/img_bg_2.jpg') }});">
		   		<div class="overlay"></div>
		   		<div class="container">
		   			<div class="row">
			   			<div class="col-md-8 col-md-offset-2 col-md-pull-2 slider-text">
			   				<div class="slider-text-inner">
			   					<h1>Helping to improve <strong>quality stimulate</strong> innovation</h1>
									<h2>Separated they live in Bookmarksgrove right at the coast of the Semantics, a large language ocean.</h2>
									<p><a class="btn btn-primary btn-lg btn-learn" href="#">Make an Appointment</a></p>
			   				</div>
			   			</div>
			   		</div>
		   		</div>
		   	</li>		   	
		  	</ul>
	  	</div>
	</aside>

	<div id="colorlib-counter" class="colorlib-counters">
		<div class="overlay"></div>
		<div class="container">
			<div class="row">
				<div class="col-md-8 col-md-offset-2 col-md-push-2 counter-wrap">
					<div class="row">
						<div class="col-md-3 col-sm-6 animate-box">
							<div class="desc">
								<p class="wrap">
									<span class="icon"><i class="flaticon-healthy"></i></span>
									<span class="colorlib-counter js-counter" data-from="0" data-to="3297" data-speed="5000" data-refresh-interval="50"></span>
								</p>
								<span class="colorlib-counter-label">Satisfied Customer</span>
							</div>
						</div>
						<div class="col-md-3 col-sm-6 animate-box">
							<div class="desc">
								<p class="wrap">
									<span class="icon"><i class="flaticon-hospital"></i></span>
									<span class="colorlib-counter js-counter" data-from="0" data-to="378" data-speed="5000" data-refresh-interval="50"></span>
								</p>
								<span class="colorlib-counter-label">Hospitals</span>
							</div>
						</div>
						<div class="col-md-3 col-sm-6 animate-box">
							<div class="desc">
								<p class="wrap">
									<span class="icon"><i class="flaticon-healthy-1"></i></span>
									<span class="colorlib-counter js-counter" data-from="0" data-to="400" data-speed="5000" data-refresh-interval="50"></span>
								</p>
								<span class="colorlib-counter-label">Qualified Doctor</span>
							</div>
						</div>
						<div class="col-md-3 col-sm-6 animate-box">
							<div class="desc">
								<p class="wrap">
									<span class="icon"><i class="flaticon-ambulance"></i></span>
									<span class="colorlib-counter js-counter" data-from="0" data-to="30" data-speed="5000" data-refresh-interval="50"></span>
								</p>
								<span class="colorlib-counter-label">Departments</span>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

	

	<div id="colorlib-about">
		<div class="container">
			<div class="row">
				<div class="col-md-6 col-md-push-6 animate-box">
					<img class="img-responsive about-img" src="{{ asset('vendor/healthcare/images/about.png') }}" alt="">
				</div>
				<div class="col-md-6 col-md-pull-6 animate-box">
					<h2>About Healthcare</h2>
					<p>
						Even the all-powerful Pointing has no control about the blind texts it is an almost unorthographic life One day however a small line of blind text by the name of Lorem Ipsum decided to leave for the far World of Grammar.
					</p>
						<div class="fancy-collapse-panel">
                    <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
                     <div class="panel panel-default">
                         <div class="panel-heading" role="tab" id="headingOne">
                             <h4 class="panel-title">
                                 <a data-toggle="collapse" data-parent="#accordion" href="#collapseOne" aria-expanded="true" aria-controls="collapseOne">Our Mission
                                 </a>
                             </h4>
                         </div>
                         <div id="collapseOne" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingOne">
                             <div class="panel-body">
                                 <div class="row">
								      		<div class="col-md-6">
								      			<p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts. </p>
								      		</div>
								      		<div class="col-md-6">
								      			<p>Separated they live in Bookmarksgrove right at the coast of the Semantics, a large language ocean.</p>
								      		</div>
								      	</div>
                             </div>
                         </div>
                     </div>
                     <div class="panel panel-default">
                         <div class="panel-heading" role="tab" id="headingTwo">
                             <h4 class="panel-title">
                                 <a class="collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">Our Vission
                                 </a>
                             </h4>
                         </div>
                         <div id="collapseTwo" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingTwo">
                             <div class="panel-body">
                                 <p>Far far away, behind the word <strong>mountains</strong>, far from the countries Vokalia and Consonantia, there live the blind texts. Separated they live in Bookmarksgrove right at the coast of the Semantics, a large language ocean.</p>
											<ul>
												<li>Separated they live in Bookmarksgrove right</li>
												<li>Separated they live in Bookmarksgrove right</li>
											</ul>
                             </div>
                         </div>
                     </div>
                     <div class="panel panel-default">
                         <div class="panel-heading" role="tab" id="headingThree">
                             <h4 class="panel-title">
                                 <a class="collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapseThree" aria-expanded="false" aria-controls="collapseThree">Why choose us
                                 </a>
                             </h4>
                         </div>
                         <div id="collapseThree" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingThree">
                             <div class="panel-body">
                                 <p>Far far away, behind the word <strong>mountains</strong>, far from the countries Vokalia and Consonantia, there live the blind texts. Separated they live in Bookmarksgrove right at the coast of the Semantics, a large language ocean.</p>	
                             </div>
                         </div>
                     </div>
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
								<div class="col-md-6">
									<div class="features animate-box">
										<span class="icon text-center"><i class="flaticon-healthy-1"></i></span>
										<div class="desc">
											<h3>Qualified Doctors</h3>
											<p>A small river named Duden flows by their place and supplies it with the necessary regelialia. </p>
										</div>
									</div>
									<div class="features animate-box">
										<span class="icon text-center"><i class="flaticon-stethoscope"></i></span>
										<div class="desc">
											<h3>Free Consultation</h3>
											<p>A small river named Duden flows by their place and supplies it with the necessary regelialia. </p>
										</div>
									</div>
								</div>
								<div class="col-md-6">
									<div class="features animate-box">
										<span class="icon text-center"><i class="flaticon-medical-1"></i></span>
										<div class="desc">
											<h3>Online Enrollment</h3>
											<p>A small river named Duden flows by their place and supplies it with the necessary regelialia. </p>
										</div>
									</div>
									<div class="features animate-box">
										<span class="icon text-center"><i class="flaticon-radiation"></i></span>
										<div class="desc">
											<h3>Modern Facilities</h3>
											<p>A small river named Duden flows by their place and supplies it with the necessary regelialia. </p>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>


	<div class="colorlib-doctor">
		<div class="container">
			<div class="row animate-box">
				<div class="col-md-6 col-md-offset-3 text-center colorlib-heading">
					<h2>Well Experienced Doctors</h2>
					<p>A small river named Duden flows by their place and supplies it with the necessary regelialia.</p>
				</div>
			</div>
			<div class="row">
				<div class="col-md-12 animate-box">
					<div class="row">
						<div class="owl-carousel2">
							<div class="item">
								<div class="col-md-6">
									<div class="doctor-desc">
										<h3><a href="#">Dr. Paul Armstrong</a></h3>
										<span class="specialty">Dental Hygienist</span>
										<p>When she reached the first hills of the Italic Mountains, she had a last view back on the skyline of her hometown Bookmarksgrove, the headline of Alphabet Village and the subline of her own road, the Line Lane. Pityful a rethoric question ran over her cheek, then she continued her way.</p>
										<p>Even the all-powerful Pointing has no control about the blind texts it is an almost unorthographic life One day however a small line of blind text by the name of Lorem Ipsum decided to leave for the far World of Grammar.</p>
										<p><a href="#" class="btn btn-primary">Email us</a> <a href="#" class="btn btn-primary btn-outline">Make an appointment</a></p>
									</div>
								</div>
								<div class="col-md-6">
									<div class="doctor-img" style="background-image: url({{ asset('vendor/healthcare/images/staff-3.jpg') }});">
									</div>
								</div>
							</div>
							<div class="item">
								<div class="col-md-6">
									<div class="doctor-desc">
										<h3><a href="#">Dr. Paul Armstrong</a></h3>
										<span class="specialty">Dental Hygienist</span>
										<p>When she reached the first hills of the Italic Mountains, she had a last view back on the skyline of her hometown Bookmarksgrove, the headline of Alphabet Village and the subline of her own road, the Line Lane. Pityful a rethoric question ran over her cheek, then she continued her way.</p>
										<p>Even the all-powerful Pointing has no control about the blind texts it is an almost unorthographic life One day however a small line of blind text by the name of Lorem Ipsum decided to leave for the far World of Grammar.</p>
										<p><a href="#" class="btn btn-primary">Email us</a> <a href="#" class="btn btn-primary btn-outline">Make an appointment</a></p>
									</div>
								</div>
								<div class="col-md-6">
									<div class="doctor-img" style="background-image: url({{ asset('vendor/healthcare/images/staff-1.jpg')}} );">
									</div>
								</div>
							</div>
							<div class="item">
								<div class="col-md-6">
									<div class="doctor-desc">
										<h3><a href="#">Dr. Paul Armstrong</a></h3>
										<span class="specialty">Dental Hygienist</span>
										<p>When she reached the first hills of the Italic Mountains, she had a last view back on the skyline of her hometown Bookmarksgrove, the headline of Alphabet Village and the subline of her own road, the Line Lane. Pityful a rethoric question ran over her cheek, then she continued her way.</p>
										<p>Even the all-powerful Pointing has no control about the blind texts it is an almost unorthographic life One day however a small line of blind text by the name of Lorem Ipsum decided to leave for the far World of Grammar.</p>
										<p><a href="#" class="btn btn-primary">Email us</a> <a href="#" class="btn btn-primary btn-outline">Make an appointment</a></p>
									</div>
								</div>
								<div class="col-md-6">
									<div class="doctor-img" style="background-image: url({{ asset('vendor/healthcare/images/staff-2.jpg') }});">
									</div>
								</div>
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
						<div class="item">
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
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>


	<div id="colorlib-blog">
		<div class="container">
			<div class="row animate-box">
				<div class="col-md-6 col-md-offset-3 text-center colorlib-heading">
					<h2>Recent blog</h2>
					<p>A small river named Duden flows by their place and supplies it with the necessary regelialia.</p>
				</div>
			</div>
			<div class="row">
				<div class="col-md-4 animate-box">
					<div class="blog-entry">
						<a href="blog.html" class="blog-img" style="background-image: url({{ asset('vendor/healthcare/images/blog-1.jpg') }});"></a>
						<div class="desc">
							<p class="date">
								<span><a href="#">Admin</a></span>
								<span>June 8 2017</span>
								<span><a href="#">4 <i class="icon-speech-bubble"></i></a></span>
							</p>
							<h3><a href="blog.html">Here's why yoga is best for your health</a></h3>
							<p>A small river named Duden flows by their place and supplies it with the necessary regelialia.</p>
							<p><a href="#">Read more <i class="icon-arrow-right3"></i></a></p>
						</div>
					</div>
				</div>
				<div class="col-md-4 animate-box">
					<div class="blog-entry">
						<a href="blog.html" class="blog-img" style="background-image: url({{ asset('vendor/healthcare/images/blog-2.jpg') }});"></a>
						<div class="desc">
							<p class="date">
								<span><a href="#">Admin</a></span>
								<span>June 8 2017</span>
								<span><a href="#">4 <i class="icon-speech-bubble"></i></a></span>
							</p>
							<h3><a href="blog.html">live better get to know your medical technology</a></h3>
							<p>A small river named Duden flows by their place and supplies it with the necessary regelialia.</p>
							<p><a href="#">Read more <i class="icon-arrow-right3"></i></a></p>
						</div>
					</div>
				</div>
				<div class="col-md-4 animate-box">
					<div class="blog-entry">
						<a href="blog.html" class="blog-img" style="background-image: url({{ asset('vendor/healthcare/images/blog-3.jpg') }});"></a>
						<div class="desc">
							<p class="date">
								<span><a href="#">Admin</a></span>
								<span>June 8 2017</span>
								<span><a href="#">4 <i class="icon-speech-bubble"></i></a></span>
							</p>
							<h3><a href="blog.html">Eating apple is the source of energy</a></h3>
							<p>A small river named Duden flows by their place and supplies it with the necessary regelialia.</p>
							<p><a href="#">Read more <i class="icon-arrow-right3"></i></a></p>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

@endsection