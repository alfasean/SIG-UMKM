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
  .card-hover:hover {
    transform: translateY(-10px);
    transition: 0.3s;
  }

  * {
            font-family : "Poppins" !important;
        }
</style>

</head>

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

<div class="container d-flex align-items-center justify-content-center" style="height: 100vh;">
    <div class="row">
        <div class="col-md-4">
            <a href="kuliner.php" class="card-link">
                <div class="card position-relative text-white card-hover"
                    style="background-image: url('img/card1.jpg'); background-size: cover; border: none;height: 400px; border-radius: 20px; width: 300px; overflow: hidden;">
                    <div class="overlay" style="position: absolute; top: 0; left: 0; width: 100%; height: 100%; background-color: rgba(0, 0, 0, 0.5);"></div>
                    <div class="card-body text-center d-flex align-items-center justify-content-center" style="height: 100%;">
                        <h5 class="card-title" style="color: white; font-size: 44px; z-index: 1;">KULINER</h5>
                    </div>
                </div>
            </a>
        </div>

        <div class="col-md-4">
            <a href="fashion.php" class="card-link">
                <div class="card position-relative text-white card-hover"
                    style="background-image: url('img/card2.jpg'); background-size: cover; border: none;height: 400px; border-radius: 20px; width: 300px; overflow: hidden;">
                    <div class="overlay" style="position: absolute; top: 0; left: 0; width: 100%; height: 100%; background-color: rgba(0, 0, 0, 0.5);"></div>
                    <div class="card-body text-center d-flex align-items-center justify-content-center" style="height: 100%;">
                        <h5 class="card-title" style="color: white; font-size: 44px; z-index: 1;">FASHION</h5>
                    </div>
                </div>
            </a>
        </div>

        <div class="col-md-4">
            <a href="kriya.php" class="card-link">
                <div class="card position-relative text-white card-hover"
                    style="background-image: url('img/card3.jpg'); background-size: cover; border: none;height: 400px; border-radius: 20px; width: 300px; overflow: hidden;">
                    <div class="overlay" style="position: absolute; top: 0; left: 0; width: 100%; height: 100%; background-color: rgba(0, 0, 0, 0.5);"></div>
                    <div class="card-body text-center d-flex align-items-center justify-content-center" style="height: 100%;">
                        <h5 class="card-title" style="color: white; font-size: 44px; z-index: 1;">KRIYA</h5>
                    </div>
                </div>
            </a>
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
</body>

</html>