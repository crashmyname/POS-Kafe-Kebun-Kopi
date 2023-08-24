<?php
session_start();

function koneksi(){
    $db = new PDO('mysql:host=localhost;dbname=dbtoko','root','');
    return $db;
}

function logins($data){
    $db = koneksi();
    $username = $data['username'];
    $password = md5($data['password']);
    // $password = md5($password);
    $sql = "SELECT * FROM tb_admin where username='$username' AND password='$password'";
    $result = $db->prepare($sql);
    $result->execute();
    $row = $result->rowCount();
    $cek = $result->fetch();
    // var_dump($cek);
    if($row > 0){
        $_SESSION['auth'] = 1;
        $_SESSION['user'] = $username;
        $_SESSION['role'] = $cek['role'];
        if($_SESSION['role'] == "admin"){
            echo "<script>document.location='dashboard.php';</script>";
        }else if($_SESSION['role'] == "owner"){
            echo "<script>document.location='owner.php';</script>";
        }else{
            echo "<script>alert('Username atau Password Anda Salah');</script>";
            echo "<script>document.location='index.php';</script>";
            session_destroy();
        }
    }
}

function addproduk($data){
    $db = koneksi();
    $prod = $data['produk'];
    $jns = $data['jproduk'];
    // $catg = $data['kategori'];
    $hrg = $data['harga'];
    $stk = $data['stock'];
    $img1 = $_FILES['foto1']['name'];
    $img2 = $_FILES['foto2']['name'];
    $imgs1 = $_FILES['foto1']['tmp_name'];
    $imgs2 = $_FILES['foto2']['tmp_name'];
    $dirUpload = "img/produk/";
    $uploaddata = move_uploaded_file($imgs1,$dirUpload.$img1);
    $uploaddata1 = move_uploaded_file($imgs2,$dirUpload.$img2);
    if($uploaddata && $uploaddata1){
    $sql = "SELECT * FROM tb_menu where nama_menu='$prod'";
    $result = $db->prepare($sql);
    $result->execute();
    $data = $result->rowCount();
    // $data->fetch();
    if($data > 0){
        "Data menu sudah ada, tidak bisa melakukan input data yang sama";
    }
    else{
        $query = "INSERT INTO tb_menu values('','$prod','$jns','$hrg','$stk','$img1','$img2')";
        $results = $db->prepare($query);
        $results->execute();
        // var_dump($datas);
        $_SESSION['status_berhasil'] = 'Data Produk berhasil ditambah';
        // echo "<script>document.location='kategori.php';</script>";
    }
}
}

function editproduk($data){
    $db = koneksi();
    $id = $data['idmenu'];
    $prod = $data['menu'];
    $jns = $data['jproduk'];
    // $catg = $data['kategori'];
    $hrg = $data['harga'];
    $stk = $data['stock'];
    $img1 = $_FILES['foto1']['name'];
    $img2 = $_FILES['foto2']['name'];
    $imgs1 = $_FILES['foto1']['tmp_name'];
    $imgs2 = $_FILES['foto2']['tmp_name'];
    $dirUpload = "img/produk/";
    $uploaddata = move_uploaded_file($imgs1,$dirUpload.$img1);
    $uploaddata1 = move_uploaded_file($imgs2,$dirUpload.$img2);
    // if($uploaddata && $uploaddata1){
    $sql = "UPDATE tb_menu set `nama_menu`='$prod', `jenis`='$jns', `harga`='$hrg', `stock_menu`='$stk' where `id_menu`='$id'";
    $result = $db->prepare($sql);
    $result->execute();
    // var_dump($result);
    // print_r($result);
    if($img1 == ""){
        $fotolama = "SELECT * FROM tb_menu where id_menu='$id'";
        $lama = $db->prepare($fotolama);
        $lama->execute();
        $image = $lama->fetch();
        // $foto = $image['foto_menu1'];
    }else{
        $fotobaru = "UPDATE tb_menu set foto_menu1='$img1' where id_menu='$id'";
        $baru = $db->prepare($fotobaru);
        $baru->execute();
    }
    if($img2 == ""){
        $fotolama = "SELECT * FROM tb_menu where id_menu='$id'";
        $lama = $db->prepare($fotolama);
        $lama->execute();
        $image = $lama->fetch();
        // $foto = $image['foto_menu1'];
    }else {
        $fotobaru = "UPDATE tb_menu set foto_menu2='$img2' where id_menu='$id'";
        $baru = $db->prepare($fotobaru);
        $baru->execute();
    }
    if($result){
        $_SESSION['updateprod'] = 'Data berhasil diubah';
        // echo "<script>document.location='kategori.php';</script>";
    }
    else{
        $_SESSION['errorupdate'] = 'Data Gagal Diubah';
        // echo "<script>document.location='kategori.php';</script>";
    }
}
// }

function deleteproduk($id){
    $db = koneksi();
    $sql = "DELETE from tb_menu where id_menu='$id'";
    $result = $db->prepare($sql);
    $result->execute();
    if($result == true){
        $_SESSION['deletecatg'] = 'Data berhasil dihapus';
        echo "<script>document.location='../produk.php';</script>";
    }
    else{
        $_SESSION['errordelete'] = 'Data Gagal dihapus';
        echo "<script>document.location='../produk.php';</script>";
    }
}

function editcustomer($data){
    $db = koneksi();
    $id = $data['id'];
    $name = $data['user'];
    $user = $data['username'];
    $passl = md5($data['passl']);
    $pass = md5($data['pass']);

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

function deletecustomer($id){
    $db = koneksi();
    $sql = "DELETE from tb_user where id_user='$id'";
    $result = $db->prepare($sql);
    $result->execute();
    // var_dump($result);
    if($result == true){
        $_SESSION['delete'] = 'Data berhasil dihapus';
        header('location:../customer.php');
    }
    else{
        $_SESSION['errordelete'] = 'Data Gagal dihapus';
        // echo "<script>document.location='customer.php';</script>";
    }
}

function updateadmin($data){
    $db = koneksi();
    $id = $data['uid'];
    $user = $data['nmuser'];
    $pass = md5($data['pass']);
    
    $admin = $db->prepare("UPDATE tb_admin set nm_user='$user',password='$pass' where uid='$id'");
    if($admin->execute()){
        $_SESSION['berhasil'] = 'Update Data Admin Berhasil';
    }else{
        $_SESSION['gagal'] = 'Gagal Melakukan Update';
    }
}