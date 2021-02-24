<?php
	session_destroy();

	echo "<script>
			alert('Anda berhasil Logout')
		  </script>";
	echo "<script>
			window.location='login.php'
		  </script>";
?>
