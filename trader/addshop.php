<?php
session_start();
include '../connect.php';

if (!($_SESSION['role']) && $_SESSION['role'] != "trader") {
    header('location:login.php');
}


if (isset($_GET['shopid'])) {
    $shopid = $_GET['shopid'];
}
?>

<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Add Shop</title>
    <link href="assets/css/bootstrap.css" rel="stylesheet" />
    <link href="assets/css/font-awesome.css" rel="stylesheet" />
    <link href="assets/css/custom.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css' />
    <link rel="shortcut icon" href="../image/logo_innovative_grocery.png">

</head>

<body style="font-family: 'Open Sans', sans-serif;overflow: hidden;">
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
        <div id="page-wrapper">
            <div id="page-inner">
                <div class="row">
                    <div class="col-md-12">

                        <div class="add-product main-parts mt-2">
                            <h6 style="text-align: center; font-family:-apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif; font-style:inherit; color: rgb(43, 76, 88);font-size:xx-large;">
                                Add Shop
                            </h6>
                            <form method="POST" action="process.php" style=" text-align: center;">
                                <div class="container">
                                    <div class="row" style="margin-top: 50px;">

                                        <div class="form-group">
                                            <label class="shopname">Shop Name:</label><br>
                                            <input class="shopname" class="form-control" type="text" name="shopname"><br>
                                        </div>

                                        <div class="form-group">
                                            <label class="location">Location:</label><br>
                                            <input class="location" type="text" name="location"><br><br>
                                        </div>
                                        <div class="form-group">
                                            <label class="shopname">Description:</label><br>
                                            <input class="shopname" class="form-control" type="text" name="description"><br>
                                        </div>

                                    </div>
                                    <div class="text-center">
                                        <a href="shop.php"><input type="submit" name="addshop" value="ADD SHOP" class="btn btn-add-product" style="width: 120px; height: 50px;"></a>
                                    </div>

                                </div>



                            </form>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>

    </div>
    </div>

    <script src="assets/js/jquery-1.10.2.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>
    <script src="assets/js/jquery.metisMenu.js"></script>
    <script src="assets/js/custom.js"></script>


</body>

</html>