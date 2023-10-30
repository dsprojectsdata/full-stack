<?php
include('layout/header.php');
echo "<pre>";
session_start();

include('config/connection.php');

$id = $_GET['id'];

$sql = " SELECT * from credit_card WHERE id = $id";

$result = mysqli_query($con, $sql);
$data = $result->fetch_assoc();

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
                    <h1>Edit Details</h1>

                    <h4>Account</h4>
                    <div class="input-group input-group-icon">
                        <input type="text" name="fullname" placeholder="Full Name" value="<?php echo $data['fullname'] ?>" />
                        <div class="input-icon">
                            <i class="fa fa-user"></i>
                        </div>
                    </div>
                    <div class="input-group input-group-icon">
                        <input type="email" name="email" placeholder="Email Adress" value="<?php echo $data['email'] ?>" />
                        <div class="input-icon">
                            <i class="fa fa-envelope"></i>
                        </div>
                    </div>
                    <div class="input-group input-group-icon">
                        <input type="password" name="password" placeholder="Password" value="<?php echo $data['password'] ?>" />
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
                                <input type="text" placeholder="DD" name="date" value="<?php echo date('d', strtotime($data['dob'])); ?>" />
                            </div>
                            <div class="col-third">
                                <input type="text" placeholder="MM" name="month" value="<?php echo date('m', strtotime($data['dob'])); ?>" />
                            </div>
                            <div class="col-third">
                                <input type="text" placeholder="YYYY" name="year" value="<?php echo date('Y', strtotime($data['dob'])); ?>" />
                            </div>
                        </div>
                    </div>
                    <div class="col-half">
                        <h4>Gender</h4>
                        <div class="input-group">
                            <input id="gender-male" type="radio" name="gender" value="male" <?php if ($data['gender'] == 'male') {
                                                                                                echo 'checked';
                                                                                            } ?> />
                            <label for="gender-male">Male</label>
                            <input id="gender-female" type="radio" name="gender" value="female" <?php
                                                                                                if ($data['gender'] == 'female') {
                                                                                                    echo 'checked';
                                                                                                }
                                                                                                ?> />
                            <label for="gender-female">Female</label>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <h4>Payment Details</h4>
                    <div class="input-group">
                        <input id="payment-method-card" type="radio" name="payment_method" value="card" <?php
                                                                                                        if ($data['payment_method'] == 'card') {
                                                                                                            echo 'checked';
                                                                                                        }
                                                                                                        ?> />
                        <label for="payment-method-card"><span><i class="fa fa-cc-visa"></i>Credit
                                Card</span></label>
                        <input id="payment-method-paypal" type="radio" name="payment_method" value="paypal" <?php
                                                                                                            if ($data['payment_method'] == 'paypal') {
                                                                                                                echo 'checked';
                                                                                                            }

                                                                                                            ?> />
                        <label for="payment-method-paypal">
                            <span><i class="fa fa-cc-paypal"></i>Paypal</span></label>
                    </div>
                    <div class="input-group input-group-icon">
                        <input type="text" name="card_no" placeholder="Card Number" value="<?php echo $data['card_no'] ?>" />
                        <div class="input-icon">
                            <i class="fa fa-credit-card"></i>
                        </div>
                    </div>
                    <div class="col-half">
                        <div class="input-group input-group-icon">
                            <input type="text" name="cvv" placeholder="Card CVC" value="<?php echo $data['cvv'] ?>" />
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
                                    <option value="<?= $i; ?>" <?php
                                                                if (date('d', strtotime($data['expiry_date'])) == $i) {
                                                                    echo 'selected';
                                                                }
                                                                ?>><?= $i; ?></option>
                                <?php }
                                ?>
                            </select>
                            <select name="expiry_month">
                                <?php
                                $month = ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December'];
                                foreach ($month as $key => $value) {
                                ?>
                                    <option value="<?php echo ($key + 1); ?>" <?php
                                                                                if (date('m', strtotime($data['expiry_date'])) == ($key + 1)) {
                                                                                    echo 'selected';
                                                                                }
                                                                                ?>><?php echo $value; ?></option>
                                <?php }
                                ?>
                            </select>
                            <select name="expiry_year">
                                <?php
                                for ($i = 0; $i <= 10; $i++) {  ?>
                                    <option value="<?php echo date('Y') + $i; ?>" <?php
                                                                                    if (date('Y', strtotime($data['expiry_date'])) == date('Y') + $i) {
                                                                                        echo 'selected';
                                                                                    }
                                                                                    ?>><?php echo date('Y') + $i; ?></option>
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
                        <img style="width: 70px;" src="<?php echo 'http://localhost/full-stack/form/assets/uploads/' . $data['profile_img']; ?>">
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