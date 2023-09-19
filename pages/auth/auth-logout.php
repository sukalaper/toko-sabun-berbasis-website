<?php
session_start();
session_unset();
session_destroy();
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <link rel="stylesheet" href="../../assets/css/main/app.css">
  <link rel="stylesheet" href="../../assets/css/main/app-dark.css">
  <link rel="shortcut icon" href="../../assets/images/logo/favicon.svg" type="image/x-icon">
  <link rel="shortcut icon" href="../../assets/images/logo/favicon.png" type="image/png">
  <link rel="stylesheet" href="../../assets/extensions/sweetalert2/sweetalert2.min.css">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body>
  <script src="assets/js/bootstrap.js"></script>
  <script src="assets/js/app.js"></script>
  <script src="assets/extensions/sweetalert2/sweetalert2.min.js"></script>
  <script src="assets/js/pages/sweetalert2.js"></script>
  <script>
    Swal.fire({
      icon: 'success',
      title: 'Logout Berhasil',
      text: 'Anda telah berhasil logout',
      showConfirmButton: false,
      timer: 1500,            
      timerProgressBar: true,
    }).then(function() {
      window.location.href = 'auth-login.php';
    });
  </script>
</body>
</html>
