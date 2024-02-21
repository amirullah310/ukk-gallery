<?php
session_start();
if(!isset($_SESSION['userid'])) {
    header("location:login.php");
    exit; // Penting untuk menghentikan eksekusi script setelah redirect
}

include 'koneksi.php';

// Inisialisasi variabel fotoid
$fotoid = isset($_GET['fotoid']) ? $_GET['fotoid'] : null;

// Jika fotoid tidak ada, mungkin Anda ingin menampilkan pesan atau melakukan redirect ke halaman lain
if (!$fotoid) {
    echo "ID Foto tidak valid.";
    exit;
}

// Kueri untuk mendapatkan informasi foto berdasarkan fotoid
$sqlFoto = mysqli_query($conn, "SELECT * FROM foto , user WHERE fotoid='$fotoid'");
$dataFoto = mysqli_fetch_array($sqlFoto);

// Cek apakah data foto ditemukan
if (!$dataFoto) {
    echo "Foto tidak ditemukan.";
    exit;
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Amir Gallery</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <!-- <link href="assets/img/favicon.png" rel="icon"> -->
  <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Roboto:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="assets/vendor/aos/aos.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="assets/css/style.css" rel="stylesheet">

  <!-- =======================================================
  * Template Name: SoftLand
  * Updated: Jan 09 2024 with Bootstrap v5.3.2
  * Template URL: https://bootstrapmade.com/softland-bootstrap-app-landing-page-template/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>
<style>
  .imagg img{
    width: 700px;
    object-fit: cover;
    height: 500px;
    box-shadow: 2px 2px 2px grey;
  }
  .imagg{
    margin-top: 50px;
    display: flex;
    justify-content: center;
  }
  .adi{
    /* padding-right: 100px; */
    padding: 0 90px;
    text-align: justify;
  }
  body{
    text-align: justify;
  }
  .comment-body{
    border: 1px solid grey;
    box-sizing: border-box;
    padding-top:10px;
    padding-right:10px;
    padding-left:10px;
    /* box-shadow: 1px 1px 1px grey; */
  }
  .komenn{
    text-transform: uppercase;
  }
  .judulfoto{
    text-transform: uppercase;
    margin-bottom: -40px;
    margin-top: 60px;
    /* color: grey; */
  }
  .text-white{
    text-transform: uppercase;

  }
  .textarea{

    resize: none;
    height: 150px;
  }
  .h-textarea{

    margin-bottom: 50px;
  }
  .btnn{
    float: right;
    margin-bottom: 20px;
  }
  /* .sidbar{
    position: fixed;
    top: 200px;
    right: 100px;
  } */
  .media {
        border: 1px solid #ddd; /* Tambahkan border pada setiap item komentar */
        border-radius: 8px; /* Agar border terlihat lebih melengkung */
        transition: box-shadow 0.3s; /* Animasi perubahan saat hover */
        box-shadow: 0 0 5px rgba(0, 0, 0, 0.1); /* Efek bayangan untuk memberikan tampilan smooth */
    }

    .media:hover {
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.2); /* Bayangan yang lebih intens saat hover */
    }

    .media-body {
        padding: 15px; /* Ruang dalam di dalam setiap item komentar */
    }
</style>

<body>

  <!-- ======= Header ======= -->
  <header id="header" class="fixed-top d-flex align-items-center">
    <div class="container d-flex justify-content-between align-items-center">

      <div class="logo">
        <h1><a href="index.php">GALLERY</a></h1>
        <!-- Uncomment below if you prefer to use an image logo -->
        <!-- <a href="index.php"><img src="assets/img/logo.png" alt="" class="img-fluid"></a>-->
      </div>

      <nav id="navbar" class="navbar">
        <ul>
          <li><a class="" href="index.php">Home</a></li>
          <li><a href="profile.php">Profile</a></li>
          <li><a class="" href="album.php">Album</a></li>
          <li><a href="saran.php">Kritik dan Saran</a></li>
          <li><a href="contact.php">Contact Us</a></li>
      <li><a href="logout.php">Logout</a></li>

        </ul>
        <i class="bi bi-list mobile-nav-toggle"></i>
      </nav><!-- .navbar -->

    </div>
  </header><!-- End Header -->

  <main id="main">

    <!-- ======= Single Blog Section ======= -->
    <section class="hero-section inner-page">
      <div class="wave">

        <svg width="1920px" height="265px" viewBox="0 0 1920 265" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
          <g id="Page-1" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
            <g id="Apple-TV" transform="translate(0.000000, -402.000000)" fill="#FFFFFF">
              <path d="M0,439.134243 C175.04074,464.89273 327.944386,477.771974 458.710937,477.771974 C654.860765,477.771974 870.645295,442.632362 1205.9828,410.192501 C1429.54114,388.565926 1667.54687,411.092417 1920,477.771974 L1920,667 L1017.15166,667 L0,667 L0,439.134243 Z" id="Path"></path>
            </g>
          </g>
        </svg>

      </div>

      <div class="container">
        <div class="row align-items-center">
          <div class="col-12">
            <div class="row justify-content-center">
              <div class="col-md-10 text-center hero-text">
                <h1 data-aos="fade-up" data-aos-delay="">Komentar</h1>
                <p class="mb-5" data-aos="fade-up" data-aos-delay="100"><?=$dataFoto['tanggalunggah']?> &bullet; By <a href="#" class="text-white"><?=$dataFoto['namalengkap']?></a></p>
              </div>
            </div>
          </div>
        </div>
      </div>

    </section>

    <section class="site-section mb-4">
      <div class="container">
        <div class="row">
          <div class="col-md-8 blog-content adi">

           
            <div class="row mb-5">
              <h6 class="judulfoto">Judul Foto : <?=$dataFoto['judulfoto']?></h6>
              <div class="col-lg imagg">
                <figure><img src="../gambar/<?=$dataFoto['lokasifile']?>" alt="Free Website Template by Free-Template.co" class="img-fluid">
                  <!-- <figcaption>This is an image caption</figcaption> -->
                </figure>
              </div>
             
            </div>
              <h5>Deskripsi</h5>
            <blockquote>
              <p><?=$dataFoto['deskripsifoto']?></p>
              <!-- <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Provident vero tempora aliquam excepturi labore, ad soluta voluptate necessitatibus. Nulla error beatae, quam, facilis suscipit quaerat aperiam minima eveniet quis placeat.</p> -->
            </blockquote>
            <hr>

        
            <!-- <div class="pt-5">
              <p>Categories: <a href="#">Design</a>, <a href="#">Events</a> Tags: <a href="#">#html</a>, <a href="#">#trends</a></p>
            </div> -->
            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#tambahKomentarModal">
    Tambah Komentar
</button>


            <div class="pt-5">
              <h3 class="mb-5">                            <?php
                            $sqlKomentar = mysqli_query($conn, "SELECT COUNT(*) AS jumlah FROM komentarfoto WHERE fotoid='$fotoid'");
                            $jumlahKomentar = mysqli_fetch_assoc($sqlKomentar)['jumlah'];
                            echo $jumlahKomentar ; 
                            ?> Comments</h3>
          <!-- <div class="container mt-4"> -->
    <ul class="list-unstyled">
        <?php
        $i = 1;
        // Kueri untuk mendapatkan komentar berdasarkan fotoid
        $sqlKomentar = mysqli_query($conn, "SELECT * FROM komentarfoto, user WHERE komentarfoto.userid=user.userid AND komentarfoto.fotoid='$fotoid' order by komentarfoto.komentarid desc");

        while ($dataKomentar = mysqli_fetch_array($sqlKomentar)) {
        ?>
            <li class="media mb-4">
                <!-- <img src="assets/img/person_1.jpg" alt="Free Website Template by Free-Template.co" class="mr-3 rounded-circle" width="50"> -->
                <div class="media-body">
                    <h5 class="komenn mb-1"><?= $dataKomentar['namalengkap'] ?></h5>
                    <small class="text-muted"><?= $dataKomentar['tanggalkomentar'] ?></small>
                    <p><?= $dataKomentar['isikomentar'] ?></p>
                    <!-- <p><a href="#" class="reply">Reply</a></p> -->
                </div>
            </li>
        <?php
            $i++;
        }
        ?>
    </ul>
<!-- </div> -->

                </li>

                
              <!-- END comment-list -->

              
            </div>

          </div>
          <div class="col-md-4 sidebar sidbar">
            <div class="sidebar-box">
           
            <div class="sidebar-box">
              <!-- <img src="assets/img/person_1.jpg" alt="Image placeholder" class="img-fluid mb-4"> -->
              <h3> Uploader</h3>
              <!-- <p>Judul : <?=$dataFoto['judulfoto']?></p>
              <p>Deskripsi : <?=$dataFoto['deskripsifoto']?></p> -->
              <p>Nama : <?=$dataFoto['namalengkap']?></p>
              <!-- <p>Nama :</p> -->
              <!-- <p>Nama :</p> -->
              <!-- <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ducimus itaque, autem necessitatibus voluptate quod mollitia delectus aut, sunt placeat nam vero culpa sapiente consectetur similique, inventore eos fugit cupiditate numquam!</p> -->
              <!-- <p><a href="#" class="btn btn-primary btn-sm">Read More</a></p> -->
              <!-- <form action="tambah_komentar.php" method="post">
        <table>
            <input type="hidden" name="fotoid" value="<?= $dataFoto['fotoid'] ?>">
            <tr>
                <td>Komentar</td>
                <td><input type="text" name="isikomentar" required></td>
            </tr>
            <tr>
                <td></td>
                <td><input type="submit" class="" value="Tambah"></td>
            </tr>
        </table>
    </form> -->
            </div>

            
          </div>
        </div>
      </div>
    </section>

<!-- Tambah Komentar Modal -->
<div class="modal fade" id="tambahKomentarModal" tabindex="-1" aria-labelledby="tambahKomentarModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="tambahKomentarModalLabel">Tambah Komentar</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <!-- Form untuk menambah komentar -->
                <form method="post" action="tambah_komentar.php">
                    <!-- Hidden input untuk menyimpan fotoid -->
                    <input type="hidden" name="fotoid" value="<?= $dataFoto['fotoid'] ?>">

                    <!-- Isian komentar -->
                    <div class="mb-3">
                        <label for="isikomentar" class="form-label">Isi Komentar:</label>
                        <textarea class="form-control" name="isikomentar" id="isikomentar" rows="4" required></textarea>
                    </div>

                    <!-- Tombol Simpan -->
                    <div class="text-end">
                        <button type="submit" class="btn btn-primary">Simpan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>


  </main><!-- End #main -->
  <hr>

  <!-- ======= Footer ======= -->
  <footer class="footer" role="contentinfo">
    <div class="container">
      <div class="row">
        <div class="col-md-4 mb-4 mb-md-0">
          <h3>About Gallery</h3>
          <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Eius ea delectus pariatur, numquam aperiam
            dolore nam optio dolorem facilis itaque voluptatum recusandae deleniti minus animi.</p>
          <p class="social">
            <a href="#"><span class="bi bi-twitter"></span></a>
            <a href="#"><span class="bi bi-facebook"></span></a>
            <a href="#"><span class="bi bi-instagram"></span></a>
            <a href="#"><span class="bi bi-linkedin"></span></a>
          </p>
        </div>
        <div class="col-md-7 ms-auto">
          <div class="row site-section pt-0">
            <div class="col-md-4 mb-4 mb-md-0">
              <h3>Navigation</h3>
              <ul class="list-unstyled">
                <li><a href="#">Pricing</a></li>
                <li><a href="#">Features</a></li>
                <li><a href="#">Blog</a></li>
                <li><a href="#">Contact</a></li>
              </ul>
            </div>
            <div class="col-md-4 mb-4 mb-md-0">
              <h3>Services</h3>
              <ul class="list-unstyled">
                <li><a href="#">Team</a></li>
                <li><a href="#">Collaboration</a></li>
                <li><a href="#">Todos</a></li>
                <li><a href="#">Events</a></li>
              </ul>
            </div>
            <div class="col-md-4 mb-4 mb-md-0">
              <h3>Downloads</h3>
              <ul class="list-unstyled">
                <li><a href="#">Get from the App Store</a></li>
                <li><a href="#">Get from the Play Store</a></li>
              </ul>
            </div>
          </div>
        </div>
      </div>

      <div class="row justify-content-center text-center">
        <div class="col-md-7">
          <p class="copyright">&copy; Copyright AMIRULLAH 2024. All Rights Reserved</p>
          <div class="credits">
            <!--
            All the links in the footer should remain intact.
            You can delete the links only if you purchased the pro version.
            Licensing information: https://bootstrapmade.com/license/
            Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/buy/?theme=SoftLand
          -->
            Designed by <a href="#">AMIRULLAH</a>
          </div>
        </div>
      </div>

    </div>
  </footer>

  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Vendor JS Files -->
  <script src="assets/vendor/aos/aos.js"></script>
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assets/vendor/swiper/swiper-bundle.min.js"></script>
  <script src="assets/vendor/php-email-form/validate.js"></script>

  <!-- Template Main JS File -->
  <script src="assets/js/main.js"></script>
  

</body>

</html>