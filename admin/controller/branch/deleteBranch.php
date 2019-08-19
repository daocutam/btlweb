<?php
include('../../configDb.php');
session_start();
if (!isset($_SESSION['user'])) {
    header('Location:http://localhost/btlweb/dhtl/login.php');
}
if (isset($_POST['id'])) {
    $sql = "UPDATE branch SET active = 0 WHERE id ='" . $_POST['id'] . "'";
    if ($conn->query($sql) == TRUE) {
        echo 1;
    } else {
        echo 0;
    }
} else {
    echo 0;
}
