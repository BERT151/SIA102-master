<?php
session_start();

require 'include/connection.php';
require "include/mail.php";


$error = array();
$errors   = array(); 

		$email = $_GET['id'];


		send_email($email);
		send_mail($recipient,$subject,$message);
		header("Location:verify.php?mode=enter_code");

		function send_email($email){
		global $con;

		$expire = time() + (60 * 1);
		$code = rand(100000,999999);
		$email = addslashes($email);

		$query = "insert into codes (email,code,expire) value ('$email','$code','$expire')";
		mysqli_query($con,$query);

		//send email here
		send_mail($email,'Email Verification',"Your OTP is " . $code. ", Don't Share your OTP with Anyone");
	}



?>