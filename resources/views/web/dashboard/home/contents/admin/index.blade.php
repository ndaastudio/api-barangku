@php
	use App\Models\Akun;
	$kode_daftar = Akun::all()->count();
	$telah_bayar = Akun::where('status_bayar', 1)->count();
	$member_aktif = Akun::where('status_bayar', 1)
	    ->where('status_akun', 1)
	    ->count();
	$member_nonaktif = Akun::where('status_bayar', 1)
	    ->where('status_akun', 2)
	    ->count();
@endphp
<div class="row">
	<div class="col-sm-6 col-lg-3 mb-4">
		<div class="card card-border-shadow-warning">
			<div class="card-body">
				<div class="d-flex align-items-center mb-2 pb-1">
					<div class="avatar me-2">
						<span class="avatar-initial rounded bg-label-warning"><i class="tf-icons ti ti-barcode"></i></span>
					</div>
					<h4 class="ms-1 mb-0">{{ $kode_daftar }}</h4>
				</div>
				<p class="mb-1">Kode Daftar</p>
			</div>
		</div>
	</div>
	<div class="col-sm-6 col-lg-3 mb-4">
		<div class="card card-border-shadow-success">
			<div class="card-body">
				<div class="d-flex align-items-center mb-2 pb-1">
					<div class="avatar me-2">
						<span class="avatar-initial rounded bg-label-success"><i class="tf-icons ti ti-coin"></i></span>
					</div>
					<h4 class="ms-1 mb-0">{{ $telah_bayar }}</h4>
				</div>
				<p class="mb-1">Telah Bayar</p>
			</div>
		</div>
	</div>
	<div class="col-sm-6 col-lg-3 mb-4">
		<div class="card card-border-shadow-primary">
			<div class="card-body">
				<div class="d-flex align-items-center mb-2 pb-1">
					<div class="avatar me-2">
						<span class="avatar-initial rounded bg-label-primary"><i class="tf-icons ti ti-user-dollar"></i></span>
					</div>
					<h4 class="ms-1 mb-0">{{ $member_aktif }}</h4>
				</div>
				<p class="mb-1">Member Aktif</p>
			</div>
		</div>
	</div>
	<div class="col-sm-6 col-lg-3 mb-4">
		<div class="card card-border-shadow-danger">
			<div class="card-body">
				<div class="d-flex align-items-center mb-2 pb-1">
					<div class="avatar me-2">
						<span class="avatar-initial rounded bg-label-danger"><i class="tf-icons ti ti-user-cancel"></i></span>
					</div>
					<h4 class="ms-1 mb-0">{{ $member_nonaktif }}</h4>
				</div>
				<p class="mb-1">Member Nonaktif</p>
			</div>
		</div>
	</div>
</div>
