<?php
include "koneksi.php";

$nama = isset($_GET['nama']) ? htmlspecialchars(mysqli_real_escape_string($conn, $_GET['nama'])) : '';

if (isset($_GET['bayar_id'])) {
  $bayar_id = intval($_GET['bayar_id']);
  $updateSql = "UPDATE pemesanan SET bayar = 'Dibayar' WHERE id = ?";
  $updateStmt = $conn->prepare($updateSql);

  if ($updateStmt) {
      $updateStmt->bind_param("i", $bayar_id);
      $updateStmt->execute();
      $updateStmt->close();
  }
}

$sql = "SELECT * FROM pemesanan WHERE pemesan = ?";
$stmt = $conn->prepare($sql);

if (!$stmt) {
    die("Error in prepared statement: " . $conn->error);
}

$stmt->bind_param("s", $nama);
$stmt->execute();
$result = $stmt->get_result();
$stmt->close();
$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Florism/Tiket</title>
    <link rel="stylesheet" type="text/css" href="css/tiket.css">
    <script src="js/scripttiket.js"></script>
    <script>
        function hapusPesanan(idPesanan) {
            const xhr = new XMLHttpRequest();
            xhr.onreadystatechange = function () {
                if (xhr.readyState == 4 && xhr.status == 200) {
                    window.location.reload();
                }
            };
            xhr.open("GET", "hapuspesanan.php?id=" + idPesanan, true);
            xhr.send();
        }

        function bayarPesanan(idPesanan) {
            const xhr = new XMLHttpRequest();
            xhr.onreadystatechange = function () {
                if (xhr.readyState == 4 && xhr.status == 200) {
                    window.location.reload();
                }
            };
            xhr.open("GET", "tiket.php?bayar_id=" + idPesanan, true);
            xhr.send();
        }
    </script>
    
</head>
<body>
    <header>
        <img onclick="keutama()" src="css/Asset/florism.jpeg">
        <ul>
            <li><button id="home" onclick="ketiket()">Ticket</button></li>
            <li><button id="home" onclick="kegallery()">Gallery</button></li>
            <li><button id="home" onclick="keprofile()">Profile</button></li>
            <li><button id="logout" onclick="kelogout()">Logout</button></li>
        </ul>
    </header>
    <div id="konten" class="konten">
        <h1>Pesanan Anda </h1>
        <div class="isian">
            <?php
            if ($result->num_rows > 0) {
              $counter = 1;
                while ($row = $result->fetch_assoc()) {
                    echo '<div class="keranjang">';
                    echo '<div class="card">';
                    echo '<h3>' . $row['namwis'] . '</h3>';
                    echo '<h4>Tanggal: ' . $row['tanggal'] . ' , ' . $row['jumlah'] . ' Pcs</h4>';
                    echo '<a href="javascript:void(0);" onclick="bayarPesanan(' . $row['id'] . ')">Bayar</a>';
                    echo '<button id="hapuz'. $counter .'" onclick="hapusPesanan(' . $row['id'] . ')">Hapus</button>';
                    echo '<input type=text id="kocak'.$counter.'" value="'.$row['bayar'].'">';
                    echo '</div>';
                    echo '<img src="php/uploads/' . $row['namgam'] . '">';
                    echo '</div>';
                    $counter++;
                }
            }
            ?>
        </div>
          
          
      <div class="hiasan">
          <h2 id="jelajahi" >Jelahi Wisata Populer Lainnya </h2>
          <h4> Mungkin Anda Menyukai </h4>
          <div class="container">
    <input type="radio" name="slider" id="item-1" checked>
    <input type="radio" name="slider" id="item-2">
    <input type="radio" name="slider" id="item-3">
    <div class="cards">
      <label class="cardss" for="item-1" id="song-1">
        <img src="php/uploads/parangtritis.jpg" alt="song">
      </label>
      <label class="cardss" for="item-2" id="song-2">
        <img src="php/uploads/indrayanti.jpg" alt="song">
      </label>
      <label class="cardss" for="item-3" id="song-3">
        <img src="php/uploads/pengilon.jpg" alt="song">
      </label>
    </div>
    <div class="player">
      <div class="upper-part">
        <div class="play-icon">
          <svg width="20" height="20" fill="#2992dc" stroke="#2992dc" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" class="feather feather-play" viewBox="0 0 24 24">
            <defs />
            <path d="M5 3l14 9-14 9V3z" />
          </svg>
        </div>
        <div class="info-area" id="test">
          <label class="song-info" id="song-info-1">
            <div class="title">Bunker</div>
            <div class="sub-line">
              <div class="subtitle">Balthazar</div>
              <div class="time">4.05</div>
            </div>
          </label>
          <label class="song-info" id="song-info-2">
            <div class="title">Words Remain</div>
            <div class="sub-line">
              <div class="subtitle">Moderator</div>
              <div class="time">4.05</div>
            </div>
          </label>
          <label class="song-info" id="song-info-3">
            <div class="title">Falling Out</div>
            <div class="sub-line">
              <div class="subtitle">Otzeki</div>
              <div class="time">4.05</div>
            </div>
          </label>
        </div>
      </div>
      <div class="progress-bar">
        <span class="progress"></span>
      </div>
    </div>
  </div>
      </div>

  </body>
  </html>