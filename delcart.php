<?php
session_start();
include 'connect.php';

if (isset($_GET['cartdelete'])) {

	$cd = $_GET['cartdelete'];

	

	$query = oci_parse($conn,"DELETE FROM CART WHERE PRODUCT_ID ='$cd'");
	$result = oci_execute($query);
	if ($result) {
        echo "<script>alert('PRODUCT REMOVED!!');</script>";
      // header('location:my-cart1.php');
     }
     else{
         echo "Error !";
                 exit();
     }
	

}
  

?>