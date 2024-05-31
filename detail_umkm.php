<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Detail UMKM</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">
    <link href="img/favicon.ico" rel="icon">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
    <link rel="stylesheet" href="https://unpkg.com/leaflet-routing-machine@3.2.12/dist/leaflet-routing-machine.css" />
    <script src="https://unpkg.com/leaflet-routing-machine@3.2.12/dist/leaflet-routing-machine.js"></script>
    <link rel="stylesheet" href="https://unpkg.com/leaflet/dist/leaflet.css" />
    <script src="https://unpkg.com/leaflet/dist/leaflet.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/leaflet-routing-machine/3.2.12/leaflet-routing-machine.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/leaflet-routing-machine/3.2.12/leaflet-routing-machine.min.css" />
    <script src="https://cdn.jsdelivr.net/npm/@splidejs/splide@4.1.4/dist/js/splide.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/@splidejs/splide@4.1.4/dist/css/splide.min.css" rel="stylesheet">
</head>

<style>
    * {
            font-family : "Poppins" !important;
        }
</style>

<body>
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
    <div class="container mt-5" style="padding-top: 80px;">
        <div class="row">
        <div class="col-md-5">
                <?php
        require_once "connections/connections.php";

        if (!$conn) {
            die("Koneksi database gagal: " . mysqli_connect_error());
        }

        $umkmId = isset($_GET['id']) ? $_GET['id'] : null;

        if ($umkmId) {
            $query = "SELECT * FROM tb_umkm WHERE id_umkm = $umkmId";
            $result = $conn->query($query);

            if ($result->num_rows > 0) {
                $row = $result->fetch_assoc();
            }
        }
        ?>
                <div>
    <h4 class="text-uppercase mt-4"><?php echo $row['nama']; ?></h4>
    <p><?php echo $row['deskripsi']; ?></p>
    <div class="d-flex align-items-center mb-4"
        style="background-color: #0F2167; border-radius: 20px; width: fit-content; padding: 5px;">
        <div class="rounded-circle bg-primary text-white p-2 me-1"
            style="width: 30px; height: 30px; display: flex; align-items: center; justify-content: center;">
            <i class="fas fa-phone"></i>
        </div>
        <p style="margin: 5px; color: white; display: flex; align-items: center;">
        <a href="https://wa.me/<?php echo $row['no_hp']; ?>" style="color: white; text-decoration: none;">
            <?php echo $row['no_hp']; ?>
        </a>
    </p>
    </div>
    <hr style="width: 100%; margin-top: 10px; margin-bottom: 10px; border-color: #0F2167;">
    <div class="d-flex align-items-center my-4">
        <i class="fas fa-map-marker-alt me-1" style="font-size: 1.8em;"></i>
        <p style="margin: 0;"><?php echo $row['alamat']; ?></p>
    </div>
    <hr style="width: 100%; margin-top: 10px; margin-bottom: 10px; border-color: #0F2167;">
    <h4 class="text-uppercase mt-4">Produk</h4>

    <div class="splide">
    <div class="splide__track">
        <ul class="splide__list">
            <?php
            $umkm_id = $row['id_umkm'];
            $sqlProduk = "SELECT * FROM tb_produk WHERE id_umkm = '$umkm_id'";
            $resultProduk = $conn->query($sqlProduk);

            if ($resultProduk->num_rows > 0) {
                while ($rowProduk = $resultProduk->fetch_assoc()) {
                    ?>
                    <li class="splide__slide">
                        <div class="card">
                            <img src="admin/uploads/produk/<?php echo $rowProduk['foto']; ?>" class="card-img-top" alt="<?php echo $rowProduk['nama_produk']; ?>" style="height: 130px;">
                            <div class="card-body">
                                <h6 class="card-title"><?php echo $rowProduk['nama_produk']; ?></h6>
                                <p class="card-text text-muted">Rp. <?php echo $rowProduk['harga']; ?></p>
                            </div>
                        </div>
                    </li>
                    <?php
                }
            } else {
                echo '<li>Tidak ada produk yang ditampilkan.</li>';
            }
            ?>
        </ul>
    </div>
</div>


    <a href="umkm.php" class="btn btn-primary mb-5">Back to UMKM List</a>
</div>

            </div>

            <div class="col-md-7">
                <button class="btn btn-primary ms-auto mb-3 me-4" id="btnRoute">Rute</button>
                <div id="map" style="height: 400px;"></div>
            </div>
        </div>
    </div>

    <script>
    document.addEventListener('DOMContentLoaded', function () {
        new Splide('.splide', {
            type: 'slide',
            perPage: 3, 
            perMove: 1,
            gap: 20,
            pagination: false,
            breakpoints: {
                768: {
                    perPage: 1, 
                }
            }
        }).mount();
    });
</script>


    <script>
        var map = L.map('map').setView([<?= $row['latitude'] ?>, <?= $row['longitude'] ?>], 15);

        L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
            attribution: '&copy; OpenStreetMap contributors'
        }).addTo(map);

        L.marker([<?= $row['latitude'] ?>, <?= $row['longitude'] ?>]).addTo(map)
            .bindPopup('<b><?= $row['nama'] ?></b>')
            .openPopup();
    </script>

    <script>
        var routeControl = null;

        document.addEventListener('DOMContentLoaded', function () {
            document.getElementById('btnRoute').addEventListener('click', function () {
                calculateAndDisplayRoute();
            });
        });

        function calculateAndDisplayRoute() {
            var startPoint;
            var endPoint = L.latLng(<?= $row['latitude'] ?>, <?= $row['longitude'] ?>);

            if (navigator.geolocation) {
                navigator.geolocation.getCurrentPosition(function (position) {
                    startPoint = L.latLng(position.coords.latitude, position.coords.longitude);

                    if (routeControl !== null) {
                        map.removeControl(routeControl);
                    }

                    routeControl = L.Routing.control({
                        waypoints: [
                            startPoint,
                            endPoint
                        ],
                        routeWhileDragging: true,
                        show: true, 
                        createMarker: function () { return null; },
                        lineOptions: {
                            styles: [{ color: '#0066ff', opacity: 0.7, weight: 5 }]
                        },
                        router: new L.Routing.osrmv1({
                            language: 'id',
                            profile: 'car',
                        }),
                        routeLine: function (route, options) {
                            var line = L.Routing.line(route, options);
                            map.fitBounds(line.getBounds());
                            return line;
                        },
                        collapsible: true,
                        showAlternatives: false,
                        altLineOptions: { styles: [{ color: '#FF0000', opacity: 0.15, weight: 9 }] },
                        summaryTemplate: '<div class="route-info">{name}<br>{distance}, {time}</div>',
                    }).addTo(map);
                }, function () {
                    handleLocationError(true);
                });
            } else {
                handleLocationError(false);
            }
        }

        function handleLocationError(browserHasGeolocation) {
            var errorInfo = browserHasGeolocation ?
                'Error: The Geolocation service failed.' :
                'Error: Your browser doesn\'t support geolocation.';
            alert(errorInfo);
        }
    </script>


    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="lib/wow/wow.min.js"></script>
    <script src="lib/easing/easing.min.js"></script>
    <script src="lib/waypoints/waypoints.min.js"></script>
    <script src="lib/owlcarousel/owl.carousel.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/js/all.min.js"></script>
    <script src="js/main.js?v=2"></script>
    <!-- <script src="https://unpkg.com/leaflet/dist/leaflet.js"></script> -->
</body>

</html>