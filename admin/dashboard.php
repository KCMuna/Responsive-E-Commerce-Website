<?php
include '../connect.php';

?>

<html>
  <head>

  <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Admin Panel</title>
    <link href="assets/css/bootstrap.css" rel="stylesheet" />
    <link href="assets/css/font-awesome.css" rel="stylesheet" />
    <link href="assets/css/custom.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
   <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css' />
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
      google.charts.load('current', {'packages':['corechart']});
      google.charts.setOnLoadCallback(drawChart);

      function drawChart() {

        var data = google.visualization.arrayToDataTable([
          ['GENDER', 'Number'],
         <?php
            $stid = oci_parse($conn, " SELECT * FROM USERS ");
            $result = oci_execute($stid);
        
            if ($result !=false)
         	while( $row= oci_fetch_row($stid))
             {
                 echo "['".$row["GENDER"]."',".$row["number"]."],";
             }

         ?>
        ]);

        var options = {
          title: 'My Daily Activities'
        };

        var chart = new google.visualization.PieChart(document.getElementById('piechart'));

        chart.draw(data, options);
      }
    </script>
  </head>
  <body>

  <div id="wrapper">
        <nav class="navbar navbar-default navbar-cls-top "style=" margin-bottom: 0; background:#000000;" role="navigation">
            <div class="navbar-header">
                <a href="index.php"><img src="assets/img/logo.png" class="user-image img-responsive"/></a>
            </div>
            <div class="">
               
                <ul>
                    <li style="list-style: none; float:right; margin-right:50px; margin-top: 60px; font-weight:bolder">
                        <li style="text-align: center; color: rgb(250, 244, 244);font-family:Arial, Helvetica, sans-serif; font-size: 25px; font-weight: bold;list-style: none;"> Welcome To the INNOVATIVE GROCERY's Admin Panel</li>
                        <a  href="adminprofile.php" style="float: left; margin-left: 1250px; "><i style="font-size:20px ; float: left; margin-right: 2px; " class="fa">&#xf2bd;</i>Admin Profile</a>
                    </li>
                </ul>
            </div>
           
                    </nav>   
                <nav class="navbar-default navbar-side" role="navigation">
            <div class="sidebar-collapse">
                <ul class="nav" id="main-menu">
				    <li class="text-center">
                   
					</li>
					
                    <li>
                        <a  href="index.php"><i class="fa fa-dashboard fa-3x"></i> Dashboard</a>
                    </li>
                    <li>
                        <a  href="productlist.php"><i></i>Product</a>
                    </li>
                    <li>
                        <a  href="review.php"><i></i> Review</a>
                    </li>
                    
                    <li>
                        <a><i></i>Report<span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level">
                            <li>
                                <a href="dailyreport.html">Daily Report</a>
                            </li>
                            <li>
                                <a href="periodicreport.html">Periodic Report</a>
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
                  <li  >
                        <a   href="#"><i></i>Logout</a>
                    </li>	
                </ul>
               
            </div>
            
        </nav>  
        <div id="page-wrapper" >
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

                              <div class="row" style=" text-align: center; margin-top: 50px;">

                              <div id="piechart" style="width: 500px; height: 300px; margin-left:500px;margin-top:200px;"></div>

                                <div class="col-lg-3 col-xs-6">
                                  <div class="small-box" style="background-color: rgb(111, 180, 245); width: 270px;height: 150px;border-radius: 5px; margin-top: 10px;">
                                    <div class="inner">

                                      <p style="margin-left: 10px;">Total Sales</p>
                                    </div>
                                    <input type="number" name="fname" style="height: 40px; width: 80px;"><br>                                 
                                 </div>
                                </div>
                                <div class="col-lg-3 col-xs-6">
                                  <div class="small-box" style="background-color: rgb(149, 241, 131); width: 270px;height: 150px;;border-radius: 5px;  margin-top: 10px;">
                                    <div class="inner">
                                      <p style="margin-left: 10px;">Number of Products</p>
                                    </div>
                                    
                                    <input type="number" name="fname"  style="height: 40px; width: 80px;"><br>                                
                                  </div>
                                </div>
                                <div class="col-lg-3 col-xs-6">
                                  <div class="small-box" style="background-color: rgb(245, 247, 130); width: 270px;height: 150px;border-radius: 5px; margin-top: 10px;">
                                    <div class="inner">
                                      <p style="margin-left: 10px;">Number of Users</p>
                                    </div>
                                   
                                    <input type="number" name="fname"  style="height: 40px; width: 80px;"><br>                                 
                                 </div>
                                </div>
                                <div class="col-lg-3 col-xs-6">
                                  <div class="small-box" style="background-color: rgb(247, 125, 121); width: 270px;height: 150px;border-radius: 5px;  margin-top: 10px;">
                                    <div class="inner">
                        
                                      <p style="margin-left: 10px;">Sales Today</p>
                                    </div>
                                   
                                    <input type="number" name="fname" style="height: 40px; width: 80px;"><br>                                 
                                 </div>
                                </div>

                              </div>
                              </section>


                            </div>
                        
                        </div>                       
                    </div>
                </div>           
    </div>
            
            </div>
        </div>



    
  </body>
</html>
