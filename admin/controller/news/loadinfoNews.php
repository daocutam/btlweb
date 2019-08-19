<?php
session_start();
if (!isset($_SESSION['user'])) {
    header('Location:http://localhost/btlweb/dhtl/login.php');
}
include('../../configDb.php');
$sql = "SELECT id,name FROM branch";
$arr = $conn->query($sql);
$branch_html = "";
if (isset($_POST['id'])) {
    $id = $_POST['id'];
    $sql = "Select * from news where active = 1 && id=$id";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        if ($row['branch_id'] == -1) {
            $branch_html .= '<option value="-1"  selected >Tin tức chung</option>';
            $branch_html .= '<option value="0">Sự kiện khoa</option>';
            foreach ($arr as $val) {
                $branch_html .= '<option value="' . $val['id'] . '">' . $val['name'] . '</option>';
            }
        } else if ($row['branch_id'] == 0) {
            $branch_html .= '<option value="0"  selected >Sự kiện khoa</option>';
            $branch_html .= '<option value="-1">Tin tức chung</option>';
            foreach ($arr as $val) {
                $branch_html .= '<option value="' . $val['id'] . '">' . $val['name'] . '</option>';
            }
        } else {
            $branch_html .= '<option value = "-1">Tin tức chung</option>';
            $branch_html .= '<option value = "0">Sự kiện khoa</option>';
            foreach ($arr as $val) {
                if ($val['id'] == $row['branch_id']) {
                    $branch_html .= '<option value="' . $val['id'] . '"  selected >' . $val['name'] . '</option>';
                } else {
                    $branch_html .= '<option value="' . $val['id'] . '">' . $val['name'] . '</option>';
                }
            }
        }
        ob_start();
        echo '<div class="modal fade" id="editNews" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Sửa tin mới</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close" >
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form id="frmeditNews" action="javascript:void(0)">
                    <div class="modal-body">
                        <div class="row pb-2">
                            <div class="col-md-12 col-sm-12 col-12">
                                <input type="hidden" name="_id" value="' . $row['id'] . '" />
                                <label>Chủ đề tin</label>
                                <select class="form-control" id="_p_branchList" name="_branch_id">
                                    ' . $branch_html . '
                                </select>
                            </div>
                        </div>
                        <div class="row pb-2">
                            <div class="col-md-12 col-sm-12 col-12">
                                <label>Tiêu đề</label>
                                <input type="text" class="form-control" name="_title" id="_title" placeholder="Tiêu đề tin" value="' . $row['title'] . '" />
                            </div>
                        </div>
                        <div class="row pb-2">
                            <div class="col-md-12 col-sm-12 col-12">
                                <label>Nội dung</label>
                                <textarea class="form-control" id="_content" name="_content" placeholder="Nội dung">' . $row['content'] . '</textarea>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12 col-sm-12 col-12">
                                <label>Ảnh</label><br />
                                <input id="file" name="file" type="file" />
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-outline-secondary" data-dismiss="modal">Đóng</button>
                            <button type="submit" class="btn btn-primary" onclick="saveEditNews()">Lưu</button>
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
