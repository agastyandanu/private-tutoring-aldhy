<?php

	$id = $_GET['iddelete'];

// HAPUS FOTO
	$ambilfoto = $koneksi->query("SELECT * FROM tb_admin WHERE admin_id = '$id' ")->fetch_assoc();
	$hapusfoto = $ambilfoto['admin_foto'];
	unlink("../assets/img/admin/".$hapusfoto);


// HAPUS DATA
	$hapus = $koneksi->query("DELETE FROM tb_admin WHERE admin_id = '$id' ");

	if ($hapus == TRUE) {
		echo "
			<script>
				alert('Data Berhasil Terhapus')
				window.location = '?page=pages/admin/admin_view'
			</script>
		";
	} else {
		echo "
			<script>
				alert('Data Gagal Terhapus')
				window.location = '?page=pages/admin/admin_view'
			</script>
		";
	}


?>