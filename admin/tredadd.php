<?php

session_start();
include '../connect.php';


if(isset($_POST['addtrader'])){
   //$tid= $_SESSION['TRADER_ID'];
    $fname = $_POST['fname'];
	$lname = $_POST['lname'];
    $gender= $_POST['gender'];
    $user= $_POST['username'];
    $typ= $_POST['type'];
    $email= $_POST['email'];



    $tred = oci_parse($conn, "INSERT INTO TRADER(TRADER_FNAME,TRADER_LNAME,TRADER_TYPE,EMAIL,GENDER,STATUS,USERNAME)
    VALUES ('$fname','$lname','$typ','$email','$gender','DISABLE','$user')");
    $res = oci_execute($tred);
	if ($res) {
		echo "<script>alert('TRADER ADDED!!');</script>";
        header('location:trader-req.php');
	}
	else{
		echo "Error !";
				exit();
	}
}


?>