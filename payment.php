<!-- <?php session_start();
include('incl/db.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Payment</title>
    <?php include ('incl/css.php'); ?>
</head>
<body>
<?php include ('incl/menu.php'); 
 include ('incl/secound_menu.php');

 $current_user = $_SESSION['login_success'];

if(!isset($current_user)){
    header('location:login');
}
?>
    <div class="payment-area mt-4  rounded">
        <div class="container m-0 p-0">
            <div class="payment-content">
                <img src="assets/img/bkash_payment_logo.png" alt="bkash patment logo" width="400px">
            </div>
            <div class="payment-text text-center p-2 mt-4 rounded ms-4 me-4">
                <b>Merchant : TestCheckoutMerchant1</b> <br>
                <b>Invoice Number: 4HxzyRXX</b> <br>
                <b>Amount: BDT 35</b>
            </div>

        <form method="POST">

            <div class="bkash-number text-center pt-4 me-4 ms-3">
                <b>Your Bkash Account Number</b>
                <input type="number" name="bkash_number" id="" class="bkash-number-input form-control mt-2">
            </div>
            <div class="terms-conditions pt-2 text-center">
                <input type="checkbox" name="" id="">
                I agree to the <a href=""> terms and condition</a>
            </div>
                <div class="row text-center ms-2 ">
                    <div class="col-md-6 pt-3"> 
                        
                <input type="submit" name="payment" value="PROCEED" class="ps-4 pe-4 p-2 rounded">
        </form>

        <?php
        if (isset($_POST['payment'])) {
           $current_username = $_SESSION['login_success'];
           $bkash_number = $_POST['bkash_number'];
           if (!empty( $bkash_number)) {
            $payment_insert = "INSERT INTO `payment`(`username`, `productiteam`, `price`, `email`, `phone`) VALUES ('$current_username','1','499','junait@gmail.com','01885655997')";
            $paid = $conn->query($payment_insert);
           }
        }
        ?>


                    </div>
                    <div class="col-md-6 pt-3">
                        <button class="ps-4 pe-4 p-2 rounded" onClick="history.go(-1)">CLOSE</button>
                    </div>
                </div>
                <div class="help-line-number text-center pt-2 pb-4">
                    <i class="fa-solid fa-phone"></i>
                    <b>16247</b>
                </div>
        </div>
    </div>
</body>
<?php
include('incl/footer.php');
include('incl/js.php');
?>
</html>

<style>
    .payment-area{
    max-width: 400px;
    margin: 0 auto;
    background-color: #FF1E63;
    color: white;
}

.payment-text{
    background-color: #bd083e;
}
.bkash-number{
    margin: 0 auto;
}
.bkash-number-input{
    outline: none;
}
input, button{
    outline: none;
    border: none;
}
a{
    color: white;
}
/* Chrome, Safari, Edge, Opera */
input::-webkit-outer-spin-button,
input::-webkit-inner-spin-button {
  -webkit-appearance: none;
  margin: 0;
}

/* Firefox */
input[type=number] {
  -moz-appearance: textfield;
}
</style>
 -->
