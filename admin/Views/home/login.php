<?php
include("../../configDb.php");
session_start();
if (isset($_POST['user']) && isset($_POST['pass'])) {
    $sql = 'select * from account where active = 1 && name = "' . $_POST['user'] . '" && pass = "' . $_POST['pass'] . '"';
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        $_SESSION['user'] = $_POST['user'];
        $_SESSION['pass'] = $_POST['pass'];
        header('Location:http://localhost/btlweb/admin/');
    }
}

?>

<div class="login-wrap">
    <div class="login-html">
        <input id="tab-1" type="radio" name="tab" class="sign-in" checked><label for="tab-1" class="tab">Sign In</label>
        <input id="tab-2" type="radio" name="tab" class="sign-up"><label for="tab-2" class="tab">Sign Up</label>
        <div class="login-form">
            <form class="sign-in-htm" action="login.php" method="POST">
                <div class="group">
                    <label for="user" class="label">Username</label>
                    <input id="user" name="user" type="text" class="input">
                </div>
                <div class="group">
                    <label for="pass" class="label">Password</label>
                    <input id="pass" name="pass" type="password" class="input" data-type="password">
                </div>
                <div class="group">
                    <input type="submit" class="button" value="Sign In">
                </div>
            </form>
            <!-- <div class="sign-up-htm">
                <div class="group">
                    <label for="user" class="label">Username</label>
                    <input id="user" type="text" class="input">
                </div>
                <div class="group">
                    <label for="pass" class="label">Password</label>
                    <input id="pass" type="password" class="input" data-type="password">
                </div>
                <div class="group">
                    <label for="pass" class="label">Repeat Password</label>
                    <input id="pass" type="password" class="input" data-type="password">
                </div>
                <div class="group">
                    <label for="pass" class="label">Email Address</label>
                    <input id="pass" type="text" class="input">
                </div>
                <div class="group">
                    <input type="submit" class="button" value="Sign Up">
                </div>
                <div class="hr"></div>
                <div class="foot-lnk">
                    <label for="tab-1">Already Member?</a>
                </div> -->
            <!-- </div> -->
        </div>
    </div>
</div>
<link href="../../public/templates/css/login.css" rel="stylesheet">