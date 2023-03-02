<?php
session_start();
include('../incl/db.php');
if (!isset($_SESSION['login_success'])) {
    header('location:../login.php');
}

        if ($_SESSION['login_success']) {
            $id = $_GET['id'] ;

            //  $update = "UPDATE `add_product` SET `cart_startus`='Added to cart' WHERE `SL`='$id'";
            //  $usercheck = $conn->query($update);
             // Select Current cart product
             $current_cart = "SELECT * FROM `add_product` WHERE `SL`= '$id'";
             $insert_new_cart = $conn->query($current_cart);
             $cart_row = mysqli_fetch_assoc($insert_new_cart);

             $username = $_SESSION['login_success'];
             $productName = $cart_row['productName'];
             $display = $cart_row['display'];
             $ram = $cart_row['ram'];
             $model =  $cart_row['model'];
             $quantity = '1';
             $price = $cart_row['productPrice'];
             $image = $cart_row['image'];
             $product_id = $cart_row['SL'];

             
                 $insert_cart = "INSERT INTO `cart_product`(`username`, `productName`, `display`, `ram`, `model`, `quantity`, `price`, `total_price`,`image`, `product_id`) VALUES ('$username','$productName','$display','$ram','$model','$quantity','$price','$price','$image','$product_id')";
                 $cart_insert = $conn->query($insert_cart);
             
             // calculate_cart_amount
             $count = "SELECT * FROM `total_cart` WHERE `username`= '$username'";
             $count_cart_user = $conn->query($count);
             $count = mysqli_num_rows($count_cart_user);

             if ($count < 1) {

                 $calculate_cart_amount = "INSERT INTO `total_cart`(`username`, `total_cart_amount`) VALUES ('$username','$price')";
                 $cart_amount_insert = $conn->query($calculate_cart_amount);
             }


             if ($count >= 1) {
                 $present_total_amount = "SELECT * FROM `total_cart` WHERE `username`= '$username'";
                 $total_amnt = $conn->query($present_total_amount);
                 $total = mysqli_fetch_assoc($total_amnt);

                 $new_amount = $total['total_cart_amount'] + $price;

                 $calculate_cart_amount = "UPDATE `total_cart` SET `total_cart_amount`='$new_amount' WHERE `username`='$username'";
                 $cart_amount_update = $conn->query($calculate_cart_amount);
             }

     header('location:../laptop#x'.$id);
        }
     ?>
