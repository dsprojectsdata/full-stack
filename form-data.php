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
$sql = "SELECT * FROM students";

// Where in
// $sql = "SELECT * FROM students WHERE name IN('jack','smith','123') ";

//Where like
// $sql = "SELECT * FROM students where name LIKE '%r%'";

// WHERE BETWEEN
// $sql = "SELECT * FROM students WHERE age BETWEEN 10 AND 20 ";

// ORDER BY
// $sql = "SELECT * FROM students ORDER BY age DESC";

// GROUP BY
// $sql = "SELECT * FROM students GROUP BY name";

// LIMIT
// $sql = "SELECT * FROM students LIMIT 3 OFFSET 4";

// $sql = "SELECT * FROM students ORDER BY salary DESC LIMIT 1 OFFSET 2";





$result = mysqli_query($con, $sql);

?>
<table border=1>
      <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Email</th>
            <th>Password</th>
            <th>Salary</th>
            <th>Class</th>
            <th>Gender</th>
            <th>Sports</th>
            <th>Edit</th>
            <th>Delete</th>
      </tr>

      <?php

      $i = 1;
      while ($data = $result->fetch_assoc()) {

            $sport = json_decode($data['sport'], true);
            // print_r($sport);
            // die;
            if($sport){
                  $sport = implode(',',$sport);
            }
      ?>
            <tr>
                  <td><?php echo $i++; ?></td>
                  <td><?php echo ucfirst($data['name']); ?></td>
                  <td><?php echo $data['email'] ?></td>
                  <td><?php echo $data['password'] ?></td>
                  <td><?php echo $data['salary'] ?></td>
                  <td><?php echo $data['class'] ?></td>
                  <td><?php echo $data['gender'] ?></td>
                  <td><?php echo $sport ?></td>
                  <td><a href="<?php echo 'http://localhost/full-stack/edit.php?id=' . $data['id'] ?>">Edit</a></td>
                  <td><a href="">Delete</a></td>
            </tr>
      <?php } ?>
</table>