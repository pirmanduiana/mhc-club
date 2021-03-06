@php
	$company = App\Syscompany::first();
@endphp
<footer id="colorlib-footer" role="contentinfo">
	<div class="overlay"></div>
	<div class="container">
		<div class="row row-pb-md">
			<div class="col-md-3 colorlib-widget">
					<h3>Head Office</h3>
					<ul class="colorlib-footer-links">
						<li>{{$company->address}}</li>
						<li><a href="tel://1234567920"><i class="icon-phone"></i> {{$company->main_phone}}</a></li>
						<li><a href="mailto:info@yoursite.com"><i class="icon-mail"></i> {{$company->main_email}}</a></li>
						<li><a href="http://luxehotel.com"><i class="icon-location4"></i> {{$company->main_website}}</a></li>
						<li>Mon-Fri: 9:00 – 17:00</li>
					</ul>
				</div>
				<!-- <div class="col-md-2 colorlib-widget">
					<h3>Departments</h3>
					<p>
						<ul class="colorlib-footer-links">
							<li><a href="#">Neurology</a></li>
							<li><a href="#">Traumotology</a></li>
							<li><a href="#">Gynaecology</a></li>
							<li><a href="#">Nephrology</a></li>
							<li><a href="#">Cardiology</a></li>
							<li><a href="#">Pulmonary</a></li>
						</ul>
					</p>
				</div> -->
				<div class="col-md-2 colorlib-widget">
					<h3>Useful Links</h3>
					<p>
						<ul class="colorlib-footer-links">
							<li><a href="{{url('/')}}">Home</a></li>
							<li><a href="{{url('/service')}}">Services</a></li>
							<li><a href="{{url('/blog')}}">Blog</a></li>
							<li><a href="#">Contact</a></li>
						</ul>
					</p>
				</div>

				<div class="col-md-2 colorlib-widget">
					<h3>Support</h3>
					<p>
						<ul class="colorlib-footer-links">
							<li><a href="#">Documentation</a></li>
							<li><a href="#">Forums</a></li>
							<li><a href="#">Help &amp; Support</a></li>
							<li><a href="#">Scholarship</a></li>
							<li><a href="#">Student Transport</a></li>
							<li><a href="#">Release Status</a></li>
						</ul>
					</p>
				</div>

			<div class="col-md-3 colorlib-widget">
				<h3>Make an Appointment</h3>
				<form class="contact-form">
					<div class="form-group">
						<label for="name" class="sr-only">Name</label>
						<input type="name" class="form-control" id="name" placeholder="Name">
					</div>
					<div class="form-group">
						<label for="email" class="sr-only">Email</label>
						<input type="email" class="form-control" id="email" placeholder="Email">
					</div>
					<div class="form-group">
						<label for="message" class="sr-only">Message</label>
						<textarea class="form-control" id="message" rows="3" placeholder="Message"></textarea>
					</div>
					<div class="form-group">
						<input type="submit" id="btn-submit" class="btn btn-primary btn-send-message btn-md" value="Send Message">
					</div>
				</form>
			</div>
		</div>
	</div>
	<div class="row copyright">
		<div class="col-md-12 text-center">
			<p>
				<small class="block">&copy; <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved | This template is made with <i class="icon-heart" aria-hidden="true"></i> by <a href="{{url('/')}}" target="_blank">{{$company->name}}</a>
<!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. --></small> 
				<!-- <small class="block">Demo Images: <a href="http://unsplash.co/" target="_blank">Unsplash</a> , <a href="https://www.pexels.com/" target="_blank">Pexels</a></small> -->
			</p>
		</div>
	</div>
</footer>
</div>
<div class="gototop js-top">
	<a href="#" class="js-gotop"><i class="icon-arrow-up"></i></a>
</div>

<!-- jQuery -->
<script src="{{ asset('vendor/healthcare/js/jquery.min.js') }}"></script>
<!-- jQuery Easing -->
<script src="{{ asset('vendor/healthcare/js/jquery.easing.1.3.js') }}"></script>
<!-- Bootstrap -->
<script src="{{ asset('vendor/healthcare/js/bootstrap.min.js') }}"></script>
<!-- Waypoints -->
<script src="{{ asset('vendor/healthcare/js/jquery.waypoints.min.js') }}"></script>
<!-- Stellar Parallax -->
<script src="{{ asset('vendor/healthcare/js/jquery.stellar.min.js') }}"></script>
<!-- Carousel -->
<script src="{{ asset('vendor/healthcare/js/owl.carousel.min.js') }}"></script>
<!-- Flexslider -->
<script src="{{ asset('vendor/healthcare/js/jquery.flexslider-min.js') }}"></script>
<!-- countTo -->
<script src="{{ asset('vendor/healthcare/js/jquery.countTo.js') }}"></script>
<!-- Magnific Popup -->
<script src="{{ asset('vendor/healthcare/js/jquery.magnific-popup.min.js') }}"></script>
<script src="{{ asset('vendor/healthcare/js/magnific-popup-options.js') }}"></script>
<!-- Sticky Kit -->
<script src="{{ asset('vendor/healthcare/js/sticky-kit.min.js') }}"></script>
<!-- Main -->
<script src="{{ asset('vendor/healthcare/js/main.js') }}"></script>