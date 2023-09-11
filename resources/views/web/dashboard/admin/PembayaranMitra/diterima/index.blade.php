@extends('web.templates.dashboard')

@section('content')
	<div class="card">
		<div class="card-datatable table-responsive pt-0">
			<table id="example" class="table table-hover">
				<thead>
					<tr class="text-center">
						<th scope="col">No.</th>
						<th scope="col">Jenis Paket</th>
						<th scope="col">Total Kuota</th>
						<th scope="col">Mitra</th>
						<th scope="col">Nama Rekening</th>
						<th scope="col">Bank</th>
						<th scope="col">Nomor Rekening</th>
						<th scope="col">Nominal Pembayaran</th>
						<th scope="col">Tanggal Pembayaran</th>
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
							<td>{{ $pembayaran->mitra->nama }}</td>
							<td>{{ $pembayaran->nama_rekening }}</td>
							<td>{{ $pembayaran->nama_bank }}</td>
							<td>{{ $pembayaran->nomor_rekening }}</td>
							<td>Rp {{ number_format($pembayaran->nominal, 0, ',', '.') }}</td>
							<td>{{ Carbon::parse($pembayaran->tanggal_transfer)->format('d-m-Y') }}</td>
							<td class="text-center">
								<div class="row">
									<div class="col-auto mt-2 mb-2">
										<form action="{{ route('pembayaran-mitra.diterima.batal.id', ['id' => $pembayaran->id]) }}" method="POST">
											@csrf
											@method('PUT')
											<button type="submit" class="btn btn-danger" data-bs-toggle="tooltip" data-bs-placement="bottom"
												data-bs-title="Batal Terima"><i class="fa-solid fa-trash"></i></button>
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
@endsection
