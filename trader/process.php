<?php

session_start();
include '../connect.php';


if(isset($_POST['addshop'])){
   $tid= $_SESSION['TRADER_ID'];
    $name = $_POST['shopname'];
	$location = $_POST['location'];
	$desc= $_POST['description'];

    $shop = oci_parse($conn, "INSERT INTO SHOP(SHOP_NAME,SHOP_LOCATION,TRADER_ID,STATUS,DESCRIPTION)
values ('$name','$location',$tid,'DISABLE','$desc')");
$res = oci_execute($shop);
	if ($res) {
       header('location:shop.php');
	}
	else{
		echo "Error !";
				exit();
	}
}


if(isset($_GET['addpro'])){
    $shopid=$_GET['addpro'];
}

if(isset($_POST['addproduct']))
{

	$file = $_FILES["profile"]["name"];
	$file="image/".$file;



	$pname= $_POST['productname'];
	$desc= $_POST['description'];
	$price= $_POST['price'];
	$discount= $_POST['discount'];
	$avi= $_POST['availability'];
	$max= $_POST['maxorder'];
	$min= $_POST['minorder'];
	$cat= $_POST['catid'];


	$add = oci_parse($conn, "INSERT INTO PRODUCT1 (PRODUCT_NAME,DESCRIPTION,PRICE,DISCOUNT,AVAILABILITY,MAX_ORDER,MIN_ORDER,PRODUCT_IMAGE,CATEGORY_ID,SHOP_ID,STATUS)
	VALUES ('$pname','$desc',$price,$discount,$avi,$max,$min,'$file','$cat',$shopid,'DISABLE')");

	$result = oci_execute($add);

		if ($result) {
			//header('location:');
		//echo "<script>alert('Product Added!!');</script>";
		header('location:shop.php');
		}
		else{
			echo "Error !";
					exit();
		}
}

?>