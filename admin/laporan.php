<?php
$page = "Laporan";
include('a_header.php');
include('../inc/koneksi.php');

$laporan = $db->prepare("SELECT * FROM tb_pembayaran inner join tb_pesanan on tb_pesanan.id_pesanan = tb_pembayaran.id_pesanan where status='Selesai'");
$laporan->execute();
$no= 1;
?>
<!-- main -->
<div id="main">
    <header class="mb-3">
        <a href="#" class="burger-btn d-block d-xl-none">
            <i class="bi bi-justify fs-3"></i>
        </a>
    </header>
    <div class="container-fluid">
        <!-- <div class="container-fluid"> -->
        <!-- Begin Page Content -->
        <div class="container-fluid">

            <!-- Page Heading -->
            <div class="col-12 col-lg-3 ms-auto">
                <div class="card">
                    <div class="card-body py-4 px-4">
                        <div class="d-flex align-items-center">
                            <div class="avatar avatar-xl">
                                <img src="assets/images/faces/2.jpg" alt="Face 1">
                            </div>
                            <div class="ms-3 name">
                                <h5 class="font-bold"><?= $user['nm_user']?></h5>
                                <h6 class="text-muted mb-0">@<?= $_SESSION['user']?></h6>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <h1 class="h3 mb-2 text-gray-800">Data Laporan</h1>
            <p class="mb-4">Berikut adalah halaman Laporan</p>
            <!-- DataTales Example -->
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <!-- <h6 class="m-0 font-weight-bold text-primary">Table Cover Page</h6> -->
                    <a href="print.php" class="btn btn-success float-right" target="_blank">Print</a>

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
                                    <th>Bukti Transaksi</th>
                                    <th>Status Transaksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
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
                                    <th><?= "<img src='img/produk/$p[bukti_transaksi]' class='rounded' width='25%'>"?></th>
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
        <!-- </div> -->

    </div>
    <!-- /.container-fluid -->
</div>
<!-- End of Main Content -->
<!-- end of main -->
<?php
include('a_footer.php');
?>