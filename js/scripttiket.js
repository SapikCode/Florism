function kehome(){
    window.location.href = ("menutama.html")
}

function kegallery(){
    const urlParams = new URLSearchParams(window.location.search);
    const namas = urlParams.get('nama');
    window.location.href = ("galeribaru.php?id=")  + encodeURIComponent(namas);
}

function keprofile(){
    const urlParams = new URLSearchParams(window.location.search);
    const namas = urlParams.get('nama');
    window.location.href = "profile.php?id=" + encodeURIComponent(namas);
        
}

function keutama(){
    const urlParams = new URLSearchParams(window.location.search);
    const namas = urlParams.get('nama');
    window.location.href = "menutama.php?id=" + encodeURIComponent(namas);
}



function kelogout(){
    window.location.href = ("mainmenu.php")
}


document.addEventListener("DOMContentLoaded", function () {
    const elements = document.querySelectorAll('[id^="kocak"]');
    elements.forEach(function (element) {
        const isi = element.value;
        const idCounter = element.id.replace('kocak', '');
        const status = document.getElementById('hapuz' + idCounter);
        if (isi == "Dibayar") {
            status.style.backgroundColor = "green";
            status.innerHTML = "Dibayar";
        }
    });
});