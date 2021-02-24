<?php
echo "<a href='?p=mhsadd'>Tambah Data Mahasiswa</a>";
echo "<table width='100%' border='1' cellspacing='5' cellpadding='5'>
  <tr>
    <th>NO</th>
    <th>FOTO</th>
    <th>MAHASISWA</th>
    <th>DATA PRIBADI</th>
    <th>KONTAK</th>
    <th>AKSI</th>
  </tr>";
$sqlm = mysqli_query($kon, "select * from mahasiswa order by tglreg desc");
$no = 1;
while($rm = mysqli_fetch_array($sqlm)){
  echo "<tr>
    <td>$no</td>
    <td><img src='foto/$rm[foto]' width='100px'></td>
    <td>
	  No. BP : <b>$rm[nobp]</b>
	  <br>Nama : <b>$rm[nama]</b>
	  <br>Kelas : <b>$rm[kelas]</b>
	  <br>Terdaftar sejak : <b>$rm[tglreg] WIB</b>
	</td>
    <td>
	  Tempat / Tanggal Lahir : 
	  <br><b>$rm[tmplahir] / $rm[tgllahir]</b>
	  <br>Jenis Kelamin : <b>$rm[jk]</b>
	</td>
    <td>	
	  Alamat Lengkap : 
	  <br><b>$rm[alamat]</b>
	  <br>No. Handphone : <b>$rm[hp]</b>
	  <br>Email : <b>$rm[email]</b>
	</td>
    <td>
	  <a href='?p=mhsedit&id=$rm[idmhs]'>Ubah</a> |
	  <a href='?p=mhsdel&id=$rm[idmhs]'>Hapus</a>
	</td>
  </tr>";
  $no++;
}
echo "</table>";
?> 
