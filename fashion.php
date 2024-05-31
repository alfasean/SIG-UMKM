<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>SIG UMKM</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">
    <link href="img/favicon.ico" rel="icon">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">
    <link href="lib/animate/animate.min.css" rel="stylesheet">
    <link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
    <link rel="stylesheet" href="https://unpkg.com/leaflet/dist/leaflet.css" />
    <script src="https://unpkg.com/leaflet/dist/leaflet.js"></script>

    <style>
        * {
            font-family: "Poppins" !important;
        }

        .card {
            background-color: #fff;
            border-radius: 10px;
            overflow: hidden;
            transition: transform 0.3s;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        .card:hover {
            transform: translateY(-10px);
        }

        .card-img-top {
            object-fit: cover;
            height: 150px;
            width: 100%;
            border-bottom: 1px solid #dee2e6;
        }

        .card-body {
            padding: 20px;
        }

        .card-title {
            font-size: 1.25rem;
            margin-bottom: 10px;
        }

        .card-link {
            text-decoration: none;
            color: #0F2167;
        }
    </style>
</head>

<body>
    <div id="spinner"
        class="show bg-white position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
        <div class="spinner-border text-primary" role="status"></div>
    </div>

    <div class="container-fluid fixed-top px-0 wow fadeIn" data-wow-delay="0.1s">
        <nav class="navbar navbar-expand-lg navbar-light py-lg-0 px-lg-5 wow fadeIn" data-wow-delay="0.1s">
            <a class="navbar-brand" href="index.php"><h3>MATUARI</h3></a>

            <button type="button" class="navbar-toggler me-4" data-bs-toggle="collapse"
                data-bs-target="#navbarCollapse">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarCollapse">
                <div class="navbar-nav mx-auto p-4 p-lg-0">
                    <a href="index.php" class="nav-item nav-link active">Home</a>
                    <a href="umkm.php" class="nav-item nav-link">UMKM</a>
                </div>
                <div class="navbar-nav ms-auto p-4 p-lg-0">
                    <div class="d-flex align-items-center"> 
                        <a href="admin/" class="nav-item nav-link">
                            <i class="fas fa-sign-in-alt" style="margin-right: 5px;"></i>
                            Admin
                        </a>
                    </div>
                </div>
            </div>
        </nav>
    </div>

    <div class="container" style="margin-top: 130px !important;">
    <div class="row">
            <div class="col-md-12">
                <form method="GET">
                    <div class="input-group mb-3">
                        <input type="text" class="form-control" placeholder="Cari nama UMKM" name="search" value="<?php echo isset($_GET['search']) ? $_GET['search'] : ''; ?>">
                        <button class="btn btn-success" type="submit">Cari</button>
                    </div>
                </form>
            </div>
        </div>
        <div class="row">
            <?php
            require_once "connections/connections.php";
            
            if (!$conn) {
                die("Koneksi database gagal: " . mysqli_connect_error());
            }

            $sort_order = isset($_GET['sort']) ? $_GET['sort'] : 'asc';
            $sort_icon = ($sort_order == 'asc') ? 'bi-arrow-up' : 'bi-arrow-down';
            $sort_next_order = ($sort_order == 'asc') ? 'desc' : 'asc';
            $sort_icon_color = ($sort_order == 'asc') ? 'text-primary' : 'text-danger';

            if(isset($_GET['search'])){
                $search = $_GET['search'];
                $queryFashion = "SELECT * FROM tb_umkm WHERE kategori = 'fashion' AND nama LIKE '%$search%' ORDER BY nama $sort_order";
            } else {
                $queryFashion = "SELECT * FROM tb_umkm WHERE kategori = 'fashion' ORDER BY nama $sort_order";
            }
            $resultFashion = $conn->query($queryFashion);

            if ($resultFashion->num_rows > 0) {
                while ($rowFashion = $resultFashion->fetch_assoc()) {
            ?>
                    <div class="col-md-3">
                        <a href="detail_umkm.php?id=<?php echo $rowFashion['id_umkm']; ?>" class="card-link">
                            <div class="card mb-4">
                                <div class="card-body">
                                    <h3 class="card-title text-truncate"><?php echo $rowFashion['nama']; ?></h3>
                                </div>
                            </div>
                        </a>
                    </div>
            <?php
                }
            } else {
                echo "Tidak ada UMKM Fashion yang ditemukan.";
            }

            $conn->close();
            ?>
        </div>
    </div>

    <div class="container mt-3">
        <form action="fashion.php" method="GET">
            <label for="sort">Urutkan Berdasarkan Nama:</label>
            <select name="sort" id="sort" class="form-select" onchange="this.form.submit()">
                <option value="asc" <?php if ($sort_order == 'asc') echo 'selected'; ?>>Ascending</option>
                <option value="desc" <?php if ($sort_order == 'desc') echo 'selected'; ?>>Descending</option>
            </select>
        </form>
    </div>

    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="lib/wow/wow.min.js"></script>
    <script src="lib/easing/easing.min.js"></script>
    <script src="lib/waypoints/waypoints.min.js"></script>
    <script src="lib/owlcarousel/owl.carousel.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/js/all.min.js"></script>
    <script src="js/main.js?v=2"></script>
    <script src="https://unpkg.com/leaflet/dist/leaflet.js"></script>
    <script src="js/custom-map.js?v=2"></script>
</body>

</html>
