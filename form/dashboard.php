<?php
include('layout/header.php');
include('config/connection.php');

session_start();
echo '<pre>';
$sql = "SELECT * FROM users";
// $sql = " SELECT fullname AS name,user_id,users.id AS userID,address.id FROM users INNER JOIN address ON users.id = address.user_id";

$result = mysqli_query($con, $sql);

// while ($data = $result->fetch_assoc()) {
//     echo "<pre>";
//     print_r($data);
// }
    // print_r($_SESSION);
// die;

?>
<div class="container">
    <h1>My credit card details</h1>
    <div class="table-block">
        <div class="table-wrapper">
            <table>
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>fullname</th>
                        <th>email</th>
                        <th>DOB</th>
                        <th>Payment Method</th>
                        <th>card no</th>
                        <th>cvv</th>
                        <th>expiry Date</th>
                        <th>Profile Image</th>
                        <th>Edit</th>
                        <th>Delete</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $i = 1;
                    while ($data = $result->fetch_assoc()) {
                    ?>
                        <tr>
                            <td><?php echo $i++; ?></td>
                            <td><?php echo $data['fullname']; ?></td>
                            <td><?php echo $data['email']; ?></td>
                            <td><?php echo date('d M Y', strtotime($data['dob'])); ?></td>
                            <td><?php echo $data['payment_method']; ?></td>
                            <td><?php echo $data['card_no']; ?></td>
                            <td><?php echo $data['cvv']; ?></td>
                            <td><?php echo date('d M Y', strtotime($data['expiry_date'])); ?></td>
                            <td><img class="icon-img" src="http://localhost/full-stack/form/assets/uploads/<?php echo $data['profile_img'] ?>" alt=""></td>
                            <td><a target="_blank" href="http://localhost/full-stack/form/edit.php?id=<?php echo $data['id'] ?>">Edit</a></td>
                            <td>Delete</td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<?php
include('layout/footer.php');
?>