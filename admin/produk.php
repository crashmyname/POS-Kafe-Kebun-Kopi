<?php
// session_start();
// include('../inc/koneksi.php');
// require 'function.php';
$page = "Produk";
include('a_header.php');


if(isset($_POST['simpan'])){
    if(addproduk($_POST)>0){

    }
}

if(isset($_POST['updates'])){
    if(editproduk($_POST)>0){

    }
}
?>
<!-- main -->
<?php
?>
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
            <h1 class="h3 mb-2 text-gray-800">Data Produk</h1>
            <p class="mb-4">Berikut adalah halaman Produk</p>
            <?php
            if(isset($_SESSION['status_berhasil']))
            {
                ?>
            <div class="alert alert-success alert-dismissible fade show" role="alert">
            <?php 
                    echo $_SESSION['status_berhasil']; ?>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
            <?php 
                unset($_SESSION['status_berhasil']);
            }?>
            <?php
            if(isset($_SESSION['updateprod']))
            {
                ?>
            <div class="alert alert-warning alert-dismissible fade show" role="alert">
            <?php 
                    echo $_SESSION['updateprod']; ?>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
            <?php 
                unset($_SESSION['updateprod']);
            }?>
            <!-- DataTales Example -->
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Table Cover Page</h6>
                    <button type="button" class="btn btn-outline-success block" data-bs-toggle="modal"
                        data-bs-target="#border-less">
                        Tambah Data
                    </button>
                    <!-- BorderLess Modal Modal -->
                    <div class="modal fade text-left modal-lg centered" id="border-less" tabindex="-1" role="dialog"
                        aria-labelledby="myModalLabel1" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-scrollable" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title">Input Data Produk</h5>
                                    <button type="button" class="close rounded-pill" data-bs-dismiss="modal"
                                        aria-label="Close">
                                        <i data-feather="x"></i>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <div class="row match-height">
                                        <div class="col-md-12 col-12">
                                            <div class="card">
                                                <div class="card-header">
                                                    <h4 class="card-title">Form Produk</h4>
                                                </div>
                                                <div class="card-content">
                                                    <div class="card-body">
                                                        <form class="form form-horizontal" method="post"
                                                            enctype="multipart/form-data">
                                                            <div class="form-body">
                                                                <div class="row">
                                                                    <div class="col-md-4">
                                                                        <label>Nama Produk</label>
                                                                    </div>
                                                                    <div class="col-md-8 form-group">
                                                                        <input type="text" id="first-name"
                                                                            class="form-control" name="produk"
                                                                            placeholder="Masukan Nama Produk">
                                                                    </div>
                                                                    <div class="col-md-4">
                                                                        <label>Jenis Produk</label>
                                                                    </div>
                                                                    <div class="col-md-8 form-group">
                                                                        <select type="text" name="jproduk" id="kategori"
                                                                            class="form-control" required>
                                                                            <option value="">-- Pilih --</option>
                                                                            <option value="Ice">Ice</option>
                                                                            <option value="Hot">Hot</option>
                                                                        </select>
                                                                    </div>
                                                                    <div class="col-md-4">
                                                                        <label>Kategori</label>
                                                                    </div>
                                                                    <div class="col-md-8 form-group">
                                                                        <select type="text" name="kategori"
                                                                            id="kategori" class="form-control" required>
                                                                            <option value="">-- Pilih --</option>
                                                                            <?php
                                                                                $sql = "SELECT * FROM tb_kategori";
                                                                                $result = $db->prepare($sql);
                                                                                $result->execute();
                                                                                while($data = $result->fetch()){
                                                                                ?>
                                                                            <option value="<?= $data['id_kategori']?>">
                                                                                <?= $data['nama_kategori']?>
                                                                            </option>
                                                                            <?php }; ?>
                                                                        </select>
                                                                    </div>
                                                                    <div class="col-md-4">
                                                                        <label>Harga</label>
                                                                    </div>
                                                                    <div class="col-md-8 form-group">
                                                                        <input type="text" id="first-name"
                                                                            class="form-control" name="harga"
                                                                            placeholder="Masukan Harga">
                                                                    </div>
                                                                    <div class="col-md-4">
                                                                        <label>Stock Produk</label>
                                                                    </div>
                                                                    <div class="col-md-8 form-group">
                                                                        <input type="text" id="first-name"
                                                                            class="form-control" name="stock"
                                                                            placeholder="Masukan Stock Produk">
                                                                    </div>
                                                                    <div class="col-md-4">
                                                                        <label>Foto Menu 1</label>
                                                                    </div>
                                                                    <div class="col-md-8 form-group">
                                                                        <input class="form-control" type="file"
                                                                            id="formFile" name="foto1">
                                                                    </div>
                                                                    <div class="col-md-4">
                                                                        <label>Foto Menu 2</label>
                                                                    </div>
                                                                    <div class="col-md-8 form-group">
                                                                        <input class="form-control" type="file"
                                                                            id="formFile" name="foto2">
                                                                    </div>
                                                                    <div class="col-sm-12 d-flex justify-content-end">
                                                                        <button type="submit"
                                                                            class="btn btn-primary me-1 mb-1"
                                                                            name="simpan"
                                                                            onclick="return confirm('Apakah data yang anda masukkan sudah benar?')">Submit</button>
                                                                        <button type="reset"
                                                                            class="btn btn-light-secondary me-1 mb-1">Reset</button>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </form>

                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-light-primary" data-bs-dismiss="modal">
                                                <i class="bx bx-x d-block d-sm-none"></i>
                                                <span class="d-none d-sm-block">Close</span>
                                            </button>
                                            <!-- <button type="button" class="btn btn-primary ml-1" data-bs-dismiss="modal">
                                                <i class="bx bx-check d-block d-sm-none"></i>
                                                <span class="d-none d-sm-block">Simpan</span>
                                            </button> -->
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-striped" id="table1" width="100%" cellspacing="0">
                            <thead>
                                <tr align="center">
                                    <th>No</th>
                                    <th>Nama Produk</th>
                                    <th>Jenis</th>
                                    <th>Kategori</th>
                                    <th>Harga</th>
                                    <th>Stock</th>
                                    <th width="250px">Foto 1</th>
                                    <th width="250px">Foto 2</th>
                                    <th width="150px">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                    $sql = "SELECT * FROM tb_menu inner join tb_kategori on tb_menu.id_kategori = tb_kategori.id_kategori order by id_menu asc";
                                    $hasil = $db->prepare($sql);
                                    $hasil->execute();
                                    $no =1;
                                    while($data = $hasil->fetch()){
                                        ?>
                                <tr>
                                    <th><?= $no?></th>
                                    <th><?= $data['nama_menu']?></th>
                                    <th><?= $data['jenis']?></th>
                                    <th><?= $data['nama_kategori']?></th>
                                    <th><?= $data['harga']?></th>
                                    <th><?= $data['stock_menu']?></th>
                                    <th><?= "<img src='img/produk/$data[foto_menu1]' class='rounded' width='50%'>"?>
                                    </th>
                                    <th><?= "<img src='img/produk/$data[foto_menu2]' class='rounded' width='50%'>"?>
                                    </th>
                                    <th>
                                        <button class="btn btn-warning" data-bs-toggle="modal"
                                            data-bs-target="#border-less1<?=$data['id_menu']?>"><svg
                                                xmlns="http://www.w3.org/2000/svg" width="25" height="25"
                                                fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16">
                                                <path
                                                    d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z" />
                                                <path fill-rule="evenodd"
                                                    d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z" />
                                            </svg></button>
                                        <!-- BorderLess Modal Modal -->
                                        <div class="modal fade text-left modal-lg centered"
                                            id="border-less1<?=$data['id_menu']?>" tabindex="-1" role="dialog"
                                            aria-labelledby="myModalLabel1" aria-hidden="true">
                                            <div class="modal-dialog modal-dialog-scrollable" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title">Update Data Produk</h5>
                                                        <button type="button" class="close rounded-pill"
                                                            data-bs-dismiss="modal" aria-label="Close">
                                                            <i data-feather="x"></i>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <div class="row match-height">
                                                            <div class="col-md-12 col-12">
                                                                <div class="card">
                                                                    <div class="card-header">
                                                                        <h4 class="card-title">Form Produk</h4>
                                                                    </div>
                                                                    <div class="card-content">
                                                                        <div class="card-body">
                                                                            <form class="form form-horizontal"
                                                                                method="post"
                                                                                enctype="multipart/form-data">
                                                                                <div class="form-body">
                                                                                    <div class="row">
                                                                                        <div class="col-md-4">
                                                                                            <label>Nama Produk</label>
                                                                                        </div>
                                                                                        <div
                                                                                            class="col-md-8 form-group">
                                                                                            <input type="hidden"
                                                                                                name="idmenu"
                                                                                                value="<?= $data['id_menu']?>">
                                                                                            <input type="text"
                                                                                                id="first-name"
                                                                                                class="form-control"
                                                                                                name="menu"
                                                                                                value="<?= $data['nama_menu']?>">
                                                                                        </div>
                                                                                        <div class="col-md-4">
                                                                                            <label>Jenis Produk</label>
                                                                                        </div>
                                                                                        <div
                                                                                            class="col-md-8 form-group">
                                                                                            <select type="text"
                                                                                                name="jproduk"
                                                                                                id="kategori"
                                                                                                class="form-control"
                                                                                                required>
                                                                                                <option value="<?= $data['jenis']?>"><?= $data['jenis']?></option>
                                                                                                <option value="Ice">Ice
                                                                                                </option>
                                                                                                <option value="Hot">Hot
                                                                                                </option>
                                                                                            </select>
                                                                                        </div>
                                                                                        <div class="col-md-4">
                                                                                            <label>Kategori</label>
                                                                                        </div>
                                                                                        <div
                                                                                            class="col-md-8 form-group">
                                                                                            <div class="col-sm-8">
                                                                                                <select type="text"
                                                                                                    name="kategori"
                                                                                                    id="kategori"
                                                                                                    class="form-control">
                                                                                                    <option
                                                                                                        value="<?= $data['id_kategori']?>">
                                                                                                        <?= $data['nama_kategori']?>
                                                                                                    </option>
                                                                                                    <?php
                                                                                $sql = "SELECT * FROM tb_kategori";
                                                                                $results = $db->prepare($sql);
                                                                                $results->execute();
                                                                                while($datas = $results->fetch()){
                                                                                ?>
                                                                                                    <option
                                                                                                        value="<?= $datas['id_kategori']?>">
                                                                                                        <?= $datas['nama_kategori']?>
                                                                                                    </option>
                                                                                                    <?php }; ?>
                                                                                                </select>
                                                                                            </div>
                                                                                        </div>
                                                                                        <div class="col-md-4">
                                                                                            <label>Harga</label>
                                                                                        </div>
                                                                                        <div
                                                                                            class="col-md-8 form-group">
                                                                                            <input type="text"
                                                                                                id="first-name"
                                                                                                class="form-control"
                                                                                                name="harga"
                                                                                                value="<?= $data['harga']?>"
                                                                                                placeholder="Masukan Harga">
                                                                                        </div>
                                                                                        <div class="col-md-4">
                                                                                            <label>Stock Produk</label>
                                                                                        </div>
                                                                                        <div
                                                                                            class="col-md-8 form-group">
                                                                                            <input type="text"
                                                                                                id="first-name"
                                                                                                class="form-control"
                                                                                                name="stock"
                                                                                                value="<?= $data['stock_menu']?>"
                                                                                                placeholder="Masukan Stock Produk">
                                                                                        </div>
                                                                                        <div class="col-md-4">
                                                                                            <label>Foto Menu 1</label>
                                                                                        </div>
                                                                                        <div
                                                                                            class="col-md-8 form-group">
                                                                                            <?= "<img src='img/produk/$data[foto_menu1]' class='rounded' width='50%'>"?>
                                                                                            <input type="hidden"
                                                                                                name="foto1"
                                                                                                value="<?= $data['foto_menu1']?>">
                                                                                            <input class="form-control"
                                                                                                type="file"
                                                                                                id="formFile"
                                                                                                name="foto1">
                                                                                        </div>
                                                                                        <div class="col-md-4">
                                                                                            <label>Foto Menu 2</label>
                                                                                        </div>
                                                                                        <div
                                                                                            class="col-md-8 form-group">
                                                                                            <?= "<img src='img/produk/$data[foto_menu2]' class='rounded' width='50%'>"?>
                                                                                            <input type="hidden"
                                                                                                name="foto2"
                                                                                                value="<?= $data['foto_menu2']?>">
                                                                                            <input class="form-control"
                                                                                                type="file"
                                                                                                id="formFile"
                                                                                                name="foto2">
                                                                                        </div>
                                                                                        <div
                                                                                            class="col-sm-12 d-flex justify-content-end">
                                                                                            <button type="submit"
                                                                                                class="btn btn-primary me-1 mb-1"
                                                                                                name="updates"
                                                                                                onclick="return confirm('Apakah data yang anda masukkan sudah benar?')">Submit</button>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </form>

                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-light-primary"
                                                                    data-bs-dismiss="modal">
                                                                    <i class="bx bx-x d-block d-sm-none"></i>
                                                                    <span class="d-none d-sm-block">Close</span>
                                                                </button>
                                                                <!-- <button type="button" class="btn btn-primary ml-1" data-bs-dismiss="modal">
                                                <i class="bx bx-check d-block d-sm-none"></i>
                                                <span class="d-none d-sm-block">Simpan</span>
                                            </button> -->
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <a class="btn btn-danger" href="trash/deleteproduk.php?id=<?= $data['id_menu'];?>"
                                            name="hapus" onclick="return confirm('Apakah yakin mau menghapus data?')">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25"
                                                fill="currentColor" class="bi bi-trash-fill" viewBox="0 0 16 16">
                                                <path
                                                    d="M2.5 1a1 1 0 0 0-1 1v1a1 1 0 0 0 1 1H3v9a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V4h.5a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H10a1 1 0 0 0-1-1H7a1 1 0 0 0-1 1H2.5zm3 4a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 .5-.5zM8 5a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7A.5.5 0 0 1 8 5zm3 .5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 1 0z" />
                                            </svg></a>
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