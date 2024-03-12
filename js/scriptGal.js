function kehome(){
    window.location.href = ("menutama.html")
}

function kekeranjang(){
    const mask = document.getElementById('masking')
    const kera = document.getElementById('keran')
    mask.style.display=("block")
    kera.style.transform=("translateY(650px)")

}

function kluar(){
    const mask = document.getElementById('masking')
    const kera = document.getElementById('keran')
    mask.style.display=("none")
    kera.style.transform=("translateY(-650px)")
}
function kegallery(){
    window.location.href = ("gallery.html")
}

function keprofile(){
    window.location.href = ("profile.html")
}

function ketiket(){
    window.location.href = ("tiket.html")
}

function kelogout(){
    window.location.href = ("mainmenu.html")
}

function ptiket(){
    alert("Berhasil Ditambahkan Ke Keranjang")
}
function lokasio(){
    window.location.href = ("https://www.google.com/maps/place/Obelix+Village+-+Mini+Zoo+Jogja/@-7.6878987,110.3733435,15z/data=!4m6!3m5!1s0x2e7a5f6a30f765dd:0x42930b153c711354!8m2!3d-7.6878987!4d110.3733435!16s%2Fg%2F11spg0pfqg?entry=ttu")
}
function lokasip(){
    window.location.href = ("https://www.google.com/maps/place/Hutan+Pinus+Mangunan/@-7.9258158,110.4291836,17z/data=!3m1!4b1!4m6!3m5!1s0x2e7a536355abb129:0x9fb567811ef62e4e!8m2!3d-7.9258158!4d110.4317585!16s%2Fg%2F11g9w4r_1f?entry=ttu")
}
function lokasih(){
    window.location.href = ("https://www.google.com/maps/place/HeHa+Forest/@-7.6259615,110.421974,17z/data=!3m1!4b1!4m6!3m5!1s0x2e7a61c56c5d6cf3:0x6f49678c04608c08!8m2!3d-7.6259615!4d110.4245489!16s%2Fg%2F11sjzr73hb?entry=ttu")
}
function lokasib(){
    window.location.href = ("https://www.google.com/maps/place/Agro+Tourism+Bhumi+Merapi/@-7.6400756,110.4238349,17z/data=!3m1!4b1!4m6!3m5!1s0x2e7a60acafd671df:0xd2d3e41c9f632fd9!8m2!3d-7.6400756!4d110.4264098!16s%2Fg%2F11csbr8533?entry=ttu")
}
function lokasibs(){
    window.location.href = ("https://www.google.com/maps?q=Mangrove+Baros&ftid=0x2e7b012df420f9b1:0xc16ee7e610808ca5")
}
function lokasik(){
    window.location.href = ("https://www.google.com/maps/place/Kebun+Buah+Mangunan/@-7.9413718,110.4221596,17z/data=!3m1!4b1!4m6!3m5!1s0x2e7a5366aaaaaaab:0x11765ecd87201338!8m2!3d-7.9413718!4d110.4247345!16s%2Fg%2F11dyxbkz1w?entry=ttu")
}
function lokasiw(){
    window.location.href = ("https://www.google.com/maps/place/Geoforest+Watu+Payung+Turunan/@-7.9743125,110.4338626,17z/data=!3m1!4b1!4m6!3m5!1s0x2e7bac8c00000001:0x963f619d5a0fdba0!8m2!3d-7.9743125!4d110.4364375!16s%2Fg%2F11cjkmq7s2?entry=ttu")
}
function lokasid(){
    window.location.href = ("https://www.google.com/maps/place/Wisata+Kalibiru/@-7.8073707,110.1160301,15z/data=!4m15!1m8!3m7!1s0x2e7aeff7db1899f3:0x6e7dd99363c5b112!2sKalibiru,+Hargowilis,+Kokap,+Kulon+Progo+Regency,+Special+Region+of+Yogyakarta!3b1!8m2!3d-7.8072986!4d110.1261135!16s%2Fg%2F11g0gc6g0y!3m5!1s0x2e7aeff7861e0b91:0x5604e4ced3f4227e!8m2!3d-7.8074219!4d110.1292682!16s%2Fg%2F11b7jz25fr?entry=ttu")
}
function lokasibp(){
    window.location.href = ("https://www.google.com/maps/place/Bukit+Pengilon/@-8.1858625,110.6890032,17z/data=!3m1!4b1!4m6!3m5!1s0x2e7bb8c8e6d72db7:0x4d8d1b8b3250c79d!8m2!3d-8.1858625!4d110.6915781!16s%2Fg%2F11cm0q6yx7?entry=ttu")
}
function lokasisp(){
    window.location.href = ("https://www.google.com/maps/place/Selopamioro+Adventure+Park/@-7.946248,110.4240107,17z/data=!3m1!4b1!4m6!3m5!1s0x2e7a5385bcecb37d:0x55fa6d31b45c69a1!8m2!3d-7.946248!4d110.4265856!16s%2Fg%2F11g0th5c26?entry=ttu")
}
function pesan(isian,ayam,harga){
    window.location.href = "formtiket.html?isian=" + encodeURIComponent(isian) + "&ayam=" + encodeURIComponent(ayam) + "&harga=" + encodeURIComponent(harga);

}



function searchWisata(){
   let searchKeyword = document.getElementById('searchBarWisata').value;
   let wisataList = document.getElementsByClassName('listgal');
   any = false

// Iterate through each element in the list
for (let i = 0; i < wisataList.length; i++) {
    let currentKeyword = wisataList[i].getElementsByTagName('h3')[0].innerText.toLowerCase();
    let currentElement = wisataList[i];

    // Check if the current element's keyword includes the search keyword
    if (currentKeyword.includes(searchKeyword.toLowerCase())) {
        currentElement.style.display = 'block'; // Display the matching element
        any = true
        
    } 
    else{
        currentElement.style.display = 'none';
    }


}
let noMatchElement = document.getElementById('searchNotFound');
const finds = document.getElementById('finds');

if (!any) {
    finds.style.display = "block";
    noMatchElement.innerText = 'Pencarian Tidak Ditemukan';
} else {
    finds.style.display = "none";
    noMatchElement.innerText = ''; // Setel teks ke kosong jika ada hasil pencarian yang ditemukan
}
}
// Fungsi Ketika Pencarian Tidak Ditemukan




