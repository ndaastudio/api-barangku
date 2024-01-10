<section id="formRekrutmen" class="section-py">
	<div class="container">
		<h2 class="border-bottom pb-2">Form Rekrutmen Mitra Marketing Barangku</h2>
		<form action="{{ route('rekrutmen') }}" method="POST" enctype="multipart/form-data" id="form">
			@csrf
			<div class="row mt-3">
				<div class="col-lg-6 mb-3">
					<div>
						<label for="nama" class="form-label">Nama</label>
						<input type="text" name="nama" value="{{ old('nama') }}"
							class="form-control {{ $errors->has('nama') ? 'is-invalid' : '' }}" id="nama" placeholder="Nama Lengkap">
						@if ($errors->has('nama'))
							<div class="invalid-feedback">{{ $errors->first('nama') }}</div>
						@endif
					</div>
				</div>
				<div class="col-lg-6 mb-3">
					<label for="jk" class="form-label">Jenis Kelamin</label>
					<select class="form-select {{ $errors->has('jenis_kelamin') ? 'is-invalid' : '' }}" aria-label="jk" id="jk"
						name="jenis_kelamin">
						<option value="">-- Pilih Jenis Kelamin --</option>
						<option value="Pria" {{ old('jenis_kelamin') == 'Pria' ? 'selected' : '' }}>Pria</option>
						<option value="Wanita" {{ old('jenis_kelamin') == 'Wanita' ? 'selected' : '' }}>Wanita</option>
					</select>
					@if ($errors->has('jenis_kelamin'))
						<div class="invalid-feedback">{{ $errors->first('jenis_kelamin') }}</div>
					@endif
				</div>
			</div>
			<div class="row">
				<div class="col-lg-6 mb-3">
					<div>
						<label for="umur" class="form-label">Umur</label>
						<input type="number" value="{{ old('umur') }}"
							class="form-control {{ $errors->has('umur') ? 'is-invalid' : '' }}" id="umur" name="umur"
							placeholder="Berapa Tahun">
						@if ($errors->has('umur'))
							<div class="invalid-feedback">{{ $errors->first('umur') }}</div>
						@endif
					</div>
				</div>
				<div class="col-lg-6 mb-3">
					<label for="pendidikan-terakhir" class="form-label">Pendidikan Terakhir</label>
					<select class="form-select {{ $errors->has('pendidikan_terakhir') ? 'is-invalid' : '' }}"
						aria-label="pendidikan-terakhir" id="pendidikan-terakhir" name="pendidikan_terakhir">
						<option value="">-- Pilih Pendidikan Terakhir --</option>
						<option value="SMA/SMK" {{ old('pendidikan_terakhir') == 'SMA/SMK' ? 'selected' : '' }}>SMA/SMK</option>
						<option value="D1" {{ old('pendidikan_terakhir') == 'D1' ? 'selected' : '' }}>D1</option>
						<option value="D2" {{ old('pendidikan_terakhir') == 'D2' ? 'selected' : '' }}>D2</option>
						<option value="D3" {{ old('pendidikan_terakhir') == 'D3' ? 'selected' : '' }}>D3</option>
						<option value="D4" {{ old('pendidikan_terakhir') == 'D4' ? 'selected' : '' }}>D4</option>
						<option value="S1" {{ old('pendidikan_terakhir') == 'S1' ? 'selected' : '' }}>S1</option>
						<option value="S2" {{ old('pendidikan_terakhir') == 'S2' ? 'selected' : '' }}>S2</option>
						<option value="S3" {{ old('pendidikan_terakhir') == 'S3' ? 'selected' : '' }}>S3</option>
					</select>
					@if ($errors->has('pendidikan_terakhir'))
						<div class="invalid-feedback">{{ $errors->first('pendidikan_terakhir') }}</div>
					@endif
				</div>
			</div>
			<div class="row mb-3">
				<div class="col-lg-6">
					<label class="form-label">Alamat Domisili</label>
					<select class="form-select {{ $errors->has('provinsi') ? 'is-invalid' : '' }}" aria-label="provinsi"
						id="provinsi" name="provinsi" required>
						<option value="">-- Pilih Provinsi --</option>
					</select>
					@if ($errors->has('provinsi'))
						<div class="invalid-feedback">{{ $errors->first('provinsi') }}</div>
					@endif
					<select class="form-select {{ $errors->has('kota') ? 'is-invalid' : '' }} mt-2" aria-label="kota" id="kota"
						name="kota" required>
						<option value="">-- Pilih Kota/Kabupaten --</option>
					</select>
					@if ($errors->has('kota'))
						<div class="invalid-feedback">{{ $errors->first('kota') }}</div>
					@endif
				</div>
				<div class="col-lg-6">
					<label class="form-label">Kontak</label>
					<div class="input-group">
						<span class="input-group-text">+62</span>
						<input type="number" class="form-control {{ $errors->has('nomor_telepon') ? 'is-invalid' : '' }}"
							name="nomor_telepon" value="{{ old('nomor_telepon') }}" placeholder="Nomor Telepon">
					</div>
					@if ($errors->has('nomor_telepon'))
						<div class="text-danger"><small>{{ $errors->first('nomor_telepon') }}</small></div>
					@endif
					<div class="input-group mt-2">
						<span class="input-group-text">+62</span>
						<input type="number" class="form-control {{ $errors->has('nomor_whatsapp') ? 'is-invalid' : '' }}"
							name="nomor_whatsapp" value="{{ old('nomor_whatsapp') }}" placeholder="Nomor WhatsApp">
					</div>
					@if ($errors->has('nomor_whatsapp'))
						<div class="text-danger"><small>{{ $errors->first('nomor_whatsapp') }}</small></div>
					@endif
				</div>
			</div>
			<div class="mb-3">
				<label for="pekerjaan" class="form-label">Pekerjaan/Kesibukan Saat Ini</label>
				<textarea name="pekerjaan" class="form-control {{ $errors->has('pekerjaan') ? 'is-invalid' : '' }}" id="pekerjaan"
				 placeholder="Deskripsikan pekerjaan atau kesibukan saat ini">{{ old('pekerjaan') }}</textarea>
				@if ($errors->has('pekerjaan'))
					<div class="invalid-feedback">{{ $errors->first('pekerjaan') }}</div>
				@endif
			</div>
			<div class="row">
				<div class="col-lg-12 mb-3">
					<div>
						<label for="dokumen" class="form-label">Foto KTP</label>
						<input class="form-control {{ $errors->has('dokumen_cv') ? 'is-invalid' : '' }}" type="file" id="dokumen"
							name="dokumen_cv" accept="image/*">
						@if ($errors->has('dokumen_cv'))
							<div class="invalid-feedback">{{ $errors->first('dokumen_cv') }}</div>
						@endif
						<small class="text-muted">Ukuran
							file maksimal
							5MB.</small>
					</div>
				</div>
			</div>
			<div class="form-check">
				<input id="check1" class="form-check-input" type="checkbox" value="1" name="check1"
					{{ old('check1') == '1' ? 'checked' : '' }}>
				<label class="form-check-label" for="check1">
					Saya menyatakan telah membaca dan memahami isi <a href="{{ route('rekrutmen') }}">“Ketentuan Mitra
						Marketing Barangku”</a>
				</label>
			</div>
			<div class="form-check mb-3">
				<input id="check2" class="form-check-input" type="checkbox" value="1" name="check2"
					{{ old('check2') == '1' ? 'checked' : '' }}>
				<label class="form-check-label" for="check2">
					Saya menyatakan bersedia menjadi Mitra Marketing Barangku, dan akan mengikuti semua <a
						href="{{ route('rekrutmen') }}">ketentuan</a> yang
					ditetapkan oleh Barangku
				</label>
			</div>
			<div class="row">
				<div class="col-lg-12 text-end">
					<button type="button" class="btn btn-lg btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
						Kirim
					</button>
				</div>
			</div>
		</form>
	</div>
	<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="exampleModalLabel">Konfirmasi</h5>
					<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
				</div>
				<div class="modal-body">
					Pastikan semua data yang anda masukan sudah benar, karena data tersebut tidak dapat diubah kembali.
					Apakah anda yakin ingin mendaftar?
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tidak</button>
					<button type="button" class="btn btn-primary" onclick="kirim()">Ya</button>
				</div>
			</div>
		</div>
	</div>
</section>
