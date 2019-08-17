<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Thư viện css -->
    <link rel="stylesheet" href="../admin/public/templates/css/bootstrap.min.css" />
    <link rel="stylesheet" href="../admin/public/templates/css/style.css" />
    <link rel="stylesheet" href="../admin/public/templates/css/font-awesome.min.css" />
    <link rel="stylesheet" href="../admin/public/templates/css/aos.css" />
    <!-- Thư viện js -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="../admin/public/templates/js/bootstrap.min.js"></script>
    <script src="../admin/public/templates/js/aos.js"></script>
    <title>Đề tài dự án</title>
</head>

<?php
include('../../btlweb/admin/configDb.php');
$query = "SELECT * FROM news,lecturers WHERE news.lecturer_id=lecturers.id && news.active = 1 && news.type = 2";
$lst_Article = $conn->query($query);
?>

<body>
    <!-- Header top -->
    <?php include('top_header.php'); ?>
    <!-- End Header top -->

    <!-- Header_Menu -->
    <?php include('menu_header.php'); ?>
    <!-- End Header_Menu -->

    <!-- Main -->
    <section class="container main_logo">
        <section class="row">
            <section class="menu_main_logo">
                <a href="">Nghiên cứu khoa học</a>
                <img src="http://cse.tlu.edu.vn/Portals/_default/Skins/Xcillion/Images/breadcrumb-arrow.png" alt="">
                <a href="de_tai_du_an.php">Đề tài dự án</a>
            </section>
        </section>
    </section>
    <section class="container">
        <section class="row">
            <section class="tochuc">
                <h1>Danh mục các đề tài nghiên cứu khoa học</h1>
                <table class="table table-bordered table-sm mt-5">
                    <thead>
                        <th>STT</th>
                        <th>Tên đề tài</th>
                        <th>Cấp đề tài</th>
                        <th>Người thực hiện</th>
                    </thead>
                    <tbody>
                        <?php
                        $count = 0;
                        if ($lst_Article->num_rows > 0) {
                            foreach ($lst_Article as $row) {
                                $count++;
                                echo ' <tr>
                                <td>' . $count . '</td>
                                <td>' . $row['title'] . '</td>
                                <td>' . $row['content'] . '</td>
                                <td>' . $row['name'] . '</td>
                            </tr>';
                            }
                        }
                        ?>
                    </tbody>
                </table>
                <a href=""> <i>Trở về đầu trang</i></a>
            </section>
        </section>
    </section>
    <!-- End Main -->

    <!-- Footer -->
    <?php include('footer.php'); ?>
    <!-- End Footer -->
</body>

</html>