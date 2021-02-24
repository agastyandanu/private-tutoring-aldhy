<?php 

  $id = $_GET['idedit'];

  $ambildata = $koneksi->query("SELECT * FROM tb_artikel WHERE artikel_id = '$id' ");
  $pecahdata = mysqli_fetch_assoc($ambildata);

?>

<div class="wrapper">

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Ubah Artikel</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="?page=home">Home</a></li>
              <li class="breadcrumb-item active">Artikel</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->



    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">

        <a href="?page=pages/artikel/artikel_delete&iddelete=<?php echo $pecahdata['artikel_id']?>" class="btn btn-danger">Hapus Data</a>

        <form method="POST" enctype="multipart/form-data">

          <div class="form-group">
            <label for="">Kategori Artikel</label>
            <select name="kategori" class="form-control" id="idkategori">
              
              <option value="">--- Pilih Kategori Artikel ---</option>

              <?php 
                $ambilkategori = $koneksi->query("SELECT * FROM tb_kategori");
                while ($pecahkategori = $ambilkategori->fetch_assoc() ) {
              ?>
                <option value="<?php echo $pecahkategori['kategori_id'] ?>"><?php echo $pecahkategori['kategori_nama'] ?></option>
              <?php } ?>
            </select>

            <script>
              document.getElementById('idkategori').value=<?php echo $pecahdata['kategori_id'] ?>
            </script>

          </div>

          <div class="form-group">
            <label for="">Judul Artikel</label>
            <input type="text" value="<?php echo $pecahdata['artikel_judul'] ?>" class="form-control" name="judul">
          </div>


          <div class="form-group">
            <label for="">Isi Artikel</label>
            <textarea class="form-control" name="isi" id="isi" cols="30" rows="10"><?php echo $pecahdata['artikel_isi'] ?></textarea>
          </div>

          <script>
            CKEDITOR.replace('isi');
          </script>

          <div class="form-group">
            <img src="../assets/img/artikel/<?php echo $pecahdata['artikel_foto']?>" width="200px" alt="">
            <input type="text" value="<?php echo $pecahdata['artikel_foto']?>" class="form-control" name="fotolama">
          </div>

          <div class="form-group">
            <label for="">Foto</label>
            <input type="file" class="form-control" name="foto">
          </div>

          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
            <button type="submit" name="simpan" class="btn btn-primary">Simpan Perubahan</button>
          </div>
          
        </form>

        <?php 

          if (isset($_POST['simpan'])) {
            
            $kategori = $_POST['kategori'];
            $judul = $_POST['judul'];
            $isi = $_POST['isi'];
            $fotolama = $_POST['fotolama'];

            $namafoto = $_FILES['foto']['name'];
            $lokasifoto = $_FILES['foto']['tmp_name'];
            $size = $_FILES['foto']['size'];

            if ($size > 5000000 ) {
              echo "
                  <script>
                    alert('Ukuran Foto Terlalu Besar, Maksimal 1MB')
                    window.location = '?page=pages/artikel/artikel_edit&idedit=".$id."'
                  </script>
              ";
            } else {
              $foto = time().'_'.$namafoto;
              move_uploaded_file($lokasifoto, '../assets/img/artikel/'.$foto);


                    if (!empty($lokasifoto)) {
                      unlink("../assets/img/artikel/".$fotolama);
                      $update = $koneksi->query("UPDATE tb_artikel SET kategori_id = '$kategori', artikel_judul = '$judul', artikel_isi = '$isi', artikel_foto = '$foto' WHERE artikel_id = '$id' ");
                    } else {
                      $update = $koneksi->query("UPDATE tb_artikel SET kategori_id = '$kategori', artikel_judul = '$judul', artikel_isi = '$isi' WHERE artikel_id = '$id' ");
                    }



                      if ($update == TRUE) {
                        echo "
                            <script>
                              alert('Data Berhasil Diubah')
                              window.location = '?page=pages/artikel/artikel_edit&idedit=".$id."'
                            </script>
                        ";
                      } else {
                        echo "
                            <script>
                              alert('Data Gagal Diubah')
                              window.location = '?page=pages/artikel/artikel_edit&idedit=".$id."'
                            </script>
                        ";
                      }

              
            }




          }

        ?>



      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->




  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->