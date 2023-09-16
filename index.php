<?php 
require 'function.php';
require 'cek.php';
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sukalaper - Administrator</title>
    <link rel="stylesheet" href="assets/css/main/app.css">
    <link rel="stylesheet" href="assets/css/main/app-dark.css">
    <link rel="shortcut icon" href="assets/images/logo/favicon.svg" type="image/x-icon">
    <link rel="shortcut icon" href="assets/images/logo/favicon.png" type="image/png">
    <link rel="stylesheet" href="assets/css/shared/iconly.css">
    <link rel="stylesheet" href="assets/extensions/simple-datatables/style.css">
    <link rel="stylesheet" href="assets/css/pages/simple-datatables.css">
  </head>
  <body>
    <div id="app">
      <div id="sidebar" class="active">
        <div class="sidebar-wrapper active">
          <div class="sidebar-header position-relative">
            <div class="d-flex justify-content-between align-items-center">
              <div class="logo">
                <a href="index.php">
                  <img src="assets/images/logo/logo.svg" alt="Logo" srcset="">
                </a>
              </div>
              <div class="theme-toggle d-flex gap-2  align-items-center mt-2">
                <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" aria-hidden="true" role="img" class="iconify iconify--system-uicons" width="20" height="20" preserveAspectRatio="xMidYMid meet" viewBox="0 0 21 21">
                  <g fill="none" fill-rule="evenodd" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round">
                  <path d="M10.5 14.5c2.219 0 4-1.763 4-3.982a4.003 4.003 0 0 0-4-4.018c-2.219 0-4 1.781-4 4c0 2.219 1.781 4 4 4zM4.136 4.136L5.55 5.55m9.9 9.9l1.414 1.414M1.5 10.5h2m14 0h2M4.135 16.863L5.55 15.45m9.899-9.9l1.414-1.415M10.5 19.5v-2m0-14v-2" opacity=".3"></path>
                  <g transform="translate(-210 -1)">
                  <path d="M220.5 2.5v2m6.5.5l-1.5 1.5"></path>
                  <circle cx="220.5" cy="11.5" r="4"></circle>
                  <path d="m214 5l1.5 1.5m5 14v-2m6.5-.5l-1.5-1.5M214 18l1.5-1.5m-4-5h2m14 0h2"></path>
                  </g>
                  </g>
                </svg>
                <div class="form-check form-switch fs-6">
                  <input class="form-check-input  me-0" type="checkbox" id="toggle-dark">
                  <label class="form-check-label"></label>
                </div>
                <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" aria-hidden="true" role="img" class="iconify iconify--mdi" width="20" height="20" preserveAspectRatio="xMidYMid meet" viewBox="0 0 24 24">
                  <path fill="currentColor" d="m17.75 4.09l-2.53 1.94l.91 3.06l-2.63-1.81l-2.63 1.81l.91-3.06l-2.53-1.94L12.44 4l1.06-3l1.06 3l3.19.09m3.5 6.91l-1.64 1.25l.59 1.98l-1.7-1.17l-1.7 1.17l.59-1.98L15.75 11l2.06-.05L18.5 9l.69 1.95l2.06.05m-2.28 4.95c.83-.08 1.72 1.1 1.19 1.85c-.32.45-.66.87-1.08 1.27C15.17 23 8.84 23 4.94 19.07c-3.91-3.9-3.91-10.24 0-14.14c.4-.4.82-.76 1.27-1.08c.75-.53 1.93.36 1.85 1.19c-.27 2.86.69 5.83 2.89 8.02a9.96 9.96 0 0 0 8.02 2.89m-1.64 2.02a12.08 12.08 0 0 1-7.8-3.47c-2.17-2.19-3.33-5-3.49-7.82c-2.81 3.14-2.7 7.96.31 10.98c3.02 3.01 7.84 3.12 10.98.31Z"></path>
                </svg>
              </div>
              <div class="sidebar-toggler  x">
                <a href="#" class="sidebar-hide d-xl-none d-block">
                  <i class="bi bi-x bi-middle"></i>
                </a>
              </div>
            </div>
          </div>
          <div class="sidebar-menu">
            <ul class="menu">
              <li class="sidebar-title">Akumulasi Barang</li>
              <li class="sidebar-item active">
                <a href="index.php" class='sidebar-link'>
                  <i class="bi bi-grid-fill"></i>
                  <span>Barang Awal</span>
                </a>
              </li>
              <li class="sidebar-title">Kelola Barang</li>
              <li class="sidebar-item">
                <a href="barang-masuk.php" class='sidebar-link'>
                  <i class="bi bi-bag-plus-fill"></i>
                  <span>Barang Masuk</span>
                </a>
              </li>
              <li class="sidebar-item  ">
                <a href="barang-keluar.php" class='sidebar-link'>
                  <i class="bi bi-bag-dash-fill"></i>
                  <span>Barang Keluar</span>
                </a>
              </li>
              <li class="sidebar-title">Rekap Penjualan</li> 
              <a href="perhitungan-laba.php" class='sidebar-link'>
                <i class="bi bi-cash"></i>
                <span>Penghitungan Laba</span>
              </a>
              </li>
              <li class="sidebar-title">Halaman Administrator</li>
              <a href="auth-logout.php" class='sidebar-link'>
                <i class="bi bi bi-box-arrow-in-right"></i>
                <span>Keluar Halaman</span>
              </a>
              </li>
            </ul>
          </div>
        </div>
      </div>
      <div id="main">
        <header class="mb-3">
          <a href="#" class="burger-btn d-block d-xl-none">
            <i class="bi bi-justify fs-3"></i>
          </a>
        </header>
        <div class="page-heading">
          <h3>Toko Sabun Sukalaper</h3>
          <p class="text-subtitle text-muted">Di mohon mengisi data dengan se-teliti mungkin agar tidak terjadi kesalahan.</p>
        </div>
        <section class="section">
          <div class="card">
            <div class="card-header">
            <a href="kelola_stok/export-barang-awal.php" class="btn btn-primary" style="float: right; margin-left: 12px;">
              <span class="bi bi-plus"></span> Export Data 
            </a>
            <button type="button" class="btn btn-primary float-md-end" data-bs-toggle="modal" data-bs-target="#myModal">
              <span class="bi bi-plus"></span> Tambah Barang Baru 
            </button>
            </div>
            <div class="card-body">
              <?php
                $ambildatastok = mysqli_query($conn,"SELECT * FROM stok WHERE jumlahbarang < 5");
                while($fetch=mysqli_fetch_array($ambildatastok)){
                $namabarang = $fetch['namabarang'];
              ?>
              <div class="alert alert-primary alert-dismissible fade show" role="alert">
                <i class="bi bi-exclamation-triangle"></i> <strong>Perhatian!</strong> Stok barang <strong><?=$namabarang;?></strong> menipis.
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
              </div>
            </div>
            <?php
              }
            ?>
              <table class="table table-hover striped-row" id="table1">
                <thead>
                  <tr>
                    <th>No</th>
                    <th>Nama Barang</th>
                    <th>Satuan Berat</th>
                    <th>Harga Modal</th>
                    <th>Harga Jual</th>
                    <th>Jumlah Barang</th>
                    <th>Aksi</th>
                  </tr>
                </thead>
                <tbody>
                  <?php
                    $result_ambil_semua_data_stok = mysqli_query($conn,"SELECT * FROM stok");
                    $i = 1;
                    while($data=mysqli_fetch_array($result_ambil_semua_data_stok)){
                      $namabarang = $data['namabarang'];
                      $satuanberat = $data['satuanberat'];
                      $hargamodal = $data['hargamodal'];
                      $hargajual = $data['hargajual'];
                      $jumlahbarang = $data['jumlahbarang'];
                      $idbarang = $data['idbarang'];
                  ?>
                  <tr>
                    <td> <?=$i++;?> </td>
                    <td> <?=$namabarang;?> </td>
                    <td> <?=$satuanberat;?> </td>
                    <td> <?=$hargamodal;?> </td>
                    <td> <?=$hargajual;?> </td>
                    <td> <?=$jumlahbarang;?> </td>
                    <td>
                      <button type="button" class="btn icon btn-left" data-bs-toggle="modal" data-bs-target="#edit<?=$idbarang;?>">
                        <i data-feather="edit"></i> 
                      </button>
                      <input type="hidden" name="barangdihapus" value=" <?=$idbarang;?>">
                      <button type="button" class="btn icon btn-left" data-bs-toggle="modal" data-bs-target="#delete<?=$idbarang;?>">
                        <i data-feather="trash"></i>  
                      </button>  
                    </td>
                  </tr>
                  <div class="modal fade" id="edit<?=$idbarang;?>">
                    <div class="modal-dialog">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h4 class="modal-title">Edit Barang</h4>
                          <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                        </div>
                        <form method="post">
                          <div class="modal-body">
                            <input type="hidden" name="idbarang" value=" <?=$idbarang;?>">
                            <input type="text" name="namabarang" value=" <?=$namabarang;?>" class="form-control mb-3" required>
                            <input type="number" name="hargamodal" step="0.001" pattern="\d+(\.\d{2})?" placeholder="Harga Modal (Rp)" class="form-control mb-0" required>
                            <p style="font-size: 1px; color: red;">*Jika harga barang adalah Rp1.000 isi kolom dengan angka 1</p>
                            <input type="number" name="satuanberat" placeholder="Satuan Berat" class="form-control mb-0" required>
                            <p style="font-size: 1px; color: red;">*Secara matematis satuan <em>Gram</em> dan <em>Mili</em> adalah ukuran yang sama </p>
                            <input type="number" name="hargajual" step="0.001" pattern="\d+(\.\d{2})?" placeholder="Harga Jual (Rp)" class="form-control mb-3" required>
                            <button type="submit" class="btn btn-primary" name="updatebarang">Submit</button>
                          </div>
                        </form>
                      </div>
                    </div>
                  </div>
                  <div class="modal fade" id="delete<?=$idbarang;?>">
                    <div class="modal-dialog">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h4 class="modal-title">Hapus Barang?</h4>
                          <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                        </div>
                        <form method="post">
                          <div class="modal-body">
                            <input type="hidden" name="idbarang" value="<?=$idbarang;?>"> Apakah Anda Yakin Ingin Menghapus <?=$namabarang;?> <?=$satuanberat;?>g/mL?
                            <button type="submit" class="btn btn-danger col-12 mt-3" name="hapusbarang">Hapus</button>
                          </div>
                        </form>
                      </div>
                    </div>
                  </div>
                  <?php 
                    }
                  ?>
                </tbody>
              </table>
            </div>
          </div>
        </section>
        <footer>
          <div class="footer clearfix mb-0 text-muted">
            <div class="float-start">
              <p>2021 &copy; Mazer</p>
            </div>
            <div class="float-md-end">
              <p>Crafted with <span class="text-danger">
                <i class="bi bi-heart"></i>
              </span> by <a href="https://saugi.me">Saugi</a>
            </div>
          </div>
        </footer>
      </div>
    </div>
    <script src="assets/js/bootstrap.js"></script>
    <script src="assets/js/app.js"></script>
    <!-- Need: Apexcharts -->
    <script src="assets/extensions/simple-datatables/umd/simple-datatables.js"></script>
    <script src="assets/js/pages/simple-datatables.js"></script>
  </body>
<div class="modal fade" id="myModal">
 <div class="modal-dialog">
  <div class="modal-content">
    <div class="modal-header">
      <h4 class="modal-title">Tambah Barang Baru</h4>
      <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
    </div>
    <form method="post">
      <div class="modal-body">
        <input type="text" name="namabarang" placeholder="Nama Barang" class="form-control mb-3" required>
          <input type="number" name="hargamodal" step="0.001" pattern="\d+(\.\d{2})?" placeholder="Harga Modal (Rp)" class="form-control mb-0" required>
          <p style="font-size: 1px; color: red;">*Jika harga barang adalah Rp1.000 isi kolom dengan angka 1</p>
          <input type="number" name="satuanberat" placeholder="Satuan Berat" class="form-control mb-0" required>
          <p style="font-size: 1px; color: red;">*Secara matematis, satuan <em>Gram</em> dan <em>Mili</em> adalah ukuran yang sama </p>
          <input type="number" name="jumlahbarang" placeholder="Jumlah Barang" class="form-control mb-3" required>
          <input type="number" name="hargajual" step="0.001" pattern="\d+(\.\d{2})?" placeholder="Harga Jual (Rp)" class="form-control mb-3" required>
          <button type="submit" class="btn btn-primary" name="addnewbarang">Submit</button>
        </div>
      </form>
    </div>
  </div>
</div>
</html>
