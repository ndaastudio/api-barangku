<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8" />
	<title>Barangku</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="icon" type="image/png" sizes="192x192" href="{{ asset('img/favicon/android-icon-192x192.png') }}">
	<link rel="stylesheet" href="{{ asset('css/style.css') }}">
	<link rel="stylesheet" href="{{ asset('css/responsive.css') }}">
</head>

<body>

	<div class="preloader">
		<div class="spinner"></div>
	</div>

	<header class="header home-page-one">
		<div class="container">
			<div class="clearfix appilo-menu">
				@yield('navbar')
			</div>
		</div>
	</header>

	@yield('beranda')

	@yield('fitur')

	@yield('harga')

	<div class="separator no-border mb100 full-width"></div>

	@yield('ilustrasi')

	<div class="separator no-border mb135 full-width"></div>

	@yield('footer')

	<div class="scrollup"><span class="fas fa-angle-up"></span></div>

	<script src="{{ asset('js/jquery.js') }}"></script>
	<script src="{{ asset('js/bootstrap.min.js') }}"></script>
	<script src="{{ asset('js/popper.min.js') }}"></script>
	<script src="{{ asset('js/bootstrap-select.min.js') }}"></script>
	<script src="{{ asset('js/jquery.validate.min.js') }}"></script>
	<script src="{{ asset('js/owl.carousel.min.js') }}"></script>
	<script src="{{ asset('js/isotope.js') }}"></script>
	<script src="{{ asset('js/jquery.magnific-popup.min.js') }}"></script>
	<script src="{{ asset('js/waypoints.min.js') }}"></script>
	<script src="{{ asset('js/jquery.counterup.min.js') }}"></script>
	<script src="{{ asset('js/wow.min.js') }}"></script>
	<script src="{{ asset('js/jquery.easing.min.js') }}"></script>
	<script src="{{ asset('js/swiper.min.js') }}"></script>
	<script src="{{ asset('js/jquery.bxslider.min.js') }}"></script>
	<script src="{{ asset('js/custom.js') }}"></script>

</body>

</html>
