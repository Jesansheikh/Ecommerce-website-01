<?php session_start();
include('incl/db.php');
$current_username = $_SESSION['login_success'];
if (!isset($_SESSION['login_success'])) {
    header('location:login.php');
   
}

if (!isset($_SESSION['from_cart'])) {
    header('location:product');

}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Buy Now</title>
    <?php include('incl/css.php'); ?>
</head>

<body>
    <?php include('incl/menu.php');
    include('incl/secound_menu.php');

    $total_amount = $_SESSION['cart_amount'];
    $tax_amount = $_SESSION['tax_amount'];
    $total = $_SESSION['total'];

    

    $SQL = "SELECT * FROM `add_product`";
    $usercheck = $conn->query($SQL);
    $row = mysqli_num_rows($usercheck);
    $row = mysqli_fetch_assoc($usercheck);


    if (isset($_POST['paid'])) {
        $email = $_POST['email'];
        $card_number = $_POST['card_number'];
        $card_holder = $_POST['card_holder'];
        $country = $_POST['country'];
        $zip_code = $_POST['zip_code'];
        $state = $_POST['state'];
        $total_amount = $_SESSION['cart_amount'];
        

        if(!empty($_POST['email'])&&!empty($_POST['card_number'])&&!empty($_POST['card_holder'])&&!empty($_POST['country'])&&!empty($_POST['zip_code'])&&!empty($_POST['state'])){
         $payment_insert = "INSERT INTO `card_information`(`username`, `email`, `card_number`, `card_holder_name`, `country`, `zip_code`, `state`) VALUES ('$current_username','$email','$card_number','$card_holder','$country','$zip_code','$state')";
         $paid = $conn->query($payment_insert);

         if ($paid) {
            header( "refresh:2;url=payment_success");
         }
        }
     }


      //  current_user_info
         $billing_SQL = "SELECT * FROM `registation_form` WHERE `username` = '$current_username'";
         $usercheck = $conn->query($billing_SQL);
         $user_row = mysqli_fetch_assoc($usercheck);








    ?>
    <div class="container d-lg-flex">
        <div class="box-2">
            <div class="box-inner-2">
                <div>
                    <p class="fw-bold">Payment Details</p>
                    <p class="dis mb-3">Complete your purchase by providing your payment details</p>
                </div>
                <div>

                        <img style="margin-top:-20px" src="https://cdn.dribbble.com/users/957410/screenshots/3226085/dribbble-gif.gif" class="d-none<?php if(isset($paid)){echo "x";} ?>" width="600px"> 

                </div>

                <form method="POST">
                    <div class="mb-3">
                        <p class="dis fw-bold mb-2">Email address</p>
                        <input class="form-control" name="email" type="email" value="<?php echo $user_row['email']?>">
                    </div>
                    <div>
                        <p class="dis fw-bold mb-2">Card details</p>
                        <div class="d-flex align-items-center justify-content-between card-atm border rounded">
                            <div class="fab fa-cc-visa ps-3"></div>
                            <input type="text" name="card_number" required class="form-control" placeholder="Card Details">
                            <div class="d-flex w-50">
                                <input type="text" name="card_expairity" class="form-control px-0" placeholder="MM/YY">
                                <input type="password" name="cvv" maxlength=3 class="form-control px-0" placeholder="CVV">
                            </div>
                        </div>
                        <div class="my-3 cardname">
                            <p class="dis fw-bold mb-2">Cardholder name</p>
                            <input name="card_holder" class="form-control" type="text" value="<?php echo $user_row['fastName']?> <?php echo $user_row['lastName']?>">
                        </div>
                        <div class="address">
                            <p class="dis fw-bold mb-3">Billing address</p>
                            <select class="form-select" name="country" aria-label="Default select example">
                                <option value="bangladesh">Bangladesh</option>
                                <option value="india">India</option>
                                <option value="dubai">Dubai</option>
                                <option value="canada">Canada</option>
                                <option value="united state">United State</option>
                            </select>
                            <div class="d-flex">
                                <input name="zip_code" required class="form-control zip" type="text" placeholder="ZIP">
                                <input name="state" required class="form-control state" type="text" placeholder="State">
                            </div>
                            <div class="d-flex flex-column dis">
                                <div class="d-flex align-items-center justify-content-between mb-2">
                                    <p>Subtotal</p>
                                    <p><?php echo $total_amount ?></p>
                                </div>
                                <div class="d-flex align-items-center justify-content-between mb-2">
                                    <p>VAT<span>(5%)</span></p>
                                    <p><?php echo $tax_amount ?></p>
                                </div>
                                <div class="d-flex align-items-center justify-content-between mb-2">
                                    <p>Shoping Fee </p>
                                    <p>25 ৳</p>
                                </div>
                                <div class="d-flex align-items-center justify-content-between mb-2">
                                    <p class="fw-bold">Total</p>
                                    <p class="fw-bold"><?php echo $total ?>৳</p>
                                </div>
                                <input name="paid" class="primary-button mt-2 <?php if(isset($paid)){echo "d-none";} ?>" type="submit" value="Pay <?php echo $total?> ৳" >
                                <div class="col-lg-12 col-md-12">
                    

                    </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>

</html>



<?php
include('incl/footer.php');
include('incl/js.php');
?>



