<?php 
  include 'include/function.php';


     if (isLoggedIn()) {
     header('location: productstore.php');
     exit;
     }


  include 'include/header.php';

  $maxLoginAttempts =5;

// Check if the login attempts session variable is set
if (!isset($_SESSION['login_attempts'])) {
    $_SESSION['login_attempts'] = 0;
}



$remainingTime = isset($_SESSION['last_attempt_time']) ? ($_SESSION['last_attempt_time'] + 300) - time() : 0;
$timeRemainingMinutes = ceil($remainingTime / 60); // Convert remaining time to minutes


?>
<!DOCTYPE html>
<html>
<head>
   <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>RFGElite.</title>
    <link rel="icon" type="image/x-icon" href="Picture/14.png">
    <link rel="stylesheet" href="css/login.css">
    <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
    <link href='https://fonts.googleapis.com/css?family=Lato' rel='stylesheet'>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css">
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css">                         
</head> 
<body>
    <div class="container">
        <div class="forms">
            <div class="form login">
                <span class="title">LOGIN</span>
                    <form method="post"  action="login.php">
                    <div class="input-field">
                        <input type="text" autocomplete="off" placeholder="Enter your Username" name="username" id="username" >
                        <i class="uil uil-envelope icon"></i>
                      </div>
                       <p class="text-danger"><?php if(isset($errors['username'])) echo $errors['username'];?></p>
                       <p class="text-danger"><?php if(isset($errors['failed'])) echo $errors['failed'];?></p>
                    <div class="input-field">
                        <input type="password" autocomplete="off" class="password" placeholder="Enter your password" name="password">
                        <i class="uil uil-lock icon"></i>
                        <i class="uil uil-eye-slash showHidePw"></i>
                    </div>
                      <p class="text-danger"><?php if(isset($errors['password'])) echo $errors['password'];?></p>
                      <p class="text-danger"><?php if(isset($errors['failed'])) echo $errors['failed'];?></p>
                      <p class="text-danger"><?php if(isset($errors['incorrect'])) echo $errors['incorrect'];?></p>
                      <p class="text-danger"><?php if(isset($errors['time_failed'])) echo $errors['time_failed'];?></p>
                    
                      
                     <?php 
                      if ($_SESSION['login_attempts'] >= $maxLoginAttempts) {
                          // Calculate the remaining time until the next login attempt (e.g., 5 minutes)
                          $remainingTime = 5 * 60; // 5 minutes in seconds

                          // Get the timestamp of the next login attempt
                          $nextLoginAttempt = time() + $remainingTime;

                          // Store the next login attempt timestamp in the session
                          $_SESSION['next_login_attempt'] = $nextLoginAttempt;

                          // Display the countdown timer
                          echo '<span id="countdown" class="text-danger"></span>';
                      } else {
                          // Display the login form
                          // ...
                      }

                      ?>

                    <div class="checkbox-text"> 
                    <div class="checkbox-content">
                        <input  type="checkbox" value="rememberme" id="rememberMe">
                        <label for="logCheck" class="text" >Remember me</label>
                    </div>
                        <a href="forgot.php" class="text" style="color:black;">Forgot password?</a>
                    </div>

                  <div class="input-field buttons">
                      <input value="Login" type="submit" class="btn" name="login_btn" onclick="lsRememberMe()" <?php if (isset($_SESSION['login_attempts']) && $_SESSION['login_attempts'] >= 5 && time() - $_SESSION['last_attempt_time'] < 300) echo 'disabled'; ?>>
                  </div>

                <div class="login-signup">
                    <span class="text">Not a member?
                        <a href="verify.php" class="text signup-link">Sign Up</a>
                    </span>
                </div>
           </form>
          </div>
    </div>
<script>
    // Get the countdown element
  var countdownElement = document.getElementById('countdown');

  // Set the countdown duration in seconds (5 minutes = 300 seconds)
  var countdownDuration = 300;

  // Update the countdown every second
  var countdownInterval = setInterval(updateCountdown, 1000);

  // Function to update the countdown
  function updateCountdown() {
  var remainingTime = <?php echo isset($timeRemainingMinutes) ? $timeRemainingMinutes : 0; ?>;
  
  if (remainingTime > 0) {
    countdownElement.innerHTML = 'Retry in ' + remainingTime + ' minute(s)';
    remainingTime--;
  } else {
    clearInterval(countdownInterval);
    countdownElement.innerHTML = '';
    // Reload the page
   
  }
}

const rmCheck = document.getElementById("rememberMe"),
      username = document.getElementById("username");

if (localStorage.checkbox && localStorage.checkbox !== "") {
  rmCheck.setAttribute("checked", "checked");
  username.value = localStorage.username;
} else {
  rmCheck.removeAttribute("checked");
  username.value = "";
}

function lsRememberMe() {
  if (rmCheck.checked && username.value !== "") {
    localStorage.username = username.value;
    localStorage.checkbox = rmCheck.value;
  } else {
    localStorage.username = "";
    localStorage.checkbox = "";
  }
}
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
</script>
</body>
</html>