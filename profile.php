<?php session_start();
include('incl/db.php');
if(!isset($_SESSION['login_success'])){
    header('location:login.php');
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile</title>
    <?php include ('incl/css.php'); ?>
</head>
<body>
<?php include ('incl/menu.php'); 
 include ('incl/secound_menu.php');
 $profile= $_SESSION['login_success'];
  $SQL ="SELECT * FROM `registation_form` WHERE `username`='$profile'";
      $usercheck = $conn->query($SQL);
      $row = mysqli_num_rows($usercheck);
      $row = mysqli_fetch_assoc($usercheck);
?>

<div class="profile-page">
    <div class="container">
        <div class="col-md-12 ">
        <div>
            <h3 class="text-success"> <i class="fas fa-user"></i><a class="text-decoration-none text-success" href="profile.php">Profile </a><small class="text-muted" style="font-size: 18px;"> My Profile </small></h3>
            <div class="p-1 " style="background-color: #ECECEC;">
                <h6 class=" text-center"> About You</h6>
            </div>
        </div>
        <br>
        <div class="row">
            <div class="col-12 col-sm-12 col-md-8 col-lg-7">
                <div class="table-responsive">
                    <table class="table table-bordered">
                        <tbody>
                            <tr>
                                <th> Name</th>
                                <td><?php echo ($row['fastName']);?> <?php echo ($row['lastName']);?></td>
                            </tr>
                            <tr>
                                <th>Email</th>
                                <td><?php echo ($row['email']);?></td>
                            </tr>
                            <tr>
                                <th>Username</th>
                                <td><?php echo ($row['username']);?></td>
                            </tr>
                            <tr>
                                <th>Signup Date</th>
                                <td><?php echo ($row['Date']);?></td>
                            </tr>
                        </tbody>
                    </table>
                    <a class="btn btn-success mb-2" href="edit_profile.php?id=<?php echo base64_encode(( ($row['SL'])));?>">Edit Profile</a>
                    <a class="btn btn-danger mb-2" href="javascript:confirmDelete('profile_delete.php?id=<?php echo base64_encode(( ($row['SL'])));?>')">Delete Profile</a>
                </div>
            </div>
            <div class="col-8 col-sm-8 col-md-4 col-lg-5 pb-5">
                <img src="https://static.vecteezy.com/system/resources/previews/002/400/532/original/young-happy-businessman-character-avatar-wearing-business-outfit-isolated-free-vector.jpg" width="200px">
                <br><br>
                <h6 class="fw-bolder"> Profile Picture </h6>
                <form method="POST" action="" enctype="multipart/form-data">
                    <input name="file" accept="image/*" type="file"> <br>
                    <input type="submit" name="upload" value="upload" class="mt-3 btn btn-success">
                </form>
            </div>
        </div>
    </div>
    </div>
</div>
<div class="pb-5"></div>
</body>
</html>
<?php
include('incl/footer.php');
include('incl/js.php');
?>



