<?php
session_start();
include('inc/koneksi.php');

$idm = $_GET['idm'];
$redirect = $_GET['redirect'];

$chart = $db->prepare("SELECT * FROM tb_menu where id_menu='$idm'");
$chart->execute();
$s = $chart->fetch();

if(!isset($_GET['idm']) || empty($_GET['idm'])){
	header("Location: index.php");
	exit;
}


if(!isset($_SESSION['keranjang'])){
	$_SESSION['keranjang'] =[];
}

$jml = 1;

if(!isset($_SESSION['keranjang'][$idm])){
	$_SESSION['keranjang'][$idm] = $jml;
}else{
	$_SESSION['keranjang'][$idm] += $jml;
}
// $keranjang = isset($_SESSION['keranjang']) ? $_SESSION['keranjang']:array();
// if(isset($_GET['idm'])){
// 	$idmenu = $_GET['id_menu'];
// 	$menu = $_GET['nama_menu'];
// 	$harga  = $_GET['harga'];

// 	$keranjang[$idmenu] = array(
// 		"nama_menu" => $menu,
// 		"harga" => $harga
// 	);
// 	$_SESSION['keranjang'] = $keranjang;
// }

// if(isset($_SESSION['keranjang'][$idm])){
//     $_SESSION['keranjang'][$idm]+=1;
// }else{
//     $_SESSION['keranjang'][$idm] = 1;
// }

// if(isset($_SESSION['keranjang'])){
// 	$keranjang = count($_SESSION['keranjang']);

// 	$sudah_ada = 0;
// 	for($a = 0;$a < $keranjang; $a++){

// 		// cek apakah produk sudah ada dalam keranjang
// 		if($_SESSION['keranjang'][$a]['tb_menu'] == $idm){

// 			$sudah_ada = 1;
			
// 		}
// 	}

// 	if($sudah_ada == 0){
// 		$_SESSION['keranjang'][$keranjang] = array(
// 			'tb_menu' => $idm,
// 			'jumlah' => 1
// 		);

// 	}

// }else{
// 	// $_SESSION['keranjang'] = array();
// 	// array_push($_SESSION['keranjang'], $id_produk);

// 	$_SESSION['keranjang'][0] = array(
// 		'tb_menu' => $idm,
// 		'jumlah' => 1
// 	);
// }

echo "<pre>";
echo print_r($_SESSION);
echo "<pre>";

// if(isset($_SESSION['keranjang'])){
//     $id_produk = '';
// }

if($redirect == "index"){
	$r = "index.php";
}else{
	$r = "keranjang.php";
}

header("location:".$r);

// $id = $_POST['id'];
// $nm = $_POST['user'];
// $menu = $_POST['nama_menu'];
// $hrg = $_POST['harga'];
// $tothrg = $_POST['totharga'];
// $date = $_POST['time'];
// $jml = $_POST['jumlah'];

// foreach($idm as $key=>$value){

// $sql = "INSERT INTO tb_pemesanan (`id_pemesanan`, `id_user`, `nm_user`, `id_meja`, `nm_pesanan`, `hrg_pesanan`, `jumlah`,`total_harga`, `tgl_pesan`, `status_transaksi`, `bukti_transaksi`) values('','$id[$key]','$nm[$key]','','$menu[$key]','$hrg[$key]','$jml[$key]','$tothrg[$key]','$date[$key]','Pending','')";
//     $result = $db->prepare($sql);
//     $result->execute();
// }
// // echo "<script>document.location='index.php';</script>";
// var_dump($result);

?>