@extends('web.templates.dashboard')

@section('content')
	<div class="card">
		<div class="card-body">
			<h5>Informasi Harga Jual Anda</h5>
			<div class="d-table mx-auto" style="width: calc(100% - 24px)">
				<div class="d-table-row">
					<div class="d-table-cell text-right py-2 pe-3 ps-1 align-middle" style="font-weight: 400; color: #667E99">
						Harga Satuan Kode Daftar
					</div>
					<div class="d-table-cell p-2">
						<span>Rp {{ number_format($mitra->harga_kode, 0, ',', '.') }}</span>
					</div>
				</div>
			</div>
			<br>
			<h5>Informasi Pembayaran Anda</h5>
			<div class="d-table mx-auto" style="width: calc(100% - 24px)">
				<div class="d-table-row">
					<div class="d-table-cell text-right py-2 pe-3 ps-1 align-middle"
						style="font-weight: 400; color: #667E99; border-top: 1px dotted #D5E4F1 ">
						Nama Bank
					</div>
					<div class="d-table-cell p-2" style="border-top: 1px dotted #D5E4F1">
						<span>{{ $mitra->nama_bank }}</span>
					</div>
				</div>
				<div class="d-table-row">
					<div class="d-table-cell text-right py-2 pe-3 ps-1 align-middle"
						style="font-weight: 400; color: #667E99; border-top: 1px dotted #D5E4F1 ">
						Nomor Rekening
					</div>
					<div class="d-table-cell p-2" style="border-top: 1px dotted #D5E4F1">
						<span>{{ $mitra->nomor_rekening }}</span>
					</div>
				</div>
				<div class="d-table-row">
					<div class="d-table-cell text-right py-2 pe-3 ps-1 align-middle"
						style="font-weight: 400; color: #667E99; border-top: 1px dotted #D5E4F1 ">
						Nama Pemilik Rekening
					</div>
					<div class="d-table-cell p-2" style="border-top: 1px dotted #D5E4F1">
						<span>{{ $mitra->nama_rekening }}</span>
					</div>
				</div>
			</div>
		</div>
		<div class="card-footer d-flex">
			<a href="{{ route('harga-jual.edit') }}" class="btn btn-secondary create-new btn-primary ms-auto">
				Edit
			</a>
		</div>
	</div>
@endsection
