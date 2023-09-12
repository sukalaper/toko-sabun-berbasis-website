<?php

// Sesi 
session_start();

// Koneksi ke database
$conn = mysqli_connect("localhost", "root", "", "stok-barang-mazer");

// Untuk debugging
ini_set('display_errors', 1);
error_reporting(E_ALL);
?>
