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
                            <a href="gioi_thieu.php" title="GIỚI THIỆU">GIỚI THIỆU</a>
                            <ul class="sub_menu">
                                <li><a href="logo_khoa.php" title="Logo Khoa CNTT">Logo Khoa CNTT</a></li>
                                <li><a href="loi_chao_mung.php" title="Lời chào mừng">Lời chào mừng</a></li>
                                <li><a href="to_chuc.php" title="Tổ chức">Tổ chức</a></li>
                                <li><a href="hop_tac_lien_ket.php" title="Hợp tác liên kết">Hợp tác liên kết</a></li>
                            </ul>
                        </li>
                        <li>
                            <a href="khoa_hoc.php" title="NGHIÊN CỨU KHOA HỌC"> KHOA HỌC</a>
                            <ul class="sub_menu">
                                <li><a href="de_tai_du_an.php" title="Các đề tài, dự án">Các đề tài, dự án</a></li>
                                <li><a href="phong_thi_nghiem.php" title="Các phòng nghiệm">Các phòng nghiệm</a></li>
                            </ul>
                        </li>
                        <li>
                            <a href="dao_tao.php" title="ĐÀO TẠO">
                                ĐÀO TẠO
                            </a>
                            <ul class="sub_menu">
                                <li><a href="dao_tao_dai_hoc.php" title="Đào tạo đại học">Đào tạo đại học</a></li>
                                <li><a href="http://cse.tlu.edu.vn/Portals/0/CNTT_CTDT_ThS_2017_1.pdf" title="Đào tạo sau đại học">Đào tạo sau đại học</a></li>
                                <li><a href="dinh_huong_nghanh_nghe.php" title="Định hướng nghành">Định hướng nghành </a></li>
                                <li><a href="mo_hinh_dao_tao.php" title="Mô hình đào tạo">Mô hình đào tạo</a></li>
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
                            <a href="sinh_vien.php" title="SINH VIÊN">SINH VIÊN</a>
                            <ul class="sub_menu">
                                <li><a href="de_cuong_mon_hoc.php" title="Đề cương môn học">Đề cương môn học</a></li>
                                <li><a href="tai_lieu_tham_khao.php" title="Tài liệu sinh viên">Tài liệu tham khảo</a></li>
                                <li><a href="sv_tieu_bieu.php" title="Biểu mẫu Đồ án tốt nghiệp">Sinh viên tiêu biểu</a></li>
                            </ul>
                        </li>
                        <li>
                            <a href="tin_tuc.php" title="TIN TỨC">TIN TỨC</a>
                            <ul class="sub_menu">
                                <li><a href="su_kien.php" title="Sự kiện">Sự kiện</a></li>
                                <li><a href="#" title="CSE trên báo">CSE trên báo</a></li>
                            </ul>
                        </li>
                        <!-- <li>
                            <a href="#" title="THÔNG BÁO">THÔNG BÁO</a> -->
                        <!-- <ul class="sub_menu">
                                <li><a href="#" title="Thông báo">Thông báo</a></li>
                                <li><a href="#" title="Thông báo đào tạo">Thông báo đào tạo</a></li>
                                <li><a href="#" title="Nghiên cứu khoa học">Nghiên cứu KH</a></li>
                                <li><a href="#" title="Tuyển dụng">Tuyển dụng</a></li>
                                <li><a href="#" title="Học bổng">Học bổng</a></li>
                                <li><a href="#" title="Thông tin khác">Thông tin khác</a></li>
                            </ul> -->
                        <!-- </li> -->
                        <li><a href="lien_he.php" title="LIÊN HỆ">LIÊN HỆ</a></li>
                    </ul>
                </nav>
            </div>
        </div>
    </div>
</div>
<!-- End Header_Menu -->