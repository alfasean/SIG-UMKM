<?php
require_once "connections/connections.php";

if (!$conn) {
    die("Koneksi database gagal: " . mysqli_connect_error());
}

$umkmId = isset($_GET['id']) ? $_GET['id'] : null;

$queryMap = "SELECT * FROM tb_umkm WHERE id_umkm = $umkmId";
$resultMap = $conn->query($queryMap);

$markers = array();

if ($resultMap->num_rows > 0) {
    while ($rowMap = $resultMap->fetch_assoc()) {
        $markers[] = array(
            'lat' => $rowMap['latitude'],
            'lng' => $rowMap['longitude'],
            'name' => $rowMap['nama'],
            'id_umkm' => $rowMap['id_umkm']
        );
    }
}

$conn->close();

echo json_encode($markers);
?>
