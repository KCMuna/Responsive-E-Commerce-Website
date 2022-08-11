<?php
session_start();
error_reporting(0);
include 'connect.php';

$cid = intval($_GET['scid']);
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

if ($_SERVER['REQUEST_METHOD'] == "POST") {

    echo "<meta http-equiv='refresh' content='0'>";
    echo "<script>swal('Good job!', 'Your Product added to Cart', 'success');</script>";

    $cartuserid = $_POST['cart_customer_id'];
    $cartproductid = $_POST['cart_item_id'];
    $itemquantity = $_POST['quantity'];



    $cartsql = "INSERT INTO CART(USER_ID,PRODUCT_ID,ITEMS)VALUES('$cartuserid','$cartproductid','$itemquantity')";
    $cartresult = oci_parse($conn, $cartsql);
    oci_execute($cartresult);

    echo "<script>swal('Good job!', 'Your Product added to Cart', 'success');</script>";
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

    <title>Shop Product</title>

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
                                    <img src="image/shopwall.jpg" alt="image" width="850" height="255" class="">
                                </div>
                                <div class="container-fluid">
                                    <div class="caption vertical-top text-left">
                                        <div class="big-text">
                                            <br />
                                        </div>

                                        <?php
                                        $stid = oci_parse($conn, " SELECT SHOP_NAME FROM SHOP WHERE STATUS='ENABLE' AND SHOP_ID='$cid'");
                                        $result = oci_execute($stid);
                                        if ($result != false)
                                            while ($row = oci_fetch_row($stid)) {
                                        ?>

                                            <div style="text-shadow: 0 0 10px blue, 0 0 5px black;color:white;" class="excerpt hidden-sm hidden-md">
                                                <?php echo htmlentities($row['0']); ?>
                                            </div>

                                        <?php } ?>

                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="search-result-container">
                            <div id="myTabContent" class="tab-content">
                                <div class="tab-pane active " id="grid-container">
                                    <div class="category-product  inner-top-vs">
                                        <div class="row">
                                            <?php
                                            //$ret=mysqli_query($con,"select * from products where subCategory='$cid'");
                                            $stid = oci_parse($conn, " SELECT * FROM PRODUCT1 WHERE STATUS='ENABLE' AND SHOP_ID='$cid'");
                                            $run = oci_execute($stid);
                                            //oci_fetch_row($stid);
                                            //$num = oci_num_rows($stid);
                                            if ($run) {
                                                while ($row = oci_fetch_row($stid)) { ?>
                                                    <div class="col-sm-6 col-md-4 wow fadeInUp">
                                                        <div class="products">
                                                            <div class="product">
                                                                <div class="product-image">
                                                                    <div class="image">
                                                                        <a href="product-detail.php?pid=<?php echo htmlentities($row['0']); ?>"><img src="<?php echo htmlentities($row['8']); ?>" alt="Image" width="200" height="300"></a>
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
                                                                        <span class="price-before-discount">£.
                                                                            <?php echo htmlentities($row['4']); ?></span>

                                                                    </div>

                                                                </div>
                                                                <div class="cart clearfix animate-effect">
                                                                    <div class="action">
                                                                        <ul class="list-unstyled">
                                                                            <li class="add-cart-button btn-group">
                                                                                <?php if ($row['5'] > 0) { ?>
                                                                                    <div>
                                                                                        <form method="post">
                                                                                            <input type="hidden" value="<?php echo $row['0'];; ?>" name="cart_item_id">
                                                                                            <input type="hidden" value="<?php echo $_SESSION['USER_ID']; ?>" name="cart_customer_id">
                                                                                            <div class=''>
                                                                                                <input type='number' value='1' min='1' max='10' name="quantity" />
                                                                                            </div>
                                                                                            <button class="btn p-3" type="submit" style="border-radius: 7px; background-color: #31A1D9; color:white;">ADD
                                                                                                TO CART</button>

                                                                                        </form>
                                                                                    </div>
                                                                                <?php } else { ?>
                                                                                    <div class="action" style="color:red">Out of
                                                                                        Stock</div>
                                                                                <?php } ?>

                                                                            </li>

                                                                        </ul>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                <?php }
                                            } else { ?>

                                                <div class="col-sm-6 col-md-4 wow fadeInUp">
                                                    <h3>No Product Found</h3>
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

        <!--====FOOTER===-->

        <?php include('footer.php'); ?>

        <!--====FOOTER END===-->

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