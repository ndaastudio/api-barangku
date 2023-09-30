<div class="card">
	<div class="d-flex gap-2 ms-3 mt-3 me-3">
		<div class="ms-auto">
			<button class="btn btn-secondary create-new btn-primary" data-bs-toggle="modal" data-bs-target="#modal-create"
				type="button"><span><i class="ti ti-plus me-sm-1"></i> <span class="d-none d-sm-inline-block">
						Generate Kode</span></span>
			</button>
		</div>
	</div>
	<div class="modal fade" id="modal-create" tabindex="-1" aria-labelledby="create-akun" aria-hidden="true">
		<div class="modal-dialog">
			<div class="modal-content">
				<form class="mb-3" action="{{ route('member.kode') }}" method="POST">
					@csrf
					<div class="modal-header">
						<h1 class="modal-title fs-5" id="create-akun">Generate Kode</h1>
						<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
					</div>
					<div class="modal-body">
						<div class="mb-3">
							<label for="nomor_telepon" class="form-label">Nomor Telepon</label>
							<input type="number" class="form-control {{ $errors->has('nomor_telepon') ? 'is-invalid' : '' }}"
								id="nomor_telepon" name="nomor_telepon" value="{{ old('nomor_telepon') }}" autofocus required />
							@if ($errors->has('nomor_telepon'))
								<div class="invalid-feedback">{{ $errors->first('nomor_telepon') }}</div>
							@endif
						</div>
					</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
						<button type="submit" class="btn btn-primary">Simpan</button>
					</div>
				</form>
			</div>
		</div>
	</div>
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
								@php
									$hargaKode = number_format($member->mitra->harga_kode, 0, ',', '.');
									$kodePembayaran = rand(100, 999);
									$totalPembayaran = number_format($member->mitra->harga_kode + $kodePembayaran, 0, ',', '.');
									$nomorRekening = $member->mitra->nomor_rekening;
									$namaBank = $member->mitra->nama_bank;
									$namaPemilikRekening = $member->mitra->nama_rekening;
								@endphp
								<div class="col-auto mt-2 mb-2">
									<a
										href="https://api.whatsapp.com/send?phone={{ substr_replace($member->nomor_telepon, '62', 0, 1) }}&text={{ urlencode("Salam sehat. Sebelum diberikan Kode Daftar untuk aplikasi Barangku, diharapkan untuk melakukan pembayaran terlebih dahulu. Berikut ini rincian pembayaran Anda:\n\nHarga Kode Daftar: *Rp {$hargaKode}*\nKode Pembayaran: *{$kodePembayaran}*\nTotal Pembayaran: *Rp {$totalPembayaran}*\nNomor Rekening: *{$nomorRekening}*\nBank {$namaBank}\nA.N. *{$namaPemilikRekening}*\n\nSilahkan kirim bukti pembayaran ke WhatsApp ini, kemudian akan dibagikan Kode Daftar Anda untuk menggunakan aplikasi Barangku. Terima kasih.") }}"
										target="_blank" class="btn btn-warning" data-bs-toggle="tooltip" data-bs-placement="bottom"
										data-bs-title="Informasikan Pembayaran" target="_blank"><i class="fa-solid fa-bullhorn"></i></a>
								</div>
								<div class="col-auto mt-2 mb-2">
									<form action="{{ route('member.kode.id', ['id' => $member->id]) }}" method="POST">
										@csrf
										@method('PUT')
										<button type="submit" class="btn btn-success" data-bs-toggle="tooltip" data-bs-placement="bottom"
											data-bs-title="Telah Bayar"><i class="fa-solid fa-sack-dollar"></i></button>
									</form>
								</div>
								<div class="col-auto mt-2 mb-2">
									<div class="modal fade" id="modal-edit{{ $member->id }}" tabindex="-1" aria-labelledby="edit"
										aria-hidden="true">
										<div class="modal-dialog">
											<div class="modal-content">
												<form class="mb-3" action="{{ route('member.update.nomor.id', ['id' => $member->id]) }}" method="POST">
													@csrf
													@method('PUT')
													<div class="modal-header">
														<h1 class="modal-title fs-5" id="edit">Edit Nomor Telepon</h1>
														<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
													</div>
													<div class="modal-body">
														<div class="mb-3">
															<label for="nomor_telepon" class="form-label">Nomor Telepon</label>
															<input type="number" class="form-control {{ $errors->has('nomor_telepon') ? 'is-invalid' : '' }}"
																id="nomor_telepon" name="nomor_telepon" value="{{ old('nomor_telepon', $member->nomor_telepon) }}"
																autofocus required />
															@if ($errors->has('nomor_telepon'))
																<div class="invalid-feedback">{{ $errors->first('nomor_telepon') }}</div>
															@endif
														</div>
													</div>
													<div class="modal-footer">
														<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
														<button type="submit" class="btn btn-primary">Simpan</button>
													</div>
												</form>
											</div>
										</div>
									</div>
									<button type="button" class="btn btn-primary" data-bs-toggle="modal"
										data-bs-target="#modal-edit{{ $member->id }}"><i class="fa-solid fa-edit"></i></button>
								</div>
								<div class="col-auto mt-2 mb-2">
									<form action="{{ route('member.kode.id', ['id' => $member->id]) }}" method="POST"
										id="formDelete{{ $member->id }}">
										@csrf
										@method('DELETE')
										<button type="button" onclick="confirmDelete({{ $member->id }})" class="btn btn-danger"
											data-bs-toggle="tooltip" data-bs-placement="bottom" data-bs-title="Hapus"><i
												class="fa-solid fa-trash"></i></button>
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
