<div class="card">
	<div class="card-datatable table-responsive pt-0">
		<table id="example" class="table table-hover">
			<thead>
				<tr class="text-center">
					<th scope="col">No.</th>
					<th scope="col">Mitra</th>
					<th scope="col">Kode Daftar</th>
					<th scope="col">Nama</th>
					<th scope="col">Email</th>
					<th scope="col">Nomor Telepon</th>
					<th scope="col">Paket</th>
					<th scope="col">Sisa Masa Aktif</th>
					<th scope="col">Action</th>
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
						<td>{{ $member->mitra_id === null ? 'Admin' : $member->mitra->nama }}</td>
						<td>{{ $member->kode_daftar }}</td>
						<td>{{ $member->nama }}</td>
						<td>{{ $member->email }}</td>
						<td>{{ $member->nomor_telepon }}</td>
						<td>{{ $member->paket == '0' ? 'Trial 7 Hari' : '1 Tahun (365 Hari)' }}</td>
						<td>{{ Carbon::parse($member->limit_akun)->diffForHumans(Carbon::now(), ['parts' => 2]) }}</td>
						<td>
							<div class="row">
								<div class="col-auto mt-2 mb-2">
									<form action="{{ route('member.nonaktif.id', ['id' => $member->id]) }}" method="POST">
										@csrf
										@method('PUT')
										<button type="submit" class="btn btn-success" data-bs-toggle="tooltip" data-bs-placement="bottom"
											data-bs-title="Aktifkan Akun"><i class="fa-solid fa-power-off"></i></button>
									</form>
								</div>
								<div class="col-auto mt-2 mb-2">
									<form action="{{ route('member.nonaktif.id', ['id' => $member->id]) }}" method="POST"
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
