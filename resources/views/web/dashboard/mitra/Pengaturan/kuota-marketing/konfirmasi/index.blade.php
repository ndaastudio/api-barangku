@extends('web.templates.dashboard')

@section('content')
	<div class="card">
		<div class="ms-3 mt-3 me-3 d-flex">
			<div class="ms-auto">
				<p class="mb-0"><strong>REKENING BARANGKU</strong></p>
				<p class="mb-0">Bank Syariah Indonesia (BSI)</p>
				<p class="mb-0">Nama Rekening : CV ANNAFI GROUP</p>
				<p class="mb-0">Nomor Rekening : 7229125642</p>
			</div>
		</div>
		<div class="card-datatable table-responsive pt-0">
			<table id="example" class="table table-hover">
				<thead>
					<tr class="text-center">
						<th scope="col">No.</th>
						<th scope="col">Jenis Paket</th>
						<th scope="col">Total Kuota</th>
						<th scope="col">Nama Rekening</th>
						<th scope="col">Bank</th>
						<th scope="col">Nomor Rekening</th>
						<th scope="col">Kode Pembayaran</th>
						<th scope="col">Total Pembayaran</th>
						<th scope="col">Tanggal Transfer</th>
						<th scope="col">Status</th>
						<th scope="col">Action</th>
					</tr>
				</thead>
				<tbody>
					@php
						use Carbon\Carbon;
						$no = 1;
					@endphp
					@foreach ($pembayarans as $pembayaran)
						<tr>
							<th scope="row" class="text-center">{{ $no }}</th>
							<td>{{ $pembayaran->jenis_paket }}</td>
							<td>{{ $pembayaran->total_kuota }}</td>
							<td>{{ $pembayaran->nama_rekening }}</td>
							<td>{{ $pembayaran->nama_bank }}</td>
							<td>{{ $pembayaran->nomor_rekening }}</td>
							<td>{{ $pembayaran->kode_pembayaran }}</td>
							<td>Rp {{ number_format($pembayaran->nominal, 0, ',', '.') }}</td>
							<td>{{ Carbon::parse($pembayaran->tanggal_transfer)->format('d-m-Y') }}</td>
							<td>
								{{ $pembayaran->status === 0 ? 'Pending' : ($pembayaran->status === 1 ? 'Diterima' : ($pembayaran->status === 2 ? 'Ditolak' : '')) }}
							</td>
							<td>
								<div class="row">
									@php
										$jenisPaket = $pembayaran->jenis_paket;
										$kodePembayaran = $pembayaran->kode_pembayaran;
										$totalPembayaran = number_format($pembayaran->nominal, 0, ',', '.');
										$nomorRekening = $pembayaran->nomor_rekening;
										$namaRekening = $pembayaran->nama_rekening;
										$namaBank = $pembayaran->nama_bank;
									@endphp
									@if ($pembayaran->tanggal_transfer !== null && ($pembayaran->status === 0 || $pembayaran->status === 2))
										<div class="col-auto mt-2 mb-2">
											<a
												href="https://api.whatsapp.com/send?phone={{ substr_replace('081367676651', '62', 0, 1) }}&text={{ urlencode("Assalamualaikum Warahmatullahi Wabarakatuh\n\nHalo admin, Saya sudah melakukan pembayaran. Mohon diterima pembayaran saya, berikut ini rincian pembayaran saya:\n\nJenis Paket:\n*{$jenisPaket}*\nKode Pembayaran:\n*{$kodePembayaran}*\nTotal Pembayaran:\n*Rp {$totalPembayaran}*\nNomor Rekening:\n*{$nomorRekening}*\nNama Pemilik Rekening:\n*{$namaRekening}*\nBank:\n*{$namaBank}*\n\nSekian konfirmasi dari saya, besar harapan untuk diterima pembayaran saya. Terima kasih.\n\nWassalamualaikum Warahmatullahi Wabarakatuh") }}"
												target="_blank" class="btn btn-warning" data-bs-toggle="tooltip" data-bs-placement="bottom"
												data-bs-title="Laporkan Ke Admin" target="_blank"><i class="fa-solid fa-bullhorn"></i></a>
										</div>
									@endif
									@if ($pembayaran->tanggal_transfer === null)
										<div class="col-auto mt-2 mb-2">
											<a href="{{ route('kuota-marketing.konfirmasi.id', ['id' => $pembayaran->id]) }}" class="btn btn-success"
												data-bs-toggle="tooltip" data-bs-placement="bottom" data-bs-title="Bayar Sekarang"><i
													class="fa-solid fa-sack-dollar"></i>
											</a>
										</div>
									@endif
									@if ($pembayaran->status === 0 || $pembayaran->status === 2)
										<div class="col-auto mt-2 mb-2">
											<form action="{{ route('kuota-marketing.konfirmasi.id', ['id' => $pembayaran->id]) }}" method="POST"
												id="formDelete{{ $pembayaran->id }}">
												@csrf
												@method('DELETE')
												<button type="button" onclick="confirmDelete({{ $pembayaran->id }})" class="btn btn-danger"
													data-bs-toggle="tooltip" data-bs-placement="bottom" data-bs-title="Hapus"><i
														class="fa-solid fa-trash"></i></button>
											</form>
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
