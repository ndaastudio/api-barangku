@extends('web.templates.dashboard')

@section('content')
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
						<th scope="col">Status Akun</th>
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
							<td>{{ $member->akun->kode_daftar }}</td>
							<td>{{ $member->akun->nama }}</td>
							<td>{{ $member->akun->email }}</td>
							<td>{{ $member->akun->nomor_telepon }}</td>
							<td>{{ $member->akun->paket == '0' ? 'Trial 7 Hari' : '1 Tahun (365 Hari)' }}</td>
							<td>{{ Carbon::parse($member->akun->limit_akun)->diffForHumans(Carbon::now(), ['parts' => 3]) }}</td>
							<td>
								{{ $member->akun->status_akun === 0 ? 'Belum diaktivasi' : ($member->akun->status_akun === 1 ? 'Aktif' : ($member->akun->status_akun === 2 ? 'Nonaktif' : '')) }}
							</td>
							<td>
								@if ($member->akun->status_akun === 1)
									<div class="row">
										<div class="col-auto mt-2 mb-2">
											<form action="{{ route('member.request.nonaktifkan.id', ['id' => $member->akun->id]) }}" method="POST"
												id="formNonaktifAkun{{ $member->akun->id }}">
												@csrf
												@method('PUT')
												<button type="button" onclick="confirmNonaktifAkun({{ $member->akun->id }})" class="btn btn-danger"
													data-bs-toggle="tooltip" data-bs-placement="bottom" data-bs-title="Nonaktifkan Akun"><i
														class="fa-solid fa-power-off"></i></button>
											</form>
										</div>
									</div>
								@endif
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
