<?php
include('../inc/koneksi.php');
$laporan = $db->prepare("SELECT * FROM tb_pembayaran inner join tb_pesanan on tb_pesanan.id_pesanan = tb_pembayaran.id_pesanan where status='Selesai'");
$laporan->execute();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laporan Penjualan</title>

    <link rel="stylesheet" href="assets/css/main/app.css">
    <link rel="stylesheet" href="assets/css/main/app-dark.css">
    <link rel="shortcut icon" href="assets/images/logo/favicon.svg" type="image/x-icon">
    <link rel="shortcut icon" href="assets/images/logo/favicon.png" type="image/png">

    <link rel="stylesheet" href="assets/css/shared/iconly.css">

</head>

<body>
    <br><br>
    <div class="container-fluid">
    <div class="container-fluid">
        <center>    
            <h1 class="h3 mb-2 text-gray-800">Data Laporan</h1>
            <p class="mb-4">Berikut adalah halaman Laporan</p>
            <!-- DataTales Example -->
        </center>
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <!-- <h6 class="m-0 font-weight-bold text-primary">Table Cover Page</h6> -->
                <!-- <a href="print.php" class="btn btn-success float-right">Print</a> -->

            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-striped" id="table1" width="100%" cellspacing="0">
                        <thead>
                            <tr align="center">
                                <th>No</th>
                                <th>Nama Pembeli</th>
                                <!-- <th>Nama Pesanan</th> -->
                                <!-- <th>Harga Pesanan</th> -->
                                <!-- <th>Jumlah</th> -->
                                <th>Total Bayar</th>
                                <th>Tanggal Memesan</th>
                                <!-- <th>Bukti Transaksi</th> -->
                                <th>Status Transaksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $no = 1;
                                while($p = $laporan->fetch()){
                                ?>
                            <tr align="center">
                                <th><?= $no;?></th>
                                <th><?= $p['nm_user']?></th>
                                <!-- <th><?= $p['nm_pesanan']?></th> -->
                                <!-- <th><?= $p['hrg_pesanan']?></th> -->
                                <!-- <th><?= $p['jumlah']?></th> -->
                                <th><?= $p['total_bayar']?></th>
                                <th><?= $p['tgl_bayar']?></th>
                                <!-- <th><?= "<img src='img/produk/$p[bukti_transaksi]' class='rounded' width='25%'>"?></th> -->
                                <th><?= $p['status']?>
                                </th>
                            </tr>
                            <?php $no++;} ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    </div>
    <script src="assets/js/bootstrap.js"></script>
    <script src="assets/js/app.js"></script>
    <script src="assets/js/pages/horizontal-layout.js"></script>
    <!-- <script src="style.js"></script> -->

    <!-- Need: Apexcharts -->
    <script src="assets/extensions/apexcharts/apexcharts.min.js"></script>
    <script src="assets/extensions/simple-datatables/umd/simple-datatables.js"></script>
    <!-- <script src="assets/js/pages/simple-datatables.js"></script> -->
    <script src="assets/js/pages/dashboard.js"></script>
    <!-- <script type="text/javascript">
const currentLocation = location.href;
const menuItem = document.querySelectorAll('a');
const menuLenght = menuItem.length;
for(let i = 0; i< menuLenght; i++;){
    if(menuItem[i].href === currentLocation){
        menuItem[i].className = "active"
    }
}
</script>  -->
<script>
    window.print();
</script>
</body>

</html>