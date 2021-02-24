<?php 
  include "../koneksi.php";

	session_start();
	if (empty($_SESSION['data'])) {
		header('location:login.php');
}

?>

<!DOCTYPE html>
<html>

<head>

  <?php
    include "components/head.php";
  ?>
 
</head>

<body class="hold-transition sidebar-mini layout-fixed">

<!-- navbar -->
<?php 
  include "components/navbar.php";
?>
<!-- end navbar -->

<!-- sidebar -->
<?php 
  include "components/sidebar.php";
?>
<!-- end sidebar -->

<?php 
  include "content.php"; 
?>

<!-- footer -->
<?php 
  include "components/footer.php";
?>
<!-- end footer -->


<!-- Script -->
<?php 
  include "components/script.php";
?>
<!-- End Script -->


</body>
</html>
