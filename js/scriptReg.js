document.addEventListener("DOMContentLoaded", function () {
    // This ensures that the DOM is fully loaded before executing the script

    const urlParams = new URLSearchParams(window.location.search);
    const total = urlParams.get('harga');

    document.getElementById("totalhg").value = total;
});




function pesanan(){
   
}


function login(){
    window.location.href = ("login.html")
}

function menutama(){
    window.location.href = ("mainmenu.html")
}

function mainmenu(){
    window.location.href = ("mainmenu.html")
}