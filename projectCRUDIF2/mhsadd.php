<p>Form Tambah Data Mahasiswa</p>
<form id="form1" name="form1" method="post" action="" enctype="multipart/form-data">
  <p>No BP 
    <input type="text" name="nobp" id="nobp" />
  </p>
  <p>Nama 
    <input type="text" name="nama" id="nama" />
  </p>
  <p>Kelas 
    <select name="kelas" id="kelas">
      <option value="IF-1">IF-1</option>
      <option value="IF-2">IF-2</option>
      <option value="IF-3">IF-3</option>
      <option value="IF-4">IF-4</option>
      <option value="IF-5">IF-5</option>
      <option value="IF-6">IF-6</option>
      <option value="IF-7">IF-7</option>
    </select>
  </p>
  <p>Tempat / Tanggal Lahir 
    <input type="text" name="tmplahir" id="tmplahir" />
    <input type="date" name="tgllahir" id="tgllahir" />
  </p>
  <p>Jenis Kelamin 
    <input type="radio" name="jk" id="radio" value="L" />
    Laki-Laki
    <input type="radio" name="jk" id="radio2" value="P" />  
  Perempuan</p>
  <p>Alamat 
    <textarea name="alamat" id="alamat" cols="45" rows="5"></textarea>
  </p>
  <p>No. Handphone 
    <input type="text" name="hp" id="hp" />
  </p>
  <p>Email 
    <input type="text" name="email" id="email" />
  </p>
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
  }
  
  $sqlm = mysqli_query($kon, "insert into mahasiswa (nobp, nama, kelas, tmplahir, tgllahir, jk, alamat, hp, email, foto, tglreg) values ('$_POST[nobp]', '$_POST[nama]', '$_POST[kelas]', '$_POST[tmplahir]', '$_POST[tgllahir]', '$_POST[jk]', '$_POST[alamat]', '$_POST[hp]', '$_POST[email]', '$nmfoto', NOW())");
  if($sqlm){
    echo "Data Mahasiswa Berhasil Disimpan";
  }else{
    echo "Gagal Menyimpan";
  }
  echo "<META HTTP-EQUIV='Refresh' Content='1; url=?p=mhs'>";
}
?>