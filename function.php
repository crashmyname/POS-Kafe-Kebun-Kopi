<?php
session_start();

function koneksi(){
    $db = new PDO('mysql:host=localhost;dbname=dbkafekebunkopi','root','');
    return $db;
}

function signup($data){
    $db = koneksi();
    $nama = $data['nama'];
    $user = $data['username'];
    $pass = md5($data['password']);

    $sqlcek = "SELECT * FROM tb_user where username='$user'";
    $cekdata = $db->prepare($sqlcek);
    $cekdata->execute();
    $cek = $cekdata->rowCount();
    $cek = $cekdata->fetch();
    if($cek > 0){
        $_SESSION['error'] = "Username yang anda masukkan sudah digunakan";
    }else{
        $sql = "INSERT INTO tb_user values ('','$nama','$user','$pass')";
        $result = $db->prepare($sql);
        $result->execute();
        if($result){
            $_SESSION['status'] = "Berhasil Daftar";
        }else{
            $_SESSION['gagal'] = "Gagal Daftar";
        }
    }
}

function login($data){
    $db = koneksi();
    $username = $data['username'];
    $password = md5($data['password']);
    // $password = md5($password);
    $sql = "SELECT * FROM tb_user where username='$username' AND password='$password'";
    $result = $db->prepare($sql);
    $result->execute();
    $row = $result->rowCount();
    $cek = $result->fetch();
    // var_dump($cek);
    if($row > 0){
        $_SESSION['auth'] = 1;
        $_SESSION['user'] = $username;
        $_SESSION['id'] = $cek['id_user'];
            // echo "Berhasil Login";
            // echo "<script>document.location='home.php';</script>";
        }else{
            echo "<script>alert('Username atau Password Anda Salah');</script>";
            echo "<script>document.location='index.php';</script>";
            session_destroy();
        }
}

function transaksi($data){
    $db = koneksi();
    // $date = date('d-m-Y');
    $id = $data['id'];
    $nm = $data['user'];
    $menu = $data['nama_menu'];
    $hrg = $data['harga'];
    $tothrg = $data['totharga'];
    $date = $data['time'];
    $jml = $data['jumlah'];

    if(empty($_SESSION['user'])){
        echo "<script>alert('Login Terlebih Dahulu');</script>";
        echo "<script>document.location='index.php';</script>";
    }else{
    $sql = "INSERT INTO tb_pemesanan (`id_pemesanan`, `id_user`, `nm_user`, `id_meja`, `nm_pesanan`, `hrg_pesanan`, `jumlah`,`total_harga`, `tgl_pesan`, `status_transaksi`, `bukti_transaksi`) values('','$id','$nm','','$menu','$hrg','$jml','$tothrg','$date','Pending','')";
    $result = $db->prepare($sql);
    $result->execute();
    // var_dump($result);
    }
    // echo "<script>document.location='index.php';</script>";
}

function finishtransaksi($data){
    $db = koneksi();
    $id = $data['uid'];
    $user = $data['nm_user'];
    $menu = $data['menu'];
    $hrg = $data['hrg'];
    $jml = $data['jml'];
    $totalharga = $data['totalharga'];
    $date = $data['time'];
    $meja = $data['meja'];
    // $img1 = $data['foto1'];
    $image = $_FILES['foto']['name'];
    $image1 = $_FILES['foto']['tmp_name'];
    $dirUpload = "admin/img/produk/";
    $uploadData = move_uploaded_file($image1, $dirUpload.$image);
    $queryPesanan = $db->prepare("INSERT INTO tb_pesanan values ('','$id','$meja','$totalharga','$date')");
    $queryPesanan->execute();
        $idPesanan = $db->lastInsertId();
        // $total = 0;
    foreach($_SESSION['keranjang'] as $idmenu=>$value){
            $queryProduk = $db->prepare("SELECT * FROM tb_menu where id_menu='$idmenu'");
            $queryProduk->execute();
            $produk = $queryProduk->fetch();
            $jml = $_SESSION['keranjang'][$menu['id_menu']] = $value;
            // $total += ($produk['harga'] * $jml);
            $queryItem = $db->prepare("INSERT INTO tb_itempesanan
            values ('', '$idPesanan', '$produk[id_menu]', '$produk[harga]','$jml')");
            $queryItem->execute();
            // $inserpesanan = $db->prepare("INSERT INTO tb_pemesanan values ('','$id[$idmenu]','$user[$idmenu]','$meja[$idmenu]','$menu[$idmenu]','$hrg[$idmenu]','$jml[$idmenu]','$tothrg[$idmenu]','$date[$idmenu]','Pending','Pending')");
            // $inserpesanan->execute();
        }
        // foreach($data['jumlah'] as $id => $jumlah){
        //     $jml = $_SESSION['keranjang'][$id] = $jumlah;
        //     $queryItems = $db->prepare("UPDATE tb_itempesanan set jumlah='$jml' where id_menu='$idmenu'");
        //     $queryItems->execute();
        // }
        unset($_SESSION['keranjang']);
        echo "<script>alert('Transaksi Berhasil');</script>";
        echo "<script>document.location='index.php';</script>";
        // header('location:index.php');
        // var_dump($queryItem);
        // var_dump($queryItems);
        // var_dump($queryPesanan);
        // print_r($queryItem);
        // print_r($queryPesanan);
        
    if($uploadData){
        // $sql = "INSERT INTO tb_pemesanan values ('','$id','$user','$meja','$menu','$hrg','$jml','$tothrg','$date','Pending','$image')";
        $sql = "INSERT INTO tb_pembayaran values ('','$idPesanan',now(),'$totalharga','$user','Pending','$image')";
        $transaksi = $db->prepare($sql);
        $transaksi->execute();
        $meja = $db->prepare("UPDATE tb_meja set statusmeja='Booking' where id_meja='$meja'");
        $meja->execute();
        // var_dump($transaksi);
    }else{
        echo "Gagal simpan";
    }
    //     print_r($transaksi);
    //     var_dump($transaksi);
    //     var_dump($inserpesanan);
}

function finish($data){
    $db = koneksi();
    $id = $data['user'];
    $meja = $data['meja'];
    $date = $data['date'];
    $totbayar = $data['totbayar'];
    // $img1 = $data['foto1'];
    $image = $_FILES['foto']['name'];
    $imgs = $_FILES['foto']['tmp_name'];
    $dirUpload = "admin/img/produk/";
    $uploadData = move_uploaded_file($imgs,$dirUpload.$image);
    if($uploadData){
    }else{
    $finsih = $db->prepare("INSERT INTO tb_pembayaran values ('','$date','$totbayar','$id','$image')");
    $finsih->execute();
    print_r($finish);
    var_dump($finish);
    }
}

function uptransaksi($data){
    // $db = koneksi();
    // $id = $data['uuid'];
    // $meja = $data['meja'];
    // $jml = $data['jumlah'];
    // $totharga = $data['totharga'];
    // // $pesan = $db->prepare("SELECT * FROM tb_pemesanan");
    // // $pesan->execute();
    // // $s = $pesan->fetch();
    // // $hg = $s['hrg_pesanan'];
    // // echo $hg;
    // // echo $ftharga = (int)$hg*(int)$jml;
    // // for($i= 1; $i<$jum; $i++){
    // //     echo $id[$i];
    // // }
    // foreach($id as $key=>$value){
    //     $uppesanan = $db->prepare("UPDATE tb_pemesanan set `jumlah`='$jml[$key]',total_harga='$totharga[$key]' where id_pemesanan='$id[$key]'");
    //     $uppesanan->execute();
    //     // print_r($uppesanan);
    //     // var_dump($uppesanan);
    // }
    // // if($uppesanan){
    // //     echo "<script>document.location='index.php';</script>";
    // // }
//     $menu = $data['menu'];
//     $jml = $data['jumlah'];

// // session_start();
// $keranjang = count($_SESSION['keranjang']);

// for($a = 0;$a < $keranjang; $a++){
	
// 	$_SESSION['keranjang'][$a] = array(
// 		'menu' => $menu[$a],
// 		'jumlah' => $jml[$a]
// 	);

// }


foreach($data['jumlah'] as $id => $jumlah){
    $_SESSION['keranjang'][$id] = $jumlah;
}
// var_dump($_SESSION);
// print_r($_SESSION);
// header("location:checkout.php");

}

function rescart($id){
    $db = koneksi();
    $cart = $db->prepare("DELETE from tb_pemesanan where nm_user='$id'");
    $cart->execute();
    if($cart){
    echo "<script>document.location='../index.php';</script>";
    }
}

function delcart($id){
    $db = koneksi();
    $scart = $db->prepare("DELETE FROM tb_pemesanan where id_pemesanan='$id'");
    $scart->execute();
    if($scart){
        echo "<script>document.location='../index.php';</script>";
        }
}

function profil($data){
    $db = koneksi();
    $id = $data['uid'];
    $name = $data['nama'];
    $user = $data['username'];
    $passl = md5($data['passlama']);
    $pass = md5($data['passbaru']);

    $passlama = $db->prepare("SELECT * FROM tb_user where id_user='$id'");
    $passlama->execute();
    $pl = $passlama->fetch();
    $p = $pl['password'];
    if($passl == $p){
    $sql = "UPDATE tb_user set nm_user='$name',username='$user',password='$pass' where id_user='$id'";
    $result = $db->prepare($sql);
    $result->execute();
    }else{
        $_SESSION['errors'] = 'Data Gagal Diubah Karena Password yang anda masukkan tidak sesuai'; 
    }
    if($result){
        $_SESSION['update'] = 'Data berhasil diubah';
        // echo "<script>document.location='kategori.php';</script>";
    }
    else{
        $_SESSION['errorupdate'] = 'Data Gagal Diubah';
        // echo "<script>document.location='kategori.php';</script>";
    }
}
?>