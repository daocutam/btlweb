<?php
include('../../configDb.php');
session_start();
if (!isset($_SESSION['user'])) {
    header('Location:http://localhost/btlweb/dhtl/login.php');
}
if (isset($_POST['id'])) {
    $sql = "UPDATE lecturers SET active = 0 WHERE id ='" . $_POST['id'] . "'";
    if ($conn->query($sql) == TRUE) {
        $query = "DELETE FROM image WHERE lecturer_id = " . $_POST['id'] . "";
        if ($conn->query($query) == TRUE) {
            echo 1;
        } else {
            echo 0;
        }
    } else {
        echo 0;
    }
    mysqli_close($conn);
} else {
    echo 0;
}
