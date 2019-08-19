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
if (isset($_POST['branch_id']) && isset($_POST['title']) && isset($_POST['content'])) {
    $query = "SELECT MAX(id) as id FROM News WHERE active=1 && type=1";
    $row_max_id = $conn->query($query)->fetch_assoc();
    $code = (int) $row_max_id['id'] + 1;
    $branch_id = $_POST['branch_id'];
    $title = $_POST['title'];
    $content = $_POST['content'];
    $type = 1;
    $created = date('Y-m-d H:i:s');
    $active = 1;
    if ($code < 10) {
        $code = "TT000" . ($code);
    } else if ($code < 100) {
        $code = "TT00" . ($code);
    } else if ($code < 1000) {
        $code = "TT0" . ($code);
    } else if ($code < 10000) {
        $code = "TT" . ($code);
    }
    $sql = "INSERT INTO news (code,branch_id,title ,content,type,active,created)
    VALUES ('$code','$branch_id' , '$title', '$content','$type',$active,'$created')";
    if ($conn->query($sql) == TRUE) {
        $last_id = $conn->insert_id;
        if ($conn->query("INSERT INTO image(new_id,path) VALUES($last_id,'$file_name')") == TRUE) {
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
