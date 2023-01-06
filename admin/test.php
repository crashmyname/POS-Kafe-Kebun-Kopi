<?php
include('../inc/koneksi.php');
                                    $sql = "SELECT * FROM tb_menu inner join tb_kategori on tb_menu.id_kategori = tb_kategori.id_kategori order by id_menu asc";
                                    $hasil = $db->prepare($sql);
                                    $hasil->execute();
                                    $no =1;
                                    while($data = $hasil->fetch()){
                                        ?>
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
                                                                                            <input type="hidden" name="idmenu" value="<?= $data['id_menu']?>">
                                                                                            <input type="text"
                                                                                                id="first-name"
                                                                                                class="form-control"
                                                                                                name="menu" value="<?= $data['nama_menu']?>"
                                                                                                placeholder="Masukan Nama Produk">
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
                                                                                                    class="form-control"
                                                                                                    required>
                                                                                                    <option value="<?= $data['id_kategori']?>"><?= $data['nama_kategori']?>
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
                                                                                                name="harga" value="<?= $data['harga']?>"
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
                                                                                                name="stock" value="<?= $data['stock_menu']?>"
                                                                                                placeholder="Masukan Stock Produk">
                                                                                        </div>
                                                                                        <div class="col-md-4">
                                                                                            <label>Foto Menu 1</label>
                                                                                        </div>
                                                                                        <div
                                                                                            class="col-md-8 form-group">
                                                                                            <?= "<img src='img/produk/$data[foto_menu1]' class='rounded' width='50%'>"?>
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
                                                    <?php };?>