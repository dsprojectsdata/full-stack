<?php
include('../config/connection.php');
session_start();
echo "<pre>";

if (isset($_POST['submit'])) {

    $fullname =  $_POST['fullname'];
    $email =  $_POST['email'];
    $password = $_POST['password'];
    $gender = $_POST['gender'];

    $date = $_POST['date'];
    $month = $_POST['month'];
    $year =  $_POST['year'];
    $dob = $year . '-' . $month . '-' . $date;

    $payment_method =  $_POST['payment_method'];
    $card_no = $_POST['card_no'];
    $cvv = $_POST['cvv'];
    $expiry_date = $_POST['expiry_date'];
    $expiry_month = $_POST['expiry_month'];
    $expiry_year = $_POST['expiry_year'];

    $expiry_date = $expiry_year . '-' . $expiry_month . '-' . $expiry_date;

    $profile_img = time() . '-' . $_FILES['profile_img']['name'];

    $terms = '';
    if (isset($_POST['terms'])) {
        $terms = $_POST['terms'];
    }

    $errors = [];

    if ($fullname == '') {
        $errors['fullname'] = "Fullname is requrired";
    }

    if ($email == '') {
        $errors['email'] = "Email is requrired";
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errors['email'] = "Invalid email";
    }

    if ($date == '') {
        $errors['date'] = "Required";
    } elseif ($date < 1 || $date > 31) {
        $errors['date'] = "Invalid";
    }
    if ($month == '') {
        $errors['month'] = "Required";
    } elseif ($month < 1 || $month > 12) {
        $errors['month'] = "Invalid";
    }
    if ($year == '') {
        $errors['year'] = "Required";
    } elseif ($year > (date('Y'))) {
        $errors['year'] = "Invalid";
    }

    if ($_FILES['profile_img']['name'] == '') {
        $errors['profile_img'] = "Required";
    }

    if ($terms == '') {
        $errors['terms'] = "Required";
    }

    if (count($errors) > 0) {
        $_SESSION['error']  = $errors;
        header('location:http://localhost/full-stack/form/');
    } else {
        $query =  "SELECT * FROM users WHERE email = '$email'";
        $result = mysqli_query($con, $query);

        if (mysqli_num_rows($result)) {
            $errors['email'] = "Email already exists";
            $_SESSION['error']  = $errors;
            header('location:http://localhost/full-stack/form/');
        } else {
            $sql = " INSERT INTO users (fullname,email,password,gender,dob,payment_method,card_no,cvv,expiry_date,profile_img) VALUES ('$fullname','$email','$password','$gender','$dob','$payment_method','$card_no','$cvv','$expiry_date','$profile_img') ";

            $result = mysqli_query($con, $sql);

            if ($result) {
                move_uploaded_file($_FILES['profile_img']['tmp_name'], "../assets/uploads/$profile_img");
                $_SESSION['success'] = 'Form saved Successfully';
                // die;
            } else {
            }

            mysqli_close($con);
            header('location:http://localhost/full-stack/form/');
        }
    }
} else {
    header('location:http://localhost/full-stack/form/');
}
