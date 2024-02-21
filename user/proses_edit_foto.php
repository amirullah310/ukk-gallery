<?php
session_start();

// Periksa apakah pengguna sudah login
if (!isset($_SESSION['userid'])) {
    // Redirect atau lakukan tindakan lain jika pengguna belum login
    header('Location: login.php');
    exit();
}

// Include file koneksi ke database
include('koneksi.php'); // Gantilah 'koneksi.php' dengan nama file koneksi Anda

// Periksa apakah formulir disubmit
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Ambil data dari formulir
    $fotoid = $_POST['fotoid'];
    $judulFoto = $_POST['judulfoto'];
    $deskripsiFoto = $_POST['deskripsifoto'];
    // Ambil data lainnya sesuai kebutuhan

    // Perbarui data foto di database berdasarkan fotoid
    $query = "UPDATE foto SET judulfoto=?, deskripsifoto=? WHERE fotoid=?";
    $stmt = $koneksi->prepare($query);
    
    // Bind parameter ke statement
    $stmt->bind_param('ssi', $judulFoto, $deskripsiFoto, $fotoid);

    if ($stmt->execute()) {
        // Redirect atau lakukan tindakan lain jika berhasil memperbarui data
        header('Location: profile.php');
        exit();
    } else {
        // Tindakan lain jika terjadi kesalahan saat memperbarui data
        echo "Error: " . $stmt->error;
    }

    $stmt->close();
    $koneksi->close();
}
?>
