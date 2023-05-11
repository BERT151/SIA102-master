<?php
  require 'cart/check_if_added.php';
  require 'include/connection.php';  
  require 'include/function.php';  
  include 'include/header.php';
?>
<head>
  <title>Party Needs</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
   <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css">
   <link rel="stylesheet" href="css/address.css">
  
</head>
 <div class="container">
        <div class="forms">
               <div class="form signup">
               <span class="title">Address Info</span>
               <div class="row">
               <form method="post">
               <div class="column">
               <div class="input-field">
               <i class="fas fa-address-card"></i>
               <input type="text" autocomplete="off"  placeholder="Enter your Street"  name="street" minlength="4" maxlength="25" required >
            
               <p class="text-danger"><?php if(isset($errors['S'])) echo $errors['S'];?></p>
                    </div>
           <div class="input-field">
            <i class="fas fa-address-card"></i>
                        <input type="text" autocomplete="off" placeholder="Enter your Barangay"  name="barangay" minlength="4" maxlength="25"   required >
                             <p class="text-danger"><?php if(isset($errors['b'])) echo $errors['b'];?></p>
                    </div>                    
          <div class="input-field button">
                    <input type="submit" class="btnR" name="add_btn" onclick="myFunction()" value="Complete" required>
                    </div>
        
          </div>
          <div class="columns">

          <div class="input-field">
              <i class="fas fa-city"></i>
                        <input type="text" autocomplete="off" onkeypress="return /^[a-zA-Z-_ ]*$/i.test(event.key)" placeholder="Enter your City"  name="city" minlength="5" maxlength="25" required>   
                        <p class="text-danger"><?php if(isset($errors['city'])) echo $errors['city'];?></p>
                    </div>
          <div class="input-field">
                  <i class="uil uil-user"></i>
                        <input type="text" autocomplete="off" onkeypress="return restrictAlphabets(event)" placeholder="Enter your ZIP code" minlength="4" maxlength="4" name="zip"  required>
                  
             <p class="text-danger"><?php if(isset($errors['zip'])) echo $errors['zip'];?></p>
                    </div>
                </div>
                </form>
        </div>
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
function CheckPassword(inputtxt) 
{ 
var passw = /^(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{6,20}$/;
if(inputtxt.value.match(passw)) 
{ 
alert('Correct, try another...')
return true;
}
else
{ 
alert('Wrong...!')
return false;
}
}

 
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
 