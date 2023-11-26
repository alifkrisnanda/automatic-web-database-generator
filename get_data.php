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

// Ambil data dari tabel kontrol
$sql = "SELECT * FROM kontrol";
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
