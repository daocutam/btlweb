<?php

include('../../configDb.php');
if (isset($_POST['id'])) {
    $id = $_POST['id'];
    $sql = "Select * from account where active = 1 && id=$id";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        ob_start();
        echo '<div class="modal fade" id="editAccount" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Sửa tài khoản</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form id="frmeditAccount" action="javascript:void(0)">
                    <div class="modal-body">
                        <div class="row pb-2">
                            <div class="col-md-12 col-sm-12 col-12">
                                <label>Tên</label>
                                <input value="' . $row['id'] . '" type="hidden" name="_id" />
                                <input value="' . $row['name'] . '" type="text" class="form-control" name="_name" id="_name" placeholder="Tên tài khoản" />
                            </div>
                        </div>
                        <div class="row pb-2">
                            <div class="col-md-12 col-sm-12 col-12">
                                <label>Mật khẩu</label>
                                <input value="' . $row['pass'] . '"  type="password" class="form-control" name="_pass" id="_pass" placeholder="Mật khẩu" />
                            </div>
                        </div>
                        <div class="row pb-4">
                            <div class="col-md-12 col-sm-12 col-12">
                                <label>Email</label>
                                <input value="' . $row['email'] . '" type="text" class="form-control" name="_email" id="_email" placeholder="email">
                            </div>
                        </div>
                        <div class="row pb-4">
                            <div class="col-md-12 col-sm-12 col-12">
                                <label>Địa chỉ</label>
                                <input value="' . $row['address'] . '" type="text" class="form-control" name="_address" id="_address" placeholder="Địa chỉ">
                            </div>
                        </div>
                        <div class="row pb-4">
                            <div class="col-md-12 col-sm-12 col-12">
                                <label>Trạng thái</label>
                                <select class="form-control" id="status" name="_status">';
        if ($row['status'] == 1) {
            echo '<option value="0">Dừng hoạt động</option>
                                    <option value="1" selected >Đang hoạt động</option>';
        } else {
            echo '<option value="0" selected >Dừng hoạt động</option>
                                    <option value="1">Đang hoạt động</option>';
        }
        echo '</select>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-outline-secondary" data-dismiss="modal">Đóng</button>
                            <button type="submit" class="btn btn-primary" onclick="saveEditAccount()">Lưu</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>';
        $html = ob_get_contents();
        ob_end_clean();
        echo $html;
    } else {
        echo 'error!';
    }
}
