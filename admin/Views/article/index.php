<?php
include("../../configDb.php");
if (!isset($_SESSION['user'])) {
    header('Location:http://localhost/btlweb/dhtl/login.php');
}
$sql = "SELECT id,name FROM lecturers";
$arr = $conn->query($sql);
?>

<div class="" id="View">
    <div class="col-md-12">
        <div class="breadcrumb-holder">
            <div class="row mb-3 mt-3">
                <div class="col-md-10 col-sm-9 col-8 text-dark px-0">
                    <h4><i class="fa fa-fw fa-users"></i> Bài báo khoa học</h4>
                </div>
                <div class="col-md-2 col-sm-3 col-4 text-right px-0">
                    <button class="btn width-btn-create-batch btn-dekko" data-toggle="modal" data-target="#createArticle"><i class="fa fa-fw fa-plus"></i> Thêm mới</button>
                </div>
            </div>
        </div>
    </div>
    <div class="row mb-3 mt-3">
        <div class="col-md-5 offset-md-0 col-sm-5 mt-1">
            <input type="text" class="form-control" placeholder="Tên bài báo" id="txttitleArticle" />
        </div>
        <div class="col-md-5 offset-md-0 col-sm-5 mt-1">
            <select class="form-control" id="lecturer">
                <?php foreach ($arr as $val) {
                    echo '<option value="' . $val['id'] . '">' . $val['name'] . '</option>';
                } ?>
            </select>
        </div>
        <div class="col-md-2 offset-md-0 col-sm-2 mt-1">
            <button class="btn btn-primary btn-block" onclick="loadListArticle();"><i class="fa fa-search"></i> Tìm kiếm</button>
        </div>
    </div>
    <div id="_tableArticle">

    </div>

    <div id="_popupEditArticle">

    </div>
    <!-- start modal -->
    <div class="modal fade" id="createArticle" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Thêm mới</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close" onclick="resetTextArticle();">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form id="frmcreateArticle" action="javascript:void(0)" enctype="multipart/form-data">
                    <div class="modal-body">
                        <div class="row pb-2">
                            <div class="col-md-12 col-sm-12 col-12">
                                <label>Tác giả</label>
                                <select class="form-control" id="p_lecturer" name="p_lecturer">
                                    <?php foreach ($arr as $val) {
                                        echo '<option value="' . $val['id'] . '">' . $val['name'] . '</option>';
                                    } ?>
                                </select>
                            </div>
                        </div>
                        <div class="row pb-2">
                            <div class="col-md-12 col-sm-12 col-12">
                                <label>Tiêu đề</label>
                                <input type="text" class="form-control" name="title" id="title" placeholder="Tiêu đề bài báo " />
                            </div>
                        </div>
                        <div class="row pb-2">
                            <div class="col-md-12 col-sm-12 col-12">
                                <label>Cấp đề tài</label>
                                <input class="form-control" id="content" name="content" placeholder="Cấp đề tài" />
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12 col-sm-12 col-12">
                                <label>Ảnh</label><br />
                                <input id="file" name="file" type="file" />
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-outline-secondary" data-dismiss="modal" onclick="resetTextArticle();">Đóng</button>
                            <button type="submit" class="btn btn-primary" onclick="createArticle()">Lưu</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- end modal -->