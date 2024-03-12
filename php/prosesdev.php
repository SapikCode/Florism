<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  // Ambil data dari formulir dan lakukan pembersihan
  $namaWisata = htmlspecialchars($_POST["namaWisata"]);
  $rating = intval($_POST["rating"]);
  $harga = htmlspecialchars($_POST["harga"]);
  $linkWisata = htmlspecialchars($_POST["linkWisata"]);

  // Handle file upload
  $targetDirectory = "uploads/";
  $targetFile = $targetDirectory . basename($_FILES["fotoWisata"]["name"]);

  // Cek apakah file gambar atau bukan
  $imageFileType = strtolower(pathinfo($targetFile, PATHINFO_EXTENSION));
  if (!getimagesize($_FILES["fotoWisata"]["tmp_name"])) {
    die("File yang diunggah bukan gambar.");
  }

  // Cek apakah file sudah ada
  if (file_exists($targetFile)) {
    die("File sudah ada.");
  }

  // Batasi ukuran file gambar jika diperlukan

  // Pindahkan file gambar ke direktori tujuan
  if (!move_uploaded_file($_FILES["fotoWisata"]["tmp_name"], $targetFile)) {
    die("Gagal mengunggah file.");
  }

  $imgName = basename($targetFile);

  // Simpan data ke database menggunakan MySQLi
  $servername = "localhost";
  $username = "root";
  $password = "";
  $dbname = "florismdb";

  // Buat koneksi ke database
  $conn = new mysqli($servername, $username, $password, $dbname);

  // Periksa koneksi
  if ($conn->connect_error) {
    die("Koneksi ke database gagal: " . $conn->connect_error);
  }

  // Siapkan dan jalankan query untuk menyimpan data
  $sql = "INSERT INTO galeridb (fotowisata ,namawisata ,ratingwisata, hargawisata, linkwisata, namagambar) VALUES (?, ?, ?, ?, ?,?)";
  $stmt = $conn->prepare($sql);
  $stmt->bind_param("ssdsss",$targetFile, $namaWisata, $rating, $harga, $linkWisata, $imgName);

  if ($stmt->execute()) {
  header("Location: datawisata.php");
  } else {
    echo "Error: " . $sql . "<br>" . $conn->error;
  }

  // Tutup koneksi ke database
  $stmt->close();
  $conn->close();
}
?>
