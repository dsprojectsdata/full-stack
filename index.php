<?php
echo "<pre>";
session_start();
// print_r($_SESSION);
if (isset($_SESSION['error'])) {
      $errors = $_SESSION['error'];
}
echo "</pre>";
?>

<!DOCTYPE html>
<html lang="en">

<head>
      <meta charset="UTF-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <title>Web</title>
      <link rel="stylesheet" href="css/style.css">
</head>

<body>
      <div>
            <?php
            // foreach ($_SESSION['error'] as $key => $value) { 
            ?>
            <!-- <p class="error"><?php //echo $value; 
                                    ?></p> -->
            <?php  //}
            ?>
      </div>
      <h3 style="color: green"><?php
                                    if (isset($_SESSION['result_status'])) {
                                          echo $_SESSION['result_status'];
                                    }

                                    unset($_SESSION['result_status']);
                                    ?></h3>

      <form method="post" action="action/signup-action.php" enctype="multipart/form-data">
            <input type="text" name="username" placeholder="Username *">
            <p class="error"><?php
                              if (isset($errors['username'])) {
                                    echo $errors['username'];
                              }
                              unset($_SESSION['error']['username']);
                              ?></p>
            <br>
            <input type="text" name="email" placeholder="Email *">
            <p class="error"><?php
                              if (isset($errors['email'])) {
                                    echo $errors['email'];
                              }
                              unset($_SESSION['error']['email']);
                              ?></p>
            <br>
            <input type="text" name="password" placeholder="Password *">
            <p class="error"><?php
                              if (isset($errors['password'])) {
                                    echo $errors['password'];
                              }
                              unset($_SESSION['error']['password']); ?></p>
            <br>

            <select name="class">
                  <option value="9">9</option>
                  <option value="10">10</option>
                  <option value="11">11</option>
            </select>

            <br>
            <br>

            <label for="male"><input type="radio" name="gender" id="male" value="m">Male</label>
            <label for="female"><input type="radio" name="gender" id="female" value="f">Female</label>

            <br>
            <br>

            <label for="cricket"><input type="checkbox" name="sport[]" id="cricket" value="cricket">cricket</label>
            <label for="football"><input type="checkbox" name="sport[]" id="football" value="football">football</label>
            <label for="chess"><input type="checkbox" name="sport[]" id="chess" value="chess">chess</label>

            <br>
            <br>


            <input type="file" name="image">
            <p class="error"><?php
                              if (isset($errors['image'])) {
                                    echo $errors['image'];
                              }
                              unset($_SESSION['error']['image']); ?></p>
            <br>
            <br>
            <button type="submit">Save</button>
      </form>
</body>

</html>