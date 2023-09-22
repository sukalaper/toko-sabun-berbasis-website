<?php
require '../../koneksi/function.php';

if (isset($_POST['login'])) {
  $email = $_POST['email'];
  $password = $_POST['password'];
  $query = "SELECT * FROM login WHERE email=? AND password=?";
  $stmt = mysqli_prepare($conn, $query);
  mysqli_stmt_bind_param($stmt, "ss", $email, $password);
  mysqli_stmt_execute($stmt);
  $result = mysqli_stmt_get_result($stmt);
  if ($row = mysqli_fetch_assoc($result)) {
    $_SESSION['log'] = true;
    header('location:../../index.php');
  } else {
    header('location:../pesan-peringatan/peringatan-kesalahan-login.php');
  }
  mysqli_stmt_close($stmt);
}

if (!isset($_SESSION['log'])) {
} else {
  header('location:../../index.php');
}
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Halaman Admin</title>
    <link rel="stylesheet" href="../../assets/css/main/app.css">
    <link rel="stylesheet" href="../../assets/css/pages/auth.css">
    <link rel="shortcut icon" href="../../assets/images/logo/favicon.svg" type="image/x-icon">
    <link rel="shortcut icon" href="../../assets/images/logo/favicon.png" type="image/png">
  </head>
  <body>
    <div id="auth">
      <div class="row h-100">
        <div class="col-lg-5 col-12">
          <div id="auth-left">
            <div class="auth-logo">
              <a href="#"><img src="../../assets/images/logo/logo.svg" alt="Logo"></a>
            </div>
            <h1 class="auth-title">Halaman Admin</h1>
            <p class="auth-subtitle mb-5">Masuk dengan akun yang telah ada.</p>
            <form method="post">
              <div class="form-group position-relative has-icon-left mb-3">
                <input type="text" name="email" class="form-control form-control-xl" placeholder="Nama pengguna">
                <div class="form-control-icon">
                  <i class="bi bi-person"></i>
                </div>
              </div>
              <div class="form-group position-relative has-icon-left mb-3">
                <input type="password" name="password" class="form-control form-control-xl" placeholder="Kata sandi">
                <div class="form-control-icon">
                  <i class="bi bi-shield-lock"></i>
                </div>
              </div>
              <button href="../../index.php" name="login" class="btn btn-primary btn-block btn-lg shadow-lg mt-1">Masuk</button>
            </form>
          </div>
        </div>
        <div class="col-lg-7 d-none d-lg-block">
          <div id="auth-right"></div>
        </div>
      </div>
    </div>
  </body>
</html>
