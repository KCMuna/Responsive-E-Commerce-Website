<?php
session_start();

include 'connect.php';
?>
<!DOCTYPE html>
<html>

<head>
  <title>Customer Registration</title>
  <link rel="stylesheet" type="text/css" href="css/cusreg.css">
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


<body style="background: #FAC18B">

  <div style="background: #FAC18B" class="header">
    <a href="index.php" class="logo"> <img src="image/logo_innovative_grocery.png" alt="Innovative Grocery" height="60" width="100"></a>
    <div class="topleft" style="text-align: center; font-size: 30px;"><b>PLEASE LOG IN OR SIGN UP</b></div>

  </div>

  <div class="navbar">
    <a href="admin/adminlogin.php">Admin Login</a>
    <a href="trader/login.php">Trader Login</a>
    <a href="customerlogin.php">Customer Login</a>

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


  <div style="margin-left:250px; height: auto;" class="container">


    <br>
    <div style="color:#2A8BD3" class="title"><b>CUSTOMER REGISTRATION</b></div>
    <?php if (isset($_GET['error'])) {   ?>
      <p class="error" style="background-color:#fcb3b3; height:40px; width: 400px; border-radius:5px; color:#484a49;padding-left:80px; padding-top:10px; font-weight:bold;"><?php echo $_GET['error']; ?></p>
    <?php } ?>

    <?php if (isset($_GET['success'])) {   ?>
      <p class="success" style="background-color:#7dc9ff; height:40px; width: 450px; border-radius:5px; color:#484a49;padding-left:60px; padding-top:10px; font-weight:bold;"><?php echo $_GET['success']; ?></p>
    <?php } ?>
    <div class="content">


      <form method="POST" action='signupcheckcustomer.php'>
        <div class="user-details">
          <div class="input-box">

            <span class="details">First Name</span>
            <?php if (isset($_GET['f_name'])) {   ?>
              <input type="text" name="f_name" placeholder="Enter your first name" value="<?php echo $_GET['f_name']; ?>" Required>
            <?php } else { ?>
              <input type="text" name="f_name" placeholder="Enter your first name">
            <?php } ?>
          </div>


          <div class="input-box">
            <span class="details">Last Name</span>
            <?php if (isset($_GET['l_name'])) {   ?>
              <input type="text" name="l_name" placeholder="Enter your lastname" value="<?php echo $_GET['l_name']; ?>">
            <?php } else { ?>
              <input type="text" name="l_name" placeholder="Enter your lastname">
            <?php } ?>
          </div>



          <div class="input-box">
            <span class="details">Email</span>
            <input type="email" name="email" placeholder="Enter your email">
          </div>

          <div class="input-box">
            <span class="details">Address</span>
            <?php if (isset($_GET['add'])) {   ?>
              <input type="text" name="add" placeholder="Enter your Address" value="<?php echo $_GET['add']; ?>">
            <?php } else { ?>
              <input type="text" name="add" placeholder="Enter your Address">
            <?php } ?>
          </div>

          <div class="input-box">
            <span class="details">Phone Number</span>
            <?php if (isset($_GET['phone'])) {   ?>
              <input type="text" name="phone" placeholder="Enter your phone number" value="<?php echo $_GET['phone']; ?>">
            <?php } else { ?>
              <input type="text" name="phone" placeholder="Enter your phone number">
            <?php } ?>
          </div>

          <div class="input-box">
            <span class="details">Password</span>
            <input type="password" name="pass1" placeholder="Enter your password" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters">


          </div>
          <div class="input-box">
            <span class="details">Retype Password</span>
            <input type="password" name="pass2" placeholder="Retype your password" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters">

          </div>
        </div>
        <div class="gender-details">
          <input type="radio" value="M" name="gender" id="dot-1">
          <input type="radio" value="F" name="gender" id="dot-2">
          <input type="radio" value="O" name="gender" id="dot-3">
          <span class="gender-title">Gender</span>
          <div class="category">
            <label for="dot-1">
              <span class="dot one"></span>
              <span class="gender">Male</span>
            </label>
            <label for="dot-2">
              <span class="dot two"></span>
              <span class="gender">Female</span>
            </label>

            <label for="dot-3">
              <span class="dot three"></span>
              <span class="gender">Others</span>
            </label>

          </div>
        </div>


        <div class="button">
          <button type="submit" name="cregister">REGISTER</button>
        </div>

      </form>




    </div>
  </div>

  <footer>
    <b>&copy; 2021 Innovative Grocery </b> All rights reserved.
  </footer>
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