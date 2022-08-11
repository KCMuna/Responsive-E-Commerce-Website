<?php
session_start();

include '../connect.php';

?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>CUSTOMER LIST</title>
    <link href="assets/css/bootstrap.css" rel="stylesheet" />
    <link href="assets/css/font-awesome.css" rel="stylesheet" />
    <link href="assets/css/custom.css" rel="stylesheet" />
    <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css' />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

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
                        <a href="req-product.php"><i></i>Requested Products</a>
                    </li>
                    <li>
                        <a href="tradershop.php"><i class="fas fa-store"></i>Shops</a>
                    </li>
                    <li>
                        <a href="shop-req.php"><i></i>Requested Shop</a>
                    </li>
                    <li>
                    <li>
                        <a href="review.php"><i></i> Review</a>
                    </li>

                    <li>
                        <a><i></i>Report<span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level">
                            <li>
                                <a href="dailyreport.html">Daily Report</a>
                            </li>
                            <li>
                                <a href="periodicreport.html">Periodic Report</a>
                            </li>

                        </ul>
                    </li>

                    <li>
                        <a><i></i>Manage User<span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level">
                            <li>
                                <a href="Traderlist.html">Trader</a>
                            </li>
                            <li>
                                <a href="trader-req.php">Trader Requests</a>
                            </li>
                            <li>
                                <a href="Customerlist.html">Customer</a>
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
                            <h6 style="text-align: center; font-family:-apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif; font-style:inherit; color: rgb(43, 76, 88); font-size:xx-large;">
                                Customer List
                            </h6>
                            <div class="text-center1">
                                <a href="addcustomer.html"> <input type="submit" value="ADD CUSTOMER &raquo;" class="btn btn-add-products"></a>
                            </div>

                            <table class="table text-center mt-1 table bordered">
                                <thead>
                                    <tr>
                                        <th>Customer Id</th>
                                        <th>First Name</th>
                                        <th>Last Name</th>
                                        <th>Email</th>
                                        <th>Address</th>
                                        <th>Phone</th>
                                        <th>Gender</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>

                                    <?php

                                    $sql = oci_parse($conn, "SELECT * from USERS");
                                    $result = oci_execute($sql);

                                    if ($result != false)
                                        while ($data = oci_fetch_assoc($sql)) { ?>
                                        <tr>
                                            <!--   <form method="POST" enctype="multipart/form-data"> -->
                                            <td><?php echo $data['USER_ID'] ?></td>
                                            <td><?php echo $data['FIRST_NAME'] ?></td>
                                            <td><?php echo $data['LAST_NAME'] ?></td>
                                            <td><?php echo $data['EMAIL'] ?></td>
                                            <td><?php echo $data['ADDRESS'] ?></td>
                                            <td><?php echo $data['PHONE'] ?></td>
                                            <td><?php echo $data['GENDER'] ?></td>
                                            <td> <a href="customer-cart.php?usercart=<?php echo $data['USER_ID']; ?>">
                                                    <i class="fa fa-shopping-cart" aria-hidden="" style="font-size:30px"></i></a>

                                            </td>
                                            <!--  </form> -->
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