<?php
session_start();
include '../connect.php';
error_reporting(0);



if (isset($_POST['reset'])) {
    $email = $_POST['email'];
    $password1 = md5($_POST['pass1']);
    $password2 = md5($_POST['pass2']);

    if (!($password1 == $password2)) {
        $error_pass = "Password doesn't match";
    } else {
        $query = oci_parse($conn, " SELECT * FROM TRADER WHERE EMAIL='$email' ");
        $num = oci_execute($query);
        oci_fetch_row($query);
        $res = oci_num_rows($query);
        //echo $res;
        if ($res == 1) {
            //$extra="forgot-password.php";
            $stid = oci_parse($conn, " UPDATE TRADER SET PASSWORD='$password1' WHERE EMAIL='$email' ");
            $new = oci_execute($stid);

            if ($new)
                header('location:login.php');
            $_SESSION['errmsg'] = "Password Changed Successfully";
            exit();
        } else {
            $extra = "traderpw-reset.php";

            $_SESSION['errmsg'] = "Invalid email id ";
            exit();
        }
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
                    <h3>Reset Password</h3>
                </h3>

                <form action="" method="POST" style="align-items: center; background-color: rgb(180, 185, 185);">
                    <div class="row">
                        <div class="col-sm-6">
                            <label class="name">Email:</label>
                            <input type="email" name="email" value="" style="height: 30px; width: 210px;;"><br><br>

                            <label class="name">New Password:</label>
                            <input type="password" name="pass1" value="" style="height: 30px; width: 210px;;"><br><br>


                        </div>
                        <div class="col-sm-6">
                            <label class="name">Confirm Password:</label>
                            <input type="password" name="pass2" value="" style="height: 30px; width: 210px;"><br><br>


                        </div>
                    </div>
                    <div class="text-center">
                        <input type="submit" class="btn-upper btn btn-primary checkout-page-button" name="reset" value="RESET PASSWORD">
                    </div>
                </form>

            </div>
        </div>


    </div>
    </div>
</body>

</html>