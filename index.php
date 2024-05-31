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
            font-family : "Poppins" !important;
        }
        .overlay {
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background-color: rgba(0, 0, 0, 0.5); 
    }

    #map {
        height: 500px;
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

    <div class="container-fluid p-0 wow fadeIn" data-wow-delay="0.1s" style="background-color: #ffffff;">
        <div id="header-carousel" class="carousel slide" data-bs-ride="carousel">
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <div class="overlay"></div>
                    <img class="w-100" src="img/4.jpeg" alt="Image 1">
                    <div class="carousel-caption d-flex align-items-center justify-content-center">
                        <div class="container">
                            <div class="row justify-content-center">
                                <div class="col-lg-7 text-center">
                                    <h1 class="display-2 mb-1 animated slideInDown"
                                        style="color: #fff; font-size: 45px;">Sistem Informasi
                                        Geografis UMKM</h1>
                                    <p class="text-white">Optimalkan Posisi Bisnis Anda dengan Sistem Informasi Geografis</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="carousel-item">
                    <div class="overlay"></div>
                    <img class="w-100" src="img/5.png" alt="Image 2">
                    <div class="carousel-caption d-flex align-items-center justify-content-center">
                        <div class="container">
                            <div class="row justify-content-center">
                                <div class="col-lg-7 text-center">
                                    <h1 class="display-2 mb-1 animated slideInDown"
                                        style="color: #fff; font-size: 45px;">Sistem Informasi
                                        Geografis UMKM</h1>
                                    <p class="text-white">Optimalkan Posisi Bisnis Anda dengan Sistem Informasi Geografis</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="carousel-item">
                    <div class="overlay"></div>
                    <img class="w-100" src="img/3.jpeg" alt="Image 3">
                    <div class="carousel-caption d-flex align-items-center justify-content-center">
                        <div class="container">
                            <div class="row justify-content-center">
                                <div class="col-lg-7 text-center">
                                    <h1 class="display-2 mb-1 animated slideInDown"
                                        style="color: #fff; font-size: 45px;">Sistem Informasi
                                        Geografis UMKM</h1>
                                    <p class="text-white">Optimalkan Posisi Bisnis Anda dengan Sistem Informasi Geografis</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

   <div class="container-xxl py-5">
        <div class="container">
            <div class="row g-5 align-items-center">
                <div class="col-lg-12 wow fadeIn" data-wow-delay="0.1s">
                    <div id="map"></div>
                </div>
            </div>
        </div>
    </div>
    
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="lib/wow/wow.min.js"></script>
    <script src="lib/easing/easing.min.js"></script>
    <script src="lib/waypoints/waypoints.min.js"></script>
    <script src="lib/owlcarousel/owl.carousel.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/js/all.min.js"></script>


    <script src="js/main.js?v=2"></script>
<script>
    $(document).ready(function () {
        $('#header-carousel').carousel({
            interval: 3000
        });
    });
</script>

     <script>
    var map = L.map('map').setView([1.4564212, 124.8229092], 14);
    L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
        attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
    }).addTo(map);

    <?php
        require_once "connections/connections.php";

        if (!$conn) {
            die("Koneksi database gagal: " . mysqli_connect_error());
        }

        $query = "SELECT * FROM tb_umkm";
        $result = $conn->query($query);

        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $latitude = $row['latitude'];
                $longitude = $row['longitude'];

                if (!empty($latitude) && !empty($longitude)) {
                    echo "var marker = L.marker([" . $latitude . ", " . $longitude . "]).addTo(map);\n";

                    echo "marker.bindPopup('" . $row['nama'] . '<br><button onclick="showDetail(' . $row['id_umkm'] . ')">Detail</button>' . "');\n";
                }
            }
        }

        $conn->close();
    ?>

    function showDetail(umkmId) {
        window.location.href = 'detail_umkm.php?id=' + umkmId;
    }
</script>
</body>
</html>
