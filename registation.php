<?php session_start();
include('incl/db.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registation</title>
    <?php include ('incl/css.php'); ?>
</head>
<body>
<?php include ('incl/menu.php'); 
$fastName=$lastName=$email=$username=$password=$confirmPassword="";
if($_SERVER['REQUEST_METHOD']=='POST'){
    if(empty($_POST['fastName'])){
        $fastName_err='<span class="text-danger">'."Please Enter Fast Name.".'</span>' ;
    }else{
        $fastName=$_POST['fastName'];
    }
    if(empty($_POST['lastName'])){
        $lastName_err='<span class="text-danger">'."Please Enter Last Name.".'</span>' ;
    }else{
        $lastName=$_POST['lastName'];
    }
    if(empty($_POST['email'])){
        $email_err='<span class="text-danger">'."Please Enter E-mail.".'</span>' ;
    }else{
        $email=$_POST['email'];
    }
    if(empty($_POST['username'])){
        $username_err='<span class="text-danger">'."Please Enter Username.".'</span>' ;
    }else{
        $username=$_POST['username'];
    }
    if(empty($_POST['password'])){
        $password_err='<span class="text-danger">'."Please enter a valid password.".'</span>' ;
    }else{
        $password=$_POST['password'];
    }
    if(empty($_POST['confirmPassword'])){
        $password_err='<span class="text-danger">'."Please enter a valid password.".'</span>' ;
    }else{
        $confirmPassword=$_POST['confirmPassword'];
    }
    if ($_POST["password"] != $_POST['confirmPassword']) {
        $password_match='<span class="text-danger">'."Password doesn't match".'</span>' ;
    }
    if(!empty($_POST['username'])) {
        $sql ="SELECT * FROM `registation_form` WHERE `username`='$username'";
        $username_check=$conn->query($sql);
        // print_r( $name_check);
        if(mysqli_num_rows($username_check)>=1){
            $username_already_have=' <span class="text-danger"> * username already have taken </span>';
        }
        
    }
    if(!empty($_POST['email'])) {
        $sql1 ="SELECT * FROM `registation_form` WHERE `email`='$email'";
        $email_check=$conn->query($sql1);
        if(mysqli_num_rows($email_check)>=1){
            $email_already_have=' <span class="text-danger"> * E-mail already used </span>';
        }
        
    }
}
if(!empty($_POST['fastName'])&&!empty($_POST['lastName'])&&!empty($_POST['email'])&&!empty($_POST['username'])&&!empty($_POST['password'])&& $_POST["password"] === $_POST['confirmPassword'] && mysqli_num_rows($username_check)==0 && mysqli_num_rows($email_check)==0){
    $password = md5( $password);
    $insert="INSERT INTO `registation_form`(`fastName`, `lastName`, `email`, `username`, `password`) VALUES ('$fastName','$lastName','$email','$username','$password')";
    $check = $conn->query($insert);   
    if ($check) {
        $_SESSION['login_success'] = $username;
        header('location:product.php');
        echo "Account successfully created";
    } else{
        echo "Sorry ! Account not created";
    }
}

?>
<div class="registation-from">
    <div class="container">
        <div class="registation-area">
            <h1 class="text-center pb-4">Create your Account</h1>
            <form action="" method="POST" enctype="multipart/form-data">
                <div class="row">
                    <div class="form-group col-12 col-md-6">
                        <label for="" class="form-label require" id="fastName1">Fast Name</label>
                        <input type="text" placeholder="Enter Your Fast Name" name="fastName" id="fastName" class=" form-control" value="<?php echo $fastName?>"> <?php  if(isset($fastName_err)){echo $fastName_err;}  ?>
                    </div>
                    <div class="form-group col-12 col-md-6">
                        <label for="" class="form-label require" id="lastName1">Last Name</label>
                        <input type="text" placeholder="Enter Your Last Name" name="lastName" id="lastName" class="form-control" value="<?php echo $lastName?>"> <?php  if(isset($lastName_err)){echo $lastName_err;}  ?>
                    </div>
                    <div class="form-group">
                        <label for="" class="form-label require" id="email1">E-mail</label>
                        <input type="email" placeholder="Enter Your E-mail" name="email" id="email" class="form-control" value="<?php echo $email?>"> <?php  if(isset($email_err)){echo $email_err;} if(isset($email_already_have)){echo $email_already_have;} ?>
                    </div>
                    <div class="form-group">
                        <label for="" class="form-label require" id="username1">Username</label>
                        <input type="text" placeholder="Enter Your Username" name="username" id="username" class="form-control" value="<?php echo $username?>"> <?php  if(isset($username_err)){echo $username_err;} if(isset($username_already_have)){echo $username_already_have;} ?>
                    </div>
                    <div class="form-group col-12 col-md-6">
                        <label for="" class="form-label require" id="password1">Password</label>
                        <input type="password" placeholder="Enter Your Password" name="password" id="password" class="form-control" value="<?php echo $password?>"> <?php  if(isset($password_err)){echo $password_err;} if(isset($password_match)){echo $password_match;} ?>
                    </div>
                    <div class="form-group col-12 col-md-6">
                        <label for="" class="form-label require" id="confirmPassword1">Confirm Password</label>
                        <input type="password" placeholder="Enter Your Confirm Password" name="confirmPassword" id="confirmPassword" class="form-control" value="<?php echo $confirmPassword?>"> <?php  if(isset($password_err)){echo $password_err;} if(isset($password_match)){echo $password_match;} ?>
                    </div>
                    <div class="btn-outline form-control">
                        <input type="submit" value="Create Account" class="btn-outline primary-button" id="create_account" name="create_account">
                    </div>
                    <h5 id="error" class="pb-2 text-start text-danger"></h5>
                </div>
            </form>
            <p class="mt-2">If you already have an account? Then <a class="text-decoration-none" href="login.php"> click here for Login</a></p>

        </div>
    </div>
</div>
</body>
</html>
<?php
include('incl/footer.php');
include('incl/js.php');
?>