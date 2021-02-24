<header id="header" class="fixed-top">
    <div class="container d-flex align-items-center">

      <h1 class="logo mr-auto"><a href="?page=home"><span>Portal </span>Berita</a></h1>
      <!-- Uncomment below if you prefer to use an image logo -->
      <!-- <a href="?page=home" class="logo mr-auto"><img src="assets/img/logo.png" alt="" class="img-fluid"></a>-->

      <nav class="nav-menu d-none d-lg-block">
        <ul>
          <li class="active"><a href="?page=home">Home</a></li>

          <li class="drop-down"><a href="">Berita</a>
            <ul>
              <?php 
                $ambilkategori = $koneksi->query("SELECT * FROM tb_kategori");
                while ($kategori = $ambilkategori->fetch_assoc()) {
              ?>

                <li><a href="?page=pages/artikel/artikel&idkategori=<?php echo $kategori['kategori_id'] ?>"><?php echo $kategori['kategori_nama'] ?></a></li>

              <?php } ?>
              
            </ul>
          </li>
<!-- 
          <li><a href="services.html">Services</a></li>
          <li><a href="portfolio.html">Portfolio</a></li>
          <li><a href="pricing.html">Pricing</a></li> -->
          <li><a href="blog.html">Blog</a></li>
          <li><a href="?page=contact">Contact</a></li>

        </ul>
      </nav><!-- .nav-menu -->

      <?php 

        $ambilprofil = $koneksi->query("SELECT * FROM tb_profil WHERE profil_id = 1 ");
        $profil = $ambilprofil->fetch_assoc();

      ?>

      <div class="header-social-links">
        <a href="#" class="twitter"><i class="icofont-twitter"></i></a>
        <a href="#" class="facebook"><i class="icofont-facebook"></i></a>
        <a href="<?php echo $profil['instagram']?>" target="blank" class="instagram"><i class="icofont-instagram"></i></a>
        <a href="#" class="linkedin"><i class="icofont-linkedin"></i></i></a>
      </div>

    </div>
  </header>