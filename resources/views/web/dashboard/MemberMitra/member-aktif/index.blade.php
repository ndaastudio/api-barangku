@extends('web.templates.dashboard')

@section('content')
	@if (Auth::user()->role === 'Admin')
		@include('web.dashboard.MemberMitra.member-aktif.contents.admin.index')
	@endif
	@if (Auth::user()->role === 'Mitra')
		@include('web.dashboard.MemberMitra.member-aktif.contents.mitra.index')
	@endif
@endsection
