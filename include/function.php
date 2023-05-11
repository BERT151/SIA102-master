<?php

session_start();

require "connection.php";

$quantity = "";	
$username = "";
$email    = "";
$errors   = array(); 
if (isset($_POST['register_btn'])) {
	register();
}
if (isset($_POST['add_btn'])) {
	updateadd();
}
if (isset($_POST['edit_user_info'])) {
	edit_user_info();
}
function register(){
	
	global $con, $errors, $username, $email, $contact, $city, $address;

	$fname   =  e($_POST['fname']);
	$lname      =  e($_POST['lname']);
	$username    =  e($_POST['username']);
	$email       =  e($_POST['email']);
	$password_1  =  e($_POST['password_1']);
	$password_2  =  e($_POST['password_2']);
	$contact       =  e($_POST['contact']);

 
		
	$sql= "SELECT Username FROM account WHERE Username = '$username'";
	$checkSQL = mysqli_query($con, $sql);

	$esql= "SELECT Email_Add FROM account WHERE Email_Add = '$email'";
	$echeckSQL = mysqli_query($con, $sql);

	if(mysqli_num_rows($checkSQL) != 0) {
	$errors['ui'] = "Username is Already Exist";
	}

	if(mysqli_num_rows($echeckSQL) != 0) {
	$errors['ei'] = "Email Address is Already Exist";
	}

 	if (empty($fname)) { 
 		$errors['fn'] = "First name is required";
	  
	 }
	 if (empty($lname)) { 
 		$errors['ln'] =  "Last name is required";
	  
	 }
	 if (empty($username)) { 
	 	$errors['u'] = "Username is required";
	  
	 }
	if (empty($email)) { 
		$errors['e'] = "Email Address is required";
	  
	 }
	 if (empty($password_1)) { 
	 	$errors['p1'] = "Password is required";
	 
	 }
	 if (empty($password_2)) { 
	 	$errors['p2'] = "Password is required";
 
	 }
	if ($password_1 != $password_2) {
		$errors['p3'] = "Passwords do not match";
	 
	}
	if (empty($contact)) { 
 		$errors['c'] = "Contact Number is required";

	 }

	if (count($errors) == 0) 
	{
		$password = md5($password_1);
		$sel = mysqli_query($con, "SELECT * FROM `account` WHERE Username = '$username'");
		if (mysqli_num_rows($sel) > 0) 
		{
		echo '<script>alert("Registration Failed")</script>';
		}else{
			$query = "INSERT INTO account (  Name,Username, Password , Fname,Lname,Contact_Num,Email_Add) 
			VALUES('$fname','$username', '$password','$fname','$lname','$contact','$email')";
			mysqli_query($con, $query);
			$logged_in_user_id = mysqli_insert_id($con);
		
		}
			echo 
			"<script>
			alert('Registration Complete');
			window.location.href='verify.php';
			</script>";
	}
}

function updateadd(){
	
	global $con, $errors, $street , $barangay, $city, $zip ;

	$id = $_SESSION['id'];
	$city      =  e($_POST['city']);
	$street       =  e($_POST['street']);
	$barangay       =  e($_POST['barangay']);
	$zip     =  e($_POST['zip']);

    if (empty($city)) {
    	$errors['city'] = "City is required";
    }
    if (empty($street)) {
    	$errors['street'] = "Street is required";
    }
    if(empty($barangay)){
    		$errors['barangay'] = "Barangay is required";
    }
       if(empty($zip)){
    		$errors['zip'] = "Zip Code is required";
    }

		if (count($errors) > 0) 
		{
		echo '<script>alert("Registration Failed")</script>';
		}else{
			$query = "UPDATE account SET Street = '$street', Barangay= '$barangay', City= '$city', Zip_Code= '$zip' WHERE Account_ID='$id'";
			$results = mysqli_query($con, $query);
			mysqli_query($con, $query);
			$logged_in_user_id = mysqli_insert_id($con);
			echo "<script>
			alert('Address Complete');
			window.location.href='checkout.php?id=<?php echo $id?>';
			</script>";

		}
	
}

function edit_user_info(){
	
	global $con, $errors, $street , $barangay, $city, $zip, $Account_Image;

	$id       = $_SESSION['id'];
	$city     =  e($_POST['city']);
	$street   =  e($_POST['street']);
	$barangay =  e($_POST['barangay']);
	$zip      =  e($_POST['zip']);
	$Account_Image      =  e($_POST['Account_Image']);

 
  
    // Error message if the input field is left blank
    if (empty($city)) {
    	$errors['city'] = "City is required";
 
    }
    if (empty($street)) {
    	$errors['street'] = "Street is required";
       
    }
    if(empty($barangay)){
    		$errors['barangay'] = "Barangay is required";
    }
       if(empty($zip)){
    		$errors['zip'] = "Zip Code is required";
    }
    if(empty($Account_Image)){
    		$Account_Image = "pic.png";
    }
 
		if (count($errors) > 0) 
		{
		echo '<script>alert("Registration Failed")</script>';
		}else{
			$query = "UPDATE account SET Street = '$street', Barangay= '$barangay', City= '$city', Zip_Code= '$zip', Account_Image='$Account_Image' WHERE Account_ID='$id'";
			$results = mysqli_query($con, $query);
			mysqli_query($con, $query);
			$logged_in_user_id = mysqli_insert_id($con);
			echo "<script>
			alert('Address Complete');
			</script>";

		}
	
}

function getUserById($id){
	global $con;
	$query = "SELECT * FROM account WHERE Account_ID=" . $id;
	$result = mysqli_query($con, $query);

	$user = mysqli_fetch_assoc($result);
	return $user;
}


function e($val){
	global $con;
	return mysqli_real_escape_string($con, trim($val));
}

function display_error() {
	global $errors;

	if (count($errors) > 0){
		echo '<div class="error">';
			foreach ($errors as $error){
				echo $error .'<br>';
			}
		echo '</div>';
	}
}	
function isLoggedIn()
{
	if (isset($_SESSION['user'])) {
		
		return true;
	}else{
		return false;
	}
}

if (isset($_GET['logout'])) {
	session_destroy();
	unset($_SESSION['user']);
	header("location: ../login.php");
	
}
if (isset($_POST['login_btn'])) {
	login();
}

function login(){
    global $con, $username, $password, $errors;

    $maxAttempts = 5; // Maximum number of login attempts

    // Check if the user has already reached the maximum login attempts
    if (isset($_SESSION['login_attempts']) && $_SESSION['login_attempts'] >= $maxAttempts) {
        $lastAttemptTime = $_SESSION['last_attempt_time'];
        $timeRemaining = 300 - (time() - $lastAttemptTime); // 300 seconds = 5 minutes

        if ($timeRemaining > 0) {
            $timeRemainingMinutes = ceil($timeRemaining / 60); // Convert remaining seconds to minutes
            $errors['login_attempts'] = 'You have exceeded the maximum number of login attempts. Please try again in ' . $timeRemainingMinutes . ' minute(s).';
            return;
        } else {
            // Reset the login attempts counter and last attempt time
            unset($_SESSION['login_attempts']);
            unset($_SESSION['last_attempt_time']);
        }
    }

    $username = mysqli_real_escape_string($con, $_POST['username']);
    $password = mysqli_real_escape_string($con, $_POST['password']);



    if (count($errors) == 0) {
        $password = md5($password);
        $query = "SELECT Account_ID, Name, Username, Password, Street, Barangay, City, Zip_Code, Contact_Num, Email_Add, Status, Account_Image FROM account WHERE Username='$username' AND Password='$password' LIMIT 1";
        $results = mysqli_query($con, $query);

        if (mysqli_num_rows($results) == 1) {
            $logged_in_user = mysqli_fetch_assoc($results);
            $_SESSION['user'] = $logged_in_user;
            $_SESSION['admin'] = $logged_in_user;
            $_SESSION['success'] = "You are now logged in";
            $_SESSION['id'] = $logged_in_user['Account_ID'];
            $_SESSION['Street'] = $logged_in_user['Street'];
            $_SESSION['Barangay'] = $logged_in_user['Barangay'];
            $_SESSION['City'] = $logged_in_user['City'];
            $_SESSION['Zip_Code'] = $logged_in_user['Zip_Code'];
            $_SESSION['Contact_Num'] = $logged_in_user['Contact_Num'];
            $_SESSION['Email_Add'] = $logged_in_user['Email_Add'];

            // Reset the login attempts counter and last attempt time
            unset($_SESSION['login_attempts']);
            unset($_SESSION['last_attempt_time']);

            header('location: productstore.php');
            exit();
        } else {
            // Failed login attempt
            // Increment the login attempts counter and update the last attempt time
            if (!isset($_SESSION['login_attempts'])) {
                $_SESSION['login_attempts'] = 1;
            } else {
                $_SESSION['login_attempts']++;
                    // Error message if the input fields are left blank
					    if (empty($username)) {
					        $errors['username'] = "Username is required";
					    }
					    if (empty($password)) {
					        $errors['password'] = "Password is required";
					    }
            }

            $_SESSION['last_attempt_time'] = time();

    		  // Check if the maximum login attempts are reached
		if ($_SESSION['login_attempts'] >= $maxAttempts) {
		    $errors['error'] = "You have exceeded the maximum number of login attempts. Please try again in 5 minutes.";
		} else {
		    $remainingAttempts = $maxAttempts - $_SESSION['login_attempts'];
		    $errors['time_failed'] = "Invalid username/password combination. You have " . $remainingAttempts . " attempt(s) remaining.";
		}

    }
}
}
?>
