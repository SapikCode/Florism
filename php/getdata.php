<?php
// get_data.php

// Koneksi ke database
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "dbflorism";

$conn = new mysqli($servername, $username, $password, $dbname);

header("Access-Control-Allow-Origin: *");

if ($conn->connect_error) {
    die("Koneksi ke database gagal: " . $conn->connect_error);
}

// Ambil data dari tabel galeridb
$sql = "SELECT * FROM galeridb";
$result = $conn->query($sql);

$data = [];

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $row['fotowisata'] = base64_encode($row['fotowisata']); // Encode gambar ke base64
        $data[] = $row;
    }
}

// Tutup koneksi ke database
$conn->close();

// Kembalikan data sebagai JSON
header('Content-Type: application/json');
echo json_encode($data);
?>
