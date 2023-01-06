<?php
session_start();
include('../inc/koneksi.php');
require '../function.php';

// $id = $_GET['id'];

//     if(delcart($id)>0){

//     }

// session_unset($_SESSION['keranjang']);
$idm = $_GET['idm'];
$redirect = $_GET['redirect'];
$keranjang = $_SESSION['keranjang'];
unset($keranjang[$idm]);
$_SESSION['keranjang'] = $keranjang;
// echo "<script>document.location='../index.php'</script>";

// $idm = $_GET['idm'];

// if(!isset($_GET['idm']) || empty($_GET['idm'])){
// 	header("Location: ../index.php");
// 	exit;
// }

// if(!isset($_SESSION['keranjang'])){
// 	header("Location: ../checkout.php");
// }

// if(!isset($_SESSION['keranjang'][$idm])){
// 	unset($_SESSION['keranjang'][$idm]);
	
// 	// session_unset($_SESSION['keranjang']);
// 	// $idm = $_GET['id_menu'];
// 	// $keranjang = $_SESSION['keranjang'];
// 	// unset($keranjang[$idm]);
// 	// $_SESSION['keranjang'] = $keranjang;
// }



// if(isset($_SESSION['keranjang'])){
//     for($a=0;$a<count($_SESSION['keranjang']);$a++){
// 		if($_SESSION['keranjang'][$a]['tb_menu'] == $idm){
// 			unset($_SESSION['keranjang'][$a]);

// 			// urutkan kembali
// 			sort($_SESSION['keranjang']);
// 		}
// 	}
// }

if($redirect == "index"){
	$r = "../index.php";
}else{
	$r = "../checkout.php";
}
header("location:".$r);
echo "<pre>";
	echo print_r($_SESSION);
	echo var_dump($_SESSION);
	echo "<pre>";

    ?>