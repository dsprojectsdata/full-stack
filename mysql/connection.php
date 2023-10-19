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

// $sql = " INSERT INTO students (name,password,email) VALUES ('jack','123','jack@gmail.com') ";

$sql = " SELECT * FROM students";

// "select columnName FROM tableName"

$result = mysqli_query($con, $sql);

echo "<pre>";
print_r($result->fetch_assoc());




// if (mysqli_query($con, $sql)) {
//       echo 'insert successfully';
// }

mysqli_close($con);


