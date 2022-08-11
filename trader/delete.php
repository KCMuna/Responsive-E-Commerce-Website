<?php
session_start();
include '../connect.php';
error_reporting(0);
// if(!($_SESSION['role']) && $_SESSION['role'] !="trader")
// {
//     header('location:login.php');
// }

if(isset($_GET['shopdel'])){
	
	$shopid=$_GET['shopdel'];    
}

	$query = oci_parse($conn, " DELETE FROM SHOP WHERE SHOP_ID='$shopid'");
    $result = oci_execute($query);

    if ($result) {
        echo "<script>alert('SHOP DELETED!!');</script>";
        header('location:shop.php');
     }
     else{
         echo "Error !";
                 exit();
     }




if(isset($_GET['delproduct'])){
	
	$pd=$_GET['delproduct'];    
}

	$sql = oci_parse($conn, " DELETE FROM PRODUCT1 WHERE PRODUCT_ID='$pd'");
    $num = oci_execute($sql);

    if ($num) {
         
        echo "<script>alert('Product DELETED!!');</script>";
        header('location:productlist.php');
     }
     else{
         echo "Error !";
                 exit();
     }

	

?>