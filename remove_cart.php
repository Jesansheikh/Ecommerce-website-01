<?php
session_start();
include ('incl/db.php');
$current_user= $_SESSION['login_success'];
if(!isset($current_user)){
    header('location:login.php');
  }
  $product_id=  $_GET['id'];
  $delete_id=  $_GET['id'];


  // select cart amount by removing product  
  $removing_product = "SELECT * FROM `cart_product` WHERE `product_id`= '$product_id'";
  $removing_product_query = $conn->query($removing_product);
  $removing_item = mysqli_fetch_assoc($removing_product_query);
  echo $removing_item_amount = $removing_item['total_price'];

// Present Cart Amount 
  $current_total_cart_amount = "SELECT * FROM `total_cart` WHERE `username` = '$current_user'";
  $current_total_cart_amount_query = $conn->query($current_total_cart_amount);
  $old_total = mysqli_fetch_assoc($current_total_cart_amount_query);
  $pre_total = $old_total['total_cart_amount'];


  // update total amount 
  $new_total_amount = $pre_total - $removing_item_amount;
  $calculate_cart_amount = "UPDATE `total_cart` SET `total_cart_amount`='$new_total_amount' WHERE `username`='$current_user'";
  $cart_amount_update = $conn->query($calculate_cart_amount); 

// Delete product from  cart page
  $remove="DELETE FROM `cart_product` WHERE `product_id` = '$product_id'";
  $cart_remove = $conn->query($remove);


  if ($delete_id == 'empty') {
    $remove="DELETE FROM `cart_product` WHERE `username`='$current_user'";
    $cart_remove = $conn->query($remove);

    $remove="DELETE FROM `total_cart` WHERE `username`='$current_user'";
    $cart_remove = $conn->query($remove);
  }

  header('location:cart.php');





 ?>