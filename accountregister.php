<?php 
   require 'include/function.php';  
     if (!isLoggedIn()) {
     $_SESSION['msg'] = "You must log in first";
     header('location:  ../login.php');
     exit;
     }
?>
<?php 
    include'include/header.php';
?>
<!DOCTYPE html>
<html>
<head>
   <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>RFGElite.</title>
	<link rel="icon" type="image/x-icon" href="Picture/14.png">
    <link rel="stylesheet" href="/RFGELITE/css/register.css">
    <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
	<link href='https://fonts.googleapis.com/css?family=Lato' rel='stylesheet'>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
	<link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css">
</head>	
<body>
     
    <div class="container">
        <div class="forms">
            <div class="form login">
                <span class="title">REGISTRATION</span>
					<div class="row">
                    <form method="post">
                    <div class="column">
					<div class="input-field">
                        <input type="text" autocomplete="off" onkeypress="return /[a-z]/i.test(event.key)" onkeyup="this.value = this.value.toUpperCase()" placeholder="Enter your First Name" name="fname">
                        <i class="uil uil-user"></i>
                    </div>
                     <p class="text-danger"><?php if(isset($errors['fn'])) echo $errors['fn'];?></p>
					<div class="input-field">
                        <input type="text" autocomplete="off" onkeypress="return /[a-z]/i.test(event.key)" onkeyup="this.value = this.value.toUpperCase()" placeholder="Enter your Last Name" name="lname">
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
                        <input type="email" autocomplete="off" placeholder="Enter your email" name="email">
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
					<a href="../login.php" class="text login-link" >Login now</a>
                    </span>
					</div>
                    </div>
					</div>
                </form>
			 </div>	
            </div>	
        </div>

<script>

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