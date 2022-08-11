<?php
session_start();
include '../connect.php';


if (!($_SESSION['role']) && $_SESSION['role'] != "trader") {
    header('location:login.php');
}

if (isset($_GET['editproduct'])) {

    $pid = $_GET['editproduct'];
}

if (isset($_POST['editproduct'])) {
    $name = $_POST['productname'];
    $desc = $_POST['description'];
    $pri = $_POST['price'];
    $avi = $_POST['availability'];
    $max = $_POST['maximum'];
    $min = $_POST['minimum'];
    $dis = $_POST['discount'];
    $cat = $_POST['category'];

    $query = oci_parse($conn, " UPDATE PRODUCT1 SET PRODUCT_NAME='$name',DESCRIPTION='$desc',PRICE='$pri',AVAILABILITY='$avi',MAX_ORDER='$max',MIN_ORDER='$min',CATEGORY_ID='$cat' WHERE PRODUCT_ID='$pid'");
    $result = oci_execute($query);
    echo "<script>alert('Product Updated!!');</script>";
    //header('location:productlist.php');

}


$stid = oci_parse($conn, " SELECT * FROM PRODUCT1 WHERE PRODUCT_ID='$pid' ");
$result = oci_execute($stid);
$data = oci_fetch_assoc($stid);

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link href="assets/css/bootstrap.css" rel="stylesheet" />
    <link href="assets/css/font-awesome.css" rel="stylesheet" />
    <link href="assets/css/custom.css" rel="stylesheet" />
    <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css' />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="shortcut icon" href="../image/logo_innovative_grocery.png">

    <title>Edit Product</title>
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
                                <a href="order-report.php">Periodic Report</a>
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
                            <h6 style="text-align: center; font-family:-apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif; font-style:inherit; color: rgb(43, 76, 88);font-size:xx-large;">
                                Update Product
                            </h6>
                            <form action="" method="POST">
                                <div class="container">
                                    <div class="row text-center" style="margin-top: 50px;">

                                        <div class=" col-sm-6">
                                            <!-- <input type='hidden' name='id' value = "PRODUCT_ID"/> -->
                                            <div class="form-group">
                                                <label for="description">PHOTO</label><br>
                                                <img src="../<?php echo $data['PRODUCT_IMAGE']; ?>" width="50">

                                            </div>
                                            <div class="form-group">
                                                <label class="labelname">NAME:</label><br>
                                                <input type="text" name="productname" value="<?php echo $data['PRODUCT_NAME'] ?>">
                                            </div>

                                            <div class="form-group">
                                                <label class="price">DESCRIPTION:</label><br>
                                                <input type="text" name="description" value="<?php echo $data['DESCRIPTION'] ?>">
                                            </div>

                                            <div class="form-group">
                                                <label class="discount" name="discount">PRICE:</label><br>
                                                <input type="number" name="price" value="<?php echo $data['PRICE'] ?>">
                                            </div>
                                            <div class="form-group">
                                                <label class="category">DISCOUNT:</label><br>
                                                <input type="number" name="discount" value="<?php echo $data['DISCOUNT'] ?>">
                                            </div>


                                        </div>

                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <label class="category" name="category">CATEGORY:</label><br>
                                                <input type="number" name="category" value="<?php echo $data['CATEGORY_ID'] ?>">
                                            </div>
                                            <div class="form-group">
                                                <label for="image1">AVAILABILITY:</label><br>
                                                <input type="text" name="availability" value="<?php echo $data['AVAILABILITY'] ?>">
                                            </div>
                                            <div class="form-group">
                                                <label class="maxorder" name="maxorder">MAX ORDER:</label><br>
                                                <input type="number" name="maximum" value="<?php echo $data['MAX_ORDER'] ?>">
                                            </div>

                                            <div class="form-group">
                                                <label class="minorder" name="minorder">MIN ORDER</label><br>
                                                <input type="number" name="minimum" value="<?php echo $data['MIN_ORDER'] ?>">
                                            </div>

                                        </div>

                                    </div>
                                    <div class="text-center">

                                        <input type="submit" name="editproduct" value="UPDATE PRODUCT">
                                    </div>
                            </form>
                            <script src="assets/js/jquery-1.10.2.js"></script>
                            <script src="assets/js/bootstrap.min.js"></script>
                            <script src="assets/js/jquery.metisMenu.js"></script>
                            <script src="assets/js/custom.js"></script>

                            </form>
                        </div>
                    </div>
                </div>


            </div>
        </div>
    </div>

    </div>
    </div>
</body>

</html>