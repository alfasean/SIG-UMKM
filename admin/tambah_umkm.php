<?php
session_start();
require_once "./../connections/connections.php";

if (!$conn) {
    die("Koneksi database gagal: " . mysqli_connect_error());
}

if (isset($_POST['submit'])) {
    $nama = $_POST['nama'];
    $alamat = $_POST['alamat'];
    $no_hp = $_POST['no_hp'];
    $deskripsi = $_POST['deskripsi'];
    $kategori = $_POST['kategori'];
    $latitude = $_POST['latitude'];
    $longitude = $_POST['longitude'];


    $queryumkm = "INSERT INTO tb_umkm (nama, alamat, no_hp, deskripsi, kategori, latitude, longitude) VALUES ('$nama', '$alamat', '$no_hp', '$deskripsi', '$kategori', '$latitude', '$longitude')";

    if ($conn->query($queryumkm) === TRUE) {
        $lastInsertedId = $conn->insert_id;

        echo '<script>window.location.href = "admin.php?page=umkm";</script>';
        exit();
    } else {
        echo "Error: " . $queryumkm . "<br>" . $conn->error;
    }
}

$conn->close();

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Page</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
    <style>
        body {
            background-color: #f8f9fa;
        }

        .form-container {
            max-width: 400px;
            margin: 50px auto;
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        label {
            font-weight: bold;
        }

        input {
            width: 100%;
            padding: 8px;
            margin-bottom: 15px;
            border: 1px solid #ced4da;
            border-radius: 4px;
        }

        select {
            width: 100%;
            padding: 8px;
            margin-bottom: 15px;
            border: 1px solid #ced4da;
            border-radius: 4px;
        }

        button {
            background-color: #007bff;
            color: #fff;
            border: none;
            padding: 10px 20px;
            border-radius: 4px;
            cursor: pointer;
        }

        button:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="form-container mt-5">
            <form action="" method="post" enctype="multipart/form-data">
                <div class="form-group">
                    <label for="nama">Nama UMKM:</label>
                    <input type="text" class="form-control" name="nama" required>
                </div>

                <div class="form-group">
                    <label for="alamat">Alamat:</label>
                    <input type="text" class="form-control" name="alamat" required>
                </div>

                <div class="form-group">
                    <label for="no_hp">Nomor Handphone:</label>
                    <input type="number" class="form-control" name="no_hp" required>
                </div>

                <div class="form-group">
                    <label for="kategori">Kategori:</label>
                    <select class="form-control" name="kategori" required>
                        <option value="Fashion">Fashion</option>
                        <option value="Kuliner">Kuliner</option>
                        <option value="Kriya">Kriya</option>
                    </select>
                </div>

                <div class="form-group">
                <label for="deskripsi">Deskripsi:</label>
                <textarea class="form-control" name="deskripsi" rows="4" required></textarea>
            </div>

                <div class="form-group">
                    <label for="latitude">Latitude:</label>
                    <input type="text" class="form-control" name="latitude" required>
                </div>

                <div class="form-group">
                    <label for="longitude">Longitude:</label>
                    <input type="text" class="form-control" name="longitude" required>
                </div>

                <button type="submit" name="submit" class="btn btn-success">Simpan</button>
            </form>
        </div>
    </div>
</body>
</html>
