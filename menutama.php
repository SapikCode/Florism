<?php
include "koneksi.php";
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

if (isset($_GET['error'])) {
    echo '<p class="error-message">' . htmlspecialchars($_GET['error']) . '</p>';
} elseif (isset($_GET['success'])) {
    echo '<p class="success-message">' . htmlspecialchars($_GET['success']) . '</p>';
}


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
    <title>Florism/Home</title>
    <link rel="stylesheet" type="text/css" href="css/stylee.css">
    <script src="js/scriptMenu.js"></script>   
    <script src="https://unpkg.com/scrollreveal"></script>
</head>
<body>
    <header>
        <img id='img-click' onclick="kehome()" src="css/Asset/florism.jpeg">
        <ul>
            <li><div id="admin" class="user">
                <img src="css/Asset/userlogin.png">
               <button onclick="keadmin()" >Admin</button>
            </div></li>
            
            <li><button id="home" onclick="ketiket()">Ticket</button></li>
            <li><button id="home" onclick="kegallery()">Gallery</button></li>
            <?php
    // Periksa apakah ada data yang ditemukan
    if ($result->num_rows > 0) {
        // Tampilkan data dalam bentuk card
        while ($row = $result->fetch_assoc()) {
            $username = htmlspecialchars($row['username']);
            $email = htmlspecialchars($row['email']);
            echo '<li><button id="home" onclick="keprofile()">Profile</button></li>';
        }
    }
         ?>
        
        <li><button id="logout" onclick="kelogout()">Logout</button></li>
        </ul>
    </header>
    <div id="kontenu" class="konten">
        <div class="banner">
            <h4>Mari Jelajahi Wisata Alam Di Wilayah Anda</h4>
            <div class="bantu">
                <h5 id="halo"></h5>
            </div>
            <div class="btnban">
                <img onclick="haljelajah()" src="css/Asset/jela.png">
                <img onclick="haleven()" src="css/Asset/even.png">
            </div>
        </div>
        <div class="jelajah">
            <h2 id="kamu">Mulai Jelajahi</h2>
        </div>
    <div id="jel" class="like">
    <div id="gunkid" class="read"  data-aos="fade-right" data-aos-duration="500">
        <div class="isi">
            <h3>Gunung Kidul</h3>
            <button>Jelajahi</button>
        </div>
    </div>

    <div id="bantul" class="read" data-aos="fade-right" data-aos-duration="1000">
        <div class="isi">
            <h3>Bantul</h3>
            <button>Jelajahi</button>
        </div>
    </div>

    <div id="kulon" class="read" data-aos="fade-right" data-aos-duration="1500">
        <div class="isi">
            <h3>Kulon Progo</h3>
            <button>Jelajahi</button>
        </div>
    </div>

    <div id="magel" class="read" data-aos="fade-right" data-aos-duration="2000">
        <div class="isi">
            <h3>Magelang</h3>
            <button>Jelajahi</button>
        </div>
    </div>
    </div>
    <h2 id="kamu">Destinasi Dengan Rating Tertinggi</h2>
    <div id="pop" class="like">
        <div id="heh" class="read" data-aos="fade-right" data-aos-duration="500">
            <div class="isi">
                <h3>Heha Forest</h3>
                <button>Jelajahi</button>
            </div>
        </div>
    
        <div id="bupe" class="read" data-aos="fade-right" data-aos-duration="1000">
            <div class="isi">
                <h3>Bukit Pengilon</h3>
                <button>Jelajahi</button>
            </div>
        </div>
    
        <div id="obe" class="read" data-aos="fade-right" data-aos-duration="1500">
            <div class="isi">
                <h3>Obelix Village</h3>
                <button>Jelajahi</button>
            </div>
        </div>
    
        <div id="hut" class="read" data-aos="fade-right" data-aos-duration="2000">
            <div class="isi">
                <h3>Hutan Pinus</h3>
                <button>Jelajahi</button>
            </div>
        </div>
        </div>


    <div id="even" class="colum">
        <h1 id="mari">Yuk liat event di Yogyakarta</h1>
    <div class="events">
        <h1>Jogja Nature Camp </h1>
        <h2>Tanggal: 21-22 Oktober 2023
            Tempat: Karang Pramuka – Yogyakarta</h2>
        <button onclick="JogjaNatureCamp()">Baca Selengkapnya</button>
    </div>
    <div id="event2" class="events">
        <h1>Jogja Tourism Day</h1>
        <h2>Tanggal: 23-27 September 2023
            Tempat: Pantai Glagah Yogyakarta</h2>
        <button onclick="JogjaTourismDay()">Baca Selengkapnya</button>
    </div>
    <div id="event3" class="events">
        <h1>Gunung Kidul Tourism Day</h1>
        <h2>Tanggal: 18-27 September 2023
            Tempat: Desa Wisata Tepus - Gunung Kidul</h2>
        <button onclick="GunungKidul()">Baca Selengkapnya</button>
    </div>
    </div>
    </div>

    
</body>
<footer>
    <div class="footer-content">
        <div class="footer-left">
            <p>&copy; 2023 Florism. All rights reserved.</p>
        </div>
        <div class="footer-right">
            <ul>
                <li><a href="#">Privacy Policy</a></li>
                <li><a href="#">Terms of Service</a></li>
                <li><a href="#">Contact Us</a></li>
            </ul>
        </div>
    </div>
</footer>
<script>

function kelogout() {
    // Gunakan API fetch atau metode lain untuk membuat permintaan AJAX
    fetch("logout.php", {
        method: 'GET',
    })
    .then(response => {
        if (response.ok) {
            return response.json();
        } else {
            throw new Error('Logout gagal');
        }
    })
    .then(data => {
        // Alihkan ke halaman login atau halaman lain
        window.location.href = "mainmenu.php";
    })
    .catch(error => {
        console.error('Logout gagal', error);
    });
}

    const scrollRevealOption = {
            origin: "top",
            distance: "100px",
            duration: 500,
            delay: 0.5,
            opacity: 0,
            scale: 0.8,
            easing: "cubic-bezier(0.5, 0, 0, 1)",
            reset: true
        };
        ScrollReveal().reveal(".events",scrollRevealOption);
        
        const yuk = {
            origin: "left",
            distance: "400px",
            duration: 1000,
            delay: 0.5,
            opacity: 0,
            scale: 0.8,
            easing: "cubic-bezier(0.5, 0, 0, 1)",
            reset: true
        };
        ScrollReveal().reveal(".colum",yuk);
    
        const reveal = {
            origin: "top",
            distance: "0px",
            duration: 500,
            delay: 0,
            opacity: 0,
            scale: 0.9  ,
            reset: true
        };
        ScrollReveal().reveal(".like", reveal);
</script>
</html>