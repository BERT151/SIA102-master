
<?php

include('includes/head.php');

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <script src="jquery-3.3.1.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"></script>

  <title>Sign Up</title>
  <style>
    @import url('https://fonts.googleapis.com/css2?family=Montserrat&family=Poppins:wght@200;300&family=Roboto:wght@300&display=swap');
    *{
      font-family: 'Roboto';
    }
    body{
      height: 80vh;
      box-sizing: border-box;
    }
section{
  display: flex;
  justify-content: center;
  align-items: center;
  margin-top: 100px;
}
.profile-button{
  padding: 10px;
  font-size: 17px;
  background-color: #0000ff;
  border-radius: 7px;
  font-weight: bold;
  color:#ffffff;
  width: 100%;
  cursor: pointer;
}
form{
  border: 3px solid rgba(255, 255, 255,0.3);
  height: 80.5vh;
  border-left: none;
  background: rgba(255, 255, 255,0.3);
  border-top-right-radius: 16px;
  border-bottom-right-radius: 16px;
  box-shadow: 0 4px 30px rgba(0, 0, 0, 0.4);
  padding: 70px;
  
}
label{
  font-size: 16px;
}
.form-control{
  padding: 20px;
  font-size: 15px;
}
.toLogin:hover{
  color:#0000ff;
  text-decoration: underline;
}
@media(max-width:1100px){
  section{
  display: flex;
  flex-direction: column;
}
.image-section{
  display: none;
}
form{
  height: 100vh;
  border-radius: 16px;
}
}
  </style>
</head>
<body>
  


<section >
<div class="image-section">
  <img src="./images/signup-bg.jpg">
</div>


                    <form action="register.php" method="POST" >
                                      
                    <br>
                      <div class="p-3 py-5">
                          <div class=" mb-3">
                          <h4 class="text-left " style="font-size:40px;">SIGN UP</h4>
                          <h5 class="text-left " style="font-size:20px; color:darkgray;">Create your own account</h5>
                      </div>
                      <br>
                  <?php
                  $errorMessage = '';
                  if(isset($_GET['error'])){
                    $error = $_GET['error'];
                    if($error == 'passswordDoesNotMatch'){
                      $errorMessage = 'Password does not match!';
                      

                    }
                  }
                  ?>
                  <h4 class="text-center " style="font-size:20px; color:red;"><?= $errorMessage ?></h4>
                <div class="row mt-7">
                    
                        <div class="col-md-6 p-6">
                            <label class="labels">Firstname</label>
                            <input type="text" class="form-control" value="" name="Firstname" required>
                        </div>
                        <div class="col-md-6">
                            <label class="labels">Lastname</label>
                            <input type="text" class="form-control" name="Lastname" value=" " required>
                        </div>
                        <div class="col-md-6">
                            <label class="labels">Username</label>
                            <input type="text" class="form-control" name="Username" value=" " required>
                        </div>
                        <div class="col-md-6">
                            <label class="labels">Email</label>
                            <input type="text" class="form-control" name="Email" value="" required>
                        </div>
                  </div>

                <div class="row mt-2">
                    <div class="col-md-12">
                        <label class="labels">Password</label>
                        <input type="password" class="form-control"  value="" name="Password" required id="myInput">
                        <br>
                        <input type="checkbox" onclick="myFunction()">&nbsp;Show Password
                      </div>

                    <div class="col-md-12">
                        <label class="labels">Re-Enter Password</label>
                        <input type="password" class="form-control" value="" name="Re-Password" required>
                    </div>
                    
                </div>
                <div class="mt-5 text-center" ><button class="btn-primary profile-button" type="submit" name="submit">Sign Up</button></div>
                <br>
                <h4 class="text-center" style="font-size:20px;">&nbsp;Already have account?<a href="newLogin-Form.php" class="toLogin">&nbsp;LogIn</a></h4>
                <p class="mt-1 mb-3 text-muted text-center">&copy; 2023 up to present</p>
              </div>    
          </div>
                    </form>

                    <script>
                      function myFunction() {
                      var x = document.getElementById("myInput");
                      if (x.type === "password") {
                        x.type = "text";
                      } else {
                        x.type = "password";
                      }
                    }

                    </script>

<!-- <section>
  <div class="main-section">
  <div class="img">
    <img src="./images/signup-bg.jpg" alt="">
  </div>
  <form accept="" method="POST" class="signup-form">
    <div class="title-section">
      <h1 class="title">
        SIGN UP
      </h1>
      <h2 class="sub-title">
        Create your own account
      </h2>
    </div>
    <div class="personal-info">
      
      <p class="label">Firstname</p>
      <input type="text" name="firstname">
      <p class="label">Lastname</p>
      <input type="text" name="Lastname">
      <p class="label">Username</p>
      <input type="text" name="Username">
      <p class="label">Email</p>
      <input type="text" name="Email">
    </div>
  </form>
  </div>
</section> -->
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

</body>
</html>