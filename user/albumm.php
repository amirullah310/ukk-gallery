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
    <title>Tambah Album</title>
    <!-- Bootstrap CSS -->
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f8f9fa;
        }

        .container {
            margin-top: 170px;
            box-shadow: 0 4px 8px rgba(0,0,0,0.1);
            border-radius: 10px;
            overflow: hidden; /* Menanggulangi overflow border */
            padding: 20px; /* Menambahkan padding pada container */
            width: 700px;
        }

        .form-group {
            margin-bottom: 20px;
        }

        button[type="submit"] {
            width: 100%;
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
        .bren{
            width: 100%;
            margin-top: 10px;
        }

    </style>
</head>
<body>

<div class="container position-relative">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <h2 class="text-center mb-4">Tambah Album</h2>
            <form action="tambah_album.php" method="post">
                <div class="form-group">
                    <label for="namaalbum">Nama Album</label>
                    <input type="text" class="form-control" id="namaalbum" name="namaalbum" required>
                </div>

                <div class="form-group">
                    <label for="deskripsi">Deskripsi</label>
                    <input type="text" class="form-control" id="deskripsi" name="deskripsi" required>
                </div>

                <button type="submit" class="btn btn-primary">Tambah</button>
                <a class="btn btn-secondary bren" href="album.php">Cancel</a>
            </form>
        </div>
    </div>
</div>

<!-- Bootstrap JS (optional, but may be needed for some features) -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

</body>
</html>
