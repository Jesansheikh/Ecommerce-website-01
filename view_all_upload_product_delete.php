<?php
session_start();
include('incl/db.php');

if(!isset($_SESSION['login_success'])){
    header('location:login.php');
  }
$sl= base64_decode( $_GET['id']);


 $delete="DELETE FROM `add_product` WHERE `SL`='$sl'";
 $userdelete = $conn->query($delete);

header('location:view_all_upload_product')
 ?>