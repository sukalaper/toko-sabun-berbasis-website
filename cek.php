<?php
  if(isset($_SESSION['log'])){
  } else {
    header('location:auth-login.php');
  }
?>
