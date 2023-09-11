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
						<a class="nav-link fw-medium" aria-current="page" href="#formRekrutmen">Form Rekrutmen</a>
					</li>
					<li class="nav-item">
						<a class="nav-link fw-medium" href="#ketentuanMitra">Ketentuan Mitra</a>
					</li>
				</ul>
			</div>
			<div class="landing-menu-overlay d-lg-none"></div>
			<!-- Menu wrapper: End -->
		</div>
	</div>
</nav>
