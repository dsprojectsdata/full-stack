<?php
$id = $_GET['id'];

$host = 'localhost';
$username = 'root';
$password = '';
$db = 'demo';

$con = mysqli_connect($host, $username, $password, $db);
if (!$con) {
      echo "connection failed";
      die;
}

$sql = " SELECT * FROM students WHERE id= $id";
$result = mysqli_query($con, $sql);

$data = $result->fetch_assoc();
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
      <h3 style="color: green">
            <?php
            if (isset($_SESSION['result_status'])) {
                  echo $_SESSION['result_status'];
            }

            unset($_SESSION['result_status']);
            ?>
      </h3>

      <form method="post" action="action/update-action.php?id=<?php echo $id; ?>" enctype="multipart/form-data">
            <input type="text" name="username" placeholder="Username *" value="<?php echo $data['name'] ?>">

            <br>
            <br>
            <input type="text" name="email" placeholder="Email *" value="<?php echo $data['email'] ?>">

            <br>
            <br>
            <input type="text" name="password" placeholder="Password *" value="<?php echo $data['password'] ?>">

            <br>

            <br>
            <button type="submit">Update</button>
      </form>
</body>

</html>