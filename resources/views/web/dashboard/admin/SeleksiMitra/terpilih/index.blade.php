@extends('web.templates.dashboard')

@section('content')
	<div class="card">
		<div class="d-flex gap-2 ms-3 mt-3 me-3">
			<div>
				<select class="form-control" id="provinsi" name="provinsi">
					<option value="" class="text-center">-- Pilih Provinsi --</option>
				</select>
			</div>
			<div>
				<select class="form-control" id="kota" name="kota">
					<option value="" class="text-center">-- Pilih Kota/Kabupaten --</option>
				</select>
			</div>
		</div>
		<div class="card-datatable table-responsive pt-0">
			<table id="example" class="table table-hover">
				<thead>
					<tr class="text-center">
						<th scope="col">No.</th>
						<th scope="col">Provinsi</th>
						<th scope="col">Kab/Kota</th>
						<th scope="col">Nama</th>
						<th scope="col">Kontak</th>
						<th scope="col">Action</th>
					</tr>
				</thead>
				<tbody>
					@php
						$no = 1;
					@endphp
					@foreach ($mitras as $mitra)
						<tr>
							<th scope="row" class="text-center">{{ $no }}</th>
							<td>{{ $mitra->provinsi }}</td>
							<td>{{ $mitra->kota }}</td>
							<td>{{ $mitra->nama }}</td>
							<td>No. Telepon: {{ $mitra->nomor_telepon }}<br>No. WhatsApp: <a style="text-decoration: none"
									href="https://wa.me/{{ substr_replace($mitra->nomor_whatsapp, '62', 0, 1) }}"
									target="_blank">{{ $mitra->nomor_whatsapp }}</a></td>
							<td class="text-center">
								<div class="row">
									<div class="col-auto mt-2 mb-2">
										<a href="{{ route('seleksi-mitra.terpilih.id', ['id' => $mitra->id]) }}" class="btn btn-warning"
											data-bs-toggle="tooltip" data-bs-placement="bottom" data-bs-title="Detail"><i
												class="fa-solid fa-circle-info"></i></a>
									</div>
									<div class="col-auto mt-2 mb-2">
										<form action="{{ route('seleksi-mitra.terpilih.id', ['id' => $mitra->id]) }}" method="POST"
											id="formDelete{{ $mitra->id }}">
											@csrf
											@method('DELETE')
											<button type="button" onclick="confirmDelete({{ $mitra->id }})" class="btn btn-danger"
												data-bs-toggle="tooltip" data-bs-placement="bottom" data-bs-title="Hapus"><i
													class="fa-solid fa-trash"></i></button>
										</form>
									</div>
									@if ($mitra->user_id !== null)
										@php
											$pwDecode = Crypt::decryptString($mitra->user->secret_key);
										@endphp
										<div class="col-auto mt-2 mb-2">
											<a
												href="https://api.whatsapp.com/send?phone={{ substr_replace($mitra->nomor_whatsapp, '62', 0, 1) }}&text={{ urlencode("Salam sehat,\n\nKepada Yth. *{$mitra->nama}*\nMitra Marketing Barangku\n\nBerikut ini akun mitra Anda:\nNomor WhatsApp: {$mitra->user->nomor_whatsapp}\nPassword: {$pwDecode}\nHalaman Login: https://barangku.web.id/dashboard/login\n\nHormat kami,\nBarangku\nwww.barangku.web.id") }}"
												class="btn btn-success" data-bs-toggle="tooltip" data-bs-placement="bottom" data-bs-title="Bagikan Akun"
												target="__blank"><i class="fa-solid fa-share"></i></a>
										</div>
									@endif
								</div>
							</td>
						</tr>
						@php
							$no++;
						@endphp
					@endforeach
				</tbody>
			</table>
		</div>
	</div>
@endsection
