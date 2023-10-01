<li class="menu-item {{ $isActive === 'member.request.hapus' ? 'active' : '' }}">
	<a href="{{ route('member.request.hapus') }}" class="menu-link">
		<i class="menu-icon tf-icons ti ti-user-question"></i>Request Hapus Akun
	</a>
</li>
<li class="menu-header small text-uppercase">
	<span class="menu-header-text">Seleksi Mitra</span>
</li>
<li class="menu-item {{ $isActive === 'seleksi-mitra.calon' ? 'active' : '' }}">
	<a href="{{ route('seleksi-mitra.calon') }}" class="menu-link">
		<i class="menu-icon tf-icons ti ti-user"></i>Calon Mitra
	</a>
</li>
<li class="menu-item {{ $isActive === 'seleksi-mitra.wawancara' ? 'active' : '' }}">
	<a href="{{ route('seleksi-mitra.wawancara') }}" class="menu-link">
		<i class="menu-icon tf-icons ti ti-microphone"></i>Mitra Wawancara
	</a>
</li>
<li class="menu-item {{ $isActive === 'seleksi-mitra.terpilih' ? 'active' : '' }}">
	<a href="{{ route('seleksi-mitra.terpilih') }}" class="menu-link">
		<i class="menu-icon tf-icons ti ti-thumb-up"></i>Mitra Terpilih
	</a>
</li>

<li class="menu-header small text-uppercase">
	<span class="menu-header-text">Pembayaran Mitra</span>
</li>
<li class="menu-item {{ $isActive === 'pembayaran-mitra.menunggu' ? 'active' : '' }}">
	<a href="{{ route('pembayaran-mitra.menunggu') }}" class="menu-link">
		<i class="menu-icon tf-icons ti ti-loader"></i>Menunggu Konfirmasi
	</a>
</li>
<li class="menu-item {{ $isActive === 'pembayaran-mitra.diterima' ? 'active' : '' }}">
	<a href="{{ route('pembayaran-mitra.diterima') }}" class="menu-link">
		<i class="menu-icon tf-icons ti ti-wallet"></i>Pembayaran Diterima
	</a>
</li>
<li class="menu-item {{ $isActive === 'pembayaran-mitra.ditolak' ? 'active' : '' }}">
	<a href="{{ route('pembayaran-mitra.ditolak') }}" class="menu-link">
		<i class="menu-icon tf-icons ti ti-wallet-off"></i>Pembayaran Ditolak
	</a>
</li>
