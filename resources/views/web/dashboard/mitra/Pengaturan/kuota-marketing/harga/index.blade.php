@extends('web.templates.dashboard')

@section('content')
	<div class="card">
		<form action="{{ route('kuota-marketing.harga') }}" method="POST">
			@csrf
			@method('PUT')
			<h5 class="card-header">Silahkan atur harga Kode Daftar yang Anda jual</h5>
			<div class="card-body">
				<label for="harga_kode" class="form-label">Harga Kode Daftar</label>
				<div class="input-group">
					<span class="input-group-text" id="harga_kode">Rp</span>
					<input name="harga_kode" type="number" class="form-control {{ $errors->has('harga_kode') ? 'is-invalid' : '' }}"
						id="harga_kode" placeholder="Harga yang akan dijual" value="{{ old('harga_kode', $mitra->harga_kode) }}">
					@if ($errors->has('harga_kode'))
						<div class="invalid-feedback">{{ $errors->first('harga_kode') }}</div>
					@endif
				</div>
			</div>
			<div class="card-footer d-flex">
				<button type="submit" class="btn btn-secondary create-new btn-primary ms-auto">
					Submit
				</button>
			</div>
		</form>
	</div>
@endsection
