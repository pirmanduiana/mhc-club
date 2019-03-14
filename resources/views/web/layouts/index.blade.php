<!DOCTYPE HTML>
<html>
	@include('web.partials.metadata')
	<body>
		@include('web.partials.header')
        @yield('content')
        @include('web.partials.footer')
	</body>
	@yeild('customscript')
</html>