@php
	use App\Models\Mitra;
	$username = Auth::user()->role == 'Admin' ? 'Admin' : Mitra::where('user_id', Auth::user()->id)->value('nama');
@endphp

<!DOCTYPE html>

<html lang="en" class="light-style layout-navbar-fixed layout-menu-fixed layout-compact" dir="ltr"
	data-theme="theme-default" data-assets-path="{{ asset('vuexy/assets') }}"
	data-template="vertical-menu-template-no-customizer">

<head>
	<meta charset="utf-8" />
	<meta name="viewport"
		content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0" />

	<title>Dashboard | {{ Auth::user()->role }}</title>

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
	<link rel="stylesheet" href="{{ asset('vuexy/assets/vendor/libs/apex-charts/apex-charts.css') }}" />
	<link rel="stylesheet" href="{{ asset('vuexy/assets/vendor/libs/swiper/swiper.css') }}" />
	<link rel="stylesheet" href="{{ asset('vuexy/assets/vendor/libs/datatables-bs5/datatables.bootstrap5.css') }}" />
	<link rel="stylesheet"
		href="{{ asset('vuexy/assets/vendor/libs/datatables-responsive-bs5/responsive.bootstrap5.css') }}" />
	<link rel="stylesheet"
		href="{{ asset('vuexy/assets/vendor/libs/datatables-checkboxes-jquery/datatables.checkboxes.css') }}" />

	<!-- Page CSS -->
	<link rel="stylesheet" href="{{ asset('vuexy/assets/vendor/css/pages/cards-advance.css') }}" />

	<!-- Helpers -->
	<script src="{{ asset('vuexy/assets/vendor/js/helpers.js') }}"></script>
	<!--! Template customizer & Theme config files MUST be included after core stylesheets and helpers.js in the <head> section -->
	<!--? Config:  Mandatory theme config file contain global vars & default theme options, Set your preferred theme option in this file.  -->
	<script src="{{ asset('vuexy/assets/js/config.js') }}"></script>
</head>

<body>
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
	<!-- Layout wrapper -->
	<div class="layout-wrapper layout-content-navbar">
		<div class="layout-container">
			<!-- Menu -->

			<aside id="layout-menu" class="layout-menu menu-vertical menu bg-menu-theme pb-3">
				<div class="app-brand demo">
					<a href="{{ route('home') }}" class="app-brand-link gap-2">
						<img src="{{ asset('vuexy/assets/img/branding/brand_logo.png') }}" width="150px">
					</a>

					<a href="javascript:void(0);" class="layout-menu-toggle menu-link text-large ms-auto">
						<i class="ti ti-x d-block d-xl-none ti-sm align-middle"></i>
					</a>
				</div>

				<div class="menu-inner-shadow"></div>

				<ul class="menu-inner py-1">
					<li class="menu-item {{ $isActive === 'dashboard' ? 'active' : '' }}">
						<a href="{{ route('dashboard') }}" class="menu-link">
							<i class="menu-icon tf-icons ti ti-home"></i>Dashboard
						</a>
					</li>
					<!-- Misc -->
					@if (Auth::user()->role === 'Admin')
						@include('web.dashboard.admin.sidebar-menu')
					@endif

					<!-- Apps & Pages -->
					<li class="menu-header small text-uppercase">
						<span class="menu-header-text">Member {{ Auth::user()->role === 'Admin' ? 'Mitra' : 'Saya' }}</span>
					</li>
					<li class="menu-item {{ $isActive === 'member.kode' ? 'active' : '' }}">
						<a href="{{ route('member.kode') }}" class="menu-link">
							<i class="menu-icon tf-icons ti ti-barcode"></i>Kode Daftar
						</a>
					</li>
					<li class="menu-item {{ $isActive === 'member.telah-bayar' ? 'active' : '' }}">
						<a href="{{ route('member.telah-bayar') }}" class="menu-link">
							<i class="menu-icon tf-icons ti ti-coin"></i>Telah Bayar
						</a>
					</li>
					<li class="menu-item {{ $isActive === 'member.aktif' ? 'active' : '' }}">
						<a href="{{ route('member.aktif') }}" class="menu-link">
							<i class="menu-icon tf-icons ti ti-user-dollar"></i>Member Aktif
						</a>
					</li>
					<li class="menu-item {{ $isActive === 'member.nonaktif' ? 'active' : '' }}">
						<a href="{{ route('member.nonaktif') }}" class="menu-link">
							<i class="menu-icon tf-icons ti ti-user-cancel"></i>Member Nonaktif
						</a>
					</li>

					@if (Auth::user()->role === 'Mitra')
						@include('web.dashboard.mitra.sidebar-menu')
					@endif
				</ul>
			</aside>
			<!-- / Menu -->

			<!-- Layout container -->
			<div class="layout-page">
				<!-- Navbar -->

				<nav class="layout-navbar container-xxl navbar navbar-expand-xl navbar-detached align-items-center bg-navbar-theme"
					id="layout-navbar">
					<div class="layout-menu-toggle navbar-nav align-items-xl-center me-3 me-xl-0 d-xl-none">
						<a class="nav-item nav-link px-0 me-xl-4" href="javascript:void(0)">
							<i class="ti ti-menu-2 ti-sm"></i>
						</a>
					</div>

					<div class="navbar-nav-right d-flex align-items-center" id="navbar-collapse">
						<p class="my-auto">Halo, {{ $username }}!</p>

						<ul class="navbar-nav flex-row align-items-center ms-auto">
							<!-- User -->
							<li class="nav-item navbar-dropdown dropdown-user dropdown">
								<a class="nav-link dropdown-toggle hide-arrow" href="javascript:void(0);" data-bs-toggle="dropdown">
									<div class="avatar avatar-online">
										<img src="{{ asset('vuexy/assets/img/avatars/user_default.png') }}" alt class="h-auto rounded-circle" />
									</div>
								</a>
								<ul class="dropdown-menu dropdown-menu-end">
									<li>
										<a class="dropdown-item">
											<div class="d-flex">
												<div class="flex-shrink-0 me-3">
													<div class="avatar avatar-online">
														<img src="{{ asset('vuexy/assets/img/avatars/user_default.png') }}" alt
															class="h-auto rounded-circle" />
													</div>
												</div>
												<div class="flex-grow-1">
													<span class="fw-medium d-block">{{ $username }}</span>
													<small
														class="text-muted">{{ Auth::user()->role === 'Mitra' ? Auth::user()->role : Auth::user()->nomor_whatsapp }}</small>
												</div>
											</div>
										</a>
									</li>
									<li>
										<div class="dropdown-divider"></div>
									</li>
									<li>
										<a class="dropdown-item" href="{{ route('dashboard.logout') }}">
											<i class="ti ti-logout me-2 ti-sm"></i>
											<span class="align-middle">Log Out</span>
										</a>
									</li>
								</ul>
							</li>
							<!--/ User -->
						</ul>
					</div>
				</nav>

				<!-- / Navbar -->

				<!-- Content wrapper -->
				<div class="content-wrapper">
					<!-- Content -->
					<div class="container py-4">
						<nav aria-label="breadcrumb">
							<ol class="breadcrumb">
								@foreach ($breadcrumbs as $breadcrumb)
									<li class="breadcrumb-item {{ $breadcrumb['url'] ?? 'active' }}">
										@if ($breadcrumb['url'])
											<a href="{{ $breadcrumb['url'] }}">{{ $breadcrumb['name'] }}</a>
										@else
											{{ $breadcrumb['name'] }}
										@endif
									</li>
								@endforeach
							</ol>
						</nav>
						@if (session('success'))
							<div class="alert alert-success alert-dismissible fade show" role="alert">
								<strong>Berhasil!</strong> {{ session('success') }}
								<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
							</div>
						@endif
						@if (session('error'))
							<div class="alert alert-danger alert-dismissible fade show" role="alert">
								<strong>Gagal!</strong> {{ session('error') }}
								<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
							</div>
						@endif
						@yield('content')
					</div>
					<!-- / Content -->

					<div class="content-backdrop fade"></div>
				</div>
				<!-- Content wrapper -->
			</div>
			<!-- / Layout page -->
		</div>

		<!-- Overlay -->
		<div class="layout-overlay layout-menu-toggle"></div>

		<!-- Drag Target Area To SlideIn Menu On Small Screens -->
		<div class="drag-target"></div>
	</div>
	<!-- / Layout wrapper -->

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
	<script src="{{ asset('vuexy/assets/vendor/libs/apex-charts/apexcharts.js') }}"></script>
	<script src="{{ asset('vuexy/assets/vendor/libs/swiper/swiper.js') }}"></script>
	<script src="{{ asset('vuexy/assets/vendor/libs/datatables-bs5/datatables-bootstrap5.js') }}"></script>

	<!-- Main JS -->
	<script src="{{ asset('vuexy/assets/js/main.js') }}"></script>

	<!-- Page JS -->
	<script src="{{ asset('vuexy/assets/js/dashboards-analytics.js') }}"></script>

	<script>
		$(document).ready(function() {
			$('form').submit(function() {
				$(this).find('button[type="submit"]').prop('disabled', true);
				$('.loading-overlay').removeClass('no-loading');
			});
		});
	</script>

	<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
	<script>
		$(document).ready(function() {
			$('#example').DataTable();
		});
	</script>

	<script>
		function confirmDelete(id) {
			Swal.fire({
				title: 'Apakah anda yakin?',
				text: "Data yang dihapus tidak dapat dikembalikan!",
				icon: 'warning',
				showCancelButton: true,
				confirmButtonColor: '#d33',
				cancelButtonColor: '#3085d6',
				confirmButtonText: 'Ya, hapus!',
				cancelButtonText: 'Batal'
			}).then((result) => {
				if (result.isConfirmed) {
					$('#formDelete' + id).submit();
				}
			})
		}

		function confirmPerpanjang(id) {
			Swal.fire({
				title: 'Apakah anda yakin?',
				text: "Akun ini akan diperpanjang masa aktifnya selama 365 hari",
				icon: 'warning',
				showCancelButton: true,
				confirmButtonColor: '#d33',
				cancelButtonColor: '#3085d6',
				confirmButtonText: 'Ya, perpanjang!',
				cancelButtonText: 'Batal'
			}).then((result) => {
				if (result.isConfirmed) {
					$('#formPerpanjangAkun' + id).submit();
				}
			})
		}

		function confirmBeli() {
			Swal.fire({
				title: 'Apakah anda yakin?',
				text: "Anda akan membeli paket ini dan akan membayarnya melalui transfer bank",
				icon: 'warning',
				showCancelButton: true,
				confirmButtonColor: '#d33',
				cancelButtonColor: '#3085d6',
				confirmButtonText: 'Ya, beli!',
				cancelButtonText: 'Batal'
			}).then((result) => {
				if (result.isConfirmed) {
					$('#formBeli').submit();
				}
			})
		}
	</script>

	<script>
		$.ajax({
			url: 'https://dev.farizdotid.com/api/daerahindonesia/provinsi',
			method: 'GET',
			dataType: 'json',
			success: function(data) {
				const selectProvinsi = $('#provinsi');
				$.each(data.provinsi, function(index, provinsi) {
					selectProvinsi.append(
						`<option value="${provinsi.id}">${provinsi.nama}</option>`
					);
				});
			}
		});

		$('#provinsi').on('change', function() {
			const idProvinsi = $(this).val();
			if (idProvinsi !== '') {
				$.ajax({
					url: 'https://dev.farizdotid.com/api/daerahindonesia/kota?id_provinsi=' + idProvinsi,
					method: 'GET',
					dataType: 'json',
					success: function(data) {
						const selectKota = $('#kota');
						selectKota.empty();
						selectKota.html(
							'<option value="" class="text-center">-- Pilih Kota/Kabupaten --</option>');
						$.each(data.kota_kabupaten, function(index, kota) {
							selectKota.append(
								`<option value="${kota.nama}">${kota.nama}</option>`);
						});
						const textProvinsi = $('#provinsi option:selected').text();
						$('#provinsi option:selected').val(textProvinsi);
						$('#example').DataTable().column(1).search(textProvinsi).draw();
					}
				});
			} else {
				$('#example').DataTable().column(1).search('').draw();
				$('#example').DataTable().column(2).search('').draw();
				$('#kota').empty();
				$('#kota').append('<option value="" class="text-center">-- Pilih Kota/Kabupaten --</option>');
			}

			$('#kota').on('change', function() {
				const textKota = $(this).val();
				if (textKota !== '') {
					$('#example').DataTable().column(2).search(textKota).draw();
				} else {
					$('#example').DataTable().column(2).search('').draw();
				}
			});
		});
	</script>
</body>

</html>
