<?php
include('inc/koneksi.php');
require 'function.php';

$id = $_GET['id'];
$users = $db->prepare("SELECT * FROM tb_user where id_user='$id'");
$users->execute();
$ms = $users->fetch();

if(isset($_POST['update'])){
    if(profil($_POST)>0){

    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <link rel="stylesheet" href="admin/assets/css/main/app.css">
    <link rel="stylesheet" href="admin/assets/css/pages/auth.css">
    <link rel="shortcut icon" href="admin/assets/images/logo/favicon.svg" type="image/x-icon">
    <link rel="shortcut icon" href="admin/assets/images/logo/favicon.png" type="image/png">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
</head>

<body>
    <div id="auth">
        
<div class="row h-100">
    <div class="col-lg-5 col-12">
        <div id="auth-left">
            <div class="auth-logo mb-0 mt-0">
                <a href="index.php"><img src="admin/img/logokebunkopi.svg" alt="Logo"></a>
            </div>
            <h1 class="auth-title mb-2">Update Profil</h1>
            <p class="auth-subtitle mb-2">Input your update data.</p>
            <?php
            if(isset($_SESSION['update']))
            {
                ?>
            <div class="alert alert-success alert-dismissible fade show" role="alert">
            <?php 
                    echo $_SESSION['update']; ?>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
            <?php 
                unset($_SESSION['update']);
            }?>
            <?php
            if(isset($_SESSION['errors']))
            {
                ?>
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <?php 
                    echo $_SESSION['errors']; ?>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
            <?php 
                unset($_SESSION['errors']);
            }?>
            <form action="" method="post">            
                <div class="form-group position-relative has-icon-left mb-4">
                    <input type="hidden" name="uid" value="<?= $ms['id_user']?>">
                    <input type="text" class="form-control form-control-xl" name="nama" value="<?= $ms['nm_user']?>" placeholder="Nama">
                    <div class="form-control-icon">
                        <i class="bi bi-person"></i>
                    </div>
                </div>
                <div class="form-group position-relative has-icon-left mb-4">
                    <input type="text" class="form-control form-control-xl" name="username" value="<?= $ms['username']?>" placeholder="Username">
                    <div class="form-control-icon">
                    <i class="bi bi-person"></i>
                    </div>
                </div>
                <div class="form-group position-relative has-icon-left mb-4">
                    <input type="password" class="form-control form-control-xl" name="passlama" placeholder="Password Lama">
                    <div class="form-control-icon">
                        <i class="bi bi-shield-lock"></i>
                    </div>
                </div>
                <div class="form-group position-relative has-icon-left mb-4">
                    <input type="password" class="form-control form-control-xl" name="passbaru" placeholder="Password Baru">
                    <div class="form-control-icon">
                        <i class="bi bi-shield-lock"></i>
                    </div>
                </div>
                <button class="btn btn-primary btn-block btn-lg shadow-lg" name="update">Update</button>
                <a class="btn btn-info btn-block btn-lg shadow-lg mt-2" href="index.php">Back</a>
            </form>
            <!-- <div class="text-center mt-5 text-lg fs-4">
                <p class='text-gray-600'>Already have an account? <a href="index.php" class="font-bold">Log
                        in</a>.</p>
            </div> -->
        </div>
    </div>
    <div class="col-lg-7 d-none d-lg-block">
        <div id="auth-right">

        </div>
    </div>
</div>

    </div>
</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"
        integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous">
    </script>
</html>
