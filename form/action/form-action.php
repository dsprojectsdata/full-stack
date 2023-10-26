<?php
include('../config/connection.php');

echo "<pre>";
// print_r($_POST);


if (isset($_POST['submit'])) {

    $fullname =  $_POST['fullname'];
    $email =  $_POST['email'];
    $password = $_POST['password'];

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

    // $profile_img = $_FILES['profile_img'];

    $sql = " INSERT INTO credit_card (fullname,email,password,dob,payment_method,card_no,cvv,expiry_date) VALUES ('$fullname','$email','$password','$dob','$payment_method','$card_no','$cvv','$expiry_date') ";

    // print_r($sql);

    $result = mysqli_query($con, $sql);


    if ($result) {
    } else {
    }

    mysqli_close($con);
    header('location:http://localhost/full-stack/form/');
} else {
    header('location:http://localhost/full-stack/form/');
}
