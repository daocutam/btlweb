<?php

include('../../configDb.php');
if (isset($_POST['_link']) &&  isset($_POST['_name']) && isset($_POST['_phone']) && isset($_POST['_mail']) && isset($_POST['_address']) && isset($_POST['_date']) && isset($_POST['_introduct']) && isset($_POST['_id'])) {
    $id = $_POST['_id'];
    $name = $_POST['_name'];
    $phone = $_POST['_phone'];
    $mail = $_POST['_mail'];
    $address = $_POST['_address'];
    $introduct = $_POST['_introduct'];
    $link = $_POST['_link'];
    $date = str_replace('/', '-', $_POST['_date']);
    $created = date("Y-m-d", strtotime($date));
    $sql = "UPDATE branch SET name='$name',phone='$phone',mail='$mail',address='$address',introduct='$introduct',link ='$link' ,created='$created' WHERE id='$id'";
    if ($conn->query($sql) == TRUE) {
        echo 1;
    } else {
        echo 0;
    }
    mysqli_close($conn);
} else {
    echo 0;
}
