<?php
session_start();
include 'connect.php';

if(isset ($_POST['cregister'])){
    function validate($data){
        $data=trim($data);
        $data=stripcslashes($data);
        $data=htmlspecialchars($data);
        return $data;
    }

    $fname=validate($_POST['f_name']);
    $lname=validate($_POST['l_name']);
    $email=validate($_POST['email']);
    $addr=validate($_POST['add']);
    $phone=validate($_POST['phone']);
    $pass1=validate($_POST['pass1']);
    $pass2=validate($_POST['pass2']);
    $gender=validate($_POST['gender']);
    

    $user_data='f_name'.$fname.'l_name'.$lname.'email'.$email.'add'.$addr.'phone'.$phone.'pass1'.$pass1.'pass2'.$pass2.'gender'.$gender;

    if(empty($fname)){
        header("Location:custreg.php?error= First Name is Required! && $user_data");
		exit();
    }elseif(empty($lname)){
        header("Location:custreg.php?error=Last Name is Required! && $user_data");
		exit();
    }elseif(empty($email)){
        header("Location:custreg.php?error=Email is Required! && $user_data");
		exit();
    }
        elseif(filter_var($email,FILTER_VALIDATE_EMAIL)===FALSE){
            header("Location:custreg.php?error=Invalid Email Format!! && $user_data");
            exit();
        

    }elseif(empty($addr)){
        header("Location:custreg.php?error=Address is Required! && $user_data");
		exit();
    }elseif(empty($phone)){
        header("Location:custreg.php?error=Phone Number is Required! && $user_data");
		exit();
    }elseif(empty($pass1)){
        header("Location:custreg.php?error=Password is Required! && $user_data");
		exit();
    }elseif(empty($pass2)){
        header("Location:custreg.php?error=Confirmation Password is Required! && $user_data");
		exit();
    }else if($pass1!==$pass2){
        header("Location:custreg.php?error=Password does not Match && $user_data");
        exit();
    }elseif(empty($gender)){
        header("Location:custreg.php?error=Gender is Required! && $user_data");
		exit();
    }else{
        	//hasing the password
        $pass1 = md5($pass1);
        $sql=oci_parse($conn,"SELECT * FROM USERS WHERE EMAIL='$email'");
        $result=oci_execute($sql);
        $row = oci_fetch_row($sql);

        if(oci_num_rows($sql)==1){
           header("Location:custreg.php?error=Email already exist, Try another! && $user_data");
		exit();
        }else{
            $sql1=oci_parse($conn,"INSERT INTO USERS(FIRST_NAME,LAST_NAME,EMAIL,ADDRESS,PHONE,PASSWORD,GENDER) VALUES('$fname','$lname','$email','$addr','$phone','$pass1','$gender')");
            $result1=oci_execute($sql1);

            if($result1){
                header("Location:custreg.php?success=Your account has been created successfully");
					exit();
            }else{
               header("Location:custreg.php?error=Unknown error occured&$user_data");
				exit();
            }

        }
    }
}else{

    //header("Location:custreg.php");
	exit();
}
