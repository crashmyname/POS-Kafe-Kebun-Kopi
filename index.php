<?php
session_start();
include('inc/koneksi.php');
require 'function.php';

$user = $db->prepare("SELECT * FROM tb_user where id_user='$_SESSION[id]'");
$user->execute();
$m = $user->fetch();

if(isset($_POST['login'])){
    if(login($_POST)>0){

    }
}

// if(isset($_POST['beli'])){
//     if(transaksi($_POST)>0){
        
//     }
// }

if(isset($_POST['updata'])){
    if(uptransaksi($_POST)>0){
        
    }
}

if(isset($_POST['reset'])){
    if(rescart($_POST)>0){
    }
}

if(isset($_POST['hapus'])){
    if(delcart($_POST)>0){

    }
}
?>
<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Toko Sinar Malingping</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.2/font/bootstrap-icons.css">
    <link rel="stylesheet" href="admin/asset/css/main/app.css">
    <link rel="stylesheet" href="admin/assets/css/shared/iconly.css">
    <!-- <link rel="icon" type="image/png" sizes="32x32" href="admin/img/kebunkopi.png">
    <link rel="icon" type="image/png" sizes="16x16" href="admin/img/kebunkopi.png"> -->
    <!-- <link href="template/public/assets/css/theme.css" rel="stylesheet" /> -->
    <link rel="stylesheet" href="admin/assets/extensions/sweetalert2/sweetalert2.min.css">
</head>

<body>
    <div class="container-fluid">
        <nav class="navbar navbar-expand-lg bg-transparen">
            <div class="container-fluid">
                <!-- <img src="admin/img/kebunkopi.png" alt="" width="60px"> -->
                <a class="navbar-brand" href="#">TOKO SINAR MALINGPING</a>
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
                                    class="fw-normal">Jln. Raya Malingping Km. 4 Kec. Malingping, Kab. Lebak, Prov. Banten 42391.</span>
                                    <!-- <span>Kp. Parahu Ds. Parahu Kec. Sukamulya</span> -->
                                </p>
                        </div>
                        <!-- Button trigger modal -->
                        <button type="button" class="btn btn-danger me-3" data-bs-toggle="modal"
                            data-bs-target="#exampleModal">
                            <i class="bi bi-cart4"></i><span class="badge bg-transparent">

                                <?php 
							if(isset($_SESSION['keranjang'])){
								echo $keranjan = count($_SESSION['keranjang']);
							}else{
								echo $keranjan = 0;
							}
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
                                    <form action="" method="post">
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
                                                                                <!-- <th>Invoice</th> -->
                                                                                <th>Nama Menu</th>
                                                                                <th>Harga</th>
                                                                                <!-- <th>Pilih Meja</th> -->
                                                                                <!-- <th>Jumlah</th> -->
                                                                                <!-- <th>Total Harga</th> -->
                                                                                <th>Opsi</th>
                                                                            </tr>
                                                                        </thead>
                                                                        <tbody>
                                                                            <?php 
                                                                        // $pesan = $db->prepare("SELECT * FROM tb_pemesanan where nm_user='$s'");
                                                                        // $pesan->execute();
                                                                        // while($c = $pesan->fetch()){
                                                                            $total = 0;
                                                                            if(!!isset($_SESSION['keranjang'])){
                                                                                $keranjang = count($_SESSION['keranjang']);
                                                                                if($keranjang != 0){
                                                                                    $pesanan = 'SELECT * FROM tb_menu where id_menu in(';
                                                                                    $idmenu = array_keys($_SESSION['keranjang']);
                                                                                    $pesanan .= trim(str_repeat('?,',count($idmenu)),',');
                                                                                    $pesanan .= ')';
                                                                                    $sql = $db->prepare($pesanan);
                                                                                    $sql->execute($idmenu);
                                                                                    while($menu = $sql->fetch()){
                                                    // $total += $menu['harga']*$_SESSION['keranjang'][$menu['id_menu']];
                                                                                // for($a=0;$a<$keranjang;$a++){
                                                                                //     $idm = $_SESSION['keranjang'][$a]['tb_menu'];
                                                                                //     $isi = $db->prepare("SELECT * FROM tb_menu where id_menu='$idm'");
                                                                                //     $isi->execute();
                                                                                //     $i = $isi->fetch();
                                                                                //     $total += $i['harga'];
                                                                        ?>
                                                                            <tr>
                                                                                <td>
                                                                                    <?= $menu['nama_menu']?></td>
                                                                                <td class="text-bold-500">
                                                                                    <?= $menu['harga']?>
                                                                                </td>
                                                                                <td><a class="btn btn-danger"
                                                                                        href="dump/delcart.php?idm=<?=$menu['id_menu']?>&&redirect=index"
                                                                                        name="hapus"
                                                                                        onclick="return confirm('Apakah yakin mau menghapus data?')">
                                                                                        <svg xmlns="http://www.w3.org/2000/svg"
                                                                                            width="25" height="25"
                                                                                            fill="currentColor"
                                                                                            class="bi bi-trash-fill"
                                                                                            viewBox="0 0 16 16">
                                                                                            <path
                                                                                                d="M2.5 1a1 1 0 0 0-1 1v1a1 1 0 0 0 1 1H3v9a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V4h.5a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H10a1 1 0 0 0-1-1H7a1 1 0 0 0-1 1H2.5zm3 4a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 .5-.5zM8 5a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7A.5.5 0 0 1 8 5zm3 .5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 1 0z" />
                                                                                        </svg></a></td>
                                                                            </tr>
                                                                        </tbody>
                                                                        <?php } } }?>
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
                                            <a href="dump/resetcart.php?id=<?= $s?>" class="btn btn-danger"
                                                onclick="return confirm('Apakah yakin mau menghapus cart?')"
                                                name="reset">Hapus Cart</a>
                                            <a type="button" href="checkout.php" name="checkout"
                                                class="btn btn-primary">Check
                                                Out</a>
                                        </div>
                                    </Form>
                                </div>
                            </div>
                        </div>
                        <!-- Button trigger for login form modal -->
                        <?php 
                        if(empty($_SESSION['user'])){ ?>
                        <button type="button" class="btn btn-outline-success" data-bs-toggle="modal"
                            data-bs-target="#inlineForm">
                            <i class="bi bi-person"></i>Login
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
                                            <label>Email: </label>
                                            <div class="form-group">
                                                <input type="text" name="username" placeholder="Username"
                                                    class="form-control">
                                            </div>
                                            <label>Password: </label>
                                            <div class="form-group">
                                                <input type="password" name="password" placeholder="Password"
                                                    class="form-control">
                                            </div>
                                            <label for="">Belum Punya akun? Register <a class=""
                                                    href="signup.php">disini</a></label>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-light-secondary"
                                                data-bs-dismiss="modal">
                                                <i class="bx bx-x d-block d-sm-none"></i>
                                                <span class="d-none d-sm-block">Close</span>
                                            </button>
                                            <button type="submit" name="login" class="btn btn-success ml-1"
                                                data-bs-dismiss="modal">
                                                <i class="bx bx-check d-block d-sm-none"></i>
                                                <span class="d-none d-sm-block">login</span>
                                            </button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <?php } else { ?>
                        <button type="button" class="btn btn-outline-primary" id="border-less" data-bs-toggle="modal"
                            data-bs-target="#inlineForm">
                            <i class="bi bi-person"></i><?= $_SESSION['user']?>
                        </button>
                        <!--login form Modal -->
                        <div class="modal fade text-left" id="inlineForm" id="border-less" tabindex="-1" role="dialog"
                            aria-labelledby="myModalLabel33" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h4 class="modal-title" id="myModalLabel33">Akun</h4>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                            aria-label="Close">
                                        </button>
                                    </div>
                                    <form action="" method="post">
                                        <div class="modal-body">
                                            <div class="form-group">
                                                <a class="btn btn-warning" href="profil.php?id=<?= $m['id_user']?>">Edit Profil</a>
                                            </div>
                                            <label for="">Keluar dari akun<a class=""
                                                    href="logout.php">Logout</a></label>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <?php };?>
                    </div>
                </div>
        </nav>
    </div>
    <section class="py-5 overflow-hidden bg-success" id="home">
        
    </section>

    <section class="py-5 overflow-hidden bg-light" id="popular">
        <div class="col-lg-7 mx-auto text-center mt-7 mb-5">
            <h5 class="fw-bold fs-3 fs-lg-5 lh-sm">Daftar Produk</h5>
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
                            <p class="card-text">Harga <div class="">Rp. <?= $datas['harga']?>,-</div><a class="btn btn-success" href="keranjang.php?idm=<?= $datas['id_menu']?>&redirect=index" name="beli"><i class="bi bi-cart4"></i></a>
                            </p>
                        </div>
                    </div>
                </div>
                <?php }; ?>
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
                            <i class="fas fa-gem me-3 text-secondary"></i>Toko Sinar Malingping
                        </h6>
                        <p>
                            <!-- Here you can use rows and columns to organize your footer content. Lorem ipsum
                            dolor sit amet, consectetur adipisicing elit. -->
                        </p>
                    </div>
                    <!-- Grid column -->

                    <!-- Grid column -->
                    <div class="col-md-4 col-lg-3 col-xl-3 mx-auto mb-md-0 mb-4">
                        <!-- Links -->
                        <h6 class="text-uppercase fw-bold mb-4">Contact</h6>
                        <p><i class="fas fa-home me-3 text-secondary"></i> Malingping</p>
                        <p>
                            <i class="fas fa-envelope me-3 text-secondary"></i>
                            sinarmalingping@gmail.com
                        </p>
                        <p><i class="fas fa-phone me-3 text-secondary"></i> +62 815-7457-4073</p>
                        <!-- <p><i class="fas fa-print me-3 text-secondary"></i> + 0821 2345 6789</p> -->
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
            <a class="text-reset fw-bold" href="https://mdbootstrap.com/">Fervian</a>
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