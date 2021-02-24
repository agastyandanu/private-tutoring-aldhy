<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Project CRUD</title>
</head>

<body>
<h2>Aplikasi Project CRUD Data Mahasiswa</h2>
<?php
include "koneksi.php";
if($_GET["p"] == "mhsadd"){
	include "mhsadd.php";
}else if($_GET["p"] == "mhsedit"){
	include "mhsedit.php";
}else if($_GET["p"] == "mhsdel"){
	include "mhsdel.php";
}else{
	include "mhs.php";
}
?>
</body>
</html>
