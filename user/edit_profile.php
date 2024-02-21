<?php
session_start();
include 'koneksi.php';

// Periksa apakah user sudah login
if (!isset($_SESSION['userid'])) {
    header("Location: login.php");
    exit();
}

// Fetch user data
$userid = $_SESSION['userid'];
$sqlUserProfile = "SELECT * FROM user WHERE userid = $userid";
$resultUserProfile = mysqli_query($conn, $sqlUserProfile);
$userData = mysqli_fetch_assoc($resultUserProfile);

// Inisialisasi variabel untuk menyimpan nilai kolom password lama
$passwordLama = $userData['password'];

// Proses form pengeditan profile jika form disubmit
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Ambil data dari form
    $newUsername = mysqli_real_escape_string($conn, $_POST['newUsername']);
    $newEmail = mysqli_real_escape_string($conn, $_POST['newEmail']);
    $newPassword = mysqli_real_escape_string($conn, $_POST['newPassword']);
    $newNamalengkap = mysqli_real_escape_string($conn, $_POST['newNamalengkap']);
    $newAlamat = mysqli_real_escape_string($conn, $_POST['newAlamat']);

    // Validasi kolom password tidak boleh kosong
    if (empty($newPassword)) {
        // Jika password kosong, gunakan password lama
        $newPassword = $passwordLama;
    }

    // Update data pengguna
    $sqlUpdateProfile = "UPDATE user SET username='$newUsername', email='$newEmail', password='$newPassword', namalengkap='$newNamalengkap', alamat='$newAlamat' WHERE userid = $userid";
    mysqli_query($conn, $sqlUpdateProfile);

    // Redirect ke halaman profile setelah update
    header("Location: profile.php");
    exit();
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Profile</title>
    <!-- Tambahkan CSS styling jika diperlukan -->
    <script>
        function confirmEdit() {
            return confirm("Yakin ingin mengedit profile?");
        }
    </script>
</head>
<body>
    <header>
        <h1>Edit Profile</h1>
    </header>

    <nav>
        <!-- Navigasi menu, jika ada -->
    </nav>

    <main>
        <h2>Edit Profile</h2>

        <form method="post" action="edit_profile.php" onsubmit="return confirmEdit()">
            <label for="newUsername">Username Baru:</label>
            <input type="text" name="newUsername" id="newUsername" value="<?= $userData['username'] ?>" required>

            <label for="newEmail">Email Baru:</label>
            <input type="email" name="newEmail" id="newEmail" value="<?= $userData['email'] ?>" required>

            <label for="newPassword">Password Baru:</label>
            <input type="password" name="newPassword" id="newPassword">
            <small>Kosongkan jika tidak ingin mengganti password</small>

            <label for="newNamalengkap">Nama Lengkap Baru:</label>
            <input type="text" name="newNamalengkap" id="newNamalengkap" value="<?= $userData['namalengkap'] ?>" required>

            <label for="newAlamat">Alamat Baru:</label>
            <textarea name="newAlamat" id="newAlamat" required><?= $userData['alamat'] ?></textarea>

            <input type="submit" value="Simpan">
        </form>

        <script>
            // Menambahkan alert setelah formulir di-submit
            // document.querySelector('form').addEventListener('submit', function() {
            //     alert("Yakin ingin menyimpan perubahan?");
            // });
        </script>
    </main>
</body>
</html>
