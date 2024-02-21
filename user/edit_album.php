
<?php
session_start();
if(!isset($_SESSION['userid'])) {
    header("location:login.php");
    
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> edit album</title>
</head>
<body>
    <h1>Halaman edit album</h1>
    <p>Selamat datang <b><?=$_SESSION['namalengkap'] ?></b></p>
    <ul>
        <li><a href="index.php">Home</a></li>
        <li><a href="album.php">Album</a></li>
        <li><a href="foto.php">Foto</a></li>
        <li><a href="logout.php">Logout</a></li>
    </ul>
    <form action="update_album.php" method="post">
        <?php
        include 'koneksi.php';
        // session_start();
        $albumid=$_GET['albumid'];
        $sql=mysqli_query($conn , "SELECT * FROM album where albumid='$albumid'");
        while ($data=mysqli_fetch_array($sql)) {
            # code...

          

            ?>
                <td><input type="hidden" name="albumid" value="<?=$data['albumid']?>"></td>
    
        <table>

            <tr>
                <td>Nama album</td>
                <td><input type="text" name="namaalbum" value="<?=$data['namaalbum']?>"></td>
            </tr>
            <tr>
                <td>deskripsi</td>
                <td><input type="text" name="deskripsi" value="<?=$data['deskripsi']?>"></td>
            </tr>
            <tr>
                <td></td>
                <td><input type="submit" value="Ubah" ></td>
            </tr>
        </table>
        <?php
        }
        ?>
    </form>
   
</body>
</html>