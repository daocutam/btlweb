<?php
include('../../configDb.php');
if (isset($_POST['id'])) {
    $sql = "UPDATE News SET active = 0 WHERE id ='" . $_POST['id'] . "'";
    if ($conn->query($sql) == TRUE) {
        $query = "DELETE FROM image WHERE new_id = " . $_POST['id'] . "";
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
