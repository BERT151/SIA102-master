<?php

function edit_user_info(){
	
	global $db, $errors, $street , $barangay, $city, $zip ;

	$id       = $_SESSION['id'];
	$city     =  e($_POST['city']);
	$street   =  e($_POST['street']);
	$barangay =  e($_POST['barangay']);
	$zip      =  e($_POST['zip']);



    // $username = mysqli_real_escape_string($db, $_POST['username']);
    // $password = mysqli_real_escape_string($db, $_POST['password']);
  
    // Error message if the input field is left blank
    if (empty($city)) {
    	$errors['city'] = "City is required";
        // array_push($errors, "Username is required");
    }
    if (empty($street)) {
    	$errors['street'] = "Street is required";
        // array_push($errors, "Password is required");
    }
    if(empty($barangay)){
    		$errors['barangay'] = "Barangay is required";
    }
       if(empty($zip)){
    		$errors['zip'] = "Zip Code is required";
    }

	// if (empty($username)) { 
		// array_push($errors, "Username is required"); 
	// }

	// if (empty($email)) { 
		// array_push($errors, "Email is required"); 
	// }
	// if (empty($password_1)) { 
		// array_push($errors, "Password is required"); 
	// }
	// if ($password_1 != $password_2) {
		// array_push($errors, "The two passwords do not match");
	// }

		if (count($errors) > 0) 
		{
		echo '<script>alert("Registration Failed")</script>';
		}else{
			$query = "UPDATE account SET Street = '$street', Barangay= '$barangay', City= '$city', Zip_Code= '$zip' WHERE Account_ID='$id'";
			$results = mysqli_query($db, $query);
			mysqli_query($db, $query);
			$logged_in_user_id = mysqli_insert_id($db);
			echo "<script>
			alert('Address Complete');
			window.location.href='/SIA102/checkout.php?id=<?php echo $id?>';
			</script>";

		}
	
}


?>