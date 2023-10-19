<?php
echo "<pre>";


$host = 'localhost';
$username = 'root';
$password = '';
$db = 'demo';

$con = mysqli_connect($host, $username, $password, $db);
if (!$con) {
      echo "connection failed";
      die;
}

$sql = "SELECT * FROM students";

$result = mysqli_query($con, $sql);


?>
<table border=1>
      <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Email</th>
            <th>Password</th>
      </tr>

      <?php

      $i = 1;
      while ($data = $result->fetch_assoc()) {
      ?>
            <tr>
                  <td><?php echo $i++; ?></td>
                  <td><?php echo ucfirst($data['name']); ?></td>
                  <td><?php echo $data['email'] ?></td>
                  <td><?php echo $data['password'] ?></td>
            </tr>
      <?php } ?>
</table>