@extends('web.templates.home')

@section('content')
	@include('web.home.landing.sections.beranda')

	@include('web.home.landing.sections.tentang-kami')

	@include('web.home.landing.sections.ilustrasi')

	@include('web.home.landing.sections.harga')

	@include('web.home.landing.sections.hubungi-kami')
@endsection
