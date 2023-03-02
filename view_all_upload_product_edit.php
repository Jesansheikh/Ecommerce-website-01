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
$sl = base64_decode($_GET['id']);

$datashow = "SELECT * FROM `add_product` WHERE `SL`='$sl'";
$usercheck = $conn->query($datashow);
$xz = mysqli_num_rows($usercheck);
$row = mysqli_fetch_assoc($usercheck);
$login_usser = $_SESSION['login_success'];


if(isset($_POST)){
    if(isset($_FILES['image'])){
        $_FILES['image'];
        $image = explode('.',$_FILES['image'] ['name']);
        $image_size = $_FILES['image'] ['size'];
        $image = end($image);
       $image_name = $row['image'].'update'; 
    }
}
if(isset($_POST)){
    if(isset($_FILES['image1'])){
        $_FILES['image1'];
        $image1 = explode('.',$_FILES['image1'] ['name']);
        $image_size1 = $_FILES['image1'] ['size'];
        $image1 = end($image1);
       $image_name1 = $row['image1'].'update1'; 
    }
}    
if(isset($_POST)){
    if(isset($_FILES['image2'])){
        $_FILES['image2'];
        $image2 = explode('.',$_FILES['image2'] ['name']);
        $image_size2 = $_FILES['image2'] ['size'];
        $image2 = end($image2);
       $image_name2 = $row['image2'].'update2'; 
    }
}    
if(isset($_POST)){
    if(isset($_FILES['image3'])){
        $_FILES['image3'];
        $image3 = explode('.',$_FILES['image3'] ['name']);
        $image_size3 = $_FILES['image3'] ['size'];
        $image3 = end($image3);
       $image_name3 = $row['image3'].'update3'; 
    }
}    
if(isset($_POST)){
    if(isset($_FILES['image4'])){
        $_FILES['image4'];
        $image4 = explode('.',$_FILES['image4'] ['name']);
        $image_size4 = $_FILES['image4'] ['size'];
        $image4 = end($image4);
       $image_name4 = $row['image4'].'update4'; 
    }
}    
       

if (isset($_POST['update'])) {

    $productCategorie = $_POST['productCategorie'];
    $productName = $_POST['productName'];
    $productPrice = $_POST['productPrice'];
    $model = $_POST['model'];
    $processor = $_POST['processor'];
    $ram = $_POST['ram'];
    $display = $_POST['display'];
    $productDescription = $_POST['productDescription'];

    

    if($_FILES['image']){ 
        $uploaded= $image_size/1024/1024;
        $uploaded= round($uploaded, 2);
        echo $uploaded;
        if ($image_size > 5242880 ) {          
           $too_large_img = "Sorry ! Your selected picture size is ".$uploaded." MB, Maximum upload picture size 5 MB";
        }
        if(524288 > $image_size && 0 < $image_size){
        $update = "UPDATE `add_product` SET `image`='$image_name' WHERE `SL`='$sl'";
        $usercheck = $conn->query($update);
        move_uploaded_file( $_FILES['image'] ['tmp_name'],'assets/img/add_product/'.$image_name); 
        $_SESSION['picture_uploaded'] = "x";

    }
    }
     
  
    if($_FILES['image1']){ 
        $uploaded1= $image_size1/1024/1024;
        $uploaded1= round($uploaded1, 2);
        if ($image_size1 > 5242880 ) {          
           $too_large_img1 = "Sorry ! Your selected picture size is ".$uploaded1." MB, Maximum upload picture size 5 MB";
        }
        if(524288 > $image_size1 && 0 < $image_size1){
        $update = "UPDATE `add_product` SET `image1`='$image_name1' WHERE `SL`='$sl'";
        $usercheck = $conn->query($update);
        move_uploaded_file( $_FILES['image1'] ['tmp_name'],'assets/img/add_product/'.$image_name1); 
        $_SESSION['picture_uploaded'] = "x";


    }

    }
    if($_FILES['image2']){ 
        $uploaded2= $image_size2/1024/1024;
        $uploaded2= round($uploaded2, 2);
        if ($image_size2 > 5242880 ) {
           
           
           $too_large_img2 = "Sorry ! Your selected picture size is ".$uploaded2." MB, Maximum upload picture size 5 MB";
        }
        if(524288 > $image_size2 && 0 < $image_size2){
        $update = "UPDATE `add_product` SET `image2`='$image_name2' WHERE `SL`='$sl'";
        $usercheck = $conn->query($update);
        move_uploaded_file( $_FILES['image2'] ['tmp_name'],'assets/img/add_product/'.$image_name2); 
        $_SESSION['picture_uploaded'] = "x";


    }

    }
    if($_FILES['image3']){ 
        $uploaded3= $image_size3/1024/1024;
        $uploaded3= round($uploaded3, 2);
        if ($image_size3 > 5242880 ) {
           
           
           $too_large_img3 = "Sorry ! Your selected picture size is ".$uploaded3." MB, Maximum upload picture size 5 MB";
        }
        if(524288 > $image_size3 && 0 < $image_size3){
        $update = "UPDATE `add_product` SET `image3`='$image_name3' WHERE `SL`='$sl'";
        $usercheck = $conn->query($update);
        move_uploaded_file( $_FILES['image3'] ['tmp_name'],'assets/img/add_product/'.$image_name3); 
        $_SESSION['picture_uploaded'] = "x";


    }

    }
    if($_FILES['image4']){ 
        $uploaded4= $image_size4/1024/1024;
        $uploaded4= round($uploaded4, 2);
        if ($image_size4 > 5242880 ) {
           
           
           $too_large_img4 = "Sorry ! Your selected picture size is ".$uploaded4." MB, Maximum upload picture size 5 MB";
        }
        if(524288 > $image_size4 && 0 < $image_size4){
        $update = "UPDATE `add_product` SET `image4`='$image_name4' WHERE `SL`='$sl'";
        $usercheck = $conn->query($update);
        move_uploaded_file( $_FILES['image4'] ['tmp_name'],'assets/img/add_product/'.$image_name4); 
        $_SESSION['picture_uploaded'] = "x";


    }

    }
    


    
    $update = "UPDATE `add_product` SET `productCategorie`='$productCategorie',`productName`='$productName',`productPrice`='$productPrice',`model`='$model',`processor`='$processor',`ram`='$ram',`display`='$display',`productDescription`='$productDescription' WHERE `SL`='$sl'";
    $usercheck = $conn->query($update);

    if ($_SESSION['picture_uploaded'] = "x" && 524288 > $image_size1 && 0 < $image_size1 || 524288 > $image_size && 0 < $image_size || 524288 > $image_size2 && 0 < $image_size2 || 524288 > $image_size3 && 0 < $image_size3 || 524288 > $image_size4 && 0 < $image_size4) {
        header('location:view_all_upload_product');
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
            <b style="color:red">
            <?php 
                if(isset($too_large_img)){echo $too_large_img;} 
                if(isset($too_large_img1)){echo $too_large_img1;} 
            ?>
            </b>
                <fieldset>
                    <!-- Form Name -->
                    <legend>PRODUCTS</legend>
                    <!-- Select Basic -->
                    <div class="form-group">
                        <label class="col-md-7 control-label require" for="product_categorie">PRODUCT CATEGORY</label>
                        <div class="col-md-7">
                            <select id="productCategorie" name="productCategorie" class="form-control">
                            <option value="0" hidden>Select Product</option>
                                <option <?php if ($row['productCategorie'] == 'laptop') { echo "selected";} ?> value="laptop">Laptop</option>
                                <option <?php if ($row['productCategorie'] == 'mobilePhone') { echo "selected";} ?> value="mobilePhone">Mobile Phone</option>
                            </select>
                            
                            
                        </div>
                    </div>
                    <!-- Text input-->
                    <div class="form-group">
                        <label class="col-md-7 control-label require" for="product_name">PRODUCT NAME</label>
                        <div class="col-md-7">
                            <input id="productName" name="productName" placeholder="PRODUCT NAME" class="form-control" type="text" value="<?php echo  $row['productName']; ?>">
                            
                        </div>
                    </div>
                    <!-- Text input-->
                    <div class="form-group">
                        <label class="col-md-7 control-label require" for="product_name">PRODUCT PRICE</label>
                        <div class="col-md-7">
                            <input id="product_price" name="productPrice" placeholder="PRODUCT PRICE" class="form-control" type="number" value="<?php echo  $row['productPrice']; ?>">
                            
                        </div>
                    </div>
                    <!-- Text input-->
                    <div class="form-group">
                        <label class="col-md-7 control-label require" for="model">MODEL</label>
                        <div class="col-md-7">
                            <input id="model" name="model" placeholder="Model" class="form-control" type="text" value="<?php echo  $row['model']; ?>">
                            
                        </div>
                    </div>
                    <!-- Text input-->
                    <div class="form-group">
                        <label class="col-md-7 control-label require" for="processor">PROCESSOR</label>
                        <div class="col-md-7">
                            <input id="processor" name="processor" placeholder="Processor" class="form-control" type="text" value="<?php echo  $row['processor']; ?>">
                            
                        </div>
                    </div>
                    <!-- Select Basic -->
                    <div class="form-group">
                        <label class="col-md-7 control-label require" for="ram">RAM</label>
                        <div class="col-md-7">
                            <select id="ram" name="ram" class="form-control">
                            <option hidden value="0">Select RAM</option>
                                <option <?php if ($row['ram'] == '1') { echo "selected";} ?> value="1">1 GB</option>
                                <option <?php if ($row['ram'] == '2') { echo "selected";} ?> value="2">2 GB</option>
                                <option <?php if ($row['ram'] == '4') { echo "selected";} ?> value="4">4 GB</option>
                                <option <?php if ($row['ram'] == '8') { echo "selected";} ?> value="8">8 GB</option>
                                <option <?php if ($row['ram'] == '16') { echo "selected";} ?> value="16">16 GB</option>
                                <option <?php if ($row['ram'] == '32') { echo "selected";} ?> value="32">32 GB</option>
                                <option <?php if ($row['ram'] == '64') { echo "selected";} ?> value="64">64 GB</option>
                                <option <?php if ($row['ram'] == '128') { echo "selected";} ?> value="124">128 GB</option>
                            </select>
                            
                        </div>
                    </div>
                    <!-- Textarea -->
                    <div class="form-group">
                        <label class="col-md-7 control-label require" for="display">DISPLAY</label>
                        <div class="col-md-7">
                            <input id="display" name="display" placeholder="DISPLAY SIZE ''" class="form-control" type="text" value="<?php echo  $row['display']; ?>">
                            
                        </div>
                    </div>
                    <!-- Textarea -->
                    <div class="form-group">
                        <label class="col-md-7 control-label" for="product_description">PRODUCT DESCRIPTION</label>
                        <div class="col-md-7">
                            <textarea class="form-control" id="product_description" cols="30" rows="10" name="productDescription" ><?php echo  $row['productDescription']; ?></textarea>
                           
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-7 control-label require" for="image">MAIN IMAGE</label> 
                        <br>
                        <b style="color:red"> <?php if(isset($too_large_img)){echo $too_large_img;} ?> </b>
                        <div class="col-md-7">
                            <input id="file-input" name="image" accept='image/*' class="input-file form-control" value="<?php echo $image?>" type="file">
                            <!-- <?php  if(isset($image_err)){echo $image_err;}  ?> -->
                            <img id="image-preview" src="assets/img/add_product/<?php echo ($row['image']); ?>" alt="your image" class="pt-2" width="200px">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-7 control-label " for="image">SECONDARY IMAGE</label>
                        <br>
                        <b style="color:red"> <?php if(isset($too_large_img1)){echo $too_large_img1;} ?> </b>
                        <div class="col-md-7">
                            <input id="file-input1" name="image1" accept='image/*'  class="input-file form-control" type="file">
                            <img id="image-preview1" src="assets/img/add_product/<?php echo ($row['image1']); ?>" alt="your image" class="pt-2" width="200px">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-7 control-label " for="image">SECONDARY IMAGE</label>
                        <br>
                        <b style="color:red"> <?php if(isset($too_large_img2)){echo $too_large_img2;} ?> </b>
                        <div class="col-md-7">
                            <input id="file-input2" name="image2" accept='image/*' class="input-file form-control" type="file">
                            <img id="image-preview2" src="assets/img/add_product/<?php echo ($row['image2']); ?>" alt="your image" class="pt-2" width="200px">
                        </div>
                    </div>
                    <!-- File Button -->
                    <div class="form-group">
                        <label class="col-md-7 control-label" for="image">SECONDARY IMAGE</label>
                        <br>
                        <b style="color:red"> <?php if(isset($too_large_img3)){echo $too_large_img3;} ?> </b>
                        <div class="col-md-7">
                            <input id="file-input3" name="image3" accept='image/*' class="input-file form-control" type="file">
                            <img id="image-preview3" src="assets/img/add_product/<?php echo ($row['image3']); ?>" alt="your image" class="pt-2" width="200px">
                        </div>
                    </div>
                    <!-- File Button -->
                    <div class="form-group">
                        <label class="col-md-7 control-label" for="image">SECONDARY IMAGE</label>
                        <br>
                        <b style="color:red"> <?php if(isset($too_large_img4)){echo $too_large_img4;} ?> </b>
                        <div class="col-md-7">
                            <input id="file-input4" name="image4" accept='image/*' class="input-file form-control" type="file">
                            <img id="image-preview4" src="assets/img/add_product/<?php echo ($row['image4']); ?>" alt="your image" class="pt-2" width="200px">
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-md-7">
                            <button id="update" name="update" class="btn primary-button">Update</button>
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
