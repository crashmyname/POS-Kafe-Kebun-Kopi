<?php
$page = "Dashboard";
?>
<?php
include('a_header.php');
$now = date('Y-m-d'); // menampilkan jam sekarang">
$totalmenu = $db->prepare("SELECT * FROM tb_menu");
$totalmenu->execute();
$m = $totalmenu->rowCount();
$totaluser = $db->prepare("SELECT * FROM tb_user");
$totaluser->execute();
$m1 = $totaluser->rowCount();
$transaksiharian = $db->prepare("SELECT * FROM tb_pembayaran where tgl_bayar='$now' and status='Selesai'");
$transaksiharian->execute();
$m2 = $transaksiharian->rowCount();
$totaltransaksi = $db->prepare("SELECT * FROM tb_pembayaran where status='Selesai'");
$totaltransaksi->execute();
$m3 = $totaltransaksi->rowCount();
?>
<div id="main">
    <header class="mb-3">
        <a href="#" class="burger-btn d-block d-xl-none">
            <i class="bi bi-justify fs-3"></i>
        </a>
    </header>

    <div class="page-heading">
        <h3>Dashboard Statistics</h3>
    </div>
    <div class="page-content">
        <section class="row">
            <div class="col-12 col-lg-9">
                <div class="row">
                    <div class="col-6 col-lg-3 col-md-6">
                        <div class="card">
                            <div class="card-body px-4 py-4-5">
                                <div class="row">
                                    <div class="col-md-4 col-lg-12 col-xl-12 col-xxl-5 d-flex justify-content-start ">
                                        <div class="stats-icon purple mb-2">
                                            <i class="iconly-boldShow"></i>
                                        </div>
                                    </div>
                                    <div class="col-md-8 col-lg-12 col-xl-12 col-xxl-7">
                                        <h6 class="text-muted font-semibold">Total Menu</h6>
                                        <h6 class="font-extrabold mb-0"><?= $m?></h6>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-6 col-lg-3 col-md-6">
                        <div class="card">
                            <div class="card-body px-4 py-4-5">
                                <div class="row">
                                    <div class="col-md-4 col-lg-12 col-xl-12 col-xxl-5 d-flex justify-content-start ">
                                        <div class="stats-icon blue mb-2">
                                            <i class="iconly-boldProfile"></i>
                                        </div>
                                    </div>
                                    <div class="col-md-8 col-lg-12 col-xl-12 col-xxl-7">
                                        <h6 class="text-muted font-semibold">Total User</h6>
                                        <h6 class="font-extrabold mb-0"><?= $m1?></h6>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-6 col-lg-3 col-md-6">
                        <div class="card">
                            <div class="card-body px-4 py-4-5">
                                <div class="row">
                                    <div class="col-md-4 col-lg-12 col-xl-12 col-xxl-5 d-flex justify-content-start ">
                                        <div class="stats-icon green mb-2">
                                            <i class="iconly-boldAdd-User"></i>
                                        </div>
                                    </div>
                                    <div class="col-md-8 col-lg-12 col-xl-12 col-xxl-7">
                                        <h6 class="text-muted font-semibold">Transaksi Harian</h6>
                                        <h6 class="font-extrabold mb-0"><?= $m2?></h6>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-6 col-lg-3 col-md-6">
                        <div class="card">
                            <div class="card-body px-4 py-4-5">
                                <div class="row">
                                    <div class="col-md-4 col-lg-12 col-xl-12 col-xxl-5 d-flex justify-content-start ">
                                        <div class="stats-icon red mb-2">
                                            <i class="iconly-boldBookmark"></i>
                                        </div>
                                    </div>
                                    <div class="col-md-8 col-lg-12 col-xl-12 col-xxl-7">
                                        <h6 class="text-muted font-semibold">Total Transaksi</h6>
                                        <h6 class="font-extrabold mb-0"><?= $m3?></h6>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-12 col-lg-3">
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
</section>
</div>
<?php
include('a_footer.php');
?>