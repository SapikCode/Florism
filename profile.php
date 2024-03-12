<?php
include "koneksi.php";

$nama = $_GET['id'];

$sql = "SELECT username, email FROM datauserregister WHERE username = '$nama'";
$result = $conn->query($sql);

// Tutup koneksi ke database
$conn->close();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="css/profile.css">
    <script src="js/scriptProfile.js"></script>
    <title>Florism/Profile</title>
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
    <div class="container">
        <h1>Profile</h1>
        <div class="profile-pic">
            <img id="imagePreview" src="css/Asset/ayam.png">
        </div>
        <div class="details">
            <label for="fileInput" style="padding: 5px; background-color:black; width: 180px; color: white; margin-left: 26%; border-radius: 10px;">
                Ganti Foto </label>
            <input type="file" id="fileInput" accept="image/*" style="display: none;">
            <label for="name">Username:</label>
            <?php
            if ($result->num_rows > 0) {
                // Tampilkan data dalam bentuk card
                while ($row = $result->fetch_assoc()) {
                    $username = htmlspecialchars($row['username']);
                    $email = htmlspecialchars($row['email']);
                    echo '<input type="text" id="name" name="name" value="' . $username . '" >';
                    echo '<label for="email">Email:</label> ';
                    echo '<input type="text" id="email" name="email" value="'.$email.'" >';
                }
            }
            ?>
            <label id="labels" for="pass">Password Baru:</label>
            <input type="text" id="pass" name="pass">
            <button onclick="ganti()">Ganti Kata Sandi </button>
        </div>
    </div>
</body>
<script>
</script>
</html>
