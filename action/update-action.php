<?php

session_start();
echo "<pre>";

// print_r($_POST);
// print_r($_GET);
// die;


$username =  $_POST['username'];
$email =  $_POST['email'];
$password = $_POST['password'];
$id = $_GET['id'];


// MYSQL
$db_host = 'localhost';
$db_username = 'root';
$db_password = '';
$db = 'demo';

$con = mysqli_connect($db_host, $db_username, $db_password, $db);
if (!$con) {
      echo "Error connecting";
      die;
}

$sql = " UPDATE students SET name = '$username',password= '$password',email='$email' WHERE id = $id";

$result = mysqli_query($con, $sql);

if (mysqli_affected_rows($con)) {
      echo 'Updated successfully';
} else {
      echo 'No data changed';
}
      

mysqli_close($con);

header('location:../edit.php?id=' . $id);
