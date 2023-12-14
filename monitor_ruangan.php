<?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "ruangan";

// Membuat koneksi
$conn = new mysqli($servername, $username, $password, $dbname);

// Memeriksa koneksi
if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}

// Mengambil data dari tabel kontrol
$sql = "SELECT * FROM kontrol ORDER BY id_ruangan DESC LIMIT 1";
// $sql = "SELECT * FROM kontrol
// WHERE temperature > (SELECT AVG(temperature) FROM kontrol);";
$result = $conn->query($sql);

// Menutup koneksi
$conn->close();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="ruangan_styles.css">
    <title>Ruangan Monitoring</title>
</head>

<body>
    <nav>
        <ul class="samping">
            <li class="left"><a href="index.html">Dashbord</a></li>
            <li class="left"><a>Alif's Home</a></li>
            <li><a href="#"><?php echo date("M d, Y"); ?></a></li>
            <li><a href="#"><?php echo date("h:i A"); ?></a></li>
        </ul>
    </nav>

    <!-- card atas -->

    <div class="card-container">
        <?php
        // Menampilkan data dari tabel kontrol di dalam card atas
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                echo '<div class="card" style="width: 17rem; height: 9rem;">';

                // Menampilkan data sesuai kolom dalam tabel kontrol
                echo '<div class="data">';
                echo '<div class="hum">';
                echo '<img src="assets/images/thermometer.png" alt="Temperature" class="icon">';
                echo '<h4>Temperature</h4>';
                echo '<p>' . $row['temperature'] . '°C</p>';
                echo '</div>';
                echo '<div class="temp">';
                echo '<img src="assets/images/humidity.png" alt="Humidity" class= "icon">';
                echo '<h4>Humidity</h4>';
                echo '<p>' . $row['humidity'] . '%</p>';
                echo '</div>';
                echo '</div>';

                // Menampilkan data AC dan tombol
                echo '<h3>Air Conditioner</h3>';
                echo '<button class="button" id="ac-button" onclick="toggleStatus(\'ac\')">' . ($row['ac'] ? 'On' : 'Off') . '</button>';
                
                echo '</div>';

                // data electricity 
                echo '<div class="card" style="width: 16rem; height: 9rem;">';
                echo '<img src="assets/images/flash.png" alt="Electricity" class="icon">';
                echo '<h4>Electricity</h4>';
                echo '<p>' . $row['electricity'] . 'kWh</p>';
                echo '<div class="data">';
                echo '<div>
                <p>This Month</p>
                <p>'. $row['electricity'] . 'kWh</p>
                   </div>
                <div>
                    <p>Today</p>
                <p>'. $row['electricity'] . 'kWh</p>
              </div>
              </div>
                </div>';

                // data water
                echo '<div class="card" style="width: 16rem; height: 9rem;">';
                echo '<img src="assets/images/blood-drop.png" alt="Water" class="icon">';
                echo '<h4>Water</h4>';
                echo '<p>'. $row['water'] . 'm³</p>';
                echo '<div class="data">
                <div>
                    <p>This Month</p>
                    <p>'. $row['water'] .'m³ </p>
                </div>
                <div>
                    <p>Today</p>
                    <p>'. $row['water'] .'m³ </p>
                </div>
        </div>
      </div>
      </div>';
                // wifi
                echo '<div class="cardgrupbawah">
                <div class="gabung">
                  <div class="container">
                      <div class="cardbawa" style="width: 22rem; height: 5rem;">
                          <img class="logo" src="assets/images/wifi.png" alt="WiFi Logo">';
                // wifi button
                echo '<h2>WiFi</h2>';
                echo '<button class="button" id="wifi-button" onclick="toggleStatus(\'ac\')">' . ($row['wifi'] ? 'On' : 'Off') . '</button>';
                
                echo '</div>';

                // alarm
                echo '<div class="cardbawa" style="width: 22rem; height: 5rem;">
                <img class="logo" src="assets/images/bell.png" alt="Alarm Logo">';
                // alarm button
                echo '<h2>Alarm</h2>';
                echo '<button class="button" id="alarm-button" onclick="toggleStatus(\'ac\')">' . ($row['alarm'] ? 'On' : 'Off') . '</button>';
                
                echo '</div>';
                echo '</div>';

                // grid container pict
                echo '  <div class="grid-container">
      
                <div class="cardgrid">
                    <img src="assets/images/r.jpg" alt="Gambar 1">
                </div>
                <div class="cardgrid">
                    <img src="assets/images/r.jpg" alt="Gambar 2">
                </div>
                <div class="cardgrid">
                    <img src="assets/images/r.jpg" alt="Gambar 3">
                </div>
                <div class="cardgrid">
                    <img src="assets/images/r.jpg" alt="Gambar 4">
                </div>
            </div>';
            
            echo '<div class="card" style="width: 20rem; height: 9rem;">';
            echo '<img src="assets/images/idea.png" class="logo" alt="..."><h4>Light</h4>';
                // livingroom
            echo '<div class="samping1">';
            echo '<div class="form-check form-switch">';
            echo '<input class="form-check-input" type="checkbox" id="living-room" ' . (($row['livingroom'] == 1) ? 'checked' : '') . '>';
            echo '<label class="form-check-label" for="flexSwitchCheckDefault">Living Room</label>
            </div>';   
                // bathroom2
            echo '<div class="form-check form-switch">';
            echo '<input class="form-check-input" type="checkbox" id="living-room" ' . (($row['bathroom2'] == 1) ? 'checked' : '') . '>';
            echo ' <label class="form-check-label" for="flexSwitchCheckDefault">Bathroom 2</label>
            </div>
          </div>';
                // diningroom
            echo '<div class="samping2">
            <div class="form-check form-switch">';
            echo '<input class="form-check-input" type="checkbox" id="living-room" ' . (($row['diningroom'] == 1) ? 'checked' : '') . '>';
            echo '<label class="form-check-label" for="flexSwitchCheckDefault">Dining Room</label>
            </div>';
            // bedroom1
            echo '<div class="form-check form-switch">';
            echo '<input class="form-check-input" type="checkbox" id="living-room" ' . (($row['bedroom1'] == 1) ? 'checked' : '') . '>';
            echo '<label class="form-check-label" for="flexSwitchCheckDefault">Bedroom 1</label>
            </div>
          </div>';
            //kitchen
            echo ' <div class="samping3">
            <div class="form-check form-switch">';
            echo '<input class="form-check-input" type="checkbox" id="living-room" ' . (($row['kitchen'] == 1) ? 'checked' : '') . '>';
            echo '<label class="form-check-label" for="flexSwitchCheckDefault">Kitchen</label>
            </div>';
            // bedroom2
            echo '<div class="form-check form-switch">';
            echo '<input class="form-check-input" type="checkbox" id="living-room" ' . (($row['bedroom2'] == 1) ? 'checked' : '') . '>';
            echo '<label class="form-check-label" for="flexSwitchCheckDefault">Bedroom 2</label>
            </div>
          </div>';
            // bathroom1
            echo '<div class="samping4">
            <div class="form-check form-switch">';
            echo '<input class="form-check-input" type="checkbox" id="living-room" ' . (($row['bathroom1'] == 1) ? 'checked' : '') . '>';
            echo '<label class="form-check-label" for="flexSwitchCheckDefault">Bathroom 1</label>
            </div>';
            // garage
            echo '<div class="form-check form-switch">';
            echo '<input class="form-check-input" type="checkbox" id="living-room" ' . (($row['garage'] == 1) ? 'checked' : '') . '>';
            echo '<label class="form-check-label" for="flexSwitchCheckDefault">Garage</label>
            </div>
          </div>';

            }
        } else {
            echo "Tidak ada data dalam tabel kontrol.";
        }
        ?>
    </div>
    </div>

    <script>
        function toggleStatus(device) {
            var buttonElement = document.getElementById(device + "-button");

            if (buttonElement.innerHTML === "On") {
                buttonElement.innerHTML = "Off";
            } else {
                buttonElement.innerHTML = "On";
            }
        }
    </script>
</body>

</html>
