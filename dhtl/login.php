<?php
include('../../btlweb/admin/configDb.php');
if (isset($_POST['email']) && isset($_POST['pass'])) {
    $sql = 'select * from account where active = 1 && email = "' . $_POST['email'] . '" && pass = "' . $_POST['pass'] . '"';
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        session_start();
        $_SESSION['email'] = $_POST['email'];
        $_SESSION['user'] = $row['name'];
        $_SESSION['pass'] = $_POST['pass'];
        header('Location:http://localhost/btlweb/admin/');
    }
}
if (isset($_POST['_user']) && isset($_POST['_pass'])) {
    $name = $_POST['_user'];
    $email = $_POST['_email'];
    $pass = $_POST['_pass'];
    $sql = "INSERT INTO account (name,pass,email,active,created)
    VALUES ('$name','$pass' , '$email', 1,date('Y-m-d H:i:s'))";
}
?>
<link href="../../../btlweb/admin/public/templates/css/bootstrap.min.css" rel="stylesheet">
<link href="../../../btlweb/admin/public/templates/css/font-awesome.min.css" rel="stylesheet">
<link href="../../../btlweb/admin/public/templates/css/login.css" rel="stylesheet">
<script src="../../../btlweb/admin/public/templates/js/bootstrap.min.js"></script>
<script src="../../../btlweb/admin/public/templates/js/jquery.min.js"></script>
<script src="../../../btlweb/admin/public/templates/js/ajax.js"></script>
<script src="../../../btlweb/admin/public/templates/js/jquery.validate.min.js"></script>
<div class="login-wrap">
    <div class="login-html">
        <input id="tab-1" type="radio" name="tab" class="sign-in" checked><label for="tab-1" class="tab">Sign In</label>
        <input id="tab-2" type="radio" name="tab" class="sign-up"><label for="tab-2" class="tab">Sign Up</label>
        <div class="login-form">
            <div class="sign-in-htm">
                <form id="frmSign_in" action="login.php" method="POST">
                    <div class="group">
                        <label class="label">Username</label>
                        <input id="email" name="email" type="text" class="input">
                    </div>
                    <div class="group">
                        <label class="label">Password</label>
                        <input id="pass" name="pass" type="password" class="input" data-type="password">
                    </div>
                </form>
                <div class="group">
                    <button class="button" onclick="login();">Sign In</button>
                </div>
                <div class="group text-right">
                    <a href="index.php" style="color:#fff;margin:5px 5px 0 0;"><i class="fa fa-backward"></i> Quay lại trang chủ</a>
                </div>
                <div class="group pt-3 text-center">
                    <span class="error text-white"></span>
                </div>
            </div>
            <div class="sign-up-htm">
                <form id="frmSign_up">
                    <div class="group">
                        <label class="label">Username</label>
                        <input id="_user" name="_user" type="text" class="input">
                    </div>
                    <div class="group">
                        <label class="label">Password</label>
                        <input id="_pass" name="_pass" type="password" class="input" data-type="password">
                    </div>
                    <div class="group">
                        <label class="label">Email Address</label>
                        <input id="_email" name="_email" type="text" class="input">
                    </div>
                </form>
                <div class="group">
                    <button class="button" onclick="signUp();">Sign Up</button>
                </div>
                <div class="group text-right">
                    <a href="index.php" style="color:#fff;margin:5px 5px 0 0;"><i class="fa fa-backward"></i> Quay lại trang chủ</a>
                </div>
                <div class="group pt-3 text-center">
                    <span class="error text-white"></span>
                </div>
            </div>
        </div>
    </div>
</div>