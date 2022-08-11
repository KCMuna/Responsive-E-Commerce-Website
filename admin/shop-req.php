<?php
session_start();
error_reporting(0);
include '../connect.php';


if (isset($_GET['approve'])) {

    $sa = $_GET['approve'];



    $query = oci_parse($conn, " UPDATE SHOP SET STATUS ='ENABLE' WHERE SHOP_ID='$sa'");
    $result = oci_execute($query);
    if ($result) {
        //echo "<script>alert('SHOP APPROVED!!');</script>";
        header('location:index.php');
    } else {
        echo "Error !";
        exit();
    }
}

if (isset($_GET['remshop'])) {

    $rem = $_GET['remshop'];
}

$sql = oci_parse($conn, " DELETE FROM SHOP WHERE SHOP_ID='$rem' AND STATUS='DISABLE'");
$res = oci_execute($sql);

if ($res) {
    // echo "<script>alert('SHOP DELETED!!');</script>";
    // header('location:shop.php');
} else {
    echo "Error !";
    exit();
}


?>

<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Admin Panel</title>
    <link href="assets/css/bootstrap.css" rel="stylesheet" />
    <link href="assets/css/font-awesome.css" rel="stylesheet" />
    <link href="assets/css/custom.css" rel="stylesheet" />
    <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css' />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="shortcut icon" href="../image/logo_innovative_grocery.png">

</head>

<body style="font-family: 'Open Sans', sans-serif;overflow: hidden;">
    <div id="wrapper">
        <?php include('head.php'); ?>

        <nav class="navbar-default navbar-side" role="navigation">
            <div class="sidebar-collapse">
                <ul class="nav" id="main-menu">
                    <li class="text-center">

                    </li>

                    <li>
                        <a href="index.php"><i class="fa fa-dashboard fa-3x"></i> Dashboard</a>
                    </li>
                    <li>
                        <a href="productlist.php"><i></i>Product</a>
                    </li>
                    <li>
                        <a href="req-product.php"><i></i>Requested Product</a>
                    </li>
                    <li>
                        <a href="review.php"><i></i> Review</a>
                    </li>

                    <li>
                        <a><i></i>Report<span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level">

                            <li>
                                <a href="periodicreport.php">Trader Income Report</a>
                            </li>

                        </ul>
                    </li>

                    <li>
                        <a><i></i>Manage User<span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level">
                            <li>
                                <a href="Traderlist.php">Trader</a>
                            </li>
                            <li>
                                <a href="trader-req.php">Trader Requests</a>
                            </li>
                            <li>
                                <a href="Customerlist.php">Customer</a>
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
                            <h6 style="text-align: center; font-family:-apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif; font-style:inherit; color: rgb(43, 76, 88); font-size:xx-large;">
                                SHOP REQUESTS
                            </h6>
                            <table class="table text-center mt-1 table bordered">
                                <thead>
                                    <tr>
                                        <th>SHOP ID</th>
                                        <th>SHOP NAME</th>
                                        <th>LOCATION</th>
                                        <th>TRADER ID</th>
                                        <th>ACTION</th>

                                    </tr>
                                </thead>
                                <tbody>
                                    <?php

                                    $sql = oci_parse($conn, "SELECT * from SHOP WHERE STATUS='DISABLE'");
                                    $result = oci_execute($sql);

                                    if ($result != false)
                                        while ($data = oci_fetch_assoc($sql)) { ?>
                                        <tr>
                                            <!--   <form method="POST" enctype="multipart/form-data"> -->

                                            <td><?php echo $data['SHOP_ID'] ?></td>
                                            <td><?php echo $data['SHOP_NAME'] ?></td>
                                            <td><?php echo $data['SHOP_LOCATION'] ?></td>
                                            <td><?php echo $data['TRADER_ID'] ?></td>

                                            <td> <a href="shop-req.php?approve=<?php echo $data['SHOP_ID']; ?>" onClick="edit(this);" title="Edit"><i class="fa fa-check-circle" style="font-size:30px;color:green;"></i> </a>
                                                <a href="shop-req.php?remshop=<?php echo $data['SHOP_ID']; ?>" onClick="del(this);" title="Delete"><i class="fa fa-trash" style="font-size:30px;color:red;"></i> </a>
                                            </td>

                                            <!-- </form> -->
                                        </tr>
                                </tbody>
                            <?php } ?>
                            </table>

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