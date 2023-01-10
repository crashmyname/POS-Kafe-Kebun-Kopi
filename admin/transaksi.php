<?php
$page = "Transaksi";
include('a_header.php');
// include('../inc/koneksi.php');

$no = 1;
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
            <h1 class="h3 mb-2 text-gray-800">Data Transaksi</h1>
            <p class="mb-4">Berikut adalah halaman Transaksi</p>
            <!-- DataTales Example -->
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Table Cover Page</h6>
                    <!-- <a href="form_cover.php" class="btn btn-success float-right">Tambah</a> -->

                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered" id="datatable" width="100%" cellspacing="0">
                            <thead>
                                <tr align="center">
                                    <th>No</th>
                                    <th>Nama Pembeli</th>
                                    <th>ID Pesanan</th>
                                    <th>Tanggal Pesanan</th>
                                    <th>Total bayar</th>
                                    <th>Status Transaksi</th>
                                    <th>Update Konfirmasi</th>
                                    <th>Bukti Transaksi</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php                 
                                $transaksi = $db->prepare("SELECT DISTINCT a.id_pesanan,a.nm_user,a.tgl_bayar,a.total_bayar,a.status,a.bukti_transaksi,a.id_pembayaran FROM tb_pembayaran a inner join tb_pesanan b on a.id_pesanan = b.id_pesanan");
                                $transaksi->execute();
                                while($p = $transaksi->fetch()){
                                ?>
                                <tr align="center">
                                    <th><?= $no;?></th>
                                    <th width="15%"><?= $p['nm_user']?></th>
                                    <th><?= $p['id_pesanan']?></th>
                                    <th width="15%"><?= $p['tgl_bayar']?></th>
                                    <th><?= $p['total_bayar']?></th>
                                    <th><?php 
                                    if($p['status']=='Selesai'){
                                    ?>
                                        <button class="btn btn-success"><?= $p['status']?></button>
                                        <?php }else{?>
                                        <button class="btn btn-warning"><?= $p['status']?></button>
                                        <?php } ?></th>
                                    <th width="20%">
                                        <div class="col-md-8 form-group">
                                            <form action="status.php" method="post">
                                                <input type="hidden" value="<?= $p['id_pembayaran'] ?>" name="idp">
                                                <select type="text" name="status" id="kategori" class="form-control"
                                                    onchange="form.submit()" required>
                                                    <option value="<?= $p['status']?>"><?= $p['status']?></option>
                                                    <option value="Pending">Pending</option>
                                                    <option value="Selesai">Selesai</option>
                                                </select>
                                            </form>
                                        </div>
                                    </th>
                                    <th><?= "<img src='img/produk/$p[bukti_transaksi]' class='rounded' width='25%'>"?>
                                    </th>
                                    <th>
                                        <button type="button" class="btn btn-primary me-auto float-end mb-2 mt-2"
                                            data-bs-toggle="modal" data-bs-target="#exampleModal2<?=$p['id_pesanan']?>">
                                            <i class="bi bi-info-circle"></i>
                                            </span>
                                        </button>
                                        <!-- Modal -->
                                        <div class="modal fade" id="exampleModal2<?=$p['id_pesanan']?>" tabindex="-1"
                                            aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog modal-lg transparen">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h1 class="modal-title fs-5" id="exampleModalLabel">Detail Item
                                                            Pesanan</h1>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                            aria-label="Close"></button>
                                                    </div>
                                                    <form action="" method="post" enctype="multipart/form-data">
                                                        <div class="modal-body">
                                                            <!-- Table head options start -->
                                                            <section class="section">
                                                                <div class="row" id="table-head">
                                                                    <div class="col-12">
                                                                        <div class="card">
                                                                            <div class="card-content">
                                                                                <div class="card-body">
                                                                                    <p>Detail Item Pesanan
                                                                                    </p>
                                                                                </div>
                                                                                <div class="table-responsive">
                                                                                    <table class="table table-striped"
                                                                                        id="table1" width="100%"
                                                                                        cellspacing="0">
                                                                                        <thead>
                                                                                            <tr align="center">
                                                                                                <th>Nama Menu</th>
                                                                                                <th>Harga</th>
                                                                                                <th>Jumlah</th>
                                                                                                <!-- <th>Item</th> -->
                                                                                            </tr>
                                                                                        </thead>
                                                                                        <tbody>
                                                                                        <?php
                                                    $detail = $db->prepare("SELECT * FROM tb_itempesanan inner join tb_menu on tb_menu.id_menu = tb_itempesanan.id_menu where id_pesanan='$p[id_pesanan]'");
                                                    $detail->execute();
                                                    while($d = $detail->fetch()){
                                                    ?>
                                                                                            <tr>
                                                                                                <th><?= $d['nama_menu']?></th>
                                                                                                <th><?= $d['harga']?></th>
                                                                                                <th><?= $d['jumlah']?></th>
                                                                                                <!-- <th><?= $d['id_item']?></th> -->
                                                                                            </tr>
                                                                                            <?php } ?>
                                                                                        </tbody>
                                                                                    </table>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                            </section>
                                                            <!-- Table head options end -->
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-secondary"
                                                                data-bs-dismiss="modal">Close</button>
                                                        </div>
                                                    </Form>
                                                </div>
                                            </div>
                                        </div>

                                        <button type="button" class="btn btn-success me-auto float-end mb-2 mt-2"
                                            data-bs-toggle="modal"
                                            data-bs-target="#exampleModal1<?=$p['id_pembayaran']?>">
                                            <i class="bi bi-eye-fill"></i>
                                            </span>
                                        </button>
                                        <!-- Modal -->
                                        <div class="modal fade" id="exampleModal1<?=$p['id_pembayaran']?>" tabindex="-1"
                                            aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog modal-lg transparen">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h1 class="modal-title fs-5" id="exampleModalLabel">Bukti
                                                            Pembayaran</h1>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                            aria-label="Close"></button>
                                                    </div>
                                                    <form action="" method="post" enctype="multipart/form-data">
                                                        <div class="modal-body">
                                                            <!-- Table head options start -->
                                                            <section class="section">
                                                                <div class="row" id="table-head">
                                                                    <div class="col-12">
                                                                        <div class="card">
                                                                            <div class="card-content">
                                                                                <div class="card-body">
                                                                                    <p>Upload Bukti Pembayaran
                                                                                    </p>
                                                                                </div>
                                                                                <div class="col-md-4">
                                                                                    <label></label>
                                                                                </div>
                                                                                <div class="col-md-8 form-group">
                                                                                    <?= "<img src='img/produk/$p[bukti_transaksi]' class='rounded' width='75%'>"?>
                                                                                    <input type="hidden" name="foto1"
                                                                                        value="<?= $p['bukti_transaksi']?>">

                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                            </section>
                                                            <!-- Table head options end -->
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-secondary"
                                                                data-bs-dismiss="modal">Close</button>
                                                        </div>
                                                    </Form>
                                                </div>
                                            </div>
                                        </div>
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