<?php
session_start();
include 'koneksi.php';

$username = $_POST['username'];
$password = $_POST['password'];
$email = $_POST['email'];
$namalengkap = $_POST['namalengkap'];
$alamat = $_POST['alamat'];
$tambah_tambah=date("Y-m-d");


$sql = mysqli_query($conn, "INSERT INTO user VALUES('', '$username', '$password', '$email', '$namalengkap', '$alamat','$tambah_tambah')");

if ($sql) {
    $_SESSION['registration_success'] = 'Registration successful!';
    // Set flag untuk menunjukkan registrasi berhasil
    $_SESSION['registration_flag'] = true;
} else {
    $_SESSION['registration_error'] = 'Registration failed!';
}

header("location: register.php");
exit();
?>
