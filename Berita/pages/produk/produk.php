<?php 
  $id = $_GET['idkategori'];
  $kat = $koneksi->query("SELECT * FROM tb_kategori WHERE kategori_id = '$id' ")->fetch_assoc();
?>


<!DOCTYPE html>
<html lang="en">

<body>


  <main id="main">

    <!-- ======= Breadcrumbs ======= -->
    <section id="breadcrumbs" class="breadcrumbs">
      <div class="container">

        <div class="d-flex justify-content-between align-items-center">
          <h2><?php echo $kat['kategori_nama'] ?></h2>
          <ol>
            <li><a href="?page=home">Home</a></li>
            <li><?php echo $kat['kategori_nama'] ?></li>
          </ol>
        </div>

      </div>
    </section><!-- End Breadcrumbs -->

    <!-- ======= Blog Section ======= -->
    <section id="blog" class="blog">
      <div class="container">

        <div class="row">
          <?php 
            $ambilproduk = $koneksi-?query("SELECT * FROM tb_produk WHERE kategori_id = '$id' ");
            while ($produk = $ambilproduk->fetch_assoc()) {
          ?>
              <div class="col-3">
                
              </div>  
          <?php } ?>
        </div>

      </div>
    </section><!-- End Blog Section -->

  </main><!-- End #main -->


  <a href="#" class="back-to-top"><i class="icofont-simple-up"></i></a>


</body>

</html>