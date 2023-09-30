@php
	use App\Models\Mitra;
@endphp
<li class="menu-header small text-uppercase">
	<span class="menu-header-text">Pengaturan</span>
</li>
{{-- <li class="menu-item">
	<a href="https://demos.pixinvent.com/vuexy-html-admin-template/documentation/" target="_blank" class="menu-link">
		<i class="menu-icon tf-icons ti ti-user"></i>Profil Saya
	</a>
</li> --}}
<li class="menu-item">
	<a href="javascript:void(0);" class="menu-link menu-toggle">
		<i class="menu-icon tf-icons ti ti-file-dollar"></i>Kuota Marketing
		<div class="badge bg-danger rounded-pill ms-auto">{{ Mitra::where('user_id', Auth::user()->id)->value('kuota_kode') }}
		</div>
	</a>
	<ul class="menu-sub">
		<li class="menu-item">
			<a href="{{ route('kuota-marketing.beli') }}" class="menu-link">
				Pembelian
			</a>
		</li>
		<li class="menu-item">
			<a href="{{ route('kuota-marketing.bayar') }}" class="menu-link">
				Pembayaran
			</a>
		</li>
		<li class="menu-item">
			<a href="{{ route('kuota-marketing.atur-pembayaran') }}" class="menu-link">
				Atur Pembayaran
			</a>
		</li>
	</ul>
</li>
