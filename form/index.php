<?php
include('layout/header.php');
echo "<pre>";
session_start();

$error = $_SESSION['error'];

// print_r($error);
// die;
echo "</pre>";

?>
<section class="credit-form">
    <div class="container">
        <div class="credit-form-block">
            <form method="post" action="action/form-action.php" enctype="multipart/form-data">
                <div class="row">
                    <p class="text-green"><b><?php
                                                if (isset($_SESSION['success'])) {
                                                    echo $_SESSION['success'];
                                                };
                                                unset($_SESSION['success']);
                                                ?></b></p>
                    <h1>Add Details</h1>
                    <h4>Account</h4>
                    <div class="input-group input-group-icon">
                        <input type="text" name="fullname" placeholder="Full Name" />
                        <div class="input-icon">
                            <i class="fa fa-user"></i>
                        </div>
                        <p class="error"><?php 
                        if(isset($error['fullname'])){
                            echo $error['fullname'];
                            unset($_SESSION['error']['fullname']);
                        }
                        ?></p>
                    </div>
                    <div class="input-group input-group-icon">
                        <input type="text" name="email" placeholder="Email Adress" />
                        <div class="input-icon">
                            <i class="fa fa-envelope"></i>
                        </div>
                        <p class="error"><?php 
                        if(isset($error['email'])){
                            echo $error['email'];
                            unset($_SESSION['error']['email']);
                        }
                    
                        ?></p>
                    </div>
                    <div class="input-group input-group-icon">
                        <input type="password" name="password" placeholder="Password" />
                        <div class="input-icon">
                            <i class="fa fa-key"></i>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-half">
                        <h4>Date of Birth</h4>
                        <div class="input-group">
                            <div class="col-third">
                                <input type="text" placeholder="DD" name="date" />
                                <p class="error"><?php 
                        if(isset($error['date'])){
                            echo $error['date'];
                            unset($_SESSION['error']['date']);
                        }
                        ?></p>
                            </div>
                            <div class="col-third">
                                <input type="text" placeholder="MM" name="month" />

                                <p class="error"><?php 
                        if(isset($error['month'])){
                            echo $error['month'];
                            unset($_SESSION['error']['month']);
                        }
                        ?></p>
                            </div>
                            <div class="col-third">
                                <input type="text" placeholder="YYYY" name="year" />
                                <p class="error"><?php 
                        if(isset($error['year'])){
                            echo $error['year'];
                            unset($_SESSION['error']['year']);
                        }
                        ?></p>
                            </div>
                        </div>
                    </div>
                    <div class="col-half">
                        <h4>Gender</h4>
                        <div class="input-group">
                            <input id="gender-male" type="radio" name="gender" value="male" checked/>
                            <label for="gender-male">Male</label>
                            <input id="gender-female" type="radio" name="gender" value="female" />
                            <label for="gender-female">Female</label>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <h4>Payment Details</h4>
                    <div class="input-group">
                        <input id="payment-method-card" type="radio" name="payment_method" value="card" checked="true" />
                        <label for="payment-method-card"><span><i class="fa fa-cc-visa"></i>Credit
                                Card</span></label>
                        <input id="payment-method-paypal" type="radio" name="payment_method" value="paypal" />
                        <label for="payment-method-paypal">
                            <span><i class="fa fa-cc-paypal"></i>Paypal</span></label>
                    </div>
                    <div class="input-group input-group-icon">
                        <input type="text" name="card_no" placeholder="Card Number" />
                        <div class="input-icon">
                            <i class="fa fa-credit-card"></i>
                        </div>
                    </div>
                    <div class="col-half">
                        <div class="input-group input-group-icon">
                            <input type="text" name="cvv" placeholder="Card CVC" />
                            <div class="input-icon">
                                <i class="fa fa-user"></i>
                            </div>
                        </div>
                    </div>
                    <div class="col-half">
                        <div class="input-group">
                            <select name="expiry_date">
                                <?php
                                for ($i = 1; $i <= 31; $i++) {  ?>
                                    <option value="<?= $i; ?>"><?= $i; ?></option>
                                <?php }
                                ?>
                            </select>
                            <select name="expiry_month">
                                <?php
                                $month = ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December'];
                                foreach ($month as $key => $value) {
                                ?>
                                    <option value="<?php echo ($key + 1); ?>"><?php echo $value; ?></option>
                                <?php }
                                ?>
                            </select>
                            <select name="expiry_year">
                                <?php
                                for ($i = 0; $i <= 10; $i++) {  ?>
                                    <option value="<?php echo date('Y') + $i; ?>"><?php echo date('Y') + $i; ?></option>
                                <?php }
                                ?>
                            </select>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <h4>Profile Pic</h4>
                    <div class="input-group input-group-icon">
                        <input type="file" name="profile_img" />
                        <div class="input-icon">
                            <i class="fa fa-user"></i>
                        </div>
                        <p class="error"><?php 
                        if(isset($error['profile_img'])){
                            echo $error['profile_img'];
                            unset($_SESSION['error']['profile_img']);
                        }
                        ?></p>
                    </div>
                </div>

                <div class="row">
                    <h4>Terms and Conditions</h4>
                    <div class="input-group">
                        <input id="terms" name="terms" type="checkbox" />
                        <label for="terms">I accept the terms and conditions for signing
                            up to this service, and hereby confirm I have
                            read the privacy policy.</label>
                    </div>
                    <p class="error"><?php 
                        if(isset($error['terms'])){
                            echo $error['terms'];
                            unset($_SESSION['error']['terms']);
                        }
                        ?></p>
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