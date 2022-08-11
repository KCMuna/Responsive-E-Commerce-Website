<?php
session_start();
include 'connect.php';

if (isset($_POST['clogin'])) {

  function validate($data)
  {
    $data = trim($data);
    $data = stripcslashes($data);
    $data = htmlspecialchars($data);
    return $data;
  }

  $email = validate($_POST['email']);
  $pass1 = validate($_POST['password']);

  if (empty($email)) {
    header('Location:customerlogin.php?error=Email is Required!');
    exit();
  } elseif (empty($pass1)) {
    header('Location:customerlogin.php?error=Password is Required!');
    exit();
  } else {
    $pass1 = md5($pass1);

    $stid = oci_parse($conn, " SELECT * FROM USERS WHERE email='$email' AND password='$pass1' ");
    $result = oci_execute($stid);
    $row = oci_fetch_row($stid);
    $num = oci_num_rows($stid);


    if ($num > 0) {


      $_SESSION['email'] = $email;
      $_SESSION['success'] = "You are logged in";
      $_SESSION['USER_ID'] = $row['0'];
      $_SESSION['FIRST_NAME'] = $row['1'];

      header('location: index.php');
    } else {
      header('Location:customerlogin.php?error=Incorrect Email or Password');
      exit();
    }
  }
}

?>


<!DOCTYPE html>
<html>

<head>
  <title>CUSTOMER LOGIN</title>
  <link rel="stylesheet" type="text/css" href="css/style1.css">
  <link rel="shortcut icon" href="image/logo_innovative_grocery.png">

  <style>
    body {
      font-family: Arial, Helvetica, sans-serif;
    }

    .navbar {
      overflow: hidden;
      background-color: #333;
    }

    .navbar a {
      float: left;
      font-size: 16px;
      color: white;
      text-align: center;
      padding: 14px 16px;
      text-decoration: none;
    }

    .dropdown {
      float: left;
      overflow: hidden;
    }

    .dropdown .dropbtn {
      font-size: 16px;
      border: none;
      outline: none;
      color: white;
      padding: 14px 16px;
      background-color: inherit;
      font-family: inherit;
      margin: 0;
    }

    .navbar a:hover,
    .dropdown:hover .dropbtn {
      background-color: red;
    }

    .dropdown-content {
      display: none;
      position: absolute;
      background-color: #f9f9f9;
      min-width: 160px;
      box-shadow: 0px 8px 16px 0px rgba(0, 0, 0, 0.2);
      z-index: 1;
    }

    .dropdown-content a {
      float: none;
      color: black;
      padding: 12px 16px;
      text-decoration: none;
      display: block;
      text-align: left;
    }

    .dropdown-content a:hover {
      background-color: #ddd;
    }

    .dropdown:hover .dropdown-content {
      display: block;
    }
  </style>
</head>

<body style="background: #E2F7ED">

  <div style="background: #E2F7ED" class="header">
    <a href="#default" class="logo"> <img src="image/logo_innovative_grocery.png" alt="Innovative Grocery" height="40" width="60"></a>
    <div class="topleft" style="margin-left:425px; font-size: 30px;"><b>PLEASE LOG IN OR SIGN UP</b></div>

  </div>
  <div class="navbar">
    <a href="admin/adminlogin.php">Admin Login</a>
    <a href="trader/login.php">Trader Login</a>


    <div class="dropdown">
      <button class="dropbtn">Create New Account
        <i class="fa fa-caret-down"></i>
      </button>
      <div class="dropdown-content">
        <a href="custreg.php">Create Customer Account</a>
        <a href="trader/traderreg.php">Create Trader Account</a>
      </div>
    </div>
    <a href="index.php"> Back to HomePage</a>
  </div>

  <div style="background: #E2F7ED" class="content">
    <form method="POST" action="" style="background: pink;">
      <h2 style="color: darkblue"><u>CUSTOMER LOGIN</u></h2>

      <?php if (isset($_GET['error'])) {   ?>
        <p class="error" style="background-color:#fcb3b3; height:40px; width: 350px; border-radius:5px; color:#484a49;padding-left:80px; padding-top:10px; font-weight:bold;"><?php echo $_GET['error']; ?></p><br>
      <?php } ?>

      <label>Your Email</label>
      <?php if (isset($_GET['email'])) {   ?>
        <input type="email" name="email" placeholder="Email" value="<?php echo $_GET['email']; ?>"><br> <?php } else { ?>
        <input type="email" name="email" placeholder="Email"><br>

      <?php } ?>

      <label>Password</label>
      <input type="password" name="password" placeholder="Password">
      <label><a href="reset-password.php" style="text-decoration: none"> Forgot Password?</a></label>
      <button type="submit" name="clogin" style="cursor: pointer;">LOGIN</button>
    </form>

  </div>


</body>

</html>