@extends('web.templates.dashboard')

@section('content')
	<div class="card">
		<form action="{{ route('kuota-marketing.konfirmasi.id', ['id' => $pembayaran->id]) }}" method="POST">
			@csrf
			@method('PUT')
			<div class="card-body">
				<div class="row">
					<div class="col-md-6">
						<div class="mb-3">
							<label for="nama_rekening" class="form-label">Nama Pemilik Rekening</label>
							<input name="nama_rekening" type="text"
								class="form-control {{ $errors->has('nama_rekening') ? 'is-invalid' : '' }}" id="nama_rekening"
								placeholder="Contoh: Budi" value="{{ old('nama_rekening') }}">
							@if ($errors->has('nama_rekening'))
								<div class="invalid-feedback">{{ $errors->first('nama_rekening') }}</div>
							@endif
						</div>
					</div>
					<div class="col-md-6">
						<div class="mb-3">
							<label for="nama_bank" class="form-label">Nama Bank</label>
							<input name="nama_bank" type="text" class="form-control {{ $errors->has('nama_bank') ? 'is-invalid' : '' }}"
								id="nama_bank" placeholder="Contoh: BNI" value="{{ old('nama_bank') }}">
							@if ($errors->has('nama_bank'))
								<div class="invalid-feedback">{{ $errors->first('nama_bank') }}</div>
							@endif
						</div>
					</div>
					<div class="col-md-6">
						<div class="mb-3">
							<label for="nomor_rekening" class="form-label">Nomor Rekening</label>
							<input name="nomor_rekening" type="number"
								class="form-control {{ $errors->has('nomor_rekening') ? 'is-invalid' : '' }}" id="nomor_rekening"
								placeholder="Contoh: 1234567890" value="{{ old('nomor_rekening') }}">
							@if ($errors->has('nomor_rekening'))
								<div class="invalid-feedback">{{ $errors->first('nomor_rekening') }}</div>
							@endif
						</div>
					</div>
					<div class="col-md-6">
						<div class="mb-3">
							<label for="nominal" class="form-label">Nominal Pembayaran</label>
							<input type="number" class="form-control" id="nominal"
								placeholder="Rp {{ number_format($pembayaran->nominal, 0, ',', '.') }}" readonly>
						</div>
					</div>
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
