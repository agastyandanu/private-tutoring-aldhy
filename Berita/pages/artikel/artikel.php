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

          <div class="col-md-8 entries">

            <?php 
              $ambilterbaru = $koneksi->query("SELECT * FROM tb_artikel WHERE kategori_id = '$id' LIMIT 2 ");
              while ($terbaru = $ambilterbaru->fetch_assoc()) {
            ?>

                <article class="entry" data-aos="fade-up">

                  <div class="entry-img text-center p-3">
                    <a href="?page=pages/artikel/artikel_detail&idartikel=<?php echo $terbaru['artikel_id'] ?>"><img src="assets/img/artikel/<?php echo $terbaru['artikel_foto'] ?>" alt="" class="img-fluid"></a>
                  </div>

                  <h2 class="entry-title">
                    <a href="?page=pages/artikel/artikel_detail&idartikel=<?php echo $terbaru['artikel_id'] ?>"><?php echo $terbaru['artikel_judul'] ?></a>
                  </h2>

                  <div class="entry-content">
                    <p><?php echo substr($terbaru['artikel_isi'], 0, 200) ?></p>
                    <div class="read-more">
                      <a href="?page=pages/artikel/artikel_detail&idartikel=<?php echo $terbaru['artikel_id'] ?>">Read More</a>
                    </div>
                  </div>

                </article>

            <?php } ?>

            <div class="blog-pagination">
              <ul class="justify-content-center">
                <li class="disabled"><i class="icofont-rounded-left"></i></li>
                <li><a href="#">1</a></li>
                <li class="active"><a href="#">2</a></li>
                <li><a href="#">3</a></li>
                <li><a href="#"><i class="icofont-rounded-right"></i></a></li>
              </ul>
            </div>

          </div><!-- End blog entries list -->

          <div class="col-md-4">

            <div class="sidebar" data-aos="fade-left">

              <h3 class="sidebar-title">Kategori</h3>
              <div class="sidebar-item categories">
                <ul>
                  <?php 
                    $ambilkategori = $koneksi->query("SELECT * FROM tb_kategori");
                    while ($kategori = $ambilkategori->fetch_assoc()) {
                  ?>

                    <li><a href="?page=pages/artikel/artikel&idkategori=<?php echo $kategori['kategori_id'] ?>"><?php echo $kategori['kategori_nama'] ?></a></li>

                  <?php } ?>
                </ul>

              </div><!-- End sidebar categories-->

              <h3 class="sidebar-title">Artikel Terpopuler</h3>
              <div class="sidebar-item recent-posts">


                <?php 
                  $ambilpolpuler = $koneksi->query("SELECT * FROM tb_artikel WHERE kategori_id = '$id' LIMIT 10 ");
                  while ($populer = $ambilpolpuler->fetch_assoc()) {
                ?>

                  <div class="post-item clearfix">
                    <img src="assets/img/artikel/<?php echo $populer['artikel_foto'] ?>" alt="">
                    <h4><a href="?page=pages/artikel/artikel_detail&idartikel=<?php echo $populer['artikel_id'] ?>"><?php echo $populer['artikel_judul'] ?></a></h4>
                  </div>

                <?php } ?>

              </div><!-- End sidebar recent posts-->

              <h3 class="sidebar-title">Tags</h3>
              <div class="sidebar-item tags">
                <ul>
                  <li><a href="#">App</a></li>
                  <li><a href="#">IT</a></li>
                  <li><a href="#">Business</a></li>
                  <li><a href="#">Business</a></li>
                  <li><a href="#">Mac</a></li>
                  <li><a href="#">Design</a></li>
                  <li><a href="#">Office</a></li>
                  <li><a href="#">Creative</a></li>
                  <li><a href="#">Studio</a></li>
                  <li><a href="#">Smart</a></li>
                  <li><a href="#">Tips</a></li>
                  <li><a href="#">Marketing</a></li>
                </ul>

              </div><!-- End sidebar tags-->

            </div><!-- End sidebar -->

          </div><!-- End blog sidebar -->

        </div>

      </div>
    </section><!-- End Blog Section -->

  </main><!-- End #main -->


  <a href="#" class="back-to-top"><i class="icofont-simple-up"></i></a>


</body>

</html>