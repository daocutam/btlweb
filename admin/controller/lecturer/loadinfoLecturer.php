<?php

include('../../configDb.php');
$sql = "SELECT id,name FROM branch";
$arr = $conn->query($sql);
$_lvarr = array('Thac si', 'Tien si', 'Giao su');
$branch_html = "";
$level_html = "";
if (isset($_POST['id'])) {
    $id = $_POST['id'];
    $sql = "Select * from lecturers where active = 1 && id=$id";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        foreach ($arr as $val) {
            if ($val['id'] == $row['branch_id']) {
                $branch_html .= '<option value="' . $val['id'] . '"  selected >' . $val['name'] . '</option>';
            } else {
                $branch_html .= '<option value="' . $val['id'] . '">' . $val['name'] . '</option>';
            }
        }
        foreach ($_lvarr as $val) {
            if ($val == $row['level']) {
                $level_html .= '<option value="' . $val . '" selected >' . $val . '</option>';
            } else {
                $level_html .= '<option value="' . $val . '" >' . $val . '</option>';
            }
        }
        $img = $conn->query("Select id,path from image where lecturer_id=" . $row['id'] . "")->fetch_assoc();
        ob_start();
        echo '<div class="modal fade" id="editLecturer" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Sửa giảng viên</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form id="frmeditLecturer" action="javascript:void(0)">
                    <div class="modal-body">
                        <div class="row pb-2">
                            <div class="col-md-12 col-sm-12 col-12">
                                <label>Bộ môn</label>
                                <input type="hidden" name="_id" value="' . $row['id'] . '"/>
                                <select class="form-control" id="_p_branchList" name="_branch_id">
                                    ' . $branch_html . '
                                </select>
                            </div>
                        </div>
                        <div class="row pb-2">
                            <div class="col-md-12 col-sm-12 col-12">
                                <label>Học vị</label>
                                <select class="form-control" id="_p_level" name="_level">
                                    ' . $level_html . '
                                </select>
                            </div>
                        </div>
                        <div class="row pb-2">
                            <div class="col-md-12 col-sm-12 col-12">
                                <label>Tên</label>
                                <input type="text" class="form-control" name="_name" id="_name" placeholder="Tên giảng viên" value="' . $row['name'] . '" />
                            </div>
                        </div>
                        <div class="row pb-2">
                            <div class="col-md-12 col-sm-12 col-12">
                                <label>Số điện thoại</label>
                                <input type="text" class="form-control" name="_phone" id="_phone" placeholder="Số điện thoại" value="' . $row['phone'] . '" />
                            </div>
                        </div>
                        <div class="row pb-4">
                            <div class="col-md-12 col-sm-12 col-12">
                                <label>Email</label>
                                <input type="text" class="form-control" name="_email" id="_email" placeholder="email" value="' . $row['email'] . '" >
                            </div>
                        </div>
                        <div class="row pb-4">
                            <div class="col-md-12 col-sm-12 col-12">
                                <label>Địa chỉ</label>
                                <input type="text" class="form-control" name="_address" id="_address" placeholder="Địa chỉ" value="' . $row['address'] . '">
                            </div>
                        </div>
                        <div class="row pb-4">
                            <div class="col-md-12 col-sm-12 col-12">
                                <label>Vị trí công tác</label>
                                <input type="text" class="form-control" name="_workplace" id="_workplace" placeholder="Vị trí công tác" value="' . $row['workplace'] . '" >
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12 col-sm-12 col-12">
                                <label>Giới thiệu</label>
                                <textarea class="form-control" id="_introduct" name="_introduct" placeholder="Nội dung">"' . $row['introduct'] . '"</textarea>
                            </div>
                        </div>
                        <div class="row pb-2">
                            <div class="col-md-12 col-sm-12 col-12">
                                <label>Ảnh đại diện</label><br />
                                <input id="_file" name="file" type="file" value="' . $img['path'] . '" />
                                <input type="hidden" name="id_img" value="' . $img['id'] . '"/>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-outline-secondary" data-dismiss="modal" >Đóng</button>
                            <button type="submit" class="btn btn-primary" onclick="saveEditLecturer();">Lưu</button>
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
