<?php
session_start();
include '../connect.php';


// (isset($_GET['logout'])) {

    unset($_SESSION['email']);
	session_destroy();
	header('location: login.php');
//}
?>


