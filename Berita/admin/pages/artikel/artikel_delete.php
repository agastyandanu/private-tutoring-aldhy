<?php

	$id = $_GET['iddelete'];

// HAPUS FOTO
	$ambilfoto = $koneksi->query("SELECT * FROM tb_artikel WHERE artikel_id = '$id' ")->fetch_assoc();
	$hapusfoto = $ambilfoto['artikel_foto'];
	unlink("../assets/img/artikel/".$hapusfoto);


// HAPUS DATA
	$hapus = $koneksi->query("DELETE FROM tb_artikel WHERE artikel_id = '$id' ");

	if ($hapus == TRUE) {
		echo "
			<script>
				alert('Data Berhasil Terhapus')
				window.location = '?page=pages/artikel/artikel_view'
			</script>
		";
	} else {
		echo "
			<script>
				alert('Data Gagal Terhapus')
				window.location = '?page=pages/artikel/artikel_view'
			</script>
		";
	}


?>