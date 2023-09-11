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
      body {
        background-color: #FAFAFA;
        display: flex;
        justify-content: center;
        align-items: center;
        height: 100vh; 
        margin: 0; 
      }
      .alert {
        background-color: #FBFBFB; 
        padding: 20px; 
        border-radius: 5px; 
        opacity: 0; 
        border: 1px solid;
        border-radius: 6px;
        transition: opacity 0.6s ease-in-out; 
        text-align: center; 
        font-size: 26px; 
      }
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
      document.addEventListener("DOMContentLoaded", function () {
        const alertElement = document.querySelector(".alert");
        alertElement.classList.add("show");
      });
    </script>
  </body>
</html>
