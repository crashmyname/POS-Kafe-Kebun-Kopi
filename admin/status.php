<?php
include('../inc/koneksi.php');
$idp = $_POST['idp'];
$status = $_POST['status'];

$stmt = $db->prepare("UPDATE tb_pembayaran set status='$status' where id_pembayaran='$idp'");
$stmt->execute();
header("location:transaksi.php");

?>