<div class="wrapper">

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Kategori</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="?page=home">Home</a></li>
              <li class="breadcrumb-item active">Kategori</li>
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
                <th scope="col">Kategori Nama</th>
                <th scope="col">Aksi</th>
              </tr>
            </thead>


            <tbody>

              <?php 

                $ambil = $koneksi->query("SELECT * FROM tb_kategori");
                $nomor = 1;
                while ($pecah = mysqli_fetch_assoc($ambil)) {

              ?>

              <tr>
                <th scope="row"><?php echo $nomor++ ?></th>
                <td><?php echo $pecah['kategori_nama'] ?></td>

                <td>
                  <a href="?page=pages/kategori/kategori_edit&idedit=<?php echo $pecah['kategori_id'] ?>" class="btn btn-success">Edit</a>
                  <a href="?page=pages/kategori/kategori_delete&iddelete=<?php echo $pecah['kategori_id'] ?>" class="btn btn-danger">Hapus</a>
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
        <h5 class="modal-title" id="exampleModalLabel">Tambah Data Kategori</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">

        <form method="POST" enctype="multipart/form-data">

          <div class="form-group">
            <label for="">Nama Kategori</label>
            <input type="text" class="form-control" name="nama">
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

        $simpan = $koneksi->query("INSERT INTO tb_kategori (kategori_nama) VALUES ('$nama') ");


        if ($simpan == TRUE) {
          echo "
              <script>
                alert('Data Berhasil Disimpan')
                window.location = '?page=pages/kategori/kategori_view'
              </script>
          ";
        } else {
          echo "
              <script>
                alert('Data Gagal Disimpan')
                window.location = '?page=pages/kategori/kategori_view'
              </script>
          ";
        }
        

      }

    ?>