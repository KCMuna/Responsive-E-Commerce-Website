<?php
session_start();
include 'connect.php';

if (isset($_GET['cartdelete'])) {

    $cd = $_GET['cartdelete'];

    $query = oci_parse($conn, "DELETE FROM CART WHERE PRODUCT_ID ='$cd'");
    $result = oci_execute($query);
    if ($result) {
        echo "<script>alert('PRODUCT REMOVED!!');</script>";
        // header('location:my-cart1.php');
    } else {
        echo "Error !";
        exit();
    }
}


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <meta name="keywords" content="MediaCenter, Template, eCommerce">
    <meta name="robots" content="all">

    <title>My Cart</title>
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/main.css">
    <link rel="stylesheet" href="assets/css/green.css">
    <link rel="stylesheet" href="assets/css/owl.carousel.css">
    <link rel="stylesheet" href="assets/css/owl.transitions.css">
    <link href="assets/css/lightbox.css" rel="stylesheet">
    <link rel="stylesheet" href="assets/css/animate.min.css">
    <link rel="stylesheet" href="assets/css/rateit.css">
    <link rel="stylesheet" href="assets/css/bootstrap-select.min.css">

    <link rel="stylesheet" href="assets/css/config.css">

    <link href="assets/css/green.css" rel="alternate stylesheet" title="Green color">
    <link href="assets/css/blue.css" rel="alternate stylesheet" title="Blue color">
    <link href="assets/css/red.css" rel="alternate stylesheet" title="Red color">
    <link href="assets/css/orange.css" rel="alternate stylesheet" title="Orange color">
    <link href="assets/css/dark-green.css" rel="alternate stylesheet" title="Darkgreen color">
    <script src="assets/js/bootstrap.min.js"></script>

    <link rel="stylesheet" href="assets/css/font-awesome.min.css">

    <link href='http://fonts.googleapis.com/css?family=Roboto:300,400,500,700' rel='stylesheet' type='text/css'>

    <link rel="shortcut icon" href="image/logo_innovative_grocery.png">

</head>

<body style="background: #E2F7ED">
    <header class="header-style-1">

        <?php include('user-info.php'); ?>

        <?php include('main-header.php'); ?>

        <?php include('menu-bar.php'); ?>

        <div class="breadcrumb">
            <div class="container">
                <div class="breadcrumb-inner">
                    <ul class="list-inline list-unstyled">
                        <li><a href="#">Home</a></li>
                        <li class='active'>Shopping Cart</li>
                    </ul>
                </div>
            </div>
        </div>

        <div class="body-content outer-top-xs">
            <div class="container">
                <div class="row inner-bottom-sm">
                    <div class="shopping-cart">
                        <div class="col-md-12 col-sm-12 shopping-cart-table ">
                            <div class="table-responsive">
                                <form name="cart" method="post">

                                    <div class="add-product main-parts mt-2">
                                        <table class="table text-center mt-1 table bordered" width=50%>
                                            <thead>
                                                <tr style="background:rgb(101, 102, 104); color:white;">
                                                    <th>Product Image</th>
                                                    <th>Product Name</th>
                                                    <th>Price</th>
                                                    <th>Quantity</th>
                                                    <th>Description</th>
                                                    <th>Sub Total</th>
                                                    <th>Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>

                                                <?php

                                                if (isset($_SESSION['USER_ID'])) {
                                                    echo "Your Products";
                                                    $cart_user_id = $_SESSION['USER_ID'];

                                                    $cartshowquery = "SELECT * FROM CART WHERE USER_ID=$cart_user_id";
                                                    $cartresult = oci_parse($conn, $cartshowquery);
                                                    oci_execute($cartresult);


                                                    $sub_total_price = 0;

                                                    while ($item5 = oci_fetch_assoc($cartresult)) {
                                                        $total_price = 0;
                                                        $productid = $item5['PRODUCT_ID'];
                                                        $product_quantity = $item5['ITEMS'];

                                                        $select_query = "SELECT * FROM PRODUCT1 WHERE PRODUCT_ID='$productid'";
                                                        $cart_showing = oci_parse($conn, $select_query);
                                                        oci_execute($cart_showing);

                                                        if (($row = oci_fetch_assoc($cart_showing)) == true) {
                                                            $productid = $row['PRODUCT_ID'];
                                                            $productname = $row['PRODUCT_NAME'];
                                                            $variable = $row['PRICE'];
                                                            $productimage = $row['PRODUCT_IMAGE'];
                                                            $productdesc = $row['DESCRIPTION'];

                                                            if (isset($variable)) {

                                                                $de = $variable * $product_quantity;
                                                            } else {

                                                                $de = $variable * $product_quantity;
                                                            }

                                                            $total_price += $de;
                                                            $sub_total_price += $de;
                                                ?>

                                                            <tr>
                                                                <td><img src="<?php echo $row['PRODUCT_IMAGE']; ?>" width="50"></td>
                                                                <td><?php echo $row['PRODUCT_NAME'] ?></td>
                                                                <td><?php echo $row['PRICE'] ?></td>
                                                                <td><?php echo $item5['ITEMS'] ?></td>
                                                                <td><?php echo $row['DESCRIPTION'] ?></td>
                                                                <th><?php echo $total_price ?></th>
                                                                <td>
                                                                    <a href="my-cart1.php?cartdelete=<?php echo $productid ?>">REMOVE</a>

                                                            </tr>

                                                <?php }
                                                    }
                                                } ?>

                                            </tbody>
                                        </table>

                                    </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-7 col-sm-5">
                                </div>
                                <div class="col-lg-1 col-sm-5 ml-auto">
                                    <table class="table table-clear">
                                        <tbody>

                                            <tr>
                                                <strong class="text-dark">TOTAL:£</strong>
                                                <strong class="text-dark"><?php echo $sub_total_price; ?></strong>

                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 col-sm-12 cart-shopping-total">
                        <form action="" method="POST">
                            <input type="hidden" name="total" value="<?php echo $total_price; ?>">
                            <input type="hidden" name="customer" value="<?php echo $_SESSION['USER_ID'] ?>">

                            <a style="color:white; background:#3F954F; border:1px solid blue; padding: 6px;border-radius: 5px;" href="checking.php?checking=<?php echo $sub_total_price; ?>"> PROCEED TO CHECKOUT</a>
                            <a style="color:white; background:#F3BC57 ; border:1px solid blue; padding: 6px;border-radius: 5px;" href="index.php"> CONTINUE SHOPPING</a>

                        </form>
                    </div>
                </div>
            </div>
        </div>
        </div>
        <footer id="footer" class="footer color-bg" style="background: #F1948A ; color: black; margin-bottom: 0px;padding-bottom: 5px;">
            <div class="links-social inner-top-sm">
                <div class="container">
                    <div class="row">
                        <div class="col-xs-12 col-sm-6 col-md-4">
                            <div class="contact-info">
                                <div class="footer-logo">
                                    <div class="logo">
                                        <a href="#">

                                            <img src="image/logo_innovative_grocery.png" height="100" width="100">
                                        </a>
                                    </div>

                                </div>

                                <div class="module-body m-t-20">
                                    <p class="about-us"> The “ Innovative Grocery” is going to act as a one-stop
                                        shopping solution that offers multiple services and products.</p>

                                    <div class="social-icons">

                                        <a href="http://facebook.com/transvelo" class='active'><i class="icon fa fa-facebook"></i></a>
                                        <a href="#"><i class="icon fa fa-twitter"></i></a>
                                        <a href="#"><i class="icon fa fa-linkedin"></i></a>
                                        <a href="#"><i class="icon fa fa-rss"></i></a>
                                        <a href="#"><i class="icon fa fa-pinterest"></i></a>

                                    </div>
                                </div>

                            </div>
                        </div>

                        <div class="col-xs-12 col-sm-6 col-md-4">
                            <div class="contact-timing">
                                <div class="module-heading">
                                    <h4 class="module-title">opening time</h4>
                                </div>

                                <div class="module-body outer-top-xs">
                                    <div class="table-responsive">
                                        <table class="table">
                                            <tbody>
                                                <tr>
                                                    <td>Monday-Friday:</td>
                                                    <td class="pull-right">08.00 To 18.00</td>
                                                </tr>
                                                <tr>
                                                    <td>Saturday:</td>
                                                    <td class="pull-right">09.00 To 20.00</td>
                                                </tr>
                                                <tr>
                                                    <td>Sunday:</td>
                                                    <td class="pull-right">10.00 To 20.00</td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-xs-12 col-sm-6 col-md-4">
                            <div class="contact-information">
                                <div class="module-heading">
                                    <h4 class="module-title">information</h4>
                                </div>

                                <div class="module-body outer-top-xs">
                                    <ul class="toggle-footer">
                                        <li class="media">
                                            <div class="pull-left">
                                                <span class="icon fa-stack fa-lg">
                                                    <i class="fa fa-circle fa-stack-2x"></i>
                                                    <i class="fa fa-map-marker fa-stack-1x fa-inverse"></i>
                                                </span>
                                            </div>
                                            <div class="media-body">
                                                <p>Cleckhuddersfax, U.K</p>
                                            </div>
                                        </li>

                                        <li class="media">
                                            <div class="pull-left">
                                                <span class="icon fa-stack fa-lg">
                                                    <i class="fa fa-circle fa-stack-2x"></i>
                                                    <i class="fa fa-mobile fa-stack-1x fa-inverse"></i>
                                                </span>
                                            </div>
                                            <div class="media-body">
                                                <p>+44 7911 123456<br>+44 7911 654321</p>
                                            </div>
                                        </li>

                                        <li class="media">
                                            <div class="pull-left">
                                                <span class="icon fa-stack fa-lg">
                                                    <i class="fa fa-circle fa-stack-2x"></i>
                                                    <i class="fa fa-envelope fa-stack-1x fa-inverse"></i>
                                                </span>
                                            </div>
                                            <div class="media-body">
                                                <span><a href="#">info@innovativegrocery.com</a></span>
                                            </div>
                                        </li>
                                    </ul>

                                    <div class="footer">
                                        <div class="container">
                                            <b class="copyright">&copy; 2021 Innovative Grocery </b> All rights
                                            reserved.
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </footer>

        <script src="assets/js/jquery-1.11.1.min.js"></script>

        <script src="assets/js/bootstrap.min.js"></script>

        <script src="assets/js/bootstrap-hover-dropdown.min.js"></script>
        <script src="assets/js/owl.carousel.min.js"></script>
        <script src="assets/js/echo.min.js"></script>
        <script src="assets/js/jquery.easing-1.3.min.js"></script>
        <script src="assets/js/bootstrap-slider.min.js"></script>
        <script src="assets/js/jquery.rateit.min.js"></script>
        <script type="text/javascript" src="assets/js/lightbox.min.js"></script>
        <script src="assets/js/bootstrap-select.min.js"></script>
        <script src="assets/js/wow.min.js"></script>
        <script src="assets/js/scripts.js"></script>
        <script src="switchstylesheet/switchstylesheet.js"></script>

        <script>
            $(document).ready(function() {
                $(".changecolor").switchstylesheet({
                    seperator: "color"
                });
                $('.show-theme-options').click(function() {
                    $(this).parent().toggleClass('open');
                    return false;
                });
            });

            $(window).bind("load", function() {
                $('.show-theme-options').delay(2000).trigger('click');
            });
        </script>
</body>

</html>