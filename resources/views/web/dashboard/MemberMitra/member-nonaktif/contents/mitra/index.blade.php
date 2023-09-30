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
					</tr>
					@php
						$no++;
					@endphp
				@endforeach
			</tbody>
		</table>
	</div>
</div>
