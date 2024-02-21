<?php
// Start session
include 'koneksi.php';
session_start();
if (!isset($_SESSION['userid'])) {
    header("location:login.php");
}


// Fetch user data from the database
$userid = $_SESSION['userid'];
$sql = "SELECT * FROM user WHERE userid = $userid";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    $userData = $result->fetch_assoc();
} else {
    echo "User not found!";
    exit();
}
// Proses pencarian
$sql = "SELECT foto.*, album.namaalbum, COUNT(likefoto.fotoid) AS jumlah_like
        FROM foto
        LEFT JOIN album ON foto.albumid = album.albumid
        LEFT JOIN likefoto ON foto.fotoid = likefoto.fotoid
        WHERE foto.userid = '$userid'
        GROUP BY foto.fotoid, album.albumid";

$result = mysqli_query($conn, $sql);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>Amir Gallery - Profile</title>
    <!-- Add your stylesheets and other meta tags here -->

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

    <!-- Vendor CSS Files -->
    <link href="assets/vendor/aos/aos.css" rel="stylesheet">
    <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
    <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
    <link href="assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">
    <!-- Bootstrap CSS -->
<!-- <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous"> -->

<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-mCfRToJ9GO75GX6rWl7JJKqR8zDltkk8hFWE9Y8RYBmx4cHaQxqW8HLEa2pMBoyC" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

    <!-- Template Main CSS File -->
    <link href="assets/css/style.css" rel="stylesheet">
</head>
<style>
      #tambahFotoModal .modal-dialog {
      max-width: 600px;
    }

    #tambahFotoModal .modal-content {
      padding: 20px;
    }

    /* Optional: Style untuk memberi highlight pada input yang aktif */
    .form-control:focus {
      border-color: #007bff;
      box-shadow: 0 0 0 0.2rem rgba(0, 123, 255, 0.25);
    }
  .pdg{
    padding: 0 200px;
  }
  .emp-profile{
    padding: 3%;
    margin-top: 3%;
    margin-bottom: 3%;
    border-radius: 0.5rem;
    background: #fff;
}
.profile-img{
    text-align: center;
}
.profile-img img {
        max-width: 100%;
        height: auto;
        border-radius: 50%;
    }

    .profile-head {
        margin-top: 20px;
    }

    .ww {
        margin-top: 20px;
    }

    .modal-body label {
        font-weight: bold;
    }
.profile-img img{
    width: 70%;
    height: 100%;
}
.profile-img .file {
    position: relative;
    overflow: hidden;
    margin-top: -20%;
    width: 70%;
    border: none;
    border-radius: 0;
    font-size: 15px;
    background: #212529b8;
}
.profile-img .file input {
    position: absolute;
    opacity: 0;
    right: 0;
    top: 0;
}
.profile-head h5{
    color: #333;
}
.profile-head h6{
    color: #0062cc;
}
.profile-edit-btn{
    border: none;
    /* border-radius: 1.5rem; */
    width: 70%;
    padding: 2%;
    font-weight: 600;
    color: #6c757d;
    cursor: pointer;
}
.proile-rating{
    font-size: 12px;
    color: #818182;
    margin-top: 5%;
}
.proile-rating span{
    color: #495057;
    font-size: 15px;
    font-weight: 600;
}
.profile-head .nav-tabs{
    margin-bottom:5%;
}
.profile-head .nav-tabs .nav-link{
    font-weight:600;
    border: none;
}
.profile-head .nav-tabs .nav-link.active{
    border: none;
    border-bottom:2px solid #0062cc;
}
.profile-work{
    padding: 14%;
    margin-top: -15%;
}
.profile-work p{
    font-size: 12px;
    color: #818182;
    font-weight: 600;
    margin-top: 10%;
}
.profile-work a{
    text-decoration: none;
    color: #495057;
    font-weight: 600;
    font-size: 14px;
}
.profile-work ul{
    list-style: none;
}
.profile-tab label{
    font-weight: 600;
}
.profile-tab p{
    font-weight: 600;
    /* color: #0062cc; */
}
.wkwkwk{
  margin-top: -40px;
}
.namaa{
  text-transform: uppercase;
}
.www{
  margin-top: -50px;
}
.ww{
  margin-top: -35px;
}

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
.muhe{
  margin-right: 20px;
}
@media( max-width : 768px) {

.huhu {
  position: relative;
top: -80px;
width: 120px;
float: right;
  
}
  
}
.rrq{
  padding: 50px;
  /* background: black; */
}

</style>
<body>

    <!-- Header -->
    <header id="header" class="fixed-top d-flex align-items-center">
        <!-- Your header content here -->
        <div class="container d-flex justify-content-between align-items-center">

<div class="logo">
  <h1><a href="index.php">GALLERY</a></h1>
  <!-- Uncomment below if you prefer to use an image logo -->
  <!-- <a href="index.php"><img src="assets/img/logo.png" alt="" class="img-fluid"></a>-->
</div>

<nav id="navbar" class="navbar">
  <ul>
    <li><a class="" href="index.php">Home</a></li>
    <li><a class="active" href="profile.php">Profile</a></li>
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
        <!-- Profile Section -->
        <section class="hero-section inner-page">
            <div class="wave">
            <svg width="1920px" height="265px" viewBox="0 0 1920 265" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
          <g id="Page-1" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
            <g id="Apple-TV" transform="translate(0.000000, -402.000000)" fill="#FFFFFF">
              <path d="M0,439.134243 C175.04074,464.89273 327.944386,477.771974 458.710937,477.771974 C654.860765,477.771974 870.645295,442.632362 1205.9828,410.192501 C1429.54114,388.565926 1667.54687,411.092417 1920,477.771974 L1920,667 L1017.15166,667 L0,667 L0,439.134243 Z" id="Path"></path>
            </g>
          </g>
        </svg>
                <!-- Your wave SVG content here -->
            </div>
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-12">
                        <div class="row justify-content-center">
                            <div class="col-md-7 text-center hero-text">
                                <h1 data-aos="fade-up" data-aos-delay=""> Profile</h1>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

       <!-- User Data Section -->
       <!-- <section class="section">
            <div class="container">
                <div class="row align-items-center justify-content-center pdg">
                    <div class="col-md-4" data-aos="fade-right">
                        <span class="bi bi-person-circle" style="font-size: 10rem;"></span>
                    </div>
                    <div class="col-md-8">
                        <div class="card">
                            <div class="card-body">
                                <h2 class="mb-4">Profile Information</h2>
                                <p class="card-text"><strong>User ID:</strong> <?= $userData['userid'] ?></p>
                                <p class="card-text"><strong>Username:</strong> <?= $userData['username'] ?></p>
                                <p class="card-text"><strong>Password:</strong> <?= $userData['password'] ?></p>
                                <p class="card-text"><strong>Alamat:</strong> <?= $userData['alamat'] ?></p>
                                <p class="card-text"><strong>Email:</strong> <?= $userData['email'] ?></p>
                                <p class="card-text"><strong>Nama Lengkap:</strong> <?= $userData['namalengkap'] ?></p> -->
                                 <!-- Button to trigger modal -->
                        <!-- <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#editProfileModal">
                            Edit Profile
                        </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section> -->
        <div class="container emp-profile rrq">
            <form method="post">
                <div class="row">
                    <div class="col-md-4">
                        <div class="profile-img wkwkwk">
                            <img src="img/userrrr.svg" alt=""/>
                            <!-- <div class="file btn btn-lg btn-primary">
                                Change Photo
                                <input type="file" name="file"/>
                            </div> -->
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="profile-head">
                                    <h5 class="namaa">
                                    <?= $userData['namalengkap'] ?>
                                    </h5>
                                    <h6>
                                        Pengguna
                                    </h6>
                                    <p class="proile-rating"> <span><br></span></p>
                            <ul class="nav nav-tabs ww" id="myTab" role="tablist">
                                <li class="nav-item">
                                    <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">About</a>
                                </li>
                                <!-- <li class="nav-item">
                                    <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false">Timeline</a>
                                </li> -->
                            </ul>
                        </div>
                    </div>
                    <div class="col-md-2">
                    <button type="button" class=" profile-edit-btn huhu" data-bs-toggle="modal" data-bs-target="#editProfileModal">
                            Edit Profile
                        </button>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-4">
                        <!-- <div class="profile-work">
                            <p>WORK LINK</p>
                            <a href="">Website Link</a><br/>
                            <a href="">Bootsnipp Profile</a><br/>
                            <a href="">Bootply Profile</a>
                            <p>SKILLS</p>
                            <a href="">Web Designer</a><br/>
                            <a href="">Web Developer</a><br/>
                            <a href="">WordPress</a><br/>
                            <a href="">WooCommerce</a><br/>
                            <a href="">PHP, .Net</a><br/>
                        </div> -->
                    </div>
                    <div class="col-md-8 www">
                        <div class="tab-content profile-tab" id="myTabContent">
                            <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                                        <!-- <div class="row">
                                            <div class="col-md-6">
                                                <label>User Id</label>
                                            </div>
                                            <div class="col-md-6">
                                                <p>Kshiti123</p>
                                            </div>
                                        </div> -->
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label>Nama Lengkap</label>
                                            </div>
                                            <div class="col-md-6">
                                              <p>: <?= $userData['namalengkap'] ?></p>
                                            </div>
                                          </div>
                                          <div class="row">
                                              <div class="col-md-6">
                                                  <label>Username</label>
                                              </div>
                                              <div class="col-md-6">
                                                  <p>: <?= $userData['username'] ?></p>
                                              </div>
                                          </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label>Password</label>
                                            </div>
                                            <div class="col-md-6">
                                                <p>: <?= $userData['password'] ?></p>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label>Email</label>
                                            </div>
                                            <div class="col-md-6">
                                                <p>: <?= $userData['email'] ?></p>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label>Alamat</label>
                                            </div>
                                            <div class="col-md-6">
                                                <p>: <?= $userData['alamat'] ?></p>
                                            </div>
                                        </div>
                            </div>
                            <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label>Experience</label>
                                            </div>
                                            <div class="col-md-6">
                                                <p>Expert</p>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label>Hourly Rate</label>
                                            </div>
                                            <div class="col-md-6">
                                                <p>10$/hr</p>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label>Total Projects</label>
                                            </div>
                                            <div class="col-md-6">
                                                <p>230</p>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label>English Level</label>
                                            </div>
                                            <div class="col-md-6">
                                                <p>Expert</p>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label>Availability</label>
                                            </div>
                                            <div class="col-md-6">
                                                <p>6 months</p>
                                            </div>
                                        </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <label>Your Bio</label><br/>
                                        <p>Your detail description</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </form>           
        </div>
     <hr>   
<!-- Edit Profile Modal -->
<div class="modal fade" id="editProfileModal" tabindex="-1" aria-labelledby="editProfileModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editProfileModalLabel">Edit Profile</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <!-- Form to edit profile -->
                <form method="post" action="edit_profile.php" onsubmit="return confirmEdit()">
                    <!-- Existing form fields -->
                    <div class="mb-3">
                        <label for="newUsername" class="form-label">Username Baru:</label>
                        <input type="text" class="form-control" name="newUsername" id="newUsername" value="<?= $userData['username'] ?>" required>
                    </div>

                    <!-- Password input with show/hide functionality -->
                    <div class="mb-3">
                        <label for="newPassword" class="form-label">Password Baru:</label>
                        <div class="input-group">
                            <input type="password" class="form-control" name="newPassword" id="newPassword" value="<?= $userData['password'] ?>" required>
                            <button class="btn btn-outline-secondary" type="button" id="showPasswordToggle" onclick="togglePassword()">Show</button>
                        </div>
                    </div>

                    <div class="mb-3">
                        <label for="newAlamat" class="form-label">Alamat Baru:</label>
                        <input type="text" class="form-control" name="newAlamat" id="newAlamat" value="<?= $userData['alamat'] ?>" required>
                    </div>

                    <div class="mb-3">
                        <label for="newEmail" class="form-label">Email Baru:</label>
                        <input type="email" class="form-control" name="newEmail" id="newEmail" value="<?= $userData['email'] ?>" required>
                    </div>

                    <div class="mb-3">
                        <label for="newNamalengkap" class="form-label">Nama Lengkap Baru:</label>
                        <input type="text" class="form-control" name="newNamalengkap" id="newNamalengkap" value="<?= $userData['namalengkap'] ?>" required>
                    </div>

                    <div class="text-end">
                        <button type="submit" class="btn btn-primary">Simpan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>




<!-- <hr> -->
    </main>
    <!-- Tombol untuk menampilkan modal -->
    <div class="container mb-5">
        <!-- <hr> -->

        <button type="button" class="btn btn-primary float-right mb-3" data-toggle="modal" data-target="#tambahFotoModal">
            Tambah Foto
        </button>
    </div>

<!-- Pop-up modal -->
<div class="modal fade" id="tambahFotoModal" tabindex="-1" role="dialog" aria-labelledby="tambahFotoModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="tambahFotoModalLabel">Tambah Foto</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <!-- Form untuk menambahkan foto -->
        <form action="tambah_foto.php" method="post" enctype="multipart/form-data" id="tambahFotoForm">
          <div class="form-group mb-3">
            <label for="judulfoto">Judul Foto</label>
            <input type="text" class="form-control" id="judulfoto" name="judulfoto" required>
          </div>
          <div class="form-group mb-3">
            <label for="deskripsifoto">Deskripsi Foto</label>
            <input type="text" class="form-control" id="deskripsifoto" name="deskripsifoto" required>
          </div>
          <div class="form-group mb-3">
            <label for="lokasifile">Pilih Foto</label>
            <input type="file" class="form-control-file" id="lokasifile" name="lokasifile" required>
          </div>
          <div class="form-group mb-3">
            <label for="albumid">Pilih Album</label>
            <select class="form-control" id="albumid" name="albumid" required>
              <?php
              include 'koneksi.php';
              $userid=$_SESSION['userid'];
              $sql=mysqli_query($conn,"SELECT * from album where userid='$userid'");
              while ($data=mysqli_fetch_array($sql)) {
              ?>
              <option value="<?=$data['albumid']?>"><?=$data['namaalbum']?></option>
              <?php
              }
              ?>
            </select>
          </div>
      </div>
      <div class="modal-footer">
        <button type="submit" class="btn btn-primary">Tambah</button>
        </form>
      </div>
    </div>
  </div>
</div>


    <main id="main">

   
    
    
    <section class="wrapper mt-5 mb-5" id="">
    <div class="container-fostrap">
    
        <div class="content">
            <div class="container">
            <div class="row">
  <?php
    // Fetch and display data
    include 'koneksi.php';
    while ($data = mysqli_fetch_array($result)) {
      $fotoid = $data['fotoid'];
  ?>
    <div class="col-xs-12 col-sm-4">
      <div class="card carddd">
        <a class="img-card">
          <img src="../gambar/<?=$data['lokasifile']?>" />
        </a>

        <div class="card-read-more d-flex justify-content-start">
          <?php
            $sql2 = mysqli_query($conn, "SELECT * FROM likefoto WHERE fotoid='$fotoid'");
            $dataa= mysqli_num_rows($sql2);
          ?>
          <a href="#" class="btn btn-link">
            <i class="bi bi-heart d-flex mt-1"></i>
          </a>
          <p class="jmllike"> <?=$dataa?>  </p>
          <a href="komentar.php?fotoid=<?= $fotoid ?>" class="btn btn-link">
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
        </div>
      </div>
      <div class="d-flex justify-content-start mb-4">
        
      <!-- <a href="#" class="btn btn-warning editFotoBtn muhe" data-toggle="modal" data-target="#editFotoModal" data-fotoid="<?=$fotoid?>">Edit</a> -->


      <a href="edit_foto.php?fotoid=<?= $fotoid ?>" class="btn btn-warning ml-2 muhe" onclick="return confirm('Anda yakin ingin mengedit foto ini?')">edit</a>
        <a href="hapus_foto.php?fotoid=<?= $fotoid ?>" class="btn btn-danger ml-2" onclick="return confirm('Anda yakin ingin menghapus foto ini?')">Hapus</a>
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




<!-- Modal for Editing Photo -->
<div class="modal fade" id="editFotoModal" tabindex="-1" aria-labelledby="editFotoModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editFotoModalLabel">Edit Photo</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <!-- Form for Editing Photo -->
                <form action="update_foto.php" method="post" enctype="multipart/form-data">
                    <!-- Include necessary input fields (fotoid, judulfoto, deskripsifoto, lokasifile, albumid, etc.) -->
                    <input type="hidden" id="editFotoId" name="fotoid" value="">
                    <div class="mb-3">
                        <label for="editJudulFoto" class="form-label">Judul Foto:</label>
                        <input type="text" class="form-control" id="editJudulFoto" name="judulfoto" required>
                    </div>
                    <div class="mb-3">
                        <label for="editDeskripsiFoto" class="form-label">Deskripsi Foto:</label>
                        <textarea class="form-control" id="editDeskripsiFoto" name="deskripsifoto" rows="3"></textarea>
                    </div>
                    <div class="mb-3">
                        <label for="editLokasiFile" class="form-label">Lokasi File:</label>
                        <input type="file" class="form-control" id="editLokasiFile" name="lokasifile">
                    </div>
                    <!-- Add other fields as needed -->
                    <div class="mb-3">
                        <label for="editAlbumId" class="form-label">Pilih Album:</label>
                        <select class="form-control" id="editAlbumId" name="albumid" required>
                            <?php
                            $userid = $_SESSION['userid'];
                            $sql2 = mysqli_query($conn, "SELECT * FROM album WHERE userid='$userid'");
                            while ($data2 = mysqli_fetch_array($sql2)) {
                            ?>
                                <option value="<?= $data2['albumid'] ?>"><?= $data2['namaalbum'] ?></option>
                            <?php
                            }
                            ?>
                        </select>
                    </div>

                    <button type="submit" class="btn btn-primary">Save Changes</button>
                </form>
            </div>
        </div>
    </div>
</div>







  </main><!-- End #main -->
  
  <hr>

    <!-- Footer -->
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
    // Function to toggle password visibility
    function togglePassword() {
        var passwordField = document.getElementById("newPassword");
        var showPasswordToggle = document.getElementById("showPasswordToggle");

        if (passwordField.type === "password") {
            passwordField.type = "text";
            showPasswordToggle.textContent = "Hide";
        } else {
            passwordField.type = "password";
            showPasswordToggle.textContent = "Show";
        }
    }
    function confirmEdit() {
        return confirm("Apakah Anda yakin ingin menyimpan perubahan?");
    }
</script>
<script>
  $(document).ready(function(){
    // Ketika form berhasil di-submit
    $('#tambahFotoForm').submit(function(){
      alert('Data berhasil ditambahkan!');
    });
  });
</script>
<script>
    document.addEventListener('DOMContentLoaded', function () {
        var editFotoModal = new bootstrap.Modal(document.getElementById('editFotoModal'));

        // Handle the click event for the "Edit" button
        var editFotoBtns = document.querySelectorAll('.editFotoBtn');
        editFotoBtns.forEach(function (btn) {
            btn.addEventListener('click', function () {
                var fotoid = this.getAttribute('data-fotoid');
                var judulFoto = this.getAttribute('data-judulfoto');
                var deskripsiFoto = this.getAttribute('data-deskripsifoto');
                var lokasiFile = this.getAttribute('data-lokasifile');
                var albumId = this.getAttribute('data-albumid');

                // Set values in the modal form
                document.getElementById('editFotoid').value = fotoid;
                document.getElementById('editJudulFoto').value = judulFoto;
                document.getElementById('editDeskripsiFoto').value = deskripsiFoto;
                document.getElementById('editLokasiFile').value = lokasiFile;
                document.getElementById('editAlbumId').value = albumId;

                // Open the modal
                editFotoModal.show();
            });
        });
    });
</script>





<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-mCfRToJ9GO75GX6rWl7JJKqR8zDltkk8hFWE9Y8RYBmx4cHaQxqW8HLEa2pMBoyC" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>



</body>

</html>
