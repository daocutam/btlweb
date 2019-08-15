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
if (isset($_POST['_id']) && isset($_POST['_name']) && isset($_POST['_branch_id']) && isset($_POST['_link'])) {
    $id = (int) $_POST['_id'];
    $branch_id = (int) $_POST['_branch_id'];
    $name = $_POST['_name'];
    $link = $_POST['_link'];
    $image =  $file_name;
    $sql = "UPDATE document SET  branch_id='$branch_id',name='$name',link='$link',image='$image' WHERE id='$id'";
    if ($conn->query($sql) == TRUE) {
        echo 1;
    } else {
        echo 0;
    }
    mysqli_close($conn);
} else {
    echo 0;
}
