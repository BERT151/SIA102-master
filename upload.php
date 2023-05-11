<?php
session_start();
include('connection.php');
$id = $_SESSION['id'];



if(isset($_POST['submit'])){
  $file = $_FILES['file'];
  

  $file = $_FILES['file'];
  $fileName = $_FILES['file']['name'];
  $fileTmpName = $_FILES['file']['tmp_name'];
  $fileSize = $_FILES['file']['size'];
  $fileError = $_FILES['file']['error'];
  $fileType = $_FILES['file']['type'];

  $fileExt = explode('.', $fileName);
  $fileActualExt = strtolower(end($fileExt));

  $allowed = array('jpg', 'jpeg', 'png');

if(in_array($fileActualExt,$allowed)){
  if($fileError === 0){
    if($fileSize < 1000000){
      $fileNameNew = "profile".$id.".".$fileActualExt;
      $fileDestination = 'profile-pictures/'.$fileNameNew;
      move_uploaded_file($fileTmpName,$fileDestination);
      $sql = "UPDATE account SET Account_Image = 1 where Account_ID = $id;";
      $result = mysqli_query($con,$sql);
     header("location:user-profile.php?uploadsuccess");
    }else{
      echo "Your file is too big!";
    }
  }
  else{
    echo "There was an error uploading your file!";
  }
}else{
  echo "You cannot upload files of this type!";
}
}else
{
  header('location: index.php');
  die();
}

?>