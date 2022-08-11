<?php
session_start();
//error_reporting(0);
include '../connect.php';

if(isset($_GET['usercart'])){
    $uc=$_GET['usercart'];
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

<body style="font-family: 'Open Sans', sans-serif;overflow: hidden;">
    <div id="wrapper">
        <nav class="navbar navbar-default navbar-cls-top " style=" margin-bottom: 0; background:#000000;"
            role="navigation">
            <div class="navbar-header">
                <a href="index.php"><img src="assets/img/logo.png" class="user-image img-responsive" /></a>
            </div>
            <div class="">

                <ul>
                    <li style="list-style: none; float:right; margin-right:50px; margin-top: 60px; font-weight:bolder">
                    <li
                        style="text-align: center; color: rgb(250, 244, 244);font-family:Arial, Helvetica, sans-serif; font-size: 25px; font-weight: bold; list-style: none;">
                        Welcome To the INNOVATIVE GROCERY's Admin Panel</li>
                    <a href="adminprofile.php" style="float: left; margin-left: 1250px; "><i
                            style="font-size:20px ; float: left; margin-right: 2px; " class="fa">&#xf2bd;</i>Admin
                        Profile</a>
                    </li>
                </ul>
            </div>

        </nav>
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
                                <a href="dailyreport.php">Daily Report</a>
                            </li>
                            <li>
                                <a href="periodicreport.php">Periodic Report</a>
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
                    <li>
                        <a href="#"><i></i>Logout</a>
                    </li>
                </ul>

            </div>

        </nav>
        <div id="page-wrapper">
            <div id="page-inner">
                <div class="row">
                    <div class="col-md-12">

                        <div class="add-product main-parts mt-2">
                            <h6
                                style="text-align: center; font-family:-apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif; font-style:inherit; color: rgb(43, 76, 88); font-size:xx-large;">
                                Product List
                            </h6>
                            <table class="table text-center mt-1 table bordered">
                                <thead>
                                    <tr>
                                        <th>Cart ID</th>
                                        <th>User ID</th>
                                        <th>Product ID</th>
                                        <th>Items</th>

                                    </tr>
                                </thead>
                                <tbody>
                                    <?php 
                                    
                                        $sql=oci_parse($conn,"SELECT * from CART WHERE USER_ID='$uc'");
                                        $result=oci_execute($sql);
                                        
                                        if ($result !=false)
                                        while($data=oci_fetch_assoc($sql)){ ?>
                                    <tr>
                                        <form method="POST" enctype="multipart/form-data">

                                            <td><?php echo $data['CART_ID']?></td>
                                            <td><?php echo $data['USER_ID']?></td>
                                            <td><?php echo $data['PRODUCT_ID']?></td>
                                            <td><?php echo $data['ITEMS']?></td>


                                        </form>
                                    </tr>
                                </tbody>
                                <?php }?>
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