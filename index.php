<?php
include 'connect.php';
session_start();
error_reporting(0);

// if(isset($_SESSION['success']))
// {
// 	header('location: index.php');
// }
if ($_SERVER['REQUEST_METHOD'] == "POST") {


    $cartuserid = $_POST['cart_customer_id'];
    $cartproductid = $_POST['cart_item_id'];
    $itemquantity = $_POST['quantity'];



    $cartsql = "INSERT INTO CART(USER_ID,PRODUCT_ID,ITEMS)VALUES('$cartuserid','$cartproductid','$itemquantity')";
    $cartresult = oci_parse($conn, $cartsql);
    oci_execute($cartresult);
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

    <title>Innovative Grocery</title>

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
    <link rel="stylesheet" href="assets/css/font-awesome.min.css">
    <link href='http://fonts.googleapis.com/css?family=Roboto:300,400,500,700' rel='stylesheet' type='text/css'>

    <link rel="shortcut icon" href="image/logo_innovative_grocery.png">
    <link rel="stylesheet" type="text/css" href="main-header.html">

</head>

<body class="cnt-home">

    <header class="header-style-1">
        <!DOCTYPE html>
        <html>

        <head>
            <title>INNOVATIVE GROCERY </title>
        </head>

        <body style="background: #E2F7ED">

            <?php include('user-info.php'); ?>

            <?php include('main-header.php'); ?>

            <?php include('menu-bar.php'); ?>

            <div class="body-content outer-top-xs" id="top-banner-and-menu">
                <div class="container">
                    <div class="furniture-container homepage-container">
                        <div class="row">

                            <div class="col-xs-12 col-sm-12 col-md-3 sidebar">
                                <?php include('shop.php'); ?>
                                <?php include('catslider.php'); ?>
                            </div>

                            <div class="col-xs-12 col-sm-12 col-md-9 homebanner-holder">

                                <div id="hero" class="homepage-slider3">
                                    <div id="owl-main" class="owl-carousel owl-inner-nav owl-ui-sm">
                                        <div class="full-width-slider">
                                            <div class="item" style="background-image: url(image/grocerystore.jpg); border-radius: 8px;">

                                            </div>
                                        </div>

                                        <div class="full-width-slider">
                                            <div class="item full-width-slider" style="background-image: url(image/grocery2.jpg); border-radius: 8px;">
                                            </div>
                                        </div>

                                        <div class="full-width-slider">
                                            <div class="item full-width-slider" style="background-image: url(image/grocery3.jpg); border-radius: 8px;">
                                            </div>
                                        </div>

                                    </div>
                                </div>

                                <div class="info-boxes wow fadeInUp">
                                    <div class="info-boxes-inner">
                                        <div class="row">
                                            <div class="col-md-6 col-sm-4 col-lg-4">
                                                <div class="info-box">
                                                    <div class="row">
                                                        <div class="col-xs-2">
                                                            <i class="icon fa fa-dollar"></i>
                                                        </div>
                                                        <div class="col-xs-10">
                                                            <h4 class="info-box-heading green">Cash back</h4>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="hidden-md col-sm-4 col-lg-4">
                                                <div class="info-box">
                                                    <div class="row">
                                                        <div class="col-xs-2">
                                                            <i class="icon fa fa-truck"></i>
                                                        </div>
                                                        <div class="col-xs-10">
                                                            <h4 class="info-box-heading orange">Your favorites</h4>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-md-6 col-sm-4 col-lg-4">
                                                <div class="info-box">
                                                    <div class="row">
                                                        <div class="col-xs-2">
                                                            <i class="icon fa fa-gift"></i>
                                                        </div>
                                                        <div class="col-xs-10">
                                                            <h4 class="info-box-heading red">Special Sale</h4>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div>

                        </div>

                        <div id="product-tabs-slider" class="scroll-tabs inner-bottom-vs  wow fadeInUp">

                            <div class="more-info-tab clearfix">
                                <h3 class="new-product-title pull-left">FEATURED PRODUCTS</h3>
                                <ul class="nav nav-tabs nav-tab-line pull-right" id="new-products-1">
                                    <li class="active"><a href="#all" data-toggle="tab">All</a></li>
                                    <li><a href="#shops" data-toggle="tab">SHOPS</a></li>
                                    <li><a href="#traders" data-toggle="tab">TRADERS</a></li>
                                </ul>
                            </div>
                            <div class="tab-content outer-top-xs">
                                <div class="tab-pane in active" id="all">
                                    <div class="product-slider">
                                        <div class="owl-carousel home-owl-carousel custom-carousel owl-theme" data-item="5">

                                            <?php
                                            $stid = oci_parse($conn, " SELECT * FROM PRODUCT1 WHERE STATUS='ENABLE' ");
                                            $result = oci_execute($stid);

                                            if ($result != false)
                                                while ($row = oci_fetch_row($stid)) {

                                            ?>
                                                <div class="item item-carousel">
                                                    <div class="products">

                                                        <div class="product">
                                                            <div class="product-image">
                                                                <div class="image">
                                                                    <a href="product-detail.php?pid=<?php echo htmlentities($row['0']); ?>">
                                                                        <img style="border-radius: 10px;" src="<?php echo htmlentities($row['8']); ?>" width="200" height="240" alt=""></a>

                                                                </div>

                                                            </div>

                                                            <div class="product-info text-left">
                                                                <h3 class="name"><a href="product-detail.php?pid=<?php echo htmlentities($row['0']); ?>"><?php echo htmlentities($row['1']); ?></a>
                                                                </h3>
                                                                <div class="rating rateit-small"></div>
                                                                <div class="description"></div>

                                                                <div class="product-price">
                                                                    <span class="price">
                                                                        £.<?php echo htmlentities($row['3']); ?>
                                                                    </span>
                                                                    <span class="price-before-discount">£.<?php echo htmlentities($row['4']); ?>
                                                                    </span>

                                                                </div>

                                                            </div>

                                                            <?php if ($row['5'] > 0) { ?>
                                                                <div>
                                                                    <form method="post">
                                                                        <input type="hidden" value="<?php echo $row['0'];; ?>" name="cart_item_id">
                                                                        <input type="hidden" value="<?php echo $_SESSION['USER_ID']; ?>" name="cart_customer_id">
                                                                        <div class=''>
                                                                            <input style="color:red; border-radius:5px; margin-left:7px; width:100px;" type='number' value='1' min='1' max='10' name="quantity" />
                                                                        </div>
                                                                        <button class="btn p-3" type="submit" style="border-radius: 7px; background-color: #31A1D9; color:white;">ADD
                                                                            TO CART</button>


                                                                    </form>
                                                                </div>
                                                            <?php } else { ?>
                                                                <div class="action" style="color:red">Out of Stock</div>
                                                            <?php } ?>

                                                        </div>

                                                    </div>
                                                </div>

                                            <?php } ?>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>


                        <div class="sections prod-slider-small outer-top-small">
                            <div class="row">
                                <div class="col-md-6">
                                    <section class="section">
                                        <h3 class="section-title">GRAND OFFERS</h3>
                                        <div class="owl-carousel homepage-owl-carousel custom-carousel outer-top-xs owl-theme" data-item="2">

                                            <?php
                                            $stid = oci_parse($conn, " SELECT * FROM PRODUCT1 WHERE STATUS='ENABLE' AND CATEGORY_ID=3 ");
                                            $result = oci_execute($stid);

                                            if ($result != false)
                                                while ($row = oci_fetch_row($stid)) {
                                            ?>

                                                <div class="item item-carousel">
                                                    <div class="products">

                                                        <div class="product">
                                                            <div class="product-image">
                                                                <div class="image">
                                                                    <a href="product-detail.php?pid=<?php echo htmlentities($row['0']); ?>">
                                                                        <img style="border-radius: 7px;" src="<?php echo htmlentities($row['8']); ?>" width="200" height="240" alt=""></a>
                                                                </div>
                                                            </div>


                                                            <div class="product-info text-left">
                                                                <h3 class="name"><a href="product-detail.php?pid=<?php echo htmlentities($row['0']); ?>"><?php echo htmlentities($row['1']); ?></a>
                                                                </h3>
                                                                <div class="rating rateit-small"></div>
                                                                <div class="description"></div>

                                                                <div class="product-price">
                                                                    <span class="price">
                                                                        £. <?php echo htmlentities($row['3']); ?> </span>
                                                                    <span class="price-before-discount">£.<?php echo htmlentities($row['4']); ?></span>

                                                                </div>

                                                            </div>
                                                            <?php if ($row['5'] > 0) { ?>

                                                                <div>
                                                                    <form method="post">
                                                                        <input type="hidden" value="<?php echo $row['0'];; ?>" name="cart_item_id">
                                                                        <input type="hidden" value="<?php echo $_SESSION['USER_ID']; ?>" name="cart_customer_id">
                                                                        <div class=''>
                                                                            <input style="color:red; border-radius:5px; margin-left:7px; width:100px;" type='number' value='1' min='1' max='10' name="quantity" />
                                                                        </div>
                                                                        <button class="btn p-3" type="submit" style="border-radius: 7px; background-color: #31A1D9; color:white;">ADD
                                                                            TO CART</button>

                                                                    </form>
                                                                </div>
                                                            <?php } else { ?>
                                                                <div class="action" style="color:red">Out of Stock</div>
                                                            <?php } ?>
                                                        </div>
                                                    </div>
                                                </div>
                                            <?php } ?>

                                        </div>
                                    </section>
                                </div>
                                <div class="col-md-6">
                                    <section class="section">
                                        <h3 class="section-title">TODAY'S OFFER</h3>
                                        <div class="owl-carousel homepage-owl-carousel custom-carousel outer-top-xs owl-theme" data-item="2">

                                            <?php
                                            $stid = oci_parse($conn, " SELECT * FROM PRODUCT1 WHERE STATUS='ENABLE' AND CATEGORY_ID=4 ");
                                            $result = oci_execute($stid);

                                            if ($result != false)
                                                while ($row = oci_fetch_row($stid)) {
                                            ?>


                                                <div class="item item-carousel">
                                                    <div class="products">

                                                        <div class="product">
                                                            <div class="product-image">
                                                                <div class="image">
                                                                    <a href="product-detail.php?pid=<?php echo htmlentities($row['0']); ?>">
                                                                        <img style="border-radius: 7px;" src="<?php echo htmlentities($row['8']); ?>" width="200" height="240" alt=""></a>
                                                                </div>
                                                            </div>


                                                            <div class="product-info text-left">
                                                                <h3 class="name"><a href="product-detail.php?pid=<?php echo htmlentities($row['0']); ?>"><?php echo htmlentities($row['1']); ?></a>
                                                                </h3>
                                                                <div class="rating rateit-small"></div>
                                                                <div class="description"></div>

                                                                <div class="product-price">
                                                                    <span class="price">
                                                                        £. <?php echo htmlentities($row['3']); ?> </span>
                                                                    <span class="price-before-discount">£.<?php echo htmlentities($row['4']); ?></span>

                                                                </div>

                                                            </div>

                                                            <?php if ($row['5'] > 0) { ?>
                                                                <div>
                                                                    <form method="post">
                                                                        <input type="hidden" value="<?php echo $row['0'];; ?>" name="cart_item_id">
                                                                        <input type="hidden" value="<?php echo $_SESSION['USER_ID']; ?>" name="cart_customer_id">
                                                                        <div class=''>
                                                                            <input style="color:red; border-radius:5px; margin-left:7px; width:100px;" type='number' value='1' min='1' max='10' name="quantity" />
                                                                        </div>
                                                                        <button class="btn p-3" type="submit" style="border-radius: 7px; background-color: #31A1D9; color:white;">ADD
                                                                            TO CART</button>


                                                                    </form>
                                                                </div>
                                                            <?php } else { ?>
                                                                <div class="action" style="color:red">Out of Stock</div>
                                                            <?php } ?>

                                                        </div>
                                                    </div>
                                                </div>
                                            <?php } ?>
                                        </div>
                                    </section>

                                </div>
                            </div>
                        </div>

                    </div>
                </div>

                <?php include('footer.php'); ?>




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