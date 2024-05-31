<?php
require_once "./../connections/connections.php";

if (!$conn) {
    die("Koneksi database gagal: " . mysqli_connect_error());
}

$queryTotalUmkm = "SELECT COUNT(*) as total_umkm FROM tb_umkm";
$resultTotalUmkm = $conn->query($queryTotalUmkm);

if ($resultTotalUmkm->num_rows > 0) {
    $rowTotalUmkm = $resultTotalUmkm->fetch_assoc();
    $totalUmkm = $rowTotalUmkm['total_umkm'];
} else {
    $totalUmkm = 0;
}

$conn->close();
?>

<div class="content-wrapper">
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Dashboard</h1>
                </div>
            </div>
        </div>
    </div>

    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-3 col-6">
                    <div class="small-box bg-success">
                        <div class="inner">
                            <h3><?php echo $totalUmkm; ?></h3>
                            <p>Total UMKM</p>
                        </div>
                        <div class="icon">
                            <i class="fas fa-map-marked-alt"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
