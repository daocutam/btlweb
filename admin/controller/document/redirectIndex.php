<?php
session_start();
if (!isset($_SESSION['user'])) {
    header('Location:http://localhost/btlweb/dhtl/login.php');
}
include("../../Views/document/index.php");
