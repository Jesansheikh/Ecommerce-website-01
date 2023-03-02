<?php
session_start();
include('../incl/db.php');

if (!isset($_SESSION['login_success'])) {
	header('location:login.php');
}
            $SL =base64_decode( $_GET['id']);

            // select the current product and retrive details 

            $retrive = "SELECT * FROM `add_product` WHERE `SL` = '$SL'  ";
            $retrive_details = $conn->query($retrive);
            $rows = mysqli_fetch_assoc($retrive_details);
            $product_id = $rows['SL'];
            $price = $rows['productPrice'];

            $tax = ($price/100)*5;
            $_SESSION['cart_amount'] = $price;
            $_SESSION['tax_amount'] = $tax;
	     $_SESSION['total'] = $price + $tax ;
            $_SESSION['product_id'] = $product_id;



             
     header('location:../buy_now');
     ?>
