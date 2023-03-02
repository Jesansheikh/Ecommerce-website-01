<?php
session_start();
include('incl/db.php');

if (!isset($_SESSION['login_success'])) {
	header('location:login.php');
}
            $price =base64_decode( $_GET['id']);
            $tax = ($price/100)*5;
            $_SESSION['cart_amount'] = $price;
            $_SESSION['tax_amount'] = $tax;
	        $_SESSION['total'] = $price + $tax;


             
     header('location:../product');
     ?>
