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
    $id = $_GET['id'];

    if ($_FILES['profile_img']['name'] != '') {
        $profile_img = time() . '-' . $_FILES['profile_img']['name'];
    }

    $sql = " UPDATE credit_card SET fullname='$fullname' WHERE id = '$id' ";
    $result = mysqli_query($con, $sql);

    if ($_FILES['profile_img']['name'] != '') {
            $query = " UPDATE credit_card SET profile_img='$profile_img' WHERE id = '$id' ";
            $result = mysqli_query($con, $query);

            move_uploaded_file($_FILES['profile_img']['tmp_name'],"../assets/uploads/$profile_img");
    }

    if ($result) {
        move_uploaded_file($_FILES['profile_img']['tmp_name'], "../assets/uploads/$profile_img");
        $_SESSION['success'] = 'Form updated Successfully';
    } else {
        
    }

    mysqli_close($con);
    header('location:http://localhost/full-stack/form/edit.php?id=' . $id);
} else {
    header('location:http://localhost/full-stack/form/edit.php?id=' . $id);

}
