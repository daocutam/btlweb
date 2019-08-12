<?php
include('../../configDb.php');
if (isset($_POST['id']) && $_POST['id'] != "") {
    $_strLect;
    $lect = $conn->query("select id,name from lecturers where active = 1");
    $sql = "select * from news where active = 1 && type = 2 && id =" . $_POST['id'] . "";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        foreach ($lect as $val) {
            if ($val['id'] == $row['lecturer_id']) {
                $_strLect = $val['name'];
            }
        }
        echo '<div class="modal fade" id="detailArticle" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Chi tiết bài báo</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form id="frmdetailArticle" action="javascript:void(0)" enctype="multipart/form-data">
                    <div class="modal-body">
                        <div class="row pb-2">                          
                            <label class="col-md-5 col-sm-5 col-5">Tác giả</label>
                            <div class="col-md-5 col-sm-5 col-5 text-center">
                                 ' . $_strLect . '
                            </div>
                        </div>
                        <div class="row pb-2">                          
                            <label class="col-md-5 col-sm-5 col-5">Tiêu đề</label>
                            <div class="col-md-5 col-sm-5 col-5 text-center">
                                ' . $row['title'] . '
                            </div>
                        </div>
                        <div class="row">
                            <label class="col-md-5 col-sm-5 col-5">Nội dung</label><br />
                            <div class="col-md-5 col-sm-5 col-5 text-center">    
                                <p class="text-center">' . $row['content'] . '</p>
                            </div>
                        </div>
                        <div class="row pb-3">
                            <label class="col-md-5 col-sm-5 col-5">Ngày đăng bài</label><br />
                            <div class="col-md-5 col-sm-5 col-5 text-center">  
                                ' . $row['created'] . '
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-outline-secondary" data-dismiss="modal">Đóng</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>';
    } else {
        echo 'error!';
    }
}
