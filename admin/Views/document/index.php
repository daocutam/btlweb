<?php
include("../../configDb.php");
if (!isset($_SESSION['user'])) {
    header('Location:http://localhost/btlweb/dhtl/login.php');
}
$sql = "SELECT id,name FROM branch where active = 1";
$arr = $conn->query($sql);
?>
<div class="" id="View">
    <div class="col-md-12">
        <div class="breadcrumb-holder">
            <div class="row mb-3 mt-3">
                <div class="col-md-10 col-sm-9 col-8 text-dark px-0">
                    <h4><i class="fa fa-fw fa-users"></i> Tài liệu CNTT</h4>
                </div>
                <div class="col-md-2 col-sm-3 col-4 text-right px-0">
                    <button class="btn width-btn-create-batch btn-dekko" data-toggle="modal" data-target="#createDocument"><i class="fa fa-fw fa-plus"></i> Thêm mới</button>
                </div>
            </div>
        </div>
    </div>
    <div class="row mb-3 mt-3">
        <div class="col-md-5 offset-md-0 col-sm-5 mt-1">
            <input type="text" class="form-control" placeholder="Tên tài liệu" id="txtnameDocument" />
        </div>
        <div class="col-md-5 offset-md-0 col-sm-5 mt-1">
            <select class="form-control" id="_branchListDoc">
                <option value="0">Đề cương môn học</option>';
                <?php foreach ($arr as $val) {
                    echo '<option value="' . $val['id'] . '">' . $val['name'] . '</option>';
                } ?>
            </select>
        </div>
        <div class="col-md-2 offset-md-0 col-sm-2 mt-1">
            <button class="btn btn-primary btn-block" onclick="loadListDocument();"><i class="fa fa-search"></i> Tìm kiếm</button>
        </div>
    </div>
    <div id="_tableDocument">

    </div>

    <div id="_popupEditDocument">

    </div>
    <!-- start modal -->
    <div class="modal fade" id="createDocument" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Thêm tài liệu</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close" onclick="resetTextDocument();">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form id="frmcreateDocument" method="POST">
                    <div class="modal-body">
                        <div class="row pb-2">
                            <div class="col-md-12 col-sm-12 col-12">
                                <label>Chủ đề</label>
                                <select class="form-control" id="p_branchList" name="branch_id">
                                    <option value="0">Đề cương môn học</option>
                                    <?php foreach ($arr as $val) {
                                        echo '<option value="' . $val['id'] . '">' . $val['name'] . '</option>';
                                    } ?>
                                </select>
                            </div>
                        </div>
                        <div class="row pb-2">
                            <div class="col-md-12 col-sm-12 col-12">
                                <label>Tên tài liệu</label>
                                <input type="text" class="form-control" name="name" id="name" placeholder="Tên tài liệu " />
                            </div>
                        </div>
                        <div class="row pb-2">
                            <div class="col-md-12 col-sm-12 col-12">
                                <label>Link tham khảo</label>
                                <input type="text" class="form-control" name="link" id="link" placeholder="Link tham khảo " />
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12 col-sm-12 col-12">
                                <label>Ảnh</label><br />
                                <input type="file" name="file" id="file" />
                            </div>
                        </div>
                </form>
                <div class="modal-footer">
                    <button type="button" class="btn btn-outline-secondary" data-dismiss="modal" onclick="resetTextdocument();">Đóng</button>
                    <button type="submit" class="btn btn-primary" onclick="createDocument()">Lưu</button>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
<!-- end modal -->