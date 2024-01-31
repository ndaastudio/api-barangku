<!DOCTYPE html>

<html lang="en" class="light-style layout-navbar-fixed layout-wide" dir="ltr" data-theme="theme-default"
	data-assets-path="{{ asset('vuexy/assets') }}" data-template="front-pages-no-customizer">

<head>
	<meta charset="utf-8" />
	<meta name="viewport"
		content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0" />

	<title>{{ $title }}</title>

	<!-- Favicon -->
	<link rel="icon" type="image/x-icon" href="{{ asset('vuexy/assets/img/favicon/favicon.ico') }}" />

	<!-- Fonts -->
	<link rel="preconnect" href="https://fonts.googleapis.com" />
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
	<link
		href="https://fonts.googleapis.com/css2?family=Public+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&ampdisplay=swap"
		rel="stylesheet" />

	<link rel="stylesheet" href="{{ asset('vuexy/assets/vendor/fonts/tabler-icons.css') }}" />

	<!-- Core CSS -->
	<link rel="stylesheet" href="{{ asset('vuexy/assets/vendor/css/rtl/core.css') }}" />
	<link rel="stylesheet" href="{{ asset('vuexy/assets/vendor/css/rtl/theme-default.css') }}" />
	<link rel="stylesheet" href="{{ asset('vuexy/assets/css/demo.css') }}" />
	<link rel="stylesheet" href="{{ asset('vuexy/assets/vendor/css/pages/front-page.css') }}" />
	<!-- Vendors CSS -->
	<link rel="stylesheet" href="{{ asset('vuexy/assets/vendor/libs/node-waves/node-waves.css') }}" />

	<link rel="stylesheet" href="{{ asset('vuexy/assets/vendor/libs/nouislider/nouislider.css') }}" />
	<link rel="stylesheet" href="{{ asset('vuexy/assets/vendor/libs/swiper/swiper.css') }}" />

	<!-- Page CSS -->

	<link rel="stylesheet" href="{{ asset('vuexy/assets/vendor/css/pages/front-page-landing.css') }}" />

	<!-- Helpers -->
	<script src="{{ asset('vuexy/assets/vendor/js/helpers.js') }}"></script>
	<!--! Template customizer & Theme config files MUST be included after core stylesheets and helpers.js in the <head> section -->
	<!--? Config:  Mandatory theme config file contain global vars & default theme options, Set your preferred theme option in this file.  -->
	<script src="{{ asset('vuexy/assets/js/front-config.js') }}"></script>
</head>

<body>
	<script src="{{ asset('vuexy/assets/vendor/js/dropdown-hover.js') }}"></script>
	<script src="{{ asset('vuexy/assets/vendor/js/mega-dropdown.js') }}"></script>

	<!-- Loading: Start -->
	<div class="loading-overlay no-loading">
		<div class="loader">
			<div class="bar1"></div>
			<div class="bar2"></div>
			<div class="bar3"></div>
			<div class="bar4"></div>
			<div class="bar5"></div>
			<div class="bar6"></div>
			<div class="bar7"></div>
			<div class="bar8"></div>
			<div class="bar9"></div>
			<div class="bar10"></div>
			<div class="bar11"></div>
			<div class="bar12"></div>
		</div>
	</div>
	<!-- Loading: End -->

	<!-- Navbar: Start -->
	@if ($isActive === 'Landing')
		@include('web.home.landing.navbar')
	@endif

	@if ($isActive === 'Rekrutmen')
		@include('web.home.rekrutmen.navbar')
	@endif

	@if ($isActive === 'SyaratDanKetentuan')
		@include('web.home.syarat-dan-ketentuan.navbar')
	@endif
	<!-- Navbar: End -->

	<!-- Sections:Start -->

	<div data-bs-spy="scroll" class="scrollspy-example">
		@yield('content')
	</div>

	<!-- / Sections:End -->

	@if ($isActive === 'Landing')
		<!-- Footer: Start -->
		<footer class="landing-footer bg-body footer-text">
			<div class="footer-top py-3">
				<div class="container d-flex flex-wrap justify-content-center flex-md-row flex-column text-center text-md-start">
					<div class="mb-2 mb-md-0">
						<span class="footer-text">©
							<script>
								document.write(new Date().getFullYear());
							</script>
						</span>
						<a href="https://barangku.web.id" class="fw-medium text-white footer-link">Barangku,</a>
						<span class="footer-text"> CV. Annafi Group</span>
					</div>
					{{-- <div>
						<a href="https://github.com/pixinvent" class="footer-link me-3" target="_blank">
							<img src="{{ asset('vuexy/assets/img/front-pages/icons/github-light.png') }}" alt="github icon"
								data-app-light-img="front-pages/icons/github-light.png" data-app-dark-img="front-pages/icons/github-dark.png" />
						</a>
						<a href="https://www.facebook.com/pixinvents/" class="footer-link me-3" target="_blank">
							<img src="{{ asset('vuexy/assets/img/front-pages/icons/facebook-light.png') }}" alt="facebook icon"
								data-app-light-img="front-pages/icons/facebook-light.png"
								data-app-dark-img="front-pages/icons/facebook-dark.png" />
						</a>
						<a href="https://twitter.com/pixinvents" class="footer-link me-3" target="_blank">
							<img src="{{ asset('vuexy/assets/img/front-pages/icons/twitter-light.png') }}" alt="twitter icon"
								data-app-light-img="front-pages/icons/twitter-light.png"
								data-app-dark-img="front-pages/icons/twitter-dark.png" />
						</a>
						<a href="https://www.instagram.com/pixinvents/" class="footer-link" target="_blank">
							<img src="{{ asset('vuexy/assets/img/front-pages/icons/instagram-light.png') }}" alt="google icon"
								data-app-light-img="front-pages/icons/instagram-light.png"
								data-app-dark-img="front-pages/icons/instagram-dark.png" />
						</a>
					</div> --}}
				</div>
			</div>
		</footer>
		<!-- Footer: End -->
	@endif

	<!-- Core JS -->
	<!-- build:js assets/vendor/js/core.js -->
	<script src="{{ asset('vuexy/assets/vendor/libs/popper/popper.js') }}"></script>
	<script src="{{ asset('vuexy/assets/vendor/js/bootstrap.js') }}"></script>
	<script src="{{ asset('vuexy/assets/vendor/libs/node-waves/node-waves.js') }}"></script>

	<!-- endbuild -->

	<!-- Vendors JS -->
	<script src="{{ asset('vuexy/assets/vendor/libs/nouislider/nouislider.js') }}"></script>
	<script src="{{ asset('vuexy/assets/vendor/libs/swiper/swiper.js') }}"></script>

	<!-- Main JS -->
	<script src="{{ asset('vuexy/assets/js/front-main.js') }}"></script>

	<!-- Page JS -->
	<script src="{{ asset('vuexy/assets/js/front-page-landing.js') }}"></script>
	@yield('js')
</body>

</html>
