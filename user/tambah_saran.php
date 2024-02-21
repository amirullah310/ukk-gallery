<?php
include 'koneksi.php';
session_start();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $isisaran = $_POST['isisaran'];
    $tanggalsaran = date("Y-m-d");
    $userid = $_SESSION['userid'];

    $sql = mysqli_query($conn, "INSERT INTO saran (isisaran, tanggalsaran, userid) VALUES ('$isisaran', '$tanggalsaran', '$userid')");

    if ($sql) {
        header("location:saran.php");
    } else {
        echo "Gagal menyimpan saran.";
    }
} else {
    echo "Metode pengiriman data tidak valid.";
}
?>
