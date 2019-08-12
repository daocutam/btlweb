<?php
include('../../configDb.php');
$sql = "SELECT * FROM lecturers where active = 1";
if (isset($_POST['name']) && $_POST['name'] != "") {
    $sql = $sql . " && name LIKE '%" . $_POST['name'] . "%'";
}

if (isset($_POST['phone']) && $_POST['phone'] != "") {
    $sql = $sql . " && phone ='" . $_POST['phone'] . "'";
}

if (isset($_POST['branchList']) && $_POST['branchList'] != "") {
    $sql = $sql . " && branch_id = " . $_POST['branchList'] . "";
}

if (isset($_POST['level']) && $_POST['level'] != "") {
    $sql = $sql . " && level ='" . $_POST['level'] . "'";
}

$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    ob_start();
    echo '<table class="table table-light table-bordered table-hover table-responsive-sm table-responsive-md">
    <thead class="text-center text-white bg-thead">
        <tr>
            <th>Mã giảng viên</th>
            <th>Tên giảng viên</th>    
            <th>Vị trí công tác</th>
            <th>Số điện thoại</th>
            <th>Email</th>
            <th>Địa chỉ</th>
            <th>Giới thiệu</th>
            <th></th>
        </tr>
    </thead>
    <tbody class="text-center"> ';
    while ($row = $result->fetch_assoc()) {
        echo " <tr>
        <td>" . $row["code"] . "</td>
        <td>" . $row["name"] . "</td>
        <td>" . $row["workplace"] . "</td>
        <td>" . $row["phone"] . "</td>
        <td>" . $row["email"] . "</td>
        <td>" . $row["address"] . "</td>
        <td>" . $row["introduct"] . "</td>
        <td><a onclick = 'openModalLecturer(" . $row['id'] . ")' data-toggle = 'tooltip' data-placement='top' title='Sửa' class='cursor-pointer'>
            <i class='btnEdit fa fa-fw fa-edit'></i>
            </a>
            <a onclick = 'deleteLecturer(" . $row['id'] . ")' data-toggle = 'tooltip' data-placement='top' title='Xóa' class='cursor-pointer'>
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
