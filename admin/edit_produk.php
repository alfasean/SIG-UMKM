<?php
session_start();
require_once "./../connections/connections.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nama_produk = $_POST["nama_produk"];
    $harga = $_POST["harga"];

    if (!empty($_FILES['foto']['name'])) {
        $foto = uploadFoto();
        if ($foto) {
            $sql = "UPDATE tb_produk SET nama_produk='$nama_produk', harga='$harga', foto='$foto' WHERE id_produk='$_GET[menu_upd]'";

            if ($conn->query($sql) === TRUE) {
                $conn->close();
                echo '<script>
                                window.location.href = "produk.php";
                      </script>';
                exit();
            } else {
                echo "Error: " . $sql . "<br>" . $conn->error;
            }
        }
    } else {
        $sql = "UPDATE tb_produk SET nama_produk='$nama_produk', harga='$harga' WHERE id_produk='$_GET[menu_upd]'";

        if ($conn->query($sql) === TRUE) {
            $conn->close();
            echo '<script>
                            window.location.href = "produk.php";
                  </script>';
            exit();
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
    }
}

function uploadFoto()
{
    $target_dir = "uploads/produk/";
    $target_file = $target_dir . basename($_FILES["foto"]["name"]);
    $uploadOk = 1;
    $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

    $check = getimagesize($_FILES["foto"]["tmp_name"]);
    if ($check === false) {
        echo "File bukan gambar.";
        $uploadOk = 0;
    }

    if (file_exists($target_file)) {
        echo "Maaf, file sudah ada.";
        $uploadOk = 0;
    }

    if ($_FILES["foto"]["size"] > 500000) {
        echo "Maaf, ukuran file terlalu besar.";
        $uploadOk = 0;
    }

    if ($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif") {
        echo "Maaf, hanya file JPG, JPEG, PNG & GIF yang diperbolehkan.";
        $uploadOk = 0;
    }

    if ($uploadOk == 1) {
        if (move_uploaded_file($_FILES["foto"]["tmp_name"], $target_file)) {
            return basename($_FILES["foto"]["name"]);
        } else {
            echo "Maaf, terjadi kesalahan saat mengunggah file.";
            return false;
        }
    } else {
        echo "Maaf, file tidak terunggah.";
        return false;
    }
}

require_once "./../connections/connections.php";

if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}

if (isset($_GET['menu_upd'])) {
    $id_produk = $_GET['menu_upd'];

    $sql = "SELECT * FROM tb_produk WHERE id_produk='$id_produk'";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($result);

    $umkm_id = $row['id_umkm'];
    $sqlUmkm = "SELECT * FROM tb_umkm";
    $resultUmkm = $conn->query($sqlUmkm);
} else {
    echo "Invalid request.";
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Produk</title>
    <link rel="stylesheet" href="css/style.css?v=2">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
</head>

<body>
    <div class="form-container mt-2">
        <h2>Edit Produk</h2>
        <form id="editForm" action="" method="POST" enctype="multipart/form-data">
            <div class="form-group">
                <label for="nama_produk">Nama Produk:</label>
                <input type="text" id="nama_produk" value="<?php echo $row['nama_produk']; ?>" name="nama_produk" required>
            </div>
            <div class="form-group">
                <label for="harga">Harga:</label>
                <input type="text" id="harga" value="<?php echo $row['harga']; ?>" name="harga" required>
            </div>

            <div class="form-group">
                <label for="foto">Foto Produk:</label><br>
                <img src="uploads/produk/<?php echo $row['foto']; ?>" alt="Foto Produk" style="max-width: 200px;">
                <input type="file" name="foto" accept="image/*">
            </div>

            <div class="form-group">
                <label for="umkm_id">UMKM:</label>
                <select class="form-control" name="umkm_id" required>
                    <?php
                        while ($rowUmkm = $resultUmkm->fetch_assoc()) {
                            $selected = ($rowUmkm['id_umkm'] == $row['id_umkm']) ? 'selected' : '';
                            echo "<option value='" . $rowUmkm['id_umkm'] . "' $selected>" . $rowUmkm['nama'] . "</option>";
                        }
                    ?>
                </select>
            </div>
            <div class="form-group submit-button">
                <button class="btn btn-success" type="button" id="submitButton">Submit</button>
            </div>
        </form>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <script>
    document.addEventListener("DOMContentLoaded", function() {
        document.getElementById("submitButton").addEventListener("click", function() {
            Swal.fire({
                title: "Apa kamu yakin?",
                text: "Kamu akan mengedit data?",
                icon: "warning",
                showCancelButton: true,
                confirmButtonColor: "#3085d6",
                cancelButtonColor: "#d33",
                confirmButtonText: "Ya"
            }).then((result) => {
                if (result.isConfirmed) {
                    document.getElementById('editForm').submit(); 
                }
            });
        });
    });
</script>

</body>

</html>
