<?php
session_start();
include '../connect.php';

if (!($_SESSION['role']) && $_SESSION['role'] != "admin") {
    header('location:adminlogin.php');
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

</head>

<body style="font-family: 'Open Sans', sans-serif;">
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
                        <a href="req-product.php"><i></i>Requested Products</a>
                    </li>
                    <li>
                        <a href="tradershop.php"><i class="fas fa-store"></i>Shops</a>
                    </li>
                    <li>
                        <a href="shop-req.php"><i></i>Requested Shop</a>
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
                                TRADER INCOME REPORT
                            </h6>
                            <div style="text-align: center;">Today's Date:
                                <input type="text" id="currentDate" style="background-color: rgb(53, 56, 58); color:white; width: 100px;text-align: center;">
                                <br><br>
                                <script>
                                    var today = new Date();
                                    var date = today.getDate() + '-' + (today.getMonth() + 1) + '-' + today.getFullYear();
                                    document.getElementById("currentDate").value = date;
                                </script>

                            </div>



                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th>TRADER NAME</th>
                                        <th>SHOP NAME</th>
                                        <th>ORDERS</th>
                                        <th>QTY SOLD</th>

                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $price = 0;
                                    $stid = oci_parse($conn, "SELECT * FROM TRADER WHERE STATUS='ENABLE'");
                                    $result = oci_execute($stid);

                                    if ($result) {

                                        while ($row = oci_fetch_assoc($stid)) {
                                            $tid = $row['TRADER_ID'];


                                            $que = oci_parse($conn, "SELECT * FROM SHOP WHERE STATUS='ENABLE' AND TRADER_ID = '$tid'");
                                            $res = oci_execute($que);

                                            if ($res) {
                                                while ($data = oci_fetch_assoc($que)) {
                                                    $sid = $data['SHOP_ID'];

                                                    $qu = oci_parse($conn, "SELECT * FROM PRODUCT1 WHERE STATUS='ENABLE' AND SHOP_ID = '$sid'");
                                                    $num = oci_execute($qu);

                                                    if ($num) {
                                                        while ($col = oci_fetch_assoc($qu)) {
                                                            $count = 0;
                                                            $product = $col['PRODUCT_ID'];

                                                            $st = oci_parse($conn, "SELECT * FROM ORDER_ON_LINE WHERE PRODUCT_ID = '$product'");
                                                            $re = oci_execute($st);

                                                            if ($re) {
                                                                $qty = 0;
                                                                while ($fetch = oci_fetch_assoc($st)) {
                                                                    $onl = $fetch['ORDER_ID'];
                                                                    $qty = $qty + $fetch['QUENTITY'];
                                                                    $count++;

                                                                    $slot = oci_parse($conn, "SELECT * FROM ORDERS WHERE ORDER_ID = '$onl'");
                                                                    $cs = oci_execute($slot);

                                                                    if ($cs) {

                                                                        while ($li = oci_fetch_assoc($slot)) {
                                                                            $price = $price + $li['GRAND_TOTAL'];
                                                                        }
                                                                    }
                                                                }
                                                            }
                                                        }
                                    ?>

                                                        <tr>

                                                            <td><?php echo $row['TRADER_FNAME']; ?></td>
                                                            <td><?php echo $data['SHOP_NAME']; ?></td>

                                                            <td><?php echo $count; ?></td>
                                                            <td><?php echo $qty; ?></td>



                                                        </tr>
                                    <?php
                                                    }
                                                }
                                            }
                                        }
                                    }
                                    ?>

                                    <strong> GRAND TOTAL:<?php echo $price ?></strong>
                                </tbody>
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