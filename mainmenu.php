<?php
include "koneksi.php";

if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Florism/Home</title>
    <link rel="stylesheet" type="text/css" href="css/utama.css">
    <script src="js/scriptMain.js"></script>
    <script src="https://unpkg.com/scrollreveal"></script>
</head>
<body>
    <header>
        <img id='img-click' src="css/Asset/florism.jpeg">
        <ul>
            <li><button id="home" onclick="kegallery()">Ticket</button></li>
            <li><button id="home" onclick="kegallery()">Gallery</button></li>
            <li><button id="home" onclick="kegallery()">Profile</button></li>
            <li><button onclick="login()">Login</button></li>
            <li><button id="registerbaru" onclick="registerhead()">Register</button></li>
        </ul>
    </header>
    <div id="kontenu" class="konten">
        <div class="banner">
            <h4>Mari Jelajahi Wisata Alam Di Wilayah Anda</h4>
            <div class="bantu">
                <h5>Sudah Ada Planning ?</h5>
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
    <div id="gunkid" class="read">
        <div class="isi">
            <h3>Gunung Kidul</h3>
            <button>Jelajahi</button>
        </div>
    </div>

    <div id="bantul" class="read">
        <div class="isi">
            <h3>Bantul</h3>
            <button>Jelajahi</button>
        </div>
    </div>

    <div id="kulon" class="read">
        <div class="isi">
            <h3>Kulon Progo</h3>
            <button>Jelajahi</button>
        </div>
    </div>

    <div id="magel" class="read">
        <div class="isi">
            <h3>Magelang</h3>
            <button>Jelajahi</button>
        </div>
    </div>
    </div>
    <h2 id="kamu">Destinasi Dengan Rating Tertinggi</h2>
    <div id="pop" class="like">
        <div id="heh" class="read">
            <div class="isi">
                <h3>Heha Forest</h3>
                <button>Jelajahi</button>
            </div>
        </div>
    
        <div id="bupe" class="read">
            <div class="isi">
                <h3>Bukit Pengilon</h3>
                <button>Jelajahi</button>
            </div>
        </div>
    
        <div id="obe" class="read">
            <div class="isi">
                <h3>Obelix Village</h3>
                <button>Jelajahi</button>
            </div>
        </div>
    
        <div id="hut" class="read">
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
        <button onclick="JogjaToursimDay()">Baca Selengkapnya</button>
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


<div id="masking" class="mask"></div>
// form login 
<div id="log" class="form">
<form method="post" action="login.php">
    <img onclick="exit()" src="css/Asset/reject.png">
    <h1>welcome To Florism</h1>
    <h3>Please Sign In</h3>
    <input name="log-username" type="text" placeholder="Username"><br>
    <input type="password" name="log-password" placeholder="Password"><br>
    <input id="login" onclick="hasil(event)" type="submit" value="Login"><br>
    </form>
</div>

<?php
    if (isset($error_message)) {
        echo '<p class="error-message">' . $error_message . '</p>';
    }
    ?>

// form register
<div id="reg" class="form">
<form method="post" action="register.php">
    <img onclick="exitRegister()" src="css/Asset/reject.png">
    <h3>Please Sign Up</h3>
    <input name="reg-username" type="text" placeholder="Username"><br>
    <input name="reg-email" type="text" placeholder="Email"><br>
    <input type="password" name="reg-password" placeholder="Password"><br>
    <input id="register" onsubmit="register()" type="submit" value="Daftar"><br>
</form>
</div>

<div id="aler" class="alert">
    <h1>Silakan Login Terlebih Dahulu</h1>
</div>
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
    function hasil(event) {
    event.preventDefault(); // Prevent the default form submission
    // Get the values of username and password
    var username = document.getElementsByName("log-username")[0].value;
    var password = document.getElementsByName("log-password")[0].value;

    // Check if username and password are not empty
    if (username.trim() === '' || password.trim() === '') {
        // Display an alert if username or password is empty
        alert("Silakan masukkan username dan password !");
    } else {
        // Make an asynchronous request to login.php
        fetch("login.php", {
            method: 'POST',
            headers: {
                'Content-Type': 'application/x-www-form-urlencoded',
            },
            body: new URLSearchParams({
                'log-username': username,
                'log-password': password,
            }),
        })
        .then(response => response.json())
        .then(data => {
            // Handle the response data, e.g., redirect or show a message
if (data.success) {
    var user = document.getElementsByName("log-username")[0].value;
    window.location.href = "menutama.php?id=" + encodeURIComponent(user); // Redirect on success
} else {
    alert(data.message);
    console.error('Login failed:', data.message); // Log the error to the console
}

        })
    }
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