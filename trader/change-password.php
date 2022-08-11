<?php
session_start();
include '../connect.php';
if (!($_SESSION['role']) && $_SESSION['role'] != "trader") {
    header('location:login.php');
}

$tp = $_SESSION['TRADER_ID'];
//if (strlen($_SESSION['success'])!=0){
if (isset($_POST['updatepw'])) {
    $cpass = md5($_POST['cpass']);
    $newpass = md5($_POST['newpass']);

    $sql = oci_parse($conn, "SELECT * FROM  TRADER WHERE PASSWORD='$cpass' AND TRADER_ID='$tp'");
    $run = oci_execute($sql);
    $new = oci_fetch_row($sql);
    $num = oci_num_rows($sql);
    if ($num == 1) {
        $con = oci_parse($conn, " UPDATE TRADER SET PASSWORD='$newpass' WHERE TRADER_ID='$tp'");
        $nr = oci_execute($con);
        echo "<script>alert('Password Changed Successfully !!');</script>";
    } else {
        echo "<script>alert(' Password not match !!');</script>";
    }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Trader Panel</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="style.css">
    <script src="js/bootstrap.min.css"></script>
    <style>
        label {
            width: 215px;
            display: inline-block;
            margin-top: 5px;
        }

        .name {
            margin-top: 15px;
        }
    </style>

</head>

<body style=" background-color: rgb(130, 127, 136);">
    <a href="index.php"> <input type="submit" value="Back to HomePage" style="color: rgb(253, 253, 253); background: rgb(59, 57, 57);" class="btn btn-add-products"></a>
    <div class="container">
        <div class="card text-center">
            <div class="card-body">
                <img src="assets/img/logo.png" class="roundedcircle" alt="profile" width="200">
                <h3>
                    <h3>Change Password</h3>
                </h3>

                <form action="" method="POST" style="align-items: center; background-color: rgb(180, 185, 185);">
                    <div class="row">
                        <div class="col-sm-6">
                            <label class="name">Current Password:</label>
                            <input type="password" name="cpass" value="" style="height: 30px; width: 210px;;"><br><br>

                            <label class="name">New Password:</label>
                            <input type="password" name="newpass" value="" style="height: 30px; width: 210px;;"><br><br>


                        </div>
                        <div class="col-sm-6">
                            <label class="name">Confirm Password:</label>
                            <input type="text" name="cnfpass" value="" style="height: 30px; width: 210px;"><br><br>


                        </div>
                    </div>
                    <div class="text-center">
                        <a href="index.php"><input type="submit" name="updatepw" value="Save Password" class="btn btn-add-product" style="color: rgb(175, 194, 247); background-color: rgb(61, 59, 59); margin-bottom: 15px;"></a>
                    </div>
                </form>

            </div>
        </div>


    </div>
    </div>
</body>

</html>