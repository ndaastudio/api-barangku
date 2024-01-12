@extends('web.templates.dashboard')

@section('content')
	<div class="card">
		<form action="{{ route('harga-jual.edit') }}" method="POST">
			@csrf
			@method('PUT')
			<div class="card-body">
				<h5>Silahkan atur Harga Jual Anda</h5>
				<div class="mb-3">
					<label for="harga_kode" class="form-label">Harga Kode Daftar</label>
					<div class="input-group">
						<span class="input-group-text" id="harga_kode">Rp</span>
						<input oninput="formatNominal(this)" name="harga_kode" type="text"
							class="form-control {{ $errors->has('harga_kode') ? 'is-invalid' : '' }}" id="harga_kode"
							placeholder="Harga yang akan dijual"
							value="{{ old('harga_kode', number_format($mitra->harga_kode, 0, ',', '.')) }}">
						@if ($errors->has('harga_kode'))
							<div class="invalid-feedback">{{ $errors->first('harga_kode') }}</div>
						@endif
					</div>
				</div>
				<br>
				<h5>Silahkan atur Pembayaran Anda</h5>
				<div class="row">
					<div class="col-md-12">
						<div class="mb-3">
							<label for="nama_rekening" class="form-label">Nama Pemilik Rekening</label>
							<input name="nama_rekening" type="text"
								class="form-control {{ $errors->has('nama_rekening') ? 'is-invalid' : '' }}" id="nama_rekening"
								placeholder="Contoh: Budi" value="{{ old('nama_rekening', $mitra->nama_rekening) }}">
							@if ($errors->has('nama_rekening'))
								<div class="invalid-feedback">{{ $errors->first('nama_rekening') }}</div>
							@endif
						</div>
					</div>
					<div class="col-md-6">
						<div class="mb-3">
							<label for="nama_bank" class="form-label">Nama Bank</label>
							<input name="nama_bank" type="text" class="form-control {{ $errors->has('nama_bank') ? 'is-invalid' : '' }}"
								id="nama_bank" placeholder="Contoh: BNI" value="{{ old('nama_bank', $mitra->nama_bank) }}">
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
								placeholder="Contoh: 1234567890" value="{{ old('nomor_rekening', $mitra->nomor_rekening) }}">
							@if ($errors->has('nomor_rekening'))
								<div class="invalid-feedback">{{ $errors->first('nomor_rekening') }}</div>
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
