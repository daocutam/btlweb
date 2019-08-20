<nav class="navbar navbar-fixed-top">
    <div class="container-fluid">
        <div class="navbar-btn">
            <button type="button" class="btn-toggle-offcanvas"><i class="lnr lnr-menu fa fa-bars"></i></button>
        </div>
        <div class="navbar-brand d-inline-flex p-2">
            <!-- d-inline-flex p-2 giống wrap-content của android-->
            <a href=""><img src="../../../btlweb/admin/Images/logodhtl.png" alt="Dekko Logo" class="img-responsive logo"></a>
        </div>
        <div class="navbar-right">
            <div class="user-account float-right">
                <div class="dropdown">
                    <a href="javascript:void(0);" class="dropdown-toggle user-name" data-toggle="dropdown">
                        <strong class="text-danger" id="userNameLogin"><?php if (isset($_SESSION['user'])) {
                                                                            echo $_SESSION['user'];
                                                                        } ?></strong>
                    </a>
                    <ul class="dropdown-menu dropdown-menu-right account">
                        <li data-toggle="modal" data-target="#changePassword"><a href="#"><i class="fa fa-user-o"></i>Đổi mật khẩu</a></li>
                        <li class="divider"></li>
                        <li><a href="../../../btlweb/dhtl/logout.php"><i class="fa fa-sign-out"></i>Đăng xuất</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</nav>