<?php
session_start();
require_once "./../connections/connections.php";

if (!$conn) {
    die("Koneksi database gagal: " . mysqli_connect_error());
}

$sqlProduk = "SELECT * FROM tb_produk";
$resultProduk = $conn->query($sqlProduk);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Admin | Dashboard</title>

    <link href="../img/logo.png" rel="icon">
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <link rel="stylesheet" href="plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
    <link rel="stylesheet" href="plugins/icheck-bootstrap/icheck-bootstrap.min.css">
    <link rel="stylesheet" href="plugins/jqvmap/jqvmap.min.css">
    <link rel="stylesheet" href="dist/css/adminlte.min.css">
    <link rel="stylesheet" href="plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
    <link rel="stylesheet" href="plugins/daterangepicker/daterangepicker.css">
    <link rel="stylesheet" href="plugins/summernote/summernote-bs4.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto|Varela+Round">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="css/style.css?v=2">
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="css/style.css?v=2">
    <style>
        td {
            font-size: 16px;
        }
    </style>
</head>

<body>
    <div class="wrapper">

        <div class="preloader flex-column justify-content-center align-items-center">
            <img class="animation__shake" src="dist/img/AdminLTELogo.png" alt="AdminLTELogo" height="60" width="60">
        </div>

        <nav class="main-header navbar navbar-expand navbar-white navbar-light">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
                </li>
        </nav>

        <aside class="main-sidebar sidebar-dark-primary elevation-4">
            <div class="sidebar">
                <div class="user-panel mt-3 pb-3 mb-3 d-flex">
                    <div class="image">
                        <img src="dist/img/admin.png" class="img-circle elevation-2" alt="User Image">
                    </div>
                    <div class="info">
                        <a href="#" class="d-block">Admin</a>
                    </div>
                </div>

                <nav class="mt-2">
                    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                        data-accordion="false">
                        <li class="nav-item menu-open">
                            <a href="admin.php?p=dashboard" class="nav-link active">
                                <i class="nav-icon fas fa-tachometer-alt"></i>
                                <p>
                                    Dashboard
                                </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="umkm.php" class="nav-link">
                                <i class="nav-icon fas fa-map-marked-alt"></i>
                                <p>
                                    UMKM
                                </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="produk.php" class="nav-link">
                                <i class="nav-icon fas fa-hamburger"></i>
                                <p>
                                    Produk
                                </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="javascript:void(0);" id="logout" class="nav-link">
                                <i class="nav-icon fas fa-power-off"></i>
                                <p>
                                    Logout
                                </p>
                            </a>
                        </li>
                    </ul>
                </nav>
            </div>
        </aside>
        <div class="content-wrapper">
            <div class="container-xl">
                <div class="table-responsive">
                    <div class="table-wrapper mt-5">
                        <div class="table-title">
                            <div class="row">
                                <div class="col-sm-6 mb-2">
                                    <h2><b>Data Produk</b></h2>
                                    <a href="admin.php?page=tambah_produk" class="btn btn-success" tabindex="-1"
                                        role="button" aria-disabled="true"> <i class="fa fa-plus mr-1"></i>Tambah
                                        Data</a>
                                </div>
                                <div class="col-sm-6 mb-2">
                                    <form method="get">
                                        <label for="sort">Urutkan Berdasarkan Nama Produk:</label>
                                        <select name="sort" id="sort"
                                            onchange="window.location.href='produk.php?sort=' + this.value;">
                                            <option value="asc"
                                                <?php if(isset($_GET['sort']) && $_GET['sort'] == 'asc') echo 'selected'; ?>>
                                                Ascending</option>
                                            <option value="desc"
                                                <?php if(isset($_GET['sort']) && $_GET['sort'] == 'desc') echo 'selected'; ?>>
                                                Descending</option>
                                        </select>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <?php
                $no = 0;
                $sort = isset($_GET['sort']) ? $_GET['sort'] : 'asc';
                $query = "SELECT * FROM tb_produk";
                $query .= " ORDER BY nama_produk $sort";

                if ($resultProduk = mysqli_query($conn, $query)) {
                    if (mysqli_num_rows($resultProduk) > 0) {
                        echo '<table class="table table-striped table-hover">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Nama Produk</th>
                                    <th>Harga</th>
                                    <th>Foto</th>
                                    <th>UMKM</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>';
                    
                        echo '<tbody>';
                        while ($rowProduk = mysqli_fetch_assoc($resultProduk)) {
                            $no++;
                            echo "<tr>";
                            echo "<td>" . $no . "</td>";
                            echo "<td>" . $rowProduk['nama_produk'] . "</td>";
                            echo "<td>" . $rowProduk['harga'] . "</td>";
                            echo "<td><img src='uploads/produk/" . $rowProduk['foto'] . "' alt='Foto Produk' style='max-width: 100px;'></td>";
                    
                            $umkm_id = $rowProduk['id_umkm'];
                            $sqlUmkm = "SELECT nama FROM tb_umkm WHERE id_umkm = '$umkm_id'";
                            $resultUmkm = $conn->query($sqlUmkm);
                            $rowUmkm = $resultUmkm->fetch_assoc();
                            $namaUmkm = ($rowUmkm) ? $rowUmkm['nama'] : "UMKM tidak ditemukan";
                    
                            echo "<td>" . $namaUmkm . "</td>";
                            echo "<td>
                            <a style='color: #F2BE22;' href='admin.php?page=edit_produk&menu_upd=" . $rowProduk['id_produk'] . "' class='edit'><i class='material-icons' data-toggle='tooltip' title='Edit'>&#xE254;</i></a>
                            <a style='color: #CD1818;' href='javascript:void(0);' class='delete' data-id='" . $rowProduk['id_produk'] . "'><i class='material-icons' data-toggle='tooltip' title='Hapus'>&#xE872;</i></a>
                            </td>";
                            echo "</tr>";
                        }
                        echo '</tbody>';
                        echo '</table>';
                    } else {
                        echo '<p>Tidak ada produk yang ditampilkan.</p>';
                    }
                    mysqli_free_result($resultProduk);
                } else {
                    echo "Error: " . mysqli_error($conn);
                }

                mysqli_close($conn);
                ?>


                    </div>
                </div>
            </div>
        </div>

        <script>
        $(document).ready(function() {
            $('.delete').on('click', function() {
                var id = $(this).data('id');
                Swal.fire({
                    title: "Pastikan kembali",
                    text: "Apakah kamu yakin ingin menghapus produk ini?",
                    icon: "warning",
                    showCancelButton: true,
                    confirmButtonColor: "#3085d6",
                    cancelButtonColor: "#d33",
                    confirmButtonText: "Ya"
                }).then((result) => {
                    if (result.isConfirmed) {
                        window.location.href = 'delete_produk.php?menu_del=' + id;
                    }
                });
            });
        });
    </script>

<script>
            $(document).ready(function() {
                $('#logout').on('click', function() {
                    Swal.fire({
                        title: "Apa kamu yakin?",
                        text: "Kamu akan keluar",
                        icon: "warning",
                        showCancelButton: true,
                        confirmButtonColor: "#3085d6",
                        cancelButtonColor: "#d33",
                        confirmButtonText: "Ya"
                    }).then((result) => {
                        if (result.isConfirmed) {
                            window.location.href = 'logout.php';
                        }
                    });
                });
            });
        </script>

        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
        <script src="plugins/jquery/jquery.min.js"></script>
        <script src="plugins/jquery-ui/jquery-ui.min.js"></script>
        <script>
            $.widget.bridge('uibutton', $.ui.button)
        </script>
        <script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
        <script src="plugins/chart.js/Chart.min.js"></script>
        <script src="plugins/sparklines/sparkline.js"></script>
        <script src="plugins/jqvmap/jquery.vmap.min.js"></script>
        <script src="plugins/jqvmap/maps/jquery.vmap.usa.js"></script>
        <script src="plugins/jquery-knob/jquery.knob.min.js"></script>
        <script src="plugins/moment/moment.min.js"></script>
        <script src="plugins/daterangepicker/daterangepicker.js"></script>
        <script src="plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
        <script src="plugins/summernote/summernote-bs4.min.js"></script>
        <script src="plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
        <script src="dist/js/adminlte.js"></script>
        <script src="dist/js/pages/dashboard.js"></script>

</body>

</html>