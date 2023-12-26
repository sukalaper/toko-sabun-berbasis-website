<?php

// Sesi 
session_start();

// Koneksi ke database
$conn = mysqli_connect("localhost", "root", "", "toko-sabun");

// Untuk debugging
ini_set('display_errors', 1);
error_reporting(E_ALL);

// Tambah barang baru
if(isset($_POST['addnewbarang'])){
  $namabarang = mysqli_real_escape_string($conn, $_POST['namabarang']);
  $namabarang = ucwords(strtolower($namabarang));
  $hargamodal = mysqli_real_escape_string($conn, $_POST['hargamodal']);
  $satuanberat = mysqli_real_escape_string($conn, $_POST['satuanberat']);
  $jumlahbarang = mysqli_real_escape_string($conn, $_POST['jumlahbarang']);
  $hargajual = mysqli_real_escape_string($conn, $_POST['hargajual']);
  $result_check_barang = mysqli_query($conn, "SELECT idbarang, jumlahbarang FROM stok WHERE LOWER(namabarang) = LOWER('$namabarang') AND LOWER(satuanberat) = LOWER('$satuanberat')");
  if($hargajual < $hargamodal){
    header('location:pages/pesan-peringatan/peringatan-harga-modal-tidak-kurang-dari-harga-jual.php');
  exit;
  }  
  if(mysqli_num_rows($result_check_barang) > 0){
    $data_barang = mysqli_fetch_assoc($result_check_barang);
    $idbarang = $data_barang['idbarang'];
    $new_quantity = $data_barang['jumlahbarang'] + $jumlahbarang;
    $result_update_quantity = mysqli_query($conn, "UPDATE stok SET jumlahbarang='$new_quantity' WHERE idbarang='$idbarang'");
    if($result_update_quantity){
      header('location:index.php');
    } else {
      header('location:index.php');
    }
  } else {
  $result = mysqli_query($conn, "INSERT INTO stok (namabarang, hargamodal, satuanberat, jumlahbarang, hargajual) VALUES ('$namabarang', '$hargamodal', '$satuanberat','$jumlahbarang', '$hargajual')");
    if($result){
      header('location:index.php');
    } else {
      header('location:index.php');
    }
  }
}

// Tambah barang masuk
if(isset($_POST['barangmasuk'])){
  $barangnya = $_POST['barangnya'];
  $qty = $_POST['qty'];
  $result_cek_stok_sekarang = mysqli_query($conn, "SELECT * FROM stok WHERE idbarang='$barangnya'");
  $result_ambil_data = mysqli_fetch_array($result_cek_stok_sekarang);
  $result_stok_sekarang = $result_ambil_data['jumlahbarang'];
  $result_tambah_stok_sekarang = $result_stok_sekarang + $qty;
  $result_masuk = mysqli_query($conn, "INSERT INTO masuk (idbarang, qty) VALUES ('$barangnya','$qty')");
  $result_update_stok = mysqli_query($conn, "UPDATE stok SET jumlahbarang='$result_tambah_stok_sekarang' WHERE idbarang='$barangnya'");
  if($result_masuk && $result_update_stok){
    header('location:../pesan-peringatan/peringatan-tambah-barang-berhasil.php');
  } else {
    header('location:../index.php');
  }
}

// Perbarui info barang
if(isset($_POST['updatebarang'])){
  $idbarang = $_POST['idbarang'];
  $namabarang = $_POST['namabarang'];
  $hargamodal = $_POST['hargamodal'];
  $satuanberat = $_POST['satuanberat'];
  $hargajual = $_POST['hargajual'];
  if($hargajual < $hargamodal){
    header('location:pages/pesan-peringatan/peringatan-harga-modal-tidak-kurang-dari-harga-jual.php');
    exit;
  }
  $update = mysqli_query($conn, "UPDATE stok SET idbarang='$idbarang', namabarang='$namabarang', hargamodal='$hargamodal', satuanberat='$satuanberat', hargajual='$hargajual' WHERE idbarang ='$idbarang'");
  if($update){
    header('location:pages/pesan-peringatan/peringatan-perbarui-barang-berhasil.php');
    exit;
  }
}

// Perbarui saat barang dihapus
if(isset($_POST['hapusbarang'])){
  $idbarang = $_POST['idbarang'];
  $hapus = mysqli_query($conn, "DELETE FROM stok WHERE idbarang='$idbarang'");
  if($hapus){
    header('location:index.php');
  } else {
    header('location:index.php');
  }
}

// Menghapus barang masuk
if(isset($_POST['hapusbarangmasuk'])){
  $idmasuk = $_POST['idmasuk'];
  $idbarang = $_POST['idbarang'];
  $get_qty = mysqli_query($conn, "SELECT qty FROM masuk WHERE idmasuk='$idmasuk'");
  if($get_qty && mysqli_num_rows($get_qty) > 0){
    $row = mysqli_fetch_assoc($get_qty);
    $qty = $row['qty'];
    $hapus_masuk = mysqli_query($conn, "DELETE FROM masuk WHERE idmasuk='$idmasuk'");
    $update_stok = mysqli_query($conn, "UPDATE stok SET jumlahbarang = jumlahbarang - $qty WHERE idbarang='$idbarang'");
    if($hapus_masuk && $update_stok){
      header('location:../pesan-peringatan/peringatan-hapus-barang-berhasil.php');
    } else {
      echo 'Gagal mengupdate stok!';
    }
  } else {
    echo 'Data masuk tidak ditemukan!';
  }
}

// Perbarui barang masuk
if(isset($_POST['updatebarangmasuk'])){
  $idbarang = $_POST['idbarang'];
  $idmasuk = $_POST['idmasuk'];
  $qty = $_POST['qty'];
  $result_cek_stok_sekarang = mysqli_query($conn, "SELECT * FROM stok WHERE idbarang='$idbarang'");
  $result_ambil_data = mysqli_fetch_array($result_cek_stok_sekarang);
  $stoksekarang = $result_ambil_data['jumlahbarang'];
  $result_cek_qty_sekarang = mysqli_query($conn, "SELECT * FROM masuk WHERE idmasuk='$idmasuk'");
  $result_ambil_qty = mysqli_fetch_array($result_cek_qty_sekarang);
  $qtysekarang = $result_ambil_qty['qty'];
  $selisih = $qty - $qtysekarang;
  $stokbaru = $stoksekarang + $selisih;
  $result_update_stok = mysqli_query($conn, "UPDATE stok SET jumlahbarang='$stokbaru' WHERE idbarang='$idbarang'");
  $result_update_qty = mysqli_query($conn, "UPDATE masuk SET qty='$qty' WHERE idmasuk='$idmasuk'");
  if ($result_update_stok && $result_update_qty) {
    header('location:pages/pesan-peringatan/peringatan-perbarui-barang-berhasil.php');
  } else {
    header('location:index.php');
  }
}

// Perbarui info barang
if(isset($_POST['updatebarang'])){
  $idbarang = $_POST['idbarang'];
  $namabarang = $_POST['namabarang'];
  $hargamodal = $_POST['hargamodal'];
  $satuanberat = $_POST['satuanberat'];
  $hargajual = $_POST['hargajual'];
  if($hargajual < $hargamodal){
    header('location:pages/peringatan-harga-jual.php');
    exit;
  }
  $update = mysqli_query($conn, "UPDATE stok SET idbarang='$idbarang', namabarang='$namabarang', hargamodal='$hargamodal', satuanberat='$satuanberat', hargajual='$hargajual' WHERE idbarang ='$idbarang'");
    if($update){
    header('location:pages/peringatan-update-barang.php');
  } else {
    header('location:pages/peringatan-update-barang-gagal.php');
  }
}

// Perbarui saat barang dihapus
if(isset($_POST['hapusbarang'])){
  $idbarang = $_POST['idbarang'];
  $hapus = mysqli_query($conn, "DELETE FROM stok WHERE idbarang='$idbarang'");
  if($hapus){
    header('location:index.php');
  } else {
    header('location:index.php');
  }
}

// Menghapus barang masuk
if(isset($_POST['hapusbarangmasuk'])){
  $idmasuk = $_POST['idmasuk'];
  $idbarang = $_POST['idbarang'];
  $get_qty = mysqli_query($conn, "SELECT qty FROM masuk WHERE idmasuk='$idmasuk'");
  if($get_qty && mysqli_num_rows($get_qty) > 0){
    $row = mysqli_fetch_assoc($get_qty);
    $qty = $row['qty'];
    $hapus_masuk = mysqli_query($conn, "DELETE FROM masuk WHERE idmasuk='$idmasuk'");
    $update_stok = mysqli_query($conn, "UPDATE stok SET jumlahbarang = jumlahbarang - $qty WHERE idbarang='$idbarang'");
    if($hapus_masuk && $update_stok){
      header('location:barang-masuk.php');
    } else {
      echo 'Gagal mengupdate stok!';
    }
  } else {
    echo 'Data masuk tidak ditemukan!';
  }
}

// Perbarui barang masuk
if(isset($_POST['updatebarangmasuk'])){
  $idbarang = $_POST['idbarang'];
  $idmasuk = $_POST['idmasuk'];
  $qty = $_POST['qty'];
  $result_cek_stok_sekarang = mysqli_query($conn, "SELECT * FROM stok WHERE idbarang='$idbarang'");
  $result_ambil_data = mysqli_fetch_array($result_cek_stok_sekarang);
  $stoksekarang = $result_ambil_data['jumlahbarang'];
  $result_cek_qty_sekarang = mysqli_query($conn, "SELECT * FROM masuk WHERE idmasuk='$idmasuk'");
  $result_ambil_qty = mysqli_fetch_array($result_cek_qty_sekarang);
  $qtysekarang = $result_ambil_qty['qty'];
  $selisih = $qty - $qtysekarang;
  $stokbaru = $stoksekarang + $selisih;
  $result_update_stok = mysqli_query($conn, "UPDATE stok SET jumlahbarang='$stokbaru' WHERE idbarang='$idbarang'");
  $result_update_qty = mysqli_query($conn, "UPDATE masuk SET qty='$qty' WHERE idmasuk='$idmasuk'");
  if ($result_update_stok && $result_update_qty) {
    header('location:../pesan-peringatan/peringatan-perbarui-barang-berhasil.php');
  } 
}

// Menambah barang keluar
if(isset($_POST['barangkeluar'])){
  $barangnya = $_POST['barangnya'];
  $diskon = $_POST['diskon'];
  $qty = $_POST['qty'];
  $result_cek_stok_sekarang = mysqli_query($conn, "SELECT * FROM stok WHERE idbarang='$barangnya'");
  $result_ambil_data = mysqli_fetch_array($result_cek_stok_sekarang);
  $result_stok_sekarang = $result_ambil_data['jumlahbarang'];
  if($qty > $result_stok_sekarang) {
    header('location:barang-keluar-melebihi-stok-yang-ada.php');
    exit();
  }
  $result_tambah_stok_sekarang = $result_stok_sekarang - $qty;
  $result_keluar = mysqli_query($conn, "INSERT INTO keluar (idbarang, qty, diskon) VALUES ('$barangnya','$qty','$diskon')");
  $result_update_stok = mysqli_query($conn, "UPDATE stok SET jumlahbarang='$result_tambah_stok_sekarang' WHERE idbarang='$barangnya'");
  if($result_keluar && $result_update_stok){
    header('location:');
  } else {
    header('location:');
  }
}

// Menghapus barang keluar
if(isset($_POST['hapusbarangkeluar'])){
  $idkeluar = $_POST['idkeluar'];
  $idbarang = $_POST['idbarang'];
  $get_qty = mysqli_query($conn, "SELECT qty FROM keluar WHERE idkeluar='$idkeluar'");
  if($get_qty && mysqli_num_rows($get_qty) > 0){
    $row = mysqli_fetch_assoc($get_qty);
    $qty = $row['qty'];
    $hapus_keluar = mysqli_query($conn, "DELETE FROM keluar WHERE idkeluar='$idkeluar'");
    if($hapus_keluar){
      $update_stok = mysqli_query($conn, "UPDATE stok SET jumlahbarang = jumlahbarang + $qty WHERE idbarang='$idbarang'");
      if($update_stok){
        header('location:barang-keluar.php');
      } else {
        echo 'Gagal mengupdate stok!';
      }
    }
  } 
}

// Perbarui barang keluar
if(isset($_POST['updatebarangkeluar'])){
  $idbarang = $_POST['idbarang'];
  $idkeluar = $_POST['idkeluar'];
  $qty = $_POST['qty'];
  $result_cek_stok_sekarang = mysqli_query($conn, "SELECT * FROM stok WHERE idbarang='$idbarang'");
  $result_ambil_data = mysqli_fetch_array($result_cek_stok_sekarang);
  $stoksekarang = $result_ambil_data['jumlahbarang'];
  $result_cek_qty_sekarang = mysqli_query($conn, "SELECT * FROM keluar WHERE idkeluar='$idkeluar'");
  $result_ambil_qty = mysqli_fetch_array($result_cek_qty_sekarang);
  $qtysekarang = $result_ambil_qty['qty'];
  $selisih = $qty - $qtysekarang;
  $stokbaru = $stoksekarang - $selisih;
  $result_update_stok = mysqli_query($conn, "UPDATE stok SET jumlahbarang='$stokbaru' WHERE idbarang='$idbarang'");
  $result_update_qty = mysqli_query($conn, "UPDATE keluar SET qty='$qty' WHERE idkeluar='$idkeluar'");
  if ($result_update_stok && $result_update_qty) {
    header('location:barang-keluar.php');
  } else {
    header('location:barang-keluar.php');
  }
}
?>
