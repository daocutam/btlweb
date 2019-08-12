<?php
include('../../configDb.php');

if (isset($_POST['name']) && isset($_POST['pass']) && isset($_POST['email']) && isset($_POST['address'])) {
    $name = $_POST['name'];
    $pass = $_POST['pass'];
    $email = $_POST['email'];
    $address =  $_POST['address'];
    $created = date('Y-m-d H:i:s');
    $active = 1;
    $sql = "INSERT INTO account (name,pass,email ,address,active,created)
    VALUES ('$name','$pass' , '$email', '$address',$active,'$created')";
    if ($conn->query($sql) == TRUE) {
        echo 1;
    } else {
        echo 0;
    }
    mysqli_close($conn);
} else {
    echo 0;
}
