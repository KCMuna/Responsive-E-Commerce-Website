<?php

session_start();
include 'connect.php';
error_reporting(0);

$pid = intval($_GET['pid']);
if (isset($_GET['pid']) && $_GET['action'] == "wishlist") {
    if (strlen($_SESSION['login']) == 0) {
        header('location:login.php');
    } else {
        //mysqli_query($con,"insert into wishlist(userId,productId) values('".$_SESSION['id']."','$pid')");
        echo "<script>alert('Product aaded in wishlist');</script>";
        //header('location:my-wishlist.php');

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


if (isset($_POST['submit'])) {
    $uid = $_SESSION['USER_ID'];

    $date = $_POST['date'];
    $rate = $_POST['rating'];
    // $value=$_POST['value'];
    $name = $_POST['name'];
    $summary = $_POST['summary'];
    $cmt = $_POST['comment'];

    $stid = oci_parse($conn, "INSERT INTO REVIEW(REVIEW_DATE,RATING,NAME,SUMMERY,COMMENTS,PRODUCT_ID,USER_ID)
	 VALUES(to_date(:REVIEW_DATE,'YY/MM/DD'),$rate,'$name','$summary','$cmt',$pid,$uid)");

    oci_bind_by_name($stid, ":REVIEW_DATE", $date);
    $result = oci_execute($stid);
    //echo $date;
    if ($result) {
        echo "<script>('THANK YOU FOR REVEW!!');</script>";
        exit();
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
    <title>Product Details</title>
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

    </header>

    <div class="breadcrumb">
        <div class="container">
            <div class="breadcrumb-inner">

                <?php
                $stid = oci_parse($conn, " SELECT CATEGORY_NAME, PRODUCT_NAME FROM CATEGORY C, PRODUCT1 P WHERE C.CATEGORY_ID=P.PRODUCT_ID AND P.PRODUCT_ID='$pid' ");
                $result = oci_execute($stid);

                if ($result != false)
                    while ($row = oci_fetch_row($stid)) {

                ?>

                    <ul class="list-inline list-unstyled">
                        <li><a href="index.php">Home</a></li>
                        <li class='active'><?php echo htmlentities($row['1']); ?></li>
                    </ul>
                <?php } ?>
            </div>
        </div>
    </div>
    <div class="body-content outer-top-xs">
        <div class='container'>
            <div class='row single-product outer-bottom-sm '>
                <div class='col-md-3 sidebar'>
                    <div class="sidebar-module-container">


                        <div class="sidebar-widget outer-bottom-xs wow fadeInUp">
                            <h3 class="section-title">Category</h3>
                            <div class="sidebar-widget-body m-t-10">
                                <div class="accordion">

                                    <?php
                                    $stid = oci_parse($conn, " SELECT CATEGORY_ID,CATEGORY_NAME FROM CATEGORY WHERE STATUS='ENABLE' ");
                                    $result = oci_execute($stid);
                                    if ($result != false)
                                        while ($row = oci_fetch_row($stid)) {
                                    ?>
                                        <div class="accordion-group">
                                            <div class="accordion-heading">
                                                <a href="category.php?cid=<?php echo $row['0']; ?>" class="accordion-toggle collapsed">
                                                    <?php echo $row['1']; ?>
                                                </a>
                                            </div>

                                        </div>
                                    <?php } ?>
                                </div>
                            </div>
                        </div>
                        <div class="sidebar-widget hot-deals wow fadeInUp">
                            <h3 class="section-title">HOT DEALS</h3>
                            <div class="owl-carousel sidebar-carousel custom-carousel owl-theme outer-top-xs">

                                <?php
                                // $stid = oci_parse($conn, " SELECT * FROM PRODUCT1 ORDER BY RAND() LIMIT 4 ");
                                //$result = oci_execute($stid);
                                $stid = oci_parse($conn, " SELECT * FROM PRODUCT1 WHERE STATUS='ENABLE' AND CATEGORY_ID=2 ");
                                $result = oci_execute($stid);
                                if ($result != false)
                                    while ($row = oci_fetch_row($stid)) {

                                ?>
                                    <div class="item">
                                        <div class="products">
                                            <div class="hot-deal-wrapper">
                                                <div class="image">
                                                    <img style="border-radius: 7px;" src="<?php echo htmlentities($row['8']); ?>" width="200" height="240" alt=""></a>
                                                </div>

                                            </div>

                                            <div class="product-info text-left m-t-20">
                                                <h3 class="name"><a href="product-detail.php?pid=<?php echo htmlentities($row['0']); ?>"><?php echo htmlentities($row['1']); ?></a>
                                                </h3>
                                                <div class="rating rateit-small"></div>

                                                <div class="product-price">
                                                    <span class="price">
                                                        £.<?php echo htmlentities($row['3']); ?>
                                                    </span>
                                                    <span class="price-before-discount">£.<?php echo htmlentities($row['4']); ?>
                                                    </span>

                                                </div>

                                            </div>

                                            <div class="cart clearfix animate-effect">
                                                <div class="action">

                                                    <div class="add-cart-button btn-group">


                                                        <?php if ($row['5'] > 50) { ?>

                                                            <div>
                                                                <form method="post">
                                                                    <input type="hidden" value="<?php echo $row['0'];; ?>" name="cart_item_id">
                                                                    <input type="hidden" value="<?php echo $_SESSION['USER_ID']; ?>" name="cart_customer_id">
                                                                    <div class=''>
                                                                        <input style="color:red; border-radius:5px; margin-left:7px; width:100px;" type='number' value='1' min='1' max='10' name="quantity" />
                                                                    </div>
                                                                    <button class="btn p-3" type="submit" style="border-radius: 7px; background-color: #31A1D9; color:white;"><i class="fa fa-shopping-cart" aria-hidden="true"></i>
                                                                        ADD TO CART</button>


                                                                </form>
                                                            </div>

                                                        <?php } else { ?>
                                                            <div class="action" style="color:red">Out of Stock</div>
                                                        <?php } ?>


                                                    </div>

                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                <?php } ?>

                            </div>
                        </div>

                    </div>
                </div>

                <?php
                $stid = oci_parse($conn, " SELECT * FROM PRODUCT1 WHERE STATUS='ENABLE' AND PRODUCT_ID='$pid'");
                $result = oci_execute($stid);
                if ($result != false)
                    while ($row = oci_fetch_row($stid)) {

                ?>

                    <div class='col-md-9'>
                        <div class="row  wow fadeInUp">
                            <div class="col-xs-12 col-sm-6 col-md-5 gallery-holder">
                                <div class="product-item-holder size-big single-product-gallery small-gallery">

                                    <div id="owl-single-product">

                                        <div class="single-product-gallery-item" id="slide1">
                                            <a data-lightbox="image-1" data-title="<?php echo htmlentities($row['1']); ?>" href="<?php echo htmlentities($row['0']); ?>/<?php echo htmlentities($row['8']); ?>">
                                                <img style="border-radius: 12px;" class="img-responsive" alt="Picture Main" width="270" height="200" src="<?php echo htmlentities($row['8']); ?>" />
                                            </a>
                                        </div>


                                        <div class="single-product-gallery-item" id="slide1">
                                            <a data-lightbox="image-1" data-title="<?php echo htmlentities($row['1']); ?>" href="<?php echo htmlentities($row['0']); ?>/<?php echo htmlentities($row['8']); ?>">
                                                <img class="img-responsive" alt="" src="<?php echo htmlentities($row['8']); ?>" width="350" height="250" />
                                            </a>
                                        </div>

                                        <div class="single-product-gallery-item" id="slide2">
                                            <a data-lightbox="image-1" data-title="Gallery" href="<?php echo htmlentities($row['0']); ?>/<?php echo htmlentities($row['8']); ?>">
                                                <img class="img-responsive" alt="" src="<?php echo htmlentities($row['8']); ?>" />
                                            </a>
                                        </div>

                                        <div class="single-product-gallery-item" id="slide3">
                                            <a data-lightbox="image-1" data-title="Gallery" href="<?php echo htmlentities($row['0']); ?>/<?php echo htmlentities($row['8']); ?>">
                                                <img class="img-responsive" alt="" src="<?php echo htmlentities($row['8']); ?>" />
                                            </a>
                                        </div>

                                    </div>


                                    <div class="single-product-gallery-thumbs gallery-thumbs">

                                        <div id="owl-single-product-thumbnails">
                                            <div class="item">
                                                <a class="horizontal-thumb active" data-target="#owl-single-product" data-slide="1" href="#slide1">
                                                    <img class="img-responsive" alt="Picture" src="<?php echo htmlentities($row['8']); ?>" />
                                                </a>
                                            </div>

                                            <div class="item">
                                                <a class="horizontal-thumb" data-target="#owl-single-product" data-slide="2" href="#slide2">
                                                    <img class="img-responsive" width="85" height="100" alt="Picture" src="<?php echo htmlentities($row['8']); ?>" />
                                                </a>
                                            </div>
                                            <div class="item">

                                                <a class="horizontal-thumb" data-target="#owl-single-product" data-slide="3" href="#slide3">
                                                    <img style="border-radius: 7px;" class="img-responsive" width="85" alt="Picture" src="<?php echo htmlentities($row['8']); ?>" height="50" />
                                                </a>
                                            </div>


                                        </div>

                                    </div>

                                </div>

                            </div>

                            <div class='col-sm-6 col-md-7 product-info-block'>
                                <div class="product-info">
                                    <h1 class="name"><?php echo htmlentities($row['1']); ?></h1>


                                    <?php
                                    $stid = oci_parse($conn, " SELECT * FROM REVIEW WHERE PRODUCT_ID='$pid' ");
                                    $result = oci_execute($stid); {
                                    ?>
                                        <div class="rating-reviews m-t-20">
                                            <div class="row">
                                                <div class="col-sm-3">
                                                    <div class="rating rateit-small"></div>
                                                </div>
                                                <div class="col-sm-8">
                                                    <div class="reviews">
                                                        <a href="#" class="lnk">(<?php echo htmlentities($result); ?>
                                                            Reviews)</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    <?php } ?>
                                    <div class="stock-container info-container m-t-10">
                                        <div class="row">
                                            <div class="col-sm-3">
                                                <div class="stock-box">
                                                    <span class="label">Availability :</span>
                                                </div>
                                            </div>
                                            <div class="col-sm-9">
                                                <div class="stock-box">
                                                    <span class="value"><?php echo htmlentities($row['5']); ?></span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="stock-container info-container m-t-10">
                                        <div class="row">
                                            <div class="col-sm-3">
                                                <div class="stock-box">
                                                    <span class="label">Shop :</span>
                                                </div>
                                            </div>
                                            <div class="col-sm-9">
                                                <div class="stock-box">
                                                    <span class="value"><?php echo htmlentities($row['10']); ?></span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>


                                    <div class="stock-container info-container m-t-10">
                                        <div class="row">
                                            <div class="col-sm-3">
                                                <div class="stock-box">
                                                    <span class="label">CATEGORY :</span>
                                                </div>
                                            </div>
                                            <div class="col-sm-9">
                                                <div class="stock-box">
                                                    <span class="value"><?php echo htmlentities($row['9']); ?></span>


                                                    </span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="price-container info-container m-t-20">
                                        <div class="row">


                                            <div class="col-sm-6">
                                                <div class="price-box">
                                                    <span class="price">£ <?php echo htmlentities($row['3']); ?></span>

                                                </div>
                                            </div>

                                        </div>
                                    </div>

                                    <div class="quantity-container info-container">
                                        <div class="row">


                                            <div class="col-sm-7">
                                                <?php if ($row['5'] > 0) { ?>

                                                    <div>
                                                        <form method="post">
                                                            <input type="hidden" value="<?php echo $row['0'];; ?>" name="cart_item_id">
                                                            <input type="hidden" value="<?php echo $_SESSION['USER_ID']; ?>" name="cart_customer_id">
                                                            <div class=''>
                                                                <input style="color:red; border-radius:5px; margin-left:7px; width:100px;" type='number' value='1' min='1' max='10' name="quantity" />
                                                            </div>
                                                            <button class="btn p-3" type="submit" style="border-radius: 7px; background-color: #31A1D9; color:white;"><i class="fa fa-shopping-cart" aria-hidden="true"></i> ADD TO
                                                                CART</button>


                                                        </form>
                                                    </div>

                                            </div>

                                        </div>
                                    </div>

                                </div>

                            </div>
                        </div>

                        <div class="product-tabs inner-bottom-xs  wow fadeInUp">
                            <div class="row">
                                <div class="col-sm-3">
                                    <ul id="product-tabs" class="nav nav-tabs nav-tab-cell">
                                        <li class="active"><a data-toggle="tab" href="#description">DESCRIPTION</a></li>
                                        <li><a data-toggle="tab" href="#review">REVIEW</a></li>
                                    </ul>
                                </div>
                                <div class="col-sm-9">

                                    <div class="tab-content">

                                        <div id="description" class="tab-pane in active">
                                            <div class="product-tab">
                                                <p class="text"><?php echo $row['2']; ?></p>
                                            </div>
                                        </div>

                                        <div id="review" class="tab-pane">
                                            <div class="product-tab">

                                                <div class="product-reviews">
                                                    <h4 class="title">Customer Reviews</h4>


                                                    <?php
                                                    // $qry=mysqli_query($con,"select * from productreviews where productId='$pid'");
                                                    // while($rvw=mysqli_fetch_array($qry))
                                                    $stid = oci_parse($conn, " SELECT * FROM REVIEW WHERE PRODUCT_ID='$pid'");
                                                    $result = oci_execute($stid);
                                                    if ($result != false)
                                                        while ($row = oci_fetch_row($stid)) {
                                                    ?>

                                                        <div class="reviews" style="border: solid 1px #000; padding-left: 2% ">
                                                            <div class="review">
                                                                <div class="review-title"><span class="summary"><?php echo htmlentities($row['4']); ?></span><span class="date"><i class="fa fa-calendar"></i><span><?php echo htmlentities($row['1']); ?></span></span>
                                                                </div>

                                                                <div class="text">"<?php echo htmlentities($row['5']); ?>"</div>
                                                                <div class="text"><b>Quality :</b>
                                                                    <?php echo htmlentities($row['2']); ?> Star</div>

                                                                <div class="author m-t-15"><i class="fa fa-pencil-square-o"></i>
                                                                    <span class="name"><?php echo htmlentities($row['3']); ?></span>
                                                                </div>
                                                            </div>

                                                        </div>
                                                    <?php } ?>
                                                </div>
                                                <form role="form" class="cnt-form" name="comment" method="post">


                                                    <div class="product-add-review">
                                                        <h4 class="title">Write your own review</h4>
                                                        <div class="review-table">
                                                            <div class="table-responsive">
                                                                <table class="table table-bordered">
                                                                    <thead>
                                                                        <tr>
                                                                            <th class="cell-label">&nbsp;</th>
                                                                            <th>1 star</th>
                                                                            <th>2 stars</th>
                                                                            <th>3 stars</th>
                                                                            <th>4 stars</th>
                                                                            <th>5 stars</th>
                                                                        </tr>
                                                                    </thead>
                                                                    <tbody>
                                                                        <tr>
                                                                            <td class="cell-label">RATING</td>
                                                                            <td><input type="radio" name="rating" class="radio" value="1"></td>
                                                                            <td><input type="radio" name="rating" class="radio" value="2"></td>
                                                                            <td><input type="radio" name="rating" class="radio" value="3"></td>
                                                                            <td><input type="radio" name="rating" class="radio" value="4"></td>
                                                                            <td><input type="radio" name="rating" class="radio" value="5"></td>
                                                                        </tr>


                                                                    </tbody>
                                                                </table>
                                                            </div>
                                                        </div>

                                                        <div class="review-form">
                                                            <div class="form-container">


                                                                <div class="row">
                                                                    <div class="col-sm-6">
                                                                        <div class="form-group">
                                                                            <label for="exampleInputName">YOUR NAME <span class="astk">*</span></label>
                                                                            <input type="text" class="form-control txt" id="exampleInputName" placeholder="" name="name" required="required">
                                                                        </div>
                                                                        <div class="form-group">
                                                                            <label for="exampleInputSummary">Summary <span class="astk">*</span></label>
                                                                            <input type="text" class="form-control txt" id="exampleInputSummary" placeholder="" name="summary" required="required">
                                                                        </div>
                                                                        <div class="form-group">
                                                                            <label for="exampleInputSummary">Date <span class="astk">*</span></label>
                                                                            <input type="date" class="form-control txt" id="exampleInputSummary" placeholder="" name="date" required="required">
                                                                        </div>
                                                                    </div>

                                                                    <div class="col-md-6">
                                                                        <div class="form-group">
                                                                            <label for="exampleInputReview">COMMENTS <span class="astk">*</span></label>

                                                                            <textarea class="form-control txt txt-review" id="exampleInputReview" rows="4" type="text" name="comment" required="required"></textarea>
                                                                        </div>
                                                                    </div>
                                                                </div>

                                                                <div class="action text-right">
                                                                    <button name="submit" class="btn btn-primary btn-upper">SUBMIT
                                                                        REVIEW</button>
                                                                </div>

                                                </form>
                                            </div>
                                        </div>

                                    </div>

                                </div>
                            </div>

                        </div>
                    </div>
            </div>
        </div>

    <?php } ?>

<?php
                        //$cid=$row['9'];
                    } ?>
<section class="section featured-product wow fadeInUp">
    <h3 class="section-title">Realted Products </h3>
    <div class="owl-carousel home-owl-carousel upsell-product custom-carousel owl-theme outer-top-xs">

        <?php
        $query = oci_parse($conn, " SELECT * FROM PRODUCT1 WHERE STATUS='ENABLE' AND PRODUCT_ID='$pid' ");
        $run = oci_execute($query);

        if ($run) {
            $fetch_row = oci_fetch_row($query);

            $ccid = $fetch_row['9'];
        }
        $stid = oci_parse($conn, " SELECT * FROM PRODUCT1 WHERE STATUS='ENABLE' AND CATEGORY_ID='$ccid' ");
        $result = oci_execute($stid);
        //echo $ccid." not shown";
        if ($result != false)
            while ($row = oci_fetch_row($stid)) {

        ?>

            <div class="item item-carousel">
                <div class="products">
                    <div class="product">
                        <div class="product-image">
                            <div class="image">
                                <a href="product-detail.php?pid=<?php echo htmlentities($row['0']); ?>"><img style="border-radius: 10px;" src="<?php echo htmlentities($row['8']); ?>" width="200" height="240" alt=""></a>
                            </div>


                        </div>


                        <div class="product-info text-left">
                            <h3 class="name"><a href="product-detail.php?pid=<?php echo htmlentities($row['0']); ?>"><?php echo htmlentities($row['1']); ?></a>
                            </h3>
                            <div class="rating rateit-small"></div>
                            <div class="description"></div>

                            <div class="product-price">
                                <span class="price">
                                    £.<?php echo htmlentities($row['3']); ?> </span>
                                <span class="price-before-discount">£.
                                    <?php echo htmlentities($row['4']); ?></span>

                            </div>

                        </div>
                        <div class="cart clearfix animate-effect">
                            <div class="action">
                                <ul class="list-unstyled">
                                    <li class="add-cart-button btn-group">

                                        <div>
                                            <form method="post">
                                                <input type="hidden" value="<?php echo $row['0'];; ?>" name="cart_item_id">
                                                <input type="hidden" value="<?php echo $_SESSION['USER_ID']; ?>" name="cart_customer_id">
                                                <div class=''>
                                                    <input style="color:red; border-radius:5px; margin-left:7px; width:100px;" type='number' value='1' min='1' max='10' name="quantity" />
                                                </div>
                                                <button class="btn p-3" type="submit" style="border-radius: 7px; background-color: #31A1D9; color:white;"><i class="fa fa-shopping-cart" aria-hidden="true"></i> ADD TO
                                                    CART</button>


                                            </form>
                                        </div>
                                    </li>


                                </ul>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        <?php } ?>


    </div>

</section>


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