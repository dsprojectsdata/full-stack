<?php

session_start();
echo "<pre>";

$db_host = 'localhost';
$db_username = 'root';
$db_password = '';
$db = 'demo';

$con = mysqli_connect($db_host, $db_username, $db_password, $db);
if (!$con) {
      echo "Error connecting";
      die;
}

$sql = " DELETE from students WHERE id = 12 ";

$result = mysqli_query($con, $sql);

if(mysqli_affected_rows($con)){
      echo 'Deleted successfully';
}else{
      echo 'No data changed';
}

mysqli_close($con);
