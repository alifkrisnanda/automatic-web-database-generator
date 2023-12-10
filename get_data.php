<?php
// Koneksi ke database
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "ruangan";

$conn = new mysqli($servername, $username, $password, $dbname);

// Periksa koneksi
if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}

// Ambil parameter "waktuAwal" dan "waktuAkhir" jika ada
$waktuAwal = isset($_GET['waktuAwal']) ? $_GET['waktuAwal'] : null;
$waktuAkhir = isset($_GET['waktuAkhir']) ? $_GET['waktuAkhir'] : null;

// Logika pencarian berdasarkan rentang waktu
// Gantilah dengan logika sesuai kebutuhan
if ($waktuAwal && $waktuAkhir) {
    $sql = "SELECT * FROM kontrol WHERE waktu BETWEEN '$waktuAwal' AND '$waktuAkhir'";
} else {
    // Ambil semua data jika tidak ada rentang waktu yang dipilih
    $sql = "SELECT * FROM kontrol";
}

$result = $conn->query($sql);

if ($result->num_rows > 0) {
    $data = array();
    while ($row = $result->fetch_assoc()) {
        $data[] = $row;
    }
    echo json_encode($data);
} else {
    echo "Data tidak ditemukan";
}

$conn->close();
?>
