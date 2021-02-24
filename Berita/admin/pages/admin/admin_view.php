<div class="wrapper">

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Administrator</h1>
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

        <!-- Button trigger modal -->
        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#tambahdata">Tambah Data</button>

        <table class="table mt-3">
            <thead class="thead-dark">
              <tr>
                <th scope="col">No</th>
                <th scope="col">Nama</th>
                <th scope="col">Username</th>
                <th scope="col">Email</th>
                <th scope="col">Foto</th>
                <th scope="col">Password</th>
                <th scope="col">Aksi</th>
              </tr>
            </thead>


            <tbody>

              <?php 

                $ambil = $koneksi->query("SELECT * FROM tb_admin");
                $nomor = 1;
                while ($pecah = mysqli_fetch_assoc($ambil)) {

              ?>

              <tr>
                <th scope="row"><?php echo $nomor++ ?></th>
                <td><?php echo $pecah['admin_nama'] ?></td>
                <td><?php echo $pecah['admin_username'] ?></td>
                <td><?php echo $pecah['admin_email'] ?></td>
                <td><img src="../assets/img/admin/<?php echo $pecah['admin_foto'] ?>" alt="" width="100px"></td>
                <td><?php echo $pecah['admin_password_md5'] ?></td>

                <td>
                  <a href="?page=pages/admin/admin_edit&idedit=<?php echo $pecah['admin_id'] ?>" class="btn btn-success">Edit</a>
                  <a href="?page=pages/admin/admin_delete&iddelete=<?php echo $pecah['admin_id'] ?>" class="btn btn-danger">Hapus</a>
                </td>

              <?php } ?>

              </tr>
            </tbody>
          </table>



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




<!-- Modal -->
<div class="modal fade" id="tambahdata" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Tambah Data Administrator</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">

        <form method="POST" enctype="multipart/form-data">

          <div class="form-group">
            <label for="">Nama Administrator</label>
            <input type="text" class="form-control" name="nama">
          </div>

          <div class="form-group">
            <label for="">Username</label>
            <input type="text" class="form-control" name="username">
          </div>

          <div class="form-group">
            <label for="">Email</label>
            <input type="email" class="form-control" name="email">
          </div>

          <div class="form-group">
            <label for="">Foto</label>
            <input type="file" class="form-control" name="foto">
          </div>

          <div class="form-group">
            <label for="">Password</label>
            <input type="password" class="form-control" name="password">
          </div>

          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
            <button type="submit" name="simpan" class="btn btn-primary">Simpan</button>
          </div>
          
        </form>

      </div>
    </div>
  </div>
</div>

    <?php 

      if (isset($_POST['simpan'])) {

        $nama = $_POST['nama'];
        $username = $_POST['username'];
        $email = $_POST['email'];
        $password = $_POST['password'];
        $password_md5 = md5($_POST['password']);

        $namafoto = $_FILES['foto']['name'];
        $lokasifoto = $_FILES['foto']['tmp_name'];
        $size = $_FILES['foto']['size'];

        if ($size > 1000000 ) {
          echo "
              <script>
                alert('Ukuran Foto Terlalu Besar, Maksimal 1MB')
                window.location = '?page=pages/admin/admin_view'
              </script>
          ";
        } else {
          $foto = time().'_'.$namafoto;
          move_uploaded_file($lokasifoto, '../assets/img/admin/'.$foto);
        }

        $simpan = $koneksi->query("INSERT INTO tb_admin (admin_nama, admin_username, admin_email, admin_foto, admin_password, admin_password_md5) VALUES ('$nama', '$username', '$email', '$foto', '$password', '$password_md5') ");


        if ($simpan == TRUE) {
          echo "
              <script>
                alert('Data Berhasil Disimpan')
                window.location = '?page=pages/admin/admin_view'
              </script>
          ";
        } else {
          echo "
              <script>
                alert('Data Gagal Disimpan')
                window.location = '?page=pages/admin/admin_view'
              </script>
          ";
        }
        

      }

    ?>