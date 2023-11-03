<?php
include('layout/header.php');
echo "<pre>";
session_start();

if (isset($_SESSION['email'])) {
    header('location:http://localhost/full-stack/form/dashboard.php');
}


$error = $_SESSION['error'];

// print_r($error);
// die;
echo "</pre>";

?>
<section class="credit-form">
    <div class="container">
        <div class="credit-form-block">
            <form method="post" action="action/login-action.php" enctype="multipart/form-data">
                <div class="row">
                    <p class="text-red"><b><?php
                                            if (isset($_SESSION['error_msg'])) {
                                                echo $_SESSION['error_msg'];
                                            };
                                            unset($_SESSION['error_msg']);
                                            ?></b></p>
                    <h1>Login </h1>
                    <div class="input-group input-group-icon">
                        <input type="text" name="email" placeholder="Email Adress" value="jack@gmail.com" />
                        <div class="input-icon">
                            <i class="fa fa-envelope"></i>
                        </div>
                        <p class="error"><?php
                                            if (isset($error['email'])) {
                                                echo $error['email'];
                                                unset($_SESSION['error']['email']);
                                            }

                                            ?></p>
                    </div>
                    <div class="input-group input-group-icon">
                        <input type="password" name="password" placeholder="Password" value="123" />
                        <div class="input-icon">
                            <i class="fa fa-key"></i>
                        </div>
                        <p class="error"><?php
                                            if (isset($error['password'])) {
                                                echo $error['password'];
                                                unset($_SESSION['error']['password']);
                                            }

                                            ?></p>
                    </div>
                </div>

                <div class="row">
                    <div class="input-group">
                        <input type="submit" name="submit" />
                    </div>
                </div>
            </form>
        </div>
    </div>
</section>
<?php
include('layout/footer.php');
?>