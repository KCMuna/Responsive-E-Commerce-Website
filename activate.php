<?php
session_start();
include 'connect.php';
 if(isset($_GET['token'])){
     $token=$_GET['token'];

     $stid1 = oci_parse($conn, " UPDATE USERS SET status='active' WHERE TOKEN='$token'");
     $result = oci_execute($stid1);
     if($stid1){
         if(isset($_SESSION['msg'])){
            $_SESSION['msg']="Your Account has been Registered Successfully! Go to the Login Page";
            header("Location:customerlogin.php?success=Your Account has been Registered Successfully!");

         }else{
            $_SESSION['msg']="Account already Activated! Login Again";
            header("Location:customerlogin.php?success=Account already Activated! Login Again..");

         }
     }else{
        $_SESSION['msg']="Account Update Failed";
        header("Location:curtomerreg.php?error=Account Update Failed!");
     }
 }
 
?>