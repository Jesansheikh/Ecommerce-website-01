<?php session_start();
include('incl/db.php');
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    <?php include('incl/css.php'); ?>
</head>

<body>
    <?php include('incl/menu.php');
    include('incl/secound_menu.php')
    ?>

    <div class="product-area">
        <div class="container">
            <div class="laptop-area pt-4">
                <b>Laptop</b>
                <div class="main-menu pt-2">
                    <div class="container">
                        <div class="row justify-content-start ">
                            <?php
                            if (isset($search_key)) {
                                $SQL = "SELECT * FROM `add_product` WHERE `productName` LIKE '%$search_key%'";
                            } else {
                                $SQL = "SELECT * FROM `add_product` WHERE `productCategorie`='laptop' ORDER BY RAND ()";
                            }
                            $usercheck = $conn->query($SQL);
                            while ($row = mysqli_fetch_assoc($usercheck)) {
                                // match carted or no 
                                $current_product_id = $row['SL'];
                                if (isset($_SESSION['login_success'])) {
                                    $current_username = $_SESSION['login_success'];

                                    $match = "SELECT `product_id` FROM `cart_product` WHERE `username`='$current_username' AND `product_id`= '$current_product_id'";
                                    $matchcheck = $conn->query($match);
                                    $result = mysqli_num_rows($matchcheck);
                                }
                            ?>
                                <div id="x<?php echo $row['SL'] ?>" class="<?php if (isset($search_key)) {
                                                                                'd-none';
                                                                            } ?> col-12 col-sm-6 col-lg-3 mb-2 <?php echo ($row['productCategorie']) ?>">
                                    <a href="product_details.php?id=<?php echo ($row['SL']) ?>" class="product-title">
                                        <div class="card product-card">
                                            <img class="card-img-top" src="assets/img/add_product/<?php echo ($row['image']); ?>" alt="product Thumbnail" />
                                            <div class="card-body border-top p-0">
                                                <?php echo ($row['productName']); ?>
                                            </div>
                                    </a>
                                    <div class="card_footer mt-2">
                                    <div class="d-flex justify-content-between">
                                        <div class="text-muted fw-normal ms-2 ">
                                            <s>
                                                <?php
                                                $price = $row['productPrice'];
                                                $discount_price = $price / 100;
                                                $discount_price = $discount_price  * 10;
                                                echo $discount_price = $price + $discount_price;
                                                ?>
                                            </s>
                                            <small class="text-success">-10%</small>
                                        </div>
                                        <div class="me-2">
                                            <span><?php echo ($price); ?> ৳</span>
                                        </div>
                                    </div>
                                    <div class="d-grid gap-2 mt-1">
                                        <a <?php if (isset($result) && $result == "1") {
                                                echo 'x';
                                            } else {
                                                echo 'href';
                                            } ?>="support\add_to_cart?id=<?php echo $row['SL'] ?>">
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
                                    <div class="d-grid gap-2 mt-1">
                                        <a class="btn btn-outline-primary" href="support/buy_now?id=<?php echo base64_encode(($current_product_id)); ?>">Buy Now</a>
                                    </div>
                                </div>
                                </div>
                        </div>
                    <?php

                            }

                    ?>
                    </div>
                </div>
            </div>
            <div class="Mobile-area pt-4">
                <b>Mobile Phone</b>
                <div class="main-menu pt-2">
                    <h6 class="text-primary d-none <?php if (isset($search_items)) {
                                                        echo "show";
                                                    } ?>"> About <?php if (isset($search_items)) {
                                                                        echo $search_items;
                                                                    } ?> results found</h6>

                    <div class="container">
                        <div class="row justify-content-start ">
                            <?php

                            $SQL = "SELECT * FROM `add_product` WHERE `productCategorie`='mobilePhone' ORDER BY RAND ()";
                            $usercheck = $conn->query($SQL);
                            while ($row = mysqli_fetch_assoc($usercheck)) {
                                // match carted or no 
                                $current_product_id = $row['SL'];
                                if (isset($_SESSION['login_success'])) {
                                    $current_username = $_SESSION['login_success'];

                                    $match = "SELECT `product_id` FROM `cart_product` WHERE `username`='$current_username' AND `product_id`= '$current_product_id'";
                                    $matchcheck = $conn->query($match);
                                    $result = mysqli_num_rows($matchcheck);
                                }
                            ?>
                                <div id="x<?php echo $row['SL'] ?>" class="<?php if (isset($search_key)) {
                                                                                'd-none';
                                                                            } ?> col-12 col-sm-6 col-lg-3 mb-2 <?php echo ($row['productCategorie']) ?>">
                                    <a href="product_details.php?id=<?php echo ($row['SL']) ?>" class="product-title">
                                        <div class="card product-card">
                                            <img class="card-img-top" src="assets/img/add_product/<?php echo ($row['image']); ?>" alt="product Thumbnail" />
                                            <div class="card-body border-top p-0">
                                                <?php echo ($row['productName']); ?>
                                            </div>
                                    </a>
                                    <div class="card_footer mt-2">
                                    <div class="d-flex justify-content-between">
                                        <div class="text-muted fw-normal ms-2 ">
                                            <s>
                                                <?php
                                                $price = $row['productPrice'];
                                                $discount_price = $price / 100;
                                                $discount_price = $discount_price  * 10;
                                                echo $discount_price = $price + $discount_price;
                                                ?>
                                            </s>
                                            <small class="text-success">-10%</small>
                                        </div>
                                        <div class="me-2">
                                            <span><?php echo ($price); ?> ৳</span>
                                        </div>
                                    </div>
                                    <div class="d-grid gap-2 mt-1">
                                        <a <?php if (isset($result) && $result == "1") {
                                                echo 'x';
                                            } else {
                                                echo 'href';
                                            } ?>="support\add_to_cart?id=<?php echo $row['SL'] ?>">
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
                                    <div class="d-grid gap-2 mt-1">
                                        <a class="btn btn-outline-primary" href="support/buy_now?id=<?php echo base64_encode(($current_product_id)); ?>">Buy Now</a>
                                    </div>
                                </div>
                                </div>
                        </div>
                    <?php

                            }

                    ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>
<?php
include('incl/footer.php');
include('incl/js.php');
?>