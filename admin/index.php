<?php
session_start();
include '../connect.php';

if (!($_SESSION['role']) && $_SESSION['role'] != "admin") {
  header('location:adminlogin.php');
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
  <link rel="shortcut icon" href="../image/logo_innovative_grocery.png">

  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css' />
  <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
  <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>

  <script type="text/javascript">
    google.charts.load('current', {
      'packages': ['corechart']
    });
    google.charts.setOnLoadCallback(drawChart);

    function drawChart() {

      var data = google.visualization.arrayToDataTable([
        ['SHOP', 'Number Of Products'],

        <?php

        $query = oci_parse($conn, "SELECT * FROM SHOP WHERE STATUS='ENABLE'");
        $run = oci_execute($query);

        if ($run) {
          while ($row = oci_fetch_row($query)) {

            $shop = $row['0'];

            $q = oci_parse($conn, "SELECT * FROM PRODUCT1 WHERE SHOP_ID='$shop' AND STATUS='ENABLE'");
            $w = oci_execute($q);

            if ($w) {
              $count = 0;
              while ($fetch = oci_fetch_row($q)) {
                $count++;
              }
            }

        ?>

            ['<?php echo $row['1']; ?>', <?php echo $count; ?>],

        <?php }
        }
        ?>['Others', 0]
      ]);

      var options = {
        title: 'SHOP AND NUMBER OF PRODUCTS',
        titleTextStyle: {
          color: '#000'
        },
        legend: {
          textStyle: {
            color: 'black'
          }
        }
      };


      var chart = new google.visualization.PieChart(document.getElementById('piechart'));

      chart.draw(data, options);
    }
  </script>
</head>

<body style="font-family: 'Open Sans', sans-serif;">
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
            <a href="http://localhost:8080/apex/f?p=107"><i class="fa fa-dashboard fa-3x"></i> ORACLE DASHBOARD</a>
          </li>
          <li>
            <a href="productlist.php"><i></i>Product</a>
          </li>
          <li>
            <a href="req-product.php"><i></i>Requested Products</a>
          </li>
          <li>
            <a href="tradershop.php"><i class="fas fa-store"></i>Shops</a>
          </li>
          <li>
            <a href="shop-req.php"><i></i>Requested Shop</a>
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

            <div class="content-wrapper">
              <section class="content-header">
                <h6 style="text-align: center; font-family:-apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif; font-style:inherit; color: rgb(43, 76, 88); font-size:xx-large;">
                  Dashboard
                </h6>
              </section>
              <section class="content">
                <div class="row" style=" text-align: center; margin-top: 20px;">
                  <div class="col-lg-3 col-xs-6">
                    <div id="piechart" style="width: 900px; height: 350px;"></div>
                  </div>
                  <div class="col-lg-3 col-xs-6">
                    <div id="columnchart_values" style="width: 800px; height: 300px; margin-left:350px;"></div>
                  </div>

                </div>
                <div class="row" style=" text-align: center; margin-top: 20px;">


                </div>
              </section>
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