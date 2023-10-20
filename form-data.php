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
// where
// $sql = "SELECT * FROM students where name = '123' ";

// Where in
// $sql = "SELECT * FROM students WHERE name IN('jack','smith','123') ";

//Where like
// $sql = "SELECT * FROM students where name LIKE '%r%'";

// WHERE BETWEEN
// $sql = "SELECT * FROM students WHERE age BETWEEN 10 AND 20 ";

// ORDER BY
// $sql = "SELECT * FROM students ORDER BY age DESC";

// GROUP BY
$sql = "SELECT * FROM students GROUP BY name";



$result = mysqli_query($con, $sql);

?>
<table border=1>
      <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Email</th>
            <th>Password</th>
            <th>Age</th>
            <th>Update</th>
            <th>Delete</th>
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
                  <td><?php echo $data['salary'] ?></td>
                  <td><a href="<?php echo $data['id']; ?>">Update</a></td>
                  <td><a href="">Delete</a></td>
            </tr>
      <?php } ?>
</table>