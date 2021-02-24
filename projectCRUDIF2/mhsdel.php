<?php
$sqlm = mysqli_query($kon, "delete from mahasiswa where idmhs='$_GET[id]'");
if($sqlm){
    echo "Data Mahasiswa Berhasil Dihapus";
}else{
    echo "Gagal Menghapus";
}
echo "<META HTTP-EQUIV='Refresh' Content='1; url=?p=mhs'>";
?>