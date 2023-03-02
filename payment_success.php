<?php session_start();
include('incl/db.php');
include('incl/css.php');

$current_username = $_SESSION['login_success'];

if (isset($_GET['id'])) {
    $product_id = $_GET['id'];

}
if (!isset($_SESSION['login_success'])) {
    header('location:login.php');
    if (!isset($_SESSION['product_id'])) {
        header('location:product');
    }
}
if (isset($_GET['id'])) {
   // select the current product and retrive details 

 $retrive = "SELECT * FROM `add_product` WHERE `SL` = '$product_id'  ";
 $retrive_details = $conn->query($retrive);
 $rows = mysqli_fetch_assoc($retrive_details);
 $productName = $rows['productName'];
 $model = $rows['model'];
 $productCategorie = $rows['productCategorie'];
 $amouunt_tk = $rows['productPrice'];
 date_default_timezone_set("Asia/Dhaka");
 $time = date('d-m-Y') . ', ' . date('h:i:sa');
 $current_username = $_SESSION['login_success'];


//  insert the payment history 

 $insert = "INSERT INTO `payment`(`username`, `product_name`, `model`, `category`, `quantity`, `Amount_Tk`, `buying date`) VALUES ('$current_username','$productName','$model','$productCategorie','1','$amouunt_tk','$time')";
 $update_data = $conn->query($insert);

if ($update_data ) {
    unset($_SESSION["product_id"]);
    unset($_SESSION["cart_amount"]);
    unset($_SESSION["tax_amount"]);
    unset($_SESSION["total"]);

    header( "refresh:2;url=index");

}
}

// cart payment 
if (!isset($_GET['id']) && $_SESSION['from_cart'] = "jesan") {

    $SQL = "SELECT * FROM `cart_product` WHERE `username`= '$current_username'";
    $cart_items = $conn->query($SQL);

    date_default_timezone_set("Asia/Dhaka");
    $time = date('d-m-Y') . ', ' . date('h:i:sa');

    while ($cart = mysqli_fetch_assoc($cart_items)){
        $productName = $cart['productName'];
        $model = $cart['model'];
        $productCategorie = "Static";
        $amouunt_tk = $cart['price'];
        $current_username = $cart['username'];


        $insert = "INSERT INTO `payment`(`username`, `product_name`, `model`, `category`, `quantity`, `Amount_Tk`, `buying date`) VALUES ('$current_username','$productName','$model','$productCategorie','1','$amouunt_tk','$time')";
        $update_data = $conn->query($insert);

        $remove="DELETE FROM `cart_product` WHERE `username`='$current_username'";
        $cart_remove = $conn->query($remove);
    
        $remove="DELETE FROM `total_cart` WHERE `username`='$current_username'";
        $cart_remove = $conn->query($remove);

        unset($_SESSION["from_cart"]);
        header( "refresh:2;url=index");
        
    }

}

?>


<div class="container ">

    <div class="text-center">
        <img src="https://www.omnipay.asia/Content/img/success-01.png"  width="400px">
        <br>
        <h6>Payment successfull, Continue shopping.......</h6>
    </div>

</div>
