<?php
include("../../configDb.php");
if (!isset($_SESSION['user'])) {
    header('Location:http://localhost/btlweb/dhtl/login.php');
}
$sql = "SELECT id,name FROM branch where active = 1";
$arr = $conn->query($sql);
$_lvarr = array('Tiến sĩ', 'Thạc sĩ', 'Giáo sư');
?>
<div class="" id="View">
    <div class="col-md-12">
        <div class="breadcrumb-holder">
            <div class="row mb-3 mt-3">
                <div class="col-md-10 col-sm-9 col-8 text-dark px-0">
                    <h4><i class="fa fa-fw fa-users"></i> Thông tin giảng viên</h4>
                </div>
                <div class="col-md-2 col-sm-3 col-4 text-right px-0">
                    <button class="btn width-btn-create-batch btn-dekko" data-toggle="modal" data-target="#createLecturer"><i class="fa fa-fw fa-plus"></i> Thêm giảng viên</button>
                </div>
            </div>
        </div>
    </div>
    <div class="row mb-3 mt-3">
        <div class="col-md-3 offset-md-0 col-sm-3 mt-1">
            <input type="text" class="form-control" placeholder="Tên giảng viên" id="txtnameLecturer" />
        </div>
        <div class="col-md-3 offset-md-0 col-sm-3 mt-1">
            <input type="text" class="form-control" placeholder="Số điện thoại " id="txtphoneLecturer" />
        </div>
        <div class="col-md-3 offset-md-0 col-sm-2 mt-1">
            <select class="form-control" id="branchList">
                <?php foreach ($arr as $val) {
                    echo '<option value="' . $val['id'] . '">' . $val['name'] . '</option>';
                } ?>
            </select>
        </div>
        <div class="col-md-3 offset-md-0 col-sm-2 mt-1">
            <select class="form-control" id="level">
                <?php foreach ($_lvarr as $val) {
                    echo '<option value="' . $val . '">' . $val . '</option>';
                } ?>
            </select>
        </div>
    </div>
    <div class="row mb-3 mt-3">
        <div class="offset-md-10 col-md-2">
            <button class="btn btn-primary btn-block" onclick="loadListLecturer(1);"><i class="fa fa-search"></i> Tìm kiếm</button>
        </div>
    </div>
    <div id="_tableLecturer">

    </div>

    <div id="_popupEditLecturer">

    </div>
    <!-- start modal -->
    <div class="modal fade" id="createLecturer" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Thêm giảng viên</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close" onclick="resetTextLecturer();">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form id="frmcreateLecturer" action="javascript:void(0)">
                    <div class="modal-body">
                        <div class="row pb-2">
                            <div class="col-md-12 col-sm-12 col-12">
                                <label>Bộ môn</label>
                                <select class="form-control" id="p_branchList" name="branch_id">
                                    <?php foreach ($arr as $val) {
                                        echo '<option value="' . $val['id'] . '">' . $val['name'] . '</option>';
                                    } ?>
                                </select>
                            </div>
                        </div>
                        <div class="row pb-2">
                            <div class="col-md-12 col-sm-12 col-12">
                                <label>Học vị</label>
                                <select class="form-control" id="p_level" name="level">
                                    <?php foreach ($_lvarr as $val) {
                                        echo '<option value="' . $val . '">' . $val . '</option>';
                                    } ?>
                                </select>
                            </div>
                        </div>
                        <div class="row pb-2">
                            <div class="col-md-12 col-sm-12 col-12">
                                <label>Tên</label>
                                <input type="text" class="form-control" name="name" id="name" placeholder="Tên giảng viên" />
                            </div>
                        </div>
                        <div class="row pb-2">
                            <div class="col-md-12 col-sm-12 col-12">
                                <label>Số điện thoại</label>
                                <input type="text" class="form-control" name="phone" id="phone" placeholder="Số điện thoại" />
                            </div>
                        </div>
                        <div class="row pb-2">
                            <div class="col-md-12 col-sm-12 col-12">
                                <label>Email</label>
                                <input type="text" class="form-control" name="email" id="email" placeholder="email">
                            </div>
                        </div>
                        <div class="row pb-2">
                            <div class="col-md-12 col-sm-12 col-12">
                                <label>Địa chỉ</label>
                                <input type="text" class="form-control" name="address" id="address" placeholder="Địa chỉ">
                            </div>
                        </div>
                        <div class="row pb-2">
                            <div class="col-md-12 col-sm-12 col-12">
                                <label>Vị trí công tác</label>
                                <input type="text" class="form-control" name="workplace" id="workplace" placeholder="Vị trí công tác">
                            </div>
                        </div>
                        <div class="row pb-2">
                            <div class="col-md-12 col-sm-12 col-12">
                                <label>Giới thiệu</label>
                                <textarea class="form-control" id="introduct" name="introduct" placeholder="Nội dung"></textarea>
                            </div>
                        </div>
                        <div class="row pb-2">
                            <div class="col-md-12 col-sm-12 col-12">
                                <label>Ảnh đại diện</label><br />
                                <input id="file" name="file" type="file" />
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-outline-secondary" data-dismiss="modal" onclick="resetTextLecturer();">Đóng</button>
                            <button type="submit" class="btn btn-primary" onclick="createLecturer()">Lưu</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- end modal -->