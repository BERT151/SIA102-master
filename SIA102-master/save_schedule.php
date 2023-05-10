<?php
require_once('connection.php');
if ($_SERVER['REQUEST_METHOD'] != 'POST') {
    echo "<script> alert('Error: No data to save.'); location.replace('./') </script>";
    $con->close();
    exit;
}
extract($_POST);
$allday = isset($allday);


if (empty($id)) {
    $sql = "INSERT INTO appointmenttbl (email,`serviceID`,`staffID`,`start_datetime`,`end_datetime`) VALUES ('$email',$service,$staff,'$start_datetime','$end_datetime')";
} else {
    $sql = "UPDATE appointmenttbl set serviceID = '{$service}', start_datetime = '{$start_datetime}', end_datetime = '{$end_datetime}',`staffID` = '{$staff}' where id = '{$id}'";
}
$save = $con->query($sql);
if ($save) {
    echo "<script> alert('Schedule Successfully Saved.'); location.replace('./') </script>";
} else {
    echo "<pre>";
    echo "An Error occured.<br>";
    echo "Error: " . $con->error . "<br>";
    echo "SQL: " . $sql . "<br>";
    echo "</pre>";
}
$con->close();
?>