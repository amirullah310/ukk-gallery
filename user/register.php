<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <title>Register</title>
  <!-- <link href="asset/img/favicon.png" rel="icon"> -->
  <link href="asset/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.gstatic.com" rel="preconnect">
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="asset/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="asset/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="asset/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="asset/vendor/quill/quill.snow.css" rel="stylesheet">
  <link href="asset/vendor/quill/quill.bubble.css" rel="stylesheet">
  <link href="asset/vendor/remixicon/remixicon.css" rel="stylesheet">
  <link href="asset/vendor/simple-datatables/style.css" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="asset/css/style.css" rel="stylesheet">
  <!-- Tambahan tag meta, stylesheets, dan scripts... -->
</head>

<body>
  <main>
    <div class="container">
      <section class="section register min-vh-100 d-flex flex-column align-items-center justify-content-center py-4">
        <div class="container">
          <div class="row justify-content-center">
            <div class="col-lg-4 col-md-6 d-flex flex-column align-items-center justify-content-center">

              <div class="card mb-3">
                <div class="card-body">

                  <div class="pt-4 pb-2">
                    <h5 class="card-title text-center pb-0 fs-4">Register</h5>
                    <p class="text-center small">Silahkan registrasi terlebih dahulu</p>
                  </div>

                  <?php
                     if (isset($_SESSION['registration_success']) && isset($_SESSION['registration_flag'])) {
                        // Munculkan alert menggunakan JavaScript
                        echo '<script>alert("' . $_SESSION['registration_success'] . '");</script>';
                        // Hapus flag dan sesi
                        unset($_SESSION['registration_flag']);
                        unset($_SESSION['registration_success']);
                        // Redirect ke halaman login.php setelah menutup alert
                        echo '<script>window.location.href = "login.php";</script>';
                    } elseif (isset($_SESSION['registration_error'])) {
                        echo '<div class="alert alert-danger" role="alert">' . $_SESSION['registration_error'] . '</div>';
                        unset($_SESSION['registration_error']);
                    }
                  ?>

                  <form action="proses_register.php" method="post" class="row g-3 needs-validation" novalidate>
                    <div class="col-12">
                      <label for="yourUsername" class="form-label">Username</label>
                      <input type="text" name="username" class="form-control" id="yourUsername" required>
                      <div class="invalid-feedback">Silakan masukkan username Anda.</div>
                    </div>

                    <div class="col-12">
                      <label for="yourPassword" class="form-label">Password</label>
                      <div class="input-group">
                        <input type="password" name="password" class="form-control" id="yourPassword" required>
                        <button class="btn btn-outline-secondary" type="button" onclick="togglePassword()">Tampilkan</button>
                        <div class="input-group-append">
                          </div>
                        </div>
                        <div class="invalid-feedback">Silakan masukkan password Anda!</div>
                      </div>

                      <div class="col-12">
                      <label for="yourUsername" class="form-label">Email</label>
                      <input type="email" name="email" class="form-control" id="yourUsername" required>
                      <div class="invalid-feedback">Silakan masukkan email Anda.</div>
                    </div>

                    <div class="col-12">
                      <label for="yourUsername" class="form-label">Nama Lengkap</label>
                      <input type="text" name="namalengkap" class="form-control" id="yourUsername" required>
                      <div class="invalid-feedback">Silakan masukkan nama lengkap Anda.</div>
                    </div>

                    <div class="col-12">
                      <label for="yourUsername" class="form-label">Alamat</label>
                      <input type="text" name="alamat" class="form-control" id="yourUsername" required>
                      <div class="invalid-feedback">Silakan masukkan alamat Anda.</div>
                    </div>

                    <div class="col-12">
                      <button class="btn btn-primary w-100" type="submit">Register</button>
                    </div>
                    <div class="col-12">
                      <p class="small mb-0">Sudah punya akun? <a href="login.php">Login disini</a></p>
                    </div>
                  </form>
                </div>
              </div>

            </div>
          </div>
        </div>
      </section>
    </div>
  </main>

  <!-- Vendor JS Files -->
  <script src="asset/vendor/apexcharts/apexcharts.min.js"></script>
  <script src="asset/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="asset/vendor/chart.js/chart.umd.js"></script>
  <script src="asset/vendor/echarts/echarts.min.js"></script>
  <script src="asset/vendor/quill/quill.min.js"></script>
  <script src="asset/vendor/simple-datatables/simple-datatables.js"></script>
  <script src="asset/vendor/tinymce/tinymce.min.js"></script>
  <script src="asset/vendor/php-email-form/validate.js"></script>

  <!-- Template Main JS File -->
  <script src="asset/js/main.js"></script>
  <!-- Tambahan scripts... -->


</body>

</html>
