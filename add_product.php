<?php session_start();
include('incl/db.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Product</title>
    <?php include ('incl/css.php'); ?>
</head>
<body>
<?php include ('incl/menu.php'); 
 include ('incl/secound_menu.php');

 $current_user = $_SESSION['login_success'];

if(!isset($current_user)){
    header('location:login.php');
}

$productCategorie=$productName=$productPrice=$model=$processor=$ram=$display=$productDescription=$image="";
if($_SERVER['REQUEST_METHOD']=='POST'){
    if($_POST['productCategorie']=='0'){
        $productCategorie_err='<span class="text-danger">'."Select Product Categorie.".'</span>' ;
    }else{
        $productCategorie=$_POST['productCategorie'];
    }
    if(empty($_POST['productName'])){
        $productName_err='<span class="text-danger">'."Enter Your Product Name.".'</span>' ;
    }else{
        $productName=$_POST['productName'];
    }
    if(empty($_POST['productPrice'])){
        $productPrice_err='<span class="text-danger">'."Enter Your Product Price.".'</span>' ;
    }else{
        $productPrice=$_POST['productPrice'];
    }
    if(empty($_POST['model'])){
        $model_err='<span class="text-danger">'."Enter Your Product Model.".'</span>' ;
    }else{
        $model=$_POST['model'];
    }
    if(empty($_POST['processor'])){
        $processor_err='<span class="text-danger">'."Enter Your Product Processor.".'</span>' ;
    }else{
        $processor=$_POST['processor'];
    }
    if(empty($_POST['ram'])){
        $ram_err='<span class="text-danger">'."Enter Your Product RAM.".'</span>' ;
    }else{
        $ram=$_POST['ram'];
    }
    if(empty($_POST['display'])){
        $display_err='<span class="text-danger">'."Enter Your Product Display Size.".'</span>' ;
    }else{
        $display=$_POST['display'];
    }
    if(empty($_POST['productDescription'])){
        $productDescription_err='<span class="text-danger">'."Enter Your Product Description.".'</span>' ;
    }else{
        $productDescription=$_POST['productDescription'];
    }
    if(empty($_POST['image'])){
        $image_err='<span class="text-danger">'."Enter Your Product Image.".'</span>' ;
    }else{
        $image=$_POST['image'];
    }
   
}

if(isset($_POST)){
    if(isset($_FILES['image'])){
        $_FILES['image'];
        $image = explode('.',$_FILES['image'] ['name']);
        $image = end($image);
        $login_usser = $_SESSION['login_success'];

        $SQL = "SELECT * FROM `add_product` ORDER BY `SL` DESC LIMIT 1";
        $usercheck = $conn->query($SQL);
        $row = mysqli_fetch_assoc($usercheck);
       $image_name = $row['SL'].$login_usser.'.'.$image; 
    }
}     
if(isset($_POST)){
    if(isset($_FILES['image1'])){
        $_FILES['image1'];
        $image = explode('.',$_FILES['image1'] ['name']);
        $image = end($image);
        $login_usser = $_SESSION['login_success'];
        $SQL = "SELECT * FROM `add_product` ORDER BY `SL` DESC LIMIT 1";
        $usercheck = $conn->query($SQL);
        $row = mysqli_fetch_assoc($usercheck);
       $image_name1 = $row['SL'].$login_usser.'1.'.$image; 
    }
}    
if(isset($_POST)){
    if(isset($_FILES['image2'])){
        $_FILES['image2'];
        $image = explode('.',$_FILES['image2'] ['name']);
        $image = end($image);
        $login_usser = $_SESSION['login_success'];
        $SQL = "SELECT * FROM `add_product` ORDER BY `SL` DESC LIMIT 1";
        $usercheck = $conn->query($SQL);
        $row = mysqli_fetch_assoc($usercheck);
       $image_name2 = $row['SL'].$login_usser.'2.'.$image; 
    }
}    
if(isset($_POST)){
    if(isset($_FILES['image3'])){
        $_FILES['image3'];
        $image = explode('.',$_FILES['image3'] ['name']);
        $image = end($image);
        $login_usser = $_SESSION['login_success'];
        $SQL = "SELECT * FROM `add_product` ORDER BY `SL` DESC LIMIT 1";
        $usercheck = $conn->query($SQL);
        $row = mysqli_fetch_assoc($usercheck);
       $image_name3 = $row['SL'].$login_usser.'3.'.$image; 
    }
}    
if(isset($_POST)){
    if(isset($_FILES['image4'])){
        $_FILES['image4'];
        $image = explode('.',$_FILES['image4'] ['name']);
        $image = end($image);
        $login_usser = $_SESSION['login_success'];
        $SQL = "SELECT * FROM `add_product` ORDER BY `SL` DESC LIMIT 1";
        $usercheck = $conn->query($SQL);
        $row = mysqli_fetch_assoc($usercheck);
       $image_name4 = $row['SL'].$login_usser.'4.'.$image; 
    }
}    


if(!empty($_POST['productCategorie'])&&!empty($_POST['productName'])&&!empty($_POST['productPrice'])&&!empty($_POST['model'])&&!empty($_POST['processor'])&&!empty($_POST['ram'])&&!empty($_POST['display'])&&!empty($_POST['productDescription'])&& $_FILES['image'] ['size']>=1){
    $insert="INSERT INTO `add_product`(`Author`,`productCategorie`, `productName`, `productPrice`, `model`, `processor`, `ram`, `display`, `productDescription`, `image`, `image1`, `image2`, `image3`, `image4`) VALUES ('$current_user','$productCategorie','$productName','$productPrice','$model','$processor','$ram','$display','$productDescription','$image_name','$image_name1','$image_name2','$image_name3','$image_name4')";
    $check = $conn->query($insert);   
    if ($check) {
        move_uploaded_file( $_FILES['image'] ['tmp_name'],'assets/img/add_product/'.$image_name);
        move_uploaded_file( $_FILES['image1'] ['tmp_name'],'assets/img/add_product/'.$image_name1);
        move_uploaded_file( $_FILES['image2'] ['tmp_name'],'assets/img/add_product/'.$image_name2);
        move_uploaded_file( $_FILES['image3'] ['tmp_name'],'assets/img/add_product/'.$image_name3);
        move_uploaded_file( $_FILES['image4'] ['tmp_name'],'assets/img/add_product/'.$image_name4);
       
        include('support/redirect_view_all_upload_product.php');
        echo "data insert";
    } else{
        echo "Sorry ! data not inserted";
    }
}
?>

<div class="add-product">
    <div class="container">
        <div class="product-list">
            <form class="form-horizontal" method="POST" enctype="multipart/form-data">
                <fieldset>
                    <!-- Form Name -->
                    <legend>PRODUCTS</legend>
                    <!-- Select Basic -->
                    <div class="form-group">
                        <label class="col-md-7 control-label require" for="product_categorie">PRODUCT CATEGORY</label>
                        <div class="col-md-7">
                            <select id="productCategorie" name="productCategorie" class="form-control">
                            <option value="0" selected hidden>Select Product</option>
                                <option value="laptop">Laptop</option>
                                <option value="mobilePhone">Mobile Phone</option>
                            </select>
                            <?php  if(isset($productCategorie_err)){echo $productCategorie_err;}  ?>
                            
                        </div>
                    </div>
                    <!-- Text input-->
                    <div class="form-group">
                        <label class="col-md-7 control-label require" for="product_name">PRODUCT NAME</label>
                        <div class="col-md-7">
                            <input id="productName" name="productName" placeholder="PRODUCT NAME" class="form-control" type="text" value="<?php echo $productName?>">
                            <?php  if(isset($productName_err)){echo $productName_err;}  ?>
                        </div>
                    </div>
                    <!-- Text input-->
                    <div class="form-group">
                        <label class="col-md-7 control-label require" for="product_name">PRODUCT PRICE</label>
                        <div class="col-md-7">
                            <input id="product_price" name="productPrice" placeholder="PRODUCT PRICE" class="form-control" type="number" value="<?php echo $productPrice?>">
                            <?php  if(isset($productPrice_err)){echo $productPrice_err;}  ?>
                        </div>
                    </div>
                    <!-- Text input-->
                    <div class="form-group">
                        <label class="col-md-7 control-label require" for="model">MODEL</label>
                        <div class="col-md-7">
                            <input id="model" name="model" placeholder="Model" class="form-control" type="text" value="<?php echo $model?>">
                            <?php  if(isset($model_err)){echo $model_err;}  ?>
                        </div>
                    </div>
                    <!-- Text input-->
                    <div class="form-group">
                        <label class="col-md-7 control-label require" for="processor">PROCESSOR</label>
                        <div class="col-md-7">
                            <input id="processor" name="processor" placeholder="Processor" class="form-control" type="text" value="<?php echo $processor?>">
                            <?php  if(isset($processor_err)){echo $processor_err;}  ?>
                        </div>
                    </div>
                    <!-- Select Basic -->
                    <div class="form-group">
                        <label class="col-md-7 control-label require" for="ram">RAM</label>
                        <div class="col-md-7">
                            <select id="ram" name="ram" class="form-control">
                            <option selected hidden value="0">Select RAM</option>
                                <option value="1">1 GB</option>
                                <option value="2">2 GB</option>
                                <option value="4">4 GB</option>
                                <option value="8">8 GB</option>
                                <option value="16">16 GB</option>
                                <option value="32">32 GB</option>
                                <option value="64">64 GB</option>
                                <option value="124">128 GB</option>
                            </select>
                            <?php  if(isset($ram_err)){echo $ram_err;}  ?>
                        </div>
                    </div>
                    <!-- Textarea -->
                    <div class="form-group">
                        <label class="col-md-7 control-label require" for="display">DISPLAY</label>
                        <div class="col-md-7">
                            <input id="display" name="display" placeholder="DISPLAY SIZE ''" class="form-control" type="text" value="<?php echo $display?>">
                            <?php  if(isset($display_err)){echo $display_err;}  ?>
                        </div>
                    </div>
                    <!-- Textarea -->
                    <div class="form-group">
                        <label class="col-md-7 control-label" for="product_description">PRODUCT DESCRIPTION</label>
                        <div class="col-md-7">
                            <textarea class="form-control" id="product_description" cols="30" rows="10" name="productDescription"></textarea>
                            <?php  if(isset($productDescription_err)){echo $productDescription_err;}  ?>
                        </div>
                    </div>
                    <!-- File Button -->
                    <div class="form-group">
                        <label class="col-md-7 control-label require" for="image">MAIN IMAGE</label>
                        <div class="col-md-7">
                            <input id="file-input" name="image" accept='image/*' class="input-file form-control" value="<?php echo $image?>" type="file">
                            <?php  if(isset($image_err)){echo $image_err;}  ?>
                            <img id="image-preview" src="assets/img/default_image.png" alt="your image" class="pt-2" width="200px">
                        </div>
                    </div>
                    <!-- File Button -->
                    <div class="form-group">
                        <label class="col-md-7 control-label " for="image">SECONDARY IMAGE</label>
                        <div class="col-md-7">
                            <input id="file-input1" name="image1" accept='image/*'  class="input-file form-control" type="file">
                            <img id="image-preview1" src="assets/img/default_image.png" alt="your image" class="pt-2" width="200px">
                        </div>
                    </div>
                    <!-- File Button -->
                    <div class="form-group">
                        <label class="col-md-7 control-label " for="image">SECONDARY IMAGE</label>
                        <div class="col-md-7">
                            <input id="file-input2" name="image2" accept='image/*' class="input-file form-control" type="file">
                            <img id="image-preview2" src="assets/img/default_image.png" alt="your image" class="pt-2" width="200px">
                        </div>
                    </div>
                    <!-- File Button -->
                    <div class="form-group">
                        <label class="col-md-7 control-label" for="image">SECONDARY IMAGE</label>
                        <div class="col-md-7">
                            <input id="file-input3" name="image3" accept='image/*' class="input-file form-control" type="file">
                            <img id="image-preview3" src="assets/img/default_image.png" alt="your image" class="pt-2" width="200px">
                        </div>
                    </div>
                    <!-- File Button -->
                    <div class="form-group">
                        <label class="col-md-7 control-label" for="image">SECONDARY IMAGE</label>
                        <div class="col-md-7">
                            <input id="file-input4" name="image4" accept='image/*' class="input-file form-control" type="file">
                            <img id="image-preview4" src="assets/img/default_image.png" alt="your image" class="pt-2" width="200px">
                        </div>
                    </div>
                    <!-- Button -->
                    <div class="form-group">
                        <div class="col-md-7">
                            <button id="addProduct" name="addProduct" class="btn primary-button">SUBMIT</button>
                        </div>
                    </div>
                </fieldset>
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
