<?php
session_start();
if (!isset($_SESSION['userid'])) {
    header("location:login.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Foto</title>
    <!-- Bootstrap CSS -->
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f8f9fa;
        }

        .container {
            margin-top: 100px;
            box-shadow: 0 4px 8px rgba(0,0,0,0.1);
            border-radius: 10px;
            overflow: hidden; /* Menanggulangi overflow border */
            padding: 20px; 
            width: 700px;
        }

        .form-group {
            margin-bottom: 20px;
        }

        button[type="submit"] {
            width: 100%;
        }

        .btn-back {
            width: 100%;
            margin-top: 10px;
        }

        /* Menambahkan border di sekitar form */
        .container:before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            border: 1px solid #ced4da;
            border-radius: 10px;
            box-sizing: border-box;
        }
    </style>
</head>
<body>

<div class="container position-relative"> <!-- Menambahkan class position-relative untuk kontainer -->
    <div class="row justify-content-center">
        <div class="col-md-6">
            <h2 class="text-center mb-4">Edit Foto</h2>
            <form action="update_foto.php" method="post" enctype="multipart/form-data">
                <?php
                include 'koneksi.php';
                $fotoid = $_GET['fotoid'];
                $sql = mysqli_query($conn, "SELECT * FROM foto where fotoid='$fotoid'");
                while ($data = mysqli_fetch_array($sql)) {
                ?>
                <input type="hidden" name="fotoid" value="<?= $data['fotoid'] ?>">

                <div class="form-group">
                    <label for="judulfoto">Nama Foto</label>
                    <input type="text" class="form-control" id="judulfoto" name="judulfoto" value="<?= $data['judulfoto'] ?>" required>
                </div>

                <div class="form-group">
                    <label for="deskripsifoto">Deskripsi</label>
                    <input type="text" class="form-control" id="deskripsifoto" name="deskripsifoto" value="<?= $data['deskripsifoto'] ?>" required>
                </div>

                <div class="form-group">
                    <label for="lokasifile">Lokasi File</label>
                    <input type="file" class="form-control-file" id="lokasifile" name="lokasifile">
                </div>

                <div class="form-group">
                    <label for="albumid">Album</label>
                    <select class="form-control" id="albumid" name="albumid" required>
                        <?php
                        $userid = $_SESSION['userid'];
                        $sql2 = mysqli_query($conn, "SELECT * FROM album where userid='$userid'");
                        while ($data2 = mysqli_fetch_array($sql2)) {
                        ?>
                        <option value="<?= $data2['albumid'] ?>" <?php if ($data2['albumid'] == $data['albumid']) { echo 'selected'; } ?>>
                            <?= $data2['namaalbum'] ?>
                        </option>
                        <?php
                        }
                        ?>
                    </select>
                </div>

                <button type="submit" class="btn btn-primary">Ubah</button>
                <?php
                }
                ?>
            </form>
            <a href="profile.php" class="btn btn-secondary btn-back">Kembali ke Profil</a>
        </div>
    </div>
</div>

<!-- Bootstrap JS (optional, but may be needed for some features) -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

</body>
</html>
