<?php session_start();
include('incl/db.php');
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Profile</title>
    <?php include('incl/css.php'); ?>
</head>

<body>
    <?php include('incl/menu.php');
    // include('incl/secound_menu.php');

    if (!isset($_SESSION['login_success'])) {
        header('location:login.php');
    }
    $sl = base64_decode($_GET['id']);

    $datashow = "SELECT * FROM `registation_form` WHERE `SL`='$sl'";
    $usercheck = $conn->query($datashow);
    $xz = mysqli_num_rows($usercheck);
    $row = mysqli_fetch_assoc($usercheck);

    if (isset($_POST['update'])) {

        $fastName = $_POST['fastName'];
        $lastName = $_POST['lastName'];
        $email = $_POST['email'];
        $update = "UPDATE `registation_form` SET `fastName`='$fastName',`lastName`='$lastName', `email`='$email' WHERE `SL`='$sl'";
        $usercheck = $conn->query($update);
        header('location:profile.php');
    }
    ?>

    <div class="edit-profile">
        <div class="container">
            <div class="col-md-12 ">
                <div>
                    <h3 class="text-success "> <i class="fas fa-user"></i> <a class="text-decoration-none text-success" href="dashbord.php">Profile Edit</a> <small class="text-muted" style="font-size: 18px;"> My Profile </small></h3>
                    <div class="p-1 " style="background-color: #ECECEC;">
                        <h6 class=" text-center"> About You</h6>
                    </div>
                </div>
                <br>
                <div class="row">
                    <div class="col-12 col-sm-12 col-md-8 col-lg-7">
                        <div class="table-responsive">
                            <form method="POST" action="" enctype="multipart/form-data">
                                <table class="table table-bordered">
                                    <tbody>
                                        <tr>
                                            <th>Fast Name</th>
                                            <td><input class="form-control mb-2" name="fastName" value="<?php echo  $row['fastName']; ?>" type="text" placeholder="Write Your Name"></td>
                                        </tr>
                                        <tr>
                                            <th>Last Name</th>
                                            <td><input class="form-control mb-2" name="lastName" value="<?php echo  $row['lastName']; ?>" type="text" placeholder="Write Your Name"></td>
                                        </tr>
                                        <tr>
                                            <th>Email</th>
                                            <td><input class="form-control mb-2" name="email" type="email" value="<?php echo  $row['email']; ?>" placeholder="Write Your E-mail"></td>
                                        </tr>
                                        <tr>
                                            <th>Username</th>
                                            <td><input class="form-control mb-2" readonly value="<?php echo  $row['username']; ?>" type="text" placeholder="Write Your Username"></td>
                                        </tr>
                                    </tbody>
                                </table>
                                <input class="btn primary-button mb-2" name="update" type="submit" value="Update">
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