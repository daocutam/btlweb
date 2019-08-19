<?php
if (!isset($_SESSION['user'])) {
    header('Location:http://localhost/btlweb/dhtl/login.php');
}
?>
<div class="" id="View">
    <div class="col-md-12">
        <div class="breadcrumb-holder">
            <div class="row mb-3 mt-3">
                <div class="col-md-10 col-sm-9 col-8 text-dark px-0">
                    <h4><i class="fa fa-fw fa-users"></i> Thông tin bộ môn</h4>
                </div>
                <div class="col-md-2 col-sm-3 col-4 text-right px-0">
                    <button class="btn width-btn-create-batch btn-dekko" data-toggle="modal" data-target="#createBranch"><i class="fa fa-fw fa-plus"></i> Thêm bộ môn</button>
                </div>
            </div>
        </div>
    </div>
    <div class="row mb-3 mt-3">
        <div class="col-md-5 offset-md-0 col-sm-4 mt-1">
            <input type="text" class="form-control" placeholder="Tên bộ môn" id="txtnameBranch" />
        </div>
        <div class="col-md-5 offset-md-0 col-sm-4 mt-1">
            <input type="text" class="form-control" placeholder="Số điện thoại " id="txtphoneBranch" />
        </div>
        <div class="col-md-2 offset-md-0 col-sm-2 offset-sm-0 mt-1 col-4 offset-4">
            <button class="btn btn-primary btn-block" onclick="loadListBranch();"><i class="fa fa-search"></i> Tìm kiếm</button>
        </div>
    </div>
    <div id="_tableBranch">

    </div>

    <div id="_popupEditBranch">

    </div>
    <!-- start modal -->
    <div class="modal fade" id="createBranch" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Thêm bộ môn</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close" onclick="resetTextBranch();">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form id="frmcreateBranch" action="javascript:void(0)">
                    <div class="modal-body">
                        <div class="row pb-2">
                            <div class="col-md-12 col-sm-12 col-12">
                                <label>Tên</label>
                                <input type="text" class="form-control" name="name" id="name" placeholder="Tên bộ môn" />
                            </div>
                        </div>
                        <div class="row pb-2">
                            <div class="col-md-12 col-sm-12 col-12">
                                <label>Số điện thoại</label>
                                <input type="text" class="form-control" name="phone" id="phone" placeholder="Số điện thoại" />
                            </div>
                        </div>
                        <div class="row pb-4">
                            <div class="col-md-12 col-sm-12 col-12">
                                <label>Email</label>
                                <input type="text" class="form-control" name="mail" id="mail" placeholder="mail">
                            </div>
                        </div>
                        <div class="row pb-4">
                            <div class="col-md-12 col-sm-12 col-12">
                                <label>Địa chỉ</label>
                                <input type="text" class="form-control" name="address" id="address" placeholder="Địa chỉ">
                            </div>
                        </div>
                        <div class="row pb-4">
                            <div class="col-md-12 col-sm-12 col-12">
                                <label>Ngày tạo</label>
                                <input type="text" class="form-control date" name="date" id="date" placeholder="Ngày tạo">
                            </div>
                        </div>
                        <div class="row pb-4">
                            <div class="col-md-12 col-sm-12 col-12">
                                <label>link</label>
                                <input type="text" class="form-control" name="link" id="link" placeholder="link">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12 col-sm-12 col-12">
                                <label>Giới thiệu</label>
                                <textarea class="form-control" id="introduct" name="introduct" placeholder="Nội dung"></textarea>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-outline-secondary" data-dismiss="modal" onclick="resetTextBranch();">Đóng</button>
                            <button type="submit" class="btn btn-primary" onclick="createBranch()">Lưu</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- end modal -->