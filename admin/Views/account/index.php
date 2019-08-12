<div class="" id="View">
    <div class="col-md-12">
        <div class="breadcrumb-holder">
            <div class="row mb-3 mt-3">
                <div class="col-md-10 col-sm-9 col-8 text-dark px-0">
                    <h4><i class="fa fa-fw fa-users"></i> Quản lý tài khoản</h4>
                </div>
                <div class="col-md-2 col-sm-3 col-4 text-right px-0">
                    <button class="btn width-btn-create-batch btn-dekko" data-toggle="modal" data-target="#createAccount"><i class="fa fa-fw fa-plus"></i> Tạo tài khoản</button>
                </div>
            </div>
        </div>
    </div>
    <div class="row mb-3 mt-3">
        <div class="col-md-10 offset-md-0 col-sm-3 mt-1">
            <input type="text" class="form-control" placeholder="Tên tài khoản" id="txtnameAccount" />
        </div>
        <div class="offset-md-0 col-md-2 mt-1">
            <button class="btn btn-primary btn-block" onclick="loadListAccount();"><i class="fa fa-search"></i> Tìm kiếm</button>
        </div>
    </div>
    <div id="_tableAccount">

    </div>

    <div id="_popupEditAccount">

    </div>
    <!-- start modal -->
    <div class="modal fade" id="createAccount" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Tạo tài khoản</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close" onclick="resetTextAccount();">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form id="frmcreateAccount" action="javascript:void(0)">
                    <div class="modal-body">
                        <div class="row pb-2">
                            <div class="col-md-12 col-sm-12 col-12">
                                <label>Tên</label>
                                <input type="text" class="form-control" name="name" id="name" placeholder="Tên tài khoản" />
                            </div>
                        </div>
                        <div class="row pb-2">
                            <div class="col-md-12 col-sm-12 col-12">
                                <label>Mật khẩu</label>
                                <input type="password" class="form-control" name="pass" id="pass" placeholder="Mật khẩu" />
                            </div>
                        </div>
                        <div class="row pb-4">
                            <div class="col-md-12 col-sm-12 col-12">
                                <label>Email</label>
                                <input type="text" class="form-control" name="email" id="email" placeholder="email">
                            </div>
                        </div>
                        <div class="row pb-4">
                            <div class="col-md-12 col-sm-12 col-12">
                                <label>Địa chỉ</label>
                                <input type="text" class="form-control" name="address" id="address" placeholder="Địa chỉ">
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-outline-secondary" data-dismiss="modal" onclick="resetTextAccount();">Đóng</button>
                            <button type="submit" class="btn btn-primary" onclick="createAccount()">Lưu</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- end modal -->