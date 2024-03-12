<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="css/dev.css">
    <title>Document</title>
</head>
<body>
    <div class="isian">
    <form action="prosesdev.php" method="post" enctype="multipart/form-data">
    <h1>Florism Dashboard</h1>
    <div class="row">
    <div class="data">
    <h3>Data Gallery</h3>
    <h4>Foto Wisata :</h4>
    <input type="file" id="fileInput" name="fotoWisata" accept="image/*">
    <h4>Nama Wisata :</h4>
    <input id="namaWisata" name="namaWisata" type="text">
    <h4>Rating :</h4>
    <input id="rating" name="rating" type="text">
    <h4>Harga :</h4>
    <input id="harga" name="harga" type="text">
    <h4>Link Lokasi :</h4>
    <input id="linkWisata" name="linkWisata" type="text">
    </div>
    <div class="photo">
    <img id="imagePreview" style="display:block;" >
    <h3 id="preview">Preview</h3>
    <button type="submit">Tambah Data</button>
    </form>
   
    </div>
    </div>
    
</body>
<script>
document.getElementById('fileInput').addEventListener('change', handleFileSelect);

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
    imagePreview.style.width = '300px';
    imagePreview.style.height = '200px';
  };

  reader.readAsDataURL(file);
}

 
</script>
</html>