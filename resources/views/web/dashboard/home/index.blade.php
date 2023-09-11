@extends('web.templates.dashboard')

@section('content')
	@if (Auth::user()->role === 'Admin')
		@include('web.dashboard.home.contents.admin.index')
	@endif
	@if (Auth::user()->role === 'Mitra')
		@include('web.dashboard.home.contents.mitra.index')
	@endif
@endsection
