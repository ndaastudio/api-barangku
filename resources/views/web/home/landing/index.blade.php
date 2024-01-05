@extends('web.templates.home')

<style>
	#deskripsi-app {
		font-size: 0.9rem;
		width: 100%;
	}

	#card-harga {
		width: 100%;
	}

	@media (min-width: 768px) {
		#deskripsi-app {
			font-size: 1rem;
			width: 50%;
		}

		#card-harga {
			width: 50%;
		}
	}
</style>

@section('content')
	@include('web.home.landing.sections.beranda')

	@include('web.home.landing.sections.tentang-kami')

	@include('web.home.landing.sections.ilustrasi')

	@include('web.home.landing.sections.harga')

	@include('web.home.landing.sections.hubungi-kami')
@endsection
