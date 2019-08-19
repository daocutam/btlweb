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
    <title>Công nghệ phần mềm</title>
</head>

<?php
include('../../btlweb/admin/configDb.php');
if (isset($_GET['id'])) {
    $query = "SELECT * FROM branch WHERE active = 1 && id = " . $_GET['id'] . "";
    $obj = $conn->query($query);
    $branch = $obj->fetch_assoc();
    $query = "SELECT * FROM lecturers,image WHERE lecturers.id = image.lecturer_id && lecturers.active = 1 && lecturers.branch_id = " . $_GET['id'] . "";
    $lst_lect = $conn->query($query);
}

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
                <a href="">Bộ môn trung tâm</a>
                <img src="http://cse.tlu.edu.vn/Portals/_default/Skins/Xcillion/Images/breadcrumb-arrow.png" alt="">
                <a href=""><?php echo $branch['name'] ?></a>
            </section>
        </section>
    </section>
    <section class="container">
        <section class="row">
            <section class="tochuc">
                <h1>Giới thiệu bộ môn Công nghệ phần mềm</h1>
                <p>
                    <?php echo $branch['introduct']; ?>
                </p>
                <label>Danh sách giảng viên thuộc bộ môn:</label>
                <?php
                if ($lst_lect->num_rows > 0) {
                    foreach ($lst_lect as $row) {
                        echo '<div class="row mb-5"><div class="col-md-3"><img width="120" height="150" src="../../btlweb/admin/Images/' . $row['path'] . '" alt=""></div>';
                        echo '<div class ="col-md-9">"' . $row['introduct'] . '"</div></div>';
                    }
                }
                ?>
                <label>Địa chỉ:</label>
                <p><?php echo $branch['address'] ?></p>
                <label>Email</label>
                <p><?php echo $branch['mail'] ?></p>
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