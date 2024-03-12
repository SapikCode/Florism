<?php
include "koneksi.php";

// Ambil data dari database
$sql = "SELECT * FROM galeridb";
$result = $conn->query($sql);

// Tutup koneksi ke database
$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="css/gal.css">
    <script src="js/scriptgl.js"></script>
    <title>Florism Dashboard - Tampil Data</title>
</head>
<body>

<header>
        <img onclick="keutama()" src="css/Asset/florism.jpeg">

        <div class="searchbar">
            <input type="text" id="searchBarWisata" placeholder="Cari Wisata">
            <button onclick="searchWisata()">Cari</button>
        </div>
        
        <ul>
            <li><button id="home" onclick="ketiket()">Ticket</button></li>
            <li><button id="home" onclick="kegallery()">Gallery</button></li>
            <li><button id="home" onclick="kprofil()">Profile</button></li>
            <li><button id="logout" onclick="logout()">Logout</button></li>
        </ul>
    </header>


    <div id="konten" class="konten">
    <?php
    // Periksa apakah ada data yang ditemukan
    if ($result->num_rows > 0) {
        // Tampilkan data dalam bentuk card
        while ($row = $result->fetch_assoc()) {
            echo '<div  class="card">';
            echo '<img onclick="pesan('. $row['id_wisata'] .')" src="php/uploads/' . $row['namagambar'] . '" alt="Wisata">'; // Tambahkan atribut alt
            echo '<div  class="card-body">';
            echo '<h2>' . $row['namawisata'] . '</h2>';
            echo '<p>&#10026; ' . $row['ratingwisata'] . '/5</p>';
            echo '<p>Start From: Rp' . $row['hargawisata'] . '</p>';
            echo '<a href="' . $row['linkwisata'] . '">&#128962; Location</a>';
            echo '</div>';
            echo '</div>';
        }
    } else {
        echo 'Tidak ada data wisata.';
    }
    ?>
    </div>
    <img id="finds" src="css/Asset/find.png">
    <div id="searchNotFound"></div>
</body>
<script>
    function kprofil(){
    const urlParams = new URLSearchParams(window.location.search);
    const namas = urlParams.get('id');
    window.location.href = "profile.php?id=" + encodeURIComponent(namas);
    }

    function logout(){
        window.location.href="mainmenu.php";
    }

    </script>
</html>
