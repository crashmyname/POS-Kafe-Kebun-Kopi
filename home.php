<?php
session_start();
include('inc/koneksi.php');
require 'function.php';

if (empty($_SESSION['user'])) {
    die ("<script>alert('Anda Belum Login')</script><script>document.location='index.php';</script>");

}

if(isset($_POST['login'])){
    if(login($_POST)>0){

    }
}
?>
<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Kebun Kopi</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.2/font/bootstrap-icons.css">
    <link rel="stylesheet" href="admin/asset/css/main/app.css">
    <link rel="stylesheet" href="admin/assets/css/shared/iconly.css">
    <link rel="icon" type="image/png" sizes="32x32" href="admin/img/kebunkopi.png">
    <link rel="icon" type="image/png" sizes="16x16" href="admin/img/kebunkopi.png">
    <!-- <link href="template/public/assets/css/theme.css" rel="stylesheet" /> -->
</head>

<body>
    <div class="container-fluid">
        <nav class="navbar navbar-expand-lg bg-transparen">
            <div class="container-fluid">
                <img src="admin/img/kebunkopi.png" alt="" width="60px">
                <a class="navbar-brand" href="#">Kafe Kebun Kopi</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                    aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <div class="collapse navbar-collapse  border-lg-0 my-2 mt-lg-0" id="navbarSupportedContent">
                        <div class="mx-auto pt-5 pt-lg-0 d-block d-lg-none d-xl-block">
                            <p class="mb-0 fw-bold text-lg-center">Lokasi: <i
                                    class="fas fa-map-marker-alt text-warning mx-2"></i><span
                                    class="fw-normal">Perempatan dekat dengan UNIPI </span><span>Bitung, Tangerang,
                                    Banten</span></p>
                        </div>
                        <!-- Button trigger modal -->
                        <button type="button" class="btn btn-primary me-3" data-bs-toggle="modal"
                            data-bs-target="#exampleModal">
                            <i class="bi bi-cart4"></i><span class="badge bg-transparent">
                                <?php
                                $sql = "SELECT * FROM tb_pemesanan where id_user='$id'";
                                $rs = $db->prepare($sql);
                                $rs->execute();
                                $cart = $rs->rowCount();
                                echo $cart;
                                ?>
                            </span>
                        </button>

                        <!-- Modal -->
                        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel"
                            aria-hidden="true">
                            <div class="modal-dialog modal-lg transparen">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h1 class="modal-title fs-5" id="exampleModalLabel">Shopping Cart</h1>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                            aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <!-- Table head options start -->
                                        <section class="section">
                                            <div class="row" id="table-head">
                                                <div class="col-12">
                                                    <div class="card">
                                                        <div class="card-header">
                                                            <h4 class="card-title">Data Cart</h4>
                                                        </div>
                                                        <div class="card-content">
                                                            <div class="card-body">
                                                                <p>Jangan Lupa CheckOut Menu yang sudah dipilih ya.
                                                                </p>
                                                            </div>
                                                            <!-- table head dark -->
                                                            <div class="table-responsive">
                                                                <table class="table mb-0">
                                                                    <thead class="thead-dark">
                                                                        <tr>
                                                                            <th>Invoice</th>
                                                                            <th>Nama Menu</th>
                                                                            <th>Harga</th>
                                                                            <th>Pilih Meja</th>
                                                                            <th>Jumlah</th>
                                                                            <th>Total Harga</th>
                                                                        </tr>
                                                                    </thead>
                                                                    <tbody>
                                                                        <tr>
                                                                            <td class="text-bold-500">Michael Right</td>
                                                                            <td>$15/hr</td>
                                                                            <td class="text-bold-500">UI/UX</td>
                                                                            <td class="text-bold-500">UI/UX</td>
                                                                            <td>Remote</td>
                                                                            <td>Austin,Taxes</td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td class="text-bold-500">Morgan Vanblum
                                                                            </td>
                                                                            <td>$13/hr</td>
                                                                            <td class="text-bold-500">Graphic concepts
                                                                            </td>
                                                                            <td class="text-bold-500">Graphic concepts
                                                                            </td>
                                                                            <td>Remote</td>
                                                                            <td>Shangai,China</td>
                                                                        </tr>
                                                                    </tbody>
                                                                </table>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </section>
                                        <!-- Table head options end -->
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary"
                                            data-bs-dismiss="modal">Close</button>
                                        <button type="button" name="checkout" class="btn btn-primary">Check Out</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <form class="d-flex" role="search">
                            <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                            <button class="btn btn-outline-success me-2 btn-md" type="submit"><i
                                    class="bi bi-search"></i></button>
                        </form>
                        <!-- Button trigger for login form modal -->
                            <button type="button" class="btn btn-outline-primary" id="border-less" data-bs-toggle="modal"
                            data-bs-target="#inlineForm">
                            <i class="bi bi-person"></i><?= $_SESSION['user']?>
                        </button>
                        <!--login form Modal -->
                        <div class="modal fade text-left" id="inlineForm" tabindex="-1" role="dialog"
                            aria-labelledby="myModalLabel33" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h4 class="modal-title" id="myModalLabel33">Login Form </h4>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                            aria-label="Close">
                                        </button>
                                    </div>
                                    <form action="" method="post">
                                        <div class="modal-body">
                                            <label for="">Keluar dari akun <a class="" href="logout.php">Logout</a></label>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
        </nav>
    </div>
    <section class="py-5 overflow-hidden bg-warning" id="home">
        <div class="container">
            <?php
            $sql = "SELECT * FROM tb_menu where id_menu = '5'";
            $result = $db->prepare($sql);
            $result->execute();
            while($data = $result->fetch()){
            ?>
            <div class="row flex-center">
                <div class="col-md-5 col-lg-6 order-0 order-md-1 mt-8 mt-md-0"><span
                        class="img-landing-banner">&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp<img
                            class='img-fluid rounded-circle' src='admin/img/produk/Untitled design.png'
                            alt='hero-header' /></span></div>
                <div class="col-md-7 col-lg-6 py-8 text-md-start text-center">
                    <h1 class="display-1 fs-md-5 fs-lg-6 fs-xl-8 text-light fw-bold">Apakah Kamu Lapar?</h1>
                    <h1 class="text-800 mb-5 fs-4">Dengan sekali klik, kamu bisa menemukan jodoh <br
                            class="d-none d-xxl-block" />cepat karena lagi promo</h1>
                    <div class="card w-xxl-75">
                        <div class="card-body">
                            <nav>
                                <div class="nav nav-tabs" id="nav-tab" role="tablist">
                                    <button class="nav-link active mb-3" id="nav-home-tab" data-bs-toggle="tab"
                                        data-bs-target="#nav-home" type="button" role="tab" aria-controls="nav-home"
                                        aria-selected="true"><i
                                            class="fas fa-motorcycle me-2"></i><?= $data['nama_menu']?></button>
                                </div>
                            </nav>
                            <div class="tab-content mt-3" id="nav-tabContent">
                                <div class="tab-pane fade show active" id="nav-home" role="tabpanel"
                                    aria-labelledby="nav-home-tab">
                                    <form class="row gx-2 gy-2 align-items-center">
                                        <div class="col">
                                            <div class="input-group-icon"><i
                                                    class="fas fa-map-marker-alt text-danger input-box-icon"></i>
                                                <label class="visually-hidden" for="inputDelivery"></label>
                                                <div class="display-5 fs-md-5 fs-lg-6 fs-xl-8 text-success fw-bold"
                                                    align="right">Rp.<?= $data['harga']?>,-</div>
                                            </div>
                                        </div>
                                        <div class="d-grid gap-3 col-sm-auto">
                                            <button class="btn btn-success" type="submit">Beli</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <?php }; ?>
        </div>
    </section>

    <section class="py-5 overflow-hidden bg-light" id="popular">
        <div class="col-lg-7 mx-auto text-center mt-7 mb-5">
            <h5 class="fw-bold fs-3 fs-lg-5 lh-sm">Popular items</h5>
        </div>
        <div class="container">
            <div class="row h-100 gx-2 mt-7">
                <?php
                    $sql = "SELECT * FROM tb_menu";
                    $results = $db->prepare($sql);
                    $results->execute();
                    while($datas = $results->fetch()){
                    ?>
                <div class="col-sm-6 col-lg-3 mb-3 mb-md-0 h-100 pb-4">
                    <div class="card" style="width: 18rem;">
                        <?="<img src='admin/img/produk/$datas[foto_menu2]' class='card-img-top' alt='...'>"?>
                        <div class="card-body">
                            <div class="fs-4 fw-bold">
                                <?= $datas['nama_menu']?>
                            </div>
                            <p class="card-text">Harga <div class="btn btn-danger">Rp. <?= $datas['harga']?>,-</div>
                            </p>
                        </div>
                    </div>
                </div>
                <?php }; ?>
            </div>
        </div><!-- end of .container-->
    </section>

    <section id="menu" class="py-4 overflow-hidden">
        <div class="container">
            <div class="row h-100">
                <div class="col-lg-7 mx-auto text-center mt-7 mb-5">
                    <h5 class="fw-bold fs-3 fs-lg-5 lh-sm">Daftar Menu</h5>
                </div>
                <div class="col-12 mb-auto">
                    <div class="row gx-3 h-100 align-items-center">
                        <?php
                    $sql = "SELECT * FROM tb_menu inner join tb_kategori on tb_kategori.id_kategori = tb_menu.id_kategori order by id_menu asc";
                    $resultm = $db->prepare($sql);
                    $resultm->execute();
                    while($datam = $resultm->fetch()){
                    ?>
                        <div class="col-sm-6 col-md-4 col-xl mb-5 h-100">
                            <div class="card card-span h-100 rounded-3">
                                <?= "<img class='img-fluid rounded-3 h-100'
                                    src='admin/img/produk/$datam[foto_menu1]' style='' alt='' />"?>
                                <div class="card-body ps-0">
                                    <h5 class="fw-bold text-1000 text-truncate mb-2 px-4"><?= $datam['nama_menu']?></h5>
                                    <div><span class="text-warning me-2"><i
                                                class="fas fa-map-marker-alt"></i></span><span
                                            class="text-primary px-3"><?= $datam['nama_kategori']?></span></div>
                                    <div align="right">
                                        <span class="fs-3 fw-bold text-right">Rp. <?= $datam['harga']?>,-</span>
                                    </div>
                                </div>
                            </div>
                            <div class="d-grid gap-2"><a class="btn btn-lg btn-danger" href="#!" role="button">Order
                                    now</a></div>
                        </div>
                        <?php };?>
                    </div>
                </div>
            </div><!-- end of .container-->
    </section>

    <!-- Footer -->
    <footer class="text-center text-lg-start bg-white text-muted">
        <!-- Section: Social media -->
        <section class="d-flex justify-content-center justify-content-lg-between p-4 border-bottom">
            <!-- Left -->
            <div class="me-5 d-none d-lg-block">
                <span>Get connected with us on social networks:</span>
            </div>
            <!-- Left -->

            <!-- Right -->
            <div>
                <a href="" class="me-4 link-secondary">
                    <i class="fab fa-facebook-f"></i>
                </a>
                <a href="" class="me-4 link-secondary">
                    <i class="fab fa-twitter"></i>
                </a>
                <a href="" class="me-4 link-secondary">
                    <i class="fab fa-google"></i>
                </a>
                <a href="" class="me-4 link-secondary">
                    <i class="fab fa-instagram"></i>
                </a>
                <a href="" class="me-4 link-secondary">
                    <i class="fab fa-linkedin"></i>
                </a>
                <a href="" class="me-4 link-secondary">
                    <i class="fab fa-github"></i>
                </a>
            </div>
            <!-- Right -->
        </section>
        <!-- Section: Social media -->

        <!-- Section: Links  -->
        <section class="">
            <div class="container text-center text-md-start mt-5">
                <!-- Grid row -->
                <div class="row mt-3">
                    <!-- Grid column -->
                    <div class="col-md-3 col-lg-4 col-xl-3 mx-auto mb-4">
                        <!-- Content -->
                        <h6 class="text-uppercase fw-bold mb-4">
                            <i class="fas fa-gem me-3 text-secondary"></i>Kebun Kopi
                        </h6>
                        <p>
                            Here you can use rows and columns to organize your footer content. Lorem ipsum
                            dolor sit amet, consectetur adipisicing elit.
                        </p>
                    </div>
                    <!-- Grid column -->

                    <!-- Grid column -->
                    <div class="col-md-4 col-lg-3 col-xl-3 mx-auto mb-md-0 mb-4">
                        <!-- Links -->
                        <h6 class="text-uppercase fw-bold mb-4">Contact</h6>
                        <p><i class="fas fa-home me-3 text-secondary"></i> BITUNG</p>
                        <p>
                            <i class="fas fa-envelope me-3 text-secondary"></i>
                            ojosmantap@gmail.com
                        </p>
                        <p><i class="fas fa-phone me-3 text-secondary"></i> + 0821 2346 7288</p>
                        <p><i class="fas fa-print me-3 text-secondary"></i> + 0821 2345 6789</p>
                    </div>
                    <!-- Grid column -->
                </div>
                <!-- Grid row -->
            </div>
        </section>
        <!-- Section: Links  -->

        <!-- Copyright -->
        <div class="text-center p-4" style="background-color: rgba(0, 0, 0, 0.025);">
            © 2077 Copyright:
            <a class="text-reset fw-bold" href="https://mdbootstrap.com/">CyberPunk</a>
        </div>
        <!-- Copyright -->
    </footer>
    <!-- Footer -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"
        integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous">
    </script>
    <!-- <script src="admin/assets/js/bootstrap.js"></script>
    <script src="admin/assets/js/app.js"></script> -->
</body>

</html>