<?php
session_start();
include 'connect.php';

if(isset($_POST['login']))
 {	
	// $name = $_POST['first_name'];
	$email=$_POST['email'];
   	$pass=md5($_POST['password']);

	   $stid = oci_parse($conn, " SELECT * FROM USERS WHERE email='$email' AND password='$pass' ");
	   $result = oci_execute($stid);
	   //$row=oci_fetch_row($stid);
	   $row = oci_fetch_row($stid);
	   $num = oci_num_rows($stid);
	  //if( oci_num_rows($result) == 1 )
	  //echo $pass;
	  	  if ($num > 0 ){
			//while( $row= oci_fetch_row($stid))
	 
			
	 $_SESSION['email'] = $email;
	 //$_SESSION['fname'] = $row['1'];
	 //$_SESSION['email']=$row['first_name'];
	$_SESSION['success'] = "You are logged in";
	// $_SESSION['role']="customer";

	 $_SESSION['USER_ID']=$row['0'];
	 $_SESSION['FIRST_NAME']=$row['1'];

	  //$_SESSION['success'] = "You are logged in";
	  header('location: index.php'); 
	  //echo "success";
	}
	  else{
		  echo "Error Login";
	  }
	   
}


?>