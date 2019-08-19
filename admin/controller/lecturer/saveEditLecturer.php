<?php
session_start();
if (!isset($_SESSION['user'])) {
    header('Location:http://localhost/btlweb/dhtl/login.php');
}
include('../../configDb.php');
if (isset($_FILES['file'])) {
    $file_name = $_FILES['file']['name'];
    $file_type = $_FILES['file']['type'];
    $file_size = $_FILES['file']['size'];
    $file_temp_loc = $_FILES['file']['tmp_name'];
    $file_store = "../../../admin/Images/" . $file_name;
    move_uploaded_file($file_temp_loc, $file_store);
}
if (isset($_POST['_id']) && isset($_POST['_name']) && isset($_POST['_phone']) && isset($_POST['_email']) && isset($_POST['_address']) && isset($_POST['_workplace']) && isset($_POST['_introduct'])) {
    $id = (int) $_POST['_id'];
    $branch_id = (int) $_POST['_branch_id'];
    $level = $_POST['_level'];
    $name = $_POST['_name'];
    $phone = $_POST['_phone'];
    $email = $_POST['_email'];
    $address = $_POST['_address'];
    $workplace = $_POST['_workplace'];
    $introduct = $_POST['_introduct'];
    $sql = "UPDATE lecturers SET  branch_id='$branch_id',level='$level',name='$name',phone='$phone',email='$email',address='$address',workplace='$workplace',introduct='$introduct' WHERE id='$id'";
    if ($conn->query($sql) == TRUE) {
        if ($rs = $conn->query("UPDATE image SET  path='$file_name' WHERE lecturer_id=$id")) {
            echo 1;
        } else
            echo 0;
    } else {
        echo 0;
    }
    mysqli_close($conn);
} else {
    echo 0;
}
