@php
	use Carbon\Carbon;
	$lastUpdated = Carbon::parse(auth()->user()->updated_at)->format('d-m-Y');
@endphp

@extends('web.templates.dashboard')

@section('content')
	<div class="card">
		<div class="card-body">
			<p>Password Anda terakhir diganti pada tanggal <span class="text-primary">{{ $lastUpdated }}</span></p>
		</div>
		<div class="card-footer d-flex">
			<a href="{{ route('password.edit') }}" class="btn btn-secondary create-new btn-primary ms-auto">
				Ganti Password
			</a>
		</div>
	</div>
@endsection
