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
			<a href="{{ route('kuota-marketing.tambah') }}" class="menu-link">
				Tambah Kuota
			</a>
		</li>
		<li class="menu-item">
			<a href="{{ route('kuota-marketing.konfirmasi') }}" class="menu-link">
				Konfirmasi Pembayaran
			</a>
		</li>
		<li class="menu-item">
			<a href="{{ route('kuota-marketing.harga') }}" class="menu-link">
				Harga Marketing
			</a>
		</li>
	</ul>
</li>
