<?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "ruangan";

$conn = new mysqli($servername, $username, $password, $dbname);


if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}


$temperature = rand(20, 39); 
$humidity = rand(50, 70); 
$ac = rand(0, 1);
$electricity = rand(40, 70);
$water = rand(40, 70);
$wifi = rand(0, 1);
$alarm = rand(0, 1);
$livingroom = rand(0, 1);
$diningroom = rand(0, 1);
$kitchen = rand(0, 1);
$bathroom1 = rand(0, 1);
$bathroom2 = rand(0, 1);
$bedroom1 = rand(0, 1);
$bedroom2 = rand(0, 1);
$garage = rand(0, 1);


$sql = "INSERT INTO kontrol (
    temperature, humidity, ac, electricity, water, wifi, alarm,
    livingroom, diningroom, kitchen, bathroom1, bathroom2, bedroom1, bedroom2, garage
) VALUES (
    $temperature, $humidity, $ac, $electricity, $water, $wifi, $alarm,
    $livingroom, $diningroom, $kitchen, $bathroom1, $bathroom2, $bedroom1, $bedroom2, $garage
)";

if ($conn->query($sql) === TRUE) {
    echo "Data berhasil disimpan";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>
