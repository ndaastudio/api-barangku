<div class="card">
	<div class="card-datatable table-responsive pt-0">
		<table id="example" class="table table-hover">
			<thead>
				<tr class="text-center">
					<th scope="col">No.</th>
					<th scope="col">Kode Daftar</th>
					<th scope="col">Nomor Telepon</th>
					<th scope="col">Paket</th>
					<th scope="col">Action</th>
				</tr>
			</thead>
			<tbody>
				@php
					$no = 1;
				@endphp
				@foreach ($members as $member)
					<tr>
						<th scope="row" class="text-center">{{ $no }}</th>
						<td>{{ $member->kode_daftar }}</td>
						<td>{{ $member->nomor_telepon }}</td>
						<td>{{ $member->paket == '0' ? 'Trial 7 Hari' : '1 Tahun (365 Hari)' }}</td>
						<td>
							<div class="row">
								<div class="col-auto mt-2 mb-2">
									<a
										href="https://api.whatsapp.com/send?phone={{ substr_replace($member->nomor_telepon, '62', 0, 1) }}&text={{ urlencode("Assalamualaikum Warahmatullahi Wabarakatuh.\n\nKepada Yth.\nMember Barangku\n\nBerikut ini Kode Daftar untuk akun member Barangku Anda.\nKode Daftar: *{$member->kode_daftar}*\n\nLangkah-langkah aktivasi akun.\n1) Buka Aplikasi Barangku pada Smart Phone.\n2) Klik “Daftar” pada bagian bawah.\n3) Masukan Kode Daftar (6 karakter) yang telah diberikan.\n4) Klik tombol \"Verifikasi\".\n5) Muncul nomor yang telah didaftarakan. Lalu lengkapi data yang diminta.\n6) Tampil halaman Login. Masukan Email dan Password. Klik tombol \"Masuk\".\n7) Anda telah masuk ke Akun Member Barangku.\n\nSemoga Aplikasi Barangku bermanfaat untuk Anda, dan semoga diberkahi dan diridhoi oleh Allah SWT.\n\nWassalamualaikum Warahmatullahi Wabarakatuh.\n\nSalam Hormat.\nBarangku\nwww.barangku.web.id") }}"
										class="btn btn-success" data-bs-toggle="tooltip" data-bs-placement="bottom"
										data-bs-title="Bagikan Kode Daftar" target="__blank"><i class="fa-solid fa-share"></i></a>
								</div>
								<div class="col-auto mt-2 mb-2">
									<form action="{{ route('member.telah-bayar.id', ['id' => $member->id]) }}" method="POST">
										@csrf
										@method('PUT')
										<button type="submit" class="btn btn-danger" data-bs-toggle="tooltip" data-bs-placement="bottom"
											data-bs-title="Batal Bayar"><i class="fa-solid fa-sack-dollar"></i></button>
									</form>
								</div>
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
