<?php session_start();
include('incl/db.php');
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product Details</title>
    <?php include('incl/css.php'); ?>
</head>

<body>
    <?php include('incl/menu.php');
    include('incl/secound_menu.php');



    $sl =  $_GET['id'];
    $SQL = "SELECT * FROM `add_product` WHERE `SL`='$sl'";
    $usercheck = $conn->query($SQL);
    $row = mysqli_num_rows($usercheck);
    $row = mysqli_fetch_assoc($usercheck);
    if (isset($_SESSION['login_success'])) {
        $username = $_SESSION['login_success'];
    }

    $match = "SELECT `product_id` FROM `cart_product` WHERE `username`='$username' AND `product_id`= '$sl'";
    $matchcheck = $conn->query($match);
    $result = mysqli_num_rows($matchcheck);


    if (isset($_POST['cart'])) {
        $id = $_POST['id'];
        $update = "UPDATE `add_product` SET `cart_startus`='Added to cart' WHERE `SL`='$id'";
        $usercheck = $conn->query($update);
        // Select Current cart product
        $current_cart = "SELECT * FROM `add_product` WHERE `SL`= '$id'";
        $insert_new_cart = $conn->query($current_cart);
        $cart_row = mysqli_fetch_assoc($insert_new_cart);


        $productName = $cart_row['productName'];
        $display = $cart_row['display'];
        $ram = $cart_row['ram'];
        $model =  $cart_row['model'];
        $quantity = '1';
        $price = $cart_row['productPrice'];
        $image = $cart_row['image'];
        $product_id = $cart_row['SL'];

        // insert cart product cart table 
        $insert_cart = "INSERT INTO `cart_product`(`username`, `productName`, `display`, `ram`, `model`, `quantity`, `price`, `image`, `product_id`) VALUES ('$username','$productName','$display','$ram','$model','$quantity','$price','$image','$product_id')";
        $cart_insert = $conn->query($insert_cart);
    }

    $current_product_id = $row['SL'];
    if (isset($_SESSION['login_success'])) {
        $current_username = $_SESSION['login_success'];
        $match = "SELECT `product_id` FROM `cart_product` WHERE `username`='$current_username' AND `product_id`= '$current_product_id'";
        $matchcheck = $conn->query($match);
        $result = mysqli_num_rows($matchcheck);
    }

    // product_information
    $price = $row['productPrice'];
    $discount_price = $price / 100;
    $discount_price = $discount_price  * 10;
    $discount_price = $price + $discount_price;

    ?>
    <div class="container my-5">
        <div class="row">
            <div class="col-md-5">
                <div class="main-img">
                    <img class="img-fluid" src="assets/img/add_product/<?php echo ($row['image']); ?>" alt="ProductS">
                    <div class="row my-3 previews">
                        <div class="col-md-3">
                            <img class="w-100" src="assets/img/add_product/<?php echo ($row['image1']); ?>" alt="Sale">
                        </div>
                        <div class="col-md-3">
                            <img class="w-100" src="assets/img/add_product/<?php echo ($row['image2']); ?>" alt="Sale">
                        </div>
                        <div class="col-md-3">
                            <img class="w-100" src="assets/img/add_product/<?php echo ($row['image3']); ?>" alt="Sale">
                        </div>
                        <div class="col-md-3">
                            <img class="w-100" src="assets/img/add_product/<?php echo ($row['image4']); ?>" alt="Sale">
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-7">
                <div class="main-description px-2">
                    <div class="category text-bold">
                        Category : <?php echo ($row['productCategorie']); ?>
                    </div>
                    <div class="product-title text-bold my-3">
                        <?php echo ($row['productName']); ?>
                    </div>
                    <div class="price-area my-4">
                        <p class="old-price mb-1"><del><?php echo ($discount_price); ?> ৳</del> <span class="old-price-discount text-danger">(10% off)</span></p>
                        <p class="new-price text-bold mb-1"><?php echo ($price); ?> ৳</p>
                        </p>
                        <p class="text-secondary mb-1">(Additional tax may apply on checkout)</p>
                    </div>
                    <div class="buttons d-flex my-5">
                        <div class="block">
                            <div class="d-grid gap-2 mt-1">
                                <a <?php if (isset($result) && $result == "1") {
                                        echo 'x';
                                    } else {
                                        echo 'href';
                                    } ?>="support\add_to_cart2?id=<?php echo $SL = $row['SL'] ?>">
                                    <div class="btn btn-outline-secondary w-100 <?php if (isset($result) && $result == "1") {
                                                                                    echo 'hover_n';
                                                                                } ?>"><i class="fa-solid fa-cart-shopping pe-4"></i>
                                        <span class=" text-black-50 border-0"> <?php if (isset($result) && $result == 1) {
                                                                                    echo "Added to Cart";
                                                                                } else {
                                                                                    echo "Add to Cart";
                                                                                } ?></span>
                                    </div>
                                </a>
                            </div>
                        </div>
                        <div class="d-grid gap-2 mt-1">
                            <a class="btn btn-outline-primary" href="support/buy_now?id=<?php echo base64_encode(($current_product_id)); ?>">Buy Now</a>
                        </div>
                    </div>
                </div>
                <div class="product-details my-4">
                    <p class="details-title text-color mb-1">Key Features</p>
                    <p class="description">Model: <?php echo ($row['model']); ?></p>
                    <p class="description">Processor: <?php echo ($row['processor']); ?></p>
                    </p>
                    <p class="description">RAM: <?php echo ($row['ram']); ?> GB</p>
                    </p>
                    <p class="description">Display: <?php echo ($row['display']); ?>''</p>
                    </p>
                </div>
                <div class="row questions bg-light p-3">
                    <div class="col-md-1 icon">
                        <i class="fa-brands fa-rocketchat questions-icon"></i>
                    </div>
                    <div class="col-md-11">
                        <p><?php echo ($row['productDescription']); ?></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container similar-products my-4">
        <hr>
        <p class="display-5">Similar Products</p>

        <div class="row">
            <?php
            $category = $row['productCategorie'];
            $SQL = "SELECT * FROM `add_product` WHERE `productCategorie`='$category' ORDER BY RAND () LIMIT 4";

            $usercheck = $conn->query($SQL);
            while ($row = mysqli_fetch_assoc($usercheck)) {
            ?>
                <div class="col-md-3">
                    <div class="similar-product">
                        <img class="w-100" src="assets/img/add_product/<?php echo $row['image']; ?>">
                        <a href="product_details?id=<?php echo $row['SL']; ?>" class="title"><?php echo $row['productName']; ?></a>
                        <p class="price"><?php echo $row['productPrice']; ?> ৳</p>
                    </div>
                </div>
            <?php } ?>
        </div>
    </div>
</body>

</html>
<?php
include('incl/footer.php');
include('incl/js.php');
?>