<?php
include "koneksi.php";

if (session_status() == PHP_SESSION_NONE) {
    session_start();
}



$id_wisata = $_GET['id_wisata'];

$sql = "SELECT namawisata, hargawisata, namagambar, linkwisata FROM galeridb WHERE id_wisata = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $id_wisata);
$stmt->execute();
$result = $stmt->get_result();

// Ambil satu baris hasil query
$row = $result->fetch_assoc();

$stmt->close();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $tanggal = $_POST['Tanggal'];
    $jumlahTiket = $_POST['jumlahTiket'];

    $sqlPemesanan = "INSERT INTO pemesanan (namwis, tanggal, jumlah, namgam, linkwis, pemesan) VALUES (?, ?, ?, ?, ?, ?)";
    $stmtPemesanan = $conn->prepare($sqlPemesanan);
    $stmtPemesanan->bind_param("ssisss", $row['namawisata'], $tanggal, $jumlahTiket, $row['namagambar'], $row['linkwisata'], $_GET['nama']);

    if ($stmtPemesanan->execute()) {
        echo '<div class="notifikasi">';
        echo '<h1> Berhasil Dipesan </h1>';
        echo '<button onclick="cek()"> Cek Pesanan </button>';
        echo '</div>';
    } else {
        echo "Error: " . $stmtPemesanan->error; 
    }

    $stmtPemesanan->close();
}

$conn->close();
?>  

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Florism/PemesananTiket</title>
    <link rel="stylesheet" type="text/css" href="css/formtike.css">
    <script src="js/scriptfor.js"></script>
</head>
<body>
    <div class="konten">
        <div class="colum">
            <?php
            // Cek apakah $row tidak kosong sebelum looping
            if ($row) {
                echo '<form method="post" action="">'; 
                echo '<h1>Selesaikan Pemesanan Anda</h1>';
                echo '<label for="namwis">Wisata :</label>';
                echo '<input id="namwis" type="text" name="namwis" value="'. $row['namawisata'] .'" readonly>';
                echo '<label for="Tanggal">Tanggal :</label>';
                echo '<input id="Tanggal" name="Tanggal" type="date" required> ';
                echo '<label for="jumlahTiket">Jumlah Tiket:</label> ';
                echo '<input type="number" id="jumlahTiket" name="jumlahTiket" value="1" required><br>';
                echo '<label id="labelharga" for="harga">Harga : </label> ';
                echo '<input id="harga" type="text" name="harga" value="'. $row['hargawisata'].'" readonly>';
                echo ' <button type="button" id="charga" onclick="hargabaru()" >Cek Harga</button>';
                echo ' <button type="submit" onclick="tambahTiket()">Pesan Ticket</button> ';
                echo '</form>';
            } else {
                echo '<p>Data tidak ditemukan.</p>';
            }
           ?>
        </div>
        <?php
            // Cek apakah $row tidak kosong sebelum menggunakan
            if ($row) {
                echo '<img id="ayam" src="php/uploads/' . $row['namagambar'] . '">';
            }
        ?>
    </div>
    <div id="notifp" class="notif">
        <h1>Berhasil Ditambahkan</h1>
        <button onclick="kembali()">Kembali</button>
    </div>
</body>
</html>
