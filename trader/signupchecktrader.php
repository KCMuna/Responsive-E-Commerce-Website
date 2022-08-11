<?php
session_start();
include '../connect.php';
if (isset($_POST['tregister'])) {
    function validate($data)
    {
        $data = trim($data);
        $data = stripcslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }

    $fname = validate($_POST['f_name']);
    $lname = validate($_POST['l_name']);
    $ttype = validate($_POST['ttype']);
    $email = validate($_POST['email']);
    $pass1 = validate($_POST['pass1']);
    $pass2 = validate($_POST['pass2']);
    $gender = validate($_POST['gender']);


    $user_data = 'f_name' . $fname . 'l_name' . $lname . 'ttype' . $ttype . 'email' . $email . 'pass1' . $pass1 . 'pass2' . $pass2 . 'gender' . $gender;

    if (empty($fname)) {
        header("Location:traderreg.php?error= First Name is Required! && $user_data");
        exit();
    } elseif (empty($lname)) {
        header("Location:traderreg.php?error=Last Name is Required! && $user_data");
        exit();
    } elseif (empty($ttype)) {
        header("Location:traderreg.php?error=Trader Type is Required! && $user_data");
        exit();
    } elseif (empty($email)) {
        header("Location:traderreg.php?error=Email is Required! && $user_data");
        exit();
    } elseif (filter_var($email, FILTER_VALIDATE_EMAIL) === FALSE) {
        header("Location:curtomerreg.php?error=Invalid Email Format!! && $user_data");
        exit();
    } elseif (empty($pass1)) {
        header("Location:traderreg.php?error=Password is Required! && $user_data");
        exit();
    } elseif (empty($pass2)) {
        header("Location:traderreg.php?error=Confirmation Password is Required! && $user_data");
        exit();
    } else if ($pass1 !== $pass2) {
        header("Location:traderreg.php?error=Password does not Match && $user_data");
        exit();
    } elseif (empty($gender)) {
        header("Location:traderreg.php?error=Gender is Required! && $user_data");
        exit();
    } else {
        //hasing the password
        $pass1 = md5($pass1);
        $sql = oci_parse($conn, "SELECT * FROM TRADER WHERE EMAIL='$email'");
        $result = oci_execute($sql);
        $row = oci_fetch_row($sql);

        if (oci_num_rows($sql) == 1) {
            header("Location:traderreg.php?error=Email already exist, Try another! && $user_data");
            exit();
        } else {
            $sql1 = oci_parse($conn, "INSERT INTO TRADER(TRADER_FNAME,TRADER_LNAME,TRADER_TYPE,EMAIL,PASSWORD,GENDER,STATUS) VALUES('$fname','$lname','$ttype','$email','$pass1','$gender','DISABLE')");
            $result1 = oci_execute($sql1);

            if ($result1) {
                header("Location:traderreg.php?success=Your account has been created successfully");
                exit();
            } else {
                header("Location:traderreg.php?error=Unknown error occured&$user_data");
                exit();
            }
        }
    }
} else {

    //header("Location:curtomerreg.php");
    exit();
}
