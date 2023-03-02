<?php session_start();
include('incl/db.php');
 $current_username = $_SESSION['login_success'];

    
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>History</title>
    <?php include('incl/css.php'); ?>
</head>
<body>
<?php include('incl/menu.php');
    include('incl/secound_menu.php')
    ?>
<div class="tables">
    <table class="table  table-striped table-bordered table-hover table-checkable order-column dataTable">
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Model</th>
                <th>Category</th>
                <th>Quantity</th>
                <th>Amount_Tk</th>
                <th>Paid by</th>
                <th>Purchase Date</th>
            </tr>
        </thead>
        <tbody>
            <?php 
                $SQL = "SELECT * FROM `payment` WHERE `username` = '$current_username' ORDER BY `ID` DESC";
                $usercheck = $conn->query($SQL);
                while ($row = mysqli_fetch_assoc($usercheck)) {
                    $Order_No= "JSN-BD 2050771";
                    
                               
            
            ?>
            <tr>
                <td><?php echo $Order_No.$row['ID'].'0';?></td>
                <td><span class="name"><?php echo $row['product_name'];?></span> </td>
                <td><?php echo $row['model'];?></td>
                <td><?php echo $row['category'];?></td>
                <td><?php echo $row['quantity'];?></td>
                <td><?php echo $row['Amount_Tk'];?></td>
                <td>Card</td>
                <td><?php echo $row['buying date'];?></td>
            </tr>
            <?php } ?>
        </tbody>
    </table>
</div>
</body>
</html>
<?php
include('incl/footer.php');
include('incl/js.php');
?>