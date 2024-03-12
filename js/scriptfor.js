

function hargabaru() {
    const harga = document.getElementById('harga').value;
    var jumlah = parseInt(document.getElementById('jumlahTiket').value);
    const baru = harga * jumlah;
    document.getElementById("harga").value = baru;
}



function submitForm() {
    alert("Tiket sudah di pesan.");
    // Arahkan pengguna kembali ke halaman utama
    window.location.href = "gallery.html";
}

function cek(){
    const urlParams = new URLSearchParams(window.location.search);
    const namas = urlParams.get('nama');
    window.location.href = ("tiket.php?nama=")  + encodeURIComponent(namas);
}

