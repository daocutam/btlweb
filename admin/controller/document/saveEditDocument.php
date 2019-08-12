<?php
include('../../configDb.php');

if (isset($_POST['id']) && isset($_POST['name']) && isset($_POST['branch_id']) && isset($_POST['link']) && isset($_POST['image'])) {
    $id = (int) $_POST['id'];
    $branch_id = (int) $_POST['branch_id'];
    $name = $_POST['name'];
    $link = $_POST['link'];
    $str_img = substr($_POST['image'], 12);
    $image = "images/" . $str_img;
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
