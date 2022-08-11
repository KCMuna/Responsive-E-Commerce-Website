<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
      <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Admin Panel</title>
    <link href="assets/css/bootstrap.css" rel="stylesheet" />
    <link href="assets/css/font-awesome.css" rel="stylesheet" />
    <link href="assets/css/custom.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
   <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css' />
</head>
<body style="font-family: 'Open Sans', sans-serif;overflow: hidden;">
    <div id="wrapper">
        <nav class="navbar navbar-default navbar-cls-top "style=" margin-bottom: 0; background:#000000;" role="navigation">
            <div class="navbar-header">
                <a href="index.html"><img src="assets/img/logo.png" class="user-image img-responsive"/></a>
            </div>
            <div class="">
               
                <ul>
                    <li style="list-style: none; float:right; margin-right:50px; margin-top: 60px; font-weight:bolder">
                        <li style="text-align: center; color: rgb(250, 244, 244);font-family:Arial, Helvetica, sans-serif; font-size: 25px; font-weight: bold; list-style: none;"> Welcome To the INNOVATIVE GROCERY's Admin Panel</li>
                        <a  href="adminprofile.html" style="float: left; margin-left: 1250px; "><i style="font-size:20px ; float: left; margin-right: 2px; " class="fa">&#xf2bd;</i>Admin Profile</a>
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
                        <a  href="index.html"><i class="fa fa-dashboard fa-3x"></i> Dashboard</a>
                    </li>
                    <li>
                        <a  href="productlist.html"><i></i>Product</a>
                    </li>
                    <li>
                        <a  href="review.html"><i></i> Review</a>
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
                                <a href="Traderlist.html">Trader</a>
                            </li>
                            <li>
                                <a href="trader-req.php">Trader Requests</a>
                            </li>
                            <li>
                                <a href="Customerlist.html">Customer</a>
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
                     
                        <div class="add-product main-parts mt-2">
                            <h6 style="text-align: center; font-family:-apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif; font-style:inherit; color: rgb(43, 76, 88); font-size:xx-large;">
                               Add Trader</h6>
                                <form method="POST" action="process.php" enctype="multipart/form-data" style=" text-align: center;">
                                    <div class="container">
                                        <div class="row">
                                            <div class=" col-sm-4">
                                                <div class="form-group" style="margin-top: 50px;">
                                                    <label class="fname">First Name:</label><br>
                                                    <input class="fname" class="form-control" type="text" name="fname"><br>
                                                </div>
                                              
                                                <div class="form-group">
                                                    <label class="age" name="pass">Age:</label><br>
                                                    <input class="age" type="number" name="age"><br>
                                                </div> 
                                                <div class="form-group">
                                                    <label class="phone" name="pass">Phone:</label><br>
                                                    <input class="phone" type="number" name="phone"><br>
                                                </div> 
                                                <div class="form-group">
                                                    <label class="address" name="addr">Address:</label><br>
                                                    <input class="address" type="text" name="address"><br>
                                                </div>

                                            </div>
                                                
                                            <div class="col-sm-8">
                                                
                                                <div class="form-group" style="margin-top: 50px;">
                                                    <label class="lname">Last Name:</label><br>
                                                    <input class="lname" class="form-control" type="text" name="lname"><br>
                                                </div>
                                                
                                                <div class="form-group">
                                                    <label class="gender" name="discount">Gender:</label><br>
                                                    <input class="gender" type="text" name="gender"><br>
                                                </div>
            
                                                <div class="form-group">
                                                    <label class="email" name="email">Email:</label><br>
                                                    <input class="email" type="email" name="email"><br>
                                                </div>
                                                <div class="form-group">
                                                    <label class="pass" name="pass">Password:</label><br>
                                                    <input class="pass" type="number" name="password"><br>
                                                </div>
                                            </div>
                                        </div>	
                                        <div class="text-center">
                                            <a href="#"><input type="submit" name="addcustomer" value="ADD CUSTOMER" class="btn btn-add-product" style="margin-top: 80px; margin-right: 130px;"></a>
                                        </div>
                                    
                                    </div>                    
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
