<!doctype html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Tester Barangku</title>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet"
		integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
</head>

<body>
	<div class="m-4 card">
		<img src="{{ asset('banner.png') }}" class="card-img-top">
		<div class="p-4 card-body">
			<form action="/register-tester" method="POST">
				@csrf
				<div class="gap-4 d-grid">
					@if (session()->has('kode_daftar'))
						<div>
							<h5 class="text-center card-title">Terima kasih telah mendaftar sebagai tester aplikasi Barangku</h5>
							<p class="text-center">Kode daftar anda: <strong>{{ session()->get('kode_daftar') }}</strong></p>
						</div>
					@elseif(!session()->has('kode_daftar'))
						<h5 class="text-center card-title">Form Registrasi Tester Barangku</h5>
						<div>
							<input class="form-control form-control-lg {{ $errors->has('nomor_telepon') ? 'is-invalid' : '' }}"
								type="number" placeholder="Nomor WhatsApp" name="nomor_telepon" value="{{ old('nomor_telepon') }}">
							@if ($errors->has('nomor_telepon'))
								<div class="invalid-feedback">{{ $errors->first('nomor_telepon') }}</div>
							@endif
						</div>
						<button class="btn btn-primary" type="submit">Daftar</button>
					@endif
				</div>
			</form>
		</div>
	</div>
	<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"
		integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous">
	</script>
	@if (session('success'))
		<script>
			Swal.fire({
				icon: 'success',
				title: 'Berhasil!',
				text: 'Kode daftar anda adalah "{{ session('success') }}". Gunakan kode daftar tersebut pada aplikasi Barangku',
			});
		</script>
	@endif
</body>

</html>
