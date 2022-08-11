<?php
error_reporting(0);
if (!($_SESSION['role']) && $_SESSION['role'] != "admin") {
    header('location:adminlogin.php');
}
$aid = $_SESSION['ADMIN_ID'];

?>
<nav class="navbar navbar-default navbar-cls-top " style=" margin-bottom: 0; background:#000000;" role="navigation">
    <div class="navbar-header">
        <a href="#"><img src="assets/img/logo.png" class="user-image img-responsive" /></a>
    </div>
    <div class="">

        <ul>
            <li style="list-style: none; float:right; margin-right:50px; margin-top: 60px; font-weight:bolder">
            <li style="text-align: center; color: rgb(250, 244, 244);font-family:Arial, Helvetica, sans-serif; font-size: 25px; font-weight: bold;list-style: none;"> Welcome To the INNOVATIVE GROCERY's ADMIN Panel</li>


            <a href="#" style="float: left; margin-left: 1130px; margin-bottom: 0;"><i style="font-size:20px ; float: left; margin-right:2px;" class="fa">&#xf2bd;</i>HELLO <br><?php echo htmlentities($_SESSION['ADMIN_NAME']); ?></a>
            <a href="#" style="float: left; margin-left: 1170px; margin-bottom: 0; color:white;"> <?php echo htmlentities($_SESSION['ADMIN_LNAME']); ?></a>

            </li>



            <li><a href="adminlogout.php" style="color: red; float: left; margin-left: 1260px; margin-bottom:auto;"><i class="icon fa fa-sign-out" style="color: red"></i>Logout</a></li>
        </ul>

    </div>

</nav>