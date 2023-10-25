<?php

session_start();
echo "<pre>";

print_r($_POST);

$username =  $_POST['username'];
$email =  $_POST['email'];
$password = $_POST['password'];
$image = $_FILES['image'];
$class = $_POST['class'];
$gender = $_POST['gender'];
$sport = json_encode($_POST['sport'], JSON_FORCE_OBJECT);


$errors = [];

if ($username == '') {
      $errors['username'] = 'Username field is required';
}

if ($email == '') {
      $errors['email'] = 'Email field is required';
}

if ($password == '') {
      $errors['password'] = 'Password field is required';
}


if (count($errors) == 0) {
      // move_uploaded_file($image['tmp_name'], '../uploads/' . $image['name']);

      $db_host = 'localhost';
      $db_username = 'root';
      $db_password = '';
      $db = 'demo';

      $con = mysqli_connect($db_host, $db_username, $db_password, $db);
      if (!$con) {
            echo "Error connecting";
            die;
      }

      $sql = "INSERT INTO students (name,email,password,class,gender,sport) VALUES ('$username','$email','$password','$class','$gender','$sport')";

      $result = mysqli_query($con, $sql);

      if ($result) {
            $_SESSION['result_status'] = 'Data submitted successfully';
      }

      mysqli_close($con);
}







// if ($image['name'] == '') {
//       $errors['image'] = 'Image field is required';
// }


// print_r($image);

// $data = ['username' => $username, 'email' => $email, 'password' => $password];
// die;




// die;

//  session_destroy();

$_SESSION['error'] = $errors;

header("location:../index.php");
