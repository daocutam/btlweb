<!DOCTYPE html>
<html lang="en">
<?php
session_start();
if (!isset($_SESSION['user'])) {
    header('Location:http://localhost/btlweb/dhtl/login.php');
}
?>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Khoa công nghệ thông tin</title>
    <link href="public/templates/css/bootstrap.min.css" rel="stylesheet">
    <link href="public/templates/css/font-awesome.min.css" rel="stylesheet">
    <link href="public/templates/css/main.css" rel="stylesheet">
    <link href="public/templates/css/chatapp.css" rel="stylesheet">
    <link href="public/templates/css/color_skins.css" rel="stylesheet">
    <link href="public/templates/css/jquery-ui.css" rel="stylesheet">
    <script src="public/templates/js/bootstrap.min.js"></script>
    <script src="public/templates/js/respond.js"></script>
    <script src="public/templates/js/jquery.min.js"></script>
    <script src="public/templates/js/libscripts.bundle.js"></script>
    <script src="public/templates/js/vendorscripts.bundle.js"></script>
    <script src="public/templates/js/sweet-alert.js"></script>
    <script src="public/templates/js/mainscripts.bundle.js"></script>
    <script src="public/templates/js/index.js"></script>
    <script src="public/templates/js/jquery-ui.js"></script>
    <script src="public/templates/js/jquery.validate.min.js"></script>
    <script src="public/templates/js/ajax.js"></script>
    <link href="public/templates/css/style.css" rel="stylesheet">
</head>

<body class="theme-orange">
    <div id="wrapper">
        <?php include "common/header.php" ?>
        <?php include "common/sidebar.php" ?>
        <div id="main-content">
            <div class="container-fluid" id="index">
                <?php include('../admin/Views/branch/index.php'); ?>
            </div>
        </div>
    </div>
</body>

</html>