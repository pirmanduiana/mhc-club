@php
	$company = App\Syscompany::first();
@endphp
<nav class="colorlib-nav" role="navigation">
	<div class="top-menu">
		<div class="container">
			<div class="row">
				<div class="col-xs-12">
					<div class="top">
						<div class="row">
							<div class="col-md-6">
								<div id="colorlib-logo"><a href="{{url('/')}}">{{$company->name}}</a></div>
							</div>
							<div class="col-md-3">
								<div class="num">
									<span class="icon"><i class="icon-phone"></i></span>
									<p>
										<a href="javascript:;;">{{$company->main_phone}}</a><br>
										<a href="javascript:;;">{{$company->main_email}}</a>
									</p>
								</div>
							</div>
							<div class="col-md-3">
								<div class="loc">
									<span class="icon"><i class="icon-location"></i></span>
									<p><a href="javascript:;;">{{$company->address}}</a></p>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="menu-wrap">
			<div class="container">
				<div class="row">
					<div class="col-xs-8">
						<div class="menu-1">
							<ul>							
								<li class="{{$page == '' ? 'active' : ''}}"><a href="{{url('/')}}">Home</a></li>
								<li class="{{$page == 'service' ? 'active' : ''}}"><a href="{{url('/service')}}">Services</a></li>
								<!-- <li class="has-dropdown">
									<a href="departments.html">Departments</a>
									<ul class="dropdown">
										<li><a href="departments-single.html">Plasetic Surgery Department</a></li>
										<li><a href="departments-single.html">Dental Department</a></li>
										<li><a href="departments-single.html">Psychological Department</a></li>
									</ul>
								</li> -->
								<li class="{{$page == 'blog' ? 'active' : ''}}"><a href="{{url('/blog')}}">Blog</a></li>
								<li><a href="contact.html">Contact</a></li>
							</ul>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</nav>