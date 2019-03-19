@extends('web.layouts.index')

@section('content')
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