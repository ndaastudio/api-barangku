@extends('web.templates.dashboard')

@section('content')
	<div class="card">
		<h5 class="card-header">Silahkan pilih paket marketing Anda</h5>
		<form action="{{ route('kuota-marketing.tambah') }}" method="POST" id="formBeli">
			@csrf
			<div class="card-body">
				<div class="row">
					<div class="col-md mb-md-0 mb-2">
						<div class="form-check custom-option custom-option-icon checked">
							<label class="form-check-label custom-option-content" for="customRadioIcon1">
								<span class="custom-option-body">
									<i class="ti ti-rocket"></i>
									<span class="custom-option-title">Pemula</span>
									<small>Anda akan mendapatkan sebanyak 5 kuota untuk Kode Daftar</small>
								</span>
								<p>Rp 100.000</p>
								<input name="jenis_paket" class="form-check-input" type="radio" value="Pemula" id="customRadioIcon1" checked>
							</label>
						</div>
					</div>
					<div class="col-md mb-md-0 mb-2">
						<div class="form-check custom-option custom-option-icon">
							<label class="form-check-label custom-option-content" for="customRadioIcon2">
								<span class="custom-option-body">
									<i class="ti ti-star"></i>
									<span class="custom-option-title">Berpengalaman</span>
									<small>Anda akan mendapatkan sebanyak 10 kuota untuk Kode Daftar</small>
								</span>
								<p>Rp 250.000</p>
								<input name="jenis_paket" class="form-check-input" type="radio" value="Berpengalaman" id="customRadioIcon2">
							</label>
						</div>
					</div>
					<div class="col-md">
						<div class="form-check custom-option custom-option-icon">
							<label class="form-check-label custom-option-content" for="customRadioIcon3">
								<span class="custom-option-body">
									<i class="ti ti-briefcase"></i>
									<span class="custom-option-title">Profesional</span>
									<small>Anda akan mendapatkan sebanyak 25 kuota untuk Kode Daftar</small>
								</span>
								<p>Rp 600.000</p>
								<input name="jenis_paket" class="form-check-input" type="radio" value="Profesional" id="customRadioIcon3">
							</label>
						</div>
					</div>
				</div>
			</div>
			<div class="card-footer d-flex">
				<button onclick="confirmBeli()" class="btn btn-secondary create-new btn-primary ms-auto" type="button">
					Submit
				</button>
			</div>
		</form>
	</div>
@endsection
