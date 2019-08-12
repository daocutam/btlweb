<?php
include('../../configDb.php');
if (isset($_FILES['file'])) {
    $file_name = $_FILES['file']['name'];
    $file_type = $_FILES['file']['type'];
    $file_size = $_FILES['file']['size'];
    $file_temp_loc = $_FILES['file']['tmp_name'];
    $file_store = "../../../admin/Images/" . $file_name;
    move_uploaded_file($file_temp_loc, $file_store);
}
if (isset($_POST['name']) && isset($_POST['phone']) && isset($_POST['email']) && isset($_POST['address']) && isset($_POST['workplace']) && isset($_POST['introduct'])) {
    $query = "SELECT MAX(id) as id FROM lecturers WHERE active=1";
    $row_max_id = $conn->query($query)->fetch_assoc();
    $code = (int) $row_max_id['id'] + 1;
    $branch_id = (int) $_POST['branch_id'];
    $level = $_POST['level'];
    $name = $_POST['name'];
    $phone = $_POST['phone'];
    $email = $_POST['email'];
    $address = $_POST['address'];
    $workplace = $_POST['workplace'];
    $introduct = $_POST['introduct'];
    $created = date('Y-m-d H:i:s');
    $active = 1;
    if ($code < 10) {
        $code = "GV000" . ($code);
    } else if ($code < 100) {
        $code = "GV00" . ($code);
    } else if ($code < 1000) {
        $code = "GV0" . ($code);
    } else if ($code < 10000) {
        $code = "GV" . ($code);
    }
    $sql = "INSERT INTO lecturers (branch_id,code,name,email,phone,level,workplace ,address,introduct,active,created)
    VALUES ($branch_id,'$code','$name' ,'$email', '$phone','$level','$workplace','$address','$introduct',$active,'$created')";
    if ($conn->query($sql) == TRUE) {
        $last_id = $conn->insert_id;
        if ($conn->query("INSERT INTO image(lecturer_id,path) VALUES ($last_id,'$file_name')") == TRUE) {
            echo 1;
        } else {
            echo 0;
        }
    } else {
        echo 0;
    }
    mysqli_close($conn);
} else {
    echo '0';
}
