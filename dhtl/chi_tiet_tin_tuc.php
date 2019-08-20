<!DOCTYPE html>
<html lang="en">

<?php
include('../../btlweb/admin/configDb.php');
if (isset($_GET['id'])) {
    $query = "SELECT * FROM news,image WHERE news.id=image.new_id && news.active = 1 && news.id = " . $_GET['id'] . "";
    $obj = $conn->query($query);
    $news = $obj->fetch_assoc();
}
?>

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
    <title><?php echo $news['title']; ?></title>
</head>

<body>
    <!-- Header top -->
    <?php include('top_header.php'); ?>
    <!-- End Header top -->

    <!-- Header_Menu -->
    <?php include('menu_header.php'); ?>
    <!-- End Header_Menu -->

    <!-- Carousel -->
    <?php include('slider.php'); ?>
    <!-- End Carousel -->

    <!-- Main -->
    <section class="container main_logo">
        <section class="row">
            <section class="menu_main_logo">
                <a href="">Trang chủ</a>
                <img src="http://cse.tlu.edu.vn/Portals/_default/Skins/Xcillion/Images/breadcrumb-arrow.png" alt="">
                <a href="">Tin tức</a>
            </section>
        </section>
    </section>
    <section class="container">
        <section class="row mt-3">
            <section class="chao_mung">
                <h1><?php echo $news['title']; ?></h1>
                <img width="800" height="500" src="../../btlweb/admin/Images/<?php echo $news['path']; ?>" />
                <p class="mt-5"><?php echo $news['content']; ?></p>
            </section>
        </section>
        <!-- End Main -->
    </section>
    <!-- Footer -->
    <?php include('footer.php'); ?>
    <!-- End Footer -->
</body>

</html>