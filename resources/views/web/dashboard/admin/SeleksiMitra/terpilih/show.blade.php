@extends('web.templates.dashboard')

@section('content')
	<div class="card p-3">
		<div class="row">
			<div class="col-xs-12 col-lg-6">
				<h4 class="text-primary">
					<span class="align-middle">{{ $mitra->nama }}</span>
				</h4>
				<div class="d-table mx-auto" style="width: calc(100% - 24px)">
					<div class="d-table-row">
						<div class="d-table-cell text-right py-2 pe-3 ps-1 align-middle"
							style="width: 160px; font-weight: 400; color: #667E99">
							Jenis Kelamin
						</div>
						<div class="d-table-cell p-2">
							<span>{{ $mitra->jenis_kelamin }}</span>
						</div>
					</div>
					<div class="d-table-row">
						<div class="d-table-cell text-right py-2 pe-3 ps-1 align-middle"
							style="width: 160px; font-weight: 400; color: #667E99; border-top: 1px dotted #D5E4F1 ">
							Kota/Kabupaten
						</div>
						<div class="d-table-cell p-2" style="border-top: 1px dotted #D5E4F1">
							<span>{{ $mitra->kota }}</span>
						</div>
					</div>
					<div class="d-table-row">
						<div class="d-table-cell text-right py-2 pe-3 ps-1 align-middle"
							style="width: 160px; font-weight: 400; color: #667E99; border-top: 1px dotted #D5E4F1 ">
							Provinsi
						</div>
						<div class="d-table-cell p-2" style="border-top: 1px dotted #D5E4F1">
							<span>{{ $mitra->provinsi }}</span>
						</div>
					</div>
					<div class="d-table-row">
						<div class="d-table-cell text-right py-2 pe-3 ps-1 align-middle"
							style="width: 160px; font-weight: 400; color: #667E99; border-top: 1px dotted #D5E4F1">
							Umur
						</div>
						<div class="d-table-cell p-2" style="border-top: 1px dotted #D5E4F1">
							<span>{{ $mitra->umur }} tahun</span>
						</div>
					</div>
					<div class="d-table-row">
						<div class="d-table-cell text-right py-2 pe-3 ps-1 align-middle"
							style="width: 160px; font-weight: 400; color: #667E99; border-top: 1px dotted #D5E4F1">
							Pendidikan Terakhir
						</div>
						<div class="d-table-cell p-2" style="border-top: 1px dotted #D5E4F1">
							<span>{{ $mitra->pendidikan_terakhir }}</span>
						</div>
					</div>
					<div class="d-table-row">
						<div class="d-table-cell text-right py-2 pe-3 ps-1 align-middle"
							style="width: 160px; font-weight: 400; color: #667E99; border-top: 1px dotted #D5E4F1">
							Pekerjaan
						</div>
						<div class="d-table-cell p-2" style="border-top: 1px dotted #D5E4F1">
							<span>{{ $mitra->pekerjaan }}</span>
						</div>
					</div>
					<div class="d-table-row">
						<div class="d-table-cell text-right py-2 pe-3 ps-1 align-middle"
							style="width: 160px; font-weight: 400; color: #667E99; border-top: 1px dotted #D5E4F1">
							No. Telepon
						</div>
						<div class="d-table-cell p-2" style="border-top: 1px dotted #D5E4F1">
							<span>{{ $mitra->nomor_telepon }}</span>
						</div>
					</div>
					<div class="d-table-row">
						<div class="d-table-cell text-right py-2 pe-3 ps-1 align-middle"
							style="width: 160px; font-weight: 400; color: #667E99; border-top: 1px dotted #D5E4F1">
							No. WhatsApp
						</div>
						<div class="d-table-cell p-2" style="border-top: 1px dotted #D5E4F1">
							<span><a style="text-decoration: none"
									href="https://wa.me/{{ substr_replace($mitra->nomor_whatsapp, '62', 0, 1) }}"
									target="_blank">{{ $mitra->nomor_whatsapp }}</a></span>
						</div>
					</div>
				</div>
				<div class="row my-3">
					@if ($mitra->user_id !== null)
						<div class="col-auto">
							<form action="{{ route('seleksi-mitra.terpilih.id', ['id' => $mitra->id]) }}" method="POST">
								@csrf
								@method('PUT')
								<button type="submit" class="btn btn-danger"><i class="fa-solid fa-ban me-1"></i>Batal
									Dipilih</button>
							</form>
						</div>
					@endif
					@if ($mitra->user_id === null)
						<div class="col-auto">
							<form action="{{ route('seleksi-mitra.terpilih.id', ['id' => $mitra->id]) }}" method="POST">
								@csrf
								<button type="submit" class="btn btn-success"><i class="fa-solid fa-key me-1"></i>Generate Akun</button>
							</form>
						</div>
					@endif
				</div>
			</div>
			<div class="col-xs-12 col-lg-6">
				<iframe style="height: 80vh" src="{{ $mitra->previewCV() }}" frameBorder="0" scrolling="auto"
					width="100%"></iframe>
			</div>
		</div>
	</div>
@endsection
