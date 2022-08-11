<?php
session_start();
include '../connect.php';
if (!($_SESSION['role']) && $_SESSION['role'] != "trader") {
    header('location:login.php');
}

if (isset($_GET['addpro'])) {
    $proid = $_GET['addpro'];
}

?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Add Product</title>
    <link href="assets/css/bootstrap.css" rel="stylesheet" />
    <link href="assets/css/font-awesome.css" rel="stylesheet" />
    <link href="assets/css/custom.css" rel="stylesheet" />
    <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css' />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="shortcut icon" href="../image/logo_innovative_grocery.png">

</head>

<body style="font-family: 'Open Sans', sans-serif;overflow: hidden;">
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
                            <h6 style="text-align: center; font-family:-apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif; font-style:inherit; color: rgb(43, 76, 88);font-size:xx-large;">
                                Add Product
                            </h6>
                            <form method="POST" action="process.php?addpro=<?php echo $proid ?>" enctype="multipart/form-data" style=" text-align: center;">
                                <div class="container">
                                    <div class="row">
                                        <div class=" col-sm-6">
                                            <!-- <input type='hidden' name='id' value = "PRODUCT_ID"/> -->
                                            <div class="form-group">
                                                <label class="labelname">Product Name:</label><br>
                                                <input class="productname" class="form-control" type="text" name="productname"><br>
                                            </div>

                                            <div class="form-group">
                                                <label class="price">Price:</label><br>
                                                <input class="price" class="form-control" type="number" name="price"><br>
                                            </div>

                                            <div class="form-group">
                                                <label class="discount" name="discount">Discount:</label><br>
                                                <input class="productdiscount" type="number" name="discount"><br>
                                            </div>
                                            <div class="form-group">
                                                <label class="category">Select Category:</label><br>

                                                <select name="catid" style="height: 40px; width: 210px;">
                                                    <option value="">Choose Category</option>
                                                    <?php

                                                    $sql = oci_parse($conn, "SELECT * FROM CATEGORY ");
                                                    $result = oci_execute($sql);
                                                    if ($result) {
                                                        while ($row = oci_fetch_assoc($sql)) {
                                                    ?>
                                                            <option value="<?php echo $row['CATEGORY_ID'] ?>"><?php echo $row['CATEGORY_NAME'] ?></option>
                                                    <?php
                                                        }
                                                    } ?>

                                                </select>
                                            </div>
                                            <div class="form-group">
                                                <label for="image1">Picture</label><br>
                                                <input type="file" name="profile" id="photo" style="margin-left: 190px;"><br>
                                            </div>

                                        </div>

                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <label class="availability" name="Availability">Available_Quantity:</label><br>
                                                <input class="availability" type="number" name="availability"><br>
                                            </div>
                                            <div class="form-group">
                                                <label class="maxorder" name="maxorder">Max_Order:</label><br>
                                                <input class="maxorder" type="number" name="maxorder"><br>
                                            </div>
                                            <div class="form-group">
                                                <label class="minorder" name="minorder">Min_Order:</label><br>
                                                <input class="productminorder" type="number" name="minorder"><br>
                                            </div>
                                            <div class="form-group">
                                                <label for="description">Description</label><br>
                                                <textarea name="description" type="text" id="" cols="30" rows="5"></textarea>
                                            </div>

                                        </div>
                                    </div>
                                    <div class="text-center">
                                    </div>

                                </div>
                                <a href="#"><input type="submit" name="addproduct" value="ADD PRODUCT" style="margin-left: 470px; background:#B1E58B;" class="btn btn-add-product"></a>

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