@extends('web.layouts.index')

@section('content')
	<div id="colorlib-services">
		<div class="container">
			<div class="row">
				<div class="col-md-12">
					<div class="services-flex">
						<div class="one-fifth no-border-bottom animate-box">
							<div class="services">
								<span class="icon">
									<i class="flaticon-hospital"></i>
								</span>
								<div class="desc">
									<h3><a href="#">Diagnostics and emergency treatment</a></h3>
								</div>
							</div>
						</div>
						<div class="one-fifth no-border-bottom animate-box">
							<div class="services">
								<span class="icon">
									<i class="flaticon-stethoscope"></i>
								</span>
								<div class="desc">
									<h3><a href="#">Specialist doctor appointment</a></h3>
								</div>
							</div>
						</div>
						<div class="one-fifth no-border-bottom animate-box">
							<div class="services">
								<span class="icon">
									<i class="flaticon-stethoscope"></i>
								</span>
								<div class="desc">
									<h3><a href="#">In house clinic hotel</a></h3>
								</div>
							</div>
						</div>
						<div class="one-forth animate-box">
							<div class="head">
								<h2>Comprehensive services for our patients</h2>
							</div>
						</div>
					</div>
					<div class="services-no-flex">
						<div class="one-fifth animate-box">
							<div class="services">
								<span class="icon">
									<i class="flaticon-blood-donation"></i>
								</span>
								<div class="desc">
									<h3><a href="#">Long term medical care in a hospital with COB BPJS system</a></h3>
								</div>
							</div>
						</div>

						<div class="services-wrap-flex">
							<div class="one-fifth services-img animate-box" style="background-image: url({{ asset('vendor/healthcare/images/services-1.jpg') }});">
								<div class="services">
									<div class="desc">
										<span>Mission</span>
										<h3><a href="#">Affordable premi</a></h3>
									</div>
								</div>
							</div>
							<div class="one-half">
								<div class="one-full-flex">
									<div class="one-fifth services-img animate-box" style="background-image: url({{ asset('vendor/healthcare/images/services-2.jpg') }});">
										<div class="services">
											<div class="desc">
												<span>Vision</span>
												<h3><a href="#">Take care of patient</a></h3>
											</div>
										</div>
									</div>
									<div class="one-fifth animate-box">
										<div class="services">
											<span class="icon">
												<i class="flaticon-radiation"></i>
											</span>
											<div class="desc">
												<h3><a href="#">A specialized laboratory research</a></h3>
											</div>
										</div>
									</div>
									<div class="one-fifth animate-box">
										<div class="services">
											<span class="icon">
												<i class="flaticon-ambulance"></i>
											</span>
											<div class="desc">
												<h3><a href="#">24 hours on call services</a></h3>
											</div>
										</div>
									</div>
								</div>
								<div class="one-full-flex animate-box">
									<div class="services-desc">
										<div class="desc">
											<p>
												From careful observation of existing health services, we as health care providers offer comprehensive services to our clients. The services that we can provide include emergency, inpatient, laboratory and specialist doctors at all of our providers.
												We also provide hotel and oncall clinics that are available 24 hours in providing medical actions and consultations and activities such as SAT training, health seminars and free examinations.
											</p>
											<!-- <a href="#" class="btn btn-primary">View services</a> -->
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
@endsection