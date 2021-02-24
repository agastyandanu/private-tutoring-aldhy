<?php 

  $ambildata = $koneksi->query("SELECT * FROM tb_profil WHERE profil_id = 1 ");
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
            <h1 class="m-0 text-dark">Profil</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="?page=home">Home</a></li>
              <li class="breadcrumb-item active">Profil</li>
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
      <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
        Ubah Profil
      </button>


      <table class="table table-bordered mt-4">

        <tr>
          <td>Tentang Kami</td>
          <td><?php echo $pecahdata['tentang_kami']?></td>
        </tr>

        <tr>
          <td>Nomor Telepon</td>
          <td><?php echo $pecahdata['no_telp']?></td>
        </tr>

        <tr>
          <td>Email</td>
          <td><?php echo $pecahdata['email']?></td>
        </tr>

        <tr>
          <td>Instagram</td>
          <td><?php echo $pecahdata['instagram']?></td>
        </tr>

        <tr>
          <td>Maps</td>
          <td><?php echo $pecahdata['maps']?></td>
        </tr>

        <tr>
          <td>Alamat</td>
          <td><?php echo $pecahdata['alamat']?></td>
        </tr>
        
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
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header bg-primary">
        <h5 class="modal-title" id="exampleModalLabel">Ubah Profil</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      
          <form method="POST" enctype="multipart/form-data">

            <div class="form-group">
              <label for="">Tentang Kami</label>
              <textarea class="form-control" name="tentang" id="tentang" cols="30" rows="10"><?php echo $pecahdata['tentang_kami'] ?></textarea>
            </div>

            <script>
              CKEDITOR.replace('tentang');
            </script> 


            <div class="form-group">
              <label for="">Nomor Telepon</label>
              <input type="text" value="<?php echo $pecahdata['no_telp'] ?>" class="form-control" name="no_telp">
            </div>

            <div class="form-group">
              <label for="">Email</label>
              <input type="text" value="<?php echo $pecahdata['email'] ?>" class="form-control" name="email">
            </div>

            <div class="form-group">
              <label for="">Instagram</label>
              <input type="text" value="<?php echo $pecahdata['instagram'] ?>" class="form-control" name="instagram">
            </div>

            <div class="form-group">
              <label for="">Maps</label>
              <textarea class="form-control" name="maps" cols="30" rows="10"><?php echo $pecahdata['maps'] ?></textarea>
            </div>

            <div class="form-group">
              <label for="">Alamat</label>
              <input type="text" value="<?php echo $pecahdata['alamat'] ?>" class="form-control" name="alamat">
            </div>



            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
              <button type="submit" name="simpan" class="btn btn-primary">Simpan Perubahan</button>
            </div>
            
          </form>

          <?php 

            if (isset($_POST['simpan'])) {
              
              $tentang = $_POST['tentang'];
              $no_telp = $_POST['no_telp'];
              $email = $_POST['email'];
              $instagram = $_POST['instagram'];
              $maps = $_POST['maps'];
              $alamat = $_POST['alamat'];

                $update = $koneksi->query("UPDATE tb_profil SET tentang_kami = '$tentang', no_telp = '$no_telp', email = '$email', instagram = '$instagram', maps = '$maps', alamat = '$alamat' WHERE profil_id = 1 ");

                if ($update == TRUE) {
                  echo "
                      <script>
                        alert('Data Berhasil Diubah')
                        window.location = '?page=pages/profil/profil_view'
                      </script>
                  ";
                } else {
                  echo "
                      <script>
                        alert('Data Gagal Diubah')
                        window.location = '?page=pages/profil/profil_view'
                      </script>
                  ";
                }


            }

          ?>

      </div>

    </div>
  </div>
</div>
