<?php

session_start();
echo "<pre>";

$username =  $_POST['username'];
$email =  $_POST['email'];
$password = $_POST['password'];
$image = $_FILES['image'];

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

if ($image['name'] == '') {
      $errors['image'] = 'Image field is required';
}


// print_r($image);

$data = ['username' => $username, 'email' => $email, 'password' => $password];
// die;


if (count($errors) == 0) {
      $_SESSION['data'][] = $data;
      move_uploaded_file($image['tmp_name'], '../uploads/' . $image['name']);
}

// die;

//  session_destroy();

$_SESSION['error'] = $errors;

header("location:http://localhost/web-php");
