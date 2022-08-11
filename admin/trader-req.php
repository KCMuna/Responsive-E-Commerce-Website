<?php
session_start();
error_reporting(0);
include '../connect.php';


if (isset($_GET['tapprove'])) {

    $tapp = $_GET['tapprove'];



    function rand_string($len)
    {
        $ran = "Trader@123";
        return substr(str_shuffle($ran), 0, $len);
    }

    $pass =  rand_string(10);

    $hash = md5($pass);
    $query = oci_parse($conn, " UPDATE TRADER SET STATUS ='ENABLE' WHERE TRADER_ID='$tapp'");
    $result = oci_execute($query);
    if ($result) {

        $to = $email;
        $sub = "Verification";
        $msg = "HELLO" . $fname . ",\n\n CONGRULATIONS!!! YOUR ACCOUNT HAS BEEN APPROVED.";
        $msg .= "\n\n USERNAME:" . $username . "\n PASSWORD:" . $pass;
        $head = "From: INNOVATIVE GROCERY";
        $mail = mail($to, $sub, $msg, $head);
        echo "<script>alert('TRADER APPROVED!!');</script>";
        //header('location:index.php');
    } else {
        echo "Error !";
        exit();
    }
}


if (isset($_GET['tremove'])) {

    $trdel = $_GET['tremove'];
}

$sql = oci_parse($conn, " DELETE FROM TRADER WHERE TRADER_ID='$trdel'");
$res = oci_execute($sql);

if ($res) {
    //echo "<script>alert('SHOP DELETED!!');</script>";
    // header('location:tradershop.php');
} else {
    echo "Error !";
    exit();
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
    <link rel="shortcut icon" href="../image/logo_innovative_grocery.png">

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
                        <a href="req-product.php"><i></i>Requested Product</a>
                    </li>
                    <li>
                        <a href="review.php"><i></i> Review</a>
                    </li>

                    <li>
                        <a><i></i>Report<span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level">

                            <li>
                                <a href="periodicreport.php">Trader Income Report</a>
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

                </ul>

            </div>

        </nav>
        <div id="page-wrapper">
            <div id="page-inner">
                <div class="row">
                    <div class="col-md-12">

                        <div class="add-product main-parts mt-2">
                            <h6 style="text-align: center; font-family:-apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif; font-style:inherit; color: rgb(43, 76, 88); font-size:xx-large;">
                                TRADER REQUESTS
                            </h6>
                            <table class="table text-center mt-1 table bordered">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>FIRST NAME </th>
                                        <th>LAST NAME</th>
                                        <th>TYPE</th>
                                        <th>EMAIL</th>
                                        <th>GENDER</th>
                                        <th>USERNAME REQUEST</th>
                                        <th>DESCRIPTION</th>
                                        <th>ACTION</th>


                                    </tr>
                                </thead>
                                <tbody>
                                    <?php

                                    $sql = oci_parse($conn, "SELECT * from TRADER WHERE STATUS='DISABLE'");
                                    $result = oci_execute($sql);

                                    if ($result != false)
                                        while ($data = oci_fetch_assoc($sql)) { ?>
                                        <tr>
                                            <!--   <form method="POST" enctype="multipart/form-data"> -->

                                            <td><?php echo $data['TRADER_ID'] ?></td>
                                            <td><?php echo $data['TRADER_FNAME'] ?></td>
                                            <td><?php echo $data['TRADER_LNAME'] ?></td>
                                            <td><?php echo $data['TRADER_TYPE'] ?></td>
                                            <td><?php echo $data['EMAIL'] ?></td>
                                            <td><?php echo $data['GENDER'] ?></td>
                                            <td><?php echo $data['USERNAME'] ?></td>
                                            <td><?php echo $data['DESCRIPTION'] ?></td>


                                            <td> <a href="trader-req.php?tapprove=<?php echo $data['TRADER_ID']; ?>" onClick="edit(this);" title="Edit"><i class="fa fa-check-circle" style="font-size:30px;color:green;"></i> </a>
                                                <a href="trader-req.php?tremove=<?php echo $data['TRADER_ID']; ?>" onClick="del(this);" title="Delete"><i class="fa fa-trash" style="font-size:30px;color:red;"></i> </a>
                                            </td>

                                            <!-- </form> -->
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