<?php 

	include "../koneksi.php";

	if (isset($_POST['proses'])) {
		
		$user = mysqli_real_escape_string($koneksi, $_POST['username']);
		$pass = mysqli_real_escape_string($koneksi, md5($_POST['password']));

		$pecah = $koneksi->query("SELECT * FROM tb_admin WHERE admin_username = '$user' AND admin_password_md5 = '$pass' ")->fetch_assoc();

		if ($pecah == TRUE) {
			SESSION_START();
				$_SESSION['admin_id'] = $pecah['admin_id'];
				$_SESSION['admin_username'] = $pecah['admin_username'];
				$_SESSION['admin_nama'] = $pecah['admin_nama'];
				$_SESSION['data'] = $pecah;

			echo "<script>
					alert('Selamat Datang $_SESSION[admin_nama]');
					window.location='index.php';
				 </script>";

		} else {
			echo "<script>
					alert('Username dan Password Salah!');
					window.location='login.php';
				 </script>";
		}

	}

?>