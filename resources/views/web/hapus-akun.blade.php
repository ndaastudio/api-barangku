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

	<!-- Icons -->
	<link rel="stylesheet" href="{{ asset('vuexy/assets/vendor/fonts/fontawesome.css') }}" />
	<link rel="stylesheet" href="{{ asset('vuexy/assets/vendor/fonts/tabler-icons.css') }}" />
	<link rel="stylesheet" href="{{ asset('vuexy/assets/vendor/fonts/flag-icons.css') }}" />

	<!-- Core CSS -->
	<link rel="stylesheet" href="{{ asset('vuexy/assets/vendor/css/rtl/core.css') }}" />
	<link rel="stylesheet" href="{{ asset('vuexy/assets/vendor/css/rtl/theme-default.css') }}" />
	<link rel="stylesheet" href="{{ asset('vuexy/assets/css/demo.css') }}" />

	<!-- Vendors CSS -->
	<link rel="stylesheet" href="{{ asset('vuexy/assets/vendor/libs/node-waves/node-waves.css') }}" />
	<link rel="stylesheet" href="{{ asset('vuexy/assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.css') }}" />
	<link rel="stylesheet" href="{{ asset('vuexy/assets/vendor/libs/typeahead-js/typeahead.css') }}" />
	<!-- Vendor -->
	<link rel="stylesheet" href="{{ asset('vuexy/assets/vendor/libs/@form-validation/umd/styles/index.min.css') }}" />

	<!-- Page CSS -->
	<!-- Page -->
	<link rel="stylesheet" href="{{ asset('vuexy/assets/vendor/css/pages/page-auth.css') }}" />

	<!-- Helpers -->
	<script src="{{ asset('vuexy/assets/vendor/js/helpers.js') }}"></script>
	<!--! Template customizer & Theme config files MUST be included after core stylesheets and helpers.js in the <head> section -->
	<!--? Config:  Mandatory theme config file contain global vars & default theme options, Set your preferred theme option in this file.  -->
	<script src="{{ asset('vuexy/assets/js/config.js') }}"></script>
</head>

<body>
	<!-- Content -->

	<div class="container-xxl">
		<div class="authentication-wrapper authentication-basic container-p-y">
			<div class="authentication-inner py-4">
				<!-- Forgot Password -->
				<div class="card">
					<div class="card-body">
						<!-- Logo -->
						<div class="app-brand justify-content-center mb-4 mt-2">
							<a href="{{ route('home') }}" class="app-brand-link gap-2">
								<img src="{{ asset('vuexy/assets/img/branding/brand_logo.png') }}" width="150px">
							</a>
						</div>
						<!-- /Logo -->
						@if (session('success'))
							<div class="alert alert-success alert-dismissible fade show" role="alert">
								<strong>Berhasil!</strong> {{ session('success') }}
								<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
							</div>
						@endif
						@if (session('error'))
							<div class="alert alert-danger alert-dismissible fade show" role="alert">
								<strong>Error!</strong> {{ session('error') }}
								<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
							</div>
						@endif
						<h4 class="mb-1 pt-2">Hapus Akun 🚫</h4>
						<p class="mb-4">Silahkan masukkan kredensial akun Anda untuk melanjutkan</p>
						<form class="mb-3" action="{{ route('nonaktifkan-akun') }}" method="POST">
							@csrf
							<div class="mb-3">
								<label for="nomor_whatsapp" class="form-label">Nomor Telepon</label>
								<input type="number" class="form-control {{ $errors->has('nomor_telepon') ? 'is-invalid' : '' }}"
									id="nomor_telepon" name="nomor_telepon" value="{{ old('nomor_telepon') }}" autofocus />
								@if ($errors->has('nomor_telepon'))
									<div class="invalid-feedback">{{ $errors->first('nomor_telepon') }}</div>
								@endif
							</div>
							<div class="mb-3">
								<label for="password" class="form-label">Password</label>
								<input type="password" class="form-control {{ $errors->has('password') ? 'is-invalid' : '' }}" id="password"
									name="password" value="{{ old('password') }}" autofocus />
								@if ($errors->has('password'))
									<div class="invalid-feedback">{{ $errors->first('password') }}</div>
								@endif
							</div>
							<button type="submit" class="btn btn-primary d-grid w-100">Hapus Akun</button>
						</form>
					</div>
				</div>
				<!-- /Forgot Password -->
			</div>
		</div>
	</div>

	<!-- / Content -->

	<!-- Core JS -->
	<!-- build:js assets/vendor/js/core.js -->

	<script src="{{ asset('vuexy/assets/vendor/libs/jquery/jquery.js') }}"></script>
	<script src="{{ asset('vuexy/assets/vendor/libs/popper/popper.js') }}"></script>
	<script src="{{ asset('vuexy/assets/vendor/js/bootstrap.js') }}"></script>
	<script src="{{ asset('vuexy/assets/vendor/libs/node-waves/node-waves.js') }}"></script>
	<script src="{{ asset('vuexy/assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.js') }}"></script>
	<script src="{{ asset('vuexy/assets/vendor/libs/hammer/hammer.js') }}"></script>
	<script src="{{ asset('vuexy/assets/vendor/libs/i18n/i18n.js') }}"></script>
	<script src="{{ asset('vuexy/assets/vendor/libs/typeahead-js/typeahead.js') }}"></script>
	<script src="{{ asset('vuexy/assets/vendor/js/menu.js') }}"></script>

	<!-- endbuild -->

	<!-- Vendors JS -->
	<script src="{{ asset('vuexy/assets/vendor/libs/@form-validation/umd/bundle/popular.min.js') }}"></script>
	<script src="{{ asset('vuexy/assets/vendor/libs/@form-validation/umd/plugin-bootstrap5/index.min.js') }}"></script>
	<script src="{{ asset('vuexy/assets/vendor/libs/@form-validation/umd/plugin-auto-focus/index.min.js') }}"></script>

	<!-- Main JS -->
	<script src="{{ asset('vuexy/assets/js/main.js') }}"></script>

	<!-- Page JS -->
	<script src="{{ asset('vuexy/assets/js/pages-auth.js') }}"></script>
</body>

</html>
