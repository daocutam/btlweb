<?php

include('../../configDb.php');
if (isset($_POST['id'])) {
    $id = $_POST['id'];
    $sql = "Select * from branch where active = 1 && id=$id";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $created = date("d/m/Y", strtotime($row['created']));
        ob_start();
        echo '<div class="modal fade" id="editBranch" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Sửa bộ môn</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form id="frmeditBranch" action="javascript:void(0)">
                    <div class="modal-body">
                        <div class="row pb-2">
                            <div class="col-md-12 col-sm-12 col-12">
                                <label>Tên</label>      
                                <input value="' . $row['id'] . '" type="hidden" name="_id" />             
                                <input value="' . $row['name'] . '" type="text" class="form-control" name="_name" id="_name" placeholder="Tên bộ môn" />
                            </div>
                        </div>
                        <div class="row pb-2">
                            <div class="col-md-12 col-sm-12 col-12">
                                <label>Số điện thoại</label>
                                <input value="' . $row['phone'] . '" type="text" class="form-control" name="_phone" id="_phone" placeholder="Số điện thoại" />
                            </div>
                        </div>
                        <div class="row pb-4">
                            <div class="col-md-12 col-sm-12 col-12">
                                <label>Email</label>
                                <input value="' . $row['mail'] . '" type="text" class="form-control" name="_mail" id="_mail" placeholder="mail">
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
                                <label>Ngày tạo</label>
                                <input value="' . $created . '" type="text" class="form-control date" name="_date" id="_date" placeholder="Ngày tạo">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12 col-sm-12 col-12">
                                <label>Giới thiệu</label>
                                <textarea class="form-control" id="_introduct" name="_introduct" placeholder="Nội dung">' . $row['introduct'] . '</textarea>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-outline-secondary" data-dismiss="modal">Đóng</button>
                            <button type="submit" class="btn btn-primary" onclick="saveEditBranch();">Lưu</button>
                        </div>
                    </div>
                </form>
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
