<?php
include('../../configDb.php');

if (isset($_POST['link']) && isset($_POST['name']) && isset($_POST['phone']) && isset($_POST['mail']) && isset($_POST['address']) && isset($_POST['date']) && isset($_POST['introduct'])) {
    $query = "SELECT MAX(id) as id FROM branch WHERE active=1";
    $row_max_id = $conn->query($query)->fetch_assoc();
    $code = (int) $row_max_id['id'] + 1;
    $name = $_POST['name'];
    $phone = $_POST['phone'];
    $mail = $_POST['mail'];
    $address = $_POST['address'];
    $introduct = $_POST['introduct'];
    $link = $_POST['link'];
    $date = str_replace('/', '-', $_POST['date']);
    $created = date("Y-m-d", strtotime($date));
    $active = 1;
    if ($code < 10) {
        $code = "BM000" . ($code);
    } else if ($code < 100) {
        $code = "BM00" . ($code);
    } else if ($code < 1000) {
        $code = "BM0" . ($code);
    } else if ($code < 10000) {
        $code = "BM" . ($code);
    }
    $sql = "INSERT INTO branch (code,name,phone ,mail,address,introduct,link,active,created)
    VALUES ('$code','$name' , '$phone', '$mail','$address','$introduct','$link',$active,'$created')";
    if ($conn->query($sql) == TRUE) {
        echo 1;
    } else {
        echo 0;
    }
    mysqli_close($conn);
} else {
    echo 0;
}
