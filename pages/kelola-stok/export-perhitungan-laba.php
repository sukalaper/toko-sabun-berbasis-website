<?php
require '../../koneksi/function.php';
require '../../koneksi/cek.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Sukalaper - Export Perhitungan Laba</title>
  <link rel="stylesheet" href="../../assets/css/main/app.css">
  <link rel="stylesheet" href="../../assets/css/main/app-dark.css">
  <link rel="stylesheet" href="../../assets/css/pages/modals.css">
  <link rel="shortcut icon" href="../../assets/images/logo/favicon.svg" type="image/x-icon">
  <link rel="shortcut icon" href="../../assets/images/logo/favicon.png" type="image/png">
  <link rel="stylesheet" href="../../assets/css/pages/fontawesome.css">
  <link rel="stylesheet" href="../../assets/extensions/datatables.net-bs5/css/dataTables.bootstrap5.min.css">
  <link rel="stylesheet" href="../../assets/css/pages/datatables.css">
</head>

<body>
  <section class="section">
    <div class="card">
      <div class="card-header">
        Jquery Datatable
      </div>
      <div class="buttons">
        <a href="#" class="btn btn-primary" id="exportButton">Export Table</a>
        </li>
        <div class="card-body">
          <table id="mauexport" class="table" id="table1">
            <thead>
              <tr>
                <th>Tanggal</th>
                <th>ID Barang</th>
                <th>Nama Barang</th>
                <th>Harga Modal</th>
                <th>Harga Jual</th>
                <th>Jumlah Barang Terjual</th>
                <th>Total Pendapatan Bersih</th>
              </tr>
            </thead>
            <tbody>
              <?php
              $result_ambil_semua_data_stok = mysqli_query($conn, "SELECT * FROM keluar K, stok S WHERE S.idbarang = K.idbarang");
              while ($data = mysqli_fetch_array($result_ambil_semua_data_stok)) {
                $tanggal = $data['tanggal'];
                $idbarang = $data['idbarang'];
                $namabarang = $data['namabarang'];
                $hargamodal = $data['hargamodal'];
                $hargajual = $data['hargajual'];
                $qty = $data['qty'];
                $laba = ($hargajual - $hargamodal) * $qty;
              ?>
                <tr>
                  <td><?php echo $tanggal; ?></td>
                  <td><?php echo $idbarang; ?></td>
                  <td><?php echo $namabarang; ?></td>
                  <td><?php echo $hargamodal; ?></td>
                  <td><?php echo $hargajual; ?></td>
                  <td><?php echo $qty; ?></td>
                  <td><?php echo number_format($laba, 3, '.', ''); ?></td>
                </tr>
              <?php } ?>
            </tbody>
          </table>
        </div>
        <script>
          $(document).ready(function() {
            $('#mauexport').DataTable({
              dom: 'Bfrtip',
              buttons: [
                'copy', 'csv', 'excel', 'pdf', 'print'
              ]
            });
            $('#exportButton').on('click', function() {
              table.buttons().exportData();
            });
          });
        </script>
</body>

</html>
