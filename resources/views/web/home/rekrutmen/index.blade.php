@extends('web.templates.home')

@section('content')
	@include('web.home.rekrutmen.sections.form-rekrutmen')

	@include('web.home.rekrutmen.sections.ketentuan-mitra')
@endsection

@section('js')
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
	<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

	@if (session('success'))
		<script>
			Swal.fire({
				icon: 'success',
				title: 'Berhasil!',
				text: '{{ session('success') }}'
			});
		</script>
	@endif

	@if ($errors->has('check1') || $errors->has('check2'))
		<script>
			Swal.fire({
				icon: 'error',
				title: 'Gagal!',
				text: 'Harap centang semua persyaratan!'
			});
		</script>
	@endif

	<script>
		function kirim() {
			$('#form').submit();
			$('#exampleModal').modal('hide');
			$('.loading-overlay').removeClass('no-loading');
			return true;
		}

		$.ajax({
			url: 'https://dev.farizdotid.com/api/daerahindonesia/provinsi',
			method: 'GET',
			dataType: 'json',
			success: function(data) {
				const selectProvinsi = $('#provinsi');
				$.each(data.provinsi, function(index, provinsi) {
					selectProvinsi.append(
						`<option value="${provinsi.id}">${provinsi.nama}</option>`
					);
				});
			}
		});

		$('#provinsi').on('change', function() {
			const idProvinsi = $(this).val();
			if (idProvinsi !== '') {
				$.ajax({
					url: 'https://dev.farizdotid.com/api/daerahindonesia/kota?id_provinsi=' + idProvinsi,
					method: 'GET',
					dataType: 'json',
					success: function(data) {
						const selectKota = $('#kota');
						selectKota.empty();
						selectKota.html('<option value="">-- Pilih Kota/Kabupaten --</option>');
						$.each(data.kota_kabupaten, function(index, kota) {
							selectKota.append(
								`<option value="${kota.nama}">${kota.nama}</option>`);
						});
						const textProvinsi = $('#provinsi option:selected').text();
						$('#provinsi option:selected').val(textProvinsi);
					}
				});
			}
		});
	</script>
@endsection
