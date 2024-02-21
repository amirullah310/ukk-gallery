
<?php
session_start();
if(!isset($_SESSION['userid'])) {
    header("location:login.php");
    
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
 <link href="assets/img/favicon.png" rel="icon"> 
  <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Roboto:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="assets/vendor/aos/aos.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="...">

  <!-- Template Main CSS File -->
  <link href="assets/css/style.css" rel="stylesheet">
  <!-- Include Bootstrap Icons CSS -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.17.0/font/bootstrap-icons.css" rel="stylesheet">


  <!-- =======================================================
  * Template Name: SoftLand
  * Updated: Jan 09 2024 with Bootstrap v5.3.2
  * Template URL: https://bootstrapmade.com/softland-bootstrap-app-landing-page-template/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>
<style>

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
          <li><a class="active" href="album.php">Album</a></li>
          <li><a href="saran.php">Kritik dan Saran</a></li>
          <li><a href="contact.php">Contact Us</a></li>
      <li><a href="logout.php">Logout</a></li>

        </ul>
        <i class="bi bi-list mobile-nav-toggle"></i>
      </nav><!-- .navbar -->

    </div>
  </header><!-- End Header -->

  <main id="main">

    <!-- ======= Blog Section ======= -->
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
              <div class="col-md-7 text-center hero-text">
                <h1 data-aos="fade-up" data-aos-delay="">Album</h1>
                <p class="mb-5" data-aos="fade-up" data-aos-delay="100">Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>
              </div>
            </div>
          </div>
        </div>
      </div>

    </section>
  <!-- Favicons -->
  
    
  <body>
    <div class="py-5">
        <div class="container">
        <a class="btn btn-secondary mb-5" href="albumm.php">Tambah</a>

            <div class="row">
                <?php
                include 'koneksi.php';
                $userid = $_SESSION['userid'];
                $sql = mysqli_query($conn, "SELECT * FROM album where userid='$userid'");
                while ($data = mysqli_fetch_array($sql)) {
                    ?>
                    <div class="col-md-4">
                        <div class="card mb-4">
                            <div class="card-block p-4">
                                <h4 class="card-title"><?= $data['namaalbum'] ?></h4>
                                <h6 class="card-subtitle text-muted"><?= $data['tanggaldibuat'] ?></h6>
                                <p class="card-text p-y-1"><?= $data['deskripsi'] ?></p>
                                <a href="album_detail.php?albumid=<?= $data['albumid'] ?>" class="btn btn-primary">Detail</a>
                                <!-- Tambahkan tombol Hapus dan Edit -->
                                <a href="#" class="btn btn-primary editAlbumBtn" data-toggle="modal" data-target="#editAlbumModal" data-albumid="<?= $data['albumid'] ?>" data-albumname="<?= $data['namaalbum'] ?>" data-albumdescription="<?= $data['deskripsi'] ?>">Edit</a>

                                <a href="hapus_album.php?albumid=<?= $data['albumid'] ?>" class="btn btn-primary" onclick="return confirm('Anda yakin ingin menghapus album ini?')">Hapus</a>
                            </div>
                        </div>
                    </div>
                <?php
                }
                ?>
            </div>
        </div>
    </div>
   <!-- Modal for Editing Album -->
<div class="modal fade" id="editAlbumModal" tabindex="-1" aria-labelledby="editAlbumModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editAlbumModalLabel">Edit Album</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <!-- Form for Editing Album -->
                <form action="proses_edit_album.php" method="post">
                    <!-- Include necessary input fields (albumid, namaalbum, deskripsi, etc.) -->
                    <input type="hidden" id="editAlbumId" name="albumid" value="">
                    <!-- Adjust input names according to your proes_edit_album.php -->
                    <div class="mb-3">
                        <label for="editAlbumName" class="form-label">Album Name:</label>
                        <input type="text" class="form-control" id="editAlbumName" name="namaalbum" required>
                    </div>
                    <div class="mb-3">
                        <label for="editAlbumDescription" class="form-label">Album Description:</label>
                        <textarea class="form-control" id="editAlbumDescription" name="deskripsi" rows="3"></textarea>
                    </div>
                    <!-- Add other fields as needed -->
                    <button type="submit" class="btn btn-primary">Save Changes</button>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- JavaScript to handle opening modal and setting values -->
<script>
    document.addEventListener('DOMContentLoaded', function () {
        var editAlbumModal = new bootstrap.Modal(document.getElementById('editAlbumModal'));

        // Handle the click event for the "Edit" button
        var editAlbumBtns = document.querySelectorAll('.editAlbumBtn');
        editAlbumBtns.forEach(function (btn) {
            btn.addEventListener('click', function () {
                var albumId = this.getAttribute('data-albumid');
                var albumName = this.getAttribute('data-albumname');
                var albumDescription = this.getAttribute('data-albumdescription');

                // Set values in the modal form
                document.getElementById('editAlbumId').value = albumId;
                document.getElementById('editAlbumName').value = albumName;
                document.getElementById('editAlbumDescription').value = albumDescription;

                // Open the modal
                editAlbumModal.show();
            });
        });
    });
</script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="..."></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js" integrity="..."></script>
    <script src="https://code.jquery.com/jquery-3.1.1.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/tether/1.4.0/js/tether.min.js"></script>
    <script src="https://pingendo.com/assets/bootstrap/bootstrap-4.0.0-alpha.6.min.js"></script>
</body>




  </main><!-- End #main -->

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