<?php

include('../../configDb.php');
$sql = "SELECT id,name FROM branch where active = 1";
$arr = $conn->query($sql);
$branch_html = "";
if (isset($_POST['id'])) {
    $id = $_POST['id'];
    $sql = "Select * from document where active = 1 && id=$id";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        if ($row['branch_id'] == 0) {
            $branch_html .= '<option value="0"  selected >Đề cương môn học</option>';
            foreach ($arr as $val) {
                $branch_html .= '<option value="' . $val['id'] . '">' . $val['name'] . '</option>';
            }
        } else {
            $branch_html .= '<option value="0">Đề cương môn học</option>';
            foreach ($arr as $val) {
                if ($val['id'] == $row['branch_id']) {
                    $branch_html .= '<option value="' . $val['id'] . '"  selected >' . $val['name'] . '</option>';
                } else {
                    $branch_html .= '<option value="' . $val['id'] . '">' . $val['name'] . '</option>';
                }
            }
        }
        ob_start();
        echo ' <div class="modal fade" id="editDocument" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Sửa tài liệu</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form id="frmeditDocument"  method="POST">
                    <div class="modal-body">
                        <div class="row pb-2">
                        <input type="hidden" name ="_id" id="_id" value="' . $row['id'] . '" />
                            <div class="col-md-12 col-sm-12 col-12">
                                <label>Chủ đề</label>
                                <select class="form-control" id="_p_branchList" name="_branch_id">
                                    ' . $branch_html . '
                                </select>
                            </div>
                        </div>
                        <div class="row pb-2">
                            <div class="col-md-12 col-sm-12 col-12">
                                <label>Tên tài liệu</label>
                                <input type="text" class="form-control" name="_name" id="_name" placeholder="Tên tài liệu" value="' . $row['name'] . '" />
                            </div>
                        </div>
                        <div class="row pb-2">
                            <div class="col-md-12 col-sm-12 col-12">
                                <label>Link tham khảo</label>
                                <input type="text" class="form-control" name="_link" id="_link" placeholder="Link tham khảo "  value="' . $row['link'] . '"  />
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12 col-sm-12 col-12">
                                <label>Ảnh</label><br />
                                <input type="file" name="file" id="file" />
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-outline-secondary" data-dismiss="modal">Đóng</button>
                            <button type="submit" class="btn btn-primary" onclick="saveEditDocument()">Lưu</button>
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
