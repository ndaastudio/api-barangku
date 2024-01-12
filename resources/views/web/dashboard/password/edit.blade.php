@extends('web.templates.dashboard')

@section('content')
	<div class="card">
		<form action="{{ route('password.edit') }}" method="POST">
			@csrf
			@method('PUT')
			<h5 class="card-header">Silahkan ganti password Anda</h5>
			<div class="card-body">
				<div class="row">
					<div class="col-md-12">
						<div class="mb-3">
							<label for="password_lama" class="form-label">Password Lama</label>
							<input name="password_lama" type="password"
								class="form-control {{ $errors->has('password_lama') ? 'is-invalid' : '' }}" id="password_lama"
								value="{{ old('password_lama') }}">
							@if ($errors->has('password_lama'))
								<div class="invalid-feedback">{{ $errors->first('password_lama') }}</div>
							@endif
						</div>
					</div>
					<div class="col-md-12">
						<div class="mb-3">
							<label for="password_baru_confirmation" class="form-label">Password Baru</label>
							<input name="password_baru_confirmation" type="password"
								class="form-control {{ $errors->has('password_baru_confirmation') ? 'is-invalid' : '' }}"
								id="password_baru_confirmation" value="{{ old('password_baru_confirmation') }}">
							@if ($errors->has('password_baru_confirmation'))
								<div class="invalid-feedback">{{ $errors->first('password_baru_confirmation') }}</div>
							@endif
						</div>
					</div>
					<div class="col-md-12">
						<div class="mb-3">
							<label for="password_baru" class="form-label">Konfirmasi Password Baru</label>
							<input name="password_baru" type="password"
								class="form-control {{ $errors->has('password_baru') ? 'is-invalid' : '' }}" id="password_baru"
								value="{{ old('password_baru') }}">
							@if ($errors->has('password_baru'))
								<div class="invalid-feedback">{{ $errors->first('password_baru') }}</div>
							@endif
						</div>
					</div>
				</div>
			</div>
			<div class="card-footer d-flex">
				<button type="submit" class="btn btn-secondary create-new btn-primary ms-auto">
					Simpan
				</button>
			</div>
		</form>
	</div>
@endsection
