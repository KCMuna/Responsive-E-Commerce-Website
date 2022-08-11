<?php
session_start();
include 'connect.php';



if (isset($_GET['checking'])) {
    $sub_total_price = $_GET['checking'];
    // $currentuserid=$_GET['customer'];
    $currentuserid = $_SESSION['USER_ID'];
}
//echo $currentuserid;
//echo $_SESSION['USER_ID'];
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Meta -->
    <meta charset="utf-8">
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <meta name="keywords" content="MediaCenter, Template, eCommerce">
    <meta name="robots" content="all">

    <title>Proceed To Checkout</title>
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/main.css">
    <link rel="stylesheet" href="assets/css/green.css">
    <link rel="stylesheet" href="assets/css/owl.carousel.css">
    <link rel="stylesheet" href="assets/css/owl.transitions.css">
    <!--<link rel="stylesheet" href="assets/css/owl.theme.css">-->
    <link href="assets/css/lightbox.css" rel="stylesheet">
    <link rel="stylesheet" href="assets/css/animate.min.css">
    <link rel="stylesheet" href="assets/css/rateit.css">
    <link rel="stylesheet" href="assets/css/bootstrap-select.min.css">

    <!-- Demo Purpose Only. Should be removed in production -->
    <link rel="stylesheet" href="assets/css/config.css">

    <link href="assets/css/green.css" rel="alternate stylesheet" title="Green color">
    <link href="assets/css/blue.css" rel="alternate stylesheet" title="Blue color">
    <link href="assets/css/red.css" rel="alternate stylesheet" title="Red color">
    <link href="assets/css/orange.css" rel="alternate stylesheet" title="Orange color">
    <link href="assets/css/dark-green.css" rel="alternate stylesheet" title="Darkgreen color">
    <!-- Demo Purpose Only. Should be removed in production : END -->

    <!-- Icons/Glyphs -->
    <link rel="stylesheet" href="assets/css/font-awesome.min.css">

    <!-- Fonts -->
    <link href='http://fonts.googleapis.com/css?family=Roboto:300,400,500,700' rel='stylesheet' type='text/css'>

    <!-- Icon -->
    <link rel="shortcut icon" href="image/logo_innovative_grocery.png">


</head>

<body class="cnt-home">

    <header class="header-style-1">

        <?php include('user-info.php'); ?>

        <?php include('main-header.php'); ?>

        <?php include('menu-bar.php'); ?>


        <main style="margin-top: 5vh;">
            <div class='container-fluid'>
                <div class='row justify-content-center'>
                    <div class='col-lg-12 px-4 pb-4' id='order'>
                        <h4 class='text-center text-info p-2'>PLACE AND ORDER!</h4>
                        <div class='jumbotron p-3 mb-2 text-center' style='background-color:#C9F1F5; backdrop-filter: blur(40px);
 border-radius:20px;'>

                            <h6 class='lead'><b>YOUR PRODUCT LIST:</b></h6>


                            <hr>

                            <table class="table table-dark">
                                <thead>
                                    <tr>
                                        <th scope="col">Id</th>
                                        <th scope="col">Product Name</th>
                                        <th scope="col">Price</th>
                                        <th scope="col">Quantity</th>
                                    </tr>
                                </thead>

                                <?php

                                echo $currentuserid;
                                $qu = "SELECT * FROM CART WHERE USER_ID='$currentuserid'";
                                $resss = oci_parse($conn, $qu);
                                oci_execute($resss);

                                $total_quantity = 0;
                                while ($item = oci_fetch_assoc($resss)) {
                                    $productid = $item['PRODUCT_ID'];
                                    $product_quantity = $item['ITEMS'];

                                    $select_query = "SELECT * FROM PRODUCT1 WHERE PRODUCT_ID='$productid'";
                                    $cart_showing = oci_parse($conn, $select_query);
                                    oci_execute($cart_showing);

                                    if (($row = oci_fetch_assoc($cart_showing)) == true) {
                                        $productid = $row['PRODUCT_ID'];
                                        $productname = $row['PRODUCT_NAME'];
                                        $variable = $row['PRICE'];

                                        if (isset($variable)) {

                                            $de = $product_quantity;
                                        } else {

                                            $de =  $product_quantity;
                                        }

                                        $total_quantity += $de;

                                        echo   "
<tbody>
  <tr>
    <th scope='row'>$productid</th>
    <td>$productname</td>
    <td>$variable</td>
    <td>$product_quantity</td>
  </tr>
</tbody>
";
                                    }
                                }

                                ?>

                            </table>

                            <div class="m-6" style="background-color:#F5C9D9; border-radius:8px;">

                                <strong>TOTAL AMOUNT TO PAY : &#163;<?php echo $sub_total_price; ?></strong> <br><br>
                                <strong>TOTAL QUANTITY YOU HAVE: <?php echo $total_quantity; ?></strong><br>
                                <hr>


                                <form action="payment.php" method="POST">
                                    <h6 class="text-center lead"><b>CHOOSE COLLECTION SLOT:</b></h6>
                                    <div class="form-group">
                                        <select name="day" class="form-control">

                                            <?php

                                            // Prints the day
                                            $today = date("l");

                                            $time = date("H"); //the current time in 24 hr format
                                            if ($today == 'Friday') {
                                                echo "<option value='NEXT WEDNESDAY' selected>Next Wednesday</option>";
                                                echo "<option value='NEXT THURSDAY'>Next Thursday</option>";
                                                echo "<option value='NEXT FRIDAY'>Next Friday</option>";
                                            } elseif ($today == 'Thursday' && $time >= 19) {
                                                echo "<option value='NEXT WEDNESDAY' selected>Next Wednesday</option>";
                                                echo "<option value='NEXT THURSDAY'>Next Thursday</option>";
                                                echo "<option value='NEXT FRIDAY'>Next Friday</option>";
                                            } elseif ($today == 'Thursday' && $time < 19) {
                                                echo "<option value='NEXT WEDNESDAY' selected>Next Wednesday</option>";
                                                echo "<option value='NEXT THURSDAY'>Next Thurday</option>";
                                                echo "<option value='FRIDAY'> Friday</option>";
                                            } elseif ($today == 'Wednesday' && ($time >= 19)) {
                                                echo "<option value='NEXT WEDNESDAY' selected>Next Wednesday</option>";
                                                echo "<option value='NEXT THURSDAY'>Next Thursday</option>";
                                                echo "<option value='FRIDAY'>Friday</option>";
                                            } elseif ($today == 'Wednesday' && $time < 19) {
                                                echo "<option value='NEXT WEDNESDAY' selected>Next Wednesday</option>";
                                                echo "<option value='THURSDAY'> Thursday</option>";
                                                echo "<option value='FRIDAY'>Friday</option>";
                                            } elseif ($today == 'Tuesday' && $time >= 19) {
                                                echo "<option value='NEXT WEDNESDAY' selected>Next Wednesday</option>";
                                                echo "<option value='THURSDAY'>Thursday</option>";
                                                echo "<option value='FRIDAY'>Friday</option>";
                                            } elseif ($today == 'Tuesday' && $time < 19) {

                                                echo "<option value='WEDNESDAY' selected> Wednesday</option>";
                                                echo "<option value='THURSDAY'>Thursday</option>";
                                                echo "<option value='FRIDAY'>Friday</option>";
                                            } else {
                                                echo "<option value='WEDNESDAY' selected> Wednesday</option>";
                                                echo "<option value='THURSDAY'>Thursday</option>";
                                                echo "<option value='FRIDAY'>Friday</option>";
                                            }




                                            ?>


                                        </select>
                                    </div><br>
                                    <div class="form-group">
                                        <select name="hour" class="form-control">
                                            <?php
                                            $dayselected = $_POST['day'];
                                            //echo $dayselected;
                                            $time = date("H");

                                            if ($today == 'Friday') {
                                                echo "<option value='10AM to 1PM'> 10AM to 1PM </option>";
                                                echo "<option value='1PM to 4PM'>1PM to 4PM</option>";
                                                echo "<option value='4PM to 7PM'>4PM to 7PM</option>";
                                            } //inside friday
                                            elseif ($today == 'Tuesday') {
                                                if ($time >= 19) {
                                                    echo "<option value='10AM to 1PM'> 10AM to 1PM </option>";
                                                    echo "<option value='4PM to 7PM'>4PM to 7PM</option>";
                                                } elseif ($time < 10) {
                                                    echo "<option value='10AM to 1PM'> 10AM to 1PM </option>";
                                                    echo "<option value='1PM to 4PM'>1PM to 4PM</option>";
                                                    echo "<option value='4PM to 7PM'>4PM to 7PM</option>";
                                                } elseif (($time >= 13 || $time <= 15) && $dayselected == 'wed') {
                                                    echo "<option disabled value='10AM to 1PM'> 10AM to 1PM </option>";
                                                    echo "<option value='1PM to 4PM'>1PM to 4PM</option>";
                                                    echo "<option value='4PM to 7PM'>4PM to 7PM</option>";
                                                } elseif (($time >= 16 || $time <= 18) && $dayselected == 'wed') {
                                                    echo "<option disabled value='10AM to 1PM'> 10AM to 1PM </option>";
                                                    echo "<option disabled value='1PM to 4PM'>1PM to 4PM</option>";
                                                    echo "<option value='4PM to 7PM'>4PM to 7PM</option>";
                                                } else {
                                                    echo "<option value='10AM to 1PM'> 10AM to 1PM </option>";
                                                    echo "<option value='1PM to 4PM'>1PM to 4PM</option>";
                                                    echo "<option value='4PM to 7PM'>4PM to 7PM</option>";
                                                }
                                            } //inside tuesday
                                            elseif ($today == 'Wednesday') {
                                                if ($time >= 19) {
                                                    echo "<option value='10AM to 1PM'> 10AM to 1PM </option>";
                                                    echo "<option value='1PM to 4PM'>1PM to 4PM</option>";
                                                    echo "<option value='4PM to 7PM'>4PM to 7PM</option>";
                                                } elseif ($time < 10) {
                                                    echo "<option value='10AM to 1PM'> 10AM to 1PM </option>";
                                                    echo "<option value='1PM to 4PM'>1PM to 4PM</option>";
                                                    echo "<option value='4PM to 7PM'>4PM to 7PM</option>";
                                                } elseif (($time >= 13 || $time <= 15) && $dayselected == 'thu') {
                                                    echo "<option disabled value='10AM to 1PM'> 10AM to 1PM </option>";
                                                    echo "<option value='1PM to 4PM'>1PM to 4PM</option>";
                                                    echo "<option value='4PM to 7PM'>4PM to 7PM</option>";
                                                } elseif (($time >= 16 || $time <= 18) && $dayselected == 'thu') {
                                                    echo "<option disabled value='10AM to 1PM'> 10AM to 1PM </option>";
                                                    echo "<option disabled value='1PM to 4PM'>1PM to 4PM</option>";
                                                    echo "<option value='4PM to 7PM'>4PM to 7PM</option>";
                                                } else {
                                                    echo "<option value='10AM to 1PM'> 10AM to 1PM </option>";
                                                    echo "<option value='1PM to 4PM'>1PM to 4PM</option>";
                                                    echo "<option value='4PM to 7PM'>4PM to 7PM</option>";
                                                }
                                            } //inside wednesday
                                            elseif ($today == 'Thursday') {
                                                if ($time >= 19) {
                                                    echo "<option value='10AM to 1PM'> 10AM to 1PM </option>";
                                                    echo "<option value='1PM to 4PM'>1PM to 4PM</option>";
                                                    echo "<option value='4PM to 7PM'>4PM to 7PM</option>";
                                                } elseif ($time < 10) {
                                                    echo "<option value='10AM to 1PM'> 10AM to 1PM </option>";
                                                    echo "<option value='1PM to 4PM'>1PM to 4PM</option>";
                                                    echo "<option value='4PM to 7PM'>4PM to 7PM</option>";
                                                } elseif (($time >= 13 || $time <= 15) && $dayselected == 'fri') {
                                                    echo "<option disabled value='10AM to 1PM'> 10AM to 1PM </option>";
                                                    echo "<option value='1PM to 4PM'>1PM to 4PM</option>";
                                                    echo "<option value='4PM to 7PM'>4PM to 7PM</option>";
                                                } elseif (($time >= 16 || $time <= 18) && $dayselected == 'fri') {
                                                    echo "<option disabled value='10AM to 1PM'> 10AM to 1PM </option>";
                                                    echo "<option disabled value='1PM to 4PM'>1PM to 4PM</option>";
                                                    echo "<option value='4PM to 7PM'>4PM to 7PM</option>";
                                                } else {
                                                    echo "<option value='10AM to 1PM'> 10AM to 1PM </option>";
                                                    echo "<option value='1PM to 4PM'>1PM to 4PM</option>";
                                                    echo "<option value='4PM to 7PM'>4PM to 7PM</option>";
                                                }
                                            } //thursday
                                            else {
                                                echo "<option value='10AM to 1PM'> 10AM to 1PM </option>";
                                                echo "<option value='1PM to 4PM'>1PM to 4PM</option>";
                                                echo "<option value='4PM to 7PM'>4PM to 7PM</option>";
                                            }

                                            ?>

                                        </select>
                                    </div><br>

                                    <input type="hidden" name="totalprice" value="<?php echo $totalamount; ?>">
                                    <input type="hidden" name="items" value="<?php echo $total_quantity; ?>">
                                    <input type="hidden" name="user" value="<?php echo $currentuserid; ?>">

                                    <input type="hidden" name="payment" value="<?php echo $sub_total_price; ?>">
                                    <input type="submit" value="PAYMENT">

                                </form>
                            </div>

                        </div>
        </main>
        <?php include('footer.php'); ?>


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