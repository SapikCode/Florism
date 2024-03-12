<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="css/datawisataa.css">
    <title>Data Wisata</title>
</head>
<body>

<h1>Kelola Data Wisata </h1>

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

// Query untuk mengambil data dari tabel
$sql = "SELECT namawisata, ratingwisata, hargawisata FROM galeridb";
$result = $conn->query($sql);

// Periksa apakah query berhasil dieksekusi
if ($result->num_rows > 0) {
    // Output data dalam bentuk tabel
    echo "<table>";
    echo "<tr><th>Nama Wisata</th><th>Rating</th><th>Harga</th></tr>";

    while ($row = $result->fetch_assoc()) {
        echo "<tr>";
        echo "<td>" . $row["namawisata"] . "</td>";
        echo "<td>" . $row["ratingwisata"] . "</td>";
        echo "<td>" . $row["hargawisata"] . "</td>";
        echo '<td><button class="hapus-btn" data-id="' . $row["namawisata"] . '">Hapus</button></td>';
        echo "</tr>";
    }

    echo "</table>";
} else {
    echo "Tidak ada data ditemukan.";
}

// Tutup koneksi ke database
$conn->close();
?>

</body>
<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
<script>
    document.addEventListener('DOMContentLoaded', function () {
        var buttons = document.querySelectorAll('.hapus-btn');

        buttons.forEach(function (button) {
            button.addEventListener('click', function () {
                var namaWisata = this.getAttribute('data-id');
                
                // Tampilkan dialog konfirmasi
                var konfirmasi = confirm("Apakah Anda yakin ingin menghapus data?");
                
                if (konfirmasi) {
                    // Jika pengguna memilih "Ya", lanjutkan dengan penghapusan
                    var xhr = new XMLHttpRequest();
                    var endpoint = 'hapus_data.php';

                    xhr.onreadystatechange = function () {
                        if (xhr.readyState === XMLHttpRequest.DONE) {
                            if (xhr.status === 200) {
                                // Refresh halaman setelah penghapusan selesai
                                location.reload();
                            } else {
                                console.error(xhr.responseText);
                            }
                        }
                    };

                    xhr.open('POST', endpoint, true);
                    xhr.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
                    xhr.send('namawisata=' + encodeURIComponent(namaWisata));
                } else {
                    // Jika pengguna memilih "Tidak", batalkan penghapusan
                    alert("Penghapusan dibatalkan.");
                }
            });
        });
    });
</script>
</html>
