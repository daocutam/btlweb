<?php
include('../../configDb.php');
$sql = "SELECT * FROM account where active = 1";
if (isset($_POST['name']) && $_POST['name'] != "") {
    $sql = $sql . " && name LIKE '%" . $_POST['name'] . "%'";
}
$result = $conn->query($sql);
$status = "";
if ($result->num_rows > 0) {
    // output data of each row
    ob_start();
    echo '<table class="table table-light table-bordered table-hover table-responsive-sm table-responsive-md">
    <thead class="text-center text-white bg-thead">
        <tr>
            <th>Tên tài khoản</th>
            <th>Email</th>
            <th>Địa chỉ</th>
            <th>Trạng thái</th>
            <th></th>
        </tr>
    </thead>
    <tbody class="text-center"> ';
    while ($row = $result->fetch_assoc()) {
        echo " <tr>
        <td>" . $row["name"] . "</td>
        <td>" . $row["email"] . "</td>
        <td>" . $row["address"] . "</td>
        <td>";
        if ($row['status'] == 1) {
            echo 'Đang hoạt động';
        } else {
            echo 'Dừng hoạt động';
        }
        "</td>";
        echo "
        <td><a onclick = 'openModalAccount(" . $row['id'] . ")' data-toggle = 'tooltip' data-placement='top' title='Sửa' class='cursor-pointer'>
            <i class='btnEdit fa fa-fw fa-edit'></i>
            </a>
            <a onclick = 'deleteAccount(" . $row['id'] . ")' data-toggle = 'tooltip' data-placement='top' title='Xóa' class='cursor-pointer'>
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
