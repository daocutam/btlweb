<?php
include('../../configDb.php');
//type = 1 tin tức
//type =2 Bài báo khoa học
$sql = "SELECT * FROM news where active = 1 && type = 2";
if (isset($_POST['title']) && $_POST['title'] != "") {
    $sql = $sql . " && title LIKE '%" . $_POST['title'] . "%'";
}
if (isset($_POST['lecturer_id']) && $_POST['lecturer_id']) {
    $sql = $sql . " && lecturer_id = '" . $_POST['lecturer_id'] . "'";
}
//chua xong
$result = $conn->query($sql);
if ($result->num_rows > 0) {
    // output data of each row
    ob_start();
    echo '<table class="table table-light table-bordered table-hover table-responsive-sm table-responsive-md">
    <thead class="text-center text-white bg-thead">
        <tr>
            <th>Mã bài báo</th>
            <th>Tiêu đề</th>    
            <th>Cấp đề tài</th>
            <th>Ngày đăng</th>      
            <th></th>
        </tr>
    </thead>
    <tbody class="text-center"> ';
    while ($row = $result->fetch_assoc()) {
        $date = str_replace('-', '/',  $row["created"]);
        $created = date("d/m/Y", strtotime($date));
        echo " <tr>
        <td>" . $row["code"] . "</td>
        <td>" . $row["title"] . "</td>
        <td>" . $row["content"] . "</td>
        <td>" . $created . "</td>
        <td><a onclick = 'openModalArticle(" . $row['id'] . ")' data-toggle = 'tooltip' data-placement='top' title='Xem chi tiết' class='cursor-pointer'>
            <i class='btnView fa fa-fw fa-eye'></i>
            </a>
            <a onclick = 'deleteArticle(" . $row['id'] . ")' data-toggle = 'tooltip' data-placement='top' title='Xóa' class='cursor-pointer'>
                <i class='btnDelete fa fa-fw fa-trash-o'></i>
            </a>
        </td>
    </tr>";
    }
    echo '</tbody></table>';
    $html = ob_get_contents();
    ob_end_clean();
    echo $html;
} else {
    echo "0 results";
}
mysqli_close($conn);
