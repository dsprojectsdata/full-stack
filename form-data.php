<?php
echo "<pre>";
session_start();


// print_r($_SESSION);

if (isset($_SESSION['data'])) {
      foreach ($_SESSION['data'] as $key => $value) { ?>
            <p>Username - <?php echo $value['username']; ?></p>
            <p>Email - <?php echo $value['email']; ?></p>
            <p>Password - <?php echo $value['password']; ?></p>
<?php }
}else{
      echo 'no data found';
}


echo "</pre>";
