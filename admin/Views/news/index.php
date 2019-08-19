<?php
include("../../configDb.php");
if (!isset($_SESSION['user'])) {
    header('Location:http://localhost/btlweb/dhtl/login.php');
}
$sql = "SELECT id,name FROM branch";
$arr = $conn->query($sql);
?>
<div class="" id="View">
    <div class="col-md-12">
        <div class="breadcrumb-holder">
            <div class="row mb-3 mt-3">
                <div class="col-md-10 col-sm-9 col-8 text-dark px-0">
                    <h4><i class="fa fa-fw fa-users"></i> Quản lý tin tức</h4>
                </div>
                <div class="col-md-2 col-sm-3 col-4 text-right px-0">
                    <button class="btn width-btn-create-batch btn-dekko" data-toggle="modal" data-target="#createNews"><i class="fa fa-fw fa-plus"></i> Thêm tin mới</button>
                </div>
            </div>
        </div>
    </div>
    <div class="row mb-3 mt-3">
        <div class="col-md-5 offset-md-0 col-sm-5 mt-1">
            <input type="text" class="form-control" placeholder="Tiêu đề " id="txtTitle" />
        </div>
        <div class="col-md-5 offset-md-0 col-sm-5 mt-1">
            <select class="form-control" id="_branchList">
                <option value="-1">Tin tức chung</option>
                <option value="0">Sự kiện khoa</option>
                <?php foreach ($arr as $val) {
                    echo '<option value="' . $val['id'] . '">' . $val['name'] . '</option>';
                } ?>
            </select>
        </div>
        <div class="col-md-2 offset-md-0 col-sm-2 mt-1">
            <button class="btn btn-primary btn-block" onclick="loadListNews();"><i class="fa fa-search"></i> Tìm kiếm</button>
        </div>
    </div>
    <div id="_tableNews">

    </div>

    <div id="_popupEditNews">

    </div>
    <!-- start modal -->
    <div class="modal fade" id="createNews" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Thêm tin mới</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close" onclick="resetTextNews();">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form id="frmcreateNews" action="javascript:void(0)">
                    <div class="modal-body">
                        <div class="row pb-2">
                            <div class="col-md-12 col-sm-12 col-12">
                                <label>Chủ để tin</label>
                                <select class="form-control" id="p_branchList" name="branch_id">
                                    <option value="-1">Tin tức chung</option>
                                    <option value="0">Sự kiện khoa</option>
                                    <?php foreach ($arr as $val) {
                                        echo '<option value="' . $val['id'] . '">' . $val['name'] . '</option>';
                                    } ?>
                                </select>
                            </div>
                        </div>
                        <div class="row pb-2">
                            <div class="col-md-12 col-sm-12 col-12">
                                <label>Tiêu đề</label>
                                <input type="text" class="form-control" name="title" id="title" placeholder="Tiêu đề tin " />
                            </div>
                        </div>
                        <div class="row pb-2">
                            <div class="col-md-12 col-sm-12 col-12">
                                <label>Nội dung</label>
                                <textarea class="form-control" id="content" name="content" placeholder="Nội dung"></textarea>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12 col-sm-12 col-12">
                                <label>Ảnh</label><br />
                                <input id="file" name="file" type="file" />
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-outline-secondary" data-dismiss="modal" onclick="resetTextNews();">Đóng</button>
                            <button type="submit" class="btn btn-primary" onclick="createNews()">Lưu</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- end modal -->