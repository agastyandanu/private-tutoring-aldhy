<div class="wrapper">

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Artikel</h1>
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

        <!-- Button trigger modal -->
        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#tambahdata">Tambah Data</button>

        <table class="table mt-3">
            <thead class="thead-dark">
              <tr>
                <th scope="col">No</th>
                <th scope="col">Kategori Artikel</th>
                <th scope="col">Judul Artikel</th>
                <th scope="col">Isi Artikel</th>
                <th scope="col">Foto</th>
                <th scope="col">Aksi</th>
              </tr>
            </thead>


            <tbody>

              <?php 

                $ambil = $koneksi->query("SELECT * FROM tb_artikel a LEFT JOIN tb_kategori b ON a.kategori_id=b.kategori_id ORDER BY artikel_id DESC ");
                $nomor = 1;
                while ($pecah = mysqli_fetch_assoc($ambil)) {

              ?>

              <tr>
                <th scope="row"><?php echo $nomor++ ?></th>
                <td><?php echo $pecah['kategori_nama'] ?></td>
                <td><?php echo $pecah['artikel_judul'] ?></td>
                <td><?php echo substr($pecah['artikel_isi'], 0, 200) ?></td>
                <td><img src="../assets/img/artikel/<?php echo $pecah['artikel_foto'] ?>" alt="" width="100px"></td>

                <td>
                  <a href="?page=pages/artikel/artikel_edit&idedit=<?php echo $pecah['artikel_id'] ?>" class="btn btn-success">Edit</a>
                  <a href="?page=pages/artikel/artikel_delete&iddelete=<?php echo $pecah['artikel_id'] ?>" class="btn btn-danger">Hapus</a>
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
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Tambah Data Artikel</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">

        <form method="POST" enctype="multipart/form-data">

          <div class="form-group">
            <label for="">Kategori Artikel</label>
            <select name="kategori" class="form-control" id="">
              
              <option value="">--- Pilih Kategori Artikel ---</option>

              <?php 
                $ambilkategori = $koneksi->query("SELECT * FROM tb_kategori");
                while ($pecahkategori = $ambilkategori->fetch_assoc() ) {
              ?>
                <option value="<?php echo $pecahkategori['kategori_id'] ?>"><?php echo $pecahkategori['kategori_nama'] ?></option>

              <?php } ?>

            </select>
          </div>

          <div class="form-group">
            <label for="">Judul Artikel</label>
            <input type="text" class="form-control" name="judul">
          </div>


          <div class="form-group">
            <label for="">Isi Artikel</label>
            <textarea class="form-control" name="isi" id="isi" cols="30" rows="10"></textarea>
          </div>

          <script>
            CKEDITOR.replace('isi');
          </script>


          <div class="form-group">
            <label for="">Foto</label>
            <input type="file" class="form-control" name="foto">
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

        $kategori = $_POST['kategori'];
        $judul = $_POST['judul'];
        $isi = $_POST['isi'];

        $namafoto = $_FILES['foto']['name'];
        $lokasifoto = $_FILES['foto']['tmp_name'];
        $size = $_FILES['foto']['size'];

        if ($size > 1000000 ) {
          echo "
              <script>
                alert('Ukuran Foto Terlalu Besar, Maksimal 1MB')
                window.location = '?page=pages/artikel/artikel_view'
              </script>
          ";
        } else {
          $foto = time().'_'.$namafoto;
          move_uploaded_file($lokasifoto, '../assets/img/artikel/'.$foto);
        }

        $simpan = $koneksi->query("INSERT INTO tb_artikel (kategori_id, artikel_judul, artikel_isi, artikel_foto) VALUES ('$kategori', '$judul', '$isi', '$foto') ");


        if ($simpan == TRUE) {
          echo "
              <script>
                alert('Data Berhasil Disimpan')
                window.location = '?page=pages/artikel/artikel_view'
              </script>
          ";
        } else {
          echo "
              <script>
                alert('Data Gagal Disimpan')
                window.location = '?page=pages/artikel/artikel_view'
              </script>
          ";
        }
        

      }

    ?>