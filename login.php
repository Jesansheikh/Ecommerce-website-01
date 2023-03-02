<?php session_start();
include('incl/db.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <?php include ('incl/css.php'); ?>
</head>
<body>
<?php include ('incl/menu.php'); 
$username = $password = "";
if (isset($_POST['login'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];
    $passwordx = md5($password);
    $SQL = "SELECT * FROM `registation_form` WHERE `username`='$username'";
    $usercheck = $conn->query($SQL);
    if (mysqli_num_rows($usercheck) >= 1) {
        $row = mysqli_fetch_assoc($usercheck);
        if ($row['password'] === $passwordx && $row['username'] === $username)  {
            $_SESSION['login_success']= $username;
            header('location:product.php');
        }
        if($row['password']!=$passwordx or $row['username']!=$username){
            $pass_err=" <span class='text-danger'>Username and Password incorrect</span>";
        }
        } else{
            $_err=" <span class='text-danger'>Sorry, your account isn't valid</span>";
        }
    }

    if (isset($_POST['login'])) {
        $username = $_POST['username'];
        $password = $_POST['password'];
        $passwordx = md5($password);
        $SQL = "SELECT * FROM `registation_form` WHERE `email`='$username'";
        $usercheck = $conn->query($SQL);
       
        if (mysqli_num_rows($usercheck) >= 1) {
            $row = mysqli_fetch_assoc($usercheck);
            
            if ($row['password'] === $passwordx && $row['email'] === $username)  {
                
                $SQL = "SELECT * FROM `registation_form` WHERE `email`='$username'";
                $usercheck = $conn->query($SQL);
                $row1 = mysqli_fetch_assoc($usercheck);
                print_r($row1['username']);
                $_SESSION['login_success']= $row1['username'];
                header('location:product.php');
            }
            if($row['password']!=$passwordx or $row['username']!=$username){
                $pass_err=" <span class='text-danger'>Username and Password incorrect</span>";
            }
            } else{
                $_err=" <span class='text-danger'>Sorry, your account isn't valid</span>";
            }
        }
 
?>

<div class="login-form">
    <div class="container">
        <div class="login-area">
            <form action="" method="POST">
                <div class="row">
                    <div class="form-group col-12">
                        <label for="" class="form-label require" id="usernameEmail1">Username or E-mail</label>
                        <input type="text" placeholder="Username or E-mail" name="username" id="usernameEmail" class=" form-control" value="<?php echo $username ?>">
                    </div>
                    <div class="form-group col-12">
                        <label for="" class="form-label require" id="passwordlabel">Password</label>
                        <input type="password" placeholder="Enter Your Password" name="password" id="passwordLogin" class="form-control" value="<?php echo $password ?>">
                        <?php if(isset($pass_err)) echo $pass_err; if(isset($_err)) echo $_err?>
                    </div>
                    <div class="btn-outline form-control">
                        <input type="submit" value="Login" class="btn-outline primary-button" id="login" name="login">
                    </div>
                </div>
            </form>
            <div class="Forgot-signup">
                <a href="#">Forgotten account?</a>
                <a href="registation.php">Create your Account</a>
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
