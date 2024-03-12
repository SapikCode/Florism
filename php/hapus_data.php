<?php
// Buat koneksi ke database (gantilah dengan informasi koneksi yang sesuai)
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "florismdb";

$conn = new mysqli($servername, $username, $password, $dbname);

// Periksa koneksi
if ($conn->connect_error) {
    die("Koneksi ke database gagal: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Ambil data dari permintaan POST
    $namaWisata = $_POST["namawisata"];

    // Query untuk menghapus data
    $sqlDelete = "DELETE FROM galeridb WHERE namawisata = '$namaWisata'";

    if ($conn->query($sqlDelete) === TRUE) {
        echo "Data berhasil dihapus.";
    } else {
        echo "Error: " . $conn->error;
    }
}

// Tutup koneksi ke database
$conn->close();
?>
