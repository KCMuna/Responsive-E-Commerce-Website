<?php
session_start();

include '../connect.php';
if (isset($_POST['change'])) {
  function validate($data)
  {
    $data = trim($data);
    $data = stripcslashes($data);
    $data = htmlspecialchars($data);
    return $data;
  }

  $email = validate($_POST['email']);
  $pass1 = validate($_POST['pass1']);
  $pass2 = validate($_POST['pass2']);


  if (empty($email)) {
    header('Location:resettrader.php?error=Email is Required!');
    exit();
  } elseif (empty($pass1)) {
    header('Location:resettrader.php?error=Password is Required!');
    exit();
  } elseif (empty($pass2)) {
    header('Location:resettrader.php?error=Re-Password is Required!');
    exit();
  } else if ($pass1 !== $pass2) {
    header('Location:resettrader.php?error=Password does not Match!');
    exit();
  } else {
    $pass1 = md5($pass1);

    $query = oci_parse($conn, " SELECT * FROM TRADER WHERE EMAIL='$email' ");
    $num = oci_execute($query);
    oci_fetch_row($query);
    $res = oci_num_rows($query);
    echo $res;
    if ($res > 0) {
      $stid = oci_parse($conn, " UPDATE TRADER SET PASSWORD='$pass1' WHERE EMAIL='$email' ");
      $new = oci_execute($stid);

      if ($new)
        header('location:resettrader.php?success=Password Changed Successfully');
      $_SESSION['errmsg'] = "Password Changed Successfully";
      exit();
    } else {
      $extra = "forgot-password.php";

      $_SESSION['errmsg'] = "Invalid email id ";
      header('Location:resettrader.php?error=Invalid Email Id!');
      exit();
    }
  }
}

?>

<!DOCTYPE html>
<html>

<head>
  <title>RESET CUSTOMER PASSWORD</title>
  <link rel="stylesheet" type="text/css" href="css/style1.css">
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

<body>

  <div class="header">
    <a href="#default" class="logo"> <img src="image/logo_innovative_grocery.png" alt="Innovative Grocery" height="60" width="80"></a>
    <div class="topleft" style="text-align: center; font-size: 30px;"><b>PLEASE LOG IN OR SIGN UP</b></div>

  </div>
  <div class="navbar">
    <a href="adminlogin.php">Admin Login</a>
    <a href="traderlogin.php">Trader Login</a>
    <a href="customerlogin.php">Customer Login</a>

    <div class="dropdown">
      <button class="dropbtn">Create New Account
        <i class="fa fa-caret-down"></i>
      </button>
      <div class="dropdown-content">
        <a href="curtomerreg.php">Create Customer Account</a>
        <a href="traderreg.php">Create Trader Account</a>
      </div>
    </div>
    <a href="index.php"> Back to HomePage</a>
  </div>

  <div class="content">
    <form method="POST" action="" style="background:gray; height: 450px;">
      <h2 style="color: darkblue"><u>SET NEW PASSWORD</u></h2>

      <?php if (isset($_GET['error'])) {   ?>
        <p class="error" style="background-color:#fcb3b3; height:40px; width: 400px; border-radius:5px; color:#484a49;padding-left:80px; padding-top:10px; font-weight:bold;"><?php echo $_GET['error']; ?></p>
      <?php } ?>

      <?php if (isset($_GET['success'])) {   ?>
        <p class="success" style="background-color:#7dc9ff; height:40px; width: 400px; border-radius:5px; color:#484a49;padding-left:60px; padding-top:10px; font-weight:bold;"><?php echo $_GET['success']; ?></p>
      <?php } ?><br>

      <label>Your Email</label>
      <?php if (isset($_GET['email'])) {   ?>
        <input type="email" name="email" placeholder="Email" value="<?php echo $_GET['email']; ?>"><br> <?php } else { ?>
        <input type="email" name="email" placeholder="Email">

      <?php } ?>

      <div class="input-box">
        <span class="details">New Password</span>
        <input type="password" name="pass1" placeholder="Enter your password" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters">


      </div>
      <div class="input-box">
        <span class="details">Retype Password</span>
        <input type="password" name="pass2" placeholder="Retype your password" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters">

      </div>


      <button type="submit" name="change" style="cursor: pointer;">CHANGE</button>
    </form>

  </div>
  <script>
    var myInput = document.getElementById("psw");
    var letter = document.getElementById("letter");
    var capital = document.getElementById("capital");
    var number = document.getElementById("number");
    var length = document.getElementById("length");

    // When the user clicks on the password field, show the message box
    myInput.onfocus = function() {
      document.getElementById("message").style.display = "block";
    }

    // When the user clicks outside of the password field, hide the message box
    myInput.onblur = function() {
      document.getElementById("message").style.display = "none";
    }

    // When the user starts to type something inside the password field
    myInput.onkeyup = function() {
      // Validate lowercase letters
      var lowerCaseLetters = /[a-z]/g;
      if (myInput.value.match(lowerCaseLetters)) {
        letter.classList.remove("invalid");
        letter.classList.add("valid");
      } else {
        letter.classList.remove("valid");
        letter.classList.add("invalid");
      }

      // Validate capital letters
      var upperCaseLetters = /[A-Z]/g;
      if (myInput.value.match(upperCaseLetters)) {
        capital.classList.remove("invalid");
        capital.classList.add("valid");
      } else {
        capital.classList.remove("valid");
        capital.classList.add("invalid");
      }

      // Validate numbers
      var numbers = /[0-9]/g;
      if (myInput.value.match(numbers)) {
        number.classList.remove("invalid");
        number.classList.add("valid");
      } else {
        number.classList.remove("valid");
        number.classList.add("invalid");
      }

      // Validate length
      if (myInput.value.length >= 8) {
        length.classList.remove("invalid");
        length.classList.add("valid");
      } else {
        length.classList.remove("valid");
        length.classList.add("invalid");
      }
    }
  </script>

</body>

</html>