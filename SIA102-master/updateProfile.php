<?php
include 'includes/session.php';



if(isset($_POST['submit'])){
  $name = mysqli_real_escape_string($con, $_POST['fullname']);
  $fname = mysqli_real_escape_string($con, $_POST['fname']);
  $lname = mysqli_real_escape_string($con, $_POST['lname']);
  $street = mysqli_real_escape_string($con, $_POST['street']);
  $barangay = mysqli_real_escape_string($con, $_POST['barangay']);
  $city = mysqli_real_escape_string($con, $_POST['city']);
  $zipcode = mysqli_real_escape_string($con, $_POST['zipcode']);
  $contact = mysqli_real_escape_string($con, $_POST['contact']);
  $email_add = mysqli_real_escape_string($con, $_POST['email_add']);
  $username = mysqli_real_escape_string($con, $_POST['username']);


  if(empty($name) || empty($fname) || empty($lname) || empty($street) || empty($barangay) || empty($city) || empty($zipcode) || empty($contact) || empty($email_add) || empty($username)){
    echo '<script language="javascript">';
    echo 'alert("Please fill all fields!")';
    echo '</script>';
  }else{
    $sql = "UPDATE account SET Name = '$name', Username = '$username', Fname = '$fname', Lname ='$lname',Contact_Num ='$contact',Email_Add = '$email_add',Street ='$street',Barangay='$barangay',City='$city',Zip_Code='$zipcode' WHERE Account_ID = $sessionid";
    $result = mysqli_query($con,$sql);
    header("location: user-profile.php?updatesuccess");
  }

}
else
{
  header('location: index.php');
  die();
}