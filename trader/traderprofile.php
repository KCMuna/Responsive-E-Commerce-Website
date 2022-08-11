<?php
session_start();
include '../connect.php';
if (!($_SESSION['role']) && $_SESSION['role'] != "trader") {
    header('location:login.php');
}

$trader = $_SESSION['TRADER_ID'];
//if (strlen($_SESSION['success'])!=0){
if (isset($_POST['traderupdate'])) {

    //echo $id;
    $fname = $_POST['fname'];
    $lname = $_POST['lname'];
    $email = $_POST['email'];

    $query = oci_parse($conn, " UPDATE TRADER SET TRADER_FNAME='$fname',TRADER_LNAME='$lname' WHERE TRADER_ID='$trader' ");
    $result = oci_execute($query);
    if ($result) {
        echo "<script>alert('YOUR PROFILE HAS BEEN UPDATED');</script>";
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
                    <h3>My Information</h3>
                </h3>

                <?php
                $query = oci_parse($conn, " SELECT * FROM TRADER WHERE TRADER_ID='$trader' ");
                $result = oci_execute($query);
                if ($result != false) {
                    while ($row = oci_fetch_row($query)) {
                ?>

                        <form action="" method="POST" style="align-items: center; background-color: rgb(180, 185, 185);">
                            <div class="row">
                                <div class="col-sm-6">
                                    <label class="name">First Name:</label>
                                    <input type="text" name="fname" value="<?php echo $row['1']; ?>" style="height: 30px; width: 210px;;"><br><br>

                                    <label class="name">Email:</label>
                                    <input type="email" name="email" value="<?php echo $row['4']; ?>" style="height: 30px; width: 210px;;"><br><br>


                                </div>
                                <div class="col-sm-6">
                                    <label class="name">Last Name:</label>
                                    <input type="text" name="lname" value="<?php echo $row['2']; ?>" style="height: 30px; width: 210px;"><br><br>

                                </div>
                            </div>
                            <div class="text-center">
                                <a href="index.php"><input type="submit" name="traderupdate" value="Update Information" class="btn btn-add-product" style="color: rgb(175, 194, 247); background-color: rgb(61, 59, 59); margin-bottom: 15px;"></a>
                            </div>
                        </form>
                        <a href="change-password.php"> <input type="submit" name="passchange" value="CHANGE PASSWORD" style="height: 30px; width: 200px; color: rgb(175, 194, 247); background-color: rgb(61, 65, 66); border-radius: 10px;"></a><br><br>

                <?php }
                } ?>
            </div>
        </div>


    </div>
    </div>
</body>

</html>