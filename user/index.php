<?php
session_start();
include 'koneksi.php';

// Proses pencarian
$sqlCari = "SELECT * FROM foto, user WHERE foto.userid = user.userid";

// Filter pencarian berdasarkan judul foto
if (isset($_GET['cariJudul'])) {
    $cariJudul = mysqli_real_escape_string($conn, $_GET['cariJudul']);
    $sqlCari .= " AND foto.judulfoto LIKE '%$cariJudul%'";
}

// Filter pencarian berdasarkan tanggal unggah
if (!empty($_GET['tanggalUpload'])) {
    $tanggalUpload = mysqli_real_escape_string($conn, $_GET['tanggalUpload']);
    $sqlCari .= " AND DATE(foto.tanggalunggah) = '$tanggalUpload'";
}

// Urutan penyortiran berdasarkan jumlah like
$sortingOrder = isset($_GET['sortingOrder']) ? $_GET['sortingOrder'] : 'DESC';
// $sqlCari .= " ORDER BY (SELECT COUNT(*) FROM likefoto WHERE likefoto.fotoid = foto.fotoid) $sortingOrder ";

$resultCari = mysqli_query($conn, $sqlCari);
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
  <style>
  .custom-image {
    border: 1px solid skyblue;
    object-fit: cover;
    box-shadow: 2px 2px 2px skyblue;
    /* border: 1px solid gray; */
    width: 400px; /* Menyesuaikan lebar gambar dengan container */
    height: 400px; /* Mengatur tinggi gambar agar tetap proporsional */
  }
  @import url(https://fonts.googleapis.com/css?family=Roboto:400,100,900);

html,
body {
  -moz-box-sizing: border-box;
       box-sizing: border-box;
  height: 100%;
  width: 100%; 
  background: #FFF;
  font-family: 'Roboto', sans-serif;
  font-weight: 400;
}
 
.wrapper {
  display: table;
  height: 100%;
  width: 100%;
}

.container-fostrap {
  display: table-cell;
  padding: 1em;
  text-align: center;
  vertical-align: middle;
}
.fostrap-logo {
  width: 100px;
  margin-bottom:15px
}
h1.heading {
  color: #fff;
  font-size: 1.15em;
  font-weight: 900;
  margin: 0 0 0.5em;
  color: #505050;
}
@media (min-width: 450px) {
  h1.heading {
    font-size: 3.55em;
  }
  /* .carddd{
    width: 100%;
  } */

}
@media (min-width: 760px) {
  h1.heading {
    font-size: 3.05em;
  }
 /* .carddd{
    width: 50%;
  } */
}

@media (min-width: 900px) {
  h1.heading {
    font-size: 3.25em;
    margin: 0 0 0.3em;
    
  }
 
} 
.card {
  display: block; 
    margin-bottom: 20px;
    line-height: 1.42857143;
    background-color: #fff;
    border-radius: 2px;
    box-shadow: 0 2px 5px 0 rgba(0,0,0,0.16),0 2px 10px 0 rgba(0,0,0,0.12); 
    transition: box-shadow .25s; 
}
.card:hover {
  box-shadow: 0 8px 17px 0 rgba(0,0,0,0.2),0 6px 20px 0 rgba(0,0,0,0.19);
}
.img-card {
  box-sizing: border-box;
  width: 100%;
  height:300px;
  border-top-left-radius:2px;
  border-top-right-radius:2px;
  display:block;
    overflow: hidden;
}
.img-card img{
  width: 100%;
  height: 300px;
  object-fit:cover; 
  transition: all .25s ease;
} 
.card-content {
  padding-left:15px;
  padding-right:15px;
  padding-top:15px;
  text-align:left;
}
.card-title {
  margin-top:0px;
  font-weight: 700;
  font-size: 1.65em;
}
.card-title a {
  color: #000;
  text-decoration: none !important;
}
.card-read-more {
  border-top: 1px solid #D4D4D4;
}
.card-read-more a {
  text-decoration: none !important;
  padding:10px;
  font-weight:600;
  text-transform: uppercase
}
.fotoo{
  text-transform: uppercase

}
.likee{
  position: relative;
  margin-top: -70px;
}
.tanggal{
  /* display: flex; */
  /* justify-content: end; */
  margin-left: 150px;
  float: right;
  margin-top: 15px;
  color: grey;
  opacity: 50%;
}
.jmllike , .jmlkomen{
  margin-left: -20px;
  color: blue;
  margin-top: 15px;
}
.download{
  display: flex;
  justify-content: end;
  align-items: end;
  float: right;
  /* margin-left: 200px; */
}
/* Gaya default untuk ikon hati */


</style>
<body>

  <!-- ======= Header ======= -->
  <header id="header" class="fixed-top d-flex align-items-center">
    <div class="container d-flex justify-content-between align-items-center">

      <div class="logo">
        <h1><a href="index.php">GALLERY</a></h1>
        <!-- Uncomment below if you prefer to use an image logo -->
        <!-- <a href="index.html"><img src="assets/img/logo.png" alt="" class="img-fluid"></a>-->
      </div>

      <nav id="navbar" class="navbar">
        <ul>
        <?php
            if (!isset($_SESSION['userid'])) {
            ?>
                <li><a href="register.php">Register</a></li>
                <li><a href="login.php">Login</a></li>
            <?php
            } else {
            ?>
          <li><a class="active " href="index.php">Home</a></li>
          <li><a href="profile.php">Profile</a></li>
          <li><a href="album.php">Album</a></li>
        
      <li><a href="saran.php">Kritik dan Saran</a></li>
      <li><a href="contact.php">Contact Us</a></li>
      <li><a href="logout.php">Logout</a></li>
      <?php
            }
            ?>
    </ul>
        <i class="bi bi-list mobile-nav-toggle"></i>
      </nav><!-- .navbar -->

    </div>
  </header><!-- End Header -->

  <!-- ======= Hero Section ======= -->
  <section class="hero-section" id="hero">

    <div class="wave">

      <svg width="100%" height="355px" viewBox="0 0 1920 355" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
        <g id="Page-1" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
          <g id="Apple-TV" transform="translate(0.000000, -402.000000)" fill="#FFFFFF">
            <path d="M0,439.134243 C175.04074,464.89273 327.944386,477.771974 458.710937,477.771974 C654.860765,477.771974 870.645295,442.632362 1205.9828,410.192501 C1429.54114,388.565926 1667.54687,411.092417 1920,477.771974 L1920,757 L1017.15166,757 L0,757 L0,439.134243 Z" id="Path"></path>
          </g>
        </g>
      </svg>

    </div>

    <div class="container">
      <div class="row align-items-center">
        <div class="col-12 hero-text-image">
          <div class="row">
            <div class="col-lg-8 text-center text-lg-start">
              <h1 data-aos="fade-right">Create And Save Your Favorite Picture</h1>
              <p class="mb-5" data-aos="fade-right" data-aos-delay="100">Lorem ipsum dolor sit amet, consectetur
                adipisicing elit.</p>
              <p data-aos="fade-right" data-aos-delay="200" data-aos-offset="-500"><a href="#fotoo" class="btn btn-outline-white">Get started</a></p>
            </div>
            <div class="col-lg-4 iphone-wrap">
              <!-- <img src="assets/img/phone_1.png" alt="Image" class="phone-1" data-aos="fade-right">
              <img src="assets/img/phone_2.png" alt="Image" class="phone-2" data-aos="fade-right" data-aos-delay="200"> -->
            </div>
          </div>
        </div>
      </div>
    </div>

  </section><!-- End Hero -->
  

  <main id="main">

   
    
    <section class="section" id="fotoo">
      
      <!-- <div class="container"> -->
        <div class="row justify-content-center text-center ">
          <div class="col-md-5" data-aos="fade-up">
          <?php
            if (!isset($_SESSION['userid'])) {
            ?>
                <h2 class="section-heading fotoo  ">WELCOME USER</h2>
            <?php
            } else {
            ?>
            <h2 class="section-heading fotoo  ">WELCOME <?=$_SESSION['namalengkap']?></h2>
            <?php
            
            }
            ?>
          </div>
        <!-- </div> -->
       

    </section>
    <section class="wrapper mt-5 mb-5" id="">
    <div class="container-fostrap">
    
        <div class="content">
            <div class="container">
                <div class="row">
                <?php
      // Fetch and display data
      include 'koneksi.php';
      while ($data = mysqli_fetch_array($resultCari)) {
        $fotoid = $data['fotoid'];
        # code...
      ?>
                    <div class="col-xs-12 col-sm-4 ">
                        <div class="card carddd">
                            <a href="../gambar/<?=$data['lokasifile']?> " class="img-card">
                            <img src="../gambar/<?=$data['lokasifile']?>" />
                          </a>
                            <!-- <div class="card-content">
                                <h4 class="card-title">
                                    <a href="#"> 
                                    <?=$data['judulfoto']; ?>
                                  </a>
                                </h4>
                                <p class="">
                                BY : <strong><?=$data['namalengkap']; ?></strong> <br/>
                                <?=$data['tanggalunggah']; ?> <br/>
                                <a href="#" class="btn btn-link likee" style="margin-left :250px;">
                                  <i class="bi bi-heart"></i> Like
                                </a>
                
                                </p>
              
                            </div> -->
                            <div class="card-read-more d-flex justify-content-start">
                              <?php
                            $sql2 = mysqli_query($conn, "SELECT * FROM likefoto WHERE fotoid='$fotoid'");
                            $dataa= mysqli_num_rows($sql2);
                            ?>
                     <a href="like.php?fotoid=<?= $fotoid ?>" class="btn btn-link">
            <i class="bi bi-heart d-flex mt-1"></i>
          </a>

<script>
    function changeColor(element, fotoid) {
        var heartIcon = document.getElementById('heartIcon' + fotoid);
        if (heartIcon.style.color !== 'red') {
            heartIcon.style.color = 'red';
        } else {
            element.onclick = null; // Menonaktifkan fungsi klik setelah diklik
        }
    }
</script>

                                  <p class="jmllike"> <?=$dataa?>  </p>
                            <a href="komentar.php?fotoid=<?= $fotoid ?>" class="btn btn-link" >
                                  <i class="bi bi-chat"></i> 
                                </a>
                                <p class="jmlkomen">  <?php
                            $sqlKomentar = mysqli_query($conn, "SELECT COUNT(*) AS jumlah FROM komentarfoto WHERE fotoid='$fotoid'");
                            $jumlahKomentar = mysqli_fetch_assoc($sqlKomentar)['jumlah'];
                            echo $jumlahKomentar;
                            ?></p>
                            <a href="download.php?fotoid=<?= $fotoid ?>" class="btn btn-link download" onclick="return confirmDownload();">
    <i class="bi bi-download"></i> 
</a>
                                <!-- <p class="tanggal"><?=$data['tanggalunggah']; ?></p> -->
                            </div>
                        </div>
                    </div>
                    <?php
      }
                    ?>
                   
                  
                  
                </div>
            </div>
        </div>
    </div>
</section>


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
  <script>
    function confirmDownload() {
        var konfirmasi = confirm("Yakin ingin mendownload file?");
        return konfirmasi;
    }
    
</script>
</body>

</html>