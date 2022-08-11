<?php
session_start();
include '../connect.php';

if(!($_SESSION['role']) && $_SESSION['role'] !="trader")
{
    header('location:login.php');
}

?>

<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
      <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Trader Panel</title>
    <link href="assets/css/bootstrap.css" rel="stylesheet" />
    <link href="assets/css/font-awesome.css" rel="stylesheet" />
    <link href="assets/css/custom.css" rel="stylesheet" />
   <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css' />
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
   
</head>
<body style="font-family: 'Open Sans', sans-serif;overflow: hidden;">
    <div id="wrapper">
    <?php include('top-hav.php');?> 
  
                <nav class="navbar-default navbar-side" role="navigation">
                    <div class="sidebar-collapse">
                        <ul class="nav" id="main-menu">
                            <li class="text-center">
                           
                            </li>
                            
                            <li>
                                <a  href="index.php"><i class="fa fa-dashboard fa-3x"></i> Dashboard</a>
                            </li>
                            <li>
                                <a  href="shop.php"><i></i>My Shop</a>
                            </li>
                            <li>
                                <a  href="orderlist.php"><i></i>Order Detail</a>
                            </li>
                            <li>
                                <a  href="Customerlist.php"><i></i>Customer Detail</a>
                            </li>
            
                            <li>
                                <a><i></i>Report<span class="fa arrow"></span></a>
                                <ul class="nav nav-second-level">
                                    <li>
                                        <a href="dailyreport.php">Daily Report</a>
                                    </li>
                                    <li>
                                        <a href="periodicreport.php">Periodic Report</a>
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
                            <h6 style="text-align: center; font-family:-apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif; font-style:inherit; color: rgb(43, 76, 88);font-size:xx-large;">
                                Order Detail
                            </h6>
                                <table class="table text-center mt-1 table bordered">
                                    <thead>
                                        <tr>
                                            <th>Product Image</th>
                                            <th>Customer Id</th>
                                            <th>First Name</th>
                                            <th>Last Name</th>
                                            <th>Phone</th>
                                            <th>Address</th>
                                            <th>Product Name</th>
                                            <th>Quantity</th>
                                            <th>Amount</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <form method="POST" enctype="multipart/form-data">
                                                <td><img src="" alt="img"></td>
                                                <td>01</td>
                                                <td>Muna</td>
                                                <td>Kc</td>
                                                <td>000000000</td>
                                                <td>Cleckhuddersfax</td>
                                                <td>iujbs</td>
                                                <td>2</td>
                                                <td>322</td>
                                                <td> <a href="empViewUpdate.php?update=<?php echo $row['Cust_Id']; ?>"  onClick="edit(this);" title="empEdit" >  <input type="image" src="assets/img/edit.png" title="Edit"> </a>
                                                    <a href="custDelete.php?delete=<?php echo $row['Cust_Id']; ?>" onClick="del(this);" title="Delete" ><input type="image" src="assets/img/trash.png" title="Trash">  </a></td>
                                            </form>
                                        </tr>
                                    </tbody>
                                </table>
                            
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
