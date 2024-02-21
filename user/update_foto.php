<?php
include 'koneksi.php';
session_start();

$fotoid = $_POST['fotoid'];
$judulfoto = $_POST['judulfoto'];
$deskripsifoto = $_POST['deskripsifoto'];
$albumid = $_POST['albumid'];

// Jika upload gambar baru
if ($_FILES['lokasifile']['name'] != "") {
    $rand = rand();
    $ekstensi = array('png', 'jpg', 'jpeg', 'gif');
    $filename = $_FILES['lokasifile']['name'];
    $ukuran = $_FILES['lokasifile']['size'];
    $ext = pathinfo($filename, PATHINFO_EXTENSION);

    if (!in_array($ext, $ekstensi)) {
        header("location:profile.php");
    } else {
        if ($ukuran < 1048576) {
            $xx = $rand . '_' . basename($filename);
            move_uploaded_file($_FILES['lokasifile']['tmp_name'], '../gambar/' . $xx);

            // Update data termasuk lokasi file
            mysqli_query($conn, "UPDATE foto SET judulfoto='$judulfoto', deskripsifoto='$deskripsifoto', lokasifile='$xx', albumid='$albumid' WHERE fotoid='$fotoid'");
            header("location:profile.php");
        } else {
            header("location:profile.php");
        }
    }
} else {
    // Jika tidak ada file baru yang diunggah, perbarui bidang lainnya tanpa mempengaruhi lokasifile
    mysqli_query($conn, "UPDATE foto SET judulfoto='$judulfoto', deskripsifoto='$deskripsifoto', albumid='$albumid' WHERE fotoid='$fotoid'");
    header("location:profile.php");
}
?>
