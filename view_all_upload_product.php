<?php session_start();
include('incl/db.php');

if (!isset($_SESSION['login_success'])) {
    header('location:login.php');
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View All Upload Product</title>
    <?php include('incl/css.php'); ?>
</head>

<body>
    <?php include('incl/menu.php');
    include('incl/secound_menu.php');
    ?>
    <div class="product-area">
        <div class="container">
            <div class="main-menu pt-2">
                <div class="container">
                    <div class="row justify-content-start">

                        <?php
                        $current_user = $_SESSION['login_success'];
                        $SQL = "SELECT * FROM `add_product` WHERE `Author` = '$current_user' ORDER BY `SL` DESC";
                        $usercheck = $conn->query($SQL);
                        while ($row = mysqli_fetch_assoc($usercheck)) {


                        ?>
                            <div class="col-12 col-sm-6 col-lg-3 mb-2">
                                <div class="card product-card">
                                    <img class="card-img-top" src="assets/img/add_product/<?php echo ($row['image']); ?>" alt="product Thumbnail" />
                                    <div class="card-body border-top p-0">
                                        <a href="product_details.php?id=<?php echo ($row['SL']) ?>" class="product-title"><?php echo ($row['productName']); ?></a>
                                    </div>
                                    <div class="card_footer mt-2">
                                        <div class="d-flex justify-content-between">
                                            <div class="text-muted fw-normal ms-2 ">
                                                <s>29999</s>
                                                <small class="text-success">-35%</small>
                                            </div>
                                            <div class="me-2">
                                                <span><?php echo ($row['productPrice']); ?> ৳</span>
                                            </div>
                                        </div>
                                        <div class="d-grid gap-2 mt-1">
                                        <div class="d-grid gap-2 mt-1">
                                        <a class="btn btn-outline-success" href="view_all_upload_product_edit?id=<?php echo base64_encode(( ($row['SL'])));?>">Edit Product</a>
                                    </div>
                                        </div>
                                        <div class="d-grid gap-2 mt-1">
                                        <a class="btn btn-outline-danger mb-2" href="javascript:confirmDelete('view_all_upload_product_delete?id=<?php echo base64_encode(( ($row['SL'])));?>')">Delete Product</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <?php

                        }
                        ?>

                        <?php
                        if (isset($_POST['cart'])) {
                            $id = $_POST['id'];
                            $update = "UPDATE `add_product` SET `cart_startus`='Added to cart' WHERE `SL`='$id'";

                            $usercheck = $conn->query($update);
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