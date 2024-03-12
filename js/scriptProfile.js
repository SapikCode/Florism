function kehome(){
    window.location.href = ("menutama.html")
}

function kegallery(){
  const urlParams = new URLSearchParams(window.location.search);
  const namas = urlParams.get('id');
  window.location.href = ("galeribaru.php?id=")  + encodeURIComponent(namas);
}

function ketiket(){
  const urlParams = new URLSearchParams(window.location.search);
  const namas = urlParams.get('id');
  window.location.href = ("tiket.php?nama=")  + encodeURIComponent(namas);
}

function keutama(){
  const urlParams = new URLSearchParams(window.location.search);
  const namas = urlParams.get('id');
  window.location.href = ("menutama.php?id=")  + encodeURIComponent(namas);
}

function kelogout(){
    window.location.href = ("mainmenu.php")
}

function ganti(){
    const label = document.getElementById('labels')
    const passw = document.getElementById('pass')
    label.style.display=("block")
    passw.style.display=("block")
}


document.addEventListener('DOMContentLoaded', function () {
  document.getElementById('fileInput').addEventListener('change', handleFileSelect);
});


function handleFileSelect(event) {
  const fileInput = event.target;
  const files = fileInput.files;

  if (files.length > 0) {
    const selectedFile = files[0];
    showImagePreview(selectedFile);
  }
}

function showImagePreview(file) {
  const reader = new FileReader();

  reader.onload = function (e) {
    const imagePreview = document.getElementById('imagePreview');
    imagePreview.src = e.target.result;
    imagePreview.style.display = 'block';
    imagePreview.style.width = '150px';
    imagePreview.style.height = '152px';
    imagePreview.style.borderRadius = '100%';
    imagePreview.style.marginTop = '-5px';
  };

  reader.readAsDataURL(file);
}

 