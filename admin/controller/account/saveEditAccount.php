<?php
include('../../configDb.php');

if (isset($_POST['_name']) && isset($_POST['_pass']) && isset($_POST['_email']) && isset($_POST['_address']) && isset($_POST['_status'])) {
    $id = (int) $_POST['_id'];
    $name = $_POST['_name'];
    $pass = $_POST['_pass'];
    $email = $_POST['_email'];
    $address = $_POST['_address'];
    $status = $_POST['_status'];
    $sql = "UPDATE account SET  name='$name',pass='$pass',email='$email',address='$address',status='$status' WHERE id='$id'";
    if ($conn->query($sql) == TRUE) {
        echo 1;
    } else {
        echo 0;
    }
    mysqli_close($conn);
} else {
    echo 0;
}
