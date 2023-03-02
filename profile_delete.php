<?php
session_start();
include('incl/db.php');

if(!isset($_SESSION['login_success'])){
    header('location:login.php');
  }
$sl= base64_decode( $_GET['id']);


 $delete="DELETE FROM `registation_form` WHERE `SL`='$sl'";
 $userdelete = $conn->query($delete);
session_destroy();

header('location:login.php')
 ?>