<?php
session_start();
error_reporting(0);
include 'connect.php';

$trad = intval($_GET['trid']);
if (isset($_GET['action']) && $_GET['action'] == "add") {
    $id = intval($_GET['id']);
    if (isset($_SESSION['cart'][$id])) {
        $_SESSION['cart'][$id]['quantity']++;
    } else {
        $sql_p = "SELECT * FROM products WHERE id={$id}";
        $query_p = mysqli_query($con, $sql_p);
        if (mysqli_num_rows($query_p) != 0) {
            $row_p = mysqli_fetch_array($query_p);
            $_SESSION['cart'][$row_p['id']] = array("quantity" => 1, "price" => $row_p['productPrice']);
            echo "<script>alert('Product has been added to the cart')</script>";
            echo "<script type='text/javascript'> document.location ='my-cart.php'; </script>";
        } else {
            $message = "Product ID is invalid";
        }
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

    <title>TRADERS</title>

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


</head>

<body style="background: #E2F7ED">

    <header class="header-style-1">

        <?php include('user-info.php'); ?>

        <?php include('main-header.php'); ?>

        <?php include('menu-bar.php'); ?>

        </div>
        <div class="body-content outer-top-xs">
            <div class='container'>
                <div class='row outer-bottom-sm'>
                    <div class='col-md-3 sidebar'>
                        <div class="sidebar-module-container">
                            <h3 class="section-title">SHOP BY</h3>
                            <div class="sidebar-filter">
                                <?php include('catslider.php'); ?>

                            </div>
                        </div>
                    </div>
                    <div class='col-md-9'>

                        <div id="category" class="category-carousel hidden-xs">
                            <div class="item">
                                <div class="image">
                                    <img src="image/shopwall.jpg" alt="image" width="850" height="155" class="">
                                </div>
                                <div class="container-fluid">
                                    <div class="caption vertical-top text-left">
                                        <div class="big-text">
                                            <br />
                                        </div>
                                        <div class="search-result-container">
                                            <div id="myTabContent" class="tab-content">
                                                <div class="tab-pane active " id="grid-container">
                                                    <div class="category-product  inner-top-vs">
                                                        <div class="row">
                                                            <?php
                                                            //$ret=mysqli_query($con,"select * from products where subCategory='$cid'");
                                                            $stid = oci_parse($conn, " SELECT * FROM SHOP WHERE STATUS='ENABLE' AND TRADER_ID='$trad'");
                                                            $run = oci_execute($stid);
                                                            // oci_fetch_row($stid);
                                                            // $num = oci_num_rows($stid);
                                                            if ($run) {
                                                                while ($row = oci_fetch_row($stid)) { ?>
                                                                    <div class="col-sm-6 col-md-4 wow fadeInUp">
                                                                        <div class="products">
                                                                            <div class="product">
                                                                                <div class="product-image">
                                                                                    <div class="image">
                                                                                        <a href="shop-product.php?scid=<?php echo htmlentities($row['0']); ?>"><img src="<?php echo htmlentities($row['5']); ?>" alt="Image" width="200" height="200"></a>
                                                                                    </div>
                                                                                </div>


                                                                                <div class="">
                                                                                    <h3 class=""><a href="shop-product.php?scid=<?php echo htmlentities($row['0']); ?>"><?php echo htmlentities($row['1']); ?></a>
                                                                                    </h3>
                                                                                    <div class="rating rateit-small"></div>
                                                                                    <div class="description"></div>


                                                                                </div>

                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                <?php }
                                                            } else { ?>

                                                                <div class="col-sm-6 col-md-4 wow fadeInUp">
                                                                    <h3>No Shop Found</h3>
                                                                </div>

                                                            <?php } ?>


                                                        </div>
                                                    </div>

                                                </div>



                                            </div>

                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>

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