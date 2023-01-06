<?php
// session_start();
// include('../inc/koneksi.php');
$page = "Meja";
include('a_header.php');
// require 'function.php';


if(isset($_POST['simpan'])){
    if(addmeja($_POST)>0){

    }
}
if(isset($_POST['update'])){
    if(editmeja($_POST)>0){
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
            <!-- <?php echo $page; ?> -->
            <h1 class="h3 mb-0 text-gray-800">Data Meja</h1>
            <p class="mb-4">Berikut adalah halaman Meja</p>
            <?php
            if(isset($_SESSION['update']))
            {
                ?>
            <div class="alert alert-warning alert-dismissible fade show" role="alert">
            <?php 
                    echo $_SESSION['update']; ?>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
            <?php 
                unset($_SESSION['update']);
            }?>            
            <!-- DataTales Example -->
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Table Cover Page</h6>
                    <!-- <a href="form_cover.php" class="btn btn-success float-right">Tambah</a> -->
                    <button type="button" class="btn btn-outline-success block" data-bs-toggle="modal"
                        data-bs-target="#border-less">
                        Tambah Meja
                    </button>

                    <!-- BorderLess Modal Modal -->
                    <div class="modal fade text-left modal-lg centered" id="border-less" tabindex="-1" role="dialog"
                        aria-labelledby="myModalLabel1" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-scrollable" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title">Input Data Meja</h5>
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
                                                    <h4 class="card-title">Form Meja</h4>
                                                </div>
                                                <div class="card-content">
                                                    <div class="card-body">
                                                        <form class="form form-horizontal" method="post"
                                                            enctype="multipart/form-data">
                                                            <div class="form-body">
                                                                <div class="row">
                                                                    <div class="col-md-4">
                                                                        <label>No Meja</label>
                                                                    </div>
                                                                    <div class="col-md-8 form-group">
                                                                        <input type="text" id="first-name"
                                                                            class="form-control" name="meja"
                                                                            placeholder="Masukan No Meja">
                                                                    </div>
                                                                    <div class="col-md-4">
                                                                        <label>Kapasitas Meja</label>
                                                                    </div>
                                                                    <div class="col-md-8 form-group">
                                                                        <input type="text" id="first-name"
                                                                            class="form-control" name="kapasitas"
                                                                            placeholder="Masukan Kapasitas">
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
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                <thead>
                                    <tr align="center">
                                        <th>No</th>
                                        <th>No Meja</th>
                                        <th>Kapasitas</th>
                                        <th>Status Meja</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <?php
                                $sql = "SELECT * FROM tb_meja";
                                $data = $db->prepare($sql);
                                $data->execute();
                                // var_dump($data);
                                $no = 1;
                                while($hasil = $data->fetch()){
                                ?>
                                <tr align="center">
                                    <th><?= $no;?></th>
                                    <th><?= $hasil['no_meja']?></th>
                                    <th><?= $hasil['kapasitas']?></th>
                                    <th><?= $hasil['statusmeja']?></th>
                                    <th><button class="btn btn-warning" data-bs-toggle="modal"
                                            data-bs-target="#border-less1<?= $hasil['id_meja']?>"><svg
                                                xmlns="http://www.w3.org/2000/svg" width="25" height="25"
                                                fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16">
                                                <path
                                                    d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z" />
                                                <path fill-rule="evenodd"
                                                    d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z" />
                                            </svg></button>
                                        <!-- BorderLess Modal Modal -->
                                        <div class="modal fade text-left modal-lg centered"
                                            id="border-less1<?= $hasil['id_meja']?>" tabindex="-1" role="dialog"
                                            aria-labelledby="myModalLabel1" aria-hidden="true">
                                            <div class="modal-dialog modal-dialog-scrollable" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title">Update Data Meja</h5>
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
                                                                        <h4 class="card-title">Form Meja</h4>
                                                                    </div>
                                                                    <div class="card-content">
                                                                        <div class="card-body">
                                                                            <form class="form form-horizontal"
                                                                                method="post"
                                                                                enctype="multipart/form-data">
                                                                                <div class="form-body">
                                                                                    <div class="row">
                                                                                        <div class="col-md-4">
                                                                                            <label>Update
                                                                                                Meja</label>
                                                                                        </div>
                                                                                        <div
                                                                                            class="col-md-8 form-group">
                                                                                            <input type="hidden"
                                                                                                name="id"
                                                                                                value="<?= $hasil['id_meja']?>">
                                                                                            <input type="text"
                                                                                                id="first-name"
                                                                                                class="form-control"
                                                                                                name="meja"
                                                                                                value="<?= $hasil['no_meja']?>">
                                                                                        </div>
                                                                                        <div class="col-md-4">
                                                                                            <label>Kapasitas</label>
                                                                                        </div>
                                                                                        <div
                                                                                            class="col-md-8 form-group">
                                                                                            <input type="text"
                                                                                                id="first-name"
                                                                                                class="form-control"
                                                                                                name="kapasitas"
                                                                                                value="<?= $hasil['kapasitas']?>">
                                                                                        </div>
                                                                                        <div class="col-md-4">
                                                                                            <label>Status Meja</label>
                                                                                        </div>
                                                                                        <div
                                                                                            class="col-md-8 form-group">
                                                                                            <select type="text"
                                                                                                name="status"
                                                                                                id="kategori"
                                                                                                class="form-control"
                                                                                                required>
                                                                                                <option value="<?= $hasil['statusmeja']?>"><?= $hasil['statusmeja']?></option>
                                                                                                <option value="Available">Available
                                                                                                </option>
                                                                                                <option value="Booking">Booking
                                                                                                </option>
                                                                                            </select>
                                                                                        </div>
                                                                                        <div
                                                                                            class="col-sm-12 d-flex justify-content-end">
                                                                                            <button type="submit"
                                                                                                class="btn btn-primary me-1 mb-1"
                                                                                                name="update"
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
                                        <a class="btn btn-danger"
                                            href="trash/deletemaja.php?id=<?= $hasil['id_meja']?>" name="hapus"
                                            onclick="return confirm('Apakah yakin mau menghapus data?')">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25"
                                                fill="currentColor" class="bi bi-trash-fill" viewBox="0 0 16 16">
                                                <path
                                                    d="M2.5 1a1 1 0 0 0-1 1v1a1 1 0 0 0 1 1H3v9a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V4h.5a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H10a1 1 0 0 0-1-1H7a1 1 0 0 0-1 1H2.5zm3 4a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 .5-.5zM8 5a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7A.5.5 0 0 1 8 5zm3 .5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 1 0z" />
                                            </svg></a>
                                    </th>
                                </tr>
                                <?php $no++;} ?>
                                <!-- </tbody> -->
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