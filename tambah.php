<?php

require 'function.php';

if (isset($_POST["submit"])) {
  
  

  //cek apakah data berhasil ditambah

  if(tambah($_POST) > 0 ) {
    echo "<script>
    alert('data berhasil ditambah!');
    document.location.href = 'index.php';
    </script>";
  } else {
    echo "<script>
    alert('data berhasil ditambah!');
    document.location.href = 'index.php';
    </script>";
  }
}


?>



<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<style>
body {font-family: Arial, Helvetica, sans-serif;}
* {box-sizing: border-box;}

input[type=text], select, textarea {
  width: 100%;
  padding: 12px;
  border: 1px solid #ccc;
  border-radius: 4px;
  box-sizing: border-box;
  margin-top: 6px;
  margin-bottom: 16px;
  resize: vertical;
}

input[type=submit] {
  background-color: #04AA6D;
  color: white;
  padding: 12px 20px;
  border: none;
  border-radius: 4px;
  cursor: pointer;
}

input[type=submit]:hover {
  background-color: #45a049;
}

.container {
  border-radius: 5px;
  background-color: #f2f2f2;
  padding: 20px;
}
</style>
</head>
<body>

<h3>Contact Form</h3>

<div class="container">
  <form action="/action_page.php">
    <label for="nama">Nama Panjang</label>
    <input type="text" id="nama" name="nama" placeholder="Masukan namamu..">

    <label for="no_telepon">No Telepon</label>
    <input type="text" id="nama" name="nama" placeholder="Masukan nomermu..">

    <label for="email">Email</label>
    <input type="text" id="email" name="email" placeholder="Masukan emailmu..">

    <label for="alamat">Alamat</label>
    <input type="text" id="alamat" name="alamat" placeholder="Masukan alamatmu..">

    <label for="pesan">Pesan</label>
    <textarea id="pesan" name="pesan" placeholder="Tulisakan pesanmu.." style="height:200px"></textarea>

    <button type="submit" name="pesan">Kirim Pesan</button>
  </form>
</div>

</body>
</html>
