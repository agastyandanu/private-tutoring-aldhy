<?php 
	include "koneksi.php";
?>

<!DOCTYPE html>
<html>
<head>
	<title>Data Mahasiswa</title>
	<link rel="stylesheet" href="style.css">
</head>

<body>

	<div class="container">

		<h2>DATA MAHASISWA</h2>

		<table>
			<thead>
				<tr>
					<th>Nomor BP</th>
					<th>Nama Mahasiswa</th>
					<th>Tanggal Lahir</th>
					<th>Alamat</th>
				</tr>
			</thead>

			<tbody>

				<?php 

					$ambil = mysqli_query($koneksi, "SELECT * FROM tb_mahasiswa");
					while ($pecah = $ambil->fetch_assoc() ) {

				?>

					<tr>
						<td><?php echo $pecah['nobp'] ?></td>
						<td><?php echo $pecah['nama'] ?></td>
						<td><?php echo $pecah['tanggal_lahir'] ?></td>
						<td><?php echo $pecah['alamat'] ?></td>

				<?php } ?>


			</tbody>


		</table>




	</div>

</body>
</html>