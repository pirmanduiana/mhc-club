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
									<i class="flaticon-healthy-1"></i>
								</span>
								<div class="desc">
									<h3><a href="#">Home medical appointments</a></h3>
								</div>
							</div>
						</div>
						<div class="one-fifth no-border-bottom animate-box">
							<div class="services">
								<span class="icon">
									<i class="flaticon-stethoscope"></i>
								</span>
								<div class="desc">
									<h3><a href="#">Pharmacy refunded from hospital</a></h3>
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
									<h3><a href="#">Long term medical care in a hospital</a></h3>
								</div>
							</div>
						</div>

						<div class="services-wrap-flex">
							<div class="one-fifth services-img animate-box" style="background-image: url({{ asset('vendor/healthcare/images/services-1.jpg') }});">
								<div class="services">
									<div class="desc">
										<span>Mission</span>
										<h3><a href="#">The correct diagnosis is half the battle</a></h3>
									</div>
								</div>
							</div>
							<div class="one-half">
								<div class="one-full-flex">
									<div class="one-fifth services-img animate-box" style="background-image: url({{ asset('vendor/healthcare/images/services-2.jpg') }});">
										<div class="services">
											<div class="desc">
												<span>Vision</span>
												<h3><a href="#">We refund 50% of the cost of medicines</a></h3>
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
												<h3><a href="#">Medical transport to the hospital</a></h3>
											</div>
										</div>
									</div>
								</div>
								<div class="one-full-flex animate-box">
									<div class="services-desc">
										<div class="desc">
											<p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts. Separated they live in Bookmarksgrove right at the coast of the Semantics, a large language ocean.</p>
											<a href="#" class="btn btn-primary">View services</a>
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