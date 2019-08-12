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
if (isset($_POST['branch_id']) && isset($_POST['name']) && isset($_POST['link'])) {
    $query = "SELECT MAX(id) as id FROM document WHERE active=1";
    $row_max_id = $conn->query($query)->fetch_assoc();
    $code = (int) $row_max_id['id'] + 1;
    $branch_id = $_POST['branch_id'];
    $name = $_POST['name'];
    $link = $_POST['link'];
    $image =  $file_name;
    $created = date('Y-m-d H:i:s');
    $active = 1;
    if ($code < 10) {
        $code = "DC000" . ($code);
    } else if ($code < 100) {
        $code = "DC00" . ($code);
    } else if ($code < 1000) {
        $code = "DC0" . ($code);
    } else if ($code < 10000) {
        $code = "DC" . ($code);
    }
    $sql = "INSERT INTO document (code,branch_id,name ,link,image,active,created)
    VALUES ('$code','$branch_id' , '$name', '$link','$image',$active,'$created')";
    if ($conn->query($sql) == TRUE) {
        echo 1;
    } else {
        echo 0;
    }
    mysqli_close($conn);
} else {
    echo 0;
}
