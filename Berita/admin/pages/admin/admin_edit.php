<?php 

  $id = $_GET['idedit'];

  $ambildata = $koneksi->query("SELECT * FROM tb_admin WHERE admin_id = '$id' ");
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
            <h1 class="m-0 text-dark">Ubah Data Administrator</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Dashboard v1</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->



    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">

        <a href="?page=pages/admin/admin_delete&iddelete=<?php echo $pecahdata['admin_id']?>" class="btn btn-danger">Hapus Data</a>

        <form class="mt-4" method="POST" enctype="multipart/form-data">
            <div class="form-group">
              <label for="">Nama Administrator</label>
              <input type="text" value="<?php echo $pecahdata['admin_nama']?>" class="form-control" name="nama">
            </div>

            <div class="form-group">
              <label for="">Username</label>
              <input type="text" value="<?php echo $pecahdata['admin_username']?>" class="form-control" name="username">
            </div>

            <div class="form-group">
              <label for="">Email</label>
              <input type="email" value="<?php echo $pecahdata['admin_email']?>" class="form-control" name="email">
            </div>

            <div class="form-group">
              <img src="../assets/img/admin/<?php echo $pecahdata['admin_foto']?>" width="200px" alt="">
              <input type="text" value="<?php echo $pecahdata['admin_foto']?>" class="form-control" name="fotolama">
            </div>

            <div class="form-group">
              <label for="">Foto</label>
              <input type="file" class="form-control" name="foto">
            </div>

            <div class="form-group">
              <label for="">Password</label>
              <input type="password" value="<?php echo $pecahdata['admin_password']?>" class="form-control" name="password">
            </div>

            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
              <button type="submit" name="simpan" class="btn btn-primary">Simpan Perubahan</button>
            </div>  
        </form>

        <?php 

          if (isset($_POST['simpan'])) {
            
            $nama = $_POST['nama'];
            $username = $_POST['username'];
            $email = $_POST['email'];
            $password = $_POST['password'];
            $password_md5 = md5($_POST['password']);
            $fotolama = $_POST['fotolama'];

            $namafoto = $_FILES['foto']['name'];
            $lokasifoto = $_FILES['foto']['tmp_name'];
            $size = $_FILES['foto']['size'];

            if ($size > 1000000 ) {
              echo "
                  <script>
                    alert('Ukuran Foto Terlalu Besar, Maksimal 1MB')
                    window.location = '?page=pages/admin/admin_edit&idedit=".$id."'
                  </script>
              ";
            } else {
              $foto = time().'_'.$namafoto;
              move_uploaded_file($lokasifoto, '../assets/img/admin/'.$foto);


                    if (!empty($lokasifoto)) {
                      unlink("../assets/img/admin/".$fotolama);
                      $update = $koneksi->query("UPDATE tb_admin SET admin_nama = '$nama', admin_username = '$username', admin_email = '$email', admin_foto = '$foto', admin_password = '$password', admin_password_md5 = '$password_md5' WHERE admin_id = '$id' ");
                    } else {
                      $update = $koneksi->query("UPDATE tb_admin SET admin_nama = '$nama', admin_username = '$username', admin_email = '$email', admin_password = '$password', admin_password_md5 = '$password_md5' WHERE admin_id = '$id' ");
                    }



                      if ($update == TRUE) {
                        echo "
                            <script>
                              alert('Data Berhasil Diubah')
                              window.location = '?page=pages/admin/admin_edit&idedit=".$id."'
                            </script>
                        ";
                      } else {
                        echo "
                            <script>
                              alert('Data Gagal Diubah')
                              window.location = '?page=pages/admin/admin_edit&idedit=".$id."'
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