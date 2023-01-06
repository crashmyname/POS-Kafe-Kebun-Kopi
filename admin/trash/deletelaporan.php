<?php
session_start();
include('../../inc/koneksi.php');
require '../function.php';

$id = $_GET['id'];

    if(deletelaporan($id)>0){
        
    }

    ?>