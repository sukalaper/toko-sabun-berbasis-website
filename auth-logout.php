<?php 
session_start();
session_unset();
session_destroy();
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/css/main/app.css">
    <link rel="stylesheet" href="assets/css/pages/auth.css">
    <link rel="stylesheet" href="assets/css/shared/iconly.css">
    <style>
      /* CSS untuk menengahkan elemen dan animasi */
      body {
        background-color: #FAFAFA;
        display: flex;
        justify-content: center;
        align-items: center;
        height: 100vh; /* Mengisi tinggi sesuai tinggi layar */
        margin: 0; /* Menghilangkan margin default */
      }
      /* Gaya elemen alert */
      .alert {
        background-color: #FBFBFB; /* Warna latar belakang elemen */
        padding: 20px; /* Ruang di dalam elemen */
        border-radius: 5px; /* Sudut elemen */
        opacity: 0; /* Elemen awalnya tidak terlihat */
        border: 1px solid;
        border-radius: 6px;
        transition: opacity 0.6s ease-in-out; /* Transisi efek fade */
        text-align: center; /* Teks di tengah elemen */
        font-size: 26px; 
      }
      /* Animasi tampil */
      .alert.show {
        opacity: 0.8;
      }
    </style>
  </head>
  <body>
    <div class="alert alert-light-success color-success">
      <i class="bi bi-check-circle"></i>
      Keluar berhasil
    </div>
    <script>
      // JavaScript untuk menambahkan class "show" setelah elemen dimuat
      document.addEventListener("DOMContentLoaded", function () {
        const alertElement = document.querySelector(".alert");
        alertElement.classList.add("show");
      });
    </script>
  </body>
</html>
