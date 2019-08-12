<?php
include('../../configDb.php');
if (isset($_POST['id'])) {
    $sql = "UPDATE account SET active = 0 WHERE id ='" . $_POST['id'] . "'";
    if ($conn->query($sql) == TRUE) {
        echo 1;
    } else {
        echo 0;
    }
} else {
    echo 0;
}
