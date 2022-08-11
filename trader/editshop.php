<?php
session_start();
include '../connect.php';

if (!($_SESSION['role']) && $_SESSION['role'] != "trader") {
    header('location:login.php');
}

if (isset($_GET['update'])) {

    $shopid = $_GET['update'];

    //echo $shopid;

}

if (isset($_POST['update'])) {
    $n = $_POST['shopname'];
    $l = $_POST['location'];

    $query = oci_parse($conn, " UPDATE SHOP SET SHOP_NAME='$n',SHOP_LOCATION='$l' WHERE SHOP_ID='$shopid'");
    $result = oci_execute($query);
}

$stid = oci_parse($conn, " SELECT * FROM SHOP WHERE SHOP_ID='$shopid' ");
$result = oci_execute($stid);
$data = oci_fetch_assoc($stid);


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link href="assets/css/bootstrap.css" rel="stylesheet" />
    <link href="assets/css/font-awesome.css" rel="stylesheet" />
    <link href="assets/css/custom.css" rel="stylesheet" />
    <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css' />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="shortcut icon" href="../image/logo_innovative_grocery.png">

    <title>Edit Shop</title>
</head>

<body style="font-family: 'Open Sans', sans-serif;">
    <div id="wrapper">

        <?php include('top-hav.php'); ?>
        <nav class="navbar-default navbar-side" role="navigation">
            <div class="sidebar-collapse">
                <ul class="nav" id="main-menu">
                    <li class="text-center">

                    </li>

                    <li>
                        <a href="index.php"><i class="fa fa-dashboard fa-3x"></i> Dashboard</a>
                    </li>
                    <li>
                        <a href="shop.php"><i></i>My Shop</a>
                    </li>


                    <li>
                        <a><i></i>Report<span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level">
                            <li>
                                <a href="sales.php">Sales Report</a>
                            </li>
                            <li>
                                <a href="order-report.php">Order Report</a>
                            </li>

                        </ul>
                    </li>

                </ul>

            </div>

        </nav>

        <body style="font-family: 'Open Sans', sans-serif;">
            <div id="page-wrapper">
                <div id="page-inner">
                    <div class="row">
                        <div class="col-md-12">

                            <div class="add-product main-parts mt-2">
                                <h6 style="text-align: center; font-family:-apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif; font-style:inherit; color: rgb(43, 76, 88);font-size:xx-large;">
                                    Update Shop
                                </h6>
                                <form action="" method="POST">
                                    <div class="container">
                                        <div class="row text-center" style="margin-top: 50px;">

                                            <div class="form-group">
                                                <label class="shopname">SHOP NAME</label><br>
                                                <input type="text" name="shopname" value="<?php echo $data['SHOP_NAME'] ?>">
                                            </div>

                                            <div class="form-group">
                                                <label class="location">LOCATION</label><br>
                                                <input type="text" name="location" value="<?php echo $data['SHOP_LOCATION'] ?>">
                                            </div>
                                            <div class="form-group">
                                                <label class="shopname">Description</label><br>
                                                <input type="text" name="description" value="<?php echo $data['DESCRIPTION'] ?>">
                                            </div>

                                        </div>
                                        <div class="text-center">

                                            <input type="submit" name="update" value="UPDATE">
                                        </div>
                                </form>
                                <script src="assets/js/jquery-1.10.2.js"></script>
                                <script src="assets/js/bootstrap.min.js"></script>
                                <script src="assets/js/jquery.metisMenu.js"></script>
                                <script src="assets/js/custom.js"></script>

                                </form>
                            </div>
                        </div>
                    </div>


                </div>
            </div>
    </div>

    </div>
    </div>
</body>

</html>