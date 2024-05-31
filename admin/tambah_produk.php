<?php
session_start();
require_once "./../connections/connections.php";

if (!$conn) {
    die("Koneksi database gagal: " . mysqli_connect_error());
}

if (isset($_POST['submit'])) {
    $nama_produk = $_POST['nama_produk'];
    $harga = $_POST['harga'];
    $umkm_id = $_POST['id_umkm'];

    $foto = uploadFoto();

    if ($foto !== false) {
        $queryProduk = "INSERT INTO tb_produk (nama_produk, harga, foto, id_umkm) VALUES ('$nama_produk', '$harga', '$foto', '$umkm_id')";

        if ($conn->query($queryProduk) === TRUE) {
            echo '<script>window.location.href = "admin.php?page=produk";</script>';
            exit();
        } else {
            echo "Error: " . $queryProduk . "<br>" . $conn->error;
        }
    } else {
        echo '<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>';
        echo '<script>
                Swal.fire({
                    icon: "error",
                    title: "Oops...",
                    text: "Gagal mengunggah foto. Pastikan file adalah gambar dengan format JPG, JPEG, PNG, atau GIF dan ukuran file tidak lebih dari 500KB."
                });
              </script>';
    }
}

function uploadFoto()
{
    $target_dir = "uploads/produk/";
    $target_file = $target_dir . basename($_FILES["foto"]["name"]);
    $uploadOk = 1;
    $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

    if (isset($_POST["submit"])) {
        $check = getimagesize($_FILES["foto"]["tmp_name"]);
        if ($check !== false) {
            $uploadOk = 1;
        } else {
            $uploadOk = 0;
        }
    }

    if (file_exists($target_file)) {
        $uploadOk = 0;
    }

    if ($_FILES["foto"]["size"] > 500000) {
        $uploadOk = 0;
    }

    if ($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
        && $imageFileType != "gif") {
        $uploadOk = 0;
    }

    if ($uploadOk == 0) {
        return false;
    } else {
        if (move_uploaded_file($_FILES["foto"]["tmp_name"], $target_file)) {
            return basename($_FILES["foto"]["name"]);
        } else {
            return false;
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Page - Tambah Produk</title>
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
                    <label for="nama_produk">Nama Produk:</label>
                    <input type="text" class="form-control" name="nama_produk" required>
                </div>

                <div class="form-group">
                    <label for="harga">Harga:</label>
                    <input type="text" class="form-control" name="harga" required>
                </div>

                <div class="form-group">
                    <label for="foto">Foto:</label>
                    <input type="file" class="form-control" name="foto" accept="image/*" required>
                </div>

                <div class="form-group">
                    <label for="umkm_id">UMKM:</label>
                    <select class="form-control" name="id_umkm" required>
                        <?php
                            $sqlUmkm = "SELECT * FROM tb_umkm";
                            $resultUmkm = $conn->query($sqlUmkm);

                            while ($rowUmkm = $resultUmkm->fetch_assoc()) {
                                echo "<option value='" . $rowUmkm['id_umkm'] . "'>" . $rowUmkm['nama'] . "</option>";
                            }
                        ?>
                    </select>
                </div>

                <button type="submit" name="submit" class="btn btn-success">Simpan</button>
            </form>
        </div>
    </div>
</body>
</html>
