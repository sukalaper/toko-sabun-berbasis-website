<?php
  if(isset($_SESSION['log'])){
  } else {
    header('location:pages/auth/auth-login.php');
  }
?>
