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
    <title>Sự kiện</title>
</head>

<?php
include('../../btlweb/admin/configDb.php');
$query = "SELECT * FROM news,image WHERE news.id=image.new_id && news.active = 1 && news.type = 1 && news.branch_id = 0 ORDER BY RAND() LIMIT 3";
$result = $conn->query($query);

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
                <a href="">Tin tức</a>
                <img src="http://cse.tlu.edu.vn/Portals/_default/Skins/Xcillion/Images/breadcrumb-arrow.png" alt="">
                <a href="">Sự kiện</a>
            </section>
        </section>
    </section>
    <section class="container">
        <section class="row">
            <section class="tochuc">
                <?php
                if ($result->num_rows > 0) {
                    foreach ($result as $row) {
                        echo '<div class="row mt-3">
                                <div class="col-md-3">
                                <img src="../../btlweb/admin/Images/' . $row['path'] . '" alt="" width="200" height="180">
                                </div>
                                <div class="col-md-9">
                                <div class="row">
                                <a href="chi_tiet_tin_tuc.php?id=' . $row['id'] . '"><b>' . $row['title'] . '</b></a><br/>
                                </div>
                                <div class="row">
                                <a href="chi_tiet_tin_tuc.php?id=' . $row['id'] . '"><i>Xem Thêm...</i></a>
                                </div>
								</div>
							</div>';
                    }
                }
                ?>
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