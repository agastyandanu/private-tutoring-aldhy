<?php

	$id = $_GET['iddelete'];

// HAPUS DATA
	$hapus = $koneksi->query("DELETE FROM tb_kategori WHERE kategori_id = '$id' ");

	if ($hapus == TRUE) {
		echo "
			<script>
				alert('Data Berhasil Terhapus')
				window.location = '?page=pages/kategori/kategori_view'
			</script>
		";
	} else {
		echo "
			<script>
				alert('Data Gagal Terhapus')
				window.location = '?page=pages/kategori/kategori_view'
			</script>
		";
	}


?>