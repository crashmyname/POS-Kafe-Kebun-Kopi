<?php
include('inc/koneksi.php');
    $id = $_POST['user'];
    // $meja = $_POST['meja'];
    $date = $_POST['date'];
    $totbayar = $_POST['totbayar'];
    // $img1 = $data['foto1'];
    $image = $_FILES['foto']['name'];
    $image1 = $_FILES['foto']['tmp_name'];
    $dirUpload = "admin/img/produk/";
    $uploadData = move_uploaded_file($image1, $dirUpload.$image);
    if($uploadData){
        $sql = "INSERT INTO tb_pembayaran values ('','$date','$totbayar','$id','$image')";
        $finish = $db->prepare($sql);
        $finish->execute();
    }else{
        echo "Data Gagal diUpload";
}
// var_dump($finish);
// print_r($finish);
?>