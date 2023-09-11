<nav class="layout-navbar shadow-none py-0">
	<div class="container">
		<div class="navbar navbar-expand-lg landing-navbar px-3 px-md-4">
			<!-- Menu logo wrapper: Start -->
			<div class="navbar-brand app-brand demo d-flex py-0 py-lg-2 me-4">
				<!-- Mobile menu toggle: Start-->
				<button class="navbar-toggler border-0 px-0 me-2" type="button" data-bs-toggle="collapse"
					data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
					aria-label="Toggle navigation">
					<i class="ti ti-menu-2 ti-sm align-middle"></i>
				</button>
				<!-- Mobile menu toggle: End-->
				<a href="{{ route('home') }}" class="app-brand-link">
					<img src="{{ asset('vuexy/assets/img/branding/brand_logo.png') }}" width="150px">
				</a>
			</div>
			<!-- Menu logo wrapper: End -->
			<!-- Menu wrapper: Start -->
			<div class="collapse navbar-collapse landing-nav-menu" id="navbarSupportedContent">
				<button class="navbar-toggler border-0 text-heading position-absolute end-0 top-0 scaleX-n1-rtl" type="button"
					data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
					aria-expanded="false" aria-label="Toggle navigation">
					<i class="ti ti-x ti-sm"></i>
				</button>
				<ul class="navbar-nav me-auto">
					<li class="nav-item">
						<a class="nav-link fw-medium" aria-current="page" href="#beranda">Beranda</a>
					</li>
					<li class="nav-item">
						<a class="nav-link fw-medium" href="#tentangKami">Tentang Kami</a>
					</li>
					<li class="nav-item">
						<a class="nav-link fw-medium" href="#ilustrasi">Ilustrasi</a>
					</li>
					<li class="nav-item">
						<a class="nav-link fw-medium" href="#harga">Harga</a>
					</li>
					<li class="nav-item">
						<a class="nav-link fw-medium" href="#hubungiKami">Hubungi Kami</a>
					</li>
				</ul>
			</div>
			<div class="landing-menu-overlay d-lg-none"></div>
			<!-- Menu wrapper: End -->
			<!-- Toolbar: Start -->
			<ul class="navbar-nav flex-row align-items-center ms-auto">
				<!-- navbar button: Start -->
				<li>
					<a href="{{ route('rekrutmen') }}" class="btn btn-primary" target="_blank"><span class="scaleX-n1-rtl me-md-1">
							<svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-users-plus" width="24"
								height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round"
								stroke-linejoin="round">
								<path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
								<path d="M5 7a4 4 0 1 0 8 0a4 4 0 0 0 -8 0"></path>
								<path d="M3 21v-2a4 4 0 0 1 4 -4h4c.96 0 1.84 .338 2.53 .901"></path>
								<path d="M16 3.13a4 4 0 0 1 0 7.75"></path>
								<path d="M16 19h6"></path>
								<path d="M19 16v6"></path>
							</svg>
						</span><span class="d-none d-md-block">Rekrutmen</span></a>
				</li>
				<!-- navbar button: End -->
			</ul>
			<!-- Toolbar: End -->
		</div>
	</div>
</nav>
