<?php
$sqlm = mysqli_query($kon, "select * from mahasiswa where idmhs='$_GET[id]'");
$rm = mysqli_fetch_array($sqlm);
?>
<p>Form Ubah Data Mahasiswa</p>
<form id="form1" name="form1" method="post" action="" enctype="multipart/form-data">
  <p>
    <input name="idmhs" type="hidden" id="idmhs" value="<?php echo "$rm[idmhs]";?>" />
    No BP 
    <input name="nobp" type="text" id="nobp" value="<?php echo "$rm[nobp]";?>" />
  </p>
  <p>Nama 
    <input name="nama" type="text" id="nama" value="<?php echo "$rm[nama]";?>" />
  </p>
  <p>Kelas
  <?php
  echo "<select name='kelas' id='kelas'>";
  for($i=1; $i<=7; $i++){
    if($rm["kelas"] == "IF-$i"){
	  echo "<option value='IF-$i' selected>IF-$i</option>";
	}else{
      echo "<option value='IF-$i'>IF-$i</option>";
	}
  }
  echo "</select>";
  ?>     
  </p>
  <p>Tempat / Tanggal Lahir 
    <input name="tmplahir" type="text" id="tmplahir" value="<?php echo "$rm[tmplahir]";?>" />
    <input name="tgllahir" type="date" id="tgllahir" value="<?php echo "$rm[tgllahir]";?>" />
  </p>
  <?php
  if($rm["jk"] == "L"){
    $l = " checked";  $p = "";
  }else if($rm["jk"] == "P"){
    $p = " checked";  $l = "";
  }
  ?>
  <p>Jenis Kelamin 
    <input type="radio" name="jk" id="radio" value="L" <?php echo "$l"; ?> />
    Laki-Laki
    <input type="radio" name="jk" id="radio2" value="P" <?php echo "$p"; ?> />  
  Perempuan</p>
  <p>Alamat 
    <textarea name="alamat" id="alamat" cols="45" rows="5"><?php echo "$rm[alamat]";?></textarea>
  </p>
  <p>No. Handphone 
    <input name="hp" type="text" id="hp" value="<?php echo "$rm[hp]";?>" />
  </p>
  <p>Email 
    <input name="email" type="text" id="email" value="<?php echo "$rm[email]";?>" />
  </p>
  <?php
  echo "<img src='foto/$rm[foto]' width='150px'><br>";
  ?>
  <p>Foto 
    <input type="file" name="foto" id="foto" />
  </p>
  <p>
    <input type="submit" name="simpan" id="simpan" value="SIMPAN DATA MAHASISWA" />
  </p>
</form>

<?php
if($_POST["simpan"]){
  include "koneksi.php";
  $nmfoto  = $_FILES["foto"]["name"];
  $lokfoto = $_FILES["foto"]["tmp_name"];
  if(!empty($lokfoto)){
    move_uploaded_file($lokfoto, "foto/$nmfoto");
	$foto = ", foto='$nmfoto'";
  }else{
    $foto = "";
  }
  
  $sqlm = mysqli_query($kon, "update mahasiswa set nama='$_POST[nama]', kelas='$_POST[kelas]', tmplahir='$_POST[tmplahir]', tgllahir='$_POST[tgllahir]', jk='$_POST[jk]', alamat='$_POST[alamat]', hp='$_POST[hp]', email='$_POST[email]' $foto where idmhs='$_POST[idmhs]'");
  if($sqlm){
    echo "Data Mahasiswa Berhasil Dirubah";
  }else{
    echo "Gagal Merubah";
  }
  echo "<META HTTP-EQUIV='Refresh' Content='1; url=?p=mhs'>";
}
?>