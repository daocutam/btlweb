<?php
include('../../btlweb/admin/configDb.php');
$query = "Select id,name,link from branch where active = 1";
$lst_branch = $conn->query($query);
?>

<div class="container-fluid" style=" border-bottom:1px solid #0c0fea">
    <div class="container">
        <div class="row">
            <div class="header">
                <img src="http://cse.tlu.edu.vn/cse/assets/images/logo.jpg" alt="">
                <nav>
                    <ul class="navBar">
                        <li><a href="trangchu.php" title="TRANG CHỦ">TRANG CHỦ</a></li>
                        <li>
                            <a href="#" title="GIỚI THIỆU">GIỚI THIỆU</a>
                            <ul class="sub_menu">
                                <li><a href="logo_khoa.php" title="Logo Khoa CNTT">Logo Khoa CNTT</a></li>
                                <li><a href="loi_chao_mung.php" title="Lời chào mừng">Lời chào mừng</a></li>
                                <li><a href="to_chuc.php" title="Tổ chức">Tổ chức</a></li>
                                <li><a href="hop_tac_lien_ket.php" title="Hợp tác liên kết">Hợp tác liên kết</a></li>
                            </ul>
                        </li>
                        <li>
                            <a href="#" title="NGHIÊN CỨU KHOA HỌC"> KHOA HỌC</a>
                            <ul class="sub_menu">
                                <li><a href="de_tai_du_an.php" title="Các đề tài, dự án">Các đề tài, dự án</a></li>
                                <li><a href="#" title="Các phòng nghiệm">Các phòng nghiệm</a></li>
                            </ul>
                        </li>
                        <li>
                            <a href="#" title="ĐÀO TẠO">
                                ĐÀO TẠO
                            </a>
                            <ul class="sub_menu">
                                <li><a href="#" title="Đào tạo đại học">Đào tạo đại học</a></li>
                                <li><a href="#" title="Đào tạo sau đại học">Đào tạo sau đại học</a></li>
                                <li><a href="#" title="Định hướng nghành">Định hướng nghành </a></li>
                                <li><a href="#" title="Mô hình đào tạo">Mô hình đào tạo</a></li>
                                <li><a href="#" title="Đề cương môn học">Đề cương môn học</a></li>
                            </ul>
                        </li>
                        <li>
                            <a href="#" title="BỘ MÔN - TRUNG TÂM">BỘ MÔN</a>
                            <ul class="sub_menu">
                                <?php
                                if ($lst_branch->num_rows > 0) {
                                    foreach ($lst_branch as $row) {
                                        echo '<li><a href="' . $row['link'] . '?id=' . $row['id'] . '" title="' . $row['name'] . '">' . $row['name'] . '</a></li>';
                                    }
                                }
                                ?>
                            </ul>
                        </li>
                        <li>
                            <a href="#" title="SINH VIÊN">SINH VIÊN</a>
                            <ul class="sub_menu">
                                <li><a href="#" title="Tài liệu sinh viên">Tài liệu sinh viên</a></li>
                                <li><a href="#" title="Biểu mẫu Đồ án tốt nghiệp">Sinh viên tiêu biểu</a></li>
                            </ul>
                        </li>
                        <li>
                            <a href="#" title="TIN TỨC">TIN TỨC</a>
                            <ul class="sub_menu">
                                <li><a href="#" title="Sự kiện">Sự kiện</a></li>
                                <li><a href="#" title="CSE trên báo">CSE trên báo</a></li>
                            </ul>
                        </li>
                        <!-- <li>
                            <a href="#" title="THÔNG BÁO">THÔNG BÁO</a>
                            <ul class="sub_menu">
                                <li><a href="#" title="Thông báo">Thông báo</a></li>
                                <li><a href="#" title="Thông báo đào tạo">Thông báo đào tạo</a></li>
                                <li><a href="#" title="Nghiên cứu khoa học">Nghiên cứu KH</a></li>
                                <li><a href="#" title="Tuyển dụng">Tuyển dụng</a></li>
                                <li><a href="#" title="Học bổng">Học bổng</a></li>
                                <li><a href="#" title="Thông tin khác">Thông tin khác</a></li>
                            </ul>
                        </li> -->
                        <li><a href="#" title="LIÊN HỆ">LIÊN HỆ</a></li>
                    </ul>
                </nav>
            </div>
        </div>
    </div>
</div>
<!-- End Header_Menu -->