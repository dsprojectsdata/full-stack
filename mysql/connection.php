<?php

$host = 'localhost';
$username = 'root';
$password = '';
$db = 'demo';

$con = mysqli_connect($host, $username, $password, $db);
if (!$con) {
      echo "connection failed";
      die;
}

$sql = " INSERT INTO students (name,password,email) VALUES ('asd','1asd23','jack@gmail.com') ";

if (mysqli_query($con, $sql)) {
      echo 'insert successfully';
}

mysqli_close($con);
