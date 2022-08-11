<?php
session_start();
include '../connect.php';

if (!($_SESSION['role']) && $_SESSION['role'] != "trader") {
    header('location:login.php');
}
?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Order Reports</title>
    <link href="assets/css/bootstrap.css" rel="stylesheet" />
    <link href="assets/css/font-awesome.css" rel="stylesheet" />
    <link href="assets/css/custom.css" rel="stylesheet" />
    <link rel="shortcut icon" href="../image/logo_innovative_grocery.png">

    <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css' />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

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
        <div id="page-wrapper">
            <div id="page-inner">
                <div class="row">
                    <div class="col-md-12">

                        <div class="add-product main-parts mt-2">
                            <h6 style="text-align: center; font-family:-apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif; font-style:inherit; color: rgb(43, 76, 88); font-size:xx-large;">
                                Orders Report
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

                            <div>
                                <div>
                                    <h3 style="font-size: 23px;">ORDER SOLD:</h3>
                                </div>
                            </div>


                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th>SHOP NAME</th>
                                        <th>PRODUCT NAME</th>
                                        <th>ORDER COUNT </th>
                                        <th>SOLD</th>

                                        <th class="right">Availability</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $ti = $_SESSION['TRADER_ID'];
                                    //$shop = $_SESSION['SHOP_ID'];
                                    $stid = oci_parse($conn, "SELECT * FROM SHOP WHERE TRADER_ID = '$ti'");
                                    $result = oci_execute($stid);

                                    if ($result) {
                                        while ($row = oci_fetch_assoc($stid)) {

                                            $sid = $row['SHOP_ID'];

                                            $que = oci_parse($conn, "SELECT * FROM PRODUCT1 WHERE SHOP_ID = '$sid'");
                                            $num = oci_execute($que);

                                            if ($num) {
                                                while ($col = oci_fetch_assoc($que)) {
                                                    $count = 0;
                                                    $product = $col['PRODUCT_ID'];

                                                    $st = oci_parse($conn, "SELECT * FROM ORDER_ON_LINE WHERE PRODUCT_ID = '$product'");
                                                    $res = oci_execute($st);

                                                    if ($res) {
                                                        $qty = 0;
                                                        while ($data = oci_fetch_assoc($st)) {
                                                            $onl = $data['ORDER_ID'];
                                                            $qty = $qty + $data['QUENTITY'];
                                                            $count++;

                                                            $slot = oci_parse($conn, "SELECT * FROM COLLECTION_SLOT WHERE ORDER_ID = '$onl'");
                                                            $cs = oci_execute($slot);

                                                            if ($cs) {

                                                                while ($li = oci_fetch_assoc($slot)) {
                                                                }
                                                            }
                                                        }
                                                    }
                                    ?>
                                                    <tr>

                                                        <td><?php echo $row['SHOP_NAME']; ?></td>
                                                        <td><?php echo $col['PRODUCT_NAME']; ?></td>
                                                        <td><?php echo $count; ?></td>
                                                        <td><?php echo $qty; ?></td>
                                                        <td><?php echo ($col['AVAILABILITY'] - $qty); ?></td>


                                                    </tr>
                                    <?php



                                                }
                                            }
                                        }
                                    }







                                    ?>
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