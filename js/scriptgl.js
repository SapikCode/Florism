
function pesan(isi){
    const urlParams = new URLSearchParams(window.location.search);
    const isian = urlParams.get('id');
    window.location.href = "formtik.php?id_wisata=" + encodeURIComponent(isi) + "&nama=" + encodeURIComponent(isian);
}


function ketiket(){
    const urlParams = new URLSearchParams(window.location.search);
    const namas = urlParams.get('id');
    window.location.href = "tiket.php?nama=" + encodeURIComponent(namas);
}

function keutama(){
    const urlParams = new URLSearchParams(window.location.search);
    const namas = urlParams.get('id');
    window.location.href = "menutama.php?id=" + encodeURIComponent(namas);
}







function searchWisata(){
    let searchKeyword = document.getElementById('searchBarWisata').value;
    let wisataList = document.getElementsByClassName('card');
    const hasil = document.getElementById('konten')
    hasil.style.display = 'flex';
    hasil.style.flexDirection = 'row';
    any = false
 
 // Iterate through each element in the list
 for (let i = 0; i < wisataList.length; i++) {
     let currentKeyword = wisataList[i].getElementsByTagName('h2')[0].innerText.toLowerCase();
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