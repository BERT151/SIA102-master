<?php
session_start();
require_once '../connection.php';
$id = $_SESSION['id'];

$fileName = '../profile-pictures/profile' .$id. '*';
$fileInfo = glob($fileName);
$fileExt = explode(".", $fileInfo[0]);
$fileActualExt = $fileExt[1];

$file = '../profile-pictures/profile' .$id. '.' .$fileActualExt;

if(!unlink($file)) {
    echo 'File was not deleted.';
}else {
    echo 'File was deleted.';
}

$sql = "UPDATE account SET Account_Image = 0 WHERE Account_ID = $id;";
mysqli_query($con, $sql);

header('location: ../user-profile.php');
die();