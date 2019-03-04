<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
<title>{{ $company->name }}</title>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="description" content="{{ $company->name }}">
<meta name="viewport" content="width=device-width, initial-scale=1">

<link rel="icon" href="{{ asset('vendor/theme-travelix/images/favicon.ico') }}">

<!-- contact us -->
<link rel="stylesheet" type="text/css" href="{{ asset('vendor/theme-travelix/styles/single_listing_styles.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('vendor/theme-travelix/styles/single_listing_responsive.css') }}">

<!-- about us -->
<link rel="stylesheet" type="text/css" href="{{ asset('vendor/theme-travelix/styles/about_styles.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('vendor/theme-travelix/styles/about_responsive.css') }}">

<!-- blog -->
<link href="{{ asset('vendor/theme-travelix/plugins/colorbox/colorbox.css') }}" rel="stylesheet" type="text/css">
<link rel="stylesheet" type="text/css" href="{{ asset('vendor/theme-travelix/styles/blog_styles.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('vendor/theme-travelix/styles/blog_responsive.css') }}">

<!-- packages -->
<link rel="stylesheet" type="text/css" href="{{ asset('vendor/theme-travelix/styles/offers_styles.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('vendor/theme-travelix/styles/offers_responsive.css') }}">

<!-- booking -->
<link rel="stylesheet" type="text/css" href="{{ asset('vendor/theme-travelix/styles/bootstrap4/bootstrap.min.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('vendor/theme-travelix/plugins/font-awesome-4.7.0/css/font-awesome.min.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('vendor/theme-travelix/plugins/OwlCarousel2-2.2.1/owl.carousel.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('vendor/theme-travelix/plugins/OwlCarousel2-2.2.1/owl.theme.default.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('vendor/theme-travelix/plugins/OwlCarousel2-2.2.1/animate.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('vendor/theme-travelix/styles/main_styles.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('vendor/theme-travelix/styles/responsive.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('vendor/adminlte/datepicker/bootstrap-datepicker.min.css') }}">

<!-- select2 -->
<link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/css/select2.min.css" rel="stylesheet" />

</head>

<body>

<div class="super_container">
	
	<!-- Header -->

	<header class="header">

		<!-- Top Bar -->

		<div class="top_bar">
			<div class="container">
				<div class="row">
					<div class="col d-flex flex-row">
						<div class="phone">{{ $company->main_phone }}</div>
						<div class="social">
							<ul class="social_list">
								<li class="social_list_item"><a href="#"><i class="fa fa-pinterest" aria-hidden="true"></i></a></li>
								<li class="social_list_item"><a href="#"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
								<li class="social_list_item"><a href="#"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
								<li class="social_list_item"><a href="#"><i class="fa fa-dribbble" aria-hidden="true"></i></a></li>
								<li class="social_list_item"><a href="#"><i class="fa fa-behance" aria-hidden="true"></i></a></li>
								<li class="social_list_item"><a href="#"><i class="fa fa-linkedin" aria-hidden="true"></i></a></li>
							</ul>
						</div>
						<div class="user_box ml-auto">
							<div class="user_box_login user_box_link"><a href="#">login</a></div>
							<div class="user_box_register user_box_link"><a href="#">register</a></div>
						</div>
					</div>
				</div>
			</div>		
		</div>

		<!-- Main Navigation -->

		<nav class="main_nav">
			<div class="container">
				<div class="row">
					<div class="col main_nav_col d-flex flex-row align-items-center justify-content-start">
						<div class="logo_container">
							<div class="logo"><a href="#"><img src="{{ asset('vendor/theme-travelix/images/UFV.png') }}" alt=""></a></div>
						</div>
						<div class="main_nav_container ml-auto">
							<ul class="main_nav_list">
								<li class="main_nav_item"><a href="/">home</a></li>
								<li class="main_nav_item"><a href="/aboutus">about us</a></li>
								<li class="main_nav_item"><a href="/packages">all packages</a></li>
								<li class="main_nav_item"><a href="/blog">blog</a></li>
								<!-- <li class="main_nav_item"><a href="contact.html">contact</a></li> -->
							</ul>
						</div>
						<div class="content_search ml-lg-0 ml-auto">
							<svg version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
							width="17px" height="17px" viewBox="0 0 512 512" enable-background="new 0 0 512 512" xml:space="preserve">
								<g>
									<g>
										<g>
											<path class="mag_glass" fill="#FFFFFF" d="M78.438,216.78c0,57.906,22.55,112.343,63.493,153.287c40.945,40.944,95.383,63.494,153.287,63.494
											s112.344-22.55,153.287-63.494C489.451,329.123,512,274.686,512,216.78c0-57.904-22.549-112.342-63.494-153.286
											C407.563,22.549,353.124,0,295.219,0c-57.904,0-112.342,22.549-153.287,63.494C100.988,104.438,78.439,158.876,78.438,216.78z
											M119.804,216.78c0-96.725,78.69-175.416,175.415-175.416s175.418,78.691,175.418,175.416
											c0,96.725-78.691,175.416-175.416,175.416C198.495,392.195,119.804,313.505,119.804,216.78z"/>
										</g>
									</g>
									<g>
										<g>
											<path class="mag_glass" fill="#FFFFFF" d="M6.057,505.942c4.038,4.039,9.332,6.058,14.625,6.058s10.587-2.019,14.625-6.058L171.268,369.98
											c8.076-8.076,8.076-21.172,0-29.248c-8.076-8.078-21.172-8.078-29.249,0L6.057,476.693
											C-2.019,484.77-2.019,497.865,6.057,505.942z"/>
										</g>
									</g>
								</g>
							</svg>
						</div>

						<form id="search_form" class="search_form bez_1">
							<input type="search" class="search_content_input bez_1">
						</form>

						<div class="hamburger">
							<i class="fa fa-bars trans_200"></i>
						</div>
					</div>
				</div>
			</div>	
		</nav>

	</header>

	<div class="menu trans_500">
		<div class="menu_content d-flex flex-column align-items-center justify-content-center text-center">
			<div class="menu_close_container"><div class="menu_close"></div></div>
			<div class="logo menu_logo"><a href="#"><img src="{{ asset('vendor/theme-travelix/images/logo.png') }}" alt=""></a></div>
			<ul>
				<li class="main_nav_item"><a href="/">home</a></li>
				<li class="main_nav_item"><a href="/aboutus">about us</a></li>
				<li class="main_nav_item"><a href="/packages">all packages</a></li>
				<li class="main_nav_item"><a href="/blog">blog</a></li>
				<!-- <li class="main_nav_item"><a href="contact.html">contact</a></li> -->
			</ul>
		</div>
	</div>

	<!-- Home -->

	<div class="home">
		
		<!-- Home Slider -->
		<div class="home_slider_container">			
			<div class="owl-carousel owl-theme home_slider">
				<!-- Slider Item -->
				@foreach($product_categories as $k=>$c)
				<div class="owl-item home_slider_item">
					<div class="home_slider_background" style="background-image:url({{asset('uploads/'.$c->featured_img)}})"></div>
					<div class="home_slider_content text-center">
						<div class="home_slider_content_inner" data-animation-in="flipInX" data-animation-out="animate-out fadeOut">
							<h1>{{$c->name}}</h1>
							<h1>{{$c->short_desc}}</h1>
							<form action="{{ url('/packages') }}" method="post">
							@csrf
								<input type="hidden" name="category_id" value="{{ $c->id }}">
								<div class="button home_slider_button">
									<div class="button_bcg"></div>
									<a href="#" class="btn_search_by_category">more<span></span><span></span><span></span></a>
								</div>
							</form>
						</div>
					</div>
				</div>
				@endforeach
			</div>
			
			<!-- Home Slider Nav - Prev -->
			<div class="home_slider_nav home_slider_prev">
				<svg version="1.1" id="Layer_2" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
					width="28px" height="33px" viewBox="0 0 28 33" enable-background="new 0 0 28 33" xml:space="preserve">
					<defs>
						<linearGradient id='home_grad_prev'>
							<stop offset='0%' stop-color='#fa9e1b'/>
							<stop offset='100%' stop-color='#8d4fff'/>
						</linearGradient>
					</defs>
					<path class="nav_path" fill="#F3F6F9" d="M19,0H9C4.029,0,0,4.029,0,9v15c0,4.971,4.029,9,9,9h10c4.97,0,9-4.029,9-9V9C28,4.029,23.97,0,19,0z
					M26,23.091C26,27.459,22.545,31,18.285,31H9.714C5.454,31,2,27.459,2,23.091V9.909C2,5.541,5.454,2,9.714,2h8.571
					C22.545,2,26,5.541,26,9.909V23.091z"/>
					<polygon class="nav_arrow" fill="#F3F6F9" points="15.044,22.222 16.377,20.888 12.374,16.885 16.377,12.882 15.044,11.55 9.708,16.885 11.04,18.219 
					11.042,18.219 "/>
				</svg>
			</div>
			
			<!-- Home Slider Nav - Next -->
			<div class="home_slider_nav home_slider_next">
				<svg version="1.1" id="Layer_3" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
				width="28px" height="33px" viewBox="0 0 28 33" enable-background="new 0 0 28 33" xml:space="preserve">
					<defs>
						<linearGradient id='home_grad_next'>
							<stop offset='0%' stop-color='#fa9e1b'/>
							<stop offset='100%' stop-color='#8d4fff'/>
						</linearGradient>
					</defs>
				<path class="nav_path" fill="#F3F6F9" d="M19,0H9C4.029,0,0,4.029,0,9v15c0,4.971,4.029,9,9,9h10c4.97,0,9-4.029,9-9V9C28,4.029,23.97,0,19,0z
				M26,23.091C26,27.459,22.545,31,18.285,31H9.714C5.454,31,2,27.459,2,23.091V9.909C2,5.541,5.454,2,9.714,2h8.571
				C22.545,2,26,5.541,26,9.909V23.091z"/>
				<polygon class="nav_arrow" fill="#F3F6F9" points="13.044,11.551 11.71,12.885 15.714,16.888 11.71,20.891 13.044,22.224 18.379,16.888 17.048,15.554 
				17.046,15.554 "/>
				</svg>
			</div>

			<!-- Home Slider Dots -->

			<div class="home_slider_dots">
				<ul id="home_slider_custom_dots" class="home_slider_custom_dots">
					@php $i=1; @endphp
					@foreach($product_categories as $k=>$c)
						<li class="home_slider_custom_dot {{ $i==1 ? 'active' : '' }}"><div></div>{{$i++}}</li>
					@endforeach
				</ul>
			</div>
			
		</div>

	</div>

	<!-- Search -->

	<div class="search">
		

		<!-- Search Contents -->
		
		<div class="container fill_height">
			<div class="row fill_height">
				<div class="col fill_height">

					<!-- Search Tabs -->

					<!-- <div class="search_tabs_container">
						<div class="search_tabs d-flex flex-lg-row flex-column align-items-lg-center align-items-start justify-content-lg-between justify-content-start">
							<div class="search_tab active d-flex flex-row align-items-center justify-content-lg-center justify-content-start"><img src="{{ asset('vendor/theme-travelix/images/suitcase.png') }}" alt=""><span>hotels</span></div>
							<div class="search_tab d-flex flex-row align-items-center justify-content-lg-center justify-content-start"><img src="{{ asset('vendor/theme-travelix/images/bus.png') }}" alt="">car rentals</div>
							<div class="search_tab d-flex flex-row align-items-center justify-content-lg-center justify-content-start"><img src="{{ asset('vendor/theme-travelix/images/departure.png') }}" alt="">flights</div>
							<div class="search_tab d-flex flex-row align-items-center justify-content-lg-center justify-content-start"><img src="{{ asset('vendor/theme-travelix/images/island.png') }}" alt="">trips</div>
							<div class="search_tab d-flex flex-row align-items-center justify-content-lg-center justify-content-start"><img src="{{ asset('vendor/theme-travelix/images/cruise.png') }}" alt="">cruises</div>
							<div class="search_tab d-flex flex-row align-items-center justify-content-lg-center justify-content-start"><img src="{{ asset('vendor/theme-travelix/images/diving.png') }}" alt="">activities</div>
						</div>		
					</div> -->

					<!-- Search Panel -->

					<div class="search_panel active">
						<form action="{{ url('/packages') }}" method="post" id="search_form_1" class="search_panel_content d-flex flex-lg-row flex-column align-items-lg-center align-items-start justify-content-lg-between justify-content-start">
						@csrf
							<div class="search_item">
								<div>category</div>
								<select name="category_id" class="destination search_input">
									<option value="">all</option>
									@foreach(App\Mstproductcategory::all() as $k=>$c)
									<option value="{{$c->id}}" {{ old('category_id')==$c->id ? "selected" : "" }}>{{$c->name}}</option>
									@endforeach
								</select>
							</div>						
							<div class="search_item">
								<div>pax</div>
								<select name="max_pax" id="pax_1" class="dropdown_item_select search_input">
									<option value="">all</option>
									@for($i=1; $i<=10; $i++)
									<option value="{{$i}}" {{ old('max_pax')==$i ? "selected" : "" }}>{{$i}}</option>
									@endfor							
								</select>
							</div>
							<div class="search_item">
								<div>currency</div>
								<select name="currency_id" class="destination search_input">
									<option value="">all</option>
									@foreach(App\Mstcurrency::all() as $k=>$r)
									<option value="{{$r->id}}" {{ old('currency_id')==$r->id ? "selected" : "" }}>{{$r->code}}</option>
									@endforeach
								</select>
							</div>							
							<button class="button search_button" id="search_product1">search<span></span><span></span><span></span></button>
						</form>
					</div>

					<!-- Search Panel -->

					<div class="search_panel">
						<form action="#" id="search_form_2" class="search_panel_content d-flex flex-lg-row flex-column align-items-lg-center align-items-start justify-content-lg-between justify-content-start">
							<div class="search_item">
								<div>destination</div>
								<input type="text" class="destination search_input" required="required">
							</div>
							<div class="search_item">
								<div>check in</div>
								<input type="text" class="check_in search_input" placeholder="YYYY-MM-DD">
							</div>
							<div class="search_item">
								<div>check out</div>
								<input type="text" class="check_out search_input" placeholder="YYYY-MM-DD">
							</div>
							<div class="search_item">
								<div>adults</div>
								<select name="adults" id="adults_2" class="dropdown_item_select search_input">
									<option>01</option>
									<option>02</option>
									<option>03</option>
								</select>
							</div>
							<div class="search_item">
								<div>children</div>
								<select name="children" id="children_2" class="dropdown_item_select search_input">
									<option>0</option>
									<option>02</option>
									<option>03</option>
								</select>
							</div>
							<button class="button search_button">search<span></span><span></span><span></span></button>
						</form>
					</div>

					<!-- Search Panel -->

					<div class="search_panel">
						<form action="#" id="search_form_3" class="search_panel_content d-flex flex-lg-row flex-column align-items-lg-center align-items-start justify-content-lg-between justify-content-start">
							<div class="search_item">
								<div>destination</div>
								<input type="text" class="destination search_input" required="required">
							</div>
							<div class="search_item">
								<div>check in</div>
								<input type="text" class="check_in search_input" placeholder="YYYY-MM-DD">
							</div>
							<div class="search_item">
								<div>check out</div>
								<input type="text" class="check_out search_input" placeholder="YYYY-MM-DD">
							</div>
							<div class="search_item">
								<div>adults</div>
								<select name="adults" id="adults_3" class="dropdown_item_select search_input">
									<option>01</option>
									<option>02</option>
									<option>03</option>
								</select>
							</div>
							<div class="search_item">
								<div>children</div>
								<select name="children" id="children_3" class="dropdown_item_select search_input">
									<option>0</option>
									<option>02</option>
									<option>03</option>
								</select>
							</div>
							<button class="button search_button">search<span></span><span></span><span></span></button>
						</form>
					</div>

					<!-- Search Panel -->

					<div class="search_panel">
						<form action="#" id="search_form_4" class="search_panel_content d-flex flex-lg-row flex-column align-items-lg-center align-items-start justify-content-lg-between justify-content-start">
							<div class="search_item">
								<div>destination</div>
								<input type="text" class="destination search_input" required="required">
							</div>
							<div class="search_item">
								<div>check in</div>
								<input type="text" class="check_in search_input" placeholder="YYYY-MM-DD">
							</div>
							<div class="search_item">
								<div>check out</div>
								<input type="text" class="check_out search_input" placeholder="YYYY-MM-DD">
							</div>
							<div class="search_item">
								<div>adults</div>
								<select name="adults" id="adults_4" class="dropdown_item_select search_input">
									<option>01</option>
									<option>02</option>
									<option>03</option>
								</select>
							</div>
							<div class="search_item">
								<div>children</div>
								<select name="children" id="children_4" class="dropdown_item_select search_input">
									<option>0</option>
									<option>02</option>
									<option>03</option>
								</select>
							</div>
							<button class="button search_button">search<span></span><span></span><span></span></button>
						</form>
					</div>

					<!-- Search Panel -->

					<div class="search_panel">
						<form action="#" id="search_form_5" class="search_panel_content d-flex flex-lg-row flex-column align-items-lg-center align-items-start justify-content-lg-between justify-content-start">
							<div class="search_item">
								<div>destination</div>
								<input type="text" class="destination search_input" required="required">
							</div>
							<div class="search_item">
								<div>check in</div>
								<input type="text" class="check_in search_input" placeholder="YYYY-MM-DD">
							</div>
							<div class="search_item">
								<div>check out</div>
								<input type="text" class="check_out search_input" placeholder="YYYY-MM-DD">
							</div>
							<div class="search_item">
								<div>adults</div>
								<select name="adults" id="adults_5" class="dropdown_item_select search_input">
									<option>01</option>
									<option>02</option>
									<option>03</option>
								</select>
							</div>
							<div class="search_item">
								<div>children</div>
								<select name="children" id="children_5" class="dropdown_item_select search_input">
									<option>0</option>
									<option>02</option>
									<option>03</option>
								</select>
							</div>
							<button class="button search_button">search<span></span><span></span><span></span></button>
						</form>
					</div>

					<!-- Search Panel -->

					<div class="search_panel">
						<form action="#" id="search_form_6" class="search_panel_content d-flex flex-lg-row flex-column align-items-lg-center align-items-start justify-content-lg-between justify-content-start">
							<div class="search_item">
								<div>destination</div>
								<input type="text" class="destination search_input" required="required">
							</div>
							<div class="search_item">
								<div>check in</div>
								<input type="text" class="check_in search_input" placeholder="YYYY-MM-DD">
							</div>
							<div class="search_item">
								<div>check out</div>
								<input type="text" class="check_out search_input" placeholder="YYYY-MM-DD">
							</div>
							<div class="search_item">
								<div>adults</div>
								<select name="adults" id="adults_6" class="dropdown_item_select search_input">
									<option>01</option>
									<option>02</option>
									<option>03</option>
								</select>
							</div>
							<div class="search_item">
								<div>children</div>
								<select name="children" id="children_6" class="dropdown_item_select search_input">
									<option>0</option>
									<option>02</option>
									<option>03</option>
								</select>
							</div>
							<button class="button search_button">search<span></span><span></span><span></span></button>
						</form>
					</div>
				</div>
			</div>
		</div>		
	</div>	

	<!-- Offers -->
	@yield('content')
	
	<!-- Footer -->

	<footer class="footer">
		<div class="container">
			<div class="row">
				<div class="col-lg-3 footer_column">
					<div class="footer_col">
						<div class="footer_title">Follow us</div>
						<div class="footer_content footer_blog">														
							<ul class="footer_social_list">
								<li class="footer_social_item"><a href="https://web.facebook.com/Farmers-Village-brSambian-Undagi-584914251904317" target="_blank"><i class="fa fa-facebook-f"></i></a></li>
								<li class="footer_social_item"><a href="https://www.instagram.com/undagifarmers" target="_blank"><i class="fa fa-instagram"></i></a></li>					
							</ul>
						</div>
					</div>
				</div>

				<!-- Footer Column -->
				<div class="col-lg-3 footer_column">
					<div class="footer_col">
						<div class="footer_title">blog</div>
						<div class="footer_content footer_blog">							
							<!-- Footer blog item -->
							@foreach($latest_post as $k=>$v)
							<div class="footer_blog_item clearfix">
								<div class="footer_blog_content">
									<div class="footer_blog_title"><a href="blog.html">{{$v->title}}</a></div>
									<div class="footer_blog_date">{{ date_format($v->created_at,"M d, Y") }}</div>
								</div>
							</div>
							@endforeach
						</div>
					</div>
				</div>

				<!-- Footer Column -->
				<div class="col-lg-3 footer_column">
					<div class="footer_col">
						<div class="footer_title">Visitors</div>
						<div class="footer_content footer_tags">							
							<script type="text/javascript" src="https://www.freevisitorcounters.com/en/home/counter/488080/t/1"></script>
						</div>
						<!-- <div class="hit_counter">
							<script type="text/javascript" src="//counter.websiteout.net/js/7/0/0/0"></script>
						</div> -->
					</div>
				</div>

				<!-- Footer Column -->
				<div class="col-lg-3 footer_column">
					<div class="footer_col">
						<div class="footer_title">contact info</div>
						<div class="footer_content footer_contact">
							<ul class="contact_info_list">
								<!-- <li class="contact_info_item d-flex flex-row">
									<div><div class="contact_info_icon"><img src="{{ asset('vendor/theme-travelix/images/placeholder.svg') }}" alt=""></div></div>
									<div class="contact_info_text">{{ $company->address }}</div>
								</li> -->
								<li class="contact_info_item d-flex flex-row">
									<div><div class="contact_info_icon"><img src="{{ asset('vendor/theme-travelix/images/phone-call.svg') }}" alt=""></div></div>
									<div class="contact_info_text">{{ $company->main_phone }}</div>
								</li>
								<li class="contact_info_item d-flex flex-row">
									<div><div class="contact_info_icon"><img src="{{ asset('vendor/theme-travelix/images/message.svg') }}" alt=""></div></div>
									<div class="contact_info_text"><a href="mailto:{{ $company->main_email }}?Subject=Hello..." target="_top">{{ $company->main_email }}</a></div>
								</li>
								<li class="contact_info_item d-flex flex-row">
									<div><div class="contact_info_icon"><img src="{{ asset('vendor/theme-travelix/images/planet-earth.svg') }}" alt=""></div></div>
									<div class="contact_info_text"><a href="{{ $company->main_website }}">{{ $company->main_website }}</a></div>
								</li>
							</ul>
						</div>
					</div>
				</div>

			</div>
		</div>
	</footer>

	<!-- Copyright -->

	<div class="copyright">
		<div class="container">
			<div class="row">
				<div class="col-lg-3 order-lg-1 order-2  ">
					<div class="copyright_content d-flex flex-row align-items-center">
						<div><!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                        Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved by <a href="{{ $company->main_website }}" target="_blank">{{ $company->name }}</a>
                        <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                        </div>
					</div>
				</div>
				<div class="col-lg-9 order-lg-2 order-1">
					<div class="footer_nav_container d-flex flex-row align-items-center justify-content-lg-end">
						<div class="footer_nav">
							<ul class="footer_nav_list">
								<li class="footer_nav_item"><a href="/">home</a></li>
								<li class="footer_nav_item"><a href="/aboutus">about us</a></li>
								<li class="footer_nav_item"><a href="/packages">all packages</a></li>
								<li class="footer_nav_item"><a href="/blog">blog</a></li>
								<!-- <li class="footer_nav_item"><a href="contact.html">contact</a></li> -->
							</ul>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

</div>

<script src="{{ asset('vendor/theme-travelix/js/jquery-3.2.1.min.js') }}"></script>
<script src="{{ asset('vendor/theme-travelix/styles/bootstrap4/popper.js') }}"></script>
<script src="{{ asset('vendor/theme-travelix/styles/bootstrap4/bootstrap.min.js') }}"></script>
<script src="{{ asset('vendor/theme-travelix/plugins/OwlCarousel2-2.2.1/owl.carousel.js') }}"></script>
<script src="{{ asset('vendor/theme-travelix/plugins/easing/easing.js') }}"></script>
<script src="{{ asset('vendor/theme-travelix/js/custom.js') }}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/js/select2.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/js-cookie@2/src/js.cookie.min.js"></script>
<script src="{{ asset('vendor/adminlte/datepicker/bootstrap-datepicker.min.js') }}"></script>


<script type="text/javascript">

	var phone_number = " {{ $company->main_phone }}"; 
    (function () {
        var options = {
            whatsapp: phone_number, // WhatsApp number
            call: phone_number, // Call phone number
            call_to_action: "Contact us", // Call to action
            button_color: "#2f1dc3", // Color of button
            position: "right", // Position may be 'right' or 'left'
            order: "whatsapp,call", // Order of buttons
        };
        var proto = document.location.protocol, host = "whatshelp.io", url = proto + "//static." + host;
        var s = document.createElement('script'); s.type = 'text/javascript'; s.async = true; s.src = url + '/widget-send-button/js/init.js';
        s.onload = function () { WhWidgetSendButton.init(host, proto, options); };
        var x = document.getElementsByTagName('script')[0]; x.parentNode.insertBefore(s, x);
	})();
	
	$('.date').datepicker({
        format: "yyyy/mm/dd",        
        todayBtn: "linked",
        autoclose: true,
        todayHighlight: true
	});
	$(".select2").select2({
        placeholder: "Select a country",
        allowClear: true,
        dropdownParent: $('.modal')
	});
	
	$("a.btn_search_by_category").on("click", function(){
		$(this).parents('form').submit();
	});

	/*
	* Maintain / Keep scroll position after post-back / postback / refresh. Just include plugin (no need for cookies)	
	*/
	// (function($){
	// window.onbeforeunload = function(e){    
	// window.name += ' [' + $(window).scrollTop().toString() + '[' + $(window).scrollLeft().toString();
	// };
	// $.maintainscroll = function() {
	// if(window.name.indexOf('[') > 0)
	// {
	// var parts = window.name.split('['); 
	// window.name = $.trim(parts[0]);
	// window.scrollTo(parseInt(parts[parts.length - 1]), parseInt(parts[parts.length - 2]));
	// }   
	// };  
	// $.maintainscroll();
	// })(jQuery);

</script>

@yield('javascript')

</body>
</html>