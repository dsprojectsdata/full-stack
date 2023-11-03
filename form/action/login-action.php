<?php
include('../config/connection.php');
session_start();
echo "<pre>";

if (isset($_POST['submit'])) {

    $email =  $_POST['email'];
    $password = $_POST['password'];

    $errors = [];



    if ($email == '') {
        $errors['email'] = "Email is requrired";
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errors['email'] = "Invalid email";
    }

    if ($password == '') {
        $errors['password'] = "Password is requrired";
    }

    if (count($errors) > 0) {
        $_SESSION['error']  = $errors;
        header('location:http://localhost/full-stack/form/login.php');
    } else {

        $query =  "SELECT * FROM users WHERE email = '$email' AND password = '$password'";
        $result = mysqli_query($con, $query);

        if (mysqli_num_rows($result)) {
            $_SESSION['email'] = $email;
            header('location:http://localhost/full-stack/form/dashboard.php');
        } else {
            $_SESSION['error_msg']  = "Invalid Email or password";
            header('location:http://localhost/full-stack/form/login.php');
        }
die;
        mysqli_close($con);
        header('location:http://localhost/full-stack/form/login.php');
    }
} else {
    header('location:http://localhost/full-stack/form/login.php');
}
