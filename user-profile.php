<?php require_once('connection.php') ?>
<?php

include('includes/head.php');
include('includes/preloader.php');
include('includes/header.php');
?>

    <main>
        <!--? Hero Start -->
        <div class="slider-area2">
            <div class="slider-height2 d-flex align-items-center">
                <div class="container">
                    <div class="row">
                        <div class="col-xl-12">
                            <div class="hero-cap hero-cap2 pt-70 text-center">
                                <h2>User Profile</h2>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Hero End -->
       <style>
         .custome-file{
        border:2px solid #ccc;
        border-radius:10px;
        margin-bottom: 5px;

    }
    .custome-file::-webkit-file-upload-button{
        background:#444;
        color:#fff;
        padding:5px;
        border:none;
        border-radius:10px;
        
    }
    button{
                border: none;
                padding: 5px;
                border-radius:5px;
                background:#444;
                color: #fff;
                cursor: pointer;
            }
            button:hover{
                background: #2C73D2;
            }
            .form-control{
              padding:15px;
            }
       </style>
        <!-- User profile  Area start -->
        <section>


          <div class="container rounded bg-white mt-5 mb-3">
            <div class="row">
              <div class="col-md-3 border-right">

                <div class="d-flex flex-column align-items-center text-center p-3 py-5">

                <?php
if(isset($_SESSION['id'])){
    $id = $_SESSION['id'];
    $sql = "SELECT * FROM account WHERE Account_ID = $id";
    $result = mysqli_query($con,$sql);
    if(mysqli_num_rows($result) > 0) {
        while($row = mysqli_fetch_assoc($result)) {
            $Account_ID  =$row['Account_ID'];
            $Name = $row['Name'];
            $Username = $row['Username'];
            $Password = $row['Password'];
            $Status = $row['Status'];
            $Fname = $row['Fname'];
            $Lname = $row['Lname'];
            $Contact_Num = $row['Contact_Num'];
            $Email_Add = $row['Email_Add'];
            $Street = $row['Street'];
            $Barangay = $row['Barangay'];
            $City = $row['City'];
            $Zip_Code = $row['Zip_Code'];
            $Account_Image = $row['Account_Image'];
            

            if($Account_Image == 1) {
                $fileName = 'profile-pictures/profile' .$Account_ID. '.*';
                $fileInfo = glob($fileName);
                $fileExt = explode(".", $fileInfo[0]);
                $fileActualExt = $fileExt[1];
                echo '<img src="profile-pictures/profile' .$Account_ID. '.' .$fileActualExt. '?' .mt_rand(). '" alt="" class="rounded-circle mt-5" width="120px">';
                echo '<form action="includes/deleteProfile.php" method="POST">';
                echo '<br/>';
                echo '<button type="submit" name="submit-delete" class="del-btn">Delete Profile Image</button>';
                echo '<br/>';
                echo '</form>';
            }else{
                echo ' ';
            }

           echo ' <form action="upload.php" method="POST" enctype="multipart/form-data" class="choose-image">';
                  echo ' <input type="file" name="file" class="custome-file">';
                   echo ' <button type="submit" name="submit">Upload</button>  ';
                    echo '</form>';

                    echo '<form action="updateProfile.php" method="POST">';
                  echo ' <span class="font-weight-bold">'.$Email_Add.'</span><br>';

                   echo ' <span class="text-black-50">'.$Name.'</span>;';
        
                   echo'<br/>';
                  echo ' <span class="text-black-50">'.$Status.'</span><br>';
                  echo '</div>';
                echo '</div>';

               echo ' <div class="col-md-5 border-right">';
               echo '  <div class="p-3 py-5">';
                   echo '<div class="d-flex justify-content-between align-items-center mb-3">';
                    echo '<h4 class="text-right">Profile Settings</h4>';
               echo ' </div>';
               echo ' <div class="row mt-7">';
               echo ' <div class="col-md-12">';
                   echo ' <label class="labels">Fullname</label>';
                   echo ' <input type="text" class="form-control" placeholder="Fullname" value="'.$Name.'" name="fullname" required>';
               echo ' </div>';
                    echo '<div class="col-md-6">';
                       echo '<label class="labels">Firstname</label>';
                        echo '<input type="text" class="form-control" placeholder="Firstname" value="'.$Fname.'" name="fname" required>';
                    echo '</div>';
                   echo ' <div class="col-md-6">';
                        echo '<label class="labels">Lastname</label>';
                       echo '<input type="text" class="form-control"  placeholder="Lastname" name="lname" value="'.$Lname.'" required>';
                   echo ' </div>';
                   echo ' <div class="col-md-6">';
                       echo '<label class="labels">Street</label>';
                       echo ' <input type="text" class="form-control" placeholder="Street"  name="street" value="'.$Street.'" required>';
                   echo ' </div>';
                   echo ' <div class="col-md-6">';
                       echo ' <label class="labels">Barangay</label>';
                       echo ' <input type="text" class="form-control" placeholder="Barangay"  name="barangay" value="'.$Barangay.'" required>';
                   echo ' </div>';
                   echo ' <div class="col-md-6">';
                       echo ' <label class="labels">City</label>';
                       echo ' <input type="text" class="form-control" placeholder="City" name="city" value="'.$City.'" required>';
                    echo '</div>';
                    echo '<div class="col-md-6">';
                       echo ' <label class="labels">ZipCode</label>';
                       echo ' <input type="text" class="form-control" placeholder="ZipCode" name="zipcode" value="'.$Zip_Code.'" required>';
                 echo ' </div>';
                  echo '</div>';
               echo '<div class="row mt-3">';
                  echo '  <div class="col-md-12">';
                       echo ' <label class="labels">Contact Number</label>';
                        echo '<input type="text" class="form-control" placeholder="Contact Number" value="'.$Contact_Num.'" name="contact" required>';
                   echo ' </div>';
                    echo '<div class="col-md-12">';
                       echo ' <label class="labels">Email Address</label>';
                       echo ' <input type="text" class="form-control" placeholder="Email Address" value="'.$Email_Add.'" name="email_add" required>';
                   echo ' </div>';
                   echo ' <div class="col-md-12">';
                       echo ' <label class="labels">Username</label>';
                        echo '<input type="text" class="form-control" placeholder="Username" name="username" value="'.$Username.'" required>';
                   echo ' </div>';
                    echo '<div class="col-md-12">';
                       echo ' <label class="labels">Password</label>';
                       echo ' <input type="password" class="form-control" placeholder="Password" name="password" value="'.$Password.'" required>';
                    echo '</div>';
               echo ' </div>';
                echo '<div class="mt-5 text-center"><button class="btn btn-primary profile-button" type="submit" name="submit">Save Profile</button></div>';
           echo ' </div> ';
          echo '</div>';
          echo ' </div> ';
         echo ' </div>';
          echo '</div>';
         echo ' </div>';
        echo '</section>';
        echo '</form>';


            

        }
    }
}



?>






    </main>
<?php
include 'includes/footer.php';
include 'includes/scripts.php';
?>