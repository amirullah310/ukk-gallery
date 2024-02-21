<?php
include 'koneksi.php';

if (isset($_GET['fotoid'])) {
    $fotoid = mysqli_real_escape_string($conn, $_GET['fotoid']);

    // Kueri untuk mendapatkan informasi gambar
    $sqlFoto = "SELECT * FROM foto WHERE fotoid = '$fotoid'";
    $resultFoto = mysqli_query($conn, $sqlFoto);

    if ($dataFoto = mysqli_fetch_array($resultFoto)) {
        $lokasiFile = $dataFoto['lokasifile'];

        // Set header untuk tipe konten dan nama file
        header('Content-Type: application/octet-stream');
        header('Content-Disposition: attachment; filename="' . basename($lokasiFile) . '"');

        // Baca dan kirimkan file
        readfile('gambar/' . $lokasiFile);
        exit;
    }
}

// Jika tidak ada fotoid yang valid
echo "File tidak ditemukan.";
?>
