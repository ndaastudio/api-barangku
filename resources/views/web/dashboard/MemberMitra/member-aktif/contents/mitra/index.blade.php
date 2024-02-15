<div class="card">
	<div class="card-datatable table-responsive pt-0">
		<table id="example" class="table table-hover">
			<thead>
				<tr class="text-center">
					<th scope="col">No.</th>
					<th scope="col">Kode Daftar</th>
					<th scope="col">Nama</th>
					<th scope="col">Email</th>
					<th scope="col">Nomor Telepon</th>
					<th scope="col">Paket</th>
					<th scope="col">Sisa Masa Aktif</th>
					{{-- <th scope="col">Action</th> --}}
				</tr>
			</thead>
			<tbody>
				@php
					use Carbon\Carbon;
					$no = 1;
				@endphp
				@foreach ($members as $member)
					<tr>
						<th scope="row" class="text-center">{{ $no }}</th>
						<td>{{ $member->kode_daftar }}</td>
						<td>{{ $member->nama }}</td>
						<td>{{ $member->email }}</td>
						<td>{{ $member->nomor_telepon }}</td>
						<td>{{ $member->paket == '0' ? 'Trial 7 Hari' : '1 Tahun (365 Hari)' }}</td>
						<td>{{ Carbon::parse($member->limit_akun)->diffForHumans(Carbon::now(), ['parts' => 2]) }}</td>
						{{-- <td>
							<div class="row">
								<div class="col-auto mt-2 mb-2">
									<form action="{{ route('member.aktif.perpanjang.id', ['id' => $member->id]) }}" method="POST"
										id="formPerpanjangAkun{{ $member->id }}">
										@csrf
										@method('PUT')
										<button type="button" onclick="confirmPerpanjang({{ $member->id }})" class="btn btn-success"
											data-bs-toggle="tooltip" data-bs-placement="bottom" data-bs-title="Perpanjang Masa Aktif"><i
												class="fa-solid fa-circle-up"></i></button>
									</form>
								</div>
							</div>
						</td> --}}
					</tr>
					@php
						$no++;
					@endphp
				@endforeach
			</tbody>
		</table>
	</div>
</div>
