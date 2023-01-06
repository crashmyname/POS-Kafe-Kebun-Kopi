<?php

include('inc/koneksi.php');

$id = $_GET['id'];

$meja = $_POST['meja'];
$jml = $_POST['jumlah'];
$totharga = $_POST['totharga'];
$uppesanan = $db->prepare("UPDATE tb_pemesanan set id_meja='$meja',`jumlah`='$jml',total_harga='$totharga' where nm_user='$id'");
$uppesanan->execute();
var_dump($uppesanan);
?>