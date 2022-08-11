<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Admin Panel</title>
    <link href="assets/css/bootstrap.css" rel="stylesheet" />
    <link href="assets/css/font-awesome.css" rel="stylesheet" />
    <link href="assets/css/custom.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css' />
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
                        style="text-align: center; color: rgb(250, 244, 244);font-family:Arial, Helvetica, sans-serif; font-size: 25px;list-style: none; font-weight: bold;">
                        Welcome To the INNOVATIVE GROCERY's Admin Panel</li>
                    <a href="#" style="float: left; margin-left: 1250px; "><i
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
                        <a  href="req-product.php"><i></i>Requested Products</a>
                    </li>
                    <li>
                        <a  href="tradershop.php"><i class="fas fa-store"></i>Shops</a>
                    </li>
                    <li>
                        <a  href="shop-req.php"><i></i>Requested Shop</a>
                    </li>
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
                            <h6
                                style="text-align: center; font-family:-apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif; font-style:inherit; color: rgb(43, 76, 88); font-size:xx-large;">
                                Add Trader</h6>
                           <form method="POST" action="tredadd.php" enctype="multipart/form-data">
                                <div class="container">
                                    <div class="row">
                                        <div class=" col-sm-6" style="margin-top:50px; text-align:center;">
                                            <!-- <input type='hidden' name='id' value = "PRODUCT_ID"/> -->
                                            <div class="form-group">
                                                <label class="fname">First Name:</label><br>
                                                <input class="fname" class="form-control" type="text" name="fname"><br>
                                            </div>
                                            <div class="form-group">
                                                <label class="gender" name="discount">Last Name:</label><br>
                                                <input class="gender" type="text" name="lname"><br>
                                            </div>
                                            
                                            <div class="form-group">
                                                <label class="lname">Gender:</label><br>
                                                <input type="radio" name="gender" value="M"> Male
                                                <input type="radio" name="gender" value="F"> Female
                                                <input type="radio" name="gender" value="O"> Other
                                            </div>
                                        </div>


                                        <div class="col-sm-6" style=" margin-top: 50px; text-align:center;">


                                            <div class="form-group">
                                                <label class="email" name="email"
                                                    style=" margin-top: 15px;">Email:</label><br>
                                                <input class="email" type="email" name="email"><br>
                                            </div>
                                            <div class="form-group">
                                                <label class="pass" name="pass"
                                                    style=" margin-top: 15px;">Username:</label><br>
                                                <input class="type" type="text" name="username"><br>
                                            </div>

                                            <div class="form-group">
                                                <label class="email" name="email"
                                                    style=" margin-top: 15px;">Type:</label><br>
                                                <input class="type" type="text" name="type"><br>
                                            </div>


                                        </div>
                                    </div>
                                    <div class="text-center">
                                        <a href=""><input type="submit" name="addtrader" value="ADD TRADER"
                                                class="btn btn-add-product"
                                                style="margin-top: 80px; text-align:center;"></a>
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

    <script src="assets/js/jquery-1.10.2.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>
    <script src="assets/js/jquery.metisMenu.js"></script>
    <script src="assets/js/custom.js"></script>


</body>

</html>