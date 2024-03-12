


document.addEventListener("DOMContentLoaded", function () {
    // This ensures that the DOM is fully loaded before executing the script

    const urlParams = new URLSearchParams(window.location.search);
    const isian = urlParams.get('id');
    const user = document.getElementById('admin');
    const isi = document.getElementById('halo');

    if (isian == "Admin"){
        user.style.visibility=("visible");
        isi.innerHTML="Hai Admin Tampan";
    }else{
        isi.innerHTML="Selamat Datang, "+isian;
    }
});
//fungsi navbar
function keadmin(){
    window.location.href = ("php/adminutama.php")
}


function kehome(){
    window.location.href = ("menutama.html")
}
function ketiket() {
    const urlParams = new URLSearchParams(window.location.search);
    const isian = urlParams.get('id');
    window.location.href = "tiket.php?nama=" + encodeURIComponent(isian);
}


function kegallery() {
    const urlParams = new URLSearchParams(window.location.search);
    const isian = urlParams.get('id');
    window.location.href = "galeribaru.php?id=" + encodeURIComponent(isian);
}

function keprofile() {
    const urlParams = new URLSearchParams(window.location.search);
    const isian = urlParams.get('id');
    window.location.href = "profile.php?id=" + encodeURIComponent(isian);
}


function kelogout(){
    window.location.href = ("mainmenu.html")
}
function keregister(){
    window.location.href = ("registrasi.html")
}

// Halaman
function haljelajah(){
    var tujuanElement = document.getElementById('jel');
    tujuanElement.scrollIntoView({ behavior: 'smooth' });
}
function haleven(){
    var tujuanElement = document.getElementById('even');
    tujuanElement.scrollIntoView({ behavior: 'smooth' });    
}

// Baca Selengkapnya
function JogjaNatureCamp() {
    window.location.href = ("https://visitingjogja.jogjaprov.go.id/40052/jogja-nature-camp-21-22-oktober-2023/")
}
function JogjaToursimDay() {
    window.location.href = ("https://jogjaprov.go.id/berita/jogja-tourism-day-2023-momentum-memajukan-pariwisata-kulon-progo")
}
function GunungKidul() {
    window.location.href = ("https://visitingjogja.jogjaprov.go.id/39765/gunungkidul-tourism-fest-2023-18-27-september-2023/")
}

