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
if (isset($_POST['_id']) && isset($_POST['_branch_id']) && isset($_POST['_title']) && isset($_POST['_content'])) {
    $id = (int) $_POST['_id'];
    $branch_id = (int) $_POST['_branch_id'];
    $title = $_POST['_title'];
    $content = $_POST['_content'];
    $sql = "UPDATE news SET  branch_id='$branch_id',title='$title',content='$content' WHERE id='$id'";
    if ($conn->query($sql) == TRUE) {
        if ($rs = $conn->query("UPDATE image SET path='$file_name' where new_id = $id")) {
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
