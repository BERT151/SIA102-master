<?php 
session_start();
$error = array();
$errors   = array(); 
require 'include/connection.php';
require "include/mail.php";


	$mode = "enter_email";
	if(isset($_GET['mode'])){
		$mode = $_GET['mode'];
	}
	//something is posted
	if(count($_POST) > 0){



		switch ($mode) {
			case 'enter_email':

					

				// code...
					$fname   =  $_POST['fname'];
					$lname      =  $_POST['lname'];
					$username    =  $_POST['username'];
					$email  =  $_POST['email'];
					$password  =  $_POST['password_1'];
					$password_1  =  $_POST['password_1'];
					$password_2  =  $_POST['password_2'];
					$contact       =  $_POST['contact'];
					
					$number = preg_match('@[0-9]@', $password);
					$uppercase = preg_match('@[A-Z]@', $password);
					$lowercase = preg_match('@[a-z]@', $password);
					$specialChars = preg_match('@[^\w]@', $password);

					$email = $_POST['email'];
					$sql= "SELECT Username FROM account WHERE Username = '$username'";
					$checkSQL = mysqli_query($con, $sql);
				
					// Check if username already exists
					$username = mysqli_real_escape_string($con, $_POST['username']);
					$sql = "SELECT Username FROM account WHERE Username = '$username'";
					$checkSQL = mysqli_query($con, $sql);

					if(mysqli_num_rows($checkSQL) != 0) {
						$errors['ui'] = "Username already exists";
					}

					// Check if email address already exists
					$email = mysqli_real_escape_string($con, $_POST['email']);
					$esql = "SELECT Email_Add FROM account WHERE Email_Add = '$email'";
					$echeckSQL = mysqli_query($con, $esql);

					if(mysqli_num_rows($echeckSQL) != 0) {
						$errors['ei'] = "Email address already exists";
					}
	
				 	if (empty($fname)) { 
				 		$errors['fn'] = "First name is required";
					 // array_push($errors, "First name is required"); 
					 }
					 if (empty($lname)) { 
				 		$errors['ln'] =  "Last name is required";
					 // array_push($errors, "First name is required"); 
					 }
					 if (empty($username)) { 
					 	$errors['u'] = "Username is required";
					 // array_push($errors, "Username is required"); 
					 }
					if (empty($email)) { 
						$errors['e'] = "Email Address is required";
					 // array_push($errors, "Email is required"); 
					 }
					 if (empty($password_1)) { 
					 	$errors['p1'] = "Password is required";
					 // array_push($errors, "Password is required"); 
					 }
					 if (strlen($password_1) < 6 || !$number || !$uppercase || !$lowercase || !$specialChars) { 
					 	$errors['ps1'] = "Password must be at least 6 characters in length and must contain at least one number, one upper case letter, one lower case letter and one special character.";
					 }
					 if (empty($password_2)) { 
					 	$errors['p2'] = "Password is required";
					 // array_push($errors, "Password is required"); 
					 }
					if ($password_1 != $password_2) {
						$errors['p3'] = "Passwords do not match";
					 // array_push($errors, "The two passwords do not match");
					}
					if (empty($contact)) { 
				 		$errors['c'] = "Contact Number is required";
					 // array_push($errors, "First name is required"); 
					 }
				if (count($errors) == 0) {


		 	
				if(!filter_var($email,FILTER_VALIDATE_EMAIL)){
					$error[] = "Please enter a valid email";
				}else{
				//validate email

					$_SESSION['verify']['email'] = $email;
					$_SESSION['verify']['fname'] = $fname;
					$_SESSION['verify']['lname'] = $lname;
					$_SESSION['verify']['username'] = $username;
					$_SESSION['verify']['password'] = $password;
					$_SESSION['verify']['contact'] = $contact;

					send_email($email);
					send_mail($recipient,$subject,$message);
					header("Location:verify.php?mode=enter_code");
					die;
				}
			}
				break;

			case 'enter_code':
				// code...
				$password = $_SESSION['verify']['password']; 
				$code = $_POST['code'];
				$result = is_code_correct($code);

				if($result == "the code is correct"){

					save_password($password);
					if(isset($_SESSION['verify'])){
						unset($_SESSION['verify']);
					}

					echo "<script>
					alert('Registration Complete');
					window.location.href='login.php';
					</script>";
					die;
				}else{
					$error[] = $result;
				}
				break;

			default:
				// code...
				break;
		}
	}

	function send_email($email){


		global $con;
		$email = $_SESSION['verify']['email'];
		$expire = time() + (60 * 1);
		$code = rand(100000,999999);
		$email = addslashes($email);

		$query = "insert into codes (email,code,expire) value ('$email','$code','$expire')";
		mysqli_query($con,$query);

		//send email here
		send_mail($email,'Email Verification',"Your OTP is " . $code. ", Don't Share your OTP with Anyone");
	}
	
	function save_password($password){
		

		// $password = password_hash($password, PASSWORD_DEFAULT);


		global $con;
		global $db, $errors, $fname, $lname, $password, $username, $email, $contact, $city, $address;

		$email = addslashes($_SESSION['verify']['email']);
		$fname = $_SESSION['verify']['fname'];
		$lname = $_SESSION['verify']['lname'];
		$username = $_SESSION['verify']['username'];
		$password = $_SESSION['verify']['password']; 
		$contact = $_SESSION['verify']['contact'];  


		$password = md5($password);
		$query = "INSERT INTO account (  Name,Username, Password , Status,Fname,Lname,Contact_Num,Email_Add) 
		VALUES('$fname','$username', '$password',  'AS','$fname','$lname','$contact','$email')";
		mysqli_query($con, $query);


	}
	
	function valid_email($email){
		global $con;
		$email = addslashes($email);
		$query = "insert into account (Email_Add) value ('$email')";		
		$result = mysqli_query($con,$query);
		if($result){
			if(mysqli_num_rows($result) > 0)
			{
				return true;
 			}
		}
		return false;

	}

	function is_code_correct($code){
		global $con;

		$code = addslashes($code);
		$expire = time();
		$email = addslashes($_SESSION['verify']['email']);

		$query = "select * from codes where code = '$code' && email = '$email' order by id desc limit 1";
		$result = mysqli_query($con,$query);
		if($result){
			if(mysqli_num_rows($result) > 0)
			{
				$row = mysqli_fetch_assoc($result);
				if($row['expire'] > $expire){

					return "the code is correct";
				}else{
					return "the code is expired";
				}
			}else{
				return "the code is incorrect";
			}
		}

		return "the code is incorrect";
	}
    include'include/header.php';
	
?>

<!DOCTYPE html>
<html>
<head>
   <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>RFGElite.</title>
	<link rel="icon" type="image/x-icon" href="Picture/14.png">
    <link rel="stylesheet" href="css/register.css">
    <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
	<link href='https://fonts.googleapis.com/css?family=Lato' rel='stylesheet'>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
	<link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css">

</head>
<body>
<style type="text/css">

	form{
background-color: #fff;
	}

</style>

		<?php 

			switch ($mode) {
				case 'enter_email':
					// code...
					?>
					<div class="container">
       				<div class="forms">
            		<div class="form login">
            	    <span class="title">REGISTRATION</span>
					<div class="row">
                    <form method="post"  action=" verify.php?mode=enter_email"> 
                    <div class="column">
					<div class="input-field">
                        <input type="text" autocomplete="off" onkeyup="this.value = this.value.toUpperCase()" placeholder="Enter your First Name" name="fname">
                        <i class="uil uil-user"></i>
                    </div>
                     <p class="text-danger"><?php if(isset($errors['fn'])) echo $errors['fn'];?></p>
					<div class="input-field">
                        <input type="text" autocomplete="off" onkeypress="return /[a-zA-Z ]+$/i.test(event.key)" onkeyup="this.value = this.value.toUpperCase()" placeholder="Enter your Last Name" name="lname">
                        <i class="uil uil-user"></i>
                    </div>
                    <p class="text-danger"><?php if(isset($errors['ln'])) echo $errors['ln'];?></p>
                    <div class="input-field">
                        <input type="text" autocomplete="off" onkeypress=""  placeholder="Enter Username"  name="username">
                        <i class="uil uil-user"></i>
                    </div>
                    <p class="text-danger"><?php if(isset($errors['u'])) echo $errors['u'];?></p>
                                        <p class="text-danger"><?php if(isset($errors['ui'])) echo $errors['ui'];?></p>
                    <div class="input-field">
                        <input type="email" autocomplete="off" id ="email" placeholder="Enter your Gmail" name="email"  >
                        <i class="uil uil-envelope icon"></i>
                    </div>
                    <p class="text-danger"><?php if(isset($errors['ei'])) echo $errors['ei'];?></p>     
                    <p class="text-danger"><?php if(isset($errors['e'])) echo $errors['e'];?></p>     
                    </div>
                </div>
                    <div class="column">
                    <div class="input-field">
                        <input type="password" autocomplete="off" class="password" id="psw" name="password_1" placeholder="Enter password">
                        <i class="uil uil-lock icon"></i>
						<i class="uil uil-eye-slash showHidePw"></i>
					</div>
                    <p class="text-danger"><?php if(isset($errors['p1'])) echo $errors['p1'];?></p>
                    <p class="text-danger"><?php if(isset($errors['ps1'])) echo $errors['ps1'];?></p>
                    <div class="input-field">
                        <input type="password" autocomplete="off" class="password" placeholder="Confirm a password"  name="password_2">
                        <i class="uil uil-lock icon"></i>
                        <i class="uil uil-eye-slash showHidePw"></i>
                    </div>
                    <p class="text-danger"><?php if(isset($errors['p2'])) echo $errors['p2'];?></p>
                    <p class="text-danger"><?php if(isset($errors['p3'])) echo $errors['p3'];?></p>
     
                    <div class="input-field">
                        <input type="text" autocomplete="off" onkeypress="return restrictAlphabets(event)" placeholder="Enter Contact Number" pattern="^(09|\+639)\d{9}$" name="contact" minlength="11" maxlength="11">
                           <i class="fas fa-phone"></i>
                    </div>
                    <p class="text-danger"><?php if(isset($errors['c'])) echo $errors['c'];?></p>
                    </div>
                    <div class="rrow">
					<div class="input-field button">
                        <input type="submit"  class="btnR" name="register_btn" onclick="myFunction()" value="Register">
                    </div>
                    </div>
				    <div class="brow">
					<div class="Rlogin-signup">
                    <span class="text">Already a member? 
					<a href=" login.php" class="text login-link" >Login now</a>
                    </span>
					</div>
                    </div>
					</div>
	                 </form>
					 </div>	
		             </div>	
		       		 </div>



					<?php				
					break;

				case 'enter_code':
					// code...
					?>		<div class="Hform">
							<form class="entercode" method="post" action=" verify.php?mode=enter_code"> 
							<h2>Verify Email Address</h2>
							<h4>Enter your the code sent to your email</h4>
							
							<div class="input">
							<input minlength="6" maxlength="6" class="textbox" type="text" name="code" placeholder="Enter 6 Digits Code" autocomplete="off"><br>
							<span style="font-size: 15px;color:red;margin-left: 15%;">
							<?php 
								foreach ($error as $err) {
									// code...
									echo $err . "<br>";
								}
							?>
							</span>
							</div>
							<h3>We’ve sent a verification code to your email</h3>
							<br style="clear: both;">
							<input type="submit" value="Submit" class="submit">
							<div class="resend">
							<a  href="otp_resend.php?id=<?php echo $_SESSION['verify']['email']; ?>">Resend</a>
							</form>
							</div>
					<?php
					break;
				default:
					// code...
					break;
			}

		?>

<script>

var someVarName = "email";
localStorage.setItem("someVarKey", someVarName);

var someVarName = localStorage.getItem("someVarKey");

const container = document.querySelector(".container"),
      pwShowHide = document.querySelectorAll(".showHidePw"),
      pwFields = document.querySelectorAll(".password"),
      signUp = document.querySelector(".signup-link"),
      login = document.querySelector(".login-link");


    pwShowHide.forEach(eyeIcon =>{
        eyeIcon.addEventListener("click", ()=>{
            pwFields.forEach(pwField =>{
                if(pwField.type ==="password"){
                    pwField.type = "text";

                    pwShowHide.forEach(icon =>{
                        icon.classList.replace("uil-eye-slash", "uil-eye");
                    })
                }else{
                    pwField.type = "password";

                    pwShowHide.forEach(icon =>{
                        icon.classList.replace("uil-eye", "uil-eye-slash");
                    })
                }
            }) 
        })
    })


    signUp.addEventListener("click", ( )=>{
        container.classList.add("active");
    });
    login.addEventListener("click", ( )=>{
        container.classList.remove("active");
    });

         function restrictAlphabets(e) {
             var x = e.which || e.keycode;
             if ((x >= 48 && x <= 57))
                 return true;
             else
                 return false;
         }
		 function myFunction() {

var mailformat = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;
if(inputText.value.match(mailformat))
{
alert("Valid email address!");
document.form1.text1.focus();
return true;
}
else
{
alert("You have entered an invalid email address!");
document.form1.text1.focus();
return false;
}
}

</script>
</body>
</html>