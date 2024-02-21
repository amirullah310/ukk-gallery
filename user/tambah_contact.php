<?php
include 'koneksi.php';
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $userid = $_SESSION['userid'];
    $namalengkap = $_SESSION['namalengkap'];
    $email = $_POST['email'];
    $tanggalcontact = date("Y-m-d");
    $isicontact = $_POST['isicontact'];

    $sql = "INSERT INTO contact (userid, namalengkap, email, tanggalcontact , isicontact) VALUES ('$userid', '$namalengkap', '$email', '$tanggalcontact','$isicontact')";
    $result = mysqli_query($conn, $sql);

    if ($result) {
        // Skrip JavaScript untuk menampilkan alert
        echo '<script>alert("Data kontak berhasil ditambahkan!"); window.location.href="contact.php";</script>';
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }
}
?>
