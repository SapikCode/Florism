<?php
include "koneksi.php";

// Mengambil ID pesanan dari parameter GET
$idPesanan = isset($_GET['id']) ? intval($_GET['id']) : 0;

// Validasi ID pesanan
if ($idPesanan <= 0) {
    // ID pesanan tidak valid, bisa tambahkan penanganan kesalahan di sini
    die("Invalid ID Pesanan");
}

// Hapus pesanan dari database
$sql = "DELETE FROM pemesanan WHERE id = ?";
$stmt = $conn->prepare($sql);

if (!$stmt) {
    die("Error in prepared statement: " . $conn->error);
}

$stmt->bind_param("i", $idPesanan);
$stmt->execute();
$stmt->close();
$conn->close();

// Response berhasil
http_response_code(200);
echo "Pesanan berhasil dihapus";
?>
